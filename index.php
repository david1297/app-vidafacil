<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
		}

	require_once ("config/db.php");
	require_once ("config/conexion.php");
	$Inicio="active";
	$Proyectos="";
	$Usuarios="";
	$UCrear="";
	$UConsultar="";
	$Notificaciones="";
	$Reportes="";
	$Garantias="";
	$Ajustes="";
	$Transferencias="";
?>
<!doctype html>
<html lang="ES">

<head>
<?php include("head.php");?>
</head>

<body class="">
	<div id="Menus">
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<?php
	include("Menu.php");
	?>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN CONTENT -->
		<div id="main-content">
			<div class="container-fluid">
				<h1 class="sr-only">Inicio</h1>
				<!-- WEBSITE ANALYTICS -->
		
				<div class="dashboard-section">
					<div class="section-heading clearfix">
						<h2 class="section-title"><i class="fas fa-chart-pie"></i>Analisis </h2>
						<!--<a href="#" class="right">View Full Analytics Reports</a>-->
					</div>
					<div class="panel-content">
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="number-chart">
									<div class="mini-stat">
										<div id="number-chart1" class="inlinesparkline">
										<?PHP	
										$Usuario=$_SESSION['Nit'];
										$Total_Semana_Ant=0;
										if($_SESSION['Rol']=='1'){
											$query1=mysqli_query($con, "SELECT SUM(VALOR)VALOR  FROM VENTAS WHERE WEEK(VENTAS.fecha) =WEEK(NOW())-1 ;");
										}else{
											$query1=mysqli_query($con, "SELECT SUM(VALOR)VALOR  FROM VENTAS WHERE WEEK(VENTAS.fecha) =WEEK(NOW())-1 and VENTAS.Usuario='".$Usuario."';");

										}
											
											$rw_Admin1=mysqli_fetch_array($query1);
											$Total_Semana_Ant=$rw_Admin1['VALOR'];
											$Total_Semana=0;
											if($_SESSION['Rol']=='1'){
											$query1=mysqli_query($con, "SELECT SUM(VALOR) VALOR,day(VENTAS.fecha) AS DIA  FROM VENTAS WHERE WEEK(VENTAS.fecha) =WEEK(NOW())    group by DIA;");

											}else{
											$query1=mysqli_query($con, "SELECT SUM(VALOR) VALOR,day(VENTAS.fecha) AS DIA  FROM VENTAS WHERE WEEK(VENTAS.fecha) =WEEK(NOW()) and VENTAS.Usuario='".$Usuario."'   group by DIA;");
												
											}
											$h=0;
											while($rw_Admin1=mysqli_fetch_array($query1)){
												if ($h==0){
													ECHO $rw_Admin1['VALOR'];
													$h=1;
												}else{
													ECHO ','.$rw_Admin1['VALOR'];
												}
												$Total_Semana = $Total_Semana +$rw_Admin1['VALOR']; 
											}
											echo'</div>';
											if (($Total_Semana<>0)and($Total_Semana_Ant<>0)){
												$Incremento= (($Total_Semana/$Total_Semana_Ant)-1)*100;	
											}else{
												$Incremento=0;	
											}
											if ($Incremento <0 ){
												echo '<p class="text-muted"><i class="fa fa-caret-down text-danger"></i> '.number_format($Incremento).'% en comparación con la semana pasada </p>';
											}else{
												echo '<p class="text-muted"><i class="fa fa-caret-up text-success"></i>'.number_format($Incremento).'% en comparación con la semana pasada</p>';
											}
											?>
										
									</div>
									<div class="number"><span><?php echo '$ '.number_format($Total_Semana);?></span> <span>Ventas</span></div>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="number-chart">
									<div class="mini-stat">
										<div id="number-chart2" class="inlinesparkline">
										<?PHP	
										$Total_Semana_Ant=0;
											
