		$(document).ready(function(){
			load(1);
		});

		function load(page){
			var q= $("#q").val();
			var Filtro = $("#Filtro").val();
			var Estado = $("#FEstado").val();
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'Componentes/Ajax/Buscar_Ventas.php?action=ajax&page='+page+'&q='+q+'&Filtro='+Filtro+'&Estado='+Estado,
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
	location.href='Ventas.php';
}
function obtener_datos(Numero){
	location.href='Ventas.php?Numero='+Numero;
}

	
		
		

