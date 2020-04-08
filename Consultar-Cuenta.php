<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	require_once ("config/db.php");
	require_once ("config/conexion.php");
	
	$Cuenta="active";
	$Nit = $_GET['Nit'];
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
				<div class="card-deck">	
					<?php
						$query1=mysqli_query($con, "SELECT CFondo,F1,F2,F3,F4 FROM USUARIOS Where Nit='".$Nit."' ");			
						$rw_Admin1=mysqli_fetch_array($query1);
						$CFondo=$rw_Admin1[0];
						$F1=$rw_Admin1[1];
						$F2=$rw_Admin1[2];
						$F3=$rw_Admin1[3];
						$F4=$rw_Admin1[4];

						if($CFondo==3){
							$Dias = 90;
							$Text= 'Trimestre';
						}else{
							$Dias= 180;
							$Text= 'Semestre';

						}
						
						$FF1 = strtotime($F1."+ ".$Dias." days");
						$FF2 = strtotime($F2."+ ".$Dias." days");
						$FF3 = strtotime($F3."+ ".$Dias." days");
						$FF4 = strtotime($F4."+ ".$Dias." days");	

						$FR1 = strtotime($F1."+ ".($Dias*2)." days");
						$FR2 = strtotime($F2."+ ".($Dias*2)." days");
						$FR3 = strtotime($F3."+ ".($Dias*2)." days");
						$FR4 = strtotime($F4."+ ".($Dias*2)." days");
						$Hoy = date('d/m/Y');
					?>
					<div class="card border-success mb-3" >
  						<div class="card-header bg-transparent border-success text-success text-center">
					  		<?php echo $Text;?> 1<br>
					  		<?php echo date('d/m/Y',strtotime($F1)); ;?> - <?php echo date('d/m/Y',$FF1);?>
						</div>
  						<div class="card-body text-success">
							<p class="card-text text-center">
								<?php
								$sql="SELECT sum((Credito-Debito)) as valor FROM FONDO_PREVENCION 
								Where Usuario='".$Nit."' and (Estado= 'Pendiente') and (Fecha >= '".$F1."' and Fecha <'".date("Y-m-d",$FF1)."');";
								$query1=mysqli_query($con, $sql);			
								
								$rw_Admin1=mysqli_fetch_array($query1);
								echo '$ '.number_format($rw_Admin1[0]);
								?>
							</p>
						</div>
						<div class="card-footer bg-transparent border-success text-center text-success">
							<?php 
								if(strtotime($Hoy) > $FR1){
									?>
									<button class="btn btn-success btn-block" onclick="RetirarFondo('F1')" >Retirar</button>
									<?php		
								}else{
									echo 'Fecha de Retiro: '.date('d/m/Y',$FR1);
								}
								?>
						</div>
					</div>
					<div class="card border-warning mb-3" >
  						<div class="card-header bg-transparent border-warning text-warning text-center">
					  		<?php echo $Text;?> 2<br>
					  		<?php echo date('d/m/Y',strtotime($F2)); ;?> - <?php echo date('d/m/Y',$FF2);?>
						</div>
  						<div class="card-body text-warning">
							<p class="card-text text-center">
								<?php
								$sql="SELECT sum((Credito-Debito)) as valor FROM FONDO_PREVENCION 
								Where Usuario='".$Nit."' and (Estado= 'Pendiente') and (Fecha >= '".$F2."' and Fecha <'".date("Y-m-d",$FF2)."');";
								$query1=mysqli_query($con, $sql);			
								
								$rw_Admin1=mysqli_fetch_array($query1);
								echo '$ '.number_format($rw_Admin1[0]);
								?>
							</p>
						</div>  
						<div class="card-footer bg-transparent border-warning text-center text-warning">
							<?php 
								if(strtotime($Hoy) > $FR2){
									?>
									<button class="btn btn-warning btn-block" onclick="RetirarFondo('F2')" >Retirar</button>
									<?php		
								}else{
									echo 'Fecha de Retiro: '.date('d/m/Y',$FR2);
								}
								?>
						</div>
					</div>
					<div class="card border-info mb-3" >
  						<div class="card-header bg-transparent border-info text-info text-center">
					  		<?php echo $Text;?> 3<br>
					  		<?php echo date('d/m/Y',strtotime($F3)); ;?> - <?php echo date('d/m/Y',$FF3);?>
						</div>
  						<div class="card-body text-info">
							<p class="card-text text-center">
								<?php
								$sql="SELECT sum((Credito-Debito)) as valor FROM FONDO_PREVENCION 
								Where Usuario='".$Nit."' and (Estado= 'Pendiente') and (Fecha >= '".$F3."' and Fecha <'".date("Y-m-d",$FF3)."');";
								$query1=mysqli_query($con, $sql);			
								
								$rw_Admin1=mysqli_fetch_array($query1);
								echo '$ '.number_format($rw_Admin1[0]);
								?>
							</p>
						</div>
						<div class="card-footer bg-transparent border-info text-center text-info">
							<?php 
								if(strtotime($Hoy) > $FR3){
									?>
									<button class="btn btn-info btn-block" onclick="RetirarFondo('F3')" >Retirar</button>
									<?php		
								}else{
									echo 'Fecha de Retiro: '.date('d/m/Y',$FR3);
								}
								?>
						</div>  
					</div>
					<div class="card border-danger mb-3" >
  						<div class="card-header bg-transparent border-danger text-danger text-center">
					  		<?php echo $Text;?> 4<br>
					  		<?php echo date('d/m/Y',strtotime($F4)); ;?> - <?php echo date('d/m/Y',$FF4);?>
						</div>
  						<div class="card-body text-danger">
							<p class="card-text text-center">
								<?php
								$sql="SELECT sum((Credito-Debito)) as valor FROM FONDO_PREVENCION 
								Where Usuario='".$Nit."' and (Estado= 'Pendiente') and (Fecha >= '".$F4."' and Fecha <'".date("Y-m-d",$FF4)."');";
								$query1=mysqli_query($con, $sql);			
								
								$rw_Admin1=mysqli_fetch_array($query1);
								echo '$ '.number_format($rw_Admin1[0]);
								?>
							</p>
						</div>
						<div class="card-footer bg-transparent border-danger text-center text-danger">
							<?php 
								if(strtotime($Hoy) > $FR4){
									?>
									<button class="btn btn-danger btn-block" onclick="RetirarFondo('F4')" >Retirar</button>
									<?php		
								}else{
									echo 'Fecha de Retiro: '.date('d/m/Y',$FR4);
								}
								?>
						</div> 
					</div>
								
				</div>
				<br>
					<div id="ResSolicitudF"></div>
				<br>
				<div class="card-deck">		
					<div class="card border-success mb-3" >
  					<div class="card-header bg-transparent border-success text-success">Saldo De Cuenta</div>
  					<div class="card-body text-success">
							<p class="card-text">
								<?php
								$query1=mysqli_query($con, "SELECT sum((Credito-Debito)-CUENTA_VIRTUAL.Comision) as valor FROM CUENTA_VIRTUAL Where Usuario='".$Nit."' and (Estado<> 'Pagada' and Estado<> 'Rechazada' );");			
								$rw_Admin1=mysqli_fetch_array($query1);
								echo '$ '.number_format($rw_Admin1[0]);
								?>
							</p>
  					</div>
					</div>
					<div class="card border-info mb-3" >
						<div class="card-header bg-transparent border-info text-info">Saldo Solicitado</div>
						<div class="card-body text-info">
							<p class="card-text">
								<?php
								$query1=mysqli_query($con, "SELECT sum((Credito-Debito)-CUENTA_VIRTUAL.Comision) as valor FROM CUENTA_VIRTUAL Where Usuario='".$Nit."' and Estado= 'Solicitada';");			
								$rw_Admin1=mysqli_fetch_array($query1);
								echo '$ '.number_format($rw_Admin1[0]);
								?>
							</p>
						</div>
					</div>
					
					<div class="card border-warning   mb-3" 	>
						<div class="card-header bg-transparent border-warning  text-warning  ">Saldo Pendiente</div>
						<div class="card-body text-warning  ">
							<p class="card-text">
								<?php
								$query1=mysqli_query($con, "SELECT sum((Credito-Debito)-CUENTA_VIRTUAL.Comision) as valor FROM CUENTA_VIRTUAL Where Usuario='".$Nit."' and Estado= 'Pendiente';");			
								$rw_Admin1=mysqli_fetch_array($query1);
								echo '$ '.number_format($rw_Admin1[0]);
								?>
							</p>
						</div>
					</div>
				</div>
				<br>
				<div class="panel panel-default">
					<div class="panel-heading">
					
					<div class=" pull-right">
					<?php
											if ( $_SESSION['Estado']=='Activo'){
												?>
													<button class="btn btn-default" id="SolicitarPago" data-toggle="modal" data-target="#Pago" onclick="CargarComisiones(0)"><i class="far fa-money-bill-alt"></i>Solicitar Pago</button>
												<?php
											}
										?>
				
					
				

					<button class="btn btn-success hidden" id="ExportarExcel" ><i class="fas fa-file-excel"></i>Exportar a Excel </button>
			</div>
						<h4><i class='glyphicon glyphicon-search'></i> &nbsp;Cuenta Virtual</h4>
						
					</div>
					<div class="panel-body">
					<?php 
						include("Componentes/Modal/Solicitar_Pago.php");
					?>
						<form class="form-horizontal" role="form" id="datos_cotizacion">
							<div class="form-group row">
							
								<div class="col-md-2">		
									<input type="Date" class="form-control" id="fechaIni" name="fechaIni" value="<?php echo date("Y-m-d",strtotime("-1 month"))?>" onchange='load(1);'>
								</div>
								<div class="col-md-2">		
									<input type="Date" class="form-control" id="fechaFin" name="fechaFin" value="<?php echo date("Y-m-d")?>" onchange='load(1);'>
								</div>
							
								<div class="col-md-2">		
									
									<select class='form-control ' id="FEstado" name ="FEstado" placeholder="Estado" onchange='load(1);'>
										<option value="Todos">Todos</option>
										<option value="Pendiente">Pendientes</option>
										<option value="Rechazada">Rechazadas</option>
										<option value="Solicitada">Solicitadas</option>
									</select>
								</div>
								<input type="hidden" id="Nit" value="<?php echo $Nit;?>">
								<div class="col-md-2">
								<span id="loader"></span>
								</div>
							</div>
						</form>
							
						<div class="tab-content content-profile">
							<div class="tab-pane fade in active" id="Comisiones">

							

								<div class='ResComisiones'></div>
							</div>
						
						</div>
						

						

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
	<script type="text/javascript" src="Componentes/JavaScript/Cuenta.js"></script>
	<script lang = "javascript"  src = "js-xlsx-master/dist/xlsx.full.min.js"> </script>

	<script>

	$( "#Cerrar-Solicitud" ).submit(function( event ) {
		$("#outer_divc").html('');
	})

	$( "#formPago" ).submit(function( event ) {
			var parametros = $(this).serialize();
			$.ajax({
				type: "POST",
				url: "Componentes/Ajax/Solicitar_Pago.php",
				data: parametros,	
				beforeSend: function(objeto){
					$('#Solicitar').attr("disabled", true);
					$('#outer_divc').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
				},
				success: function(datos){
				
					$("#outer_divc").html(datos);
				}
			});
			event.preventDefault();
			CargarComisiones(1);
			load(1);
			$('#Solicitar').attr("disabled", false);

			
});
	function RetirarFondo(Fondo){
		var Nit =$("#Nit").val();
		var Solicitar = confirm("Desea Solicitar el Pago del Fondo?");
		if (Solicitar==true){
				$.ajax({
					type: "GET",
					url: "Componentes/Ajax/Solicitar_PagoFondo.php?Fondo="+Fondo+"&Usuario="+Nit,	
					beforeSend: function(objeto){
						$("#ResSolicitudF").html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
					},
					success: function(datos){
						$("#ResSolicitudF").html(datos);
					
						
					}
				});
			
		}
	}

	</script>
  </body>
</html>