<?php

include('is_logged.php');
$session_id= session_id();

if (isset($_POST['Campana'])){$Campana=$_POST['Campana'];}
if (isset($_POST['Est_camp'])){$Est_camp=$_POST['Est_camp'];}
if (isset($_POST['Seg_camp'])){$Seg_camp=$_POST['Seg_camp'];}
if (isset($_POST['Tran_camp'])){$Tran_camp=$_POST['Tran_camp'];}


require_once ("../../config/db.php");
require_once ("../../config/conexion.php");

		$query=mysqli_query($con, "select * from CAMPANAS where Numero ='".$Campana."' ");
        $rw_Admin=mysqli_fetch_array($query);
										
		echo '<input type="text" class="form-control hidden" id="Telefonica" name="Telefonica" VALUE="'.$rw_Admin['Telefonica'].'" placeholder="Telefonica" readonly>';

		$query=mysqli_query($con, "select count(*) from CAMP_TIPIFICACIONES where Campana =$Campana ");
		$rw_Admin=mysqli_fetch_array($query);	
		if($rw_Admin[0]==0){
			?>
			<input type="Text" class="form-control hidden" id="Estado_Campana" name="Estado_Campana"  value="0">    
			<?php
		}else{
			?>
			<div class="col-md-4"> 
				<label for="email" class="control-label">Tipificacion</label>
				<select class="form-control" id="Estado_Campana" name ="Estado_Campana" placeholder="Estado Campaña">';
					<?php
					$query1=mysqli_query($con, "SELECT Numero,Nombre FROM CAMP_TIPIFICACIONES 
					inner join TIPIFICACIONES on CAMP_TIPIFICACIONES.Tipificacion =TIPIFICACIONES.Numero Where Campana = $Campana ");
					while($rw_Admin1=mysqli_fetch_array($query1)){
						if ($Est_camp==$rw_Admin1[0]){
							echo '<option value="'.$rw_Admin1[0].'" selected>'.$rw_Admin1[1].'</option>';	
						}else{
							echo '<option value="'.$rw_Admin1[0].'">'.$rw_Admin1[1].'</option>';	
						}
					
						
					}
					?>
				</select>
			</div>
			<?php
		}	
		/* Seguimiento*/
		$query=mysqli_query($con, "select count(*) from CAMP_SEGUIMIENTO where Campana =$Campana ");
		$rw_Admin=mysqli_fetch_array($query);	
		if($rw_Admin[0]==0){
			?>
			<input type="Text" class="form-control hidden" id="Seguimiento" name="Seguimiento"  value="0">    
			<?php
		}else{
			?>
			<div class="col-md-4"> 
				<label for="email" class="control-label">Seguimiento</label>
				<select class="form-control" id="Seguimiento" name ="Seguimiento" placeholder="Estado Campaña">';
					<?php
					$query1=mysqli_query($con, "SELECT Numero,Nombre FROM CAMP_SEGUIMIENTO 
					inner join SEGUIMIENTOS on CAMP_SEGUIMIENTO.Seguimiento =SEGUIMIENTOS.Numero Where Campana = $Campana ");
					while($rw_Admin1=mysqli_fetch_array($query1)){
						if ($Est_camp==$rw_Admin1[0]){
							echo '<option value="'.$rw_Admin1[0].'" selected>'.$rw_Admin1[1].'</option>';	
						}else{
							echo '<option value="'.$rw_Admin1[0].'">'.$rw_Admin1[1].'</option>';	
						}
					
						
					}
					?>
				</select>
			</div>
			<?php
		} 
	/*Transportadoras */
		$query=mysqli_query($con, "select count(*) from CAMP_TRANSPORTADORA where Campana =$Campana ");
		$rw_Admin=mysqli_fetch_array($query);	
		if($rw_Admin[0]==0){
			?>
			<input type="Text" class="form-control hidden" id="Transportadora" name="Transportadora"  value="0">    
			<?php
		}else{
			?>
			<div class="col-md-4"> 
				<label for="email" class="control-label">Transportadora</label>
				<select class="form-control" id="Transportadora" name ="Transportadora" placeholder="Estado Campaña">';
					<?php
					$query1=mysqli_query($con, "SELECT Numero,Nombre FROM CAMP_TRANSPORTADORA 
					inner join TRANSPORTADORAS on CAMP_TRANSPORTADORA.Transportadora =TRANSPORTADORAS.Numero Where Campana = $Campana ");
					while($rw_Admin1=mysqli_fetch_array($query1)){
						if ($Est_camp==$rw_Admin1[0]){
							echo '<option value="'.$rw_Admin1[0].'" selected>'.$rw_Admin1[1].'</option>';	
						}else{
							echo '<option value="'.$rw_Admin1[0].'">'.$rw_Admin1[1].'</option>';	
						}
					
						
					}
					?>
				</select>
			</div>
			<?php
		} 
		/*Transportadoras */
		$query=mysqli_query($con, "select count(*) from CAMP_FORMASPAGO where Campana =$Campana ");
		$rw_Admin=mysqli_fetch_array($query);	
		if($rw_Admin[0]==0){
			?>
			<input type="Text" class="form-control hidden" id="Forma_Pago" name="Forma_Pago"  value="0">    
			<?php
		}else{
			?>
			<div class="col-md-4"> 
				<label for="email" class="control-label">Forma de Pago</label>
				<select class="form-control" id="Forma_Pago" name ="Forma_Pago" placeholder="Estado Campaña">';
					<?php
					$query1=mysqli_query($con, "SELECT Codigo,Descripcion FROM CAMP_FORMASPAGO 
					inner join FORMAS_PAGO on CAMP_FORMASPAGO.FormaPago =FORMAS_PAGO.Codigo Where Campana = $Campana ");
					while($rw_Admin1=mysqli_fetch_array($query1)){
						if ($Est_camp==$rw_Admin1[0]){
							echo '<option value="'.$rw_Admin1[0].'" selected>'.$rw_Admin1[1].'</option>';	
						}else{
							echo '<option value="'.$rw_Admin1[0].'">'.$rw_Admin1[1].'</option>';	
						}
					
						
					}
					?>
				</select>
			</div>
			<?php
		} 








?>
