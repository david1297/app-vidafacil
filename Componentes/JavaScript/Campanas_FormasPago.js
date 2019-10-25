$(document).ready(function(){
	LoadF(1);
});

function LoadF(page){
	var q= $("#qF").val();
	$("#loaderF").fadeIn('slow');
	$.ajax({
		url:'Componentes/Ajax/Buscar_Campanas_FormasPago.php?action=ajax&page='+page+'&q='+q,
		beforeSend: function(objeto){
			$('#loaderF').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
		},success:function(data){
			$(".outer_div").html(data).fadeIn('slow');
			$('#loaderF').html('');					
		}
	})
}


function AgregarF(Numero){
	var NumeroC =$("#Numero").val();
	$.ajax({
    	type: "POST",
        url: "Componentes/Ajax/Agregar_Campana_FormasPago.php",
        data: "NumeroC="+NumeroC+"&Numero="+Numero,
		beforeSend: function(objeto){
			$("#resultadosF").html("Mensaje: Cargando...");
		},success: function(datos){
			$("#resultadosF").html(datos);
		}
	});
}
function EliminarF(FormaPago){
	var NumeroC =$("#Numero").val();
	$.ajax({
        type: "GET",
        url: "Componentes/Ajax/Agregar_Campana_FormasPago.php",
        data: "FormaPago="+FormaPago+"&NumeroC="+NumeroC,
		beforeSend: function(objeto){
			$("#resultadosF").html("Mensaje: Cargando...");
		},success: function(datos){
			$("#resultadosF").html(datos);
		}
	});
}


		
		

