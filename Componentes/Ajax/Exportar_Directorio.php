<?php
	include('is_logged.php');
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		$q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		$Filtro = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Filtro'], ENT_QUOTES)));
		$fechaIni = mysqli_real_escape_string($con,(strip_tags($_REQUEST['fechaIni'], ENT_QUOTES)));

		$sTable = "DIRECTORIO inner join CATEGORIAS on CATEGORIAS.Codigo = DIRECTORIO.Categoria";
		$sWhere = "where (Vigencia >= '$fechaIni' ) ";
		if ( $_GET['q'] != "" ){
			if ($Filtro == "Convenio"){
				$sWhere.= " and  (Convenio like '%$q%' )";	
			}else{
				if ($Filtro =="Servicio"){
					$sWhere.= " and  (Servicio like '%$q%')  ";	
				}else{
					if ($Filtro =="Descipcion"){
						$sWhere.= " and  (Descripcion like '%$q%')";
					}else{
						if ($Filtro=="Correo"){
							$sWhere.= " and  (Correo like '%$q%')";
						} else {
							if ($Filtro=="Telefono"){
								$sWhere.= " and  (Telefono like '%$q%')";
							}else{
								if ($Filtro=="Direccion"){
									$sWhere.= " and  (Direccion like '%$q%')";
								}
							}
						}
					}
				}
			}
			
		}
		
		$sql="SELECT ServicioS,Convenio,Servicio,Ciudad,ubicacion,Porcentaje,Descripcion,Terminos,
		Uso,Persona,Correo,Telefono,Direccion,Vigencia,FirmaVf,FirmaAc,Correo1,CATEGORIAS.Nombre as Categoria FROM  $sTable $sWhere";
		$query = mysqli_query($con, $sql);
		
			$Array="";
				while ($row=mysqli_fetch_array($query)){

						$ServicioS=$row['ServicioS'];
						$Convenio=$row['Convenio'];
						$Servicio=$row['Servicio'];
						$Ciudad=$row['Ciudad'];
						$ubicacion=$row['ubicacion'];
						$Porcentaje=$row['Porcentaje'];
						$Descripcion=$row['Descripcion'];
						$Terminos=$row['Terminos'];
						$Uso=$row['Uso'];
						$Persona=$row['Persona'];
						$Correo=$row['Correo'];
						$Telefono=$row['Telefono'];
						$Direccion=$row['Direccion'];
						$Vigencia=$row['Vigencia'];
						$FirmaVf=$row['FirmaVf'];
						$FirmaAc=$row['FirmaAc'];
						$Correo1=$row['Correo1'];
						$Categoria=$row['Categoria'];

						
						
						if($Array==''){
							$Array.='{ "Servicios  soluciones":"'.$ServicioS.'","Convenio ":"'.$Convenio.'","Servicio ":"'.$Servicio.'","Ciudad ":"'.$Ciudad.'",
										"Ubicación ":"'.$ubicacion.'","Porcentaje ":"'.$Porcentaje.'","Descripcion ":"'.$Descripcion.'",
										"Terminos y condiciones ":"'.$Terminos.'","Uso del servicio ":"'.$Uso.'","Persona de contacto":"'.$Persona.'",
										"Correo":"'.$Correo.'","Telefono":"'.$Telefono.'","Direccion":"'.$Direccion.'","Vigencia":"'.date("d-m-Y", strtotime($Vigencia)).'",
										"FirmaVf":"'.$FirmaVf.'","FirmaAc":"'.$FirmaAc.'","Correo1":"'.$Correo1.'","Categoria":"'.$Categoria.'"}';
						}else{
							$Array.=',{ "Servicios  soluciones":"'.$ServicioS.'","Convenio ":"'.$Convenio.'","Servicio ":"'.$Servicio.'","Ciudad ":"'.$Ciudad.'",
								"Ubicación ":"'.$ubicacion.'","Porcentaje ":"'.$Porcentaje.'","Descripcion ":"'.$Descripcion.'",
								"Terminos y condiciones ":"'.$Terminos.'","Uso del servicio ":"'.$Uso.'","Persona de contacto":"'.$Persona.'",
								"Correo":"'.$Correo.'","Telefono":"'.$Telefono.'","Direccion":"'.$Direccion.'","Vigencia":"'.date("d-m-Y", strtotime($Vigencia)).'",
								"FirmaVf":"'.$FirmaVf.'","FirmaAc":"'.$FirmaAc.'","Correo1":"'.$Correo1.'","Categoria":"'.$Categoria.'"}';
						}
				}
				echo $Array;
				
		
	}
?>