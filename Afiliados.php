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
	$Correo="";
	$Fecha_Expedicion="";


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
		$Direccion=$rw_Admin['Direccion'];
		$Direccion_Adicional=$rw_Admin['Direccion_Adicional'];
		$Estrato=$rw_Admin['Estrato'];
		$Nivel_Educacion=$rw_Admin['Nivel_Educacion'];
		$Ocupacion=$rw_Admin['Ocupacion'];
		$Rango_Ingresos=$rw_Admin['Rango_Ingresos'];
		$Forma_Pago=$rw_Admin['Forma_Pago'];
		$Telefono=$rw_Admin['Telefono'];
		
		$Direccion_Firma=$rw_Admin['Direccion_Firma'];
		$Fecha_Firma=$rw_Admin['Fecha_Firma'];
		$Horario=$rw_Admin['Horario'];
		$Estado=$rw_Admin['Estado'];
		$Correo=$rw_Admin['Correo'];
		$Fecha_Expedicion=$rw_Admin['Fecha_Expedicion'];
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
<body onload="Cargar()">
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
									<div class="form-group">
				  						<label for="Identificacion" class="col-sm-3  control-label">Fecha de Expedicion</label>
				  						<div class="col-sm-8 ">
				   							<input type="date" class="form-control" id="Fecha_Expedicion" name="Fecha_Expedicion" placeholder="Fecha de Expedicion" value="<?php echo $Fecha_Expedicion;?>" >
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
											<input type="date" class="form-control" id="Fecha_Nacimiento" name="Fecha_Nacimiento" required placeholder="Fecha de Nacimiento" value="<?php echo $Fecha_Nacimiento;?>" >
										</div>
									</div>
									<div class="form-group">
										<label for="Fecha_Nacimiento" class="col-sm-3 control-label">Nacionalidad</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="Nacionalidad" name="Nacionalidad" required placeholder="Nacionalidad" value="<?php echo $Nacionalidad;?>">
										</div>
									</div>
									<div class="form-group">
										<label for="Fecha_Nacimiento" class="col-sm-3 control-label">Departamento</label>
										<div class="col-sm-8">
										<?PHP
												$query1=mysqli_query($con, "select * from Departamentos order by Nombre");
												echo' <select class="form-control" id="Departamento" name ="Departamento" placeholder="Departamento" onchange="CargarCiudades()">';
																				
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
									<div class="form-group">
										<label for="Ciudad" class="col-sm-3 control-label">Ciudad</label>
										<input type="Text" class="form-control hidden" id="Ciu" name="Ciu" require value="<?php echo $Ciudad?>" readonly="readonly">

										<div class="col-sm-8" id="Ciudades" >

										</div>
									</div>
									<div class="form-group">
										<label for="Direccion" class="col-sm-3 control-label">Direccion</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="Direccion" name="Direccion" required placeholder="Direccion" value="<?php echo $Direccion;?>">
										</div>
									</div>
									<div class="form-group">
										<label for="Direccion_Adicional" class="col-sm-3 control-label">Direccion Adicional</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="Direccion_Adicional" name="Direccion_Adicional" required placeholder="Direccion Adicional" value="<?php echo $Direccion_Adicional;?>">
										</div>
									</div>
									<div class="form-group">
										<label for="Estrato" class="col-sm-3 control-label">Estrato</label>
										<div class="col-sm-8">
											<?php
												echo' <select class="form-control" id="Estrato" name ="Estrato" placeholder="Estrato">';
												for ($i = 1; $i <= 6; $i++) {
													if ($Estrato ==$i){
														echo '<option value="'.$i.'" selected >'.$i.'</option>';
													} else{
														echo '<option value="'.$i.'">'.$i.'</option>';	
													}
												}
												echo '</select>';
											?>
										</div>
									</div>
									<div class="form-group">
										<label for="Nivel_Educacion" class="col-sm-3 control-label">Nivel Educativo</label>
										<div class="col-sm-8">
											<?php
											$Primaria='';
											$Bachillerato='';
											$Universitario='';
											$Otro='';
											if ($Nivel_Educacion=='Primaria'){
												$Primaria = 'Selected';
											} else {
												if ($Nivel_Educacion =='Bachillerato'){
													$Bachillerato = 'Selected';
												} else {
													if ($Nivel_Educacion=='Universitario') {
														$Universitario='Selected';
													} else {
														if($Nivel_Educacion=='Otro'){
															$Otro='Selected';
														}
													}

												}
											}
											echo' <select class="form-control" id="Nivel_Educacion" name ="Nivel_Educacion" placeholder="Estrato">';
													echo '<option value="Primaria" '.$Primaria.'>Primaria</option>';
													echo '<option value="Bachillerato" '.$Bachillerato.'>Bachillerato</option>';	
													echo '<option value="Universitario" '.$Universitario.'>Universitario</option>';	
													echo '<option value="Otro" '.$Otro.' >Otro</option>';	
											echo '</select>';
											?>
										</div>
									</div>
									<div class="form-group">
										<label for="Ocupacion" class="col-sm-3 control-label">Ocupacion</label>
										<div class="col-sm-8">
										<?php
											$Ama='';
											$Desempleado='';
											$Empleado='';
											$Estudiante='';
											$Otro='';
											if ($Ocupacion=='Ama de Casa'){
												$Ama = 'Selected';
											} else {
												if ($Ocupacion =='Desempleado'){
													$Desempleado = 'Selected';
												} else {
													if ($Ocupacion=='Empleado') {
														$Empleado='Selected';
													} else {
														if($Ocupacion=='Estudiante'){
															$Estudiante='Selected';
														}else{
															$Otro='Selected';	
														}
													}

												}
											}
											echo' <select class="form-control" id="Ocupacion" name ="Ocupacion" placeholder="Estrato">';
													echo '<option value="Ama de Casa" '.$Ama.'>Ama de Casa</option>';
													echo '<option value="Desempleado" '.$Desempleado.'>Desempleado</option>';	
													echo '<option value="Empleado" '.$Empleado.'>Empleado</option>';	
													echo '<option value="Estudiante" '.$Estudiante.'>Estudiante</option>';	
													echo '<option value="Otro" '.$Otro.' >Otro</option>';	
											echo '</select>';
											?>
										</div>
									</div>
									<div class="form-group">
										<label for="Rango_Ingresos" class="col-sm-3 control-label">Ingresos</label>
										<div class="col-sm-8">
											<?PHP
												$query1=mysqli_query($con, "SELECT * FROM rango_ingresos ");
												echo' <select class="form-control" id="Rango_Ingresos" name ="Rango_Ingresos" placeholder="Rango de Ingresos">';
												while($rw_Admin1=mysqli_fetch_array($query1)){
													if ($Rango_Ingresos ==$rw_Admin1['Codigo']){
														echo '<option value="'.$rw_Admin1['Codigo'].'" selected >'.$rw_Admin1['Descripcion'].'</option>';
													} else{
														echo '<option value="'.$rw_Admin1['Codigo'].'">'.$rw_Admin1['Descripcion'].'</option>';	
													}
												}
												echo '</select>';
											?>	
										</div>
									</div>
									<div class="form-group">
										<label for="Forma_Pago" class="col-sm-3 control-label">Forma De Pago</label>
										<div class="col-sm-8">
											<?PHP
												$query1=mysqli_query($con, "SELECT * FROM Formas_Pago ");
												echo' <select class="form-control" id="Forma_Pago" name ="Forma_Pago" placeholder="Forma de Pago">';
												while($rw_Admin1=mysqli_fetch_array($query1)){
													if ($Forma_Pago ==$rw_Admin1['Codigo']){
														echo '<option value="'.$rw_Admin1['Codigo'].'" selected >'.$rw_Admin1['Descripcion'].'</option>';
													} else{
														echo '<option value="'.$rw_Admin1['Codigo'].'">'.$rw_Admin1['Descripcion'].'</option>';	
													}
												}
												echo '</select>';
											?>	
										</div>
									</div>		
									<div class="form-group">
										<label for="Telefono" class="col-sm-3 control-label">Telefono</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="Telefono" name="Telefono" required placeholder="Telefono" value="<?php echo $Telefono;?>">
										</div>
									</div>	
									<div class="form-group">
										<label for="Correo" class="col-sm-3 control-label">Correo</label>
										<div class="col-sm-8">
											<input type="Email" class="form-control" id="Correo" name="Correo" required placeholder="Correo" value="<?php echo $Correo;?>">
										</div>
									</div>	
									<div class="form-group">
										<label for="Direccion_Firma" class="col-sm-3 control-label">Direccion de Firma</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="Direccion_Firma" name="Direccion_Firma" required placeholder="Direccion de Firma" value="<?php echo $Direccion_Firma;?>">
										</div>
									</div>
									<div class="form-group">
										<label for="Fecha_Firma" class="col-sm-3 control-label">Fecha de Firma</label>
										<div class="col-sm-8">
											<input type="date" class="form-control" id="Fecha_Firma" name="Fecha_Firma" required placeholder="Fecha de Firma" value="<?php echo $Fecha_Firma;?>" >
										</div>
									</div>
									<div class="form-group">
										<label for="Horario" class="col-sm-3 control-label">Hora de Firma</label>
										<div class="col-sm-8">
										<input class="form-control"  type="time" id="Horario" name="Horario" min="12:00" max="24:00" value ="<?php echo $Horario;?>"required>
										</div>
									</div>
									<?php 
										if($EstadoC == "Nuevo"){
											echo '
											<input type="Text" class="form-control hidden" id="Estado" name="Estado" require value="Activo" >';
										} else {
											echo '
											<div class="form-group">
												<label for="Estado" class="col-sm-3 control-label">Estado</label>
												<div class="col-md-8 col-sm-8">
													<select class="form-control" id="Estado" name ="Estado" placeholder="Estado"  >';
													if($Estado == 'Activo'){
														echo '<option value="Activo">Activo</option>';
														echo '<option value="InActivo">InActivo</option>';
													}else{
														echo '<option value="InActivo">InActivo</option>';
														echo '<option value="Activo">Activo</option>';
													}
													echo '
													</select>
												</div>
											</div>';
										}
									?>
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
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/metisMenu/metisMenu.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
	<script src="assets/scripts/common.js"></script>
	<script>
		function CargarCiudades(){
			var Depto = $("#Departamento").val();
			var Id_N = $("#Identificacion").val();
			var Ciu = $("#Ciu").val();
			$.ajax({
				type: "POST",
				url: "Componentes/Ajax/Cargar_Ciudades.php",
				data: "Depto="+Depto+"&Id_N="+Id_N+"&Ciu="+Ciu,
				beforeSend: function(objeto){
				},success: function(datos){
					$("#Ciudades").html(datos);
				}	
			});
		}

		function Cargar() {
			CargarCiudades();
		}

		$( "#Cancelar" ).click(function( event ) {
			if (document.getElementById('EstadoC').value == 'Editando') {
				location.reload(true);
			} else {
				location.href='Consultar-Afiliados.php';
			}
		})
		
		$( "#Consultar" ).click(function( event ) {
			location.href='Consultar-Afiliados.php';
		})
		$( "#Guardar_Afiliado" ).submit(function( event ) {
			var parametros = $(this).serialize();
			$.ajax({
				type: "POST",
				url: "Componentes/Ajax/Guardar_Afiliados.php",
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
