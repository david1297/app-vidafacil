$(document).ready(function(){
	load(1);
});

function load(page){
	var q= $("#q").val();
			var Filtro = $("#Filtro").val();
			var EFiltro = $("#EFiltro").val();
			var VFiltro = $("#VFiltro").val();
			var FComercio = $("#FComercio").val();
	$("#loader").fadeIn('slow');
	$.ajax({
		url:'Componentes/Ajax/Buscar_Afiliados.php?action=ajax&page='+page+'&q='+q+'&Filtro='+Filtro+'&EFiltro='+EFiltro+'&VFiltro='+VFiltro+'&FComercio='+FComercio,
		 beforeSend: function(objeto){
			$('#loader').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
	  },
		success:function(data){
			$(".outer_div").html(data).fadeIn('slow');
			$('#loader').html('');
			
		}
	})
}
function NuevoAfiliado(){
location.href='Afiliados.php';
}
function obtener_datos(Identificacion){
location.href='Afiliados.php?Identificacion='+Identificacion;
}


		

