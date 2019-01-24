$(document).ready(function(){
	load(1);
});

function load(page){
	var q= $("#q").val();
	var Filtro = $("#Filtro").val();
	$("#loader").fadeIn('slow');
	$.ajax({
		url:'Componentes/Ajax/Buscar_Campanas_Usuario.php?action=ajax&page='+page+'&q='+q+'&Filtro='+Filtro,
		beforeSend: function(objeto){
			$('#loader').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
		},success:function(data){
			$(".outer_div").html(data).fadeIn('slow');
			$('#loader').html('');					
		}
	})
}

function agregar (Numero){
	var Nit =$("#Nit").val();
	$.ajax({
    	type: "POST",
        url: "Componentes/Ajax/Agregar_Campana_Usuario.php",
        data: "Numero="+Numero+"&Nit="+Nit,
		beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		},success: function(datos){
			$("#resultados").html(datos);
		}
	});
}
function eliminar (Numero){
	var Nit =$("#Nit").val();
	$.ajax({
        type: "GET",
        url: "Componentes/Ajax/Agregar_Campana_Usuario.php",
        data: "Numero="+Numero+"&Nit="+Nit,
		beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		},success: function(datos){
			$("#resultados").html(datos);
		}
	});
}
function GuardarCampanas(){
	var Usuario = $("#Nit").val();
	$.ajax({
    	type: "POST",
        url: "Componentes/Ajax/Guardar_Campana_Usuario.php",
        data: "Usuario="+Usuario,
		beforeSend: function(objeto){
			$("#resultados_Campana").html("Mensaje: Cargando...");
		},success: function(datos){
			$("#resultados_Campana").html(datos);
		}
	});
	CargarCampanas()
}
function CargarCampanas(){
	var Nit =$("#Nit").val();
	$.ajax({
    	type: "POST",
        url: "Componentes/Ajax/Cargar_Campana_Usuario.php",
        data: "Nit="+Nit,
		beforeSend: function(objeto){
			
		},success: function(datos){
			$("#resultados").html(datos);
		}
	});
}


		
		

