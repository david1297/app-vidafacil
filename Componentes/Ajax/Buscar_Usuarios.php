<?php
	include('is_logged.php');
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
        $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		$sTable = "Usuarios";
		$sWhere = "";
		if ( $_GET['q'] != "" ){
			$sWhere.= " where  (Usuarios.Usuario like '%$q%' or Usuarios.Nombre like '%$q%' or Usuarios.Apellido like '%$q%' or Usuarios.Correo like '%$q%')";
		}
		$sWhere.=" order by Usuarios.Usuario desc";
		include 'pagination.php';
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10;
		$adjacents  = 4;
		$offset = ($page - 1) * $per_page;
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './Consultar-Usuarios.php';
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		if ($numrows>0){
			echo mysqli_error($con);
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="warning">
					<th>Usuario</th>
					<th>Correo</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Rol</th>
					<th class='text-right'>Editar</th>
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$Usuario=$row['Usuario'];
						$Correo=$row['Correo'];
						$Nombre=$row['Nombre'];
						$Apellido=$row['Apellido'];
						$Rol=$row['Rol'];
						if ($Rol == '1'){
							$Rol='Administrador';
						}else{
							$Rol='Usuario';	
						}
					?>
					<tr>
						<td><?php echo $Usuario; ?></td>
						<td><?php echo $Correo; ?></td>
						<td><?php echo $Nombre; ?></td>
						<td><?php echo $Apellido; ?></td>
						<td><?php echo $Rol; ?></td>				
						<td class="text-right">
							<a href="#" class='btn btn-default' title='Editar cliente' onclick="obtener_datos('<?php echo $Usuario;?>');"><i class="glyphicon glyphicon-edit"></i></a> 
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