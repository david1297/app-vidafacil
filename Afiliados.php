<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
    }
	require_once ("config/db.php");
	require_once ("config/conexion.php");
	
	$Identificacion="";
	$Primer_Nombre="";
	$Segundo_Nombre="";
	$Primer_Apellido="";
	$Segundo_Apellido="";
	$Tipo_Identificacion="";
	$Fecha_Nacimiento="";
	$Nacionalidad="";
	$Ciudad="";
	$Departamento="";
	$Direccion="";
	$Direccion_Adicional="";
	$Estrato="";
	$Nivel_Educacion="";
	$Ocupacion="";
	$Rango_Ingresos="";
	$Telefono="";
	$Forma_Pago="";
	$Direccion_Firma="";
	$Fecha_Firma="";
	$Horario="";
	$Estado="";


	if (isset($_GET['Identificacion'])) {
		$query=mysqli_query($con, "select * from Afiliados where Identificacion ='".$_GET['Identificacion']."' ");
		$rw_Admin=mysqli_fetch_array($query);
		$Identificacion=$rw_Admin['Identificacion'];
		$Primer_Nombre=$rw_Admin['Primer_Nombre'];
		$Segundo_Nombre=$rw_Admin['Segundo_Nombre'];
		$Primer_Apellido=$rw_Admin['Primer_Apellido'];
		$Segundo_Apellido=$rw_Admin['Segundo_Apellido'];
		$Tipo_Identificacion=$rw_Admin['Tipo_Identificacion'];
		$Fecha_Nacimiento=$rw_Admin['Fecha_Nacimiento'];
		$Nacionalidad=$rw_Admin['Nacionalidad'];
		$Departamento=$rw_Admin['Departamento'];
		$Ciudad=$rw_Admin['Ciudad'];
		$Direccion="";
		$Direccion_Adicional="";
		$Estrato="";
		$Nivel_Educacion="";
		$Ocupacion="";
		$Rango_Ingresos="";
		$Telefono="";
		$Forma_Pago="";
		$Direccion_Firma="";
		$Fecha_Firma="";
		$Horario="";
		$Estado="";
		$EstadoC="Editando";
		$Read= "readonly='readonly'";
	}else{
		$EstadoC="Nuevo";
		$Read= "";
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
								<span class="fas fa-user-tie"></span> Consultar Afiliados
							</button>
						</div>
						<h4><i class="fas fa-user-tie"></i>   Afiliados</h4>
					</div>
					<div class="panel-body">
						<div class="tab-content content-profile">
							<div class="tab-pane fade in active" id="Informacion">
								<form class="form-horizontal col-sm-8" method="post" id="Guardar_Afiliado" name="Guardar_Afiliado">
			   						<div id="resultados_ajax"></div>
									<input type="text" class="form-control hidden" id="EstadoC" name="EstadoC"  value="<?php echo $EstadoC; ?>" > 
									<div class="form-group">
				  						<label for="Identificacion" class="col-sm-3  control-label">Identificacion</label>
				  						<div class="col-sm-8 ">
				   							<input type="text" class="form-control" id="Identificacion" name="Identificacion" placeholder="Identificacion" value="<?php echo $Identificacion; ?>" <?php echo $Read; ?> required>
				  						</div>
			   						</div>
									   <div class="form-group" >
										<label for="Tipo_Identificacion" class="col-sm-3 control-label">Tipo de Identificacion</label>
										<div class="col-sm-8">
										<select class='form-control' id="Tipo_Identificacion" name ="Tipo_Identificacion" placeholder="Tipo de Identificacion" >
										<?php 
										$Cedula="";
										$Extranjeria="";
										$Contrasena="";
										$Pasaporte="";
										if($Tipo_Identificacion == 'Cedula'){
											$Cedula="selected"; 
										}else{
											if($Tipo_Identificacion == 'Cedula De Extranjeria'){
												$Extranjeria="selected"; 												
											}else{
												if($Tipo_Identificacion == 'Contraseña'){
													$Contrasena="selected"; 
												}else{
													if($Tipo_Identificacion == 'Pasaporte'){
														$Pasaporte="selected"; 
													}	
												}	
											}
										}
										echo '<option value="Cedula"'.$Cedula.'>Cedula</option>';
										echo '<option value="Cedula De Extranjeria"'.$Extranjeria.'>Cedula De Extranjeria</option>';
										echo '<option value="Contraseña"'.$Contrasena.'>Contraseña</option>';
										echo '<option value="Pasaporte"'.$Pasaporte.'>Pasaporte</option>';
							  		?>
									</select>
										</div>
									</div>
									<div class="form-group" >
										<label for="Nombres"  class="col-sm-3 control-label">Nombres</label>
				  						<div class="col-sm-4">
 				   							<input type="text" class="form-control" id="Primer_Nombre" name="Primer_Nombre"  placeholder="Primer Nombre" value="<?php echo $Primer_Nombre; ?>">
				  						</div>
										<div class="col-sm-4">
 				   							<input type="text" class="form-control" id="Segundo_Nombre" name="Segundo_Nombre"  placeholder="Segundo Nombre" value="<?php echo $Segundo_Nombre; ?>">
				  						</div>
			   						</div> 
									<div class="form-group" >
					  					<label for="Apellidos" class="col-sm-3 control-label">Apellidos</label>
				  						<div class="col-sm-4">
 				   							<input type="text" class="form-control" id="Primer_Apellido" name="Primer_Apellido"  placeholder="Primer Apellido" value="<?php echo $Primer_Apellido; ?>"  onkeyup="RazonSocial()">
				  						</div>
										  <div class="col-sm-4">
 				   							<input type="text" class="form-control" id="Segundo_Apellido" name="Segundo_Apellido"  placeholder="Segundo Apellido" value="<?php echo $Segundo_Apellido; ?>"  onkeyup="RazonSocial()">
				  						</div>  
			   						</div>
									
									<div class="form-group">
										<label for="Fecha_Nacimiento" class="col-sm-3 control-label">Fecha de Nacimiento</label>
										<div class="col-sm-8">
											<input type="date" class="form-control" id="Fecha_Nacimiento" name="Fecha_Nacimiento" required placeholder="Fecha de Nacimiento" value="<?php echo $Fecha_Nacimiento;?>" step="2">
										</div>
									</div>
									<div class="form-group">
										<label for="Fecha_Nacimiento" class="col-sm-3 control-label">Nacionalidad</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="Nacionalidad" name="Nacionalidad" required placeholder="Nacionalidad" value="<?php echo $Nacionalidad;?>">
										</div>
									</div>
									<div class="form-group">
										<label for="Fecha_Nacimiento" class="col-sm-3 control-label">Nacionalidad</label>
										<div class="col-sm-8">
										<?PHP
												$query1=mysqli_query($con, "select * from Departamentos order by Nombre");
												echo' <select class="form-control" id="Departamento" name ="Departamento" placeholder="Departamento " onchange="Departamento()">';
												while($rw_Admin1=mysqli_fetch_array($query1)){
													if ($Departamento ==$rw_Admin1['Codigo']){
														echo '<option value="'.$rw_Admin1['Codigo'].'" selected >'.$rw_Admin1['Nombre'].'</option>';
													} else{
														echo '<option value="'.$rw_Admin1['Codigo'].'">'.$rw_Admin1['Nombre'].'</option>';	
													}
												}
												
												echo '</select>';
											?>	
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
