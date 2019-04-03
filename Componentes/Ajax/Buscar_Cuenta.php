<?php
	include('is_logged.php');
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		$q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		$Filtro = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Filtro'], ENT_QUOTES)));
		$Estado = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Estado'], ENT_QUOTES)));
		$fechaIni = mysqli_real_escape_string($con,(strip_tags($_REQUEST['fechaIni'], ENT_QUOTES)));
		$fechaFin = mysqli_real_escape_string($con,(strip_tags($_REQUEST['fechaFin'], ENT_QUOTES)));
		$Nit = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Nit'], ENT_QUOTES)));
			
				$sTable = "Cuenta_Virtual 
							INNER JOIN VENTAS On Ventas.Numero = Cuenta_Virtual.NCruce 
							INNER JOIN AFILIADOS On AFILIADOS.IDENTIFICACION=VENTAS.AFILIADO
							inner join Usuarios on Usuarios.Nit=Ventas.Usuario
							inner join Campanas on Campanas.Numero=Ventas.Campana
						";
				$sWhere = "where (Cuenta_Virtual.Fecha >= '$fechaIni' and  Cuenta_Virtual.Fecha <= '$fechaFin') ";
				if ( $_GET['q'] != "" ){
					if ($Filtro == "Numero"){	
						$sWhere.= " and  (Ventas.Numero like '%$q%' )";	
					}else{
						if ($Filtro =="Nombre"){
							$sWhere.= " and  ((AFILIADOS.Primer_Nombre like '%$q%') OR (AFILIADOS.Segundo_Nombre like '%$q%')OR (AFILIADOS.Primer_Apellido like '%$q%') OR (AFILIADOS.Segundo_Apellido like '%$q%'))";	
						}else {
							if ($Filtro =="Cedula"){
								$sWhere.= " and  (AFILIADOS.Identificacion like '%$q%' )";	
							}else{
								if($Filtro =="Telefono"){
									$sWhere.= " and  (AFILIADOS.Telefono like '%$q%' )";	
								}else{
									if($Filtro =="Campaña"){
										$sWhere.= " and  (Campanas.Nombre like '%$q%' )";	
									}else{
										if($Filtro =="Usuario"){
											$sWhere.= " and  (Usuarios.Razon_Social like '%$q%' )";
										}else{
											if($Filtro =="Estado"){
												$sWhere.= " and  (Ventas.Estado_Campana like '%$q%' )";
											}
										}
									}
								}
							}
						}
					}	
				}
				if($Estado<>"Todos"){
					$sWhere.= " and Cuenta_Virtual.Estado ='".$Estado."'";	
				} 
				
				$order=" order by Ventas.Numero ";
			
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

				$sql="SELECT Cuenta_Virtual.Tipo,Cuenta_Virtual.Estado as EstadoCuenta,VENTAS.Numero,AFILIADOS.Primer_Nombre,AFILIADOS.Primer_Apellido,VENTAS.Fecha,USUARIOS.Razon_Social,Ventas.Fecha,
						VENTAS.Estado_Campana,
						CAMPANAS.NOMBRE AS Campana,(Credito-Debito)Valor,Cuenta_Virtual.Porcentaje,Cuenta_Virtual.Comision,Ventas.Campana as NCampana FROM  $sTable $sWhere $Condicion $order LIMIT $offset,$per_page";
				
				$query = mysqli_query($con, $sql);
				if ($numrows>0){
					echo mysqli_error($con);
					?>
					<div class="table-responsive">
					  <table class="table table-hover">
						<tr  class="warning">
							<th class="text-center">Tipo</th>
							<th class="text-center">Numero</th>
							<th>Afiliado</th>
							<th>Usuario</th>
							<th>Campaña</th>
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
								$Afiliado=$row['Primer_Nombre'].' '.$row['Primer_Apellido'] ;
								$Valor=$row['Valor'];
								$Comision=$row['Comision'];
								$Usuario=$row['Razon_Social'];
								$Campana=$row['Campana'];
								$Estado=$row['Estado_Campana'];
								$Fecha=$row['Fecha'];
								$Porcentaje_Comision=$row['Porcentaje'];
								$label_class='label-default';
								$NCampana=$row['NCampana'];
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
								<td><?php echo $Afiliado; ?></td>
								<td><?php echo $Usuario; ?></td>
								<td><?php echo $Campana; ?></td>
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
					<td colspan=7><b><span class="pull-right"><?php
						 echo 'Total Ventas:'
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
					<td colspan=7><h4><span class="pull-right"><?php
						 echo 'Total General:'
						?></span></h4></td>
						<td ><h4><span class="pull-right"><?php
						$query1=mysqli_query($con, "SELECT sum(Credito-Debito) as valor,sum(Cuenta_Virtual.Comision)Comision FROM $sTable $sWhere $Condicion;");			
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