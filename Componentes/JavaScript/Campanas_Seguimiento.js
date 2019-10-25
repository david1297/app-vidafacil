$(document).ready(function(){
	LoadS(1);
});

function LoadS(page){
	var q= $("#qS").val();
	$("#loaderS").fadeIn('slow');
	$.ajax({
		url:'Componentes/Ajax/Buscar_Campanas_Seguimiento.php?action=ajax&page='+page+'&q='+q,
		beforeSend: function(objeto){
			$('#loaderS').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
		},success:function(data){
			$(".outer_div").html(data).fadeIn('slow');
			$('#loaderS').html('');					
		}
	})
}


function AgregarS(Numero){
	var NumeroC =$("#Numero").val();
	$.ajax({
    	type: "POST",
        url: "Componentes/Ajax/Agregar_Campana_Seguimiento.php",
        data: "NumeroC="+NumeroC+"&Numero="+Numero,
		beforeSend: function(objeto){
			$("#resultadosS").html("Mensaje: Cargando...");
		},success: function(datos){
			$("#resultadosS").html(datos);
		}
	});
}
function EliminarS(Seguimiento){
	var NumeroC =$("#Numero").val();
	$.ajax({
        type: "GET",
        url: "Componentes/Ajax/Agregar_Campana_Seguimiento.php",
        data: "Seguimiento="+Seguimiento+"&NumeroC="+NumeroC,
		beforeSend: function(objeto){
			$("#resultadosS").html("Mensaje: Cargando...");
		},success: function(datos){
			$("#resultadosS").html(datos);
		}
	});
}


		
		