if($_SESSION['Rol']=='1'){
	$query1=mysqli_query($con, "SELECT SUM(Comision) VALOR  FROM CUENTA_VIRTUAL 
								
											WHERE    WEEK(fecha) =WEEK(NOW())-1 ;");

	}else{
		$query1=mysqli_query($con, "SELECT SUM(Comision) VALOR  FROM CUENTA_VIRTUAL 
								
		WHERE   CUENTA_VIRTUAL.Usuario='".$Usuario."' and WEEK(fecha) =WEEK(NOW())-1 ;");

	}
											$rw_Admin1=mysqli_fetch_array($query1);
											$Total_Semana_Ant=$rw_Admin1['VALOR'];
											$Total_Semana=0;
											

																						
if($_SESSION['Rol']=='1'){
	$query1=mysqli_query($con, "SELECT SUM(Comision) VALOR,day(fecha) AS DIA  FROM CUENTA_VIRTUAL 
										
											WHERE WEEK(fecha) =WEEK(NOW())   group by DIA;");

	}else{
		$query1=mysqli_query($con, "SELECT SUM(Comision) VALOR,day(fecha) AS DIA  FROM CUENTA_VIRTUAL 
										
											WHERE  CUENTA_VIRTUAL.Usuario='".$Usuario."' and  WEEK(fecha) =WEEK(NOW())   group by DIA;");

	}
											$h=0;
											while($rw_Admin1=mysqli_fetch_array($query1)){
												if ($h==0){
													ECHO $rw_Admin1['VALOR'];
													$h=1;
												}else{
													ECHO ','.$rw_Admin1['VALOR'];
												}
												$Total_Semana = $Total_Semana +$rw_Admin1['VALOR']; 
											}
											echo'</div>';
											if (($Total_Semana<>0)and($Total_Semana_Ant<>0)){
												$Incremento= (($Total_Semana/$Total_Semana_Ant)-1)*100;	
											}else{
												$Incremento=0;	
											}
											
											if ($Incremento <=0 ){
												echo '<p class="text-muted"><i class="fa fa-caret-down text-danger"></i> '.number_format($Incremento).'% en comparación con la semana pasada </p>';
											}else{
												echo '<p class="text-muted"><i class="fa fa-caret-up text-success"></i>'.number_format($Incremento).'% en comparación con la semana pasada</p>';
											}
											?>
										
									</div>
									<div class="number"><span><?php echo '$ '.number_format($Total_Semana);?></span> <span>Comisiones</span></div>
								</div>
							</div>
							
						</div>
					</div>
					<br>
					<br>
					<div class="row">
						<div class="section-heading clearfix">
							<h2 class="section-title"><i class="fa fa-shopping-cart"></i> Resumen de ventas</h2>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="panel-content">
									<h3 class="heading"><i class="fa fa-square"></i> Hoy</h3>
									<ul class="list-unstyled list-justify large-number">
										<li class="clearfix">Ingresos
											<span>
											<?php
											if($_SESSION['Rol']=='1'){
												$query1=mysqli_query($con, "SELECT SUM(VALOR)VALOR,count(valor)as NVentas,SUM(CUENTA_VIRTUAL.Comision)Comision
                                                FROM VENTAS left join CUENTA_VIRTUAL on CUENTA_VIRTUAL.tipo ='V' and CUENTA_VIRTUAL.NDocumento = VENTAS.numero
												where VENTAS.fecha=CURDATE()  ; ");
												}else{
													$query1=mysqli_query($con, "SELECT SUM(VALOR)VALOR,count(valor)as NVentas,SUM(CUENTA_VIRTUAL.Comision)Comision
                                                FROM VENTAS left join CUENTA_VIRTUAL on CUENTA_VIRTUAL.tipo ='V' and CUENTA_VIRTUAL.NDocumento = VENTAS.numero
												where VENTAS.fecha=CURDATE() and VENTAS.Usuario='".$Usuario."' ; ");
												}
												
												
																			$rw_Admin1=mysqli_fetch_array($query1);
												echo '$ '.number_format($rw_Admin1['VALOR']).'</span></li>
												<li class="clearfix">Comisiones <span>$ '.number_format($rw_Admin1['Comision']).'</span></li>
												<li class="clearfix">Ventas <span>'.$rw_Admin1['NVentas'].'</span></li>		
												';		
											?>
									</ul>
								</div>
							</div>
							<div class="col-md-6">
								<div class="panel-content">
									<h3 class="heading"><i class="fa fa-square"></i> Rendimiento de las ventas</h3>
									<table class="table">
										<?php
										$Total_Semana_Ant=0;
										$NVentas_Semana_Ant=0;
										$Comision_Semana_Ant=0;
										

if($_SESSION['Rol']=='1'){
	$query1=mysqli_query($con, "SELECT SUM(VALOR)VALOR,count(valor)as NVentas,
										SUM(CUENTA_VIRTUAL.Comision)Comision FROM VENTAS 
										left join CUENTA_VIRTUAL on CUENTA_VIRTUAL.tipo ='V' and CUENTA_VIRTUAL.NDocumento = VENTAS.numero
									
										where WEEK(VENTAS.fecha) =WEEK(NOW())-1 ; ");
	}else{
		$query1=mysqli_query($con, "SELECT SUM(VALOR)VALOR,count(valor)as NVentas,
										SUM(CUENTA_VIRTUAL.Comision)Comision FROM VENTAS 
										left join CUENTA_VIRTUAL on CUENTA_VIRTUAL.tipo ='V' and CUENTA_VIRTUAL.NDocumento = VENTAS.numero
									
										where VENTAS.Usuario='".$Usuario."' and WEEK(VENTAS.fecha) =WEEK(NOW())-1 ; ");
	}
										$rw_Admin1=mysqli_fetch_array($query1);
										$Total_Semana_Ant=$rw_Admin1['VALOR'];
										$NVentas_Semana_Ant=$rw_Admin1['NVentas'];
										$Comision_Semana_Ant=$rw_Admin1['Comision'];

										$Total_Semana=0;
										$NVentas_Semana=0;
										$Comision_Semana=0;
										

if($_SESSION['Rol']=='1'){
	$query1=mysqli_query($con, "SELECT SUM(VALOR)VALOR,count(valor)as NVentas,
										SUM(CUENTA_VIRTUAL.Comision)Comision FROM VENTAS 
										left join CUENTA_VIRTUAL on CUENTA_VIRTUAL.tipo ='V' and CUENTA_VIRTUAL.NDocumento = VENTAS.numero
										where WEEK(VENTAS.fecha) =WEEK(NOW()) ; ");
	}else{
		$query1=mysqli_query($con, "SELECT SUM(VALOR)VALOR,count(valor)as NVentas,
										SUM(CUENTA_VIRTUAL.Comision)Comision FROM VENTAS 
										left join CUENTA_VIRTUAL on CUENTA_VIRTUAL.tipo ='V' and CUENTA_VIRTUAL.NDocumento = VENTAS.numero
										where VENTAS.Usuario='".$Usuario."' and WEEK(VENTAS.fecha) =WEEK(NOW()) ; ");
	}
										$rw_Admin1=mysqli_fetch_array($query1);
										$Total_Semana=$rw_Admin1['VALOR'];
										$NVentas_Semana=$rw_Admin1['NVentas'];
										$Comision_Semana=$rw_Admin1['Comision'];

										?>
										<thead>
											<tr>
												<th>&nbsp;</th>
												<th>La semana pasada</th>
												<th>Esta semana</th>
												<th>Cambio</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<th>Ingresos</th>
												<td>$ <?php echo number_format($Total_Semana_Ant);?></td>
												<td><span class="text-info">$ <?php echo number_format($Total_Semana);?></span></td>
												<td>
												<?php
												if (($Total_Semana<>0)and($Total_Semana_Ant<>0)){
													$Incremento= (($Total_Semana/$Total_Semana_Ant)-1)*100;	
												}else{
													$Incremento=0;	
												}
													
													if ($Incremento <0 ){
														echo '<span class="text-danger">'.number_format($Incremento).'%</span>';
													}else{
														echo '<span class="text-success">'.number_format($Incremento).'%</span>';

													}
												?>
												</td>
											</tr>
											<tr>
												<th>Comisiones</th>
												<td>$ <?php echo number_format($Comision_Semana_Ant);?></td>
												<td>
													<div class="text-info">$ <?php echo number_format($Comision_Semana);?></div>
												</td>
												<td>
												<?php
												if (($Comision_Semana<>0)and($Comision_Semana_Ant<>0)){
													$Incremento= (($Comision_Semana/$Comision_Semana_Ant)-1)*100;	
												}else{
													$Incremento=0;	
												}
													
													if ($Incremento <0 ){
														echo '<span class="text-danger">'.number_format($Incremento).'%</span>';
													}else{
														echo '<span class="text-success">'.number_format($Incremento).'%</span>';

													}
												?>
												</td>
											</tr>
											<tr>
												<th>Ventas</th>
												<td><?php echo $NVentas_Semana_Ant;?></td>
												<td>
													<div class="text-info"><?php echo $NVentas_Semana;?></div>
												</td>
												<td>
												<?php
												if (($NVentas_Semana<>0)and($NVentas_Semana_Ant<>0)){
													$Incremento= (($NVentas_Semana/$NVentas_Semana_Ant)-1)*100;	
												}else{
													$Incremento=0;	
												}
													
													if ($Incremento <0 ){
														echo '<span class="text-danger">'.number_format($Incremento).'%</span>';
													}else{
														echo '<span class="text-success">'.number_format($Incremento).'%</span>';

													}
												?>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="section-heading clearfix">
								<h2 class="section-title"><i class="fa fa-bullhorn"></i> Resumen de Campañas</h2>
							</div>
							<div class="col-md-6">
								<div class="panel-content">
									<h2 class="heading"><i class="fa fa-square"></i> Hoy</h2>
									<div class="table-responsive">
										<table class="table no-margin">
											<thead>
												<tr>
													<th>Campaña</th>
													<th>Ventas</th>
													<th>Ingresos</th>
													<th>Comisiones</th>
												</tr>
											</thead>
											<tbody>
												<?php
													
													if($_SESSION['Rol']=='1'){
														$query1=mysqli_query($con, "SELECT CAMPANAS.Nombre, SUM(VALOR)VALOR,count(valor)as NVentas,
													
													SUM(CUENTA_VIRTUAL.Comision)Comision FROM VENTAS 
													left join CUENTA_VIRTUAL on CUENTA_VIRTUAL.tipo ='V' and CUENTA_VIRTUAL.NDocumento = VENTAS.numero
													INNER JOIN CAMPANAS ON CAMPANAS.Numero = VENTAS.Campana
													where  VENTAS.fecha=CURDATE()  group by CAMPANAS.Nombre;");
														}else{
															$query1=mysqli_query($con, "SELECT CAMPANAS.Nombre, SUM(VALOR)VALOR,count(valor)as NVentas,
													
													SUM(CUENTA_VIRTUAL.Comision)Comision FROM VENTAS 
													left join CUENTA_VIRTUAL on CUENTA_VIRTUAL.tipo ='V' and CUENTA_VIRTUAL.NDocumento = VENTAS.numero
													INNER JOIN CAMPANAS ON CAMPANAS.Numero = VENTAS.Campana
													where VENTAS.Usuario='".$Usuario."' and VENTAS.fecha=CURDATE()  group by CAMPANAS.Nombre;");
														}
													$h=0;
													while($rw_Admin1=mysqli_fetch_array($query1)){
														echo '
														<tr>
															<td>'.$rw_Admin1['Nombre'].'</td>
															<td>'.$rw_Admin1['NVentas'].'</td>
															<td>$ '.number_format($rw_Admin1['VALOR']).'</td>
															<td>$ '.number_format($rw_Admin1['Comision']).'</td>
														
														</tr>';
													}	
												?>


												
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="panel-content">
									<h2 class="heading"><i class="fa fa-square"></i> Rendimiento de las Campañas</h2>
									<div class="table-responsive">
										<table class="table no-margin">
											<thead>
												<tr>
												<th>Campaña</th>
												<th>&nbsp;</th>
												<th>La semana pasada</th>
												<th>Esta semana</th>
												<th>Cambio</th>
												</tr>
											</thead>
											<tbody>
												<?php
													
if($_SESSION['Rol']=='1'){
	$query1=mysqli_query($con, "SELECT CAMPANAS.Nombre,CAMPANAS.Numero, SUM(VALOR)VALOR,count(valor)as NVentas,
													
													SUM(CUENTA_VIRTUAL.Comision)Comision FROM VENTAS 
													INNER JOIN CAMPANAS ON CAMPANAS.Numero = VENTAS.Campana
													left join CUENTA_VIRTUAL on CUENTA_VIRTUAL.tipo ='V' and CUENTA_VIRTUAL.NDocumento = VENTAS.numero
													where  WEEK(VENTAS.fecha) =WEEK(NOW())  group by CAMPANAS.Nombre,CAMPANAS.Numero;");

	}else{
		$query1=mysqli_query($con, "SELECT CAMPANAS.Nombre,CAMPANAS.Numero, SUM(VALOR)VALOR,count(valor)as NVentas,
													
		SUM(CUENTA_VIRTUAL.Comision)Comision FROM VENTAS 
		INNER JOIN CAMPANAS ON CAMPANAS.Numero = VENTAS.Campana
		left join CUENTA_VIRTUAL on CUENTA_VIRTUAL.tipo ='V' and CUENTA_VIRTUAL.NDocumento = VENTAS.numero
		where VENTAS.Usuario='".$Usuario."' and WEEK(VENTAS.fecha) =WEEK(NOW())  group by CAMPANAS.Nombre,CAMPANAS.Numero;");

	}
													$h=0;
													while($rw_Admin1=mysqli_fetch_array($query1)){
														
														if($_SESSION['Rol']=='1'){
															$query=mysqli_query($con, "SELECT  SUM(VALOR)VALOR,count(valor)as NVentas,
														SUM(CUENTA_VIRTUAL.Comision)Comision FROM VENTAS 
													INNER JOIN CAMPANAS ON CAMPANAS.Numero = VENTAS.Campana
													left join CUENTA_VIRTUAL on CUENTA_VIRTUAL.tipo ='V' and CUENTA_VIRTUAL.NDocumento = VENTAS.numero
													where  WEEK(VENTAS.fecha) =WEEK(NOW())-1  and CAMPANAS.Numero=".$rw_Admin1['Numero'].";");
														
															}else{
																$query=mysqli_query($con, "SELECT  SUM(VALOR)VALOR,count(valor)as NVentas,
														SUM(CUENTA_VIRTUAL.Comision)Comision FROM VENTAS 
													INNER JOIN CAMPANAS ON CAMPANAS.Numero = VENTAS.Campana
													left join CUENTA_VIRTUAL on CUENTA_VIRTUAL.tipo ='V' and CUENTA_VIRTUAL.NDocumento = VENTAS.numero
													where  VENTAS.Usuario='".$Usuario."' and WEEK(VENTAS.fecha) =WEEK(NOW())-1  and CAMPANAS.Numero=".$rw_Admin1['Numero'].";");
														
															}$rw_Admin=mysqli_fetch_array($query);
														echo '
														<tr>
															<td>'.$rw_Admin1['Nombre'].'</td>
															<th>Ingresos</th>
															<td>$ '.number_format($rw_Admin['VALOR']).'</td>
															<td><div class="text-info">$ '.number_format($rw_Admin1['VALOR']).'</div></td>
															<td>';												
															if (($rw_Admin1['VALOR']<>0)and($rw_Admin['VALOR']<>0)){
															$Incremento= (($rw_Admin1['VALOR']/$rw_Admin['VALOR'])-1)*100;
																
															}else{
																$Incremento= 0;
															}
										
															if ($Incremento <=0 ){
																echo '<span class="text-danger">'.number_format($Incremento).'%</span>';
															}else{
																echo '<span class="text-success">'.number_format($Incremento).'%</span>';
															}
														echo '</td>
														</tr>';
														echo '
														<tr>
															<td></td>
															<th>Comisiones</th>
															<td>$ '.number_format($rw_Admin['Comision']).'</td>
															<td><div class="text-info">$ '.number_format($rw_Admin1['Comision']).'</div></td>
															<td>';												
															if (($rw_Admin1['Comision']<>0)and($rw_Admin['Comision']<>0)){
															$Incremento= (($rw_Admin1['Comision']/$rw_Admin['Comision'])-1)*100;
																
															}else{
																$Incremento= 0;
															}
										
															if ($Incremento <=0 ){
																echo '<span class="text-danger">'.number_format($Incremento).'%</span>';
															}else{
																echo '<span class="text-success">'.number_format($Incremento).'%</span>';
															}
														echo '</td>
														</tr>';
														echo '
														<tr>
															<td></td>
															<th>Ventas</th>
															<td> '.number_format($rw_Admin['NVentas']).'</td>
															<td><div class="text-info"> '.number_format($rw_Admin1['NVentas']).'</div></td>
															<td>';												
															if (($rw_Admin1['NVentas']<>0)and($rw_Admin['NVentas']<>0)){
															$Incremento= (($rw_Admin1['NVentas']/$rw_Admin['NVentas'])-1)*100;
																
															}else{
																$Incremento= 0;
															}
										
															if ($Incremento <=0 ){
																echo '<span class="text-danger">'.number_format($Incremento).'%</span>';
															}else{
																echo '<span class="text-success">'.number_format($Incremento).'%</span>';
															}
														echo '</td>
														</tr>';
													}	
												?>


												
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="dashboard-section">
							<div class="section-heading clearfix">
								<h2 class="section-title"><i class="fa fa-flag-checkered"></i> Recorrido</h2>
							</div>
							<canvas id="Recorrido" height='100px' ></canvas>	
						</div>
					</div>
					<?php 
if($_SESSION['Rol']=='1'){
	$ocultar="";
}else{
	$ocultar="hidden";
}
	?>
					
					<div class="row">
						<div class="col-md-4 <?php echo $ocultar; ?>">
							<!-- TRAFFIC SOURCES -->
							<div class="panel-content">
								<h2 class="heading"><i class="fa fa-square"></i> Fuentas de ingreso</h2>
								<canvas id="myChart" width="400" height="400"></canvas>
							</div>
						</div>
						<div class="col-md-4 <?php echo $ocultar; ?>">
							<!-- TRAFFIC SOURCES -->
							<div class="panel-content">
								<h2 class="heading"><i class="fa fa-square"></i> Afiliados Tipificados</h2>
								<canvas id="AfiliadosT" width="400" height="400"></canvas>
							</div>
						</div>
					</div>
				
				
				<?php 
if($_SESSION['Rol']=='1'){
	?>

				<div class="dashboard-section no-margin">
					<div class="section-heading clearfix">
						<h2 class="section-title"><i class="fa fa-user-circle"></i> Asociados <span class="section-subtitle">(Actualizado)</span></h2>
						
					</div>
					<div class="panel-content">
						<div class="row">
							<div class="col-md-4 col-sm-6">
								<p class="metric-inline"><i class="far fa-id-card"></i>
								<?php
									$query=mysqli_query($con, "SELECT COUNT(*)Afiliados FROM AFILIADOS");
										$rw_Admin=mysqli_fetch_array($query);
								echo '+'.$rw_Admin['Afiliados'];		
								?> <span>AFILIADOS</span></p>
							</div>
							<div class="col-md-4 col-sm-6">
								<p class="metric-inline"><i class="far fa-handshake"></i>
								<?php
									$query=mysqli_query($con, "SELECT  COUNT(*)Distribuidores FROM USUARIOS where tipo='Distribuidor';   ");
										$rw_Admin=mysqli_fetch_array($query);
								echo '+'.$rw_Admin['Distribuidores'];		
								?>  <span>DISTRIBUIDORES</span></p>
							</div>
							<div class="col-md-4 col-sm-6">
								<p class="metric-inline"><i class="fas fa-users"></i> 
								<?php
									$query=mysqli_query($con, "SELECT  COUNT(*)Operarios FROM USUARIOS where tipo='Operador';      ");
										$rw_Admin=mysqli_fetch_array($query);
								echo '+'.$rw_Admin['Operarios'];		
								?>  <span>OPERARIOS</span></p>
							</div>
							
							

						</div>
					</div>
				</div>
				<?php
}

				?>
				<!-- END SOCIAL -->
			</div>
		</div>
		<!-- END MAIN CONTENT -->
		
	</div>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/metisMenu/metisMenu.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/jquery-sparkline/js/jquery.sparkline.min.js"></script>
	<script src="assets/vendor/bootstrap-progressbar/js/bootstrap-progressbar.min.js"></script>
	<script src="assets/vendor/toastr/toastr.js"></script>
	<script src="assets/scripts/common.js"></script>
	<script>
	$(function() {
		
// grafica de Torta Usuarios Chartjs
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ["Distribuidores", "Operarios"],
        datasets: [{
            label: 'Valor de Ventas',
            data: [<?PHP
				$Dis=0;
				$Ope=0;
				$query=mysqli_query($con, "SELECT  SUM(VALOR)VALOR,USUARIOS.Tipo FROM VENTAS 
				INNER JOIN USUARIOS ON USUARIOS.Nit = VENTAS.Usuario 

				where   WEEK(VENTAS.fecha) =WEEK(NOW()) group by USUARIOS.Tipo;  ");
				while($rw_Admin=mysqli_fetch_array($query)){
				if ($rw_Admin['Tipo']=='Distribuidor'){
					$Dis=$rw_Admin['VALOR'];
				}else{
					if ($rw_Admin['Tipo']=='Operador'){
						$Ope=$rw_Admin['VALOR'];
					}
				}
			}
				echo $Dis.','.$Ope;?>],
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)'
                
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)'
            ],
			borderWidth: 1
			
        }]
    },
    options: {
		responsive: true
    }
});

var ctx = document.getElementById("AfiliadosT").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: [<?PHP
				$Dis=0;
				$Ope=0;
				$query=mysqli_query($con, "SELECT TIPIFICACIONES.Categoria,count(TIPIFICACIONES.Categoria) FROM AFILIADOS inner join TIPIFICACIONES on TIPIFICACIONES.Numero = AFILIADOS.tipificacion
				group by TIPIFICACIONES.Categoria;");
				$h=0;
				while($rw_Admin=mysqli_fetch_array($query)){
					if($h==0){
						echo '"'.$rw_Admin[0].'"';
						$h=$h+1;
					}else{
					
						echo ',"'.$rw_Admin[0].'"';
					}
				}
		?>],
        datasets: [{
            label: 'Valor de Ventas',
            data: [<?PHP
				$Dis=0;
				$Ope=0;
				$query=mysqli_query($con, "SELECT TIPIFICACIONES.Categoria,count(TIPIFICACIONES.Categoria) FROM AFILIADOS inner join TIPIFICACIONES on TIPIFICACIONES.Numero = AFILIADOS.tipificacion
				group by TIPIFICACIONES.Categoria;");
				$h=0;
				while($rw_Admin=mysqli_fetch_array($query)){
					if($h==0){
						echo $rw_Admin[1];
						$h=$h+1;
					}else{
					
						echo ','.$rw_Admin[1];
					}
				}
		?>],
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
				'rgba(54, 162, 235, 1)',
				'rgba(246, 255, 51, 1)',
				'rgba(22, 212, 0, 1)',
				'rgba(0, 212, 209, 1)',
				'rgba(3, 0, 212, 1)',
				'rgba(206, 0, 212, 1)',
				'rgba(255, 4, 27, 1)',
                
            ],
			borderWidth: 1
			
        }]
    },
    options: {
		responsive: true
    }
});
// grafica recorrido Chartjs
var ctx = document.getElementById('Recorrido').getContext('2d');
var chart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Enero', 'Febrero','Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
        datasets: [{
            label: "Valor de Ventas",
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235,1)',
            data: [<?php
						$Ene=0;
						$Feb=0;
						$Mar=0;
						$Abr=0;
						$May=0;
						$Jun=0;
						$Jul=0;
						$Ago=0;
						$Sep=0;
						$Oct=0;
						$Nov=0;
						$Dic=0;
							if($_SESSION['Rol']=='1'){
								$query1=mysqli_query($con, "SELECT SUM(VALOR)VALOR,month(VENTAS.fecha) mes FROM VENTAS WHERE  year(VENTAS.fecha) =year(NOW())  group by mes;  ");

							}else{
								$query1=mysqli_query($con, "SELECT SUM(VALOR)VALOR,month(VENTAS.fecha) mes FROM VENTAS WHERE VENTAS.Usuario='".$Usuario."' and year(VENTAS.fecha) =year(NOW())  group by mes;  ");

							}
							
							while($rw_Admin1=mysqli_fetch_array($query1)){
								if($rw_Admin1['mes']=='1'){
									$Ene=$rw_Admin1['VALOR'];
								}else{
									if($rw_Admin1['mes']=='2'){
										$Feb=$rw_Admin1['VALOR'];
									}else{
										if($rw_Admin1['mes']=='3'){
											$Mar=$rw_Admin1['VALOR'];
										}else{
											if($rw_Admin1['mes']=='4'){
												$Abr=$rw_Admin1['VALOR'];
											}else{
												if($rw_Admin1['mes']=='5'){
													$May=$rw_Admin1['VALOR'];
												}else{
													if($rw_Admin1['mes']=='6'){
														$Jun=$rw_Admin1['VALOR'];
													}else{
														if($rw_Admin1['mes']=='7'){
															$Jul=$rw_Admin1['VALOR'];
														}else{
															if($rw_Admin1['mes']=='8'){
																$Ago=$rw_Admin1['VALOR'];
															}else{
																if($rw_Admin1['mes']=='9'){
																	$Sep=$rw_Admin1['VALOR'];
																}else{
																	if($rw_Admin1['mes']=='10'){
																		$Oct=$rw_Admin1['VALOR'];
																	}else{
																		if($rw_Admin1['mes']=='11'){
																			$Nov=$rw_Admin1['VALOR'];
																		}else{
																			if($rw_Admin1['mes']=='12'){
																				$Dic=$rw_Admin1['VALOR'];
																			}
																		}
																	}
																}
															}
														}
													}
												}
											}
										}
									}
								}
							}
							echo $Ene.','.$Feb.','.$Mar.','.$Abr.','.$May.','.$Jun.','.$Jul.','.$Ago.','.$Sep.','.$Oct.','.$Nov.','.$Dic;
			
			?>],
				pointRadius: 5,
				pointHoverRadius: 10,
        },]
    },options: {
		responsive: true,
		height: '300px',
		elements: {
			point: {
				pointStyle: 'circle'
			}
		},tooltips: {
        	callbacks: {
                label: function(tooltipItem, data) {
                    var label = data.datasets[tooltipItem.datasetIndex].label || '';
                    if (label) {
                        label += ': ';
                    }
                    label +=  new Intl.NumberFormat().format(tooltipItem.yLabel) ;
                    return label;
                }
            }
        },scales: {
			xAxes: [{
				display: true,
			}],
			yAxes: [{
				display: true,
				position: 'right',
				type: 'linear',
				scaleLabel: {
					display: true,
					labelString: 'Valor de Venta($)'
				},
				ticks: {
					callback: function(value, index, values) {
						return '$' + new Intl.NumberFormat().format(value) ;
					}
				}
			}]
		}
    }
});



		
		var sparklineNumberChart = function() {

			var params = {
				width: '140px',
				height: '30px',
				lineWidth: '2',
				lineColor: '#20B2AA',
				fillColor: false,
				spotRadius: '2',
				spotColor: false,
				minSpotColor: false,
				maxSpotColor: false,
				disableInteraction: false
			};

			$('#number-chart1').sparkline('html', params);
			$('#number-chart2').sparkline('html', params);
			$('#number-chart3').sparkline('html', params);
			$('#number-chart4').sparkline('html', params);
		};

		sparklineNumberChart();


	


		// progress bars
		$('.progress .progress-bar').progressbar({
			display_text: 'none'
		});
		toastr.options.closeButton = true;
		toastr.options.positionClass = 'toast-bottom-right';
		toastr.options.showDuration = 1000;
		toastr['info']('bienvenido a Bp System, un panel de administración único.');
	});
	</script>
</body>

</html>
