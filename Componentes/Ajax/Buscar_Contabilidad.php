<?php
	include('is_logged.php');
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		$EFiltro = mysqli_real_escape_string($con,(strip_tags($_REQUEST['EFiltro'], ENT_QUOTES)));
		$VFiltro = mysqli_real_escape_string($con,(strip_tags($_REQUEST['VFiltro'], ENT_QUOTES)));
		$fechaIni = mysqli_real_escape_string($con,(strip_tags($_REQUEST['fechaIni'], ENT_QUOTES)));
		$fechaFin = mysqli_real_escape_string($con,(strip_tags($_REQUEST['fechaFin'], ENT_QUOTES)));
		$Pest = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Pest'], ENT_QUOTES)));
		if($Pest=='ResIngresos'){
			$sTable = "cuenta_virtual 
			Inner Join Usuarios on Usuarios.Nit =cuenta_virtual.Usuario";
			$sWhere = "where cuenta_virtual.Credito <>0 and (Fecha >= '$fechaIni' and  Fecha <= '$fechaFin') ";
			if($EFiltro<>"Todos"){
				if($EFiltro=='Usuario'){
					$sWhere.= " and cuenta_virtual.Usuario ='".$VFiltro."'";		
				}else{
					if($EFiltro=='Tipo'){
						$sWhere.= " and cuenta_virtual.Tipo ='".$VFiltro."'";		
					}
				}	
			} 
			$Order =" order by usuarios.Razon_Social ";
			$Group = "group by cuenta_virtual.Tipo,cuenta_virtual.NDocumento,cuenta_virtual.Fecha,usuarios.Razon_Social,cuenta_virtual.Estado";
		}else{
			$sTable = "cuenta_virtual 
			Inner Join Usuarios on Usuarios.Nit =cuenta_virtual.Usuario";
			$sWhere = "where cuenta_virtual.Debito <>0 and (Fecha >= '$fechaIni' and  Fecha <= '$fechaFin') ";
			if($EFiltro<>"Todos"){
				if($EFiltro=='Usuario'){
					$sWhere.= " and cuenta_virtual.Usuario ='".$VFiltro."'";		
				}else{
					if($EFiltro=='Tipo'){
						$sWhere.= " and cuenta_virtual.Tipo ='".$VFiltro."'";		
					}
				}	
			} 
			$Order =" order by usuarios.Razon_Social ";
			$Group = "group by cuenta_virtual.Tipo,cuenta_virtual.NDocumento,cuenta_virtual.Fecha,usuarios.Razon_Social,cuenta_virtual.Estado";
			
				
			
			
		}
		
		include 'pagination.php';
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10;
		$adjacents  = 4;
		$offset = ($page - 1) * $per_page;
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere $Group");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './Consultar-Contabilidad.php';
		if($Pest=='ResIngresos'){
			$sql="SELECT cuenta_virtual.Tipo,cuenta_virtual.NDocumento,cuenta_virtual.Fecha,cuenta_virtual.Credito,usuarios.Razon_Social,cuenta_virtual.Estado FROM
			  $sTable $sWhere $Group $Order LIMIT $offset,$per_page";	
			$query = mysqli_query($con, $sql);
			if ($numrows>0){
				echo mysqli_error($con);
				?>
				<div class="table-responsive">
				  <table class="table table-hover">
					<tr  class="warning">
						<th class="text-center">Tipo</th>
						<th class="text-center">Numero</th>
						<th>Usuario</th>
						<th>Fecha</th>
						<th>Estado</th>
						<th class="text-right">Valor</th>
					</tr>
					<?php
					$TValor=0;
					while ($row=mysqli_fetch_array($query)){
	
							$Tipo=$row['Tipo'];
							$NDocumento=$row['NDocumento'];
							$Valor=$row['Credito'];
							$Usuario=$row['Razon_Social'];
							$Estado=$row['Estado'];
							$Fecha=$row['Fecha'];
							if ($Estado=="Pagada"){$label_class='label-success';}
							if ($Estado=="Solicitada"){$label_class='label-info';}
							if ($Estado=="Pendiente"){$label_class='label-warning';}
							
							
							$TValor= $TValor+$Valor;
							
						?>
						<tr>
							<td class="text-center"><?php echo $Tipo; ?></td>
							<td class="text-center"><?php echo $NDocumento; ?></td>
							<td><?php echo $Usuario; ?></td>
							<td><?php echo date("d-m-Y", strtotime($Fecha)); ?></td>
							<td><span class="label <?php echo $label_class;?>"><?php echo $Estado; ?></span></td>
							<td class="text-right"><?php echo '$'.number_format($Valor); ?></td>
	
	
						</tr>
						<?php
					}
					?>
					<tr>
					<td colspan=5><b><span class="pull-right"><?php
						 echo 'Total Pagina:'
						?></span></b></td>
						<td ><b><span class="pull-right"><?php
					
						 echo number_format($TValor);
						?></span></b></td>
					</tr>
					<tr>
					<tr>
					<td colspan=5><h4><span class="pull-right"><?php
						 echo 'Total General:'
						?></span></h4></td>
						<td ><h4><span class="pull-right"><?php
						$query1=mysqli_query($con, "SELECT sum(cuenta_virtual.Credito) FROM $sTable $sWhere;");			
						$rw_Admin1=mysqli_fetch_array($query1);
						 echo number_format($rw_Admin1[0]);
						?></span></h4></td>
					</tr>
					<tr>
						<td colspan=7><span class="pull-right"><?php
						 echo paginate($reload, $page, $total_pages, $adjacents);
						?></span></td>
					</tr>
				  </table>
				</div>
				<?php
			}
		}else{
			if($Pest=='ResEgresos'){
				$sql="SELECT cuenta_virtual.Tipo,cuenta_virtual.NDocumento,cuenta_virtual.Fecha,cuenta_virtual.Debito,usuarios.Razon_Social,cuenta_virtual.Estado FROM
			  $sTable $sWhere $Group $Order LIMIT $offset,$per_page";	
			$query = mysqli_query($con, $sql);
			if ($numrows>0){
				echo mysqli_error($con);
				?>
				<div class="table-responsive">
				  <table class="table table-hover">
					<tr  class="warning">
						<th class="text-center">Tipo</th>
						<th class="text-center">Numero</th>
						<th>Usuario</th>
						<th>Fecha</th>
						<th>Estado</th>
						<th class="text-right">Valor</th>
					</tr>
					<?php
					$TValor=0;
					while ($row=mysqli_fetch_array($query)){
	
							$Tipo=$row['Tipo'];
							$NDocumento=$row['NDocumento'];
							$Valor=$row['Debito'];
							$Usuario=$row['Razon_Social'];
							$Estado=$row['Estado'];
							if ($Estado=="Pagada"){$label_class='label-danger';}
							if ($Estado=="Solicitada"){$label_class='label-info';}
							if ($Estado=="Pendiente"){$label_class='label-warning';}
							$Fecha=$row['Fecha'];
							
							$TValor= $TValor+$Valor;
							
						?>
						<tr>
							<td class="text-center"><?php echo $Tipo; ?></td>
							<td class="text-center"><?php echo $NDocumento; ?></td>
							<td><?php echo $Usuario; ?></td>
							<td><?php echo date("d-m-Y", strtotime($Fecha)); ?></td>
							<td><span class="label <?php echo $label_class;?>"><?php echo $Estado; ?></span></td>
							<td class="text-right"><?php echo '$'.number_format($Valor); ?></td>
	
	
						</tr>
						<?php
					}
					?>
					<tr>
					<td colspan=5><b><span class="pull-right"><?php
						 echo 'Total Pagina:'
						?></span></b></td>
						<td ><b><span class="pull-right"><?php
					
						 echo number_format($TValor);
						?></span></b></td>
					</tr>
					<tr>
					<tr>
					<td colspan=5><h4><span class="pull-right"><?php
						 echo 'Total General:'
						?></span></h4></td>
						<td ><h4><span class="pull-right"><?php
						$query1=mysqli_query($con, "SELECT sum(cuenta_virtual.Debito) FROM $sTable $sWhere;");			
						$rw_Admin1=mysqli_fetch_array($query1);
						 echo number_format($rw_Admin1[0]);
						?></span></h4></td>
					</tr>
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
		}


		
		
	}
?>