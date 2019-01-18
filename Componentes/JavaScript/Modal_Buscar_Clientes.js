		$(document).ready(function(){
			load(1);
		});

		function load(page){
			var Busc_Cliente= $("#Busc_Cliente").val();
			$("#loaderc").fadeIn('slow');
			$.ajax({
				url:'Componentes/Ajax/Modal_Buscar_Clientes.php?action=ajax&page='+page+'&Busc_Cliente='+Busc_Cliente,
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
		document.getElementById('Nit_cliente').value = Nit ;
			document.getElementById('Nombre_cliente').value = Nombre ;

document.getElementById('Correo_cliente').value = Correo ;		

			
		}
		