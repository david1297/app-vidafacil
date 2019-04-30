<?php
	include('is_logged.php');
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		$Estado = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Estado'], ENT_QUOTES)));
		$fechaIni = mysqli_real_escape_string($con,(strip_tags($_REQUEST['fechaIni'], ENT_QUOTES)));
		$fechaFin = mysqli_real_escape_string($con,(strip_tags($_REQUEST['fechaFin'], ENT_QUOTES)));
		$Nit = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Nit'], ENT_QUOTES)));
			
				$sTable = "Cuenta_Virtual 
							inner join Usuarios on Usuarios.Nit=Cuenta_Virtual.Usuario
						";
				$sWhere = "where (Cuenta_Virtual.Fecha >= '$fechaIni' and  Cuenta_Virtual.Fecha <= '$fechaFin') ";
				if($Estado<>"Todos"){
					$sWhere.= " and Cuenta_Virtual.Estado ='".$Estado."'";	
				} 
				$order=" order by Cuenta_Virtual.Tipo,Cuenta_Virtual.NDocumento ";
			
		}
		$sWhere.='and Cuenta_Virtual.Usuario = "'.$Nit.'" and Cuenta_Virtual.Estado <>"Pagada" ';
		include 'pagination.php';
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 50;
		$adjacents  = 4;
		$offset = ($page - 1) * $per_page;
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");

		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './Consultar-Cuenta.php';
		$Condicion='';							
		$sql="SELECT Cuenta_Virtual.NDocumento as Numero,Cuenta_Virtual.Tipo,Cuenta_Virtual.Estado as EstadoCuenta,USUARIOS.Razon_Social,Cuenta_Virtual.Fecha,
				(Credito-Debito)Valor,Cuenta_Virtual.Porcentaje,Cuenta_Virtual.Comision FROM  $sTable $sWhere $Condicion $order LIMIT $offset,$per_page";
				
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
							<th class="text-right">Porcentaje</th>
							<th class="text-right">Comision</th>
						</tr>
						<?php
						$TValor=0;
						$TComision=0;
						while ($row=mysqli_fetch_array($query)){
		
								$Numero=$row['Numero'];
								$Tipo=$row['Tipo'];
								$Valor=$row['Valor'];
								$Comision=$row['Comision'];
								$Usuario=$row['Razon_Social'];
								$Fecha=$row['Fecha'];
								$Porcentaje_Comision=$row['Porcentaje'];
								$label_class='label-default';
								$Estado=$row['EstadoCuenta'];
								if ($Estado=='Pagada'){
									
									$label_class='label-success';
								}else{
									if($Estado=='Solicitada'){
										$label_class='label-info';
									}else{
										if($Estado=='Rechazada'){
											$label_class='label-danger';
										}else{
											$label_class='label-warning';
										}
									}
									
									
									
							
									
								}
								$TComision=$TComision+$Comision;
								$TValor=$TValor+$Valor;	
																if ($Valor >= 0){
									$Spam_Class ='text-info'; 
								}else{
									$Spam_Class ='text-danger'; 
		
								}
								
							?>
							<tr>
								<td class="text-center"><?php echo $Tipo; ?></td>
								<td class="text-center"><?php echo $Numero; ?></td>
								<td><?php echo $Usuario; ?></td>
								<td><?php echo date("d-m-Y", strtotime($Fecha)); ?></td>
								<td><span class="label <?php echo $label_class;?>"><?php echo $Estado; ?></span></td>
								<td class="text-right"><span class="<?php echo $Spam_Class;?>"><?php echo '$'.number_format($Valor); ?></span></td>
								<td class="text-right"><?php echo $Porcentaje_Comision.'%'; ?></td>
								<td class="text-right"><span class="<?php echo $Spam_Class;?>"><?php echo '$'.number_format($Comision); ?></span></td>
		
		
							</tr>
							<?php
						}
						?>
						<tr>
					<td colspan=5><b><span class="pull-right"><?php
						 echo 'Total Movimiento:'
						?></span></b></td>
						<td ><b><span class="pull-right"><?php
					
						 echo number_format($TValor);
						?></span></b></td>
						<td ><b><span class="pull-right"><?php
						 echo 'Total Comision:'
						?></span></b></td>
						<td ><b><span class="pull-right"><?php
					
						 echo number_format($TComision);
						?></span></b></td>
					</tr>
					<tr>
					<tr>
					<td colspan=5><h4><span class="pull-right"><?php
						 echo 'Total General:'
						?></span></h4></td>
						<td ><h4><span class="pull-right"><?php
						$query1=mysqli_query($con, "SELECT sum(Credito-Debito) as valor,sum(Cuenta_Virtual.Comision)Comision 
						FROM $sTable $sWhere $Condicion;");			
						$rw_Admin1=mysqli_fetch_array($query1);
						 echo number_format($rw_Admin1[0]);
						?></span></h4></td>
					<td><h4><span class="pull-right"><?php
						 echo 'Total General:'
						?></span></h4></td>
						<td ><h4><span class="pull-right"><?php
						
						 echo number_format($rw_Admin1[1]);
						?></span></h4></td>
						
					</tr>
						<tr>
							<td colspan=9><span class="pull-right"><?php
							 echo paginate($reload, $page, $total_pages, $adjacents);
							?></span></td>
						</tr>
					  </table>
					</div>
					<?php
				}		
			
		


		
		
	
?>