<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	require_once ("config/db.php");
	require_once ("config/conexion.php");
	
	$Ventas="active";

	$Nit ="";
	$Razon_Social ="";
	$Tipo ="";
	$Tel_C ="";
	$Direccion ="";
	$Correo_N ="";
	$Cel_C ="";
	$Correo_C ="";
	$Rep_Legal ="";
	$CC ="";
	$Nombre_R1 ="";
	$Tel_R1 ="";
	$Nombre_R2 ="";
	$Tel_R2 ="";			

	if (isset($_GET['Nit'])) {

		$query=mysqli_query($con, "select Nit,Razon_Social,Tipo,Tel_C,Direccion,Correo_N,Cel_C,Correo_C,Rep_Legal,CC,Nombre_R1,Tel_R1,Nombre_R2,Tel_R2 from Clientes where Nit ='".$_GET['Nit']."' ");
		$rw_Admin=mysqli_fetch_array($query);
		$Nit =$rw_Admin['Nit'];
		$Razon_Social =$rw_Admin['Razon_Social'];
		$Tipo =$rw_Admin['Tipo'];
		$Tel_C =$rw_Admin['Tel_C'];
		$Direccion =$rw_Admin['Direccion'];
		$Correo_N =$rw_Admin['Correo_N'];
		$Cel_C =$rw_Admin['Cel_C'];
		$Correo_C =$rw_Admin['Correo_C'];
		$Rep_Legal =$rw_Admin['Rep_Legal'];
		$CC =$rw_Admin['CC'];
		$Nombre_R1 =$rw_Admin['Nombre_R1'];
		$Tel_R1 =$rw_Admin['Tel_R1'];
		$Nombre_R2 =$rw_Admin['Nombre_R2'];
		$Tel_R2 =$rw_Admin['Tel_R2'];

		$Estado="Editando";
		$Read= "readonly='readonly'";
	}else
	{
		$Estado="Nuevo";
		$Read= "";
	}



?>
<!doctype html>
<html lang="es">
<head>
	<?php include("head.php"); 	?>

</head>
<body>
	<div id="wrapper">
		<?php
	include("Menu.php");
	?>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN CONTENT -->
		<div id="main-content">
			<div class="container-fluid">
				<div class="panel panel-default">
					<div class="panel-heading">
		    		<div class="btn-group pull-right">
							<button type="button" class="btn btn-default" id="Consultar">
								<span class="glyphicon glyphicon-user"></span> Consultar Ventas
							</button>
						</div>
						<h4><i class="fas fa-user-tie"></i>   Ventas</h4>
					</div>
					<div class="panel-body">
					<?php 
						include("Componentes/Modal/Buscar_Clientes.php");
					?>
					<form class="form-horizontal" role="form" id="datos_factura">
							<div class="form-group container-fluid">
								<div class="row">
									<div class="col-md-4">
										<label for="nombre_cliente" class="control-label">Afiliado</label>
								 		<div class="input-group">
								 			<input class="form-control hidden" type="text" id="Nit_cliente"  required readonly>
											<input class="form-control" type="text" id="Nombre_cliente" placeholder="Nombre del Afiliado" required readonly>
											<span class="input-group-btn">
												<button type="button" class="btn btn-default" data-toggle="modal" data-target="#BuscarCliente"><span class="glyphicon glyphicon-search"></span></button>
											</span>
										</div>
									</div>
									<div class="col-md-4">
										<label for="mail" class="control-label">Correo</label>
										<input type="text" class="form-control" id="Correo_cliente" placeholder="Correo" readonly>
									</div>	
								
									<div class="col-md-4">
										<label for="empresa" class="control-label">Usuario</label>
											<input type="text" class="form-control" id="Usuario" placeholder="Usuario" value="<?php echo $_SESSION['Usuario'];?>" readonly>
									</div>	
									<div class="col-md-4">
										<label for="tel2" class="control-label">Fecha</label>
										<input type="text" class="form-control" id="fecha" value="<?php echo date("d/m/Y");?>" readonly>
									</div>	
									<div class="col-md-4">
										<label for="email" class="col-md-1 control-label">Estado</label>
										<select class='form-control' id="condiciones">
											<option value="1">Pendiente</option>
											<option value="2">Ok</option>
											<option value="3">Aprobado</option>
											<option value="4">Rechazado</option>
											<option value="5">En Proceso</option>
											<option value="6">Pagado</option>
											<option value="7">Por Pagar</option>
											<option value="8">Para Descontar</option>
										</select>
									</div>
									<div class="col-md-4">
										<label for="email" class="col-md-1 control-label">Campaña</label>
										<select class='form-control' id="condiciones">
											<option value="1">Seleccione...</option>
										</select>
									</div>
									<div class="col-md-12">
  										<label for="Observaciones">Observaciones:</label>
  										<textarea class="form-control" rows="5" id="Observaciones"></textarea>
									</div>										
								</div>
								<br>
								
							</div>	
						
					<div id="resultados_ajax2"></div>
					<div class="modal-footer ">
						<button type="button" class="btn btn-default" id="Cancelar">Cancelar</button>
						<button type="submit" class="btn btn-primary">Guardar datos</button>
		  		</div>				
				</form>	
					</div>
				</div>
							
		  </div>
			
		</div>
	</div>
	

	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/metisMenu/metisMenu.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
	<script type="text/javascript" src="Componentes/JavaScript/Modal_Buscar_Clientes.js"></script>
	<script src="assets/scripts/common.js"></script>
	<script>

$( "#Cancelar" ).click(function( event ) {
	if (document.getElementById('Estado').value == 'Editando') {
		location.reload(true);
	}
	else{
		location.href='Consultar-Ventas.php';
	}
})
$( "#Consultar" ).click(function( event ) {
	
		location.href='Consultar-Ventas.php';

})


	$( "#guardar_cliente" ).submit(function( event ) {
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "Componentes/Ajax/Guardar_Cliente.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax2").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax2").html(datos);
			load(1);
		  }
	});
  event.preventDefault();
})

	</script>
</body>

</html>
