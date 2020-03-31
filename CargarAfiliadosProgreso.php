<?php
	session_start();
	$Porcentaje= $_SESSION['Recorridos']/$_SESSION['Registros'];
	$Porcentaje = $Porcentaje*100;
?>


		<div id="main-content">
			<div class="container-fluid">
				<div class="panel panel-default">
				<h3 class="text-center">Estado:<?php echo $_SESSION['Estado'];?></h3>
				<h3 class="text-center">Proceso:<?php echo $_SESSION['Proceso'];?>/2</h3>
					<div class="panel-body">
						<div class="progress " id="Barra">
  							<div class="progress-bar progress-bar-striped bg-success" role="progressbar" 
							  style="width: <?php echo $Porcentaje ?>%" aria-valuenow="<?php echo $_SESSION['Recorridos'] ?>" aria-valuemin="0" aria-valuemax="<?php $_SESSION['Registros']?>"></div>
						</div>	
						<h3 class="text-center">Registros:<?php echo $_SESSION['Recorridos']."/".$_SESSION['Registros'];?></h3>		
						<h4>Completados:<?php echo $_SESSION['Completados']?></h4>
						<h4>Erroneos:<?php echo $_SESSION['Erroneos']?></h4>
						<h4>Errores:</h4>
						<?php
							$_SESSION['Errores']="";

							if($_SESSION['Estado']=="Finalizado"){
								?>
								<div class="text-center">
								<button type="button" class="btn btn-success ">Finalizar</button>
								
								</div>
								<?php
							}
						?>

					</div>
				</div>	
			</div>
		</div>
