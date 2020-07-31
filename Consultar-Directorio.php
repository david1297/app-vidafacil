<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	require_once ("config/db.php");
	require_once ("config/conexion.php");
	
	$Directorio="active";
	
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
						<button class="btn btn-default" onclick="location.href='Directorio.php';" id="Nuevo" ><i class="fas fa-atlas"></i>&nbsp;Nuevo Directorio </button>
						<button class="btn btn-success" id="ExportarExcel" ><i class="fas fa-file-excel"></i>Exportar a Excel </button>
						<button class="btn btn-success" id="ImportarExcel"  onclick='$("#Archivo").trigger("click");'><i class="fas fa-file-excel"></i>Importar a Excel </button>
						<form class="form-horizontal" method='POST' enctype="multipart/form-data" id="CargarXlsx" name="CargarXlsx">	
							<input type="file" class="form-control hidden" id="Archivo" name="Archivo"  onchange="SubirDirectorio()" accept=".xlsx">	
							<button type="submit" class="btn btn-primary hidden" id="Cargar_Archivo">Guardar</button>
							</form>
						</div>
						<h4><i class="fas fa-atlas"></i>&nbsp;Directorio</h4>
						
					</div>
					<div class="panel-body">
					<?php 
						include("Componentes/Modal/Actualizar_Ventas.php");
					?>
						<form class="form-horizontal" role="form" id="datos_cotizacion">
							<div class="form-group row">
							<div class="col-md-2">		
									<select class='form-control ' id="Filtro" name ="Filtro" placeholder="Estado" onchange='load(1);'>
										<option value="Convenio">Convenio</option>
										<option value="Servicio">Servicio</option>
										<option value="Descipcion">Descipcion</option>
										<option value="Correo">Correo</option>
										<option value="Telefono">Telefono</option>								
										<option value="Direccion">Direccion</option>								
									</select>
								</div>
								
								<div class="col-md-2">		
									<input type="Date" class="form-control" id="fechaFin" name="fechaFin" value="<?php echo date("Y-m-d")?>" onchange='load(1);'>
								</div>
								<div class="col-md-4">
									<input type="text" class="form-control" id="q" autocomplete="off" placeholder="Criterio de Busqueda" onkeyup='load(1);'>
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
	<script lang = "javascript"  src = "js-xlsx-master/dist/xlsx.full.min.js"> </script>
	<script>
	$(document).ready(function(){
			load(1);
	});
	function SubirDirectorio(){
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
  var id ;
	  $.ajax({
		url: "Componentes/Ajax/CargarXlsxDirectorio.php",
		   type: "POST",
		   data: new FormData(this),
		   cache: false,
    contentType: false,
    processData: false,
			  beforeSend: function(objeto){
				$('#loader').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
			   },
		   success: function(datos){ 
			$('#loader').html('');
			load(1);
		 }	 
   });
   event.preventDefault();
});



	function load(page){
			var q= $("#q").val();
			var Filtro = $("#Filtro").val();
			
			var fechaIni = $("#fechaFin").val();
		
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'Componentes/Ajax/Buscar_Directorio.php?action=ajax&page='+page+'&q='+q+'&Filtro='+Filtro+'&fechaIni='+fechaIni,
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');
					
				}
			})
		}
	$( "#ExportarExcel" ).click(function( event ) {
		var q= $("#q").val();
			var Filtro = $("#Filtro").val();
			var fechaIni = $("#fechaFin").val();
			
	$("#loader").fadeIn('slow');
	$.ajax({
		url:'Componentes/Ajax/Exportar_Directorio.php?action=ajax&q='+q+'&Filtro='+Filtro+'&fechaIni='+fechaIni,
			beforeSend: function(objeto){
			$('#loader').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
		},
		success:function(dataR){

			var string ='{"user_id": "1", "auth_id": "1"}';
			var data=JSON.parse('['+dataR+']');
			var NombreXLS='';
			$('#loader').html('');
				NombreXLS="Directorio";
			if(typeof XLSX == 'undefined') XLSX = require('xlsx');
			var ws = XLSX.utils.json_to_sheet(data);
			var wb = XLSX.utils.book_new();
			XLSX.utils.book_append_sheet(wb, ws, NombreXLS);
			
			XLSX.writeFile(wb, NombreXLS+".xlsx");
		}
	})


	
});




	</script>
  </body>
</html>