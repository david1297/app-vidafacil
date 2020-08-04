<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
	}
	
	require_once ("config/db.php");
	require_once ("config/conexion.php");
	
	$Codigo="0";
	$Categoria="";
	$FechaI="";
	$FechaV="";
	$NombreEmpresa="";
	$Beneficio="";
	$DescuentoH="";
	$Cobertura="";
	$Servicio="";
	$Descripcion="";
	$PersonaC="";
	$Celular="";
	$Correo="";
	$Whatsapp="";
	$PaginaWeb="";
	$Uso = "";
	$Terminos="";
	$Politicas="";
	$AutorizacionLogo="";


	if (isset($_GET['Codigo'])) {
		$query=mysqli_query($con, "select * from DIRECTORIO where Codigo ='".$_GET['Codigo']."' ");
		$rw_Admin=mysqli_fetch_array($query);

		$Codigo=$rw_Admin['Codigo'];
		$Categoria=$rw_Admin['Categoria'];
		$FechaI=$rw_Admin['FechaI'];
		$FechaV=$rw_Admin['FechaV'];
		$NombreEmpresa=$rw_Admin['NombreEmpresa'];
		$Beneficio=$rw_Admin['Beneficio'];
		$DescuentoH=$rw_Admin['DescuentoH'];
		$Cobertura=$rw_Admin['Cobertura'];
		$Servicio=$rw_Admin['Servicio'];
		$Descripcion=$rw_Admin['Descripcion'];
		$PersonaC=$rw_Admin['PersonaC'];
		$Celular=$rw_Admin['Celular'];
		$Correo=$rw_Admin['Correo'];
		$Whatsapp=$rw_Admin['Whatsapp'];
		$PaginaWeb=$rw_Admin['PaginaWeb'];
		$Uso=$rw_Admin['Uso'];
		$Terminos=$rw_Admin['Terminos'];
		$Politicas=$rw_Admin['Politicas'];
		$AutorizacionLogo=$rw_Admin['AutorizacionLogo'];
		$EstadoD="Consulta";
	}else{
		$EstadoD="Nuevo";
		$Codigo="0";
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
									   <div id="BotonesE">
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
									   </div>
									
									<input type="text" class="form-control hidden" id="EstadoD" name="EstadoD" placeholder="EstadoD" value="<?php echo $EstadoD; ?>" readonly='readonly'>   
									<div class="form-group">	
				  						<div class="col-md-4 ">
										  <label for="Codigo">Codigo</label>
				   							<input type="text" class="form-control" id="Codigo" name="Codigo" placeholder="Codigo" value="<?php echo $Codigo; ?>" readonly='readonly'>   
										</div>
										<div class="col-md-4">
											<label for="FechaI">Fecha de Inicio</label>
											<input type="Date" class="form-control Directorio" id="FechaI" name="FechaI" value="<?php echo $FechaI?>"/>
										</div>
										<div class="col-md-4">
											<label for="FechaV">Fecha de Vencimiento</label>
											<input type="Date" class="form-control Directorio" id="FechaV" name="FechaV" value="<?php echo $FechaV?>"/>
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
											<label for="DescuentoH">Descuento Hasta</label>
											<input type="Date" class="form-control Directorio" id="DescuentoH" name="DescuentoH" value="<?php echo $DescuentoH?>"/>
										</div>
										<div class="col-md-4">
											<label for="NombreEmpresa">Nombre Empresa</label>
											<input type="text" class="form-control Directorio" id="NombreEmpresa" name="NombreEmpresa" value="<?php echo $NombreEmpresa?>"/>
										</div>
										<div class="col-md-4">
											<label for="Beneficio">Beneficio</label>
											<textarea class="form-control Directorio" rows="3" id="Beneficio" name="Beneficio"><?php echo $Beneficio; ?></textarea>
										</div>
										
										<div class="col-md-4">
											<label for="Cobertura">Cobertura</label>
											<textarea class="form-control Directorio" rows="3" id="Cobertura" name="Cobertura"><?php echo $Cobertura; ?></textarea>
										</div>
										<div class="col-md-4">
											<label for="Servicio">Servicio</label>
											<textarea class="form-control Directorio" rows="3" id="Servicio" name="Servicio"><?php echo $Servicio; ?></textarea>
										</div>
										<div class="col-md-4">
											<label for="Descripcion">Descripcion</label>
											<textarea class="form-control Directorio" rows="3" id="Descripcion" name="Descripcion"><?php echo $Descripcion; ?></textarea>
										</div>
										<div class="col-md-4">
											<label for="PersonaC">Persona de Contacto</label>
											<textarea class="form-control Directorio" rows="3" id="PersonaC" name="PersonaC"><?php echo $PersonaC; ?></textarea>
										</div>
										<div class="col-md-4">
											<label for="Celular">Celular</label>
											<textarea class="form-control Directorio" rows="3" id="Celular" name="Celular"><?php echo $Celular; ?></textarea>
										</div>
										<div class="col-md-4">
											<label for="Correo">Correo</label>
											<textarea class="form-control Directorio" rows="3" id="Correo" name="Correo"><?php echo $Correo; ?></textarea>
										</div>
										<div class="col-md-4">
											<label for="Whatsapp">Whatsapp</label>
											<textarea class="form-control Directorio" rows="3" id="Whatsapp" name="Whatsapp"><?php echo $Whatsapp; ?></textarea>
										</div>
										<div class="col-md-4">
											<label for="PaginaWeb">Pagina Web</label>
											<textarea class="form-control Directorio" rows="3" id="PaginaWeb" name="PaginaWeb"><?php echo $PaginaWeb; ?></textarea>
										</div>
										<div class="col-md-4">
											<label for="Uso">Uso del Serivicio</label>
											<textarea class="form-control Directorio" rows="3" id="Uso" name="Uso"><?php echo $Uso; ?></textarea>
										</div>
										<div class="col-md-4">
											<label for="Terminos">Terminos y Condiciones</label>
											<textarea class="form-control Directorio" rows="3" id="Terminos" name="Terminos"><?php echo $Terminos; ?></textarea>
										</div>
										<div class="col-md-4">
											<label for="Politicas">Politicas de USo</label>
											<textarea class="form-control Directorio" rows="3" id="Politicas" name="Politicas"><?php echo $Politicas; ?></textarea>
										</div>	
										<div class="col-md-4">
											<label for="AutorizacionLogo">Autorizacion Logo</label>
											<textarea class="form-control Directorio" rows="3" id="AutorizacionLogo" name="AutorizacionLogo"><?php echo $AutorizacionLogo; ?></textarea>
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
	var EstadoD = $('#EstadoD').val();
	if(EstadoD=='Nuevo'){
		$('.Directorio').attr('readonly', false);
		$('#Botones').removeClass("hidden");
		$('#BotonesE').addClass("hidden");

		
	}else{
		$('.Directorio').attr('readonly', true);
		$('#Botones').addClass("hidden");
		$('#BotonesE').removeClass("hidden");
	}
	
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
		var EstadoD = $('#EstadoD').val();
	if(EstadoD=='Nuevo'){
		location.href='Consultar-Directorio.php';
	}else{
		$('.Directorio').attr('readonly', true);
		$('#Botones').addClass("hidden");
	}


		
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
					

					var Res = datos.split('*');
					if(Res[1]=='Correcto'){
						 $('#Codigo').val(Res[2]);
						
						 $("#resultados_ajax2").html(Res[3]);
						 
					}else{
						$("#resultados_ajax2").html(datos);
					}
				}
			});
			event.preventDefault();
		})

	</script>
</body>
</html>
