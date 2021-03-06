<?php
	include('is_logged.php');
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		$q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		$Filtro = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Filtro'], ENT_QUOTES)));
		$Estado = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Estado'], ENT_QUOTES)));

		$sTable = "VENTAS INNER JOIN AFILIADOS On AFILIADOS.Id=VENTAS.AFILIADO
		inner join USUARIOS on USUARIOS.Nit=VENTAS.Usuario
		inner join CAMPANAS on CAMPANAS.Numero=VENTAS.Campana";
		$sWhere = "where 1=1";
		if ( $_GET['q'] != "" ){
			if ($Filtro == "Numero"){
				
				$sWhere.= " and  (VENTAS.Numero like '%$q%' )";	
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
								$sWhere.= " and  (CAMPANAS.Nombre like '%$q%' )";	
							}else{
								if($Filtro =="Usuario"){
									$sWhere.= " and  (USUARIOS.Razon_Social like '%$q%' )";
								}else{
									if($Filtro =="Estado"){
										$sWhere.= " and  (VENTAS.Estado_Campana like '%$q%' )";
									}
								}
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
		if($Estado<>"Todos"){
			$sWhere.= " and VENTAS.Estado ='".$Estado."'";	
		} 
		$sWhere.=" order by VENTAS.Numero ";
		include 'pagination.php';
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 50;
		$adjacents  = 4;
		$offset = ($page - 1) * $per_page;
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './Consultar-Ventas.php';
		$sql="SELECT VENTAS.Numero,AFILIADOS.Primer_Nombre,AFILIADOS.Primer_Apellido,VENTAS.Fecha,USUARIOS.Razon_Social,VENTAS.Estado,CAMPANAS.NOMBRE AS Campana FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		echo 		$sql;
		if ($numrows>0){
			echo mysqli_error($con);
			?>
			<div class="table-responsive">
			  <table class="table table-hover">
				<tr  class="warning">
					<th class="text-center">Numero</th>
					<th>Afiliado</th>
					<th>Fecha</th>
					<th>Usuario</th>
					<th>Campaña</th>
					<th>Estado</th>
					<th class='text-right'>Editar</th>
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){

						$Numero=$row['Numero'];
						$Afiliado=$row['Primer_Nombre'].' '.$row['Primer_Apellido'] ;
						$Fecha=$row['Fecha'];
						$Usuario=$row['Razon_Social'];
						$Campana=$row['Campana'];
						$Estado=$row['Estado'];
						if ($Estado=="Aprobada"){$label_class='label-success';}
						if ($Estado=="Rechazada"){$label_class='label-danger';}
						if ($Estado=="Negada"){$label_class='label-danger';}
						if ($Estado=="Sin Revisar"){$label_class='label-warning';}
						
						
					?>
					<tr>
						<td class="text-center"><?php echo $Numero; ?></td>
						<td><?php echo $Afiliado; ?></td>
						<td><?php echo $Fecha; ?></td>
						<td><?php echo $Usuario; ?></td>
						<td><?php echo $Campana; ?></td>
						<td><span class="label <?php echo $label_class;?>"><?php echo $Estado; ?></span></td>			
						<td class="text-right">
							<a href="#" class='btn btn-default' title='Editar Campañas' onclick="obtener_datos('<?php echo $Numero;?>');"><i class="glyphicon glyphicon-edit"></i></a> 
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