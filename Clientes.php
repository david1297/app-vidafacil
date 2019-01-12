<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	require_once ("config/db.php");
	require_once ("config/conexion.php");
	
	$Clientes="active";

	$Nit ="";
	$Razon_Social ="";
	$Tipo ="";
	$Tel_C ="";
	$Direccion ="";
	$Correo_N ="";
	$Cel_C ="";
	$Correo_C ="";
	$Rep_Legal ="";
	$CC ="";
	$Nombre_R1 ="";
	$Tel_R1 ="";
	$Nombre_R2 ="";
	$Tel_R2 ="";			

	if (isset($_GET['Nit'])) {

		$query=mysqli_query($con, "select Nit,Razon_Social,Tipo,Tel_C,Direccion,Correo_N,Cel_C,Correo_C,Rep_Legal,CC,Nombre_R1,Tel_R1,Nombre_R2,Tel_R2 from Clientes where Nit ='".$_GET['Nit']."' ");
		$rw_Admin=mysqli_fetch_array($query);
		$Nit =$rw_Admin['Nit'];
		$Razon_Social =$rw_Admin['Razon_Social'];
		$Tipo =$rw_Admin['Tipo'];
		$Tel_C =$rw_Admin['Tel_C'];
		$Direccion =$rw_Admin['Direccion'];
		$Correo_N =$rw_Admin['Correo_N'];
		$Cel_C =$rw_Admin['Cel_C'];
		$Correo_C =$rw_Admin['Correo_C'];
		$Rep_Legal =$rw_Admin['Rep_Legal'];
		$CC =$rw_Admin['CC'];
		$Nombre_R1 =$rw_Admin['Nombre_R1'];
		$Tel_R1 =$rw_Admin['Tel_R1'];
		$Nombre_R2 =$rw_Admin['Nombre_R2'];
		$Tel_R2 =$rw_Admin['Tel_R2'];

		$Estado="Editando";
	}else
	{
		$Estado="Nuevo";
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
				<div class="panel panel-default">
					<div class="panel-heading">
		    		<div class="btn-group pull-right">
							<button type="button" class="btn btn-default" onclick="NuevoCliente()">
								<span class="glyphicon glyphicon-user"></span> Nuevo cliente
							</button>
						</div>
						<h4><i class="fas fa-user-tie"></i>   Clientes</h4>
					</div>
					<div class="panel-body">
					<form class="form-horizontal col-sm-8" method="post" id="guardar_cliente" name="guardar_cliente">
			   	<div id="resultados_ajax"></div>
					<input type="text" class="form-control hidden" id="Estado" name="Estado"  value="<?php echo $Estado; ?>" > 
				  <div class="form-group">
				  	<label for="Nit" class="col-sm-3  control-label">Nit</label>
				  	<div class="col-sm-8 ">
				   		<input type="text" class="form-control" id="Nit" name="Nit" placeholder="Nit" value="<?php echo $Nit; ?>" required>
				  	</div>
			   	</div>
				 	<div class="form-group">
					  <label for="Razon_Social" class="col-sm-3 control-label">Razon Social</label>
				  	<div class="col-sm-8">
 				   		<input type="text" class="form-control" id="Razon_Social" name="Razon_Social" required placeholder="Razon Social" value="<?php echo $Razon_Social; ?>">
				  	</div>
			   	</div>
					<div class="form-group">
						<label for="Tipo" class="col-sm-3 control-label">Tipo Persona</label>
						<div class="col-md-8">
							<select class='form-control' id="Tipo" placeholder="Tipo Persona">
								<?php 
									if($Tipo == 'Natural'){
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
						<label for="Correo_N" class="col-sm-3 control-label">Correo de Notificacion</label>
						<div class="col-sm-8">
							<input type="email" class="form-control" id="Correo_N" name="Correo_N" require placeholder="Correo de Notificacion" value="<?php echo $Correo_N; ?>">				  
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
					<div class="modal-footer aling-items-left">
						<button type="button" class="btn btn-default" id="Cancelar">Cerrar</button>
						<button type="submit" class="btn btn-primary">Guardar datos</button>
		  		</div>				
				</form>	
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
location.href='Consultar-Clientes.php';
	}
	
    
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
