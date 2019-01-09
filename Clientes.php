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
	$PCrear="";
	$PConsultar="";
	$Usuarios="";
	$UCrear="";
	$UConsultar="";
	$Notificaciones="";
    $Reportes="";
	$Administracion="";
	$Clientes="active";
	if (isset($_GET['Nit'])) {

		$query=mysqli_query($con, "Select Nit,Nombre,Direccion,Ciudad,Departamento,Pais,Telefono,Ext,Vendedor,Cv,Correo from Administracion ;");
		$rw_Admin=mysqli_fetch_array($query);
	
	}



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
					<h1 class="page-title">Terceros</h1>
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
											<label>Nombre</label>
											<input type="text" id="Empresa"  Name="Empresa"class="form-control" value="<?php echo $rw_Admin['Empresa']; ?>">
										<br>
											<label>Nit</label>
											<input type="text"id="Nit"Name="Nit"  class="form-control" value="<?php echo $rw_Admin['Nit']; ?>">
										<br>
											<label>Direccion</label>
											<input type="text" Name="Direccion" class="form-control" value="<?php echo $rw_Admin['Direccion']; ?>">
										<br>
											<label>Telefono</label>
											<input type="text" Name="Telefono" class="form-control" value="<?php echo $rw_Admin['Telefono']; ?>">
                                        <br>
											<label>Correo</label>
											<input type="text" Name="Correo" class="form-control" value="<?php echo $rw_Admin['Correo']; ?>">
										</div>
                                        
										
									</div>
									<!-- END LEFT SECTION -->
									<!-- RIGHT SECTION -->
										
									<!-- END RIGHT SECTION  onclick="get_user_id('<?php echo $rw_user['Usuario'];?>');" data-toggle="modal" data-target="#myModal3" -->
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
