		$(document).ready(function(){
			load(1);
		});

		function load(page){
			var q= $("#q").val();
			var Filtro = $("#Filtro").val();
			var Estado = $("#FEstado").val();
			var fechaIni = $("#fechaIni").val();
			var fechaFin = $("#fechaFin").val();
		
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'Componentes/Ajax/Buscar_Transferencias.php?action=ajax&page='+page+'&q='+q+'&Filtro='+Filtro+'&Estado='+Estado+'&fechaIni='+fechaIni+'&fechaFin='+fechaFin,
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');
					
				}
			})
		}
function NuevaVenta(){
	//location.href='Ventas.php';
}
$( "#Consultar" ).click(function( event ) {
	
	location.href='Consultar-Ventas.php';

})
function obtener_datos(Numero){
	location.href='Transferencias.php?Numero='+Numero;
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

	
		
		

