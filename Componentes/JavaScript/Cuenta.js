		$(document).ready(function(){
			load(1);
		});
		function CargarComisiones (Numero){
			if(Numero==0){
				$("#outer_divc").html('');
			}
			var Nit =$("#Nit").val();
			var q= $("#q").val();
			var Filtro = $("#Filtro").val();
			var Estado = $("#FEstado").val();
			var fechaIni = $("#fechaIni").val();
			var fechaFin = $("#fechaFin").val();
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'Componentes/Ajax/Buscar_ComisionesPendientes.php?action=ajax&q='+q+'&Filtro='+Filtro+'&Estado='+Estado+'&fechaIni='+fechaIni+'&fechaFin='+fechaFin+'&Nit='+Nit,
				 beforeSend: function(objeto){
				 $('#resultados_ajax2').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$('#resultados_ajax2').html(data);
					
				}
			})
		}
		function load(page){
			var q= $("#q").val();
			var Nit =$("#Nit").val();
		
			
			var Estado = $("#FEstado").val();
			var fechaIni = $("#fechaIni").val();
			var fechaFin = $("#fechaFin").val();
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'Componentes/Ajax/Buscar_Cuenta.php?action=ajax&page='+page+'&q='+q+'&Estado='+Estado+'&fechaIni='+fechaIni+'&fechaFin='+fechaFin+'&Nit='+Nit,
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".ResComisiones").html(data).fadeIn('slow');
					$('#loader').html('');
					
				}
			})
		}
		function GenerarSolicitud (Numero){
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





	
		
		

