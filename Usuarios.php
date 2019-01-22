<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	require_once ("config/db.php");
	require_once ("config/conexion.php");
	
	$Usuarios="active";

	$Nit ="";
		$Correo ="";
		$Tipo_Persona="";
		$Razon_Social ="";
		$Nombre ="";
		$Apellido ="";
		$Tel_C ="";
		$Direccion ="";
		$Correo ="";
		$Cel_C ="";
		$Correo_C ="";
		$Rep_Legal ="";
		$CC ="";
		$Nombre_R1 ="";
		$Tel_R1 ="";
		$Nombre_R2 ="";
		$Tel_R2 ="";
		
		$Tipo ="";
		$Estado ="";
		$Porcentaje ="";
		$Perfil="";

	if (isset($_GET['Nit'])) {

		$query=mysqli_query($con, "select * from 
		Usuarios where Nit ='".$_GET['Nit']."' ");
		$rw_Admin=mysqli_fetch_array($query);

		$Nit =$rw_Admin['Nit'];
		$Tipo_Persona =$rw_Admin['Tipo_Persona'];
		$Razon_Social =$rw_Admin['Razon_Social'];
		$Nombre =$rw_Admin['Nombre'];
		$Apellido =$rw_Admin['Apellido'];

		$Correo =$rw_Admin['Correo'];
		$Tipo =$rw_Admin['Tipo'];
		$Estado =$rw_Admin['Estado'];
		$Rol=$rw_Admin['Rol'];

		$Porcentaje =$rw_Admin['Porcentaje'];
		$Tel_C =$rw_Admin['Tel_C'];
		$Direccion =$rw_Admin['Direccion'];
		$Correo =$rw_Admin['Correo'];
		$Cel_C =$rw_Admin['Cel_C'];
		$Correo_C =$rw_Admin['Correo_C'];
		$Rep_Legal =$rw_Admin['Rep_Legal'];
		$CC =$rw_Admin['CC'];
		$Nombre_R1 =$rw_Admin['Nombre_R1'];
		$Tel_R1 =$rw_Admin['Tel_R1'];
		$Nombre_R2 =$rw_Admin['Nombre_R2'];
		$Tel_R2 =$rw_Admin['Tel_R2'];

		$EstadoU="Editando";
		$Read= "readonly='readonly'";
	}else
	{
		$EstadoU="Nuevo";
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
							<li><a href="#Campanas" role="tab" data-toggle="tab">Campañas</a></li>
						</ul>
						<div class="tab-content content-profile">
							<div class="tab-pane fade in active" id="Informacion">
								<form class="form-horizontal col-sm-8" method="post" id="Guardar_Usuario" name="Guardar_Usuario">
			   						<div id="resultados_ajax"></div>
									<input type="text" class="form-control hidden" id="EstadoU" name="EstadoU"  value="<?php echo $EstadoU; ?>" > 
									<div class="form-group">
				  						<label for="Nit" class="col-sm-3  control-label">Nit</label>
				  						<div class="col-sm-8 ">
				   							<input type="text" class="form-control" id="Nit" name="Nit" placeholder="Nit" value="<?php echo $Nit; ?>" <?php echo $Read; ?> required>
				  						</div>
			   						</div>
									<div class="form-group">
										<label for="Tipo_Persona" class="col-sm-3 control-label">Tipo Persona</label>
										<div class="col-md-8 col-sm-8">
											<select class='form-control' id="Tipo_Persona" name ="Tipo_Persona" placeholder="Tipo Persona">
												<?php 
												if($Tipo_Persona == 'Natural'){
													echo '<option value="Natural">Natural</option>';
													echo '<option value="Juridica">Juridica</option>';
												}else{
													echo '<option value="Juridica">Juridica</option>';
													echo '<option value="Natural">Natural</option>';
												}
							  					?>
											</select>
										</div>
									</div>  
									<div class="form-group">
										<label for="Razon_Social" class="col-sm-3 control-label">Razon Social</label>
				  						<div class="col-sm-8">
 				   							<input type="text" class="form-control" id="Razon_Social" name="Razon_Social" required placeholder="Razon Social" value="<?php echo $Razon_Social; ?>">
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
										<label for="Rol" class="col-sm-3 control-label">Rol</label>
										<div class="col-md-8 col-sm-8">
										<?php 
										if($_SESSION['Rol'] == '2'){
											echo'<input type="Text" class="form-control hidden" id="Rol" name="Rol" require value="'.$Rol.'" readonly="readonly">';
											if ($Rol=="1"){
												$Rol="Administrador";
											}else{
												$Rol="Usuario";
											}
										
											echo '
											<input type="Text" class="form-control" require value="'.$Rol.'" readonly="readonly">
											
											';
										}else {
											echo '<select class="form-control" id="Rol" name ="Rol" placeholder="Rol"  >';
											if($Rol == 'Usuario'){
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
									<?php 
									if($EstadoU == "Nuevo"){
										echo '
										<input type="Text" class="form-control hidden" id="Estado" name="Estado" require value="Pendiente" >
										';
									} else{
										echo '
										<div class="form-group">
										<label for="Estado" class="col-sm-3 control-label">Estado</label>
										<div class="col-md-8 col-sm-8">
										';
										echo '<select class="form-control" id="Estado" name ="Estado" placeholder="Estado"  >';
											if($Estado == 'Activo'){
												echo '<option value="Activo">Activo</option>';
												echo '<option value="InActivo">InActivo</option>';
											}else{
												echo '<option value="InActivo">InActivo</option>';
												echo '<option value="Activo">Activo</option>';
											}
											echo '</select>
											</div>
									</div>';
									}

									?>
									<div class="form-group">
										<label for="Tipo_Persona" class="col-sm-3 control-label">Tipo</label>
										<div class="col-md-8 col-sm-8">
											<select class='form-control' id="Tipo" name ="Tipo" placeholder="Tipo ">
												<?php 
												if($Tipo == 'Operador'){
													echo '<option value="Operador">Operador</option>';
													echo '<option value="Distribuidor">Distribuidor</option>';
												}else{
													echo '<option value="Distribuidor">Distribuidor</option>';
													echo '<option value="Operador">Operador</option>';
												}
							  					?>
											</select>
										</div>
									</div> 

									<div class="form-group">
						<label for="Tel_C" class="col-sm-3 control-label">Telefono de Contacto</label>
						<div class="col-sm-8">
				  		<input type="text" class="form-control" id="Tel_C" name="Tel_C" required placeholder="Telefono de Contacto" value="<?php echo $Tel_C; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="Direccion" class="col-sm-3 control-label">Direccion</label>
						<div class="col-sm-8">
				  		<input type="text" class="form-control" id="Direccion" name="Direccion" required placeholder="Direccion" value="<?php echo $Direccion; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="Correo_N" class="col-sm-3 control-label">Correo Electronico</label>
						<div class="col-sm-8">
							<input type="email" class="form-control" id="Correo" name="Correo" require placeholder="Correo Electronico" value="<?php echo $Correo; ?>">				  
						</div>
			  	</div>
					<div class="form-group">
						<label for="Cel_C" class="col-sm-3 control-label">Celular de Contacto</label>
						<div class="col-sm-8">
				  		<input type="text" class="form-control" id="Cel_C" name="Cel_C" required placeholder="Celular de Contacto" value="<?php echo $Cel_C; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="Correo_C" class="col-sm-3 control-label">Correo de Contacto</label>
						<div class="col-sm-8">
							<input type="email" class="form-control" id="Correo_C" name="Correo_C" require placeholder="Correo de Contacto" value="<?php echo $Correo_C; ?>">				  
						</div>
			  	</div>

				  <div class="form-group">
					<label for="Porcentaje" class="col-sm-3 control-label">Porcentaje</label>
										<div class="col-sm-8">
										<?php
if($_SESSION['Rol'] == '2'){
?>
<input type="text" class="form-control" id="Porcentaje" name="Porcentaje" required placeholder="Porcentaje" value="<?php echo $Porcentaje; ?> " <?php echo $Read; ?>>
<?php
}else{
?>
<input type="text" class="form-control" id="Porcentaje" name="Porcentaje" required placeholder="Porcentaje" value="<?php echo $Porcentaje; ?> ">
<?php
}
?>
				  							
										</div>
									</div>


					<div class="form-group">
						<label for="Rep_Legal" class="col-sm-3 control-label">Representante Legal</label>
						<div class="col-sm-8">
				  		<input type="text" class="form-control" id="Rep_Legal" name="Rep_Legal" required placeholder="Representante Legal" value="<?php echo $Rep_Legal; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="CC" class="col-sm-3 control-label">Numero de Documento</label>
						<div class="col-sm-8">
				  		<input type="text" class="form-control" id="CC" name="CC" required placeholder="Numero de Documento" value="<?php echo $CC; ?>">
						</div>
					</div>
					<hr class="style1">
					<H2 style="text-align: left;">Referencias</H2>
					<hr class="style1">
					<div class="form-group">
						<label for="Nombre_R1" class="col-sm-3 control-label">Nombre</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="Nombre_R1" name="Nombre_R1" required placeholder="Nombre de Referencia 1" value="<?php echo $Nombre_R1; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="Tel_R1" class="col-sm-3 control-label">Telefono</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="Tel_R1" name="Tel_R1" required placeholder="Telefono de Referencia 1" value="<?php echo $Tel_R1; ?>">
						</div>
					</div>			
					<hr class="style1">
					<div class="form-group">
						<label for="Nombre_R2" class="col-sm-3 control-label">Nombre</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="Nombre_R2" name="Nombre_R2" required placeholder="Nombre de Referencia 2" value="<?php echo $Nombre_R2; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="Tel_R2" class="col-sm-3 control-label">Telefono</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="Tel_R2" name="Tel_R2" required placeholder="Telefono de Referencia 2" value="<?php echo $Tel_R2; ?>">
						</div>
					</div>	
									
									<div class="form-group">
										<div class="col-sm-8 col-md-offset-3">
									<button type="button"  class="btn btn-primary"  onclick="get_user_id('<?php echo $rw_user['Nit'];?>');" data-toggle="modal" data-target="#myModal3">Cambiar Contraseña</button>
				  							
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
							<div class="tab-pane fade" id="Campanas">
								<!-- Campañas-->
								Aqui Van Las Campañas
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
	if (document.getElementById('EstadoU').value == 'Editando') {
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
