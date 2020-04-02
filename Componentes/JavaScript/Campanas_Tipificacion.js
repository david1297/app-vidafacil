$(document).ready(function(){
	LoadTr(1);
});

function LoadTr(page){
	var q= $("#qTr").val();
	$("#loaderTr").fadeIn('slow');
	$.ajax({
		url:'Componentes/Ajax/Buscar_Campanas_Tipificacion.php?action=ajax&page='+page+'&q='+q,
		beforeSend: function(objeto){
			$('#loaderTr').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
		},success:function(data){
			$(".outer_div").html(data).fadeIn('slow');
			$('#loaderTr').html('');					
		}
	})
}


function AgregarTr(Numero){
	var NumeroC =$("#Numero").val();
	$.ajax({
    	type: "POST",
        url: "Componentes/Ajax/Agregar_Campana_Tipificacion.php",
        data: "NumeroC="+NumeroC+"&Numero="+Numero,
		beforeSend: function(objeto){
			$("#resultadosTr").html("Mensaje: Cargando...");
		},success: function(datos){
			$("#resultadosTr").html(datos);
		}
	});
}

function EliminarTr(Tipificacion){
	var NumeroC =$("#Numero").val();
	$.ajax({
        type: "GET",
        url: "Componentes/Ajax/Agregar_Campana_Tipificacion.php",
        data: "Tipificacion="+Tipificacion+"&NumeroC="+NumeroC,
		beforeSend: function(objeto){
			$("#resultadosTr").html("Mensaje: Cargando...");
		},success: function(datos){
			$("#resultadosTr").html(datos);
		}
	});
}


		
		

