<?php

include('is_logged.php');
$session_id= session_id();



require_once ("../../config/db.php");
require_once ("../../config/conexion.php");
if (isset($_POST['Id'])){
	$Id=$_POST['Id'];	
	$Where="WHERE AGENDAMIENTOS.Afiliado=".$Id;
	$query1=mysqli_query($con, 'SELECT Estado FROM PERMISOS where Modulo="Afiliados" and Permiso="ConsultarTodoA" 
		and  Usuario ="'.$_SESSION['Nit'].'";');
		$rw_Admin1=mysqli_fetch_array($query1);

		if(($_SESSION['Rol']=='2') && ($rw_Admin1['Estado']=='false')){
			$Where.= " and  AGENDAMIENTOS.Usuario='".$_SESSION['Nit']."' ";
		}
}else{
	$Where=" where 1=1  ";
	if (isset($_REQUEST['H'])){
		$q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		$Filtro = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Filtro'], ENT_QUOTES)));
		$fechaIni = mysqli_real_escape_string($con,(strip_tags($_REQUEST['fechaIni'], ENT_QUOTES)));
		$fechaFin = mysqli_real_escape_string($con,(strip_tags($_REQUEST['fechaFin'], ENT_QUOTES)));
		$EFiltro = mysqli_real_escape_string($con,(strip_tags($_REQUEST['EFiltro'], ENT_QUOTES)));
		$FComercio = mysqli_real_escape_string($con,(strip_tags($_REQUEST['FComercio'], ENT_QUOTES)));

		$Where.= " and (AGENDAMIENTOS.Fecha >= '$fechaIni' and  AGENDAMIENTOS.Fecha <= '$fechaFin') ";
		if ( $_GET['q'] != "" ){
			if ($Filtro == "Identificacion"){
				$Where.= " and  (AFILIADOS.Identificacion like '%$q%' )";	
			}else{
				if ($Filtro =="Nombre"){
					$Where.= " and  (AFILIADOS.Nombre_Completo like '%$q%')  ";	
				}else{
					if ($Filtro =="Correo"){
						$Where.= " and  (AFILIADOS.Correo like '%$q%')";
					}else{
						if ($Filtro=="Telefono"){
							$Where.= " and  (AFILIADOS.Telefono like '%$q%')";
						}
					}
				}
			}
			
		}
		if($EFiltro <>'Todos'){
			$Where.= " and  (AGENDAMIENTOS.Gestion = '$EFiltro' )";		
		}
		if($FComercio <>'Todos'){
			$Where.= " and  (AGENDAMIENTOS.Usuario = '$FComercio' )";		
		}

		


	}
		$query1=mysqli_query($con, 'SELECT Estado FROM PERMISOS where Modulo="Afiliados" and Permiso="ConsultarTodoA" 
		and  Usuario ="'.$_SESSION['Nit'].'";');
		$rw_Admin1=mysqli_fetch_array($query1);

		if(($_SESSION['Rol']=='2') && ($rw_Admin1['Estado']=='false')){
			$Where.= " and  AGENDAMIENTOS.Usuario='".$_SESSION['Nit']."' ";
		}
		
}
	?>
	<div class="table-responsive">
								<table class="table table-hover">
									<tr  class="warning">
										<th>Numero</th>
										<th>Afiliado</th>
										<th>Fecha</th>
										<th>Gestion</th>
										<th>Descripcion</th>
										<th>Usuario</th>
										<th>Ver</th>
									</tr>
									<?php
									$Sql="select AGENDAMIENTOS.Id,AGENDAMIENTOS.Fecha,AGENDAMIENTOS.Descripcion,AGENDAMIENTOS.Respuesta,
									GESTION.Nombre,USUARIOS.Razon_Social,AFILIADOS.Nombre_Completo
									from AGENDAMIENTOS 
									inner join GESTION on GESTION.Codigo= AGENDAMIENTOS.Gestion
									inner join USUARIOS on AGENDAMIENTOS.Usuario = USUARIOS.Nit
									inner join AFILIADOS on AFILIADOS.Id = AGENDAMIENTOS.Afiliado
									";
									$Sql.=$Where."  order by AGENDAMIENTOS.Fecha DESC";
									//echo $Sql;
									$query1=mysqli_query($con, $Sql);							
									while($rw_Admin1=mysqli_fetch_array($query1)){
										$AId=$rw_Admin1[0];
										$AFecha=$rw_Admin1[1];
										$ADescripcion=$rw_Admin1[2];
										$ARespuesta=$rw_Admin1[3];
										$AGestion=$rw_Admin1[4];
										$Usuario=$rw_Admin1[5];
										$Nombre_Completo=$rw_Admin1[6];
										?>
										<tr>
											<td><?php echo $AId; ?></td>
											<td><?php echo $Nombre_Completo; ?></td>
											<td><?php echo date("d-m-Y", strtotime($AFecha)); ?></td>
											<td><?php echo $AGestion; ?></td>
											<td><?php echo $ADescripcion; ?></td>
											<td><?php echo $Usuario; ?></td>
											<td class="text-center">
												<a href="#" class='btn btn-default' title='Ver Gestion' onclick="VerGestion('<?php echo $AId;?>');"><i class="glyphicon glyphicon-eye-open"></i></a> 
											</td>
										</tr>
										<?php
									}
									?>	
									
								</table>
							</div>
	<?php

?>