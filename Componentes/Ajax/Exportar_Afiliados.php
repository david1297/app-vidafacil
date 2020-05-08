<?php
	include('is_logged.php');
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		$q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		$Filtro = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Filtro'], ENT_QUOTES)));
		$EFiltro = mysqli_real_escape_string($con,(strip_tags($_REQUEST['EFiltro'], ENT_QUOTES)));
		$VFiltro = mysqli_real_escape_string($con,(strip_tags($_REQUEST['VFiltro'], ENT_QUOTES)));
		$FComercio = mysqli_real_escape_string($con,(strip_tags($_REQUEST['FComercio'], ENT_QUOTES)));

		$sTable = "AFILIADOS inner join DEPARTAMENTOS on AFILIADOS.Departamento = DEPARTAMENTOS.Codigo
							 inner join CIUDADES on AFILIADOS.Ciudad =CIUDADES.Codigo and  DEPARTAMENTOS.Codigo = CIUDADES.Departamento 
							 inner join TIPIFICACIONES on TIPIFICACIONES.Numero = AFILIADOS.Tipificacion
							 left join USUARIOS on AFILIADOS.Comercio= USUARIOS.Nit
							 inner join AESTADOS on AESTADOS.Codigo = AFILIADOS.AEstado
							 ";
		$sWhere = "where AFILIADOS.Visible ='S'";
		if ( $_GET['q'] != "" ){
			if ($Filtro == "Identificacion"){
				$sWhere.= " and  (AFILIADOS.Identificacion like '%$q%' )";	
			}else{
				if ($Filtro =="Nombre"){
					$sWhere.= " and  (AFILIADOS.Nombre_Completo like '%$q%')  ";	
				}else{
					if ($Filtro =="Ciudad"){
						$sWhere.= " and  (CIUDADES.Nombre like '%$q%')";
					}else{
						if ($Filtro=="Departamento"){
							$sWhere.= " and  (AFILIADOS.Departamento like '%$q%')";
						} else {
							if ($Filtro=="Telefono"){
								$sWhere.= " and  (AFILIADOS.Telefono like '%$q%')";
							}
						}
					}
				}
			}
			
		}
		if($EFiltro<>"Todos"){
			if($EFiltro=='Estado'){
				$sWhere.= " and AFILIADOS.Estado ='".$VFiltro."'";		
			}else{
					if($EFiltro=='Tipificacion'){
						$sWhere.= " and TIPIFICACIONES.NCategoria ='".$VFiltro."'";		
					}else{
						if($EFiltro=='EstadoTx'){
							$sWhere.= " and AFILIADOS.AEstado ='".$VFiltro."'";		
						}
					}
			}

			
		} 
		if ($FComercio<>"Todos"){
			$sWhere.= " and AFILIADOS.Comercio ='".$FComercio."'";		
		}
		$query1=mysqli_query($con, 'SELECT Estado FROM PERMISOS where Modulo="Afiliados" and Permiso="ConsultarTodo" and  Usuario ="'.$_SESSION['Nit'].'";');
		$rw_Admin1=mysqli_fetch_array($query1);
		if($_SESSION['Rol']=='2' and $rw_Admin1['Estado']=='false'){
			$sWhere.= " and  AFILIADOS.Comercio='".$_SESSION['Nit']."' ";
		}

	
		$sql="SELECT
		AFILIADOS.NContrato,AFILIADOS.FechaCracion,AFILIADOS.Nombre_Completo,AFILIADOS.Telefono,AFILIADOS.Correo,
		TIPIFICACIONES.Nombre as Tipificacion,
		
		 AESTADOS.Nombre as AEstado,USUARIOS.Razon_Social,AFILIADOS.Id,
		AFILIADOS.Comercio,TIPIFICACIONES.Categoria, TIPIFICACIONES.NCategoria,
		Identificacion,Primer_Nombre,Primer_Apellido,DEPARTAMENTOS.Nombre as Departamento,CIUDADES.Nombre as Ciudad ,
		AFILIADOS.Direccion,AFILIADOS.Estado FROM  $sTable $sWhere ";
		$query = mysqli_query($con, $sql);
		$Array="";
				while ($row=mysqli_fetch_array($query)){

						$NContrato=$row['NContrato'];
						$FechaCracion=$row['FechaCracion'];
						$Nombre_Completo=$row['Nombre_Completo'];
						$Identificacion=$row['Identificacion'];
						$Direccion=$row['Direccion'];
						$Ciudad=$row['Ciudad'];
						$Telefono=$row['Telefono'];
						$Correo=$row['Correo'];
						$Razon_Social=$row['Razon_Social'];
						$AEstado=$row['AEstado'];
						$SubTipificacion=$row['Tipificacion'];
						
						$Comercio=$row['Comercio'];
						$Id=$row['Id'];
						
						
						$Estado=$row['Estado'];
						
						
						$Tipificacion = $row['Categoria'];

						if($Array==''){
							$Array.='{
								"ID TRANSACCION ":"",
								"NUMERO CONTRATO":"'.$NContrato.'",
								"FECHA DE VENTA ":"'.date("d-m-Y", strtotime($FechaCracion)).'",
								"NOMBRE  Y APELLIDOS ":"'.$Nombre_Completo.'",
								"CEDULA":"'.$Identificacion.'",
								"DIRECCION ":"'.$Direccion.'",
								"CIUDAD ":"'.$Ciudad.'",
								"BARRIO ":"",
								"CELULAR":"'.$Telefono.'",
								"CORREO":"'.$Correo.'",
								"COMERCIO":"'.$Razon_Social.'",
								"DURACION":"",
								"ESTADO ":"'.$AEstado.'",
								"VALOR ":"",
								"TIPIFICACION ":"'.$Tipificacion.'",
								"OBSERVACION ":"",
								"SUBTIPIFICACION ":"'.$SubTipificacion.'",
								"AGENDAMIENTO ":"" }';
						}else{
							$Array.=',{
								"ID TRANSACCION ":"",
								"NUMERO CONTRATO":"'.$NContrato.'",
								"FECHA DE VENTA ":"'.date("d-m-Y", strtotime($FechaCracion)).'",
								"NOMBRE  Y APELLIDOS ":"'.$Nombre_Completo.'",
								"CEDULA":"'.$Identificacion.'",
								"DIRECCION ":"'.$Direccion.'",
								"CIUDAD ":"'.$Ciudad.'",
								"BARRIO ":"",
								"CELULAR":"'.$Telefono.'",
								"CORREO":"'.$Correo.'",
								"COMERCIO":"'.$Razon_Social.'",
								"DURACION":"",
								"ESTADO ":"'.$AEstado.'",
								"VALOR ":"",
								"TIPIFICACION ":"'.$Tipificacion.'",
								"OBSERVACION ":"",
								"SUBTIPIFICACION ":"'.$SubTipificacion.'",
								"AGENDAMIENTO ":"" }';
						}
						
					
				}
				echo $Array;
				
		
	}
?>