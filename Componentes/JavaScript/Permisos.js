
function ActualizarPermiso(Id) {



var Cadena = Id.split("_");	
var Modulo = Cadena[0];
var Permiso = Cadena[1];
var Usuario = $("#Nit").val();
var Valor = $('#'+Id).prop('checked');

$.ajax({
type: "POST",
	url: "Componentes/Ajax/Actualizar_Permisos.php",
data: "Modulo="+Modulo+"&Permiso="+Permiso+"&Usuario="+Usuario+"&Valor="+Valor,
beforeSend: function(objeto){
	$('#loader_'+Id).html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
},success: function(datos){
	$('#loader_'+Id).html('');
if(Permiso =='Ingreso'){
	$('#Click_'+Modulo).click();
}

		
}
});

}

		
		

