<?php
	include('is_logged.php');
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		$q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		$Filtro = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Filtro'], ENT_QUOTES)));
		$Estado = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Estado'], ENT_QUOTES)));

		$sTable = "CAMPANAS 
		INNER JOIN AREAS ON AREAS.Numero =CAMPANAS.Area ";
		$sWhere = "where 1=1";
		if ( $_GET['q'] != "" ){
			if ($Filtro == "Numero"){
				
				$sWhere.= " and  (CAMPANAS.Numero like '%$q%' )";	
			}else{
				if ($Filtro =="Nombre"){
					$sWhere.= " and  (CAMPANAS.Nombre like '%$q%')";	
				}else{
					if ($Filtro =="Area"){
						$sWhere.= " and  (AREAS.Nombre like '%$q%')";
					}
				}
			}
			
		}
		if($Estado<>"Todos"){
			$sWhere.= " and Estado ='".$Estado."'";	
		} 
		$sWhere.=" order by CAMPANAS.Numero ";
		include 'pagination.php';
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 50;
		$adjacents  = 4;
		$offset = ($page - 1) * $per_page;
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './Consultar-Usuarios.php';
		$sql="SELECT CAMPANAS.Numero,CAMPANAS.Nombre,CAMPANAS.Estado,AREAS.Nombre as Area FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		if ($numrows>0){
			echo mysqli_error($con);
			?>
			<div class="table-responsive">
			  <table class="table table-hover">
				<tr  class="warning">
					<th>Nombre</th>
					<th>Area</th>
					<th>Estado</th>
					<th class='text-right'>Editar</th>
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){

						$Numero=$row['Numero'];
						$Nombre=$row['Nombre'];
						$Area=$row['Area'];
						$Estado=$row['Estado'];
						if ($Estado=="Activa"){$label_class='label-success';}
						if ($Estado=="InActiva"){$label_class='label-danger';}
						if ($Estado=="Pendiente"){$label_class='label-warning';}
						
					?>
					<tr>
						<td><?php echo $Nombre; ?></td>
						<td><?php echo $Area; ?></td>
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