<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	require_once ("config/db.php");
	require_once ("config/conexion.php");
	
	$Clientes="active";
	
?>
<!doctype html>
<html lang="es">
<head>
	<?php include("head.php");?>
</head>
<body>
<div id="Menus">
	<div id="wrapper">
		<?php
			include("Menu.php");
		?>
		<div id="main-content">
			<div class="container-fluid">
				<div class="panel panel-default">
					<div class="panel-heading">
		    			<div class="btn-group pull-right">
						<button type="button" class="btn btn-success" onclick='$("#Archivo").trigger("click");'>
								<span class="fas fa-file-excel"></span> Importar xlsx
							</button>
							<button type="button" class="btn btn-default" onclick="NuevoAfiliado()">
								<span class="fas fa-user-tie"></span> Nuevo Afiliado
							</button>

							<form class="form-horizontal" method='POST' enctype="multipart/form-data" id="CargarXlsx" name="CargarXlsx">	
							<input type="file" class="form-control hidden" id="Archivo" name="Archivo"  onchange="SubirAfiliados()" accept=".xlsx">	
							<button type="submit" class="btn btn-primary hidden" id="Cargar_Archivo">Guardar</button>
							</form>
						</div>
						<h4><i class='glyphicon glyphicon-search'></i> Consultar Afiliados</h4>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" role="form" id="datos_cotizacion">
							<div class="form-group row">
								<div class="col-md-3">		
									<select class='form-control' id="Filtro" name ="Filtro" placeholder="Filtro" onchange='load(1);'>
										<option value="Identificacion">Identificacion</option>
										<option value="Nombre">Nombre o Apellido</option>
										<option value="Ciudad">Ciudad</option>
										<option value="Departamento">Departamento</option>
										<option value="Telefono">Telefono</option>
									</select>
								</div>		
								<div class="col-md-5">
									<input type="text" class="form-control" id="q" autocomplete="off" placeholder="Escriba Su Criterio de Busqueda" onkeyup='load(1);'>
								</div>
								<div class="col-md-2">		
									<select class='form-control' id="FEstado" name ="FEstado" placeholder="Estado" onchange='load(1);'>
										<option value="Todos">Todos</option>
										<option value="Activo">Activo</option>
										<option value="InActivo">InActivo</option>
									</select>
								</div>
								<div class="col-md-2">
								<span id="loader"></span>
								</div>
							</div>
						</form>

						<div id="resultados"></div><!-- Carga los datos ajax -->
						<div class='outer_div'></div><!-- Carga los datos ajax -->
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

	<script type="text/javascript" src="Componentes/JavaScript/Afiliados.js"></script>

	<script>
	function SubirAfiliados(){
		var Archivo = document.getElementById('Archivo').files[0].name;
		var txt;
var r = confirm('Desea Importar el archivo: '+Archivo);
if (r == true) {
	$('#Cargar_Archivo').click();
} else {
 
}
	}

	$( "#CargarXlsx" ).submit(function( event ) { 
  var parametros = $(this).serialize();
	  $.ajax({
		url: "Componentes/Ajax/CargarXlsx.php",
		   type: "POST",
		   data: new FormData(this),
		   cache: false,
    contentType: false,
    processData: false,
			  beforeSend: function(objeto){
					
			   },
		   success: function(datos){ 
		alert(datos);
		 }	 
   });
   event.preventDefault();
})
	</script>
  </body>
</html>