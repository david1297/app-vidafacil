<?php
	include('is_logged.php');
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		$q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		$Filtro = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Filtro'], ENT_QUOTES)));
		$sTable = "Campanas";
		$sWhere = "";
		if ( $_GET['q'] != "" ){
			if ($Filtro == "Numero"){
				
				$sWhere.= " where  (Campanas.Numero like '%$q%' )";	
			}else{
				if ($Filtro =="Nombre"){
					$sWhere.= " where  (Campanas.Nombre like '%$q%')";	
				}else{
					if ($Filtro =="Area"){
						$sWhere.= " where  (Campanas.Area like '%$q%')";
					}else{
						if ($Filtro=="Contacto"){
							$sWhere.= " where  (Campanas.Contacto like '%$q%')";
						}
					}
				}
			}
			
		}
		$sWhere.=" order by Campanas.Nombre desc";
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
					<th class="text-center">Numero</th>
					<th class="text-left">Nombre</th>
					<th class="text-left">Contacto</th>
					<th class="text-left">Area</th>
					<th class="text-center">Porcentaje</th>
					<th class="text-right">Agregar</th>
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){

						$Numero=$row['Numero'];
						$Nombre=$row['Nombre'];
						$Contacto=$row['Contacto'];
						$Area=$row['Area'];
						$Porcentaje=$row['Porcentaje'];
						
					?>
					<tr>
						<td class="text-center"><?php echo $Numero; ?></td>
						<td class="text-left"><?php echo $Nombre; ?></td>
						<td class="text-left"><?php echo $Contacto; ?></td>
						<td class="text-left"><?php echo $Area; ?></td>
						<td class="text-center"><?php echo $Porcentaje; ?></td>		
						
						<td class='text-right'><a class='btn btn-info'href="#" onclick="agregar('<?php echo $Numero ?>')"><i class="glyphicon glyphicon-plus"></i></a></td>

					
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