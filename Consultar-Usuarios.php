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
	$Clientes="";
	$PCrear="";
	$PConsultar="";
	$Usuarios="active";
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
						<?php 
							if($_SESSION['Rol'] == '1'){
							echo'<button type="button" class="btn btn-default" onclick="NuevoUsuario()">
							<span class="fas fa-users"></span> Nuevo Usuario
						</button>';
							}
						?>
						
						</div>
						<h4><i class='glyphicon glyphicon-search'></i> Consultar Usuarios</h4>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" role="form" id="datos_cotizacion">
							<div class="form-group row">
								<div class="col-md-3">		
									<select class='form-control' id="Filtro" name ="Filtro" placeholder="Estado" onchange='load(1);'>
										<option value="Razon_Social">Nombre o Razon Social</option>
										<option value="Nit">Nit</option>
										<option value="Telefono">Telefono</option>
										<option value="Correo">Correo</option>
									</select>
								</div>		
								<div class="col-md-5">
									<input type="text" class="form-control" id="q" autocomplete="off" placeholder="Escriba Su Criterio de Busqueda" onkeyup='load(1);'>
								</div>
								<div class="col-md-2">		
									<select class='form-control' id="FEstado" name ="FEstado" placeholder="Estado" onchange='load(1);'>
										<option value="Todos">Todos</option>
										<option value="Pendiente">Pendiente</option>
										<option value="Activo">Activo</option>
										<option value="InActivo">InActivo</option>
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
	<script type="text/javascript" src="Componentes/JavaScript/Usuarios.js"></script>

	<script>
	
	</script>
  </body>
</html>