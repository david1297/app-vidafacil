<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
  }
	require_once ("config/db.php");
	require_once ("config/conexion.php");
  $Administracion="active";
	$query=mysqli_query($con, "Select Operador_Venta,Operador_Donante from Administracion ;");
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
			include("componentes/modal/Agregar_FormaPago.php");
			include("componentes/modal/Agregar_Banco.php");
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
				</ul>				
				<div class="tab-content content-profile">
					<div class="tab-pane fade in active" id="General">
						<form id="Administracion" name="Administracion" method="post">
							<div class="tab-content content-profile">	
								<div class="profile-section">		
									<div class="clearfix">
										<div class="left">
											<h2 class="profile-heading">Informacion Basica</h2>
											<div class="form-group">	
												<label for="Observaciones">Operadoes de Venta:</label>
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
			
		},success: function(datos){
			$("#RBanco").html(datos);
		}
	});
}
function UpdateDescFormaPago(Key,Numero){
	if (Key.keyCode == 13) {
			var Descripcion = $("#Descripcion_"+Numero).val();
		$.ajax({
        type: "POST",
				url: "Componentes/Ajax/Actualizar_FormaDePago.php",
        data: "Numero="+Numero+"&Descripcion="+Descripcion,
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
 })

	</script>
</body>

</html>
