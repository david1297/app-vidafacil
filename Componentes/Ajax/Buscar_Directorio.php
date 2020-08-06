<?php
	include('is_logged.php');
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		$q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		$Filtro = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Filtro'], ENT_QUOTES)));

		$sTable = "DIRECTORIO";
		$sWhere = "where 1=1 ";
		if ( $_GET['q'] != "" ){
			if ($Filtro == "NombreEmpresa"){
				$sWhere.= " and  (NombreEmpresa like '%$q%' )";	
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
							if ($Filtro=="Celular"){
								$sWhere.= " and  (Celular like '%$q%')";
							}
						}
					}
				}
			}
			
		}
		$sWhere.= " order by FechaV DESC ";
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
				<tr>
					<th>Servicio</th>
					<th>Nombre Empresa</th>
					<th>Celular</th>
					<th>Correo</th>
					
					<th>Fecha Inicio</th>
					<th>Fecha Vencimiento</th>
					<th class='text-center'>Ver</th>
				</tr>
				<?php
				date_default_timezone_set('America/Bogota');
				$Fecha=date("Y-m-d"); 
				while ($row=mysqli_fetch_array($query)){

						$Servicio=$row['Servicio'];
						$NombreEmpresa=$row['NombreEmpresa'];
						$Celular=$row['Celular'];
						$Correo=$row['Correo'];
						
						$FechaV=$row['FechaV'];
						$FechaI=$row['FechaI'];
						$Codigo=$row['Codigo'];
						if($Fecha > $FechaV){
							$Colum="danger";
						}else{
							$Colum="success";
						}

					?>
					<tr class="<?php echo $Colum?>">
						<td><?php echo $Servicio; ?></td>
						<td><?php echo $NombreEmpresa; ?></td>
						<td><?php echo $Celular ?></td>
						<td><?php echo $Correo; ?></td>
						<td><?php echo $FechaI; ?></td>			
						<td><?php echo $FechaV; ?></td>			
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