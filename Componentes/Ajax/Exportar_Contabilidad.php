<?php
	include('is_logged.php');
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		$EFiltro = mysqli_real_escape_string($con,(strip_tags($_REQUEST['EFiltro'], ENT_QUOTES)));
		$VFiltro = mysqli_real_escape_string($con,(strip_tags($_REQUEST['VFiltro'], ENT_QUOTES)));
		$fechaIni = mysqli_real_escape_string($con,(strip_tags($_REQUEST['fechaIni'], ENT_QUOTES)));
		$fechaFin = mysqli_real_escape_string($con,(strip_tags($_REQUEST['fechaFin'], ENT_QUOTES)));
		$Pest = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Pest'], ENT_QUOTES)));
		if($Pest=='ResIngresos'){
			$Naturaleza ='CUENTA_VIRTUAL.Credito <>0 and';
			$SumValor ='sum(CUENTA_VIRTUAL.Credito)';
		}
		if($Pest=='ResEgresos'){
			$Naturaleza ='CUENTA_VIRTUAL.Debito <>0 and';
			$SumValor ='sum(CUENTA_VIRTUAL.Debito)';
		}
		if($Pest=='ResTodo'){
			$Naturaleza ='';
			$SumValor ='sum(CUENTA_VIRTUAL.Credito-CUENTA_VIRTUAL.Debito)';
		}

	
			$sTable = "CUENTA_VIRTUAL 
			Inner Join USUARIOS on USUARIOS.Nit =CUENTA_VIRTUAL.Usuario";
			$sWhere = "where ".$Naturaleza."(Fecha >= '$fechaIni' and  Fecha <= '$fechaFin') ";
			if($EFiltro<>"Todos"){
				if($EFiltro=='Usuario'){
					$sWhere.= " and CUENTA_VIRTUAL.Usuario ='".$VFiltro."'";		
				}else{
					if($EFiltro=='Tipo'){
						$sWhere.= " and CUENTA_VIRTUAL.Tipo ='".$VFiltro."'";		
					}
				}	
			} 
			$Order =" order by CUENTA_VIRTUAL.Numero  ";
			$Group = "group by CUENTA_VIRTUAL.Tipo,CUENTA_VIRTUAL.NDocumento,CUENTA_VIRTUAL.Fecha,USUARIOS.Razon_Social,CUENTA_VIRTUAL.Estado,CUENTA_VIRTUAL.Numero";
		
		
		
			$sql="SELECT CUENTA_VIRTUAL.Tipo,CUENTA_VIRTUAL.NDocumento,CUENTA_VIRTUAL.Fecha,sum(CUENTA_VIRTUAL.Comision)as Comision,".$SumValor." as Valor,
			USUARIOS.Razon_Social,CUENTA_VIRTUAL.Estado FROM $sTable $sWhere $Group $Order ";	
			$query = mysqli_query($con, $sql);
			echo mysqli_error($con);
			$Array="";	
			while ($row=mysqli_fetch_array($query)){
				$Tipo=$row['Tipo'];
				$NDocumento=$row['NDocumento'];
				$Valor=$row['Valor'];
				$Usuario=$row['Razon_Social'];
				$Estado=$row['Estado'];
				$Fecha=$row['Fecha'];
				$Comision=$row['Comision'];
				$Total =$Valor-$Comision;
				if($Array==''){
					$Array.='{"Tipo":"'.$Tipo.'", "Numero": "'.$NDocumento.'", "Usuario": "'.$Usuario.'", "Estado": "'.$Estado.'", "Fecha": "'.date("d-m-Y", strtotime($Fecha)).'",  "Valor": "'.$Valor.'",  "Comision": "'.$Comision.'",  "Total": "'.$Total.'"}';
				}else{
					$Array.=',{"Tipo":"'.$Tipo.'", "Numero": "'.$NDocumento.'", "Usuario": "'.$Usuario.'", "Estado": "'.$Estado.'", "Fecha": "'.date("d-m-Y", strtotime($Fecha)).'",  "Valor": "'.$Valor.'",  "Comision": "'.$Comision.'",  "Total": "'.$Total.'"}';
				}						
			}
				
	}
	echo $Array;
?>