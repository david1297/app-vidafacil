<?php
	include('is_logged.php');
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		 $Busc_Afiliado = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Busc_Afiliado'], ENT_QUOTES)));
		 $Filtro = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Filtro'], ENT_QUOTES)));
		 
		
		 $sTable = "AFILIADOS inner join DEPARTAMENTOS on AFILIADOS.Departamento = DEPARTAMENTOS.Codigo
		 inner join CIUDADES on AFILIADOS.Ciudad =CIUDADES.Codigo and   DEPARTAMENTOS.Codigo = CIUDADES.Departamento		";
		$sWhere = "where 1=1";
		if ( $_GET['Busc_Afiliado'] != "" ){
			if ($Filtro == "Identificacion"){
				$sWhere.= " and  (AFILIADOS.Identificacion like '%$Busc_Afiliado%' )";	
			}else{
				if ($Filtro =="Nombre"){
					$sWhere.= " and  (AFILIADOS.Nombre_Completo like '%$Busc_Afiliado%') ";	
				}else{
					if ($Filtro =="Ciudad"){
						$sWhere.= " and  (CIUDADES.Nombre like '%$Busc_Afiliado%')";
					}else{
						if ($Filtro=="Departamento"){
							$sWhere.= " and  (AFILIADOS.Departamento like '%$Busc_Afiliado%')";
						} else {
							if ($Filtro=="Telefono"){
								$sWhere.= " and  (AFILIADOS.Telefono like '%$Busc_Afiliado%')";
							}
						}
					}
				}
			}
		}
		$query1=mysqli_query($con, 'SELECT Estado FROM PERMISOS where Modulo="Afiliados" and Permiso="ConsultarTodo" and  Usuario ="'.$_SESSION['Nit'].'";');
		$rw_Admin1=mysqli_fetch_array($query1);
		if($_SESSION['Rol']=='2' and $rw_Admin1['Estado']=='false'){
			$sWhere.= " and  AFILIADOS.Comercio='".$_SESSION['Nit']."' ";
		}
		$sWhere.= " and Estado ='Aprobado'";	
		$sWhere.=" order by AFILIADOS.Primer_Nombre desc";
		include 'pagination.php'; 
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 50; 
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
					<th>Id</th>
					<th>Identificacion</th>
					<th>Nombre</th>
					<th>Telefono</th>
					<th><span>Correo</span></th>
					<th class='text-center' style="width: 36px;">Seleccionar</th>
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
					$Id=$row['Id'];
					$Identificacion=$row['Identificacion'];
					$Nombre=$row['Primer_Nombre'].' '.$row['Primer_Apellido'];
					$Correo=$row["Correo"];
					$Telefono=$row["Telefono"];

					?>
					<tr>
						<td><?php echo $Id; ?></td>
						<td><?php echo $Identificacion; ?></td>
						<td><?php echo $Nombre; ?></td>
						<td><?php echo $Telefono; ?></td>
						<td><?php echo $Correo; ?></td>
						
						
						<td class='text-center'><a class='btn btn-success'href="#" data-dismiss="modal" onclick="Seleccionar('<?php echo $Id ?>','<?php echo $Nombre ?>','<?php echo $Correo ?>')"><i class="glyphicon glyphicon-ok"></i></a></td>
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