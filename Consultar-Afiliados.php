<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	require_once ("config/db.php");
	require_once ("config/conexion.php");
	
	$Clientes="active";
	$_SESSION['Completados1']=0;
$_SESSION['Completados2']=0;
$_SESSION['Erroneos1']=0;
$_SESSION['Erroneos2']=0;
$_SESSION['Registros1']=0;
$_SESSION['Registros2']=0;
$_SESSION['Recorridos1']=0;
$_SESSION['Recorridos2']=0;
$_SESSION['EstadoI']="Iniciado";
$_SESSION['Proceso']=1;
$_SESSION['Errores']="";
	
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
			include("Componentes/Modal/Ver_Afiliado.php");

		?>
		<div id="main-content">
			<div class="container-fluid">
				<div class="panel panel-default">
					<div class="panel-heading">
		    			<div class="btn-group pull-right">
						<button class="btn btn-success" id="ExportarExcel" ><i class="fas fa-file-excel"></i>Exportar a Excel </button>
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
						
							<a href="Consultar-Agendamientos.php" class="btn btn-default" target="_blank">
							<span class="fas fa-calendar-alt"></span> Agendamiento</a>
							
						
						
					</div>
					<div class="panel-body">
					<div class="col-md-12">
						<span id="loader1"></span>
					</div>
					<div  id="Barra">
					</div>
					
					<div id="DAfiliados">
						<form class="form-horizontal" role="form" id="datos_cotizacion">
							<div class="form-group row">
								<div class="col-md-2">		
									<select class='form-control' id="Filtro" name ="Filtro" placeholder="Filtro" onchange='load(1);'>
										<option value="Identificacion">Identificacion</option>
										<option value="Nombre">Nombre o Apellido</option>
										<option value="Ciudad">Ciudad</option>
										<option value="Departamento">Departamento</option>
										<option value="Telefono">Telefono</option>
									</select>
								</div>		
								<div class="col-md-4">
									<input type="text" class="form-control" id="q" autocomplete="off" placeholder="Escriba Su Criterio de Busqueda" onkeyup='load(1);'>
								</div>
								<div class="col-md-2">		
									<select class='form-control' id="EFiltro" name ="EFiltro" placeholder="Filtro" onchange='CambioEFiltro();'>
										<option value="Todos">Todos</option>
										<option value="Estado">Estado</option>
										<option value="EstadoTx">Estado Tx</option>
										<option value="Tipificacion">Tipificacion</option>
									</select>
								</div>
								<div class="col-md-2">		
									<select class='form-control' id="VFiltro" name ="VFiltro" placeholder="Filtro" onchange='load(1);'>
										<option value="Todos">Todos</option>
									</select>
								</div>
								<div class="col-md-2">		
									<?php
									$query1=mysqli_query($con, "SELECT Nit,Razon_Social FROM USUARIOS where estado='Activo';");
									echo' <select class="form-control" id="FComercio" name ="FComercio" placeholder="Estado" onchange="load(1);">';
									echo  '<option value="Todos">Todos</option>';
									while($rw_Admin1=mysqli_fetch_array($query1)){
										echo  '<option value="'.$rw_Admin1['Nit'].'">'.$rw_Admin1['Razon_Social'].'</option>';
									}
									echo '</select>';

									?>
								</div>
								<div class="col-md-2">
								<span id="loader"></span>
								</div>
							</div>
						</form>
						<div id="ins"></div>
						<div id="resultados"></div>
						<div class='outer_div'></div>
					</div>				
					</div>
				</div>	
			</div>
		</div>
	</div>
	</div>
	<div class="modal  " id="GenerarAgendamiento" tabindex="-1" role="dialog" aria-labelledby="GenerarAgendamiento">
		<div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h2>Editar Agendamiento</h2>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" method="post"  id="GuardarAgendamiento" name="GuardarAgendamiento">
					<div id="VerAgandamiento"></div>
					<div id="RAgendamiento"></div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Guardar datos</button>
					<button type="button" class="btn btn-default" data-dismiss="modal" >Cerrar</button>
					</form>
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
	<script lang = "javascript"  src = "js-xlsx-master/dist/xlsx.full.min.js"> </script>
	<script>
	function CambioEFiltro(){
		var Filtro =  $("#EFiltro").val();
		$("#loader").fadeIn('slow');
			$.ajax({
				url:'Componentes/Ajax/Filtros_Afiliados.php?Filtro='+Filtro,
				 beforeSend: function(objeto){
					$('#loader').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$('#loader').html('');
					$("#VFiltro").html(data);
					load(1);
				}
			})
	}
	</script>
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
  var id ;
	  $.ajax({
		url: "Componentes/Ajax/CargarXlsx.php",
		   type: "POST",
		   data: new FormData(this),
		   cache: false,
    contentType: false,
    processData: false,
			  beforeSend: function(objeto){
				$('#loader1').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
				$('#DAfiliados').addClass("hidden");
				 id = setInterval(CargarBarra,100);
				 
			   },
		   success: function(datos){ 
			$('#loader1').html('');
			//	$('#DAfiliados').removeClass("hidden");
			//	load(1);
			clearInterval(id);
		 }	 
   });
   event.preventDefault();
});
function CargarBarra(){
	$.ajax({
		url:'CargarAfiliadosProgreso.php',
		 beforeSend: function(objeto){
	  },
		success:function(data){
			$("#Barra").html(data);	
		}
	})
}
function VerAfiliado(Id){
	
			$.ajax({
				url:'Componentes/Ajax/Ver_Afiliado.php?Id='+Id,
				 beforeSend: function(objeto){
					$('#VAfiliado').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){			
					$("#VAfiliado").html(data);
					CargarTipificaciones();
					CargarAgendamientos(Id);
					$('#VerAfiliado').modal('show'); 	
				}
			})
	

}
function CargarTipificaciones(){
			var Categoria = $("#TipificacionC").val();
			var Tip = $("#Tip").val();
		
			$.ajax({
				type: "POST",
				url: "Componentes/Ajax/Cargar_Tipificaciones.php",
				data: "Categoria="+Categoria+"&Tip="+Tip,
				beforeSend: function(objeto){
				},success: function(datos){
					$("#Tipi").html(datos);
				}	
			});
		}
function GenerarGestion(Id){
	$.ajax({
		type: "POST",
		url: "Componentes/Ajax/Ver_Agendamiento.php",
		data: "Afiliado="+Id,
		beforeSend: function(objeto){
		},success: function(datos){
			$("#VerAgandamiento").html(datos);
			$('#GenerarAgendamiento').modal('show'); 
			('#RAgendamiento').html(''); 
		}	
	});	
}
function VerGestion(Id){
	$.ajax({
		type: "POST",
		url: "Componentes/Ajax/Ver_Agendamiento.php",
		data: "Id="+Id,
		beforeSend: function(objeto){
		},success: function(datos){
			$("#VerAgandamiento").html(datos);
			$('#GenerarAgendamiento').modal('show'); 
			$('#RAgendamiento').html(''); 
		}	
	});	
}



$( "#Actualizar_Afiliado" ).submit(function( event ) { 
  var parametros = $(this).serialize();
	  $.ajax({
		url: "Componentes/Ajax/Actualizar_Afiliado.php",
		   type: "POST",
		   data: parametros,
			  beforeSend: function(objeto){ 
				$('#RActualizarAfilido').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
			   },
		   success: function(datos){ 
			$('#RActualizarAfilido').html(datos); 
		 }	 
   });
   event.preventDefault();
});



function CargarAgendamientos(Id){
		
			$.ajax({
				type: "POST",
				url: "Componentes/Ajax/Cargar_Agendamientos.php",
				data: "Id="+Id,
				beforeSend: function(objeto){
				},success: function(datos){
					$("#RAgendamientos").html(datos);
				}	
			});
		}
		$( "#GuardarAgendamiento" ).submit(function( event ) { 
  var parametros = $(this).serialize();
	  $.ajax({
		url: "Componentes/Ajax/Guardar_Agendamiento.php",
		   type: "POST",
		   data: parametros,
			  beforeSend: function(objeto){ 
			   },
		   success: function(datos){ 
			$('#RAgendamiento').html(datos); 
			var Id = $("#Afiliado").val();
			CargarAgendamientos(Id);
		
		 }	 
   });
   event.preventDefault();
});
$( "#ExportarExcel" ).click(function( event ) {
	var q= $("#q").val();
			var Filtro = $("#Filtro").val();
			var EFiltro = $("#EFiltro").val();
			var VFiltro = $("#VFiltro").val();
			var FComercio = $("#FComercio").val();
			
	$("#loader").fadeIn('slow');
	$.ajax({
		url:'Componentes/Ajax/Exportar_Afiliados.php?action=ajax&q='+q+'&Filtro='+Filtro+'&EFiltro='+EFiltro+'&VFiltro='+VFiltro+'&FComercio='+FComercio,
			beforeSend: function(objeto){
			$('#loader').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
		},
		success:function(dataR){

			var string ='{"user_id": "1", "auth_id": "1"}';
			var data=JSON.parse('['+dataR+']');
			var NombreXLS='';
			$('#loader').html('');
				NombreXLS="Afiliados";
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