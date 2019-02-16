<?php
	include('is_logged.php');
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		$q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		$Filtro = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Filtro'], ENT_QUOTES)));
		$Estado = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Estado'], ENT_QUOTES)));

		$sTable = "afiliados inner join Departamentos on Afiliados.Departamento = Departamentos.Codigo
							 inner join ciudades on Afiliados.Ciudad =ciudades.Codigo and   Departamentos.Codigo = ciudades.Departamento		";
		$sWhere = "where 1=1";
		if ( $_GET['q'] != "" ){
			if ($Filtro == "Identificacion"){
				$sWhere.= " and  (afiliados.Identificacion like '%$q%' )";	
			}else{
				if ($Filtro =="Nombre"){
					$sWhere.= " and  (afiliados.Primer_Nombre like '%$q%')  or (afiliados.Segundo_Nombre like '%$q%')  or (afiliados.Primer_Apellido like '%$q%') or (afiliados.Segundo_Apellido like '%$q%') ";	
				}else{
					if ($Filtro =="Ciudad"){
						$sWhere.= " and  (Ciudades.Nombre like '%$q%')";
					}else{
						if ($Filtro=="Departamento"){
							$sWhere.= " and  (afiliados.Departamento like '%$q%')";
						} else {
							if ($Filtro=="Telefono"){
								$sWhere.= " and  (afiliados.Telefono like '%$q%')";
							}
						}
					}
				}
			}
			
		}
		if($Estado<>"Todos"){
			$sWhere.= " and Estado ='".$Estado."'";	
		} 
		$sWhere.=" order by afiliados.Primer_Nombre desc";
		include 'pagination.php';
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10;
		$adjacents  = 4;
		$offset = ($page - 1) * $per_page;
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './Consultar-Afiliados.php';
		$sql="SELECT Identificacion,Primer_Nombre,Primer_Apellido,Departamentos.Nombre as Departamento,Ciudades.Nombre as Ciudad ,Direccion,Estado FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		if ($numrows>0){
			echo mysqli_error($con);
			?>
			<div class="table-responsive">
			  <table class="table table-hover">
				<tr  class="warning">
					<th>Identificacion</th>
					<th>Nombres</th>
					<th>Departamento</th>
					<th>Ciudad</th>
					<th>Direccion</th>
					<th>Estado</th>
					<th class='text-right'>Editar</th>
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){

						$Identificacion=$row['Identificacion'];
						$Nombre=$row['Primer_Nombre'].' '.$row['Primer_Apellido'];
						$Departamento=utf8_encode($row['Departamento']);
						$Ciudad=utf8_encode($row['Ciudad']);
						$Direccion=$row['Direccion'];
						$Estado=$row['Estado'];
						if ($Estado=="Activo"){$label_class='label-success';}
						if ($Estado=="InActivo"){$label_class='label-danger';}
						if ($Estado=="Pendiente"){$label_class='label-warning';}
						
					?>
					<tr>
						<td><?php echo $Identificacion; ?></td>
						<td><?php echo $Nombre; ?></td>
						<td><?php echo $Departamento; ?></td>
						<td><?php echo $Ciudad; ?></td>
						<td><?php echo $Direccion; ?></td>
						<td><span class="label <?php echo $label_class;?>"><?php echo $Estado; ?></span></td>			
						<td class="text-right">
							<a href="#" class='btn btn-default' title='Editar Campañas' onclick="obtener_datos('<?php echo $Identificacion;?>');"><i class="glyphicon glyphicon-edit"></i></a> 
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