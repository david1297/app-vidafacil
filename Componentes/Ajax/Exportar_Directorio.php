<?php
	include('is_logged.php');
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		$q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		$Filtro = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Filtro'], ENT_QUOTES)));

		$sTable = "DIRECTORIO inner join CATEGORIAS on CATEGORIAS.Codigo = DIRECTORIO.Categoria";
		$sWhere = "where 1=1 ";
		if ( $_GET['q'] != "" ){
			if ($Filtro == "NombreEmpresa"){
				$sWhere.= " and  (NombreEmpresa like '%$q%' )";	
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
							if ($Filtro=="Celular"){
								$sWhere.= " and  (Celular like '%$q%')";
							}
						}
					}
				}
			}
			
		}
		
		$sql="SELECT FechaI,FechaV,NombreEmpresa,Beneficio,DescuentoH,Cobertura,Servicio,Descripcion,PersonaC,Celular,Correo,Whatsapp,PaginaWeb,Uso,Terminos,Politicas,AutorizacionLogo,CATEGORIAS.Nombre as Categoria FROM  $sTable $sWhere";
		$query = mysqli_query($con, $sql);
		
			$Array="";
				while ($row=mysqli_fetch_array($query)){


		
	$Categoria=$row['Categoria'];
	$FechaI=$row['FechaI'];
	$FechaV=$row['FechaV'];
	$NombreEmpresa=$row['NombreEmpresa'];
	$Beneficio=$row['Beneficio'];
	$DescuentoH=$row['DescuentoH'];
	$Cobertura=$row['Cobertura'];
	$Servicio=$row['Servicio'];
	$Descripcion=$row['Descripcion'];
	$PersonaC=$row['PersonaC'];
	$Celular=$row['Celular'];
	$Correo=$row['Correo'];
	$Whatsapp=$row['Whatsapp'];
	$PaginaWeb=$row['PaginaWeb'];
	$Uso = $row['Uso'];
	$Terminos=$row['Terminos'];
	$Politicas=$row['Politicas'];
	$AutorizacionLogo=$row['AutorizacionLogo'];	
						if($Array==''){
							$Array.='{ "Fecha Inicio":"'.$FechaI.'","Fecha de Vencimiento ":"'.$FechaV.'","Nombre Empresa ":"'.$NombreEmpresa.'","Beneficio ":"'.$Beneficio.'",
										"Descuento Hasta":"'.$DescuentoH.'","Cobertura ":"'.$Cobertura.'","Servicio ":"'.$Servicio.'",
										"Descripcion":"'.$Descripcion.'","Persona de contacto":"'.$PersonaC.'","Celular":"'.$Celular.'",
										"Correo":"'.$Correo.'","Whatsapp":"'.$Whatsapp.'","PaginaWeb":"'.$PaginaWeb.'","Uso del servicio ":"'.$Uso.'",
										"Terminos y condiciones":"'.$Terminos.'","Politicas de Uso":"'.$Politicas.'","AutorizacionLogo":"'.$AutorizacionLogo.'",
										"Categoria":"'.$Categoria.'"}';
						}else{
							$Array.=',{ "Fecha Inicio":"'.$FechaI.'","Fecha de Vencimiento ":"'.$FechaV.'","Nombre Empresa ":"'.$NombreEmpresa.'","Beneficio ":"'.$Beneficio.'",
								"Descuento Hasta":"'.$DescuentoH.'","Cobertura ":"'.$Cobertura.'","Servicio ":"'.$Servicio.'",
								"Descripcion":"'.$Descripcion.'","Persona de contacto":"'.$PersonaC.'","Celular":"'.$Celular.'",
								"Correo":"'.$Correo.'","Whatsapp":"'.$Whatsapp.'","PaginaWeb":"'.$PaginaWeb.'","Uso del servicio ":"'.$Uso.'",
								"Terminos y condiciones":"'.$Terminos.'","Politicas de Uso":"'.$Politicas.'","AutorizacionLogo":"'.$AutorizacionLogo.'",
								"Categoria":"'.$Categoria.'"}';
						}
				}
				echo $Array;
				
		
	}
?>