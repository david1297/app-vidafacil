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
			$sTable = "CUENTA_VIRTUAL 
			Inner Join USUARIOS on USUARIOS.Nit =CUENTA_VIRTUAL.Usuario";
			$sWhere = "where CUENTA_VIRTUAL.Credito <>0 and (Fecha >= '$fechaIni' and  Fecha <= '$fechaFin') ";
			if($EFiltro<>"Todos"){
				if($EFiltro=='Usuario'){
					$sWhere.= " and CUENTA_VIRTUAL.Usuario ='".$VFiltro."'";		
				}else{
					if($EFiltro=='Tipo'){
						$sWhere.= " and CUENTA_VIRTUAL.Tipo ='".$VFiltro."'";		
					}
				}	
			} 
			$Order =" order by USUARIOS.Razon_Social ";
			$Group = "group by CUENTA_VIRTUAL.Tipo,CUENTA_VIRTUAL.NDocumento,CUENTA_VIRTUAL.Fecha,USUARIOS.Razon_Social,CUENTA_VIRTUAL.Estado";
		}else{
			if($Pest=='ResEgresos'){
				$sTable = "CUENTA_VIRTUAL 
			Inner Join USUARIOS on USUARIOS.Nit =CUENTA_VIRTUAL.Usuario";
			$sWhere = "where CUENTA_VIRTUAL.Debito <>0 and (Fecha >= '$fechaIni' and  Fecha <= '$fechaFin') ";
			if($EFiltro<>"Todos"){
				if($EFiltro=='Usuario'){
					$sWhere.= " and CUENTA_VIRTUAL.Usuario ='".$VFiltro."'";		
				}else{
					if($EFiltro=='Tipo'){
						$sWhere.= " and CUENTA_VIRTUAL.Tipo ='".$VFiltro."'";		
					}
				}	
			} 
			$Order =" order by USUARIOS.Razon_Social ";
			$Group = "group by CUENTA_VIRTUAL.Tipo,CUENTA_VIRTUAL.NDocumento,CUENTA_VIRTUAL.Fecha,USUARIOS.Razon_Social,CUENTA_VIRTUAL.Estado";
			}
		}
		
		if($Pest=='ResIngresos'){
			$sql="SELECT CUENTA_VIRTUAL.Tipo,CUENTA_VIRTUAL.NDocumento,CUENTA_VIRTUAL.Fecha,CUENTA_VIRTUAL.Credito,
			USUARIOS.Razon_Social,CUENTA_VIRTUAL.Estado FROM $sTable $sWhere $Group $Order ";	
			$query = mysqli_query($con, $sql);
			echo mysqli_error($con);
			$Array="";	
			while ($row=mysqli_fetch_array($query)){
				$Tipo=$row['Tipo'];
				$NDocumento=$row['NDocumento'];
				$Valor=$row['Credito'];
				$Usuario=$row['Razon_Social'];
				$Estado=$row['Estado'];
				$Fecha=$row['Fecha'];
				if($Array==''){
					$Array.='{"Tipo":"'.$Tipo.'", "Numero": "'.$NDocumento.'", "Usuario": "'.$Usuario.'", "Estado": "'.$Estado.'", "Fecha": "'.date("d-m-Y", strtotime($Fecha)).'",  "Valor": "'.$Valor.'"}';
				}else{
					$Array.=',{"Tipo":"'.$Tipo.'", "Numero": "'.$NDocumento.'", "Usuario": "'.$Usuario.'", "Estado": "'.$Estado.'", "Fecha": "'.date("d-m-Y", strtotime($Fecha)).'",  "Valor": "'.$Valor.'"}';
				}						
			}
		}else{
			if($Pest=='ResEgresos'){
				$sql="SELECT CUENTA_VIRTUAL.Tipo,CUENTA_VIRTUAL.NDocumento,CUENTA_VIRTUAL.Fecha,CUENTA_VIRTUAL.Debito,
				USUARIOS.Razon_Social,CUENTA_VIRTUAL.Estado FROM $sTable $sWhere $Group $Order ";	
				$query = mysqli_query($con, $sql);
				echo mysqli_error($con);
				$Array="";	
				while ($row=mysqli_fetch_array($query)){
					$Tipo=$row['Tipo'];
					$NDocumento=$row['NDocumento'];
					$Valor=$row['Debito'];
					$Usuario=$row['Razon_Social'];
					$Estado=$row['Estado'];
					$Fecha=$row['Fecha'];
					if($Array==''){
						$Array.='{"Tipo":"'.$Tipo.'", "Numero": "'.$NDocumento.'", "Usuario": "'.$Usuario.'", "Estado": "'.$Estado.'", "Fecha": "'.date("d-m-Y", strtotime($Fecha)).'",  "Valor": "'.$Valor.'"}';
					}else{
						$Array.=',{"Tipo":"'.$Tipo.'", "Numero": "'.$NDocumento.'", "Usuario": "'.$Usuario.'", "Estado": "'.$Estado.'", "Fecha": "'.date("d-m-Y", strtotime($Fecha)).'",  "Valor": "'.$Valor.'"}';
					}						
				}		
			}		
		}		
	}
	echo $Array;
?>