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
	$Banco_1="";
	$Tipo_Banco_1="";
	$Numero_Cuenta_1="";
	$Banco_2="";
	$Tipo_Banco_2="";
	$Numero_Cuenta_2="";
	$Titular_1="";
	$Titular_2="";
		
	$Tipo ="";
	$Estado ="";
	$Porcentaje ="";
	$Perfil="";
	if (isset($_GET['Nit'])) {
		$query=mysqli_query($con, "select * from Usuarios where Nit ='".$_GET['Nit']."' ");
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
		$Banco_1=$rw_Admin['Banco_1'];
		$Tipo_Banco_1=$rw_Admin['Tipo_Banco_1'];
		$Numero_Cuenta_1=$rw_Admin['Numero_Cuenta_1'];
		$Banco_2=$rw_Admin['Banco_2'];
		$Tipo_Banco_2=$rw_Admin['Tipo_Banco_2'];
		$Numero_Cuenta_2=$rw_Admin['Numero_Cuenta_2'];
		$Titular_1=$rw_Admin['Titular_1'];
	$Titular_2=$rw_Admin['Titular_2'];

		$EstadoU="Editando";
		$Read= "readonly='readonly'";
	}else
	{
		$EstadoU="Nuevo";
		$Read= "";
	}
	if (isset($_GET['Perfil'])) {
		$Perfil="Si";
	}
