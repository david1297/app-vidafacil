<?php
	include('is_logged.php');
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		$q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		$Filtro = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Filtro'], ENT_QUOTES)));
		$EFiltro = mysqli_real_escape_string($con,(strip_tags($_REQUEST['EFiltro'], ENT_QUOTES)));
		$VFiltro = mysqli_real_escape_string($con,(strip_tags($_REQUEST['VFiltro'], ENT_QUOTES)));
		$sTable = "Usuarios inner join usuario_camp on 	Nit =Usuario";
		$sWhere = "where 1=1";
		if ( $_GET['q'] != "" ){
			if ($Filtro == "Razon_Social"){
				
				$sWhere.= " and   (Usuarios.Nombre like '%$q%' or Usuarios.Apellido like '%$q%' or Usuarios.Razon_Social like '%$q%')";	
			}else{
				if ($Filtro =="Nit"){
					$sWhere.= " and  (Usuarios.Nit like '%$q%')";	
				}else{
					if ($Filtro =="Telefono"){
						$sWhere.= " and  (Usuarios.Tel_C like '%$q%' or Usuarios.Cel_C like '%$q%')";
					}else{
						if ($Filtro=="Correo"){
							$sWhere.= " and  (Usuarios.Correo_C like '%$q%' or Usuarios.Correo like '%$q%')";
						}
					}
				}
			}
			
		}
		if($EFiltro<>"Todos"){
			if($EFiltro=='Estado'){
				$sWhere.= " and Estado ='".$VFiltro."'";		
			}else{
				if($EFiltro=='Tipo'){
					$sWhere.= " and Tipo ='".$VFiltro."'";		
				}else{
					if($EFiltro=='Campana'){
						$sWhere.= " and Campana ='".$VFiltro."'";		
					}
				}

			}

			
		} 


		$Group=" group by Razon_Social,Tipo,Estado,Nit ";
		include 'pagination.php';
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10;
		$adjacents  = 4;
		$offset = ($page - 1) * $per_page;
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere $Group");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './Consultar-Usuarios.php';
		$sql="SELECT Razon_Social,Tipo,Estado,Nit FROM  $sTable $sWhere $Group  
		order by Usuarios.Razon_Social desc
		LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		if ($numrows>0){
			echo mysqli_error($con);
			?>
			<div class="table-responsive">
			  <table class="table table-hover">
				<tr  class="warning">
					<th>Nombre o Razon Social</th>
					<th>Tipo</th>
					<th>Estado</th>
					<th class='text-right'>Editar</th>
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){

						$Nombre=$row['Razon_Social'];
						$Nit=$row['Nit'];
						$Tipo=$row['Tipo'];
						$Estado=$row['Estado'];
						if ($Estado=="Activo"){$label_class='label-success';}
						if ($Estado=="InActivo"){$label_class='label-danger';}
						if ($Estado=="Pendiente"){$label_class='label-warning';}
						
					?>
					<tr>
						<td><?php echo $Nombre; ?></td>
						<td><?php echo $Tipo; ?></td>
						<td><span class="label <?php echo $label_class;?>"><?php echo $Estado; ?></span></td>			
						<td class="text-right">
							<a href="#" class='btn btn-default' title='Editar Usuarios' onclick="obtener_datos('<?php echo $Nit;?>');"><i class="glyphicon glyphicon-edit"></i></a> 
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