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
			$sTable = "cuenta_virtual 
			Inner Join Usuarios on Usuarios.Nit =cuenta_virtual.Usuario";
			$sWhere = "where cuenta_virtual.Estado= 'Pagada' and cuenta_virtual.Credito <>0 and (Fecha >= '$fechaIni' and  Fecha <= '$fechaFin') ";
			if($EFiltro<>"Todos"){
				if($EFiltro=='Usuario'){
					$sWhere.= " and cuenta_virtual.Usuario ='".$VFiltro."'";		
				}else{
					if($EFiltro=='Tipo'){
						$sWhere.= " and cuenta_virtual.Tipo ='".$VFiltro."'";		
					}
				}	
			} 
			$Order =" order by usuarios.Razon_Social ";
			$Group = "group by cuenta_virtual.Tipo,cuenta_virtual.NDocumento,cuenta_virtual.Fecha,usuarios.Razon_Social,cuenta_virtual.Estado";
		}else{
			if($Pest=='ResEgresos'){
				$sTable = "cuenta_virtual 
			Inner Join Usuarios on Usuarios.Nit =cuenta_virtual.Usuario";
			$sWhere = "where cuenta_virtual.Estado= 'Pagada' and cuenta_virtual.Debito <>0 and (Fecha >= '$fechaIni' and  Fecha <= '$fechaFin') ";
			if($EFiltro<>"Todos"){
				if($EFiltro=='Usuario'){
					$sWhere.= " and cuenta_virtual.Usuario ='".$VFiltro."'";		
				}else{
					if($EFiltro=='Tipo'){
						$sWhere.= " and cuenta_virtual.Tipo ='".$VFiltro."'";		
					}
				}	
			} 
			$Order =" order by usuarios.Razon_Social ";
			$Group = "group by cuenta_virtual.Tipo,cuenta_virtual.NDocumento,cuenta_virtual.Fecha,usuarios.Razon_Social,cuenta_virtual.Estado";
			}
		}
		
		if($Pest=='ResIngresos'){
			$sql="SELECT cuenta_virtual.Tipo,cuenta_virtual.NDocumento,cuenta_virtual.Fecha,cuenta_virtual.Credito,
			usuarios.Razon_Social,cuenta_virtual.Estado FROM $sTable $sWhere $Group $Order ";	
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
				$sql="SELECT cuenta_virtual.Tipo,cuenta_virtual.NDocumento,cuenta_virtual.Fecha,cuenta_virtual.Debito,
				usuarios.Razon_Social,cuenta_virtual.Estado FROM $sTable $sWhere $Group $Order ";	
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