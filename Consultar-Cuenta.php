<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	require_once ("config/db.php");
	require_once ("config/conexion.php");
	
	$Cuenta="active";
	
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

					<div class=" pull-right">
		
					<button class="btn btn-default" id="SolicitarPago" data-toggle="modal" data-target="#Pago" onclick="CargarComisiones()"><i class="far fa-money-bill-alt"></i>Solicitar Pago</button>
				

					<button class="btn btn-success hidden" id="ExportarExcel" ><i class="fas fa-file-excel"></i>Exportar a Excel </button>
			</div>
						<h4><i class='glyphicon glyphicon-search'></i> &nbsp;Cuenta Virtual</h4>
						
					</div>
					<div class="panel-body">
					<?php 
						include("Componentes/Modal/Solicitar_Pago.php");
					?>
						<form class="form-horizontal" role="form" id="datos_cotizacion">
							<div class="form-group row">
							<div class="col-md-2">		
									<select class='form-control ' id="Filtro" name ="Filtro" placeholder="Estado" onchange='load(1);'>
										<option value="Nombre">Nombre</option>
										<option value="Cedula">Cedula</option>
										<option value="Telefono">Telefono</option>
										<option value="Campaña">Campaña</option>
										<option value="Usuario">Usuario</option>								
									</select>
								</div>
								<div class="col-md-2">		
									<input type="Date" class="form-control" id="fechaIni" name="fechaIni" value="<?php echo date("Y-m-d",strtotime("-1 month"))?>" onchange='load(1);'>
								</div>
								<div class="col-md-2">		
									<input type="Date" class="form-control" id="fechaFin" name="fechaFin" value="<?php echo date("Y-m-d")?>" onchange='load(1);'>
								</div>
								<div class="col-md-4">
									<input type="text" class="form-control" id="q" autocomplete="off" placeholder="Escriba Su Criterio de Busqueda" onkeyup='load(1);'>
								</div>
								<div class="col-md-2">		
									
									<select class='form-control ' id="FEstado" name ="FEstado" placeholder="Estado" onchange='load(1);'>
										<option value="Todos">Todos</option>
										<option value="Pagada">Pagadas</option>
										<option value="Pendiente">Pendientes</option>
										<option value="Solicitada">Solicitadas</option>
									</select>
								</div>
								<input type="hidden" id="Pestana" value="ResComisiones">
								<div class="col-md-2">
								<span id="loader"></span>
								</div>
							</div>
						</form>
							
						<div class="tab-content content-profile">
							<div class="tab-pane fade in active" id="Comisiones">
								<div class='ResComisiones'></div>
							</div>
						
						</div>
						

						

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
	<script type="text/javascript" src="Componentes/JavaScript/Cuenta.js"></script>
	<script lang = "javascript"  src = "js-xlsx-master/dist/xlsx.full.min.js"> </script>

	<script>
	$("#ClickComisiones").click(function( event){
		document.getElementById('Pestana').value= 'ResComisiones';
	load(1);
	})
	$("#ClickPagos").click(function( event){
		document.getElementById('Pestana').value= 'ResPagos';
	load(1);
	})
	</script>
  </body>
</html>