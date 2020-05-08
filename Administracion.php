<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
  }
	require_once ("config/db.php");
	require_once ("config/conexion.php");
  $Administracion="active";
	$query=mysqli_query($con, "Select Operador_Venta,Operador_Donante,Indicativos,Adicionales from ADMINISTRACION ;");
	$rw_Admin=mysqli_fetch_array($query);


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
			include("Componentes/Modal/Agregar_FormaPago.php");
			include("Componentes/Modal/Agregar_Banco.php");
			include("Componentes/Modal/Agregar_Transportadora.php");
			include("Componentes/Modal/Agregar_Seguimiento.php");
			include("Componentes/Modal/Agregar_Area.php");
			include("Componentes/Modal/Agregar_Tipificacion.php");
			include("Componentes/Modal/Agregar_Gestion.php");
			include("Componentes/Modal/Agregar_Estado.php");
			include("Componentes/Modal/Agregar_Categoria.php");

			
			
		?>
		<div id="main-content">
			<div class="container-fluid">
				<div class="section-heading">
					<h1 class="page-title">Administracion de la Empresa</h1>
				</div>
				<ul class="nav nav-tabs" role="tablist">
					<li class="active"><a href="#General" role="tab" data-toggle="tab">General</a></li>
					<li><a href="#FormasPago" role="tab" data-toggle="tab" id="ClickFormas">Formas de Pago</a></li>
					<li><a href="#Bancos" role="tab" data-toggle="tab" id="ClickBancos">Bancos</a></li>
					<li><a href="#Areas" role="tab" data-toggle="tab" id="ClickAreas">Areas</a></li>
					<li><a href="#Transportadoras" role="tab" data-toggle="tab" id="ClickTransportadoras">Transportadoras</a></li>
					<li><a href="#Seguimientos" role="tab" data-toggle="tab" id="ClickSeguimientos">Seguimiento</a></li>
					<li><a href="#Tipificaciones" role="tab" data-toggle="tab" id="ClickTipificaciones">Tipificaciones</a></li>
					<li><a href="#Estados" role="tab" data-toggle="tab" id="ClickEstados">Estados</a></li>
					<li><a href="#Gestion" role="tab" data-toggle="tab" id="ClickGestion">Gestion</a></li>
					<li><a href="#Categorias" role="tab" data-toggle="tab" id="ClickCategorias">Categorias</a></li>
				</ul>				
				<div class="tab-content content-profile">
					<div class="tab-pane fade active in" id="General">
						<form id="Administracion" name="Administracion" method="post">
							<div class="tab-content content-profile">	
								<div class="profile-section">		
									<div class="clearfix">
										
										<div class="left">
											<h2 class="profile-heading">Direcciones</h2>
											<div class="form-group">	
												<label for="Observaciones">Indicativos:</label>
												<div class="col-sm-12">
													<textarea class="form-control" rows="5" id="Indicativos"NAME="Indicativos" ><?php echo $rw_Admin['Indicativos'];?></textarea>
												</div>
											</div>
											<div class="form-group">	
												<label for="Observaciones">Adicionales:</label>
												<div class="col-sm-12">
													<textarea class="form-control" rows="5" id="Adicionales"NAME="Adicionales" ><?php echo $rw_Admin['Adicionales'];?></textarea>
												</div>
											</div>	
											
										</div>
										<div class="left">
											<h2 class="profile-heading">Operadores</h2>
											<div class="form-group">	
												<label for="Observaciones">Operadores de Venta:</label>
												<div class="col-sm-12">
													<textarea class="form-control" rows="5" id="Operador_Venta"NAME="Operador_Venta" ><?php echo $rw_Admin['Operador_Venta'];?></textarea>
												</div>
											</div>
											<div class="form-group">	
												<label for="Observaciones">Operadores Donantes:</label>
												<div class="col-sm-12">
													<textarea class="form-control" rows="5" id="Operador_Donante"NAME="Operador_Donante" ><?php echo $rw_Admin['Operador_Donante'];?></textarea>
												</div>
											</div>	
										</div>
									</div>
									<div id="resultados_ajax2"></div>
									<p class="margin-top-30">
										<button type="submit"  class="btn btn-primary">Guardar</button> &nbsp;&nbsp;
										<button type="button" id="Cancelar" class="btn btn-default">Cancelar</button>
									</p>	
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane fade" id="FormasPago">
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#AgregarFormaDePago">
							<i class="fas fa-plus"></i> Agregar Forma De Pago
						</button>
						<br><br>
						<div id="RFormasPago">
						</div>
					</div>
					<div class="tab-pane fade" id="Bancos">
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#AgregarBanco">
							<i class="fas fa-plus"></i> Agregar Banco
						</button>
						<br><br>
						<div id="RBanco">
						</div>
					</div>
					<div class="tab-pane fade" id="Areas">
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#AgregarArea">
							<i class="fas fa-plus"></i> Agregar Areas
						</button>
						<br><br>
						<div id="RArea">
						</div>
					</div>
					<div class="tab-pane fade" id="Transportadoras">
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#AgregarTransportadora">
							<i class="fas fa-plus"></i> Agregar Transportadoras
						</button>
						<br><br>
						<div id="RTransportadora">
						</div>
					</div>
					<div class="tab-pane fade" id="Seguimientos">
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#AgregarSeguimiento">
							<i class="fas fa-plus"></i> Agregar Seguimientos
						</button>
						<br><br>
						<div id="RSeguimiento">
						</div>
					</div>
					<div class="tab-pane fade" id="Tipificaciones">
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#AgregarTipificacion">
						<i class="fas fa-plus"></i> Agregar Tipificaciones
						</button>
						<input type="text" class="hidden" id='CatPre'>
						<br><br>
						
					
						<div id="RTipificaciones">
						</div>
					</div>
					<div class="tab-pane fade" id="Estados">
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#AgregarEstados">
							<i class="fas fa-plus"></i> Agregar Estado
						</button>
						<br><br>
						<div id="REstados">
						</div>
					</div>
					<div class="tab-pane fade" id="Gestion">
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#AgregarGestion">
							<i class="fas fa-plus"></i> Agregar Gestion
						</button>
						<br><br>
						<div id="RGestion">
						</div>
					</div>
					<div class="tab-pane fade" id="Categorias">
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#AgregarCategorias">
							<i class="fas fa-plus"></i> Agregar Caterogia
						</button>
						<br><br>
						<div id="RCategorias">
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
$( "#Cancelar" ).click(function( event ) {
    location.reload(true);
})

