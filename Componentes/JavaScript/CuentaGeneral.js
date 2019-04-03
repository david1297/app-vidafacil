		$(document).ready(function(){
			load(1);
			load1();	
		});

		function load(page){
			var q= $("#q").val();
			var Filtro = $("#Filtro").val();
			var EFiltro = $("#EFiltro").val();
			var VFiltro = $("#VFiltro").val();
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'Componentes/Ajax/Buscar_CuentaGeneral.php?action=ajax&page='+page+'&q='+q+'&Filtro='+Filtro+'&EFiltro='+EFiltro+'&VFiltro='+VFiltro,
				 beforeSend: function(objeto){
					$('#loader').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');
					
					
				}
			})
		}
		function load1(){
			var q= $("#q").val();
			var Filtro = $("#Filtro").val();
			var EFiltro = $("#EFiltro").val();
			var VFiltro = $("#VFiltro").val();
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'Componentes/Ajax/Buscar_CuentaGeneral_Cart.php?action=ajax&q='+q+'&Filtro='+Filtro+'&EFiltro='+EFiltro+'&VFiltro='+VFiltro,
				 beforeSend: function(objeto){
					$('#loader').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".Cuenta_Cart").html(data).fadeIn('slow');
					$('#loader').html('');
					
					
				}
			})
		}
		function obtener_datos(Nit){
			location.href='Consultar-Cuenta.php?Nit='+Nit;
		}
	
		
		

