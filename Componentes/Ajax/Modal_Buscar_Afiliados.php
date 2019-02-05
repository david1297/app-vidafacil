<?php
	include('is_logged.php');
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
         $Busc_Afiliado = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Busc_Afiliado'], ENT_QUOTES)));
		
		 $sTable = "afiliados inner join Departamentos on Afiliados.Departamento = Departamentos.Codigo
		 inner join ciudades on Afiliados.Ciudad =ciudades.Codigo and   Departamentos.Codigo = ciudades.Departamento		";
		$sWhere = "where 1=1";
		if ( $_GET['Busc_Afiliado'] != "" ){
			if ($Filtro == "Identificacion"){
				$sWhere.= " and  (afiliados.Identificacion like '%$Busc_Afiliado%' )";	
			}else{
				if ($Filtro =="Nombre"){
					$sWhere.= " and  (afiliados.Primer_Nombre like '%$Busc_Afiliado%')  or (afiliados.Segundo_Nombre like '%$Busc_Afiliado%')  or (afiliados.Primer_Apellido like '%$Busc_Afiliado%') or (afiliados.Segundo_Apellido like '%$Busc_Afiliado%') ";	
				}else{
					if ($Filtro =="Ciudad"){
						$sWhere.= " and  (Ciudades.Nombre like '%$Busc_Afiliado%')";
					}else{
						if ($Filtro=="Departamento"){
							$sWhere.= " and  (afiliados.Departamento like '%$Busc_Afiliado%')";
						} else {
							if ($Filtro=="Telefono"){
								$sWhere.= " and  (afiliados.Telefono like '%$Busc_Afiliado%')";
							}
						}
					}
				}
			}
		}
		$sWhere.= " and Estado ='Activo'";	
		$sWhere.=" order by afiliados.Primer_Nombre desc";
		include 'pagination.php'; 
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 5; 
		$adjacents  = 4; 
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = 'Componentes/Modal/Buscar_Afiliados.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="warning">
					<th>Identificacion</th>
					<th>Nombre</th>
					<th>Telefono</th>
					<th><span>Correo</span></th>
					<th class='text-center' style="width: 36px;">Seleccionar</th>
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
					$Identificacion=$row['Identificacion'];
					$Nombre=$row['Primer_Nombre'].' '.$row['Primer_Apellido'];
					$Correo=$row["Correo"];
					$Telefono=$row["Telefono"];

					?>
					<tr>
						<td><?php echo $Identificacion; ?></td>
						<td><?php echo $Nombre; ?></td>
						<td><?php echo $Telefono; ?></td>
						<td><?php echo $Correo; ?></td>
						
						
						<td class='text-center'><a class='btn btn-success'href="#" data-dismiss="modal" onclick="Seleccionar('<?php echo $Identificacion ?>','<?php echo $Nombre ?>','<?php echo $Correo ?>')"><i class="glyphicon glyphicon-ok"></i></a></td>
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=5><span class="pull-right"><?php
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
			  </table>
			</div>
			<?php
		}
	}
?>