?>
<!doctype html>
<html lang="es">
<head>
	<?php 
		include("head.php"); 
		include("componentes/modal/cambiar_password.php");
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
							<?php
								if ($Perfil <>'SI'){
									echo '
									<button type="button" class="btn btn-default" id="Consultar">
										<span class="fas fa-users"></span> Consultar Usuarios
									</button>';
								}
							?>
						</div>
						<h4><i class="fas fa-user-tie"></i>   Usuarios</h4>
					</div>
					<div class="panel-body">
					<?php 
						include("Componentes/Modal/Buscar_Campanas.php");
						?>
						<ul class="nav nav-tabs" role="tablist">
							<li class="active"><a href="#Informacion" role="tab" data-toggle="tab">Informacion</a></li>
							<li><a href="#Permisos" role="tab" data-toggle="tab">Permisos</a></li>
							<li><a href="#Campanas" role="tab" data-toggle="tab">Campañas</a></li>
						</ul>
						<div class="tab-content content-profile">
							<div class="tab-pane fade in active" id="Informacion">
								<form class="form-horizontal col-sm-12" method="post" id="Guardar_Usuario" name="Guardar_Usuario">
			   						<div id="resultados_ajax"></div>
									   	<input type="text" class="form-control hidden" id="EstadoU" name="EstadoU"  value="<?php echo $EstadoU; ?>" > 
										<input type="text" class="form-control hidden" id="Perfil" name="Perfil"  value="<?php echo $Perfil; ?>" > 

									<div class="form-group col-sm-8">
				  						<label for="Nit" class="col-sm-3  control-label">Nit</label>
				  						<div class="col-sm-8 ">
				   							<input type="text" class="form-control" id="Nit" name="Nit" placeholder="Nit" value="<?php echo $Nit; ?>" <?php echo $Read; ?> required>
				  						</div>
			   						</div>
									<div class="form-group col-sm-8">
										<label for="Tipo_Persona" class="col-sm-3 control-label">Tipo Persona</label>
										<div class="col-md-8 col-sm-8">
											<select class='form-control' id="Tipo_Persona" name ="Tipo_Persona" placeholder="Tipo Persona" onchange="TipoPersona()"> 
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
									<div class="form-group col-sm-8" id="D_Razon_Social">
										<label for="Razon_Social"  class="col-sm-3 control-label">Razon Social</label>
				  						<div class="col-sm-8">
 				   							<input type="text" class="form-control" id="Razon_Social" name="Razon_Social"  placeholder="Razon Social" value="<?php echo $Razon_Social; ?>">
				  						</div>
			   						</div> 
									<div class="form-group col-sm-8" id="D_Nombre">
					  					<label for="Nombre" class="col-sm-3 control-label">Nombre</label>
				  						<div class="col-sm-8">
 				   							<input type="text" class="form-control" id="Nombre" name="Nombre"  placeholder="Nombre" value="<?php echo $Nombre; ?>"  onkeyup="RazonSocial()">
				  						</div>
			   						</div>
									<div class="form-group col-sm-8" id="D_Apellido">
										<label for="Apellido" class="col-sm-3 control-label">Apellido</label>
										<div class="col-sm-8">
				  							<input type="text" class="form-control" id="Apellido" name="Apellido"  placeholder="Apellido" value="<?php echo $Apellido; ?>"  onkeyup="RazonSocial()">
										</div>
									</div>
									<div class="form-group col-sm-8">
										<label for="Rol" class="col-sm-3 control-label">Rol</label>
										<div class="col-md-8 col-sm-8">
											<?php 
												if ($Perfil =='Si'){
													echo'<input type="Text" class="form-control hidden" id="Rol" name="Rol" require value="'.$Rol.'" readonly="readonly">';
													if ($Rol=="1"){
														$Rol="Administrador";
													}else{
														$Rol="Usuario";
													}									
													echo '
													<input type="Text" class="form-control" require value="'.$Rol.'" readonly="readonly">';
												} else{
													if($_SESSION['Rol'] == '2'){
														echo'<input type="Text" class="form-control hidden" id="Rol" name="Rol" require value="'.$Rol.'" readonly="readonly">';
														if ($Rol=="1"){
															$Rol="Administrador";
														}else{
															$Rol="Usuario";
														}									
														echo '
														<input type="Text" class="form-control" require value="'.$Rol.'" readonly="readonly">';
													}else {											
														echo '<select class="form-control" id="Rol" name ="Rol" placeholder="Rol"  >';
														if($Rol == '2'){
															echo '<option value="2">Usuario</option>';
															echo '<option value="1">Administrador</option>';
														}else{
															echo '<option value="1">Administrador</option>';
															echo '<option value="2">Usuario</option>';
														}
														echo '</select>';
													}
												}


												
											?>	
										</div>
									</div>
									<?php 
										if($EstadoU == "Nuevo"){
											echo '
											<input type="Text" class="form-control hidden" id="Estado" name="Estado" require value="Pendiente" >';
										} else{
											echo '
											<div class="form-group col-sm-8">
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
											echo '</select>
												</div>
											</div>';
										}
									?>
									<div class="form-group col-sm-8">
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
									<div class="form-group col-sm-8">
										<label for="Tel_C" class="col-sm-3 control-label">Telefono de Contacto</label>
										<div class="col-sm-8">
				  							<input type="text" class="form-control" id="Tel_C" name="Tel_C" required placeholder="Telefono de Contacto" value="<?php echo $Tel_C; ?>">
										</div>
									</div>
									<div class="form-group col-sm-8">
										<label for="Direccion" class="col-sm-3 control-label">Direccion</label>
										<div class="col-sm-8">
				  							<input type="text" class="form-control" id="Direccion" name="Direccion" required placeholder="Direccion" value="<?php echo $Direccion; ?>">
										</div>
									</div>
									<div class="form-group col-sm-8">
										<label for="Correo_N" class="col-sm-3 control-label">Correo Electronico</label>
										<div class="col-sm-8">
											<input type="email" class="form-control" id="Correo" name="Correo" require placeholder="Correo Electronico" value="<?php echo $Correo; ?>">				  
										</div>
			  						</div>
									<div class="form-group col-sm-8">
										<label for="Cel_C" class="col-sm-3 control-label">Celular de Contacto</label>
										<div class="col-sm-8">
				  							<input type="text" class="form-control" id="Cel_C" name="Cel_C" required placeholder="Celular de Contacto" value="<?php echo $Cel_C; ?>">
										</div>
									</div>
									<div class="form-group col-sm-8">
										<label for="Correo_C" class="col-sm-3 control-label">Correo de Contacto</label>
										<div class="col-sm-8">
											<input type="email" class="form-control" id="Correo_C" name="Correo_C" require placeholder="Correo de Contacto" value="<?php echo $Correo_C; ?>">				  
										</div>
			  						</div>
				  					<div class="form-group col-sm-8">
										<label for="Porcentaje" class="col-sm-3 control-label">Porcentaje</label>
										<div class="col-sm-8">
											<?php
												if($_SESSION['Rol'] == '2'){
											?>
											<input type="Number" class="form-control" id="Porcentaje" name="Porcentaje" required placeholder="Porcentaje" value="<?php echo $Porcentaje;?>" min="1" max="100" step="0.5" <?php echo $Read; ?> onchange="UpdatePorcentaje()" >
											<?php
												}else{
											?>
											<input type="Number" class="form-control" id="Porcentaje" name="Porcentaje" required placeholder="Porcentaje" value="<?php echo $Porcentaje;?>" min="1" max="100" step="0.5" onchange="UpdatePorcentaje()"> 
											<?php
												}
											?>
										</div>
									</div>
									<div class="form-group col-sm-8">
										<label for="Rep_Legal" class="col-sm-3 control-label">Representante Legal</label>
										<div class="col-sm-8">
				  							<input type="text" class="form-control" id="Rep_Legal" name="Rep_Legal" required placeholder="Representante Legal" value="<?php echo $Rep_Legal; ?>">
										</div>
									</div>
									<div class="form-group col-sm-8">
										<label for="CC" class="col-sm-3 control-label">Numero de Documento</label>
										<div class="col-sm-8">
				  							<input type="text" class="form-control" id="CC" name="CC" required placeholder="Numero de Documento" value="<?php echo $CC; ?>">
										</div>
									</div>	
									<div class="col-sm-12">
										<hr class="style1">
										<H2 style="text-align: left; ">Bancos</H2>
										<hr class="style1">
									</div>
									<div class="form-group col-sm-12 " >
										<div class="col-sm-3">
											<label for="Banco_1">Nombre</label>
											<?PHP
												$query1=mysqli_query($con, "select * from Bancos");
												echo' <select class="form-control" id="Banco_1" name ="Banco_1" placeholder="Banco_1 " onchange="TipoBanco1()">';
												while($rw_Admin1=mysqli_fetch_array($query1)){
													if ($Banco_1 ==$rw_Admin1['Nombre']){
														$Bancos_1 = '<option value="'.$rw_Admin1['Nombre'].'">'.$rw_Admin1['Nombre'].'</option>';
													} else{
														$Bancot_1 = $Bancot_1.'<option value="'.$rw_Admin1['Nombre'].'">'.$rw_Admin1['Nombre'].'</option>';	
													}
													
													
												}
												echo $Bancos_1;
													echo $Bancot_1;
												echo '</select>';
											?>
										</div>
										<div class="col-sm-3">
											<label for="Tipo_Banco_1" >Tipo de Cuenta</label>
											<select class="form-control" id="Tipo_Banco_1" name ="Tipo_Banco_1" placeholder="Tipo_Banco_1 ">
												<?PHP	
													if($Banco_1 =='NEQUI'){
														echo '<option value="Telefonica">Telefonica</option>';
													}else{
														if ($Tipo_Banco_1 == 'Corriente'){
															echo '<option value="Corriente">Corriente</option>';
															echo '<option value="Ahorros">Ahorros</option>';
														}else {
															echo '<option value="Ahorros">Ahorros</option>';
															echo '<option value="Corriente">Corriente</option>';	
														}			
													}
											echo '</select>';
												?>
										</div>
										<div class="col-sm-3">
											<label for="Titular_1">Titular</label>
											<input type="text" class="form-control" id="Titular_1" name="Titular_1"  placeholder="Titular de la Cuenta" value="<?php echo $Titular_1; ?>">
										</div>
										<div class="col-sm-3">
											<label for="Numero_Cuenta_1">Numero de cuenta</label>
											<input type="text" class="form-control" id="Numero_Cuenta_1" name="Numero_Cuenta_1"  placeholder="Numero de Cuenta" value="<?php echo $Numero_Cuenta_1; ?>">
										</div>
									</div>
								
									<div class="form-group col-sm-12 " >
										<div class="col-sm-3">
											<label for="Banco_2">Nombre</label>
											<?PHP
												$query1=mysqli_query($con, "select * from Bancos");
												echo' <select class="form-control" id="Banco_2" name ="Banco_2" placeholder="Banco_2 " onchange="TipoBanco2()">';
												while($rw_Admin1=mysqli_fetch_array($query1)){
													if ($Banco_2 ==$rw_Admin1['Nombre']){
														$Bancos_2 = '<option value="'.$rw_Admin1['Nombre'].'">'.$rw_Admin1['Nombre'].'</option>';
													} else{
														$Bancot_2 = $Bancot_2.'<option value="'.$rw_Admin1['Nombre'].'">'.$rw_Admin1['Nombre'].'</option>';	
													}
												}
												echo $Bancos_2;
													echo $Bancot_2;
												echo '</select>';
											?>
										</div>
										<div class="col-sm-3">
											<label for="Tipo_Banco_2" >Tipo de Cuenta</label>
											<select class="form-control" id="Tipo_Banco_2" name ="Tipo_Banco_2" placeholder="Tipo_Banco_2 ">
												<?PHP	
													if($Banco_2 =='NEQUI'){
														echo '<option value="Telefonica">Telefonica</option>';
													}else{
														if ($Tipo_Banco_2 == 'Corriente'){
															echo '<option value="Corriente">Corriente</option>';
															echo '<option value="Ahorros">Ahorros</option>';
														}else {
															echo '<option value="Ahorros">Ahorros</option>';
															echo '<option value="Corriente">Corriente</option>';	
														}			
													}
											echo '</select>';
												?>
										</div>
										<div class="col-sm-3">
											<label for="Titular_2">Titular</label>
											<input type="text" class="form-control" id="Titular_2" name="Titular_2"  placeholder="Titular de la Cuenta" value="<?php echo $Titular_2; ?>">
										</div>
										<div class="col-sm-3">
											<label for="Numero_Cuenta_2">Numero de cuenta</label>
											<input type="text" class="form-control" id="Numero_Cuenta_2" name="Numero_Cuenta_2"  placeholder="Numero de Cuenta" value="<?php echo $Numero_Cuenta_2; ?>">
										</div>
									</div>	
									<div class="col-sm-12">
										<hr class="style1">
										<H2 style="text-align: left;">Referencias</H2>
										<hr class="style1">
									</div>
									<div class="form-group col-sm-8">
										<label for="Nombre_R1" class="col-sm-3 control-label">Nombre</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="Nombre_R1" name="Nombre_R1" required placeholder="Nombre de Referencia 1" value="<?php echo $Nombre_R1; ?>">
										</div>
									</div>
									<div class="form-group col-sm-8">
										<label for="Tel_R1" class="col-sm-3 control-label">Telefono</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="Tel_R1" name="Tel_R1" required placeholder="Telefono de Referencia 1" value="<?php echo $Tel_R1; ?>">
										</div>
									</div>			
									<div class="form-group col-sm-8">
										<hr class="style1">
										<label for="Nombre_R2" class="col-sm-3 control-label">Nombre</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="Nombre_R2" name="Nombre_R2" required placeholder="Nombre de Referencia 2" value="<?php echo $Nombre_R2; ?>">
										</div>
									</div>
									<div class="form-group col-sm-8">
										<label for="Tel_R2" class="col-sm-3 control-label">Telefono</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="Tel_R2" name="Tel_R2" required placeholder="Telefono de Referencia 2" value="<?php echo $Tel_R2; ?>">
										</div>
									</div>	
									<?php
										if ($EstadoU=="Editando"){
											?>
											<div class="form-group col-sm-8">
												<div class="col-sm-8 col-md-offset-3">
													<button type="button"  class="btn btn-primary"  onclick="get_user_id('<?php echo $rw_user['Nit'];?>');" data-toggle="modal" data-target="#myModal3">Cambiar Contraseña</button>
												</div>
											</div>
											<?php
										}
									?>
									<div class=" col-sm-8">
									<div id="resultados_ajax2"></div>
									<hr class="style1">
									</div>
									
									<div class=" pull-right col-sm-8">
									
										<button type="button" class="btn btn-default" id="Cancelar">Cancelar</button>
										<button type="button" class="btn btn-primary" id="GUsuario">Guardar datos</button>
		  							</div>				
								</form>	
							</div>
							<div class="tab-pane fade" id="Permisos">
								<!-- Permisos-->
								Aqui Van Los Permisos 
							</div>
							<div class="tab-pane fade" id="Campanas">
								<!-- Campañas-->
								<?php
								if ($Perfil <>'Si'){
									echo '
									<button type="button" class="btn btn-default" data-toggle="modal" data-target="#AgregarCampana">
									<i class="fas fa-plus"></i> Agregar Campaña
								</button>';
								}
							?>
								<br><br>
								<div id="resultados_Campana"></div>
								<div id="resultados" class='col-md-12' style="margin-top:10px"></div><!-- Carga los datos ajax -->			
								</div>
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
	<script type="text/javascript" src="Componentes/JavaScript/Campanas_Usuario.js"></script>
	<script>

