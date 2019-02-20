<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	require_once ("config/db.php");
	require_once ("config/conexion.php");
	
	$Ventas="active";
	
?>
<!doctype html>
<html lang="es">
<head>
	<?php include("head.php");?>
</head>
<body>
<div id="Menus">
	<div id="wrapper">
		<?php
			include("Menu.php");
		?>
		<div id="main-content">
			<div class="container-fluid">
				<div class="panel panel-default">
					<div class="panel-heading">
		    			<div class="btn-group pull-right">
						<button type="button" class="btn btn-default" onclick="NuevaVenta()">
							<span class="fa fa-shopping-cart"></span> Nueva Venta
						</button>
						</div>
						<h4><i class='glyphicon glyphicon-search'></i> Consultar Ventas</h4>
						
					</div>
					<div class="panel-body">
						<form class="form-horizontal" role="form" id="datos_cotizacion">
							<div class="form-group row">
							<div class="col-md-3">		
									<select class='form-control' id="Filtro" name ="Filtro" placeholder="Estado" onchange='load(1);'>
										<option value="Nombre">Nombre</option>
										<option value="Cedula">Cedula</option>
										<option value="Telefono">Telefono</option>
										<option value="Campaña">Campaña</option>
										<option value="Usuario">Usuario</option>
										<option value="Numero">Numero</option>
										<option value="Estado">Estado</option>
										
									</select>
								</div>		
								<div class="col-md-5">
									<input type="text" class="form-control" id="q" autocomplete="off" placeholder="Escriba Su Criterio de Busqueda" onkeyup='load(1);'>
								</div>
								<div class="col-md-2">		
									<select class='form-control' id="FEstado" name ="FEstado" placeholder="Estado" onchange='load(1);'>
										<option value="Todos">Todos</option>
										<option value="Pendiente">Pendiente</option>
										<option value="Aprobada">Aprobada</option>
										<option value="Rechazada">Rechazada</option>
									</select>
								</div>
								<div class="col-md-2">
								<span id="loader"></span>
								</div>
							</div>
						</form>
						<div id="resultados"></div><!-- Carga los datos ajax -->
						<div class='outer_div'></div><!-- Carga los datos ajax -->
					</div>
				</div>	
			</div>
			
		</div>
	</div>
	</div>
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/metisMenu/metisMenu.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
	<script src="assets/scripts/common.js"></script>
	<script type="text/javascript" src="Componentes/JavaScript/Ventas.js"></script>

	<script>
	
	</script>
  </body>
</html>