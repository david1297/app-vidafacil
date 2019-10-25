$(document).ready(function(){
	LoadT(1);
});

function LoadT(page){
	var q= $("#qT").val();
	$("#loaderT").fadeIn('slow');
	$.ajax({
		url:'Componentes/Ajax/Buscar_Campanas_Transportadora.php?action=ajax&page='+page+'&q='+q,
		beforeSend: function(objeto){
			$('#loaderT').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
		},success:function(data){
			$(".outer_div").html(data).fadeIn('slow');
			$('#loaderT').html('');					
		}
	})
}


function AgregarT (Numero){
	var NumeroC =$("#Numero").val();
	$.ajax({
    	type: "POST",
        url: "Componentes/Ajax/Agregar_Campana_Transportadora.php",
        data: "NumeroC="+NumeroC+"&Numero="+Numero,
		beforeSend: function(objeto){
			$("#resultadosT").html("Mensaje: Cargando...");
		},success: function(datos){
			$("#resultadosT").html(datos);
		}
	});
}
function EliminarT (Transportadora){
	var NumeroC =$("#Numero").val();
	$.ajax({
        type: "GET",
        url: "Componentes/Ajax/Agregar_Campana_Transportadora.php",
        data: "Transportadora="+Transportadora+"&NumeroC="+NumeroC,
		beforeSend: function(objeto){
			$("#resultadosT").html("Mensaje: Cargando...");
		},success: function(datos){
			$("#resultadosT").html(datos);
		}
	});
}


		
		

