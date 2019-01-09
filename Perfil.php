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
	$PCrear="";
	$PConsultar="";
	$Usuarios="";
	$UCrear="";
	$UConsultar="";
	$Notificaciones="";
	$Reportes="";

	$query=mysqli_query($con, "select Usuario,Correo,Clave,Nombre,Apellido,Genero,Direccion,Telefono,Imagen,Tipo from Usuarios
inner join Roles on Usuarios.Rol =Roles.Numero WHERE Usuario = '" . $_SESSION['Usuario']."' ;");
	$rw_user=mysqli_fetch_array($query);
if ($rw_user['Genero']=="Masculino") {
	$Mas ="checked";
}elseif ($rw_user['Genero']=="Femenino") {
	$Fen ="checked";
}


?>
<!doctype html>
<html lang="es">
<head>
	<?php include("head.php"); include("modal/cambiar_password.php");	?>

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
					<h1 class="page-title">Perfil Del Usuario</h1>
				</div>
				
			
				<form id="editar_usuario" name="editar_usuario" method="post">
					<div class="tab-content content-profile">
						<!-- MY PROFILE -->
						<div class="tab-pane fade in active" id="myprofile">
							<div class="profile-section">
								<h2 class="profile-heading">Foto De Perfil</h2>
								<div class="media">
									<div class="media-left">
										<img src="img/<?php echo $rw_user['Imagen']; ?>" class="user-photo media-object" alt="User">
									</div>
									<div class="media-body">
										<p>Subir Foto.
											<br> <em>La imagen debe ser al menos 140px x 140px</em></p>
										<button type="button" class="btn btn-default-dark" id="btn-upload-photo">Subir Foto</button>
										<input type="file" id="filePhoto" class="sr-only">
									</div>
								</div>
							</div>
							<div class="profile-section">
								
								<div class="clearfix">
									<div class="left">
										<h2 class="profile-heading">Informacion Basica</h2>
										<div class="form-group">
											<label>Nombres</label>
											<input type="text" id="Nombre"  Name="Nombre"class="form-control" value="<?php echo $rw_user['Nombre']; ?>">
										<br>
											<label>Apellidos</label>
											<input type="text"id="Apellido"Name="Apellido"  class="form-control" value="<?php echo $rw_user['Apellido']; ?>">
										<br>
											<label>Direccion</label>
											<input type="text" Name="Direccion" class="form-control" value="<?php echo $rw_user['Direccion']; ?>">
										<br>
											<label>Telefono</label>
											<input type="text" Name="Telefono" class="form-control" value="<?php echo $rw_user['Telefono']; ?>">
										</div>
										<div class="form-group">
											<label>Genero</label>
											<div>
												<label class="fancy-radio">
													<input name="Genero" value="Masculino" type="radio" <?php echo @$Mas; ?>  >
													<span><i></i>Masculino</span> 
												</label>
												<label class="fancy-radio">
													<input name="Genero" value="Femenino" type="radio" <?php echo @$Fen; ?> >
													<span><i></i>Femenino</span>
												</label>
											</div>
										</div>
									</div>
									<!-- END LEFT SECTION -->
									<!-- RIGHT SECTION -->
									<div class="right">
										<h2 class="profile-heading">Cuenta</h2>
										<div class="form-group">
											<label>Nombre de Usuario</label>
											<input type="text" class="form-control" name="Usuario" readonly value="<?php echo $rw_user['Usuario']; ?>">
										<br>
											<label>Correo</label>
											<input type="email" Name="Correo" class="form-control" value="<?php echo $rw_user['Correo']; ?>">
										<br>
											<label>Rol</label>
											<input type="text" Name="Rol" class="form-control" value="<?php echo $rw_user['Tipo']; ?>" readonly >
										</div>
										<button type="button"  class="btn btn-primary"  onclick="get_user_id('<?php echo $rw_user['Usuario'];?>');" data-toggle="modal" data-target="#myModal3">Cambiar Contraseña</button>
									</div>	
									<!-- END RIGHT SECTION  onclick="get_user_id('<?php echo $rw_user['Usuario'];?>');" data-toggle="modal" data-target="#myModal3" -->
								</div>
								<div id="resultados_ajax2"></div>
								<p class="margin-top-30">
									<button type="submit" class="btn btn-primary">Guardar</button> &nbsp;&nbsp;
									<button type="button"  id="Cancelar"class="btn btn-default">Cancelar</button>
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
	$(function() {
		// photo upload
		$('#btn-upload-photo').on('click', function() {
			$(this).siblings('#filePhoto').trigger('click');
		});

		// plans
		$('.btn-choose-plan').on('click', function() {
			$('.plan').removeClass('selected-plan');
			$('.plan-title span').find('i').remove();

			$(this).parent().addClass('selected-plan');
			$(this).parent().find('.plan-title').append('<span><i class="fa fa-check-circle"></i></span>');
		});
	});
	$( "#editar_usuario" ).submit(function( event ) {
  $('#actualizar_datos2').attr("disabled", true);

 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "Componentes/Ajax/editar_usuario.php",
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
	$( "#editar_password" ).submit(function( event ) {
  $('#actualizar_datos3').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "aComponentes/Ajax/editar_password.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax3").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax3").html(datos);
			$('#actualizar_datos3').attr("disabled", false);
			load(1);
		  }
	});
  event.preventDefault();
})
	</script>
</body>

</html>
