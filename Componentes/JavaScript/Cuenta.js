		$(document).ready(function(){
			load(1);
		});
		function CargarComisiones (Numero){
			var q= $("#q").val();
			var Pest =$("#Pestana").val();
			var Filtro = $("#Filtro").val();
			var Estado = $("#FEstado").val();
			var fechaIni = $("#fechaIni").val();
			var fechaFin = $("#fechaFin").val();
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'Componentes/Ajax/Buscar_ComisionesPendientes.php?action=ajax&q='+q+'&Filtro='+Filtro+'&Estado='+Estado+'&fechaIni='+fechaIni+'&fechaFin='+fechaFin,
				 beforeSend: function(objeto){
				 $('#resultados_ajax2').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$('#resultados_ajax2').html(data);
					
				}
			})
		}
		function load(page){
			var q= $("#q").val();
			var Pest =$("#Pestana").val();
			var Filtro = $("#Filtro").val();
			var Estado = $("#FEstado").val();
			var fechaIni = $("#fechaIni").val();
			var fechaFin = $("#fechaFin").val();
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'Componentes/Ajax/Buscar_Cuenta.php?action=ajax&page='+page+'&q='+q+'&Filtro='+Filtro+'&Estado='+Estado+'&fechaIni='+fechaIni+'&fechaFin='+fechaFin+'&Pest='+Pest,
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$("."+Pest).html(data).fadeIn('slow');
					$('#loader').html('');
					
				}
			})
		}
		function GenerarSolicitud (Numero){
			var Nit =$("#Nit").val();
			$.ajax({
				type: "POST",
				url: "Componentes/Ajax/Agregar_Campana_Usuario.php",
				data: "Numero="+Numero+"&Nit="+Nit,
				beforeSend: function(objeto){
					$("#resultados").html("Mensaje: Cargando...");
				},success: function(datos){
					$("#resultados").html(datos);
				}
			});
		}
function NuevaVenta(){
	//location.href='Ventas.php';
}
$( "#ExportarExcel" ).click(function( event ) {
	var q= $("#q").val();
			var Pest =$("#Pestana").val();
			var Filtro = $("#Filtro").val();
			var Estado = $("#FEstado").val();
			var fechaIni = $("#fechaIni").val();
			var fechaFin = $("#fechaFin").val();
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'Componentes/Ajax/Exportar_Contabilidad.php?action=ajax&q='+q+'&Filtro='+Filtro+'&Estado='+Estado+'&fechaIni='+fechaIni+'&fechaFin='+fechaFin+'&Pest='+Pest,
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
			  },
				success:function(dataR){
					var string ='{"user_id": "1", "auth_id": "1"}';

					var data=JSON.parse('['+dataR+']');
					var NombreXLS='';
					$('#loader').html('');
					if(Pest =='ResEgresos'){
						NombreXLS="Egresos";
					}else{
						if(Pest =='ResIngresos'){
							NombreXLS="Ingresos";
							
						}
					}
					
	/* this line is only needed if you are not adding a script tag reference */
	if(typeof XLSX == 'undefined') XLSX = require('xlsx');
	
	/* make the worksheet */
	var ws = XLSX.utils.json_to_sheet(data);
	
	/* add to workbook */
	var wb = XLSX.utils.book_new();
	XLSX.utils.book_append_sheet(wb, ws, NombreXLS);
	
	/* generate an XLSX file */
						var hoy = new Date();
						y = hoy.getFullYear();
//Mes
m = hoy.getMonth() + 1;
//Día
d = hoy.getDate();
						
	XLSX.writeFile(wb, NombreXLS+" "+d + "-" + m + "-" + y+".xlsx");
				}
			})


	
	

})



$( "#Consultar" ).click(function( event ) {
	
	location.href='Consultar-Ventas.php';

})
function obtener_datos(Numero,Estado){
	document.getElementById('resultados_ajax2').innerText='';
	document.getElementById('Titulo_Venta').innerText = 'Actualizar Venta N. '+ Numero;
	document.getElementById('Numero_Venta').value = Numero;
	$("#Estado").html($("#Estado_Campana"+Numero+"").html());	
}

$( "#Actualizar_Ventas" ).submit(function( event ) {
	var parametros = $(this).serialize();
	$.ajax({
		type: "POST",
		url: "Componentes/Ajax/Actualizar_Ventas.php",
		data: parametros,
		beforeSend: function(objeto){
			$("#resultados_ajax2").html("Mensaje: Cargando...");
		},
		success: function(datos){
			$("#resultados_ajax2").html(datos);
		}
	});
	event.preventDefault();
	var r = confirm("Confirmas Enviar Correo Al Usuario");
  		if (r == true) {
				/*$( "#Guardar_Usuario" ).submit();*/
		}else{
			//$( "#Guardar_Usuario" ).submit();
		}
	load(1);

})

	
		
		

