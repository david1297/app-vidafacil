<?php
	session_start();
	$Porcentaje= $_SESSION['Recorridos1']/$_SESSION['Registros1'];
	$Porcentaje = $Porcentaje*100;
?>


					<h3 class="text-center">Estado:<?php echo $_SESSION['Estado'];?></h3>
				<h3 class="text-center">Proceso:<?php echo $_SESSION['Proceso'];?>/2</h3>
						<div class="progress " id="Barra">
  							<div class="progress-bar progress-bar-striped bg-success" role="progressbar" 
							  style="width: <?php echo $Porcentaje ?>%" aria-valuenow="<?php echo $_SESSION['Recorridos'] ?>" aria-valuemin="0" aria-valuemax="<?php $_SESSION['Registros']?>"></div>
						</div>	
						<h3 class="text-center">Registros1:<?php echo $_SESSION['Recorridos1']."/".$_SESSION['Registros1'];?></h3>		
						<h3 class="text-center">Registros2:<?php echo $_SESSION['Recorridos2']."/".$_SESSION['Registros2'];?></h3>		
						<h4>Completados1:<?php echo $_SESSION['Completados1']?></h4>
						<h4>Completados2:<?php echo $_SESSION['Completados2']?></h4>
						<h4>Erroneos1:<?php echo $_SESSION['Erroneos1']?></h4>
						<h4>Erroneos2:<?php echo $_SESSION['Erroneos2']?></h4>
						<h4>Errores:</h4>
						<?php
							$_SESSION['Errores']="";

							if($_SESSION['Estado']=="Finalizado"){
								?>
								<div class="text-center">
								<button type="button" class="btn btn-success " onclick="location.reload();">Finalizar</button>
								
								</div>
								<?php
							}
						?>

			<br>
			<br>