$("#ClickFormas").click(function( event){
	CargarFormasPago();
})
$("#ClickBancos").click(function( event){
	CargarBancos();
})
$("#ClickAreas").click(function( event){
	CargarAreas();
})
$("#ClickTransportadoras").click(function( event){
	CargarTransportadoras();
})
$("#ClickSeguimientos").click(function( event){
	CargarSeguimientos();
})
$("#ClickTipificaciones").click(function( event){
	CargarTipificaiones();
	$('#CatPre').val(0);
});
$("#ClickGestion").click(function( event){
	CargarGestiones();
});
$("#ClickEstados").click(function( event){
	CargarEstados();
});
$("#ClickCategorias").click(function( event){
	CargarCategorias();
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

function CargarFormasPago(){
	$.ajax({
    	type: "POST",
        url: "Componentes/Ajax/Cargar_FormasDePago.php",
        data: "",
		beforeSend: function(objeto){
			$('#RFormasPago').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');	
		},success: function(datos){
			$("#RFormasPago").html(datos);
		}
	});
}
function CargarBancos(){
	$.ajax({
    	type: "POST",
        url: "Componentes/Ajax/Cargar_Bancos.php",
        data: "",
		beforeSend: function(objeto){
			$('#RBanco').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');	
		},success: function(datos){
			$("#RBanco").html(datos);
		}
	});
}
function CargarAreas(){
	$.ajax({
    	type: "POST",
        url: "Componentes/Ajax/Cargar_Areas.php",
        data: "",
		beforeSend: function(objeto){
			$('#RArea').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');	
		},success: function(datos){
			$("#RArea").html(datos);
		}
	});
}
function CargarTransportadoras(){
	$.ajax({
    	type: "POST",
        url: "Componentes/Ajax/Cargar_Transportadoras.php",
        data: "",
		beforeSend: function(objeto){
			$('#RTransportadora').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');	
		},success: function(datos){
			$("#RTransportadora").html(datos);
		}
	});
}
function CargarSeguimientos(){
	$.ajax({
    	type: "POST",
        url: "Componentes/Ajax/Cargar_Seguimientos.php",
        data: "",
		beforeSend: function(objeto){
			$('#RSeguimiento').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');	
		},success: function(datos){
			$("#RSeguimiento").html(datos);
		}
	});
}
function CargarTipificaiones(){
	$.ajax({
    	type: "POST",
        url: "Componentes/Ajax/Cargar_Tipificaiones.php",
        data: "",
		beforeSend: function(objeto){
			$('#RTipificaciones').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
		},success: function(datos){
			$("#RTipificaciones").html(datos);
			if ($('#CatPre').val() != 0){
				$('#BC-'+$('#CatPre').val()).click();
				
			}
		}
	});
}
function CargarGestiones(){
	$.ajax({
    	type: "POST",
        url: "Componentes/Ajax/Cargar_Gestiones.php",
        data: "",
		beforeSend: function(objeto){
			$('#RGestion').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');	
		},success: function(datos){
			$("#RGestion").html(datos);
		}
	});
}
function CargarCategorias(){
	$.ajax({
    	type: "POST",
        url: "Componentes/Ajax/Cargar_Categorias.php",
        data: "",
		beforeSend: function(objeto){
			$('#RCategorias').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');	
		},success: function(datos){
			$("#RCategorias").html(datos);
		}
	});
}
function CargarEstados(){
	$.ajax({
    	type: "POST",
        url: "Componentes/Ajax/Cargar_Estados.php",
        data: "",
		beforeSend: function(objeto){
			$('#REstados').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');	
		},success: function(datos){
			$("#REstados").html(datos);
		}
	});
}
function UpdateDescFormaPago(Key,Numero){
	if (Key.keyCode == 13) {
			var Descripcion = $("#Descripcion_"+Numero).val();
		$.ajax({
        type: "POST",
				url: "Componentes/Ajax/Actualizar_FormaDePago.php",
        data: "Numero="+Numero+"&Descripcion="+Descripcion+"&Campo=D",
			beforeSend: function(objeto){
				$('#loader_'+Numero).html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
			},success: function(datos){
				$('#loader_'+Numero).html(datos);
				$('#loader_'+Numero).fadeOut(2000); 
				setTimeout(function() { 
					$('#loader_'+Numero).html('');	
					$('#loader_'+Numero).fadeIn(1000); 
				}, 1000);	
			}
		});
  }
}
function UpdateTipoFormaPago(Numero){

			var Tipo = $("#Tipo_"+Numero).val();
		$.ajax({
        type: "POST",
				url: "Componentes/Ajax/Actualizar_FormaDePago.php",
        data: "Numero="+Numero+"&Tipo="+Tipo+"&Campo=T",
			beforeSend: function(objeto){
				$('#loader_'+Numero).html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
			},success: function(datos){
				$('#loader_'+Numero).html(datos);
				$('#loader_'+Numero).fadeOut(2000); 
				setTimeout(function() { 
					$('#loader_'+Numero).html('');	
					$('#loader_'+Numero).fadeIn(1000); 
				}, 1000);	
			}
		});
  
}
function UpdateDescBancos(Key,Numero){
	if (Key.keyCode == 13) {
			var Descripcion = $("#Descripcion_B"+Numero).val();
		$.ajax({
        type: "POST",
				url: "Componentes/Ajax/Actualizar_Banco.php",
        data: "Numero="+Numero+"&Descripcion="+Descripcion,
			beforeSend: function(objeto){
				$('#loader_B'+Numero).html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
			},success: function(datos){
				$('#loader_B'+Numero).html(datos);
				$('#loader_B'+Numero).fadeOut(2000); 
				setTimeout(function() { 
					$('#loader_B'+Numero).html('');	
					$('#loader_B'+Numero).fadeIn(1000); 
				}, 1000);	
			}
		});
  }
}
function UpdateDescGestiones(Key,Numero){
	if (Key.keyCode == 13) {
			var Descripcion = $("#Descripcion_G"+Numero).val();
		$.ajax({
        type: "POST",
				url: "Componentes/Ajax/Actualizar_Gestion.php",
        data: "Numero="+Numero+"&Descripcion="+Descripcion,
			beforeSend: function(objeto){
				$('#loader_G'+Numero).html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
			},success: function(datos){
				$('#loader_G'+Numero).html(datos);
				$('#loader_G'+Numero).fadeOut(2000); 
				setTimeout(function() { 
					$('#loader_G'+Numero).html('');	
					$('#loader_G'+Numero).fadeIn(1000); 
				}, 1000);	
			}
		});
  }
}
function UpdateDescEstados(Key,Numero){
	if (Key.keyCode == 13) {
			var Descripcion = $("#Descripcion_E"+Numero).val();
		$.ajax({
        type: "POST",
				url: "Componentes/Ajax/Actualizar_Estado.php",
        data: "Numero="+Numero+"&Descripcion="+Descripcion,
			beforeSend: function(objeto){
				$('#loader_E'+Numero).html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
			},success: function(datos){
				$('#loader_E'+Numero).html(datos);
				$('#loader_E'+Numero).fadeOut(2000); 
				setTimeout(function() { 
					$('#loader_E'+Numero).html('');	
					$('#loader_E'+Numero).fadeIn(1000); 
				}, 1000);	
			}
		});
  }
}
function UpdateDescTransportadoras(Key,Numero){
	if (Key.keyCode == 13) {
			var Descripcion = $("#Descripcion_Tr"+Numero).val();
		$.ajax({
        type: "POST",
				url: "Componentes/Ajax/Actualizar_Transportadora.php",
        data: "Numero="+Numero+"&Descripcion="+Descripcion,
			beforeSend: function(objeto){
				$('#loader_Tr'+Numero).html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
			},success: function(datos){
				$('#loader_Tr'+Numero).html(datos);
				$('#loader_Tr'+Numero).fadeOut(2000); 
				setTimeout(function() { 
					$('#loader_Tr'+Numero).html('');	
					$('#loader_Tr'+Numero).fadeIn(1000); 
				}, 1000);	
			}
		});
  }
}
function UpdateDescSeguimientos(Key,Numero){
	if (Key.keyCode == 13) {
			var Descripcion = $("#Descripcion_S"+Numero).val();
		$.ajax({
        type: "POST",
				url: "Componentes/Ajax/Actualizar_Seguimiento.php",
        data: "Numero="+Numero+"&Descripcion="+Descripcion,
			beforeSend: function(objeto){
				$('#loader_S'+Numero).html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
			},success: function(datos){
				$('#loader_S'+Numero).html(datos);
				$('#loader_S'+Numero).fadeOut(2000); 
				setTimeout(function() { 
					$('#loader_S'+Numero).html('');	
					$('#loader_S'+Numero).fadeIn(1000); 
				}, 1000);	
			}
		});
  }
}
function UpdateDescAreas(Key,Numero){
	if (Key.keyCode == 13) {
			var Descripcion = $("#Descripcion_A"+Numero).val();
		$.ajax({
        type: "POST",
				url: "Componentes/Ajax/Actualizar_Area.php",
        data: "Numero="+Numero+"&Descripcion="+Descripcion,
			beforeSend: function(objeto){
				$('#loader_A'+Numero).html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
			},success: function(datos){
				$('#loader_A'+Numero).html(datos);
				$('#loader_A'+Numero).fadeOut(2000); 
				setTimeout(function() { 
					$('#loader_A'+Numero).html('');	
					$('#loader_A'+Numero).fadeIn(1000); 
				}, 1000);	
			}
		});
  }
}
function UpdateDescCategorias(Key,Numero){
	if (Key.keyCode == 13) {
			var Descripcion = $("#Descripcion_C"+Numero).val();
		$.ajax({
        type: "POST",
				url: "Componentes/Ajax/Actualizar_Categoria.php",
        data: "Numero="+Numero+"&Descripcion="+Descripcion,
			beforeSend: function(objeto){
				$('#loader_C'+Numero).html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
			},success: function(datos){
				$('#loader_C'+Numero).html(datos);
				$('#loader_C'+Numero).fadeOut(2000); 
				setTimeout(function() { 
					$('#loader_C'+Numero).html('');	
					$('#loader_C'+Numero).fadeIn(1000); 
				}, 1000);	
			}
		});
  }
}


function eliminar (Numero){
	$.ajax({
        type: "GET",
        url: "Componentes/Ajax/Cargar_FormasDePago.php",
        data: "Numero="+Numero,
		beforeSend: function(objeto){

		},success: function(datos){
			if (datos=='Error'){
				$("#RFormasPago").html('<div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button> <strong>Error!</strong> Lo sentimos , No se Puede Eliminar La Forma De Pago.<br></div>');
				$('#RFormasPago').fadeOut(2000); 
				
				setTimeout(function() { 
					$('#RFormasPago').fadeIn('fast'); 
					$('#RFormasPago').html('');	
				
					CargarFormasPago();
				}, 2000);	
			
			}else{
					$("#RFormasPago").html(datos);

			}


		
		}
	});
}


function eliminarBanco (Numero){
	$.ajax({
        type: "GET",
        url: "Componentes/Ajax/Cargar_Bancos.php",
        data: "Numero="+Numero,
		beforeSend: function(objeto){

		},success: function(datos){
			if (datos=='Error'){
				$("#RBanco").html('<div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button> <strong>Error!</strong> Lo sentimos , No se Puede Eliminar El Banco.<br></div>');
				$('#RBanco').fadeOut(2000); 
				
				setTimeout(function() { 
					$('#RBanco').fadeIn('fast'); 
					$('#RBanco').html('');	
				
					CargarBancos();
				}, 2000);	
			
			}else{
					$("#RBanco").html(datos);

			}


		
		}
	});
}
function eliminarGestion (Numero){
	$.ajax({
        type: "GET",
        url: "Componentes/Ajax/Cargar_Gestiones.php",
        data: "Numero="+Numero,
		beforeSend: function(objeto){

		},success: function(datos){
			if (datos=='Error'){
				$("#RGestion").html('<div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button> <strong>Error!</strong> Lo sentimos , No se Puede Eliminar La Gestion.<br></div>');
				$('#RGestion').fadeOut(2000); 
				
				setTimeout(function() { 
					$('#RGestion').fadeIn('fast'); 
					$('#RGestion').html('');	
				
					CargarGestiones();
				}, 2000);	
			
			}else{
					$("#RGestion").html(datos);

			}
		}
	});
}
function eliminarEstado (Numero){
	$.ajax({
        type: "GET",
        url: "Componentes/Ajax/Cargar_Estados.php",
        data: "Numero="+Numero,
		beforeSend: function(objeto){

		},success: function(datos){
			if (datos=='Error'){
				$("#REstados").html('<div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button> <strong>Error!</strong> Lo sentimos , No se Puede Eliminar El Estado.<br></div>');
				$('#REstados').fadeOut(2000); 
				
				setTimeout(function() { 
					$('#REstados').fadeIn('fast'); 
					$('#REstados').html('');	
				
					CargarEstados();
				}, 2000);	
			
			}else{
					$("#REstados").html(datos);

			}
		}
	});
}
function eliminarTransportadora (Numero){
	$.ajax({
        type: "GET",
        url: "Componentes/Ajax/Cargar_Transportadoras.php",
        data: "Numero="+Numero,
		beforeSend: function(objeto){

		},success: function(datos){
			if (datos=='Error'){
				$("#RTransportadora").html('<div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button> <strong>Error!</strong> Lo sentimos , No se Puede Eliminar El Transportadora.<br></div>');
				$('#RTransportadora').fadeOut(2000); 
				
				setTimeout(function() { 
					$('#RTransportadora').fadeIn('fast'); 
					$('#RTransportadora').html('');	
				
					CargarTransportadoras();
				}, 2000);	
			
			}else{
					$("#RTransportadora").html(datos);

			}


		
		}
	});
}
function eliminarSeguimiento (Numero){
	$.ajax({
        type: "GET",
        url: "Componentes/Ajax/Cargar_Seguimientos.php",
        data: "Numero="+Numero,
		beforeSend: function(objeto){

		},success: function(datos){
			if (datos=='Error'){
				$("#RSeguimiento").html('<div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button> <strong>Error!</strong> Lo sentimos , No se Puede Eliminar El Seguimiento.<br></div>');
				$('#RSeguimiento').fadeOut(2000); 
				
				setTimeout(function() { 
					$('#RSeguimiento').fadeIn('fast'); 
					$('#RSeguimiento').html('');	
				
					CargarSeguimientos();
				}, 2000);	
			
			}else{
					$("#RSeguimiento").html(datos);

			}


		
		}
	});
}
function eliminarArea (Numero){
	$.ajax({
        type: "GET",
        url: "Componentes/Ajax/Cargar_Areas.php",
        data: "Numero="+Numero,
		beforeSend: function(objeto){

		},success: function(datos){
			if (datos=='Error'){
				$("#RArea").html('<div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button> <strong>Error!</strong> Lo sentimos , No se Puede Eliminar El Area.<br></div>');
				$('#RArea').fadeOut(2000); 
				
				setTimeout(function() { 
					$('#RArea').fadeIn('fast'); 
					$('#RArea').html('');	
				
					CargarAreas();
				}, 2000);	
			
			}else{
					$("#RArea").html(datos);

			}


		
		}
	});
}
function eliminarCategoria (Numero){
	$.ajax({
        type: "GET",
        url: "Componentes/Ajax/Cargar_Categorias.php",
        data: "Numero="+Numero,
		beforeSend: function(objeto){

		},success: function(datos){
			if (datos=='Error'){
				$("#RCategorias").html('<div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button> <strong>Error!</strong> Lo sentimos , No se Puede Eliminar El Estado.<br></div>');
				$('#RCategorias').fadeOut(2000); 
				
				setTimeout(function() { 
					$('#RCategorias').fadeIn('fast'); 
					$('#RCategorias').html('');	
				
					CargarEstados();
				}, 2000);	
			
			}else{
					$("#RCategorias").html(datos);

			}
		}
	});
}
$( "#New_FormaPago" ).submit(function( event ) {
  
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "Componentes/Ajax/Guardar_Forma_Pago.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax3").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax3").html(datos);
			$('#actualizar_datos3').attr("disabled", false);
			$('#resultados_ajax3').fadeOut(2000); 
				setTimeout(function() { 
					$('#resultados_ajax3').html('');	
					$('#resultados_ajax3').fadeIn(1000); 
				}, 1000);	
			CargarFormasPago();
			document.getElementById('New_Descripcion').value = '';
		  }
	});
  event.preventDefault();
})

