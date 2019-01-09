
		$(document).ready(function(){
			loadc(1);
		});

		function loadc(page){
			var Busc_Cliente= $("#Busc_Cliente").val();
			$("#loaderc").fadeIn('slow');
			$.ajax({
				url:'./ajax/Clientes.php?action=ajax&page='+page+'&Busc_Cliente='+Busc_Cliente,
				 beforeSend: function(objeto){
				 $('#loaderc').html('<img src="./img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_divc").html(data).fadeIn('slow');
					$('#loaderc').html('');
					
				}
			})
		}

	function Seleccionar(Nit,Nombre,Telefono,Correo){
		document.getElementById('Nit_cliente').value = Nit ;
			document.getElementById('Nombre_cliente').value = Nombre ;
document.getElementById('Telefono_cliente').value = Telefono ;
document.getElementById('Correo_cliente').value = Correo ;			
			
		}
		