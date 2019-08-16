<?php
	include('is_logged.php');
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
         $Busc_Usuario = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Busc_Usuario'], ENT_QUOTES)));
		 $Filtro = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Filtro'], ENT_QUOTES)));
		 $sTable = "USUARIOS";
		$sWhere = "where 1=1 ";
		if ( $_GET['Busc_Usuario'] != "" ){
			if ($Filtro == "Razon_Social"){
				
				$sWhere.= " and   (USUARIOS.Nombre like '%$Busc_Usuario%' or USUARIOS.Apellido like '%$Busc_Usuario%' or USUARIOS.Razon_Social like '%$Busc_Usuario%')";	
			}else{
				if ($Filtro =="Nit"){
					$sWhere.= " and  (USUARIOS.Nit like '%$Busc_Usuario%')";	
				}else{
					if ($Filtro =="Telefono"){
						$sWhere.= " and  (USUARIOS.Tel_C like '%$Busc_Usuario%' or USUARIOS.Cel_C like '%$Busc_Usuario%')";
					}else{
						if ($Filtro=="Correo"){
							$sWhere.= " and  (USUARIOS.Correo_C like '%$Busc_Usuario%' or USUARIOS.Correo like '%$Busc_Usuario%')";
						}
					}
				}
			}
		}
		$sWhere.= " and Estado ='Activo'";	
		$sWhere.=" order by USUARIOS.Razon_Social desc";
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
		$reload = 'Componentes/Modal/Buscar_Usuarios.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="warning">
					<th>Nombre o Razon Social</th>
					<th>Tipo</th>
					<th>Estado</th>
					<th class='text-center' style="width: 36px;">Seleccionar</th>
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
					$Razon_Social=$row['Razon_Social'];
					
					$Tipo=$row["Tipo"];
					$Estado=$row["Estado"];
					$Nit=$row["Nit"];

					?>
					<tr>
						<td><?php echo $Razon_Social; ?></td>
						<td><?php echo $Tipo; ?></td>
						<td><?php echo $Estado; ?></td>
						
						
						<td class='text-center'><a class='btn btn-success'href="#" data-dismiss="modal" onclick="Seleccionar('<?php echo $Nit ?>','<?php echo $Razon_Social ?>')"><i class="glyphicon glyphicon-ok"></i></a></td>
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