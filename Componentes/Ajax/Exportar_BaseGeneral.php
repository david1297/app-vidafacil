<?php
	include('is_logged.php');
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		$q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		$Filtro = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Filtro'], ENT_QUOTES)));
		$fechaIni = mysqli_real_escape_string($con,(strip_tags($_REQUEST['fechaIni'], ENT_QUOTES)));
		$fechaFin = mysqli_real_escape_string($con,(strip_tags($_REQUEST['fechaFin'], ENT_QUOTES)));
		$EFiltro = mysqli_real_escape_string($con,(strip_tags($_REQUEST['EFiltro'], ENT_QUOTES)));
		$VFiltro = mysqli_real_escape_string($con,(strip_tags($_REQUEST['VFiltro'], ENT_QUOTES)));
		$Forma_Pago = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Forma_Pago'], ENT_QUOTES)));

		$sTable = "VENTAS INNER JOIN AFILIADOS On AFILIADOS.Id=VENTAS.AFILIADO
		inner join USUARIOS on USUARIOS.Nit=VENTAS.Usuario
		inner join CAMPANAS on CAMPANAS.Numero=VENTAS.Campana
		inner join TIPIFICACIONES on TIPIFICACIONES.Numero = VENTAS.Estado_Campana
		inner join CIUDADES ON CIUDADES.Codigo = AFILIADOS.Ciudad
		left join AESTADOS on AESTADOS.Codigo = AFILIADOS.AEstado
		inner join FORMAS_PAGO on FORMAS_PAGO.Codigo = VENTAS.Forma_Pago";
	

		
		$sWhere = "where (Fecha >= '$fechaIni' and  Fecha <= '$fechaFin') ";
		if ( $_GET['q'] != "" ){
			if ($Filtro == "Numero"){
				$sWhere.= " and  (VENTAS.Numero like '%$q%' )";	
			}else{
				if ($Filtro =="Nombre"){
					$sWhere.= " and  (VENTAS.Nombre_Completo like '%$q%' )";	
				}else {
					if ($Filtro =="Identificacion"){
						$sWhere.= " and  (AFILIADOS.Identificacion like '%$q%' )";	
					}else{
						if($Filtro =="Telefono"){
							$sWhere.= " and  (AFILIADOS.Telefono like '%$q%' )";	
						}else{
							if ($Filtro =="Correo"){
								$sWhere.= " and  (VENTAS.Correo like '%$q%' )";	
							}else{
								
							}
						}
					}

				}

			}
			
		}
		if ($Filtro =="SAfiliado"){
			$sWhere.= " and  (VENTAS.SAfiliado='S' )";	
		}
		if($EFiltro<>"Todos"){
			if($EFiltro=='Usuario'){
				$sWhere.= " and VENTAS.Usuario ='".$VFiltro."'";		
			}else{
				if($EFiltro=='Estado'){
					$sWhere.= " and VENTAS.Estado ='".$VFiltro."'";		
				}else{
					if($EFiltro=='Campana'){
						$sWhere.= " and VENTAS.Campana ='".$VFiltro."'";		
					}else{
						if($EFiltro=='Departamento'){
							$sWhere.= " and AFILIADOS.Departamento ='".$VFiltro."'";
						}else{
							if($EFiltro=='Ciudad'){
								$sWhere.= " and AFILIADOS.Ciudad ='".$VFiltro."'";
							}	
						}

					}
				}

			}	
		} 
		$query1=mysqli_query($con, 'SELECT Estado FROM PERMISOS where Modulo="Transacciones" and Permiso="ConsultarTodo" and  Usuario ="'.$_SESSION['Nit'].'";');
		$rw_Admin1=mysqli_fetch_array($query1);
		if($_SESSION['Rol']=='2' and $rw_Admin1['Estado']=='false'){
			$sWhere.= " and  VENTAS.Usuario='".$_SESSION['Nit']."' ";
		}

		if($Forma_Pago=='Ponal'){
			$sWhere.=" and FORMAS_PAGO.Tipo ='Policia'";
		}else{
			$sWhere.=" and FORMAS_PAGO.Tipo <>'Policia'";
		}

		
		$sWhere.=" order by VENTAS.Numero DESC ";
		
		

		$sql="SELECT VENTAS.Fecha,AFILIADOS.Nombre_Completo,AFILIADOS.Identificacion,AFILIADOS.Direccion,CIUDADES.Nombre,
		AFILIADOS.Telefono,AFILIADOS.Telefono2,AFILIADOS.Correo,
		
		USUARIOS.Razon_Social as Comercio,AESTADOS.Nombre as Estado,TIPIFICACIONES.Nombre as  SubTipificacion ,
		TIPIFICACIONES.Categoria as Tipificacion,
		
		VENTAS.Valor,VENTAS.Cuotas,VENTAS.Token
		FROM  $sTable $sWhere ";


		$query = mysqli_query($con, $sql);
		$Array="";
		while ($row=mysqli_fetch_array($query)){
			$Fecha=$row['Fecha'];
			$Afiliado=$row['Nombre_Completo'];
			$Identificacion=$row['Identificacion'];
			$Direccion=$row['Direccion'];
			$Ciudad=$row['Nombre'];
			$Telefono=$row['Telefono'];
			$Telefono2=$row['Telefono2'];
			$Correo=$row['Correo'];
			$Valor=$row['Valor'];
			$Cuotas=$row['Cuotas'];
			$Token=$row['Token'];

			$Comercio=$row['Comercio'];
			$Estado=$row['Estado'];
			$SubTipificacion=$row['SubTipificacion'];
			$Tipificacion=$row['Tipificacion'];

			if($Forma_Pago=='Ponal'){
				$ValorCuota= $Valor/$Cuotas;
				if($Array==''){
					$Array.='{"FECHA DE VENTA":"'.date("d-m-Y", strtotime($Fecha)).'", "NOMBRE Y APELLIDOS": "'.$Afiliado.'", "CEDULA": "'.$Identificacion.'",
						"DIRECCION ": "'.$Direccion.'", "CIUDAD": "'.$Ciudad.'",  "BARRIO": "N/A","TELEFONO 1": "'.$Telefono.'"
						,"TELEFONO 2": "'.$Telefono2.'" ,"CORREO": "'.$Correo.'","DURACION":"N/A","VALOR CUOTA" :"'.$ValorCuota.'"
						,"VALOR TOTAL" :"'.$Valor.'","TOKEN" :"'.$Token.'" }';
				}else{
					$Array.=',{"FECHA DE VENTA":"'.date("d-m-Y", strtotime($Fecha)).'", "NOMBRE Y APELLIDOS": "'.$Afiliado.'", "CEDULA": "'.$Identificacion.'",
						"DIRECCION ": "'.$Direccion.'", "CIUDAD": "'.$Ciudad.'",  "BARRIO": "N/A","TELEFONO 1": "'.$Telefono.'"
						,"TELEFONO 2": "'.$Telefono2.'" ,"CORREO": "'.$Correo.'","DURACION":"N/A","VALOR CUOTA" :"'.$ValorCuota.'"
						,"VALOR TOTAL" :"'.$Valor.'","TOKEN" :"'.$Token.'" }';
				}
			}else{
				if($Array==''){
					$Array.='{"FECHA DE VENTA":"'.date("d-m-Y", strtotime($Fecha)).'", "NOMBRE Y APELLIDOS": "'.$Afiliado.'", "CEDULA": "'.$Identificacion.'",
						"DIRECCION ": "'.$Direccion.'", "CIUDAD": "'.$Ciudad.'",  "BARRIO": "N/A","TELEFONO 1": "'.$Telefono.'"
						,"TELEFONO 2": "'.$Telefono2.'" ,"CORREO": "'.$Correo.'","DURACION":"N/A",
						"ESTADO": "'.$Estado.'","VALOR" :"'.$Valor.'","TIPIFICACION": "'.$Tipificacion.'","SUBTIPIFICACION": "'.$SubTipificacion.'"
						,"TOKEN" :"'.$Token.'" }';
				}else{
					$Array.=',{"FECHA DE VENTA":"'.date("d-m-Y", strtotime($Fecha)).'", "NOMBRE Y APELLIDOS": "'.$Afiliado.'", "CEDULA": "'.$Identificacion.'",
						"DIRECCION ": "'.$Direccion.'", "CIUDAD": "'.$Ciudad.'",  "BARRIO": "N/A","TELEFONO 1": "'.$Telefono.'"
						,"TELEFONO 2": "'.$Telefono2.'" ,"CORREO": "'.$Correo.'","DURACION":"N/A",
						"ESTADO": "'.$Estado.'","VALOR" :"'.$Valor.'","TIPIFICACION": "'.$Tipificacion.'","SUBTIPIFICACION": "'.$SubTipificacion.'"
						,"TOKEN" :"'.$Token.'" }';
				}
			}
					
		}
	}
	echo $Array;
?>