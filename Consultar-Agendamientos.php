<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	require_once ("config/db.php");
	require_once ("config/conexion.php");
	
	$Clientes="active";	
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
						<h4><span class="fas fa-calendar-alt"></span> &nbsp;Ver Agendamientos</h4>
							
						
						
					</div>
					<div class="panel-body">
					<div class="col-md-12">
						<span id="loader1"></span>
					</div>
					<div  id="Barra">
					</div>
					
					<div id="DAfiliados">
						<form class="form-horizontal" role="form" id="datos_cotizacion">
							<div class="form-group row">
								<div class="col-md-2">		
									<select class='form-control' id="Filtro" name ="Filtro" placeholder="Filtro" onchange='load(1);'>
										<option value="Identificacion">Identificacion</option>
										<option value="Nombre">Nombre o Apellido</option>
										<option value="Correo">Correo</option>
										<option value="Telefono">Telefono</option>
									</select>
								</div>		
								<div class="col-md-2">		
									<input type="Date" class="form-control" id="fechaIni" name="fechaIni" value="<?php echo date("Y-m-d",strtotime("-1 month"))?>" onchange='load(1);'>
								</div>
								<div class="col-md-2">		
									<input type="Date" class="form-control" id="fechaFin" name="fechaFin" value="<?php echo date("Y-m-d",strtotime("+1 week"))?>" onchange='load(1);'>
								</div>
								<div class="col-md-2">
									<input type="text" class="form-control" id="q" autocomplete="off" placeholder="Escriba Su Criterio de Busqueda" onkeyup='load(1);'>
								</div>
								<div class="col-md-2">		
									<select class='form-control' id="EFiltro" name ="EFiltro" placeholder="Filtro" onchange='load(1);'>
										<?php
										$query1=mysqli_query($con, "SELECT GESTION.Nombre,GESTION.Codigo FROM GESTION ");
										echo  '<option value="Todos">Todos</option>';
										while($rw_Admin1=mysqli_fetch_array($query1)){
											echo  '<option value="'.$rw_Admin1[1].'">'.$rw_Admin1[0].'</option>';
										}
									?>
										
									</select>
								</div>
								
								<div class="col-md-2">		
									<?php
									$query1=mysqli_query($con, "SELECT Nit,Razon_Social FROM USUARIOS where estado='Activo';");
									echo' <select class="form-control" id="FComercio" name ="FComercio" placeholder="Estado" onchange="load(1);">';
									echo  '<option value="Todos">Todos</option>';
									while($rw_Admin1=mysqli_fetch_array($query1)){
										echo  '<option value="'.$rw_Admin1['Nit'].'">'.$rw_Admin1['Razon_Social'].'</option>';
									}
									echo '</select>';
									?>
								</div>
								<div class="col-md-2">
								<span id="loader"></span>
								</div>
							</div>
						</form>
						<div id="ins"></div>
						<div id="resultados"></div>
						<div class='outer_div'></div>
					</div>				
					</div>
				</div>	
			</div>
		</div>
	</div>
	</div>
	<div class="modal  " id="GenerarAgendamiento" tabindex="-1" role="dialog" aria-labelledby="GenerarAgendamiento">
		<div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h2>Editar Agendamiento</h2>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" method="post"  id="GuardarAgendamiento" name="GuardarAgendamiento">
					<div id="VerAgandamiento"></div>
					<div id="RAgendamiento"></div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Guardar datos</button>
					<button type="button" class="btn btn-default" data-dismiss="modal" >Cerrar</button>
					</form>
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

	<script>
	$(document).ready(function(){
	load(1);
});

function load(page){
	var q= $("#q").val();
			var Filtro = $("#Filtro").val();
			var EFiltro = $("#EFiltro").val();
			var FComercio = $("#FComercio").val();
			var fechaIni = $("#fechaIni").val();
			var fechaFin = $("#fechaFin").val();
	$("#loader").fadeIn('slow');
	$.ajax({
		//
		url:'Componentes/Ajax/Cargar_Agendamientos.php?H=Yes&q='+q+'&Filtro='+Filtro+'&EFiltro='+EFiltro+'&FComercio='+FComercio+'&fechaIni='+fechaIni+'&fechaFin='+fechaFin,
		 beforeSend: function(objeto){
			$('#loader').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
	  },
		success:function(data){
			$(".outer_div").html(data).fadeIn('slow');
			$('#loader').html('');
			
		}
	})
}
	





function VerGestion(Id){
	$.ajax({
		type: "POST",
		url: "Componentes/Ajax/Ver_Agendamiento.php",
		data: "Id="+Id,
		beforeSend: function(objeto){
		},success: function(datos){
			$("#VerAgandamiento").html(datos);
			$('#GenerarAgendamiento').modal('show'); 
			$('#RAgendamiento').html(''); 
		}	
	});	
}

$( "#GuardarAgendamiento" ).submit(function( event ) { 
  var parametros = $(this).serialize();
	  $.ajax({
		url: "Componentes/Ajax/Guardar_Agendamiento.php",
		   type: "POST",
		   data: parametros,
			  beforeSend: function(objeto){ 
			   },
		   success: function(datos){ 
			$('#RAgendamiento').html(datos); 
			load(1);
		
		 }	 
   });
   event.preventDefault();
});


	</script>
  </body>
</html>