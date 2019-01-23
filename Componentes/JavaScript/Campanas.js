		$(document).ready(function(){
			load(1);
		});

		function load(page){
			var q= $("#q").val();
			var Filtro = $("#Filtro").val();
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'Componentes/Ajax/Buscar_Campanas.php?action=ajax&page='+page+'&q='+q+'&Filtro='+Filtro,
				 beforeSend: function(objeto){
					$('#loader').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');
					
				}
			})
		}
function NuevaCampana(){
	location.href='Campanas.php';
}
function obtener_datos(Numero){
	location.href='Campanas.php?Numero='+Numero;
}
	
		
		

