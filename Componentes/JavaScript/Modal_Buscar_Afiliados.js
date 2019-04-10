		$(document).ready(function(){
			load(1);
		});

		function load(page){
			var Busc_Afiliado= $("#Busc_Afiliado").val();
			var Filtro= $("#Filtro").val();

			$("#loaderc").fadeIn('slow');
			$.ajax({
				url:'Componentes/Ajax/Modal_Buscar_Afiliados.php?action=ajax&page='+page+'&Busc_Afiliado='+Busc_Afiliado+'&Filtro='+Filtro,
				 beforeSend: function(objeto){
				 $('#loaderc').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_divc").html(data).fadeIn('slow');
					$('#loaderc').html('');
					
				}
			})
		}

	function Seleccionar(Nit,Nombre,Correo){
		document.getElementById('Afiliado').value = Nit ;
		document.getElementById('Nombre').value = Nombre ;
		document.getElementById('Correo').value = Correo ;			
		}
		function NuevoAfiliado(){
			
			window.open("Afiliados.php", "Diseño Web", "");
		}