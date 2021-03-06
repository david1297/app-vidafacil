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
								 left join AESTADOS on AESTADOS.Codigo = AFILIADOS.AEstado
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

		
		$sWhere.=" order by AFILIADOS.Primer_Nombre desc";
		include 'pagination.php';
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 50;
		$adjacents  = 4;
		$offset = ($page - 1) * $per_page;
		$sql="SELECT count(*) AS numrows FROM $sTable  $sWhere";
		$count_query   = mysqli_query($con, $sql);
	
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './Consultar-Afiliados.php';
		$sql="SELECT AESTADOS.Nombre as AEstado,AFILIADOS.FechaCracion,USUARIOS.Razon_Social,AFILIADOS.Id,AFILIADOS.Comercio,TIPIFICACIONES.Categoria, TIPIFICACIONES.NCategoria,Identificacion,Primer_Nombre,Primer_Apellido,DEPARTAMENTOS.Nombre as Departamento,CIUDADES.Nombre as Ciudad ,AFILIADOS.Direccion,AFILIADOS.Estado FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		if ($numrows>0){
			echo mysqli_error($con);
			?>
			<div class="table-responsive">
			  <table class="table table-hover">
				<tr  class="warning">
					<th>Id</th>
					<th>Nombres</th>
					<th>Comercio</th>
					<th>Fecha</th>
					<th>Estado</th>
					<th>Estado Tx</th>
					<th>Tipificacion</th>
					<th class='text-center'>Ver</th>
					<th class='text-center'>Editar</th>
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){

						$Identificacion=$row['Identificacion'];
						$Razon_Social=$row['Razon_Social'];
						$Comercio=$row['Comercio'];
						$Id=$row['Id'];
						$Nombre=$row['Primer_Nombre'].' '.$row['Primer_Apellido'];
						$Departamento=$row['Departamento'];
						$Ciudad=$row['Ciudad'];
						$Direccion=$row['Direccion'];
						$Estado=$row['Estado'];
						$AEstado=$row['AEstado'];

						$FechaCracion=$row['FechaCracion'];
						if ($Estado=="Aprobado"){$label_class='label-success';}
						if ($Estado=="Negado"){$label_class='label-danger';}
						if ($Estado=="Por Activar"){$label_class='label-warning';}
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
						<td><?php echo $Id; ?></td>
						<td><?php echo $Nombre; ?></td>
						<td><?php echo utf8_encode($Razon_Social); ?></td>
						<td><?php echo $FechaCracion; ?></td>
						<td><span class="label <?php echo $label_class;?>"><?php echo $Estado; ?></span></td>			
						<td><?php echo $AEstado; ?></td>			
						<td><span class="label <?php echo $label_classC;?>"><?php echo $Tipificacion; ?></span></td>		
						<td class="text-center">
							<a href="#" class='btn btn-default' title='Ver Afiliado' onclick="VerAfiliado('<?php echo $Id;?>');"><i class="glyphicon glyphicon-eye-open"></i></a> 
						</td>	
						<td class="text-center">
							<a href="#" class='btn btn-default' title='Editar Afiliado' onclick="obtener_datos('<?php echo $Identificacion;?>');"><i class="glyphicon glyphicon-edit"></i></a> 
						</td>
						
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=7><span class="pull-right"><?php
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
			  </table>
			</div>
			<?php
		}
	}
?>