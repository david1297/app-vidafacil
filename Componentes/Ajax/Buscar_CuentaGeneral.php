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
		$sTable = "USUARIOS 
		
		left join CUENTA_VIRTUAL on CUENTA_VIRTUAL.Usuario= USUARIOS.Nit";
		$sWhere = "where 1=1 and CUENTA_VIRTUAL.Estado <>'Pagada'";
		if ( $_GET['q'] != "" ){
			if ($Filtro == "Razon_Social"){
				
				$sWhere.= " and   (USUARIOS.Nombre like '%$q%' or USUARIOS.Apellido like '%$q%' or USUARIOS.Razon_Social like '%$q%')";	
			}else{
				if ($Filtro =="Nit"){
					$sWhere.= " and  (USUARIOS.Nit like '%$q%')";	
				}else{
					if ($Filtro =="Telefono"){
						$sWhere.= " and  (USUARIOS.Tel_C like '%$q%' or USUARIOS.Cel_C like '%$q%')";
					}else{
						if ($Filtro=="Correo"){
							$sWhere.= " and  (USUARIOS.Correo_C like '%$q%' or USUARIOS.Correo like '%$q%')";
						}
					}
				}
			}
			
		}
		if($EFiltro<>"Todos"){
			if($EFiltro=='Estado'){
				$sWhere.= " and USUARIOS.Estado ='".$VFiltro."'";		
			}else{
				if($EFiltro=='Tipo'){
					$sWhere.= " and USUARIOS.Tipo ='".$VFiltro."'";		
				}else{
					if($EFiltro=='Campana'){
						$sWhere.= " and USUARIOS.Nit in(select Usuario from USUARIO_CAMP where Campana ='".$VFiltro."')";		
					}
				}

			}

			
		} 


		$Group=" group by USUARIOS.Razon_Social,USUARIOS.Tipo,USUARIOS.Estado,USUARIOS.Nit ";
		include 'pagination.php';
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 50;
		$adjacents  = 4;
		$offset = ($page - 1) * $per_page;
		$sql="SELECT USUARIOS.Razon_Social,USUARIOS.Tipo,USUARIOS.Estado,USUARIOS.Nit,sum(Comision) Saldo FROM  $sTable $sWhere $Group  
		order by sum(Comision)desc
		LIMIT $offset,$per_page";

		$query = mysqli_query($con, $sql);
		$numrows= 	mysqli_num_rows($query);
		$total_pages = ceil($numrows/$per_page);
		$reload = './Consultar-CuentaGeneral.php';
		if ($numrows>0){
			echo mysqli_error($con);
			?>
			<div class="table-responsive">
			  <table class="table table-hover">
				<tr  class="warning">
					<th>Nombre o Razon Social</th>
					<th>Tipo</th>
					<th>Estado</th>
					<th>Saldo</th>
					<th class='text-right'>Ver</th>
				</tr>
				<?php
				$TValor=0;
				$TComision=0;
				while ($row=mysqli_fetch_array($query)){

						$Nombre=$row['Razon_Social'];
						$Nit=$row['Nit'];
						$Tipo=$row['Tipo'];
						$Saldo=$row['Saldo'];
						$Estado=$row['Estado'];
						if ($Estado=="Activo"){$label_class='label-success';}
						if ($Estado=="InActivo"){$label_class='label-danger';}
						if ($Estado=="Pendiente"){$label_class='label-warning';}
						if ($Saldo >= 0){
							$Spam_Class ='text-info'; 
						}else{
							$Spam_Class ='text-danger'; 

						}
					
								$TValor=$TValor+$Saldo;
						
					?>
					<tr>
						<td><?php echo $Nombre; ?></td>
						<td><?php echo $Tipo; ?></td>
						<td><span class="label <?php echo $label_class;?>"><?php echo $Estado; ?></span></td>	
						<td><span class="<?php echo $Spam_Class;?>"><?php echo '$'.number_format($Saldo); ?></span></td>		
						<td class="text-right">
							<a href="#" class='btn btn-default' title='Ver mas' onclick="obtener_datos('<?php echo $Nit;?>');"><i class="fas fa-eye"></i></a> 
						</td>
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=4><b><span class="pull-right"><?php
						
						 echo 'Total Comision:'
						?></span></b></td>
						<td ><b><span class="pull-right"><?php
					
						 echo number_format($TValor);
						?></span></b></td>
					</tr>
					<tr>
					<tr>
					<td colspan=4><h4><span class="pull-right"><?php
						 echo 'Total General:'
						?></span></h4></td>
						<td ><h4><span class="pull-right"><?php
						$query1=mysqli_query($con, "SELECT sum(CUENTA_VIRTUAL.Comision)Comision FROM $sTable $sWhere  ;");			
						$rw_Admin1=mysqli_fetch_array($query1);
						 echo number_format($rw_Admin1[0]);
						?></span></h4></td>
					
						
					</tr>
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