<?php
	include('is_logged.php');
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		$q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		$Filtro = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Filtro'], ENT_QUOTES)));
		$Estado = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Estado'], ENT_QUOTES)));
		$fechaIni = mysqli_real_escape_string($con,(strip_tags($_REQUEST['fechaIni'], ENT_QUOTES)));
		$fechaFin = mysqli_real_escape_string($con,(strip_tags($_REQUEST['fechaFin'], ENT_QUOTES)));
		$Pest = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Pest'], ENT_QUOTES)));
		if($Pest=='ResIngresos'){
			$sTable = "Ventas INNER JOIN AFILIADOS On AFILIADOS.IDENTIFICACION=VENTAS.AFILIADO
						inner join Usuarios on Usuarios.Nit=Ventas.Usuario
						inner join Campanas on Campanas.Numero=Ventas.Campana";
			$sWhere = "where (Fecha >= '$fechaIni' and  Fecha <= '$fechaFin') ";
			if ( $_GET['q'] != "" ){
				if ($Filtro == "Numero"){	
					$sWhere.= " and  (Ventas.Numero like '%$q%' )";	
				}else{
					if ($Filtro =="Nombre"){
						$sWhere.= " and  ((AFILIADOS.Primer_Nombre like '%$q%') OR (AFILIADOS.Segundo_Nombre like '%$q%')OR (AFILIADOS.Primer_Apellido like '%$q%') OR (AFILIADOS.Segundo_Apellido like '%$q%'))";	
					}else {
						if ($Filtro =="Cedula"){
							$sWhere.= " and  (AFILIADOS.Identificacion like '%$q%' )";	
						}else{
							if($Filtro =="Telefono"){
								$sWhere.= " and  (AFILIADOS.Telefono like '%$q%' )";	
							}else{
								if($Filtro =="Campaña"){
									$sWhere.= " and  (Campanas.Nombre like '%$q%' )";	
								}else{
									if($Filtro =="Usuario"){
										$sWhere.= " and  (Usuarios.Razon_Social like '%$q%' )";
									}else{
										if($Filtro =="Estado"){
											$sWhere.= " and  (Ventas.Estado_Campana like '%$q%' )";
										}
									}
								}
							}
						}
					}
				}	
			}
			if($_SESSION['Rol'] == '2'){
				$sWhere.= " and  Ventas.Usuario='".$_SESSION['Nit']."' ";
			}	
			if($Estado<>"Todos"){
				$sWhere.= " and VENTAS.Estado ='".$Estado."'";	
			} 
			$sWhere.=" order by Ventas.Numero ";
		}else{
			if($Pest=='ResEgresos'){
				$sTable = "Cuenta_Virtual 
							INNER JOIN VENTAS	On Ventas.Numero = 	Cuenta_Virtual.Venta
							INNER JOIN AFILIADOS On AFILIADOS.IDENTIFICACION=VENTAS.AFILIADO
							inner join Usuarios on Usuarios.Nit=Ventas.Usuario
							inner join Campanas on Campanas.Numero=Ventas.Campana
						";
			$sWhere = "where (Fecha >= '$fechaIni' and  Fecha <= '$fechaFin') ";
			if ( $_GET['q'] != "" ){
				if ($Filtro == "Numero"){	
					$sWhere.= " and  (Ventas.Numero like '%$q%' )";	
				}else{
					if ($Filtro =="Nombre"){
						$sWhere.= " and  ((AFILIADOS.Primer_Nombre like '%$q%') OR (AFILIADOS.Segundo_Nombre like '%$q%')OR (AFILIADOS.Primer_Apellido like '%$q%') OR (AFILIADOS.Segundo_Apellido like '%$q%'))";	
					}else {
						if ($Filtro =="Cedula"){
							$sWhere.= " and  (AFILIADOS.Identificacion like '%$q%' )";	
						}else{
							if($Filtro =="Telefono"){
								$sWhere.= " and  (AFILIADOS.Telefono like '%$q%' )";	
							}else{
								if($Filtro =="Campaña"){
									$sWhere.= " and  (Campanas.Nombre like '%$q%' )";	
								}else{
									if($Filtro =="Usuario"){
										$sWhere.= " and  (Usuarios.Razon_Social like '%$q%' )";
									}else{
										if($Filtro =="Estado"){
											$sWhere.= " and  (Ventas.Estado_Campana like '%$q%' )";
										}
									}
								}
							}
						}
					}
				}	
			}
			if($_SESSION['Rol'] == '2'){
				$sWhere.= " and  Ventas.Usuario='".$_SESSION['Nit']."' ";
			}	
			if($Estado<>"Todos"){
				$sWhere.= " and VENTAS.Estado ='".$Estado."'";	
			} 
			$sWhere.=" order by Ventas.Numero ";
			}
		}
		
		if($Pest=='ResIngresos'){
			$sql="SELECT VENTAS.Numero,AFILIADOS.Primer_Nombre,AFILIADOS.Primer_Apellido,VENTAS.Fecha,USUARIOS.Razon_Social,Ventas.Fecha,
			VENTAS.Estado_Campana,
			CAMPANAS.NOMBRE AS Campana,ventas.Valor,ventas.Porcentaje_Comision,Ventas.Campana as NCampana FROM  $sTable $sWhere ";	
			$query = mysqli_query($con, $sql);
		
				echo mysqli_error($con);
				$Array="";
				
					while ($row=mysqli_fetch_array($query)){
						
							$Numero=$row['Numero'];
							$Afiliado=$row['Primer_Nombre'].' '.$row['Primer_Apellido'] ;
							$Valor=$row['Valor'];
							$Usuario=$row['Razon_Social'];
							$Campana=$row['Campana'];
							$Estado=$row['Estado_Campana'];
							$Fecha=$row['Fecha'];
							$Porcentaje_Comision=$row['Porcentaje_Comision'];
							$label_class='label-default';
							$NCampana=$row['NCampana'];
							if($Array==''){
								$Array.='{"Numero":"'.$Numero.'", "Afiliado": "'.$Afiliado.'", "Usuario": "'.$Usuario.'", "Campaña": "'.$Campana.'", "Fecha": "'.date("d-m-Y", strtotime($Fecha)).'", "Estado": "'.$Estado.'", "Valor": "'.$Valor.'"}';
							}else{
								$Array.=',{"Numero":"'.$Numero.'", "Afiliado": "'.$Afiliado.'", "Usuario": "'.$Usuario.'", "Campaña": "'.$Campana.'", "Fecha": "'.date("d-m-Y", strtotime($Fecha)).'", "Estado": "'.$Estado.'", "Valor": "'.$Valor.'"}';

							}
						
					}
					
			
		}else{
			if($Pest=='ResEgresos'){
				$sql="SELECT VENTAS.Numero,AFILIADOS.Primer_Nombre,AFILIADOS.Primer_Apellido,VENTAS.Fecha,USUARIOS.Razon_Social,Ventas.Fecha,
						VENTAS.Estado_Campana,
						CAMPANAS.NOMBRE AS Campana,Cuenta_Virtual.Valor,Cuenta_Virtual.Porcentaje,Cuenta_Virtual.Comision,Ventas.Campana as NCampana FROM  $sTable $sWhere" ;
				$query = mysqli_query($con, $sql);
				
					echo mysqli_error($con);
					
					$Array="";
					
						while ($row=mysqli_fetch_array($query)){
		
								$Numero=$row['Numero'];
								$Afiliado=$row['Primer_Nombre'].' '.$row['Primer_Apellido'] ;
								$Valor=$row['Comision'];
								$Usuario=$row['Razon_Social'];
								$Campana=$row['Campana'];
								$Estado=$row['Estado_Campana'];
								$Fecha=$row['Fecha'];
								$Porcentaje_Comision=$row['Porcentaje'];
								$label_class='label-default';
								$NCampana=$row['NCampana'];
								if($Array==''){
									$Array.='{"Numero":"'.$Numero.'", "Afiliado": "'.$Afiliado.'", "Usuario": "'.$Usuario.'", "Campaña": "'.$Campana.'", "Fecha": "'.date("d-m-Y", strtotime($Fecha)).'", "Porcentaje": "'.$Porcentaje_Comision.'", "Comision": "'.$Valor.'"}';
								}else{
									$Array.=',{"Numero":"'.$Numero.'", "Afiliado": "'.$Afiliado.'", "Usuario": "'.$Usuario.'", "Campaña": "'.$Campana.'", "Fecha": "'.date("d-m-Y", strtotime($Fecha)).'", "Porcentaje": "'.$Porcentaje_Comision.'", "Comision": "'.$Valor.'"}';
	
								}
							
						}
						
				}		
		}


		
		
	}
	echo $Array;
?>