$( "#New_Banco" ).submit(function( event ) {
	var parametros = $(this).serialize();
		$.ajax({
			 type: "POST",
			 url: "Componentes/Ajax/Guardar_Banco.php",
			 data: parametros,
				beforeSend: function(objeto){
				 $("#resultados_ajax3B").html("Mensaje: Cargando...");
				 },
			 success: function(datos){
			 $("#resultados_ajax3B").html(datos);
			 $('#actualizar_datos3B').attr("disabled", false);
			 $('#resultados_ajax3B').fadeOut(2000); 
				 setTimeout(function() { 
					 $('#resultados_ajax3B').html('');	
					 $('#resultados_ajax3B').fadeIn(1000); 
				 }, 1000);	
			 CargarBancos();
			 document.getElementById('New_DescripcionB').value = '';
			 }
	 });
	 event.preventDefault();
 });
 $( "#New_Estado" ).submit(function( event ) {
	var parametros = $(this).serialize();
		$.ajax({
			 type: "POST",
			 url: "Componentes/Ajax/Guardar_Estado.php",
			 data: parametros,
				beforeSend: function(objeto){
				 $("#resultados_ajax3E").html("Mensaje: Cargando...");
				 },
			 success: function(datos){
			 $("#resultados_ajax3E").html(datos);
			 $('#actualizar_datos3E').attr("disabled", false);
			 $('#resultados_ajax3E').fadeOut(2000); 
				 setTimeout(function() { 
					 $('#resultados_ajax3E').html('');	
					 $('#resultados_ajax3E').fadeIn(1000); 
				 }, 1000);	
			 CargarEstados();
			 document.getElementById('New_DescripcionE').value = '';
			 }
	 });
	 event.preventDefault();
 });
 $( "#New_Gestion" ).submit(function( event ) {
	var parametros = $(this).serialize();
		$.ajax({
			 type: "POST",
			 url: "Componentes/Ajax/Guardar_Gestion.php",
			 data: parametros,
				beforeSend: function(objeto){
				 $("#resultados_ajax3G").html("Mensaje: Cargando...");
				 },
			 success: function(datos){
			 $("#resultados_ajax3G").html(datos);
			 $('#actualizar_datos3G').attr("disabled", false);
			 $('#resultados_ajax3G').fadeOut(2000); 
				 setTimeout(function() { 
					 $('#resultados_ajax3G').html('');	
					 $('#resultados_ajax3G').fadeIn(1000); 
				 }, 1000);	
			 CargarGestiones();
			 document.getElementById('New_DescripcionG').value = '';
			 }
	 });
	 event.preventDefault();
 });
 $( "#New_Transportadora" ).submit(function( event ) {
  
  
  var parametros = $(this).serialize();
	  $.ajax({
		   type: "POST",
		   url: "Componentes/Ajax/Guardar_Transportadora.php",
		   data: parametros,
			  beforeSend: function(objeto){
			   $("#resultados_ajax3Tr").html("Mensaje: Cargando...");
			   },
		   success: function(datos){
		   $("#resultados_ajax3Tr").html(datos);
		   $('#actualizar_datos3Tr').attr("disabled", false);
		   $('#resultados_ajax3Tr').fadeOut(2000); 
			   setTimeout(function() { 
				   $('#resultados_ajax3Tr').html('');	
				   $('#resultados_ajax3Tr').fadeIn(1000); 
			   }, 1000);	
		   CargarTransportadoras();
		   document.getElementById('New_DescripcionTr').value = '';
		   }
   });
   event.preventDefault();
})
$( "#New_Seguimiento" ).submit(function( event ) {
  
  
  var parametros = $(this).serialize();
	  $.ajax({
		   type: "POST",
		   url: "Componentes/Ajax/Guardar_Seguimiento.php",
		   data: parametros,
			  beforeSend: function(objeto){
			   $("#resultados_ajax3S").html("Mensaje: Cargando...");
			   },
		   success: function(datos){
		   $("#resultados_ajax3S").html(datos);
		   $('#actualizar_datos3S').attr("disabled", false);
		   $('#resultados_ajax3S').fadeOut(2000); 
			   setTimeout(function() { 
				   $('#resultados_ajax3S').html('');	
				   $('#resultados_ajax3S').fadeIn(1000); 
			   }, 1000);	
		   CargarSeguimientos();
		   document.getElementById('New_DescripcionS').value = '';
		   }
   });
   event.preventDefault();
})
 $( "#New_Area" ).submit(function( event ) {
  
  
  var parametros = $(this).serialize();
	  $.ajax({
		   type: "POST",
		   url: "Componentes/Ajax/Guardar_Area.php",
		   data: parametros,
			  beforeSend: function(objeto){
			   $("#resultados_ajax3A").html("Mensaje: Cargando...");
			   },
		   success: function(datos){
		   $("#resultados_ajax3A").html(datos);
		   $('#actualizar_datos3A').attr("disabled", false);
		   $('#resultados_ajax3A').fadeOut(2000); 
			   setTimeout(function() { 
				   $('#resultados_ajax3A').html('');	
				   $('#resultados_ajax3A').fadeIn(1000); 
			   }, 1000);	
		   CargarAreas();
		   document.getElementById('New_DescripcionA').value = '';
		   }
   });
   event.preventDefault();
})
 $( "#New_Tipificacion" ).submit(function( event ) {
  
  
  var parametros = $(this).serialize();
	  $.ajax({
		   type: "POST",
		   url: "Componentes/Ajax/Guardar_Tipificacion.php",
		   data: parametros,
			  beforeSend: function(objeto){
			   $("#resultados_ajax3T").html("Mensaje: Cargando...");
			   },
		   success: function(datos){
		   $("#resultados_ajax3T").html(datos);
		   $('#actualizar_datos3B').attr("disabled", false);
		   $('#resultados_ajax3T').fadeOut(2000); 
			   setTimeout(function() { 
				   $('#resultados_ajax3T').html('');	
				   $('#resultados_ajax3T').fadeIn(1000); 
			   }, 1000);	
		  CargarTipificaiones();
		  $('#CatPre').val(0);
		   document.getElementById('New_DescripcionT').value = '';
		   }
   });
   event.preventDefault();
})
$( "#New_Categoria" ).submit(function( event ) {
	var parametros = $(this).serialize();
		$.ajax({
			 type: "POST",
			 url: "Componentes/Ajax/Guardar_Categoria.php",
			 data: parametros,
				beforeSend: function(objeto){
				 $("#resultados_ajax3C").html("Mensaje: Cargando...");
				 },
			 success: function(datos){
			 $("#resultados_ajax3C").html(datos);
			 $('#actualizar_datos3C').attr("disabled", false);
			 $('#resultados_ajax3C').fadeOut(2000); 
				 setTimeout(function() { 
					 $('#resultados_ajax3C').html('');	
					 $('#resultados_ajax3C').fadeIn(1000); 
				 }, 1000);	
			 CargarCategorias();
			 document.getElementById('New_DescripcionC').value = '';
			 }
	 });
	 event.preventDefault();
 });
function UpdateTipi(Key,Numero){
	if (Key.keyCode == 13) {
			var Descripcion = $("#Input-"+Numero).val();
		$.ajax({
        type: "POST",
				url: "Componentes/Ajax/Actualizar_Tipificacion.php",
        data: "Numero="+Numero+"&Descripcion="+Descripcion,
			beforeSend: function(objeto){
				$('#loader_T'+Numero).html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
			},success: function(datos){
				$('#loader_T'+Numero).html(datos);
				$('#loader_T'+Numero).fadeOut(2000); 
				setTimeout(function() { 
					$('#loader_T'+Numero).html('');	
					$('#loader_T'+Numero).fadeIn(1000); 
				}, 1000);	
			}
		});
  }
}
function UpdateTipCat(Key,Numero){
	if (Key.keyCode == 13) {
			var Descripcion = $("#InputC-"+Numero).val();
		$.ajax({
        type: "POST",
				url: "Componentes/Ajax/Actualizar_TipificacionC.php",
        data: "Numero="+Numero+"&Descripcion="+Descripcion,
			beforeSend: function(objeto){
				$('#loader_TC'+Numero).html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
			},success: function(datos){
				$('#loader_TC'+Numero).html(datos);
				$('#loader_TC'+Numero).fadeOut(2000); 
				setTimeout(function() { 
					$('#loader_TC'+Numero).html('');	
					$('#loader_TC'+Numero).fadeIn(1000); 
				}, 1000);	
			}
		});
  }
}
function EliminarTipi (Numero,Categoria){
	$.ajax({
        type: "GET",
        url: "Componentes/Ajax/Cargar_Tipificaiones.php",
        data: "Numero="+Numero,
		beforeSend: function(objeto){
		},success: function(datos){
		
			if (datos=='Error'){
				$("#RTipificaciones").html('<div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button> <strong>Error!</strong> Lo sentimos , No se Puede Eliminar El Banco.<br></div>');
				$('#RTipificaciones').fadeOut(2000); 
				
				setTimeout(function() { 
					$('#RTipificaciones').fadeIn('fast'); 
					$('#RTipificaciones').html('');	
				
					CargarTipificaiones();
					alert(Categoria);
					$('#CatPre').val(Categoria);
				}, 2000);	
			
			}else{
				CargarTipificaiones();
					
					$('#CatPre').val(Categoria);

			}


		
		}
	});
}
function NewSubTipificacion(Numero,Categoria){

			
		$.ajax({
        type: "POST",
				url: "Componentes/Ajax/Guardar_SubTipificacion.php",
        data: "Numero="+Numero+"&Categoria="+Categoria,
			beforeSend: function(objeto){
				
			},success: function(datos){
				CargarTipificaiones();
				$('#CatPre').val(Numero);
			}
		});
 
}

	</script>
</body>

</html>
