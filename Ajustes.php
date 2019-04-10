<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	require_once ("config/db.php");
	require_once ("config/conexion.php");
	
	$Ajustes="active";

	$Numero ="";
	$UsuarioC ="";
	$NombreC ="";
	$UsuarioA ="";
	$NombreA ="";
	$Estado ="";
	$Fecha_Creacion =date("Y-m-d");
	$Valor="";
	$Tipo="";
	$Observacion="";
	if (isset($_GET['Numero'])) {

		$query=mysqli_query($con, "Select Ajustes.Numero,Ajustes.Fecha_Creacion,Ajustes.Valor,Ajustes.
		Tipo,Ajustes.Observacion,Ajustes.Estado,UC.Razon_Social as NombreC,UA.Razon_Social as NombreA,UsuarioC,UsuarioA
		from Ajustes 
		inner join Usuarios as UC on UC.Nit =  Ajustes.UsuarioC
		inner join Usuarios as UA on UA.Nit =  Ajustes.UsuarioA
		where Numero = ".$_GET['Numero']." ");
		$rw_Admin=mysqli_fetch_array($query);
		$Numero =$rw_Admin['Numero'];
		$UsuarioC =$rw_Admin['UsuarioC'];
		$NombreC =$rw_Admin['NombreC'];
		$UsuarioA =$rw_Admin['UsuarioA'];
		$NombreA =$rw_Admin['NombreA'];
		$Estado =$rw_Admin['Estado'];
		$Fecha_Creacion =$rw_Admin['Fecha_Creacion'];
		$Valor=$rw_Admin['Valor'];
		$Tipo=$rw_Admin['Tipo'];
		$Observacion=$rw_Admin['Observacion'];


		



		$EstadoA="Editando";
		$Read= "readonly='readonly'";

		$Numero_Ajuste="Ajuste Numero: ".$Numero;
	}else{
		$UsuarioC=$_SESSION['Nit'];
		$NombreC =$_SESSION['Razon_Social'];
		$EstadoA="Nuevo";
		$Read= "";
		$Numero_Ajuste="Nuevo Ajuste";
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
								<span class="fa fa-cogs"></span> Consultar Ajustes
							</button>
						</div>
						<h4><i class="fas fa-cogs"></i>   <?php echo $Numero_Ajuste;?></h4>
					</div>
					<div class="panel-body">
					<?php 
						include("Componentes/Modal/Buscar_Usuarios.php");
					?>
					<form class="form-horizontal" method="post" id="Guardar_Ventas" name="Guardar_Ventas">
					<input type="text" class="form-control hidden" id="EstadoA" name="EstadoA"  value="<?php echo $EstadoA; ?>" > 
					<input type="text" class="form-control hidden" id="Liquidada" name="Liquidada"  value="<?php echo $Liquidada; ?>" > 
					
							<div class="form-group container-fluid">
								<div class="row">
									<div class="col-md-4">
										<label for="Usuario" class="control-label">Usuario </label>
								 		<div class="input-group">
								 			<input class="form-control hidden" type="text" id="Numero" name="Numero" VALUE="<?php echo $Numero;?>"   readonly>
								 			<input class="form-control hidden" type="text" id="UsuarioA" name="UsuarioA" VALUE="<?php echo $UsuarioA;?>"  required readonly>
											<input class="form-control" type="text" id="NombreA" placeholder="Nombre del Usuario" VALUE="<?php echo $NombreA;?>" required readonly>
											<span class="input-group-btn">
												<button type="button" class="btn btn-default" data-toggle="modal" data-target="#BuscarUsuario"><span class="glyphicon glyphicon-search"></span></button>
											</span>
										</div>
									</div>
									<div class="col-md-4">
										<label for="tel2" class="control-label">Fecha</label>
										<input type="Date" class="form-control" id="Fecha_Creacion" name="Fecha_Creacion" value="<?php echo $Fecha_Creacion?>"readonly>
									</div>		
									
									<div class="col-md-4">
										<label for="empresa" class="control-label">Creador</label>
										<input type="text" class="form-control" id="NombreC" placeholder="NombreC" value="<?php echo $NombreC;?>" readonly>
											<input type="text" class="form-control hidden" id="UsuarioC" name="UsuarioC" placeholder="UsuarioC" value="<?php echo $UsuarioC;?>" readonly>
									</div>	
									
									<div class="col-md-4">
										<label for="email" class="control-label">Tipo</label>
										<?PHP
												echo' <select class="form-control" id="Tipo" name ="Tipo" placeholder="Tipo">';
										
													if($Tipo=='Credito'){
														echo '<option value="Credito" selected>Credito</option>';	
														echo '<option value="Debito" >Debito</option>';	
													}else{
														echo '<option value="Debito" selected>Debito</option>';	
														echo '<option value="Credito" >Credito</option>';
													}
											
												echo '</select>';
											?>	
									</div>
									
									<div class="col-md-4">
									<?php 
										if($EstadoA == "Nuevo"){
											echo '
											<input type="Text" class="form-control hidden" id="Estado" name="Estado" require value="True" >';
										} else {
											echo '
											<input type="Text" class="form-control hidden" id="Estado" name="Estado" require value="'.$Estado.'" >';											
											
										}
									?>
									</div>


									<div class="col-md-4">
										<label for="empresa" class="control-label">Valor</label>
									 <input type="text" class="form-control" id="Valor" Name="Valor" placeholder="Valor" value="<?php echo $Valor;?>" >
									</div>
									<div class="col-md-4">
									
									 <input type="text" class="form-control hidden" id="Porcentaje_Comision" Name="Porcentaje_Comision" placeholder="Porcentaje_Comision" value="<?php echo $Porcentaje_Comision;?>" >
									 <input type="text" class="form-control hidden" id="Portafolio" Name="Portafolio" placeholder="Portafolio" value="<?php echo $Portafolio;?>" >
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
	<script type="text/javascript" src="Componentes/JavaScript/Modal_Buscar_Usuarios.js"></script>
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
	if (document.getElementById('EstadoA').value == 'Editando') {
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
	if($('#Liquidada').val()=='True'){
		alert('La Venta ya fue Liquidada No se Puede Editar');
	} else{
		if($('#Liquidada').val()=='Pendiente'){
			alert('La Venta Tiene Una Solicitud de Pago Pendiente No se Puede Editar');
		}else {
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
		}	
	}
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
