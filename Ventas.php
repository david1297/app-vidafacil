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
	$Estado_Campana ="";
	$Fecha =date("Y-m-d");
	$Nombre="";
	$Correo="";
	$Transportadora="";
	$Seguimiento="";
	$Observaciones_Cargadas="";
	$NumeroNip="";
	$DataCreditoTipo="";
	$Servicio="";
	$Canal="";
	$NumeroCelular="";
	$OperadorVenta="";
	$OperadorDonante="";
	$NumeroSim="";
	$Valor="";
	
	

	if (isset($_GET['Numero'])) {

		$query=mysqli_query($con, "select Ventas.Numero,Ventas.Afiliado,Ventas.Usuario,Ventas.Campana,
		Ventas.Estado_Campana,Ventas.Fecha,Ventas.Transportadora,Ventas.Seguimiento,Ventas.NumeroNip,Ventas.DataCreditoTipo,
		Ventas.Servicio,Ventas.Canal,Ventas.NumeroCelular,Ventas.OperadorVenta,Ventas.OperadorDonante,Ventas.NumeroSim,
		Ventas.Valor,Ventas.Porcentaje_Comision,usuarios.Nit,usuarios.Razon_Social
			from Ventas inner join Usuarios on Ventas.Usuario=usuarios.Nit  where Numero ='".$_GET['Numero']."' ");
		$rw_Admin=mysqli_fetch_array($query);
		$Numero =$rw_Admin['Numero'];
		$Afiliado =$rw_Admin['Afiliado'];
		$Usuario =$rw_Admin['Usuario'];
		$Campana =$rw_Admin['Campana'];
		$Estado_Campana =$rw_Admin['Estado_Campana'];
		$Fecha =$rw_Admin['Fecha'];
		$Transportadora=$rw_Admin['Transportadora'];
		$Seguimiento=$rw_Admin['Seguimiento'];
		$NumeroNip=$rw_Admin['NumeroNip'];
		$DataCreditoTipo=$rw_Admin['DataCreditoTipo'];
		$Servicio=$rw_Admin['Servicio'];
		$Canal=$rw_Admin['Canal'];
		$NumeroCelular=$rw_Admin['NumeroCelular'];
		$OperadorVenta=$rw_Admin['OperadorVenta'];
		$OperadorDonante=$rw_Admin['OperadorDonante'];
		$NumeroSim=$rw_Admin['NumeroSim'];
		$Valor=$rw_Admin['Valor'];
		$Porcentaje_Comision=$rw_Admin['Porcentaje_Comision']; 
		$Nit=$rw_Admin['Nit'];
		$Razon_Social =$rw_Admin['Razon_Social'];


		$query=mysqli_query($con, "select * from Afiliados where Identificacion ='".$Afiliado."' ");
		$rw_Admin=mysqli_fetch_array($query);
		$Nombre =$rw_Admin['Primer_Nombre'].' '.$rw_Admin['Primer_Apellido'];
		$Correo=$rw_Admin['Correo'];
		



		$EstadoV="Editando";
		$Read= "readonly='readonly'";

		$Numero_venta="Venta Numero: ".$Numero;

		$sql="SELECT * FROM observaciones_ventas inner join Usuarios on Usuarios.Nit=observaciones_ventas.Usuario WHERE VENTA=".$Numero."";

		$query = mysqli_query($con, $sql);
		while ($row=mysqli_fetch_array($query)){
			$Observaciones_Cargadas.=
				
			'<br>
			<div class="card border-secondary mb-3">
  				<div class="card-header">'.$row['Razon_Social'].'<em>&nbsp;&nbsp;&nbsp;&nbsp;('.$row['Fecha'].')</em></div>
  				<div class="card-body text-secondary">
    				<p class="card-text">'.$row['Observacion'].'</p>
  				</div>
			</div>
		';



			
		}

	}else{
		$Nit=$_SESSION['Nit'];
		$Razon_Social =$_SESSION['Razon_Social'];
		$Porcentaje_Comision=$_SESSION['Porcentaje'];
		$EstadoV="Nuevo";
		$Read= "";
		$Numero_venta="Nueva Venta";
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
								<span class="fa fa-shopping-cart"></span> Consultar Ventas
							</button>
						</div>
						<h4><i class="fas fa-shopping-cart"></i>   <?php echo $Numero_venta;?></h4>
					</div>
					<div class="panel-body">
					<?php 
						include("Componentes/Modal/Buscar_Afiliados.php");
					?>
					<form class="form-horizontal" method="post" id="Guardar_Ventas" name="Guardar_Ventas">
					<input type="text" class="form-control hidden" id="EstadoV" name="EstadoV"  value="<?php echo $EstadoV; ?>" > 

							<div class="form-group container-fluid">
								<div class="row">
									<div class="col-md-4">
										<label for="Afiliado" class="control-label">Afiliado</label>
								 		<div class="input-group">
								 			<input class="form-control hidden" type="text" id="Numero" name="Numero" VALUE="<?php echo $Numero;?>"   readonly>
								 			<input class="form-control hidden" type="text" id="Afiliado" name="Afiliado" VALUE="<?php echo $Afiliado;?>"  required readonly>
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
										<input type="text" class="form-control" id="Usuario_N" placeholder="Usuario" value="<?php echo $Razon_Social;?>" readonly>
											<input type="text" class="form-control hidden" id="Usuario" name="Usuario" placeholder="Usuario" value="<?php echo $Nit;?>" readonly>
									</div>	
									<div class="col-md-4">
										<label for="tel2" class="control-label">Fecha</label>
										<input type="Date" class="form-control" id="fecha" name="fecha" value="<?php echo $Fecha?>"readonly>
									</div>	
									<div class="col-md-4">
										<label for="email" class="control-label">Campaña</label>
										<?PHP
												$query1=mysqli_query($con, "select Campanas.Nombre,Campanas.Numero from usuario_camp inner join Campanas on usuario_camp.Campana = Campanas.Numero where Usuario ='".$_SESSION['Nit']."' and Campanas.Estado ='Activa' order by Nombre");
												echo' <select class="form-control" id="Campana" name ="Campana" placeholder="Campaña" onchange="CargarEstados()">';
												while($rw_Admin1=mysqli_fetch_array($query1)){
													if($Campana==$rw_Admin1['Numero']){
														echo '<option value="'.$rw_Admin1['Numero'].'" selected>'.utf8_encode($rw_Admin1['Nombre']).'</option>';	

													}else{
														echo '<option value="'.$rw_Admin1['Numero'].'">'.utf8_encode($rw_Admin1['Nombre']).'</option>';	

													}
												}
												echo '</select>';
											?>	
									</div>
									<input type="Text" class="form-control hidden" id="Est_camp" name="Est_camp" require value="<?php echo $Estado_Campana?>" readonly="readonly">
									<input type="Text" class="form-control hidden" id="Seg_camp" name="Seg_camp" require value="<?php echo $Seguimiento?>" readonly="readonly">
									<input type="Text" class="form-control hidden" id="Tran_camp" name="Tran_camp" require value="<?php echo $Transportadora?>" readonly="readonly">
									
									<div  id="Estados">
										
										
									</div>
									<div class="col-md-4">
										<label for="empresa" class="control-label">Valor</label>
									 <input type="text" class="form-control" id="Valor" Name="Valor" placeholder="Valor" value="<?php echo $Valor;?>" >
									</div>
									<div class="col-md-4">
										
									 <input type="text" class="form-control hidden" id="Porcentaje_Comision" Name="Porcentaje_Comision" placeholder="Porcentaje_Comision" value="<?php echo $Porcentaje_Comision;?>" >
									</div>
									
									<div  class="" id="Form_Telefonica">
										<div class="col-sm-12">
											<hr class="style1">
										</div>
										<div class="col-md-4">
											<label for="NumeroNip" class="control-label">Numero de NIP</label>
											<input type="text" class="form-control" name="NumeroNip" id="NumeroNip"VALUE="<?php echo $NumeroNip;?>" placeholder="Numero de NIP" >
										</div>
										<div class="col-md-4">
											<label for="DataCreditoTipo" class="control-label">Data Crédito Tipo</label>
											<input type="text" class="form-control" name="DataCreditoTipo" id="DataCreditoTipo"VALUE="<?php echo $DataCreditoTipo;?>" placeholder="Data Crédito Tipo" >
										</div>
										<div class="col-md-4">
											<label for="Servicio" class="control-label">Servicio Ofrecido </label>
											<input type="text" class="form-control" name="Servicio" id="Servicio"VALUE="<?php echo $Servicio;?>" placeholder="Servicio Ofrecido " >
										</div>
										<div class="col-md-4">
											<label for="Servicio" class="control-label">Canal </label>
											<?php
												echo '	
													<select class="form-control" id="Canal" name ="Canal" placeholder="Canal"  >';
													if($Canal == 'Hogar'){
														echo '<option value="Hogar">Hogar</option>';
														echo '<option value="Movil">Movil</option>';
													}else{
														echo '<option value="Movil">Movil</option>';
														echo '<option value="Hogar">Hogar</option>';
													}
													echo '</select>';
											?>
										</div>
										<div class="col-md-4">
											<label for="NumeroCelular" class="control-label">Numero Celular </label>
											<input type="text" class="form-control" name="NumeroCelular" id="NumeroCelular"VALUE="<?php echo $NumeroCelular;?>" placeholder="Numero Celular " >
										</div>		
										<div class="col-md-4">
											<label for="OperadorVenta" class="control-label">Operador Venta </label>
											<?PHP
												$query=mysqli_query($con, "select * from administracion");
												echo' <select class="form-control" id="OperadorVenta" name ="OperadorVenta" placeholder="OperadorVenta">';
												$rw_Admin=mysqli_fetch_array($query);
												$tuArray = explode("\r\n", $rw_Admin['Operador_Venta']);
												foreach($tuArray as  $indice => $palabra){
													if ($OperadorVenta==$palabra){
														echo '<option value="'.$palabra.'" selected>'.$palabra.'</option>';	
											
													} else{
														echo '<option value="'.$palabra.'" >'.$palabra.'</option>';	
											
													}
												}  	
												echo '</select>';
											?>	
										</div>
										<div class="col-md-4">
											<label for="OperadorDonante" class="control-label">Operador Donante </label>
											<?PHP
												echo' <select class="form-control" id="OperadorDonante" name ="OperadorDonante" placeholder="OperadorDonante">';
											
												$tuArray = explode("\r\n", $rw_Admin['Operador_Donante']);
												foreach($tuArray as  $indice => $palabra){
													if ($OperadorDonante==$palabra){
														echo '<option value="'.$palabra.'" selected>'.$palabra.'</option>';	
											
													} else{
														echo '<option value="'.$palabra.'" >'.$palabra.'</option>';	
											
													}
												}  	
												echo '</select>';
											?>	
										</div>
										<div class="col-md-4">
											<label for="NumeroSim" class="control-label">Número de Sim Card </label>
											<input type="text" class="form-control" name="NumeroSim" id="NumeroSim"VALUE="<?php echo $NumeroSim;?>" placeholder="Número de Sim Card " >
										</div>
										<div class="col-sm-12">
											<hr class="style1">	
										</div>
									</div>
											
											
										
									</div>
									<div class="col-md-12">
  										<label for="Observaciones">Observaciones:</label>
  										<textarea class="form-control" rows="5" id="Observaciones" name="Observaciones"></textarea>
									</div>	
									<div class="col-md-12"><br>
									<?php echo $Observaciones_Cargadas ?>
  										
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
	$("#Valor").on({
    "focus": function (event) {
        $(event.target).select();
    },
    "keyup": function (event) {
        $(event.target).val(function (index, value ) {
            return value.replace(/\D/g, "")
                        
                        .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
        });
    }
});


$( "#Cancelar" ).click(function( event ) {
	if (document.getElementById('EstadoV').value == 'Editando') {
		location.reload(true);
	}
	else{
		location.href='Consultar-Ventas.php';
	}
})
$( "#Consultar" ).click(function( event ) {
	
		location.href='Consultar-Ventas.php';

})
$( "#Guardar_Ventas" ).submit(function( event ) {
	var parametros = $(this).serialize();
	$.ajax({
		type: "POST",
		url: "Componentes/Ajax/Guardar_Ventas.php",
		data: parametros,
		beforeSend: function(objeto){
			$("#resultados_ajax2").html("Mensaje: Cargando...");
		},
		success: function(datos){
			$("#resultados_ajax2").html(datos);
		}
	});
	event.preventDefault();
})

function CargarEstados(){
			var Campana = $("#Campana").val();
			var Est_camp = $("#Est_camp").val();
			var Seg_camp = $("#Seg_camp").val();
			var Tran_camp = $("#Tran_camp").val();
			$.ajax({
				type: "POST",
				url: "Componentes/Ajax/Cargar_Estados_Campana.php",
				data: "Campana="+Campana+"&Est_camp="+Est_camp+"&Seg_camp="+Seg_camp+"&Tran_camp="+Tran_camp,
				beforeSend: function(objeto){
				},success: function(datos){
					$("#Estados").html(datos);
					if(document.getElementById('Telefonica').value=='True'){
						$('#Form_Telefonica').removeClass("hidden");
					}else{
						$('#Form_Telefonica').addClass("hidden");
					}
				}	
			});
		

			

		}

		function Cargar() {
			CargarEstados();
			$("#Valor").keyup();
		}


	</script>
</body>

</html>
