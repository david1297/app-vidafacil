<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	require_once ("config/db.php");
	require_once ("config/conexion.php");
	
	$Transferencias="active";
	
?>
<!doctype html>
<html lang="es">
<head>
	<?php include("head.php");?>
</head>
<body>
<div id="Menus">
	<div id="wrapper">
		<?php
			include("Menu.php");
		?>
		<div id="main-content">
			<div class="container-fluid">
				<div class="panel panel-default">
					<div class="panel-heading">
		    			<div class="btn-group pull-right">
						
						</div>
						<h4><i class='glyphicon glyphicon-search'></i>Transferencias</h4>
						
					</div>
					<div class="panel-body">
						<form class="form-horizontal" role="form" id="datos_cotizacion">
							<div class="form-group row">
							
								<div class="col-md-2">		
									<input type="Date" class="form-control" id="fechaIni" name="fechaIni" value="<?php echo date("Y-m-d",strtotime("-1 month"))?>" onchange='load(1);'>
								</div>
								<div class="col-md-2">		
									<input type="Date" class="form-control" id="fechaFin" name="fechaFin" value="<?php echo date("Y-m-d")?>" onchange='load(1);'>
								</div>
								<div class="col-md-4">
									<input type="text" class="form-control" id="q" autocomplete="off" placeholder="Numero de Transferencia" onkeyup='load(1);'>
								</div>
							
								<div class="col-md-2">		
									<select class='form-control ' id="EFiltro" name ="EFiltro" placeholder="EFiltro" onchange='CambioEFiltro();'>
									<option value="Todos">Todos</option>
										<option value="Usuario">Usuario</option>
										<option value="Estado">Estado</option>
									</select>
								</div>
								<div class="col-md-2">		
									<select class='form-control' id="VFiltro" name ="VFiltro" placeholder="Filtro" onchange='load(1);'>
										<option value="Todos">Todos</option>
									</select>
								</div>
								<div class="col-md-2">
								<span id="loader"></span>
								</div>
							</div>
						</form>
						<div id="resultados"></div><!-- Carga los datos ajax -->
						<div class='outer_div'></div><!-- Carga los datos ajax -->
					</div>
				</div>	
			</div>
			
		</div>
	</div>
	</div>
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/metisMenu/metisMenu.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
	<script src="assets/scripts/common.js"></script>
	<script type="text/javascript" src="Componentes/JavaScript/Transferencias.js"></script>
	<script>
	function CambioEFiltro(){
		var Filtro =  $("#EFiltro").val();
		$("#loader").fadeIn('slow');
			$.ajax({
				url:'Componentes/Ajax/Filtros_Transferencias.php?Filtro='+Filtro,
				 beforeSend: function(objeto){
					$('#loader').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$('#loader').html('');
					$("#VFiltro").html(data);
					load(1);
				}
			})
	}
	</script>
  </body>
</html>