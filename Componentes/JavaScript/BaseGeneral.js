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
				url:'Componentes/Ajax/Buscar_BaseGeneral.php?action=ajax&page='+page+'&q='+q+'&Filtro='+Filtro+'&Estado='+Estado+'&fechaIni='+fechaIni+'&fechaFin='+fechaFin,
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
	document.getElementById('Titulo_Venta').innerText = 'Actualizar Venta N. '+ Numero;
	document.getElementById('Numero_Venta').value = Numero;
	if(Estado=='Rechazada'){
		document.getElementById("Estado").selectedIndex = 1;
	}else{
		document.getElementById("Estado").selectedIndex = 0;
	}

	
	
}

	
		
		

