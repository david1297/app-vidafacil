<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	require_once ("config/db.php");
	require_once ("config/conexion.php");
	$Inicio="";
	$Proyectos="";
	$Clientes="active";
	$PCrear="";
	$PConsultar="";
	$Usuarios="";
	$UCrear="";
	$UConsultar="";
	$Notificaciones="";
	$Reportes="";
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
						<button type="button" class="btn btn-default" onclick="NuevoCliente()">
							<span class="glyphicon glyphicon-user"></span> Nuevo cliente
						</button>
						</div>
						<h4><i class='glyphicon glyphicon-search'></i> Consultar Clientes</h4>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" role="form" id="datos_cotizacion">
							<div class="form-group row">
								<label for="q" class="col-md-2 control-label">Nombre o # de Documento</label>
								<div class="col-md-5">
									<input type="text" class="form-control" id="q" placeholder="Nombre o # de Documento" onkeyup='load(1);'>
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
	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script type="text/javascript" src="Componentes/JavaScript/Clientes.js"></script>

	<script>
	
	</script>
  </body>
</html>