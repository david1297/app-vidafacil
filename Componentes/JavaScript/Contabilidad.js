		$(document).ready(function(){
			load(1);
		});

		function load(page){
			var q= $("#q").val();
			var Pest =$("#Pestana").val();
			var Filtro = $("#Filtro").val();
			var Estado = $("#FEstado").val();
			var fechaIni = $("#fechaIni").val();
			var fechaFin = $("#fechaFin").val();
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'Componentes/Ajax/Buscar_Contabilidad.php?action=ajax&page='+page+'&q='+q+'&Filtro='+Filtro+'&Estado='+Estado+'&fechaIni='+fechaIni+'&fechaFin='+fechaFin+'&Pest='+Pest,
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$("."+Pest).html(data).fadeIn('slow');
					$('#loader').html('');
					
				}
			})
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
			location.href='Componentes/Ajax/Exportar_Contabilidad.php?action=ajax&q='+q+'&Filtro='+Filtro+'&Estado='+Estado+'&fechaIni='+fechaIni+'&fechaFin='+fechaFin+'&Pest='+Pest;
			

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

	
		
		

