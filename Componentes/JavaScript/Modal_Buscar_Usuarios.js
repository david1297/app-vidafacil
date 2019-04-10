		$(document).ready(function(){
			load(1);
		});

		function load(page){
			var Busc_Usuario= $("#Busc_Usuario").val();
			var Filtro= $("#Filtro").val();
		
			$("#loaderc").fadeIn('slow');
			$.ajax({
				url:'Componentes/Ajax/Modal_Buscar_Usuarios.php?action=ajax&page='+page+'&Busc_Usuario='+Busc_Usuario+'&Filtro='+Filtro,
				 beforeSend: function(objeto){
				 $('#loaderc').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_divc").html(data).fadeIn('slow');
					$('#loaderc').html('');
					
				}
			})
		}

	function Seleccionar(Nit,Nombre){
		document.getElementById('UsuarioA').value = Nit ;
		document.getElementById('NombreA').value = Nombre ;
		}
		