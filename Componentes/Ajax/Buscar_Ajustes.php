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

		$sTable = "AJUSTES	
		INNER JOIN USUARIOS ON AJUSTES.USUARIOA = USUARIOS.NIT
		left join TIPIFICACIONES on TIPIFICACIONES.Numero = AJUSTES.Tipificacion
		";
		$sWhere = "where (AJUSTES.Fecha_Creacion >= '$fechaIni' and  AJUSTES.Fecha_Creacion <= '$fechaFin') ";
		if ( $_GET['q'] != "" ){
			$sWhere.= " and  (AJUSTES.Numero like '%$q%' )";	
		}	
		if($EFiltro<>"Todos"){
			if($EFiltro=='Usuario'){
				$sWhere.= " and AJUSTES.UsuarioA ='".$VFiltro."'";		
			}else{
				if($EFiltro=='Estado'){
					$sWhere.= " and AJUSTES.Estado ='".$VFiltro."'";		
				}
			}	
		} 
		$query1=mysqli_query($con, 'SELECT Estado FROM PERMISOS where Modulo="Ajustes" and Permiso="ConsultarTodo" and  Usuario ="'.$_SESSION['Nit'].'";');
		$rw_Admin1=mysqli_fetch_array($query1);
		if($_SESSION['Rol']=='2' and $rw_Admin1['Estado']=='false'){
			$sWhere.= " and  AJUSTES.UsuarioA='".$_SESSION['Nit']."' ";
		}
		$order=" order by AJUSTES.Numero ";
		include 'pagination.php';
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 50;
		$adjacents  = 4;
		$offset = ($page - 1) * $per_page;
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './Consultar-ajustes.php';
		$query1=mysqli_query($con, 'SELECT Estado FROM PERMISOS where Modulo="ajustes" and Permiso="ConsultarTodo" and  Usuario ="'.$_SESSION['Nit'].'";');
										
				


		$sql="SELECT TIPIFICACIONES.Categoria, TIPIFICACIONES.NCategoria,AJUSTES.Numero,AJUSTES.UsuarioA,USUARIOS.RAZON_SOCIAL,AJUSTES.Fecha_Creacion,
		AJUSTES.ESTADO,AJUSTES.Valor,AJUSTES.Tipo FROM  $sTable $sWhere   
		$order LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		if ($numrows>0){
			echo mysqli_error($con);
			?>
<div class="table-responsive">
    <table class="table table-hover">
        <tr class="warning">
            <th class="text-center">Numero</th>
            <th>Usuario</th>
            <th>Fecha</th>
            <th>Tipo</th>
            <th>Valor</th>
            <th>Estado</th>
			<th>Tipificacion</th>
            <th class='text-right'>Editar</th>
        </tr>
        <?php
				while ($row=mysqli_fetch_array($query)){

						$Numero=$row['Numero'];
						$Nit=$row['UsuarioA'];
					
						$Usuario=$row['RAZON_SOCIAL'];
						$FechaCreacion=$row['Fecha_Creacion'];
						$Estado=$row['ESTADO'];
						$Valor=$row['Valor'];
						$Tipo=$row['Tipo'];
					
						
						if ($Estado=="True"){
							$label_class='label-success';
							$Estado='Aprobado';
						}
						if ($Estado=="False"){
							$label_class='label-warning';
							$Estado='Anulado';
						}
						$NCategoria = $row['NCategoria'];
						$Tipificacion = $row['Categoria'];
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
					
						
					?>
        <tr>
            <td class="text-center"><?php echo $Numero; ?></td>
            <td><?php echo $Usuario; ?></td>
            <td><?php echo $FechaCreacion; ?></td>
            <td><?php echo $Tipo; ?></td>
				
            <td><?php echo '$'.number_format($Valor); ?></td>

            <td><span class="label <?php echo $label_class;?>"><?php echo $Estado; ?></span></td>
            <td><span class="label <?php echo $label_classC;?>"><?php echo $Tipificacion; ?></span></td>


            <td class="text-right">
                <a href="#" class='btn btn-default' title='Editar Ajuste'
				onclick="obtener_datos('<?php echo $Numero;?>');" data-toggle="modal"
                    data-target="#UdateVenta"><i class="glyphicon glyphicon-edit"></i></a>
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