<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	require_once ("config/db.php");
	require_once ("config/conexion.php");
	
	$Ventas="active";
	
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
						<button class="btn btn-success" id="ExportarExcel" ><i class="fas fa-file-excel"></i>Exportar a Excel </button>
						</div>
						<h4><i class='glyphicon glyphicon-search'></i>Base General</h4>
						
					</div>
					<div class="panel-body">
					<?php 
						include("Componentes/Modal/Actualizar_Ventas.php");
					?>
						<form class="form-horizontal" role="form" id="datos_cotizacion">
							<div class="form-group row">
							<div class="col-md-2">		
									<select class='form-control ' id="Filtro" name ="Filtro" placeholder="Estado" onchange='load(1);'>
										<option value="Identificacion">Identificacion</option>
										<option value="Nombre">Nombre o Apellido</option>
										<option value="Correo">Correo</option>
										<option value="Telefono">Telefono</option>
										<option value="Numero">Numero</option>								
										<option value="SAfiliado">Sin Afiliado</option>								
									</select>
								</div>
								<div class="col-md-2">		
									<input type="Date" class="form-control" id="fechaIni" name="fechaIni" value="<?php echo date("Y-m-d",strtotime("-1 month"))?>" onchange='load(1);'>
								</div>
								<div class="col-md-2">		
									<input type="Date" class="form-control" id="fechaFin" name="fechaFin" value="<?php echo date("Y-m-d")?>" onchange='load(1);'>
								</div>
								<div class="col-md-2">
									<input type="text" class="form-control" id="q" autocomplete="off" placeholder="Criterio de Busqueda" onkeyup='load(1);'>
								</div>
								<div class="col-md-2">		
									<select class='form-control ' id="EFiltro" name ="EFiltro" placeholder="EFiltro" onchange='CambioEFiltro();'>
									<option value="Todos">Todos</option>
										<option value="Usuario">Usuario</option>
										<option value="Estado">Estado</option>
										<option value="Campana">Campaña</option>
										<option value="Departamento">Departamento</option>
										<option value="Ciudad">Ciudad</option>
									</select>
								</div>
								<div class="col-md-2">		
									<select class='form-control' id="VFiltro" name ="VFiltro" placeholder="Filtro" onchange='load(1);'>
										<option value="Todos">Todos</option>
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
	<div class="modal fade" id="FitroForPago" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="AgregarArea">Opcion</h4>
		  </div>
		<div class="modal-body">
			<div class="form-group">
				<div class="">
					<select class='form-control ' id="Forma_Pago" name ="Forma_Pago" placeholder="Forma_Pago">
									<option value="Ponal">Ponal</option>
										<option value="Soluciones">Soluciones</option>
										
									</select>
				</div>
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="button" class="btn btn-primary" onclick="Exportat()">Exportar</button>
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
	<script type="text/javascript" src="Componentes/JavaScript/BaseGeneral.js"></script>
	<script lang = "javascript"  src = "js-xlsx-master/dist/xlsx.full.min.js"> </script>
	<script>
	function CambioEFiltro(){
		var Filtro =  $("#EFiltro").val();
		$("#loader").fadeIn('slow');
			$.ajax({
				url:'Componentes/Ajax/Filtros_BaseGeneral.php?Filtro='+Filtro,
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

	$( "#ExportarExcel" ).click(function( event ) {

		$("#FitroForPago").modal("show");


	
});
function obtener_datosV(Numero,Estado){
	document.getElementById('resultados_ajax2').innerText='';
	document.getElementById('Titulo_Venta').innerText = 'Actualizar Transaccion N. '+ Numero;
	document.getElementById('Numero_Venta').value = Numero;
	$("#Estado_Campana").html($("#Estado_Campana"+Numero+"").html());	
	$("#Estado").html($("#Estado"+Numero+"").html());	
	$("#Token").val($("#Token"+Numero).val());
	$("#Comision").val($("#Comision"+Numero).val());
	$("#ComisionG7").val($("#Comision"+Numero).val());
	
	$("#Valor").val($("#Valor"+Numero).val());
	$("#TPago").val($("#TPago"+Numero).val());
	$("#EstadoA").val($("#Estado"+Numero).val());
	$("#CObservaciones").html($("#Observaciones"+Numero).html());
	Descuentos();
	$.ajax({
				url:'Componentes/Ajax/CardFormaPago.php?Numero='+Numero,
				 beforeSend: function(objeto){
			  },
				success:function(data){
					//$("#FormaDePago").html(data);
				}
			})
}

function Descuentos(){
		$('#Descuentos').removeClass("hidden");
		var F = $('#TPago').val();
		var Numero = $('#Numero_Venta').val();
		if (F=='Tarjeta'){
			$("#FormaDePago").html($("#TarjetaC"+Numero+"").html());	



			var TotalDevengado = $('#Valor').val();
			
			var VVenta=TotalDevengado;

			VVenta=VVenta*1;
		
			$('#VVenta').val(VVenta.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"));
			var ComisionT=$('#ComisionT').val();
			var ComisionG7 =$('#ComisionG7').val();
			TotalDevengado = $('#ComisionF').val();
			var ComisionF=TotalDevengado.replace(/,/g, "");
			var IvaG7 = $('#IvaG7').val();
			var Retefuente = $('#Retefuente').val();
			var ReteIca = $('#ReteIca').val();		
			var VComisionT=VVenta*ComisionT/100;
			$('#VComisionT').val(VComisionT.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"));
			var VComisionG7 = VVenta* ComisionG7 /100;
			$('#VComisionG7').val(VComisionG7.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"));
			ComisionF=ComisionF*1;
			$('#ComisionF').val(ComisionF.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"));
			var TotalComisionG7 =(ComisionF*1)+(VComisionG7);
			$('#TotalComisionG7').val(TotalComisionG7.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"));
			var VIvaG7 = TotalComisionG7*IvaG7/100;
			$('#VIvaG7').val(VIvaG7.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"));
			var VRetefuente = VVenta*Retefuente/100;
			$('#VRetefuente').val(VRetefuente.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"));
			var VReteIca = VVenta*ReteIca/100;
			$('#VReteIca').val(VReteIca.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"));
			var TotalDescuento = VComisionT+TotalComisionG7+VIvaG7+VRetefuente+VReteIca;
			$('#TotalDescuento').val(TotalDescuento.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"));
			var TotalCuenta = VVenta-TotalDescuento;

			$('#TotalCuenta').val(TotalCuenta.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"));
			$(".valor").keyup();
		}else{
			if(F=='Policia'){
				$("#FormaDePago").html($("#TarjetaP"+Numero+"").html());	
			}
			
			$('#VVenta').val( $('#Valor').val());
			$('#TotalCuenta').val($('#Valor').val());

			$('#Descuentos').addClass("hidden");
		}
	}

function Exportat(){
	var q= $("#q").val();
			var Filtro = $("#Filtro").val();
			var fechaIni = $("#fechaIni").val();
			var fechaFin = $("#fechaFin").val();
			var EFiltro = $("#EFiltro").val();
			var VFiltro = $("#VFiltro").val();
			var Forma_Pago = $("#Forma_Pago").val();
			
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'Componentes/Ajax/Exportar_BaseGeneral.php?action=ajax&q='+q+'&Filtro='+Filtro+
				'&fechaIni='+fechaIni+'&fechaFin='+fechaFin+'&EFiltro='+EFiltro+'&VFiltro='+VFiltro
				+'&Forma_Pago='+Forma_Pago,
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
			  },
			  success:function(dataR){
			
			var string ='{"user_id": "1", "auth_id": "1"}';
			var data=JSON.parse('['+dataR+']');
			var NombreXLS='';
			$('#loader').html('');
			if(Forma_Pago =='Ponal'){
				NombreXLS="Base General Ponal";
			}else{
				NombreXLS="Base General Soluciones";	
			}	
			if(typeof XLSX == 'undefined') XLSX = require('xlsx');
			var ws = XLSX.utils.json_to_sheet(data);
			var wb = XLSX.utils.book_new();
			XLSX.utils.book_append_sheet(wb, ws, NombreXLS);
			
			XLSX.writeFile(wb, NombreXLS+".xlsx");
		}
			})
	
}



	</script>
  </body>
</html>