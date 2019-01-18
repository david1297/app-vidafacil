<?php
	include('is_logged.php');
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
        $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		$sTable = "Clientes";
		$sWhere = "";
		if ( $_GET['q'] != "" ){
			$sWhere.= " WHERE  (Clientes.Razon_Social like '%$q%' or Clientes.Nit like '%$q%')";
		}
		$sWhere.=" order by Clientes.Razon_Social desc";
		include 'pagination.php';
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10; 
		$adjacents  = 4;
		$offset = ($page - 1) * $per_page;
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = 'Consultar-Clientes.php';
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		if ($numrows>0){
			echo mysqli_error($con);
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="warning">
					<th>Nit</th>
					<th>Razon Social</th>
					<th>Telefono</th>
					<th>Correo</th>
					<th>Tipo</th>
					<th>Direccion</th>
					<th class='text-right'>Editar</th>					
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$Nit=$row['Nit'];
						$Razon_Social=$row['Razon_Social'];
						$Telefono=$row['Tel_C'];
						$email_cliente=$row['Correo_C'];
						$Tipo=$row['Tipo'];
						$Direccion=$row['Direccion'];
					?>
					<tr>
						<td><?php echo $Nit; ?></td>
						<td><?php echo $Razon_Social; ?></td>
						<td><?php echo $Telefono; ?></td>
						<td><?php echo $email_cliente; ?></td>
						<td><?php echo $Tipo; ?></td>
						<td><?php echo $Direccion; ?></td>
						<td class="text-right">
							<a href="#" class='btn btn-default' title='Editar cliente' onclick="obtener_datos('<?php echo $Nit;?>');" data-toggle="modal" data-target="#nuevoCliente"><i class="glyphicon glyphicon-edit"></i></a> 
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