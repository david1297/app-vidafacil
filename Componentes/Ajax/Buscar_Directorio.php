<?php
	include('is_logged.php');
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		$q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		$Filtro = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Filtro'], ENT_QUOTES)));
		$fechaIni = mysqli_real_escape_string($con,(strip_tags($_REQUEST['fechaIni'], ENT_QUOTES)));

		$sTable = "DIRECTORIO";
		$sWhere = "where (Vigencia >= '$fechaIni' ) ";
		if ( $_GET['q'] != "" ){
			if ($Filtro == "Convenio"){
				$sWhere.= " and  (Convenio like '%$q%' )";	
			}else{
				if ($Filtro =="Servicio"){
					$sWhere.= " and  (Servicio like '%$q%')  ";	
				}else{
					if ($Filtro =="Descipcion"){
						$sWhere.= " and  (Descripcion like '%$q%')";
					}else{
						if ($Filtro=="Correo"){
							$sWhere.= " and  (Correo like '%$q%')";
						} else {
							if ($Filtro=="Telefono"){
								$sWhere.= " and  (Telefono like '%$q%')";
							}else{
								if ($Filtro=="Direccion"){
									$sWhere.= " and  (Direccion like '%$q%')";
								}
							}
						}
					}
				}
			}
			
		}
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
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		if ($numrows>0){
			echo mysqli_error($con);
			?>
			<div class="table-responsive">
			  <table class="table table-hover">
				<tr  class="warning">
					<th>Servicio</th>
					<th>Convenio</th>
					<th>Porcentaje</th>
					<th>Correo</th>
					<th>Telefono</th>
					<th>Vigencia</th>
					<th class='text-center'>Ver</th>
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){

						$Servicio=$row['Servicio'];
						$Convenio=$row['Convenio'];
						$Porcentaje=$row['Porcentaje'];
						$Correo=$row['Correo'];
						$Telefono=$row['Telefono'];
						$Vigencia=$row['Vigencia'];
						$Codigo=$row['Codigo'];
						
					?>
					<tr>
						<td><?php echo $Servicio; ?></td>
						<td><?php echo $Convenio; ?></td>
						<td><?php echo $Porcentaje ?></td>
						<td><?php echo $Correo; ?></td>
						<td><?php echo $Telefono; ?></td>			
						<td><?php echo $Vigencia; ?></td>			
						<td class="text-center">
							<a href="#" class='btn btn-default' title='Ver Directorio' onclick="location.href='Directorio.php?Codigo='+<?php echo $Codigo;?>;"><i class="glyphicon glyphicon-eye-open"></i></a> 
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