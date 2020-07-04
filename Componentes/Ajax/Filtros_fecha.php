<?php

include('is_logged.php');
$session_id= session_id();


require_once ("../../config/db.php");
require_once ("../../config/conexion.php");
$FechaExp = mysqli_real_escape_string($con,(strip_tags($_REQUEST['FechaExp'], ENT_QUOTES)));
$Anio = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Anio'], ENT_QUOTES)));

$m =date("n");	
$anio =date("Y");	
	
		?>
		<select name="Mes" id="Mes"class="form-control">
				<?php
					if($anio==$Anio){
						$fom=explode("/", $FechaExp);
						for($I=$m;$I<=12;$I++){

							if ($I<10){
								$H = '0'.$I;
							}else{
								$H = $I;
							}
							if($fom[0]==$H){
								?>
								<option value="<?php echo $H;?>" selected><?php echo $H;?></option>

								<?php
							}else{
								?>
								<option value="<?php echo $H;?>"><?php echo $H;?></option>

								<?php
							}
							
						}
					}else{
						$fom=explode("/", $FechaExp);
						for($I=1;$I<=12;$I++){
							if ($I<10){
								$H = '0'.$I;
							}else{
								$H = $I;
							}
							if($fom[0]==$H){
								?>
								<option value="<?php echo $H;?>" selected><?php echo $H;?></option>

								<?php
							}else{
								?>
								<option value="<?php echo $H;?>"><?php echo $H;?></option>

								<?php
							}
							
						}
					}


							
							?>
		</select>
		<?php
	


