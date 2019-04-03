<?php
	include('is_logged.php');
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		?>
		<div class="card-deck">		
					<div class="card border-success mb-3" >
  					<div class="card-header bg-transparent border-success text-success">Saldo De Cuenta</div>
  					<div class="card-body text-success">
							<p class="card-text">
								<?php
								$query1=mysqli_query($con, "SELECT sum(Cuenta_Virtual.Comision) as valor FROM Cuenta_Virtual;");			
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
								$query1=mysqli_query($con, "SELECT sum(Cuenta_Virtual.Comision) as valor FROM Cuenta_Virtual Where   Estado= 'Solicitada';");			
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
								$query1=mysqli_query($con, "SELECT sum(Cuenta_Virtual.Comision) as valor FROM Cuenta_Virtual Where   Estado= 'Pendiente';");			
								$rw_Admin1=mysqli_fetch_array($query1);
								echo '$ '.number_format($rw_Admin1[0]);
								?>
							</p>
						</div>
					</div>
				</div>
			<?php
		}
	
?>