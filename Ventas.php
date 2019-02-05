<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	require_once ("config/db.php");
	require_once ("config/conexion.php");
	
	$Ventas="active";

	$Numero ="";
	$Afiliado ="";
	$Usuario ="";
	$Campana ="";
	$Estado ="";
	$Estado_Campana ="";
	$Fecha ="";
	$Nombre="";
	$Correo="";
		

	if (isset($_GET['Numero'])) {

		$query=mysqli_query($con, "select * from Ventas where Numero ='".$_GET['Numero']."' ");
		$rw_Admin=mysqli_fetch_array($query);
		$Numero =$rw_Admin['Numero'];
		$Afiliado =$rw_Admin['Afiliado'];
		$Usuario =$rw_Admin['Usuario'];
		$Campana =$rw_Admin['Campana'];
		$Estado =$rw_Admin['Estado'];
		$Estado_Campana =$rw_Admin['Estado_Campana'];
		$Fecha =$rw_Admin['Fecha'];
		$query=mysqli_query($con, "select * from Afiliados where Numero ='".$_GET['Numero']."' ");
		$rw_Admin=mysqli_fetch_array($query);


		$EstadoV="Editando";
		$Read= "readonly='readonly'";
	}else{
		$EstadoV="Nuevo";
		$Read= "";
	}



?>
<!doctype html>
<html lang="es">
<head>
	<?php include("head.php"); 	?>

</head>
<body onload="Cargar()">
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
						include("Componentes/Modal/Buscar_Afiliados.php");
					?>
					<form class="form-horizontal" role="form" id="datos_factura">
							<div class="form-group container-fluid">
								<div class="row">
									<div class="col-md-4">
										<label for="Afiliado" class="control-label">Afiliado</label>
								 		<div class="input-group">
								 			<input class="form-control hidden" type="text" id="Afiliado" VALUE="<?php echo $Afiliado;?>"  required readonly>
											<input class="form-control" type="text" id="Nombre" placeholder="Nombre del Afiliado" VALUE="<?php echo $Nombre;?>" required readonly>
											<span class="input-group-btn">
												<button type="button" class="btn btn-default" data-toggle="modal" data-target="#BuscarAfiliado"><span class="glyphicon glyphicon-search"></span></button>
											</span>
										</div>
									</div>
									<div class="col-md-4">
										<label for="mail" class="control-label">Correo</label>
										<input type="text" class="form-control" id="Correo"VALUE="<?php echo $Correo;?>" placeholder="Correo" readonly>
									</div>	
									
									<div class="col-md-4">
										<label for="empresa" class="control-label">Usuario</label>
										<input type="text" class="form-control" id="Usuario_N" placeholder="Usuario" value="<?php echo $_SESSION['Razon_Social'];?>" readonly>
											<input type="text" class="form-control hidden" id="Usuario" placeholder="Usuario" value="<?php echo $_SESSION['Nit'];?>" readonly>
									</div>	
									<div class="col-md-4">
										<label for="tel2" class="control-label">Fecha</label>
										<input type="text" class="form-control" id="fecha" value="<?php echo date("d/m/Y");?>" readonly>
									</div>	
									<div class="col-md-4">
										<label for="email" class="control-label">Campaña</label>
										<?PHP
												$query1=mysqli_query($con, "select Campanas.Nombre,Campanas.Numero from usuario_camp inner join Campanas on usuario_camp.Campana = Campanas.Numero where Usuario ='".$_SESSION['Nit']."' and Campanas.Estado ='Activa' order by Nombre");
												echo' <select class="form-control" id="Campana" name ="Campana" placeholder="Campaña" onchange="CargarEstados()">';
												while($rw_Admin1=mysqli_fetch_array($query1)){
														echo '<option value="'.$rw_Admin1['Numero'].'">'.utf8_encode($rw_Admin1['Nombre']).'</option>';	
												}
												echo '</select>';
											?>	
									</div>
									
									<div class="col-md-4" id="Estados">
										<label for="email" class="control-label">Estadod dCampaña</label>
										
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
	<script type="text/javascript" src="Componentes/JavaScript/Modal_Buscar_Afiliados.js"></script>
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
function CargarEstados(){
			var Campana = $("#Campana").val();
			$.ajax({
				type: "POST",
				url: "Componentes/Ajax/Cargar_Estados_Campana.php",
				data: "Campana="+Campana,
				beforeSend: function(objeto){
				},success: function(datos){
					$("#Estados").html(datos);
				}	
			});
		}

		function Cargar() {
			CargarEstados();
		}


	</script>
</body>

</html>
