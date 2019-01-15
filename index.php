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
?>
<!doctype html>
<html lang="es">

<head>
<?php include("head.php");?>
</head>

<body>
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
							<div class="col-md-4 col-sm-6">
								<div class="number-chart">
									<div class="mini-stat">
										<div id="number-chart1" class="inlinesparkline">23,80,20,32,67,38,63,12,34,22</div>
										<p class="text-muted"><i class="fa fa-caret-up text-success"></i> 19% en comparación con la semana pasada</p>
									</div>
									<div class="number"><span>$22,500</span> <span>Ganancias</span></div>
								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="number-chart">
									<div class="mini-stat">
										<div id="number-chart2" class="inlinesparkline">77,44,10,80,88,87,19,59,83,88</div>
										<p class="text-muted"><i class="fa fa-caret-up text-success"></i>24% en comparación con la semana pasada</p>
									</div>
									<div class="number"><span>$80,500</span> <span>Ventas</span></div>
								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="number-chart">
									<div class="mini-stat">
										<div id="number-chart4" class="inlinesparkline">28,44,70,21,86,54,90,25,83,42</div>
										<p class="text-muted"><i class="fa fa-caret-down text-danger"></i> 6% en comparación con la semana pasada </p>
									</div>
									<div class="number"><span>$30,500</span> <span>Gastos</span></div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<!-- TRAFFIC SOURCES -->
							<div class="panel-content">
								<h2 class="heading"><i class="fa fa-square"></i> Fuentas de ingreso</h2>
								<div id="demo-pie-chart" class="ct-chart"></div>
							</div>
							<!-- END TRAFFIC SOURCES -->
						</div>
						<div class="col-md-4">
							<!-- REFERRALS -->
							<div class="panel-content">
								<h2 class="heading"><i class="fa fa-square"></i> Visitas</h2>
								<ul class="list-unstyled list-referrals">
									<li>
										<p><span class="value">3,454</span><span class="text-muted">Visitas por Facebook</span></p>
										<div class="progress progress-xs progress-transparent custom-color-blue">
											<div class="progress-bar" data-transitiongoal="87"></div>
										</div>
									</li>
									<li>
										<p><span class="value">2,102</span><span class="text-muted">Visitas por Twitter</span></p>
										<div class="progress progress-xs progress-transparent custom-color-purple">
											<div class="progress-bar" data-transitiongoal="34"></div>
										</div>
									</li>
									<li>
										<p><span class="value">2,874</span><span class="text-muted">Visitas por Affiliates</span></p>
										<div class="progress progress-xs progress-transparent custom-color-green">
											<div class="progress-bar" data-transitiongoal="67"></div>
										</div>
									</li>
									<li>
										<p><span class="value">2,623</span><span class="text-muted">Visitas por Search</span></p>
										<div class="progress progress-xs progress-transparent custom-color-yellow">
											<div class="progress-bar" data-transitiongoal="54"></div>
										</div>
									</li>
								</ul>
							</div>
							<!-- END REFERRALS -->
						</div>
						<div class="col-md-4">
							<div class="panel-content">
								<!-- BROWSERS -->
								<h2 class="heading"><i class="fa fa-square"></i> Navegadores</h2>
								<div class="table-responsive">
									<table class="table no-margin">
										<thead>
											<tr>
												<th>Navegadores</th>
												<th>Sesiones</th>
												<th>% Sesiones</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Chrome</td>
												<td>1,756</td>
												<td>23%</td>
											</tr>
											<tr>
												<td>Firefox</td>
												<td>1,379</td>
												<td>14%</td>
											</tr>
											<tr>
												<td>Safari</td>
												<td>1,100</td>
												<td>17%</td>
											</tr>
											<tr>
												<td>Edge</td>
												<td>982</td>
												<td>25%</td>
											</tr>
											<tr>
												<td>Opera</td>
												<td>967</td>
												<td>19%</td>
											</tr>
											<tr>
												<td>IE</td>
												<td>896</td>
												<td>12%</td>
											</tr>
											<tr>
												<td>Android Browser</td>
												<td>752</td>
												<td>27%</td>
											</tr>
										</tbody>
									</table>
								</div>
								<!-- END BROWSERS -->
							</div>
						</div>
					</div>
				</div>
				<!-- END WEBSITE ANALYTICS -->
				<!-- SALES SUMMARY -->
				<div class="dashboard-section">
					<div class="section-heading clearfix">
						<h2 class="section-title"><i class="fa fa-shopping-basket"></i> Resumen de ventas</h2>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="panel-content">
								<h3 class="heading"><i class="fa fa-square"></i> Hoy</h3>
								<ul class="list-unstyled list-justify large-number">
									<li class="clearfix">Ingresos <span>$215</span></li>
									<li class="clearfix">Ventas <span>47</span></li>
								</ul>
							</div>
						</div>
						<div class="col-md-9">
							<div class="panel-content">
								<h3 class="heading"><i class="fa fa-square"></i> Rendimiento de las ventas</h3>
								<div class="row">
									<div class="col-md-6">
										<table class="table">
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
													<th>Ganancias</th>
													<td>$2752</td>
													<td><span class="text-info">$3854</span></td>
													<td><span class="text-success">40.04%</span></td>
												</tr>
												<tr>
													<th>Ventas</th>
													<td>243</td>
													<td>
														<div class="text-info">322</div>
													</td>
													<td><span class="text-success">32.51%</span></td>
												</tr>
											</tbody>
										</table>
									</div>
									<div class="col-md-6">
										<div id="chart-sales-performance">Cargando...</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8">
							<div class="panel-content">
								<h3 class="heading"><i class="fa fa-square"></i> Compras recientes</h3>
								<div class="table-responsive">
									<table class="table table-striped no-margin">
										<thead>
											<tr>
												<th>N º de pedido.</th>
												<th>Nombre</th>
												<th>Cantidad</th>
												<th>Fecha y hora</th>
												<th>Estado</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><a href="#">763648</a></td>
												<td>Steve</td>
												<td>$122</td>
												<td>21 de octubre de 2018</td>
												<td><span class="label label-success">TERMINADO</span></td>
											</tr>
											<tr>
												<td><a href="#">763649</a></td>
												<td>Amber</td>
												<td>$62</td>
												<td>21 de octubre de 2018</td>
												<td><span class="label label-warning">PENDIENTE</span></td>
											</tr>
											<tr>
												<td><a href="#">763650</a></td>
												<td>Michael</td>
												<td>$34</td>
												<td>18 de octubre de 2018</td>
												<td><span class="label label-danger">CANCELADO</span></td>
											</tr>
											<tr>
												<td><a href="#">763651</a></td>
												<td>Roger</td>
												<td>$186</td>
												<td>17 de octubre de 2018</td>
												<td><span class="label label-success">TERMINADO</span></td>
											</tr>
											<tr>
												<td><a href="#">763652</a></td>
												<td>Smith</td>
												<td>$362</td>
												<td>16 de octubre de 2018</td>
												<td><span class="label label-success">TERMINADO</span></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="panel-content">
								<h3 class="heading"><i class="fa fa-square"></i> Productos principales</h3>
								<div id="chart-top-products" class="chartist"></div>
							</div>
						</div>
					</div>
				</div>
				<!-- END SALES SUMMARY -->
				<!-- CAMPAIGN -->
				<div class="dashboard-section">
					<div class="section-heading clearfix">
						<h2 class="section-title"><i class="fa fa-flag-checkered"></i> Recorrido</h2>
						<!--<a href="#" class="right">View All Campaigns</a>-->
					</div>
					<div class="panel-content">
						<div class="row margin-bottom-15">
							<div class="col-md-12 col-sm-7 left">
								<div id="demo-line-chart" class="ct-chart"></div>
							</div>
							<!--<div class="col-md-4 col-sm-5 right">
								<div class="row margin-bottom-30">
									<div class="col-xs-4">
										<p class="text-right text-larger"><span class="text-muted">Impression</span>
											<br><strong>32,743</strong></p>
									</div>
									<div class="col-xs-4">
										<p class="text-right text-larger"><span class="text-muted">Clicks</span>
											<br><strong>1423</strong></p>
									</div>
									<div class="col-xs-4">
										<p class="text-right text-larger"><span class="text-muted">CTR</span>
											<br><strong>4,34%</strong></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4">
										<p class="text-right text-larger"><span class="text-muted">Cost</span>
											<br><strong>$42.69</strong></p>
									</div>
									<div class="col-xs-4">
										<p class="text-right text-larger"><span class="text-muted">CPC</span>
											<br><strong>$0,03</strong></p>
									</div>
									<div class="col-xs-4">
										<p class="text-right text-larger"><span class="text-muted">Budget</span>
											<br><strong>$200</strong></p>
									</div>
								</div>
							</div>
						</div>
						<div class="action-buttons">
							<a href="#" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Budget</a> <a href="#" class="btn btn-default"><i class="fa fa-file-text-o"></i> View Campaign Details</a>
						</div> -->
					</div>
				</div>
				<!-- END CAMPAIGN -->
				<!-- SOCIAL -->
				<div class="dashboard-section no-margin">
					<div class="section-heading clearfix">
						<h2 class="section-title"><i class="fa fa-user-circle"></i> Asociados <span class="section-subtitle">(1 days report)</span></h2>
						
					</div>
					<div class="panel-content">
						<div class="row">
							<div class="col-md-4 col-sm-6">
								<p class="metric-inline"><i class="far fa-id-card"></i>+636 <span>CLIENTES</span></p>
							</div>
							<div class="col-md-4 col-sm-6">
								<p class="metric-inline"><i class="far fa-handshake"></i> +528 <span>PROVEEDORES</span></p>
							</div>
							<div class="col-md-4 col-sm-6">
								<p class="metric-inline"><i class="fas fa-users"></i> +1065 <span>USUARIOS</span></p>
							</div>
							
						</div>
					</div>
				</div>
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
	<script src="assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.min.js"></script>
	<script src="assets/vendor/chartist-plugin-axistitle/chartist-plugin-axistitle.min.js"></script>
	<script src="assets/vendor/chartist-plugin-legend-latest/chartist-plugin-legend.js"></script>
	<script src="assets/vendor/toastr/toastr.js"></script>
	<script src="assets/scripts/common.js"></script>
	<script>
	$(function() {

		// sparkline charts
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


		// traffic sources
		var dataPie = {
			series: [45, 25, 30]
		};

		var labels = ['Directas', 'Organicas', 'Referencias'];
		var sum = function(a, b) {
			return a + b;
		};

		new Chartist.Pie('#demo-pie-chart', dataPie, {
			height: "270px",
			labelInterpolationFnc: function(value, idx) {
				var percentage = Math.round(value / dataPie.series.reduce(sum) * 100) + '%';
				return labels[idx] + ' (' + percentage + ')';
			}
		});


		// progress bars
		$('.progress .progress-bar').progressbar({
			display_text: 'none'
		});

		// line chart
		var data = {
			labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
			series: [
				[200, 380, 350, 480, 410, 450, 550],
			]
		};

		var options = {
			height: "300px",
			showPoint: true,
			showArea: true,
			axisX: {
				showGrid: false
			},
			lineSmooth: false,
			chartPadding: {
				top: 30,
				right: 30,
				bottom: 30,
				left: 30
			},
			plugins: [
				Chartist.plugins.tooltip({
					appendToBody: true
				}),
				Chartist.plugins.ctAxisTitle({
					axisX: {
						axisTitle: 'Meses',
						axisClass: 'ct-axis-title',
						offset: {
							x: 0,
							y: 50
						},
						textAnchor: 'middle'
					},
					axisY: {
						axisTitle: 'Valor',
						axisClass: 'ct-axis-title',
						offset: {
							x: 0,
							y: -10
						},
					}
				})
			]
		};

		new Chartist.Line('#demo-line-chart', data, options);


		// sales performance chart
		var sparklineSalesPerformance = function() {

			var lastWeekData = [142, 164, 298, 384, 232, 269, 211];
			var currentWeekData = [352, 267, 373, 222, 533, 111, 60];

			$('#chart-sales-performance').sparkline(lastWeekData, {
				fillColor: 'rgba(90, 90, 90, 0.1)',
				lineColor: '#5A5A5A',
				width: '' + $('#chart-sales-performance').innerWidth() + '',
				height: '100px',
				lineWidth: '2',
				spotColor: false,
				minSpotColor: false,
				maxSpotColor: false,
				chartRangeMin: 0,
				chartRangeMax: 1000
			});

			$('#chart-sales-performance').sparkline(currentWeekData, {
				composite: true,
				fillColor: 'rgba(60, 137, 218, 0.1)',
				lineColor: '#3C89DA',
				lineWidth: '2',
				spotColor: false,
				minSpotColor: false,
				maxSpotColor: false,
				chartRangeMin: 0,
				chartRangeMax: 1000
			});
		}

		sparklineSalesPerformance();

		var sparkResize;
		$(window).on('resize', function() {
			clearTimeout(sparkResize);
			sparkResize = setTimeout(sparklineSalesPerformance, 200);
		});


		// top products
		var dataStackedBar = {
			labels: ['Q1', 'Q2', 'Q3'],
			series: [
				[800000, 1200000, 1400000],
				[200000, 400000, 500000],
				[100000, 200000, 400000]
			]
		};

		new Chartist.Bar('#chart-top-products', dataStackedBar, {
			height: "250px",
			stackBars: true,
			axisX: {
				showGrid: false
			},
			axisY: {
				labelInterpolationFnc: function(value) {
					return (value / 1000) + 'k';
				}
			},
			plugins: [
				Chartist.plugins.tooltip({
					appendToBody: true
				}),
				Chartist.plugins.legend({
					legendNames: ['Telefono', 'Laptop', 'PC']
				})
			]
		}).on('draw', function(data) {
			if (data.type === 'bar') {
				data.element.attr({
					style: 'stroke-width: 30px'
				});
			}
		});


		// notification popup
		toastr.options.closeButton = true;
		toastr.options.positionClass = 'toast-bottom-right';
		toastr.options.showDuration = 1000;
		toastr['info']('Hola, bienvenidos a Gestor Vida Facil, un panel de administración único.');

	});
	</script>
</body>

</html>
