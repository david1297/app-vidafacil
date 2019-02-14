<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
  }
	require_once ("config/db.php");
	require_once ("config/conexion.php");
  $Administracion="active";
	$query=mysqli_query($con, "Select Operador_Venta,Operador_Donante from Administracion ;");
	$rw_Admin=mysqli_fetch_array($query);


?>
<!doctype html>
<html lang="es">
<head>
	<?php include("head.php"); 	?>

</head>
<body>
	<div id="wrapper">
		<?php
	include("Menu.php");
	?>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN CONTENT -->
		<div id="main-content">
			<div class="container-fluid">
				<div class="section-heading">
					<h1 class="page-title">Administracion de la Empresa</h1>
				</div>
				<ul class="nav nav-tabs" role="tablist">
					<li class="active"><a href="#General" role="tab" data-toggle="tab">General</a></li>
					<li><a href="#FormasPago" role="tab" data-toggle="tab">Formas de Pago</a></li>
					<li><a href="#Bancos" role="tab" data-toggle="tab">Bancos</a></li>
				</ul>				
				<div class="tab-content content-profile">
					<div class="tab-pane fade in active" id="General">
					General
					</div>
					<div class="tab-pane fade" id="FormasPago">
					FormasPago
					</div>
					<div class="tab-pane fade" id="Bancos">
					Bancos
					</div>
				</div>

			
				<form id="Administracion" name="Administracion" method="post">
					<div class="tab-content content-profile">
						<!-- MY PROFILE -->
						<div class="tab-pane fade in active" id="myprofile">
							
							<div class="profile-section">
								
								<div class="clearfix">
									<div class="left">
										<h2 class="profile-heading">Informacion Basica</h2>
										<div class="form-group">	
											<label for="Observaciones">Operadoes de Venta:</label>
											<div class="col-sm-12">
  											<textarea class="form-control" rows="5" id="Operador_Venta"NAME="Operador_Venta" ><?php echo $rw_Admin['Operador_Venta'];?></textarea>
											</div>
										</div>
										<div class="form-group">	
											<label for="Observaciones">Operadores Donantes:</label>
											<div class="col-sm-12">
  											<textarea class="form-control" rows="5" id="Operador_Donante"NAME="Operador_Donante" ><?php echo $rw_Admin['Operador_Donante'];?></textarea>
											</div>
										</div>
									
                                        
										
									</div>
								</div>
								<div id="resultados_ajax2"></div>
								<p class="margin-top-30">
									<button type="submit"  class="btn btn-primary">Guardar</button> &nbsp;&nbsp;
									<button type="button" id="Cancelar" class="btn btn-default">Cancelar</button>
								</p>
								
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- END MAIN CONTENT -->
		<div class="clearfix"></div>
		<footer>
			<p class="copyright">&copy; Copyright <a href="https://www.tupro.com.co/" target="_blank">TuPro Creativo. </a>Todos los derechos reservados</p>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/metisMenu/metisMenu.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
	<script src="assets/scripts/common.js"></script>
	<script>
$( "#Cancelar" ).click(function( event ) {
    location.reload(true);
})


	$( "#Administracion" ).submit(function( event ) {
  $('#actualizar_datos2').attr("disabled", true);

 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "Componentes/Ajax/editar_Administracion.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax2").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax2").html(datos);
			$('#actualizar_datos2').attr("disabled", false);
			load(1);
		  }
	});
  event.preventDefault();
})

	</script>
</body>

</html>
