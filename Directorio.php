<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
	}
	
	require_once ("config/db.php");
	require_once ("config/conexion.php");
	
	$ServicioS="";
	$Convenio="";
	$Servicio="";
	$Ciudad="";
	$ubicacion="";
	$Porcentaje="";
	$Descripcion="";
	$Terminos="";
	$Uso="";
	$Persona="";
	$Correo="";
	$Telefono="";
	$Direccion="";
	$Vigencia="";
	$FirmaVf="";
	$FirmaAc="";
	$Correo1="";
	$Categoria="";


	if (isset($_GET['Codigo'])) {
		$query=mysqli_query($con, "select * from DIRECTORIO where Codigo ='".$_GET['Codigo']."' ");
		$rw_Admin=mysqli_fetch_array($query);
		$ServicioS=$rw_Admin['ServicioS'];
		$Convenio=$rw_Admin['Convenio'];
		$Servicio=$rw_Admin['Servicio'];
		$Ciudad=$rw_Admin['Ciudad'];
		$ubicacion=$rw_Admin['ubicacion'];
		$Porcentaje=$rw_Admin['Porcentaje'];
		$Descripcion=$rw_Admin['Descripcion'];
		$Terminos=$rw_Admin['Terminos'];
		$Uso=$rw_Admin['Uso'];
		$Persona=$rw_Admin['Persona'];
		$Correo=$rw_Admin['Correo'];
		$Telefono=$rw_Admin['Telefono'];
		$Direccion=$rw_Admin['Direccion'];
		$Vigencia=$rw_Admin['Vigencia'];
		$FirmaVf=$rw_Admin['FirmaVf'];
		$FirmaAc=$rw_Admin['FirmaAc'];
		$Correo1=$rw_Admin['Correo1'];
		$Categoria=$rw_Admin['Categoria'];
		$Codigo=$rw_Admin['Codigo'];

	}else{
	}

?>
<!doctype html>
<html lang="es">
<head>
	<?php 
		include("head.php"); 
	?>
