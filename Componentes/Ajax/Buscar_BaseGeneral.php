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

		$sTable = "VENTAS INNER JOIN AFILIADOS On AFILIADOS.Id=VENTAS.AFILIADO
		inner join USUARIOS on USUARIOS.Nit=VENTAS.Usuario
		inner join CAMPANAS on CAMPANAS.Numero=VENTAS.Campana
		inner join TIPIFICACIONES on TIPIFICACIONES.Numero = VENTAS.Estado_Campana
		";
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

		 
		$sWhere.=" order by VENTAS.Numero DESC ";
		include 'pagination.php';
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 100;
		$adjacents  = 4;
		$offset = ($page - 1) * $per_page;
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './Consultar-BaseGeneral.php';
		$sql="SELECT VENTAS.Numero, VENTAS.Token,TIPIFICACIONES.Categoria, TIPIFICACIONES.NCategoria,AFILIADOS.Primer_Nombre,AFILIADOS.Primer_Apellido,VENTAS.Fecha,USUARIOS.Razon_Social,
		VENTAS.Estado,VENTAS.Estado_Campana,VENTAS.fecha,
		CAMPANAS.NOMBRE AS Campana,CAMPANAS.Numero as Cam,VENTAS.Valor,VENTAS.Porcentaje_Comision,VENTAS.Campana as NCampana,VENTAS.Nombre_Completo,VENTAS.SAfiliado FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		if ($numrows>0){
			echo mysqli_error($con);
			?>
			<div class="table-responsive">
			  <table class="table table-hover">
				<tr  class="warning">
					<th class="text-center">Numero</th>
					<th>Afiliado</th>
					<th>Usuario</th>
				
					<th class="text-right">Valor</th>
					<th class="text-center">Fecha</th>
					<th class='text-right'>Estado</th>
					<th>Tipificacion</th>
					<th class='text-right'>Editar</th>
					<th class='text-right'></th>
					<th class='text-right'></th>
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){

						$Numero=$row['Numero'];
						$Cam=$row['Cam'];
						if($row['SAfiliado']=='S'){
							$Afiliado='('.$row['Nombre_Completo'].')';
						}else{
							$Afiliado=$row['Nombre_Completo'];
						}


						
						$Fecha=$row['Fecha'];
						$Token=$row['Token'];
						$Valor=$row['Valor'];
						$Usuario=$row['Razon_Social'];
						$Campana=$row['Campana'];
						$Estado=$row['Estado'];
						$Estado_Campana=$row['Estado_Campana'];
						$Porcentaje_Comision=$row['Porcentaje_Comision'];
						if ($Estado=="Aprobada"){$label_class='label-success';}
						if ($Estado=="Rechazada"){$label_class='label-danger';}
						if ($Estado=="Negada"){$label_class='label-danger';}
						if ($Estado=="Sin Revisar"){$label_class='label-warning';}
						$NCampana=$row['NCampana'];
						$NCategoria = $row['NCategoria'];
						if ($NCategoria=="1"){
							$label_classC='label-success';
						}else{
							if ($NCategoria=="2"){
								$label_classC='label-danger';
							}else{
								if ($NCategoria=="3"){
									$label_classC='label-info';
								}else{
									if ($NCategoria=="4"){
										$label_classC='label-warning';
									}else{
										if ($NCategoria=="5"){
											$label_classC='label-primary';
										}else{
											if ($NCategoria=="6"){
												$label_classC='label-primary';
											}else{
												if ($NCategoria=="7"){
													$label_classC='label-danger';
												}else{
													if ($NCategoria=="8"){
														$label_classC='label-success';
													}else{
														if ($NCategoria=="9"){
															$label_classC='label-info';
														}else{
															if ($NCategoria=="10"){
																$label_classC='label-warning';
															}else{
																if ($NCategoria=="11"){
																	$label_classC='label-info';
																}else{
																	if ($NCategoria=="12"){
																		$label_classC='label-info';
																	}else{
																		if ($NCategoria=="13"){
																			$label_classC='label-info';
																		}else{
																			if ($NCategoria=="14"){
																				$label_classC='label-info';
																			}else{
																				$label_classC='label-info';
																			}
																		}
																	}
																}
															}
														}
													}
												}
											}
										}
									}
								}
							}
						}
						$Tipificacion = $row['Categoria'];
						
					?>
					<tr>
						<td class="text-center"><?php echo $Numero; ?></td>
						<td><?php echo $Afiliado; ?></td>
						<td><?php echo $Usuario; ?></td>
						<td class="text-right"><?php echo '$'.number_format($Valor); ?></td>
						<td class="text-center"><?php echo $Fecha; ?></td>

						<td class="text-right">
						<?php
						$query1=mysqli_query($con, "select Id,".$_SESSION['Tipo']." from ESTADOS where Id ='$Estado'");
						$rw_Admin1=mysqli_fetch_array($query1);
						
							if ( $_SESSION['Estado']=='Activo'){
								?>
						<a href="#" class='btn btn-default' title='Editar Estado' onclick="obtener_datos('<?php echo $Numero;?>','<?php echo $rw_Admin1[1];?>');"  data-toggle="modal" data-target="#UdateVenta"><i class="glyphicon glyphicon-edit"></i><?php echo $rw_Admin1[1]; ?></a>
						<?php
							}
						?>
						</td>
						<td><span class="label <?php echo $label_classC;?>"><?php echo $Tipificacion; ?></span></td>
						<td class="text-right">
						<?php
							if ( $_SESSION['Estado']=='Activo'){
								?>
							<a href="#" class='btn btn-default' title='Editar Venta' onclick="obtener_datos1('<?php echo $Numero;?>');"><i class="glyphicon glyphicon-edit"></i></a> 
							<?php
							}
						?>
						</td>
						<td>

						<?php
						$query1=mysqli_query($con, 'SELECT Estado FROM PERMISOS where Modulo="Transacciones" and Permiso="TipificaionesSeguimiento" and  Usuario ="'.$_SESSION['Nit'].'";');
						$rw_Admin1=mysqli_fetch_array($query1);
						
						
						if($_SESSION['Rol']<>'2' or $rw_Admin1['Estado']=='true'){
						
						echo' <select class="form-control hidden " id="Estado_Campana'.$Numero.'" name ="Estado_Campana" placeholder="Estado Campaña">';
						$query1=mysqli_query($con, "SELECT Numero,Nombre FROM CAMP_TIPIFICACIONES 
					inner join TIPIFICACIONES on CAMP_TIPIFICACIONES.Tipificacion =TIPIFICACIONES.Numero Where Campana = $NCampana ");
					while($rw_Admin1=mysqli_fetch_array($query1)){
						if ($Estado_Campana==$rw_Admin1[0]){
							echo '<option value="'.$rw_Admin1[0].'" selected>'.$rw_Admin1[1].'</option>';	
						}else{
							echo '<option value="'.$rw_Admin1[0].'">'.$rw_Admin1[1].'</option>';	
						}
					
						
					}

						
						echo '</select>';
				}
						?>
						</td>
						<td>
						<?php

$query1=mysqli_query($con, 'SELECT Estado FROM PERMISOS where Modulo="Transacciones" and Permiso="CambiarEstado" and  Usuario ="'.$_SESSION['Nit'].'";');
$rw_Admin1=mysqli_fetch_array($query1);


if($_SESSION['Rol']<>'2' or $rw_Admin1['Estado']=='true'){
	
	
	$query1=mysqli_query($con, "select Id,".$_SESSION['Tipo']." from ESTADOS");
	echo' <select class="form-control hidden" id="Estado'.$Numero.'" name ="Estado"  placeholder="Campaña" onchange="ValidarEstado(event)">';
	while($rw_Admin1=mysqli_fetch_array($query1)){
		if($Estado==$rw_Admin1[0]){
			echo '<option value="'.$rw_Admin1[0].'" selected>'.utf8_encode($rw_Admin1[1]).'</option>';	

		}else{
			echo '<option value="'.$rw_Admin1[0].'">'.utf8_encode($rw_Admin1[1]).'</option>';	

		}
	}
	echo '</select>';
}				

						?>
						</td>
						<td>
						<input type="text" class="form-control hidden" id="Token<?php echo $Numero;?>" placeholder="Numero de Aprobacion" value="<?php echo $Token;?>" autocomplete="off" >
						</td>

					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=11><span class="pull-right"><?php
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
			  </table>
			</div>
			<?php
		}
	}
?>