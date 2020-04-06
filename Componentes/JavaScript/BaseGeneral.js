		$(document).ready(function(){
			load(1);
		});

		function load(page){
			var q= $("#q").val();
			var Filtro = $("#Filtro").val();
			
			var fechaIni = $("#fechaIni").val();
			var fechaFin = $("#fechaFin").val();
			var EFiltro = $("#EFiltro").val();
			var VFiltro = $("#VFiltro").val();
		
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'Componentes/Ajax/Buscar_BaseGeneral.php?action=ajax&page='+page+'&q='+q+'&Filtro='+Filtro+'&fechaIni='+fechaIni+'&fechaFin='+fechaFin+'&EFiltro='+EFiltro+'&VFiltro='+VFiltro,
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
function obtener_datos(Numero,Estado){
	document.getElementById('resultados_ajax2').innerText='';
	document.getElementById('Titulo_Venta').innerText = 'Actualizar Transaccion N. '+ Numero;
	document.getElementById('Numero_Venta').value = Numero;
	$("#Estado_Campana").html($("#Estado_Campana"+Numero+"").html());	
	$("#Estado").html($("#Estado"+Numero+"").html());	
	$("#Token").val($("#Token"+Numero).val());
	$("#EstadoA").val($("#Estado"+Numero).val());
}
function obtener_datos1(Numero){
	location.href='Ventas.php?Numero='+Numero;
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

});
function ValidarEstado(valor){
	var Estado =$('#Estado').val();
	var EstadoA =$('#EstadoA').val();
	var Token =$('#Token').val();
	if (Token ==''){
		if(Estado==1 ){	
			event.preventDefault();
			$("#Estado").val(EstadoA);
			$('#Estado').change();
			alert('No se Puede Aprobar la Transaccion sin Numero de Aprobacion');				
		}else{
			$('#EstadoA').val(Estado);
		}
	}else{
		$('#EstadoA').val(Estado);
	}

}

	
		
		