</head>
<body >
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
								<span class="fas fa-atlas"></span> Consultar Directorio
							</button>
						</div>
						<h4><i class="fas fa-atlas"></i>  Directorio</h4>
					</div>
					<div class="panel-body">
						<div class="tab-content content-profile">
							<div class="tab-pane fade in active" id="Informacion">
								<form class="form-horizontal col-md-12" method="post" id="Guardar_Directorio" name="Guardar_Directorio">
			   						<div id="resultados_ajax"></div>
									<?php
									$query1=mysqli_query($con, 'SELECT Modulo,Estado FROM PERMISOS where Permiso="Editar" AND Usuario ="'.$_SESSION['Nit'].'" AND MODULO ="Directorio" order by Modulo ;');							
									$rw_Admin1=mysqli_fetch_array($query1);
									if(($rw_Admin1['Estado']=='true')or($_SESSION['Rol']=='1')){
										?>
											<button class="btn btn-primary" type="button" onclick="Editar()">Editar</button>
										<?php
									}
									$query1=mysqli_query($con, 'SELECT Modulo,Estado FROM PERMISOS where Permiso="Eliminar" AND Usuario ="'.$_SESSION['Nit'].'" AND MODULO ="Directorio" order by Modulo ;');							
									$rw_Admin1=mysqli_fetch_array($query1);
									if(($rw_Admin1['Estado']=='true')or($_SESSION['Rol']=='1')){
										?>
											<button class="btn btn-danger" type="button" onclick="Eliminar()">Eliminar</button>
										<?php
									}


									?>
									<div class="form-group">	
				  						<div class="col-md-4 ">
										  <label for="Codigo">Codigo</label>
				   							<input type="text" class="form-control" id="Codigo" name="Codigo" placeholder="Codigo" value="<?php echo $Codigo; ?>" readonly='readonly'>   
										</div>
										<div class="col-md-4">
											<label for="Vigencia">Vigencia</label>
											<input type="Date" class="form-control Directorio" id="Vigencia" name="Vigencia" value="<?php echo $Vigencia?>"/>
										</div>
										<div class="col-md-4">
											<label for="Correo1">Categoria</label>
											<?PHP
												$query1=mysqli_query($con, "select * from CATEGORIAS order by Nombre");
												echo' <select class="form-control Directorio" id="Categoria" name ="Categoria" placeholder="Categoria">';
																				
												while($rw_Admin1=mysqli_fetch_array($query1)){
													if ($Categoria ==$rw_Admin1['Codigo']){
														echo '<option value="'.$rw_Admin1['Codigo'].'" selected >'.utf8_encode($rw_Admin1['Nombre']).'</option>';
													} else{
														echo '<option value="'.$rw_Admin1['Codigo'].'">'.utf8_encode($rw_Admin1['Nombre']).'</option>';	
													}
												}
												echo '</select>';
											?>
										</div>
										<div class="col-md-4">
											<label for="ServicioS">Servicio</label>
											<textarea class="form-control Directorio" rows="3" id="ServicioS" name="ServicioS" ><?php echo $ServicioS; ?></textarea>
										</div>
										<div class="col-md-4">
											<label for="Convenio">Convenio</label>
											<textarea class="form-control Directorio" rows="3" id="Convenio" name="Convenio"><?php echo $Convenio; ?></textarea>
										</div>
										<div class="col-md-4">
											<label for="Servicio">Servicio</label>
											<textarea class="form-control Directorio" rows="3" id="Servicio" name="Servicio"><?php echo $Servicio; ?></textarea>
										</div>
										<div class="col-md-4">
											<label for="Ciudad">Ciudad</label>
											<textarea class="form-control Directorio" rows="3" id="Ciudad" name="Ciudad"><?php echo $Ciudad; ?></textarea>
										</div>
										<div class="col-md-4">
											<label for="ubicacion">Ubicacion</label>
											<textarea class="form-control Directorio" rows="3" id="ubicacion" name="ubicacion"><?php echo $ubicacion; ?></textarea>
										</div>
										<div class="col-md-4">
											<label for="Porcentaje">Porcentaje</label>
											<textarea class="form-control Directorio" rows="3" id="Porcentaje" name="Porcentaje"><?php echo $Porcentaje; ?></textarea>
										</div>
										<div class="col-md-4">
											<label for="Descripcion">Descripcion</label>
											<textarea class="form-control Directorio" rows="3" id="Descripcion" name="Descripcion"><?php echo $Descripcion; ?></textarea>
										</div>
										<div class="col-md-4">
											<label for="Terminos">Terminos y condiciones</label>
											<textarea class="form-control Directorio" rows="3" id="Terminos" name="Terminos"><?php echo $Terminos; ?></textarea>
										</div>
										<div class="col-md-4">
											<label for="Uso">Uso del servicio</label>
											<textarea class="form-control Directorio" rows="3" id="Uso" name="Uso"><?php echo $Uso; ?></textarea>
										</div>
										<div class="col-md-4">
											<label for="Persona">Persona de contacto</label>
											<textarea class="form-control Directorio" rows="3" id="Persona" name="Persona"><?php echo $Persona; ?></textarea>
										</div>
										<div class="col-md-4">
											<label for="Correo">Correo</label>
											<textarea class="form-control Directorio" rows="3" id="Correo" name="Correo"><?php echo $Correo; ?></textarea>
										</div>
										<div class="col-md-4">
											<label for="Telefono">Telefono</label>
											<textarea class="form-control Directorio" rows="3" id="Telefono" name="Telefono"><?php echo $Telefono; ?></textarea>
										</div>
										<div class="col-md-4">
											<label for="Direccion">Direccion</label>
											<textarea class="form-control Directorio" rows="3" id="Direccion" name="Direccion"><?php echo $Direccion; ?></textarea>
										</div>	
										<div class="col-md-4">
											<label for="FirmaVf">FirmaVf</label>
											<textarea class="form-control Directorio" rows="3" id="FirmaVf" name="FirmaVf"><?php echo $FirmaVf; ?></textarea>
										</div>
										<div class="col-md-4">
											<label for="FirmaAc">FirmaAc</label>
											<textarea class="form-control Directorio" rows="3" id="FirmaAc" name="FirmaAc"><?php echo $FirmaAc; ?></textarea>
										</div>
										<div class="col-md-4">
											<label for="Correo1">Correo1</label>
											<textarea class="form-control Directorio" rows="3" id="Correo1" name="Correo1"><?php echo $Correo1; ?></textarea>
										</div>
									</div>	
								</div>
							
								
									
								
									
									
									
									<div id="resultados_ajax2" class="row col-md-12"></div>
									<hr class="style1">
									<div id="Botones" class=" pull-right hidden">
										<button type="button" class="btn btn-default" id="Cancelar" onclick="CancelarE()">Cancelar</button>
										<button type="submit" class="btn btn-primary " id='GAfiliado' >Guardar datos</button>
		  							</div>	
									  
									  			
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
$(document).ready(function(){
	$('.Directorio').attr('readonly', true);
	$('#Botones').addClass("hidden");
	});

	function Editar(){
		$('.Directorio').attr('readonly', false);
		$('#Botones').removeClass("hidden");
		
	}
	function Eliminar(){
	


		var r = confirm("Desea Eliminar el Registro?");
		if (r == true) {
			var Codigo=$("#Codigo").val();
			$.ajax({
				type: "GET",
				url: "Componentes/Ajax/Eliminar_Directorio.php",
				data: "Codigo="+Codigo,
				beforeSend: function(objeto){
				},success: function(datos){
					alert("El Registro se elimino Correctamente");
					location.href='Consultar-Directorio.php';
				}
			});
		} else {
		}	
	}

	function CancelarE(){
		$('.Directorio').attr('readonly', true);
	$('#Botones').addClass("hidden");
	}
		$( "#Consultar" ).click(function( event ) {
			location.href='Consultar-Directorio.php';
		})
		$( "#Guardar_Directorio" ).submit(function( event ) {
			var parametros = $(this).serialize();
			$.ajax({
				type: "POST",
				url: "Componentes/Ajax/Guardar_Directorio.php",
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
