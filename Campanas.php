<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
    }
	require_once ("config/db.php");
	require_once ("config/conexion.php");
	
	$Campanas="active";
	$Numero ="";
	$Nombre ="";
	$Contacto="";
	$Area ="";
	$Estado ="";
	$Porcentaje ="";			
	$Tipo ="";
	$EstadoC ="";
	$Porcentaje ="";
	$Perfil="";
	$Observaciones="";

	if (isset($_GET['Numero'])) {
		$query=mysqli_query($con, "select * from Campanas where Numero ='".$_GET['Numero']."' ");
		$rw_Admin=mysqli_fetch_array($query);
		
		$Numero =$rw_Admin['Numero'];
		$Nombre =$rw_Admin['Nombre'];
		$Contacto=$rw_Admin['Contacto'];
		$Area =$rw_Admin['Area'];
		$Estado =$rw_Admin['Estado'];
		$Porcentaje =$rw_Admin['Porcentaje'];
		$Observaciones=$rw_Admin['Observaciones'];
		$EstadoC="Editando";
		$Read= "readonly='readonly'";
	}else{
		$EstadoC="Nuevo";
		$Read= "";
	}
	if (isset($_GET['Perfil'])) {
		$Perfil="SI";
	}
?>
<!doctype html>
<html lang="es">
<head>
	<?php 
		include("head.php"); 
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
							<button type="button" class="btn btn-default" id="Consultar">
								<span class="glyphicon glyphicon-user"></span> Consultar Campañas
							</button>
						</div>
						<h4><i class="fas fa-bullhorn"></i>   Campañas</h4>
					</div>
					<div class="panel-body">
						<div class="tab-content content-profile">
							<div class="tab-pane fade in active" id="Informacion">
								<form class="form-horizontal col-sm-8" method="post" id="Guardar_Campana" name="Guardar_Campana">
			   						<div id="resultados_ajax"></div>
									<input type="text" class="form-control hidden" id="EstadoC" name="EstadoC"  value="<?php echo $EstadoC; ?>" > 
									<div class="form-group">
				  						<label for="Numero" class="col-sm-3  control-label">Numero</label>
				  						<div class="col-sm-8 ">
				   							<input type="text" class="form-control" id="Numero" name="Numero" placeholder="Numero" value="<?php echo $Numero; ?>" <?php echo $Read; ?> required>
				  						</div>
			   						</div>
									<div class="form-group" >
										<label for="Nombre"  class="col-sm-3 control-label">Nombre</label>
				  						<div class="col-sm-8">
 				   							<input type="text" class="form-control" id="Nombre" name="Nombre"  placeholder="Nombre" value="<?php echo $Nombre; ?>">
				  						</div>
			   						</div> 
									<div class="form-group" >
					  					<label for="Contacto" class="col-sm-3 control-label">Contacto</label>
				  						<div class="col-sm-8">
 				   							<input type="text" class="form-control" id="Contacto" name="Contacto"  placeholder="Contacto" value="<?php echo $Contacto; ?>"  onkeyup="RazonSocial()">
				  						</div>
			   						</div>
									<div class="form-group" >
										<label for="Area" class="col-sm-3 control-label">Area</label>
										<div class="col-sm-8">
				  							<input type="text" class="form-control" id="Area" name="Area"  placeholder="Area" value="<?php echo $Area; ?>"  onkeyup="RazonSocial()">
										</div>
									</div>
									
									<?php 
									if($EstadoC == "Nuevo"){
										echo '
										<input type="Text" class="form-control hidden" id="Estado" name="Estado" require value="Pendiente" >
										';
									} else {
										echo '
										<div class="form-group">
											<label for="Estado" class="col-sm-3 control-label">Estado</label>
											<div class="col-md-8 col-sm-8">
												<select class="form-control" id="Estado" name ="Estado" placeholder="Estado"  >';
											if($Estado == 'Activa'){
												echo '<option value="Activa">Activa</option>';
												echo '<option value="InActiva">InActiva</option>';
											}else{
												echo '<option value="InActiva">InActiva</option>';
												echo '<option value="Activa">Activa</option>';
											}
											echo '
												</select>
											</div>
										</div>';
									}
									?>
				  					<div class="form-group">
										<label for="Porcentaje" class="col-sm-3 control-label">Porcentaje</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="Porcentaje" name="Porcentaje" required placeholder="Porcentaje" value="<?php echo $Porcentaje; ?> ">
										</div>
									</div>
									<div class="form-group">
										<label for="Observaciones">Observaciones:</label>
										<div class="col-sm-12">
  											<textarea class="form-control" rows="5" id="Observaciones"NAME="Observaciones" ><?php echo $Observaciones; ?></textarea>
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
	if (document.getElementById('EstadoC').value == 'Editando') {
		location.reload(true);
	}
	else{
		location.href='Consultar-Campanas.php';
	}
})
$( "#Consultar" ).click(function( event ) {
	
		location.href='Consultar-Campanas.php';

})


	$( "#Guardar_Campana" ).submit(function( event ) {
 var parametros = $(this).serialize();

	 $.ajax({
			type: "POST",
			url: "Componentes/Ajax/Guardar_Campana.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax2").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax2").html(datos);
		
		  }
	});
  event.preventDefault();
})

	</script>
</body>

</html>
