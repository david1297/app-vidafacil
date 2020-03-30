<?php
	include('is_logged.php');
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		$q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		
		$sTable = "TRANSPORTADORAS";
		$sWhere = "";
		if ( $_GET['q'] != "" ){
		
				
				$sWhere.= " where  (TRANSPORTADORAS.Nombre like '%$q%' )";	
			
			}
			
		
		$sWhere.=" order by TRANSPORTADORAS.Nombre desc";
		include 'paginationT.php';
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 50;
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
			  <table class="table table-hover">
				<tr  class="warning">
					<th class="text-center">Numero</th>
					<th class="text-left">Nombre</th>
					<th class="text-right">Agregar</th>
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){

						$Numero=$row['Numero'];
						$Nombre=$row['Nombre'];
						
					?>
					<tr>
						<td class="text-center"><?php echo $Numero; ?></td>
						<td class="text-left"><?php echo $Nombre; ?></td>
						
						<td class='text-right'><a class='btn btn-info'href="#" onclick="AgregarT('<?php echo $Numero ?>')"><i class="glyphicon glyphicon-plus"></i></a></td>

					
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