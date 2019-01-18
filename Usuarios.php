<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	require_once ("config/db.php");
	require_once ("config/conexion.php");
	
	$Usuarios="active";

	$Usuario ="";
		$Correo ="";
		$Tipo ="";
		$Nombre ="";
		$Apellido ="";
		$Genero ="";
		$Porcentaje ="";
		$Perfil="";

	if (isset($_GET['Usuario'])) {

		$query=mysqli_query($con, "select Usuario,Correo,Roles.Tipo,Nombre,Apellido,Genero,Porcentaje from Usuarios inner join Roles on Roles.Numero=Usuarios.Rol where Usuario ='".$_GET['Usuario']."' ");
		$rw_Admin=mysqli_fetch_array($query);

		$Usuario =$rw_Admin['Usuario'];
		$Correo =$rw_Admin['Correo'];
		$Tipo =$rw_Admin['Tipo'];
		$Nombre =$rw_Admin['Nombre'];
		$Apellido =$rw_Admin['Apellido'];
		$Genero =$rw_Admin['Genero'];
		$Porcentaje =$rw_Admin['Porcentaje'];
		

		$Estado="Editando";
		$Read= "readonly='readonly'";
	}else
	{
		$Estado="Nuevo";
		$Read= "";
	}
	if (isset($_GET['Perfil'])) {
	$Perfil="SI";
	}



?>
<!doctype html>
<html lang="es">
<head>
	<?php include("head.php"); 
		include("componentes/modal/cambiar_password.php");
	?>

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
				<div class="panel panel-default">
					<div class="panel-heading">
		    			<div class="btn-group pull-right">
						<?php
						if ($Perfil <>'SI'){
							echo '
							<button type="button" class="btn btn-default" id="Consultar">
							<span class="glyphicon glyphicon-user"></span> Consultar Usuarios
						</button>';
						}
						?>
							
						</div>
						<h4><i class="fas fa-user-tie"></i>   Usuarios</h4>
					</div>
					<div class="panel-body">
						<ul class="nav nav-tabs" role="tablist">
							<li class="active"><a href="#Informacion" role="tab" data-toggle="tab">Informacion</a></li>
							<li><a href="#Permisos" role="tab" data-toggle="tab">Permisos</a></li>
						</ul>
						<div class="tab-content content-profile">
							<div class="tab-pane fade in active" id="Informacion">
								<form class="form-horizontal col-sm-8" method="post" id="Guardar_Usuario" name="Guardar_Usuario">
			   						<div id="resultados_ajax"></div>
									<input type="text" class="form-control hidden" id="Estado" name="Estado"  value="<?php echo $Estado; ?>" > 
									<div class="form-group">
										<label for="Usuario" class="col-sm-3  control-label">Usuario</label>
										<div class="col-sm-8 ">
											<input type="text" class="form-control" id="Usuario" name="Usuario" placeholder="Usuario" value="<?php echo $Usuario; ?>" <?php echo $Read; ?> required>
										</div>
									</div>
									<div class="form-group">
										<label for="Correo" class="col-sm-3 control-label">Correo Electronico</label>
										<div class="col-sm-8">
											<input type="email" class="form-control" id="Correo" name="Correo" require placeholder="Correo Electronico" value="<?php echo $Correo; ?>">				  
										</div>
									</div>
									<div class="form-group">
										<label for="Rol" class="col-sm-3 control-label">Rol</label>
										<div class="col-md-8 col-sm-8">
										<?php 
										if($_SESSION['Rol'] == '2'){
											echo '
											<input type="Text" class="form-control" id="Rol" name="Rol" require value="'.$Tipo.'" readonly="readonly">
											';
										}else {
											echo '<select class="form-control" id="Rol" name ="Rol" placeholder="Rol"  >';
											if($Tipo == 'Usuario'){
												echo '<option value="2">Usuario</option>';
												echo '<option value="1">Administrador</option>';
											}else{
												echo '<option value="1">Administrador</option>';
												echo '<option value="2">Usuario</option>';
											}
											echo '</select>';
										}
										
										?>	

											
												
											
										</div>
									</div>
				 					<div class="form-group">
					  					<label for="Nombre" class="col-sm-3 control-label">Nombre</label>
				  						<div class="col-sm-8">
 				   							<input type="text" class="form-control" id="Nombre" name="Nombre" required placeholder="Nombre" value="<?php echo $Nombre; ?>">
				  						</div>
			   						</div>
									<div class="form-group">
										<label for="Apellido" class="col-sm-3 control-label">Apellido</label>
										<div class="col-sm-8">
				  							<input type="text" class="form-control" id="Apellido" name="Apellido" required placeholder="Apellido" value="<?php echo $Apellido; ?>">
										</div>
									</div>
									<div class="form-group">
										<label for="Genero" class="col-sm-3 control-label">Genero</label>
										<div class="col-md-8 col-sm-8">
											<select class='form-control' id="Genero" name ="Genero" placeholder="Genero">
												<?php 
													if($Genero	 == 'Femenino'){
														echo '<option value="Femenino">Femenino</option>';
														echo '<option value="Masculino">Masculino</option>';
													}else{
														echo '<option value="Masculino">Masculino</option>';
														echo '<option value="Femenino">Femenino</option>';
													}
							  					?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="Porcentaje" class="col-sm-3 control-label">Porcentaje</label>
										<div class="col-sm-8">
				  							<input type="text" class="form-control" id="Porcentaje" name="Porcentaje" required placeholder="Porcentaje" value="<?php echo $Porcentaje; ?>">
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-8 col-md-offset-3">
									<button type="button"  class="btn btn-primary"  onclick="get_user_id('<?php echo $rw_user['Usuario'];?>');" data-toggle="modal" data-target="#myModal3">Cambiar Contraseña</button>
				  							
										</div>
									</div>
									<div id="resultados_ajax2"></div>
									<hr class="style1">
									<div class=" pull-right">
										<button type="button" class="btn btn-default" id="Cancelar">Cancelar</button>
										<button type="submit" class="btn btn-primary">Guardar datos</button>
		  							</div>				
								</form>	
							</div>
							<div class="tab-pane fade" id="Permisos">
								<!-- Permisos-->
								Aqui Van Los Permisos 
							</div>
						</div>
					</div>			
		  		</div>	
			</div>	  		
		</div>
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
	if (document.getElementById('Estado').value == 'Editando') {
		location.reload(true);
	}
	else{
		location.href='Consultar-Usuarios.php';
	}
})
$( "#Consultar" ).click(function( event ) {
	
		location.href='Consultar-Usuarios.php';

})


	$( "#Guardar_Usuario" ).submit(function( event ) {
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "Componentes/Ajax/Guardar_Usuario.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax2").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax2").html(datos);
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
			url: "Componentes/Ajax/editar_password.php",
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