function UpdatePorcentaje(){
if($("#Porcentaje").val()< 0){
	var p = $("#Porcentaje").val();
	document.getElementById('Porcentaje').value = p* (-1);

}
}
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

$("#GUsuario").click(function( event ) {
		if(document.getElementById('EstadoU').value== 'Editando'){
			var r = confirm("Confirmas Actualizacion de Usuario");
  		if (r == true) {
				$( "#Guardar_Usuario" ).submit();
  		} 
		}else{
			$( "#Guardar_Usuario" ).submit();
		}
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
			
		  }
	});
  event.preventDefault();
})
function TipoPersona(){
	
	if (document.getElementById('Tipo_Persona').value=='Natural'){
		$('#D_Nombre').removeClass("hidden");
		$('#D_Apellido').removeClass("hidden");
		$('#D_Razon_Social').addClass("hidden");
	} else{
		$('#D_Nombre').addClass("hidden");
		$('#D_Apellido').addClass("hidden");
		$('#D_Razon_Social').removeClass("hidden");
	}
	
}
function Cargar() {
	if (document.getElementById('Tipo_Persona').value=='Natural'){
		$('#D_Nombre').removeClass("hidden");
		$('#D_Apellido').removeClass("hidden");
		$('#D_Razon_Social').addClass("hidden");
	} else{
		$('#D_Nombre').addClass("hidden");
		$('#D_Apellido').addClass("hidden");
		$('#D_Razon_Social').removeClass("hidden");
	}
	CargarCampanas();
}
function RazonSocial(){
	document.getElementById('Razon_Social').value = document.getElementById('Nombre').value	 +' '+document.getElementById('Apellido').value;
}
function TipoBanco1() {
var x = document.getElementById("Tipo_Banco_1");
var option = document.createElement("option");
var option2 = document.createElement("option");
if(document.getElementById("Banco_1").value=='NEQUI'){
	x.remove(0);
	x.remove(0);
	option.text = "Telefonica";
	option.value="Telefonica";
	x.add(option, x[0]);
}else {
	x.remove(0);
	x.remove(0);	
	option.text = "Ahorros";
	option.value="Ahorros";
	x.add(option, x[0]);
	option2.text = "Corriente";
	option2.value="Corriente";
	x.add(option2, x[1]);
}
}
function TipoBanco2() {
var x = document.getElementById("Tipo_Banco_2");
var option = document.createElement("option");
var option2 = document.createElement("option");
if(document.getElementById("Banco_2").value=='NEQUI'){
	x.remove(0);
	x.remove(0);
	option.text = "Telefonica";
	option.value="Telefonica";
	x.add(option, x[0]);
}else {
	x.remove(0);
	x.remove(0);	
	option.text = "Ahorros";
	option.value="Ahorros";
	x.add(option, x[0]);
	option2.text = "Corriente";
	option2.value="Corriente";
	x.add(option2, x[1]);
}





}
	</script>
</body>

</html>
