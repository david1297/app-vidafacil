		$(document).ready(function(){
			load(1);
		});

		function load(page){
			var Pest =$("#Pestana").val();
			var EFiltro = $("#EFiltro").val();
			var VFiltro = $("#VFiltro").val();
			var fechaIni = $("#fechaIni").val();
			var fechaFin = $("#fechaFin").val();
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'Componentes/Ajax/Buscar_Contabilidad.php?action=ajax&page='+page+'&EFiltro='+EFiltro+'&VFiltro='+VFiltro+'&fechaIni='+fechaIni+'&fechaFin='+fechaFin+'&Pest='+Pest,
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$("."+Pest).html(data).fadeIn('slow');
					$('#loader').html('');
					
				}
			})
		}

$( "#ExportarExcel" ).click(function( event ) {
	var Pest =$("#Pestana").val();
	var EFiltro = $("#EFiltro").val();
	var VFiltro = $("#VFiltro").val();
	var fechaIni = $("#fechaIni").val();
	var fechaFin = $("#fechaFin").val();
	$("#loader").fadeIn('slow');
	$.ajax({
		url:'Componentes/Ajax/Exportar_Contabilidad.php?action=ajax&EFiltro='+EFiltro+'&VFiltro='+VFiltro+'&fechaIni='+fechaIni+'&fechaFin='+fechaFin+'&Pest='+Pest,
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
			if(typeof XLSX == 'undefined') XLSX = require('xlsx');
			var ws = XLSX.utils.json_to_sheet(data);
			var wb = XLSX.utils.book_new();
			XLSX.utils.book_append_sheet(wb, ws, NombreXLS);
			var hoy = new Date();
			y = hoy.getFullYear();
			m = hoy.getMonth() + 1;
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

	
		
		

