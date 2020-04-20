<?php

include('is_logged.php');
$session_id= session_id();
require_once ("../../config/db.php");
require_once ("../../config/conexion.php");
if (isset($_POST['Id'])){
	$Id=$_POST['Id'];	
	$Sql="select AGENDAMIENTOS.Id,AGENDAMIENTOS.Fecha,AGENDAMIENTOS.Descripcion,AGENDAMIENTOS.Respuesta,
	AGENDAMIENTOS.Gestion,AGENDAMIENTOS.Afiliado,AGENDAMIENTOS.Usuario
	from AGENDAMIENTOS WHERE AGENDAMIENTOS.Id=".$Id;						
	$query1=mysqli_query($con, $Sql);							
	$rw_Admin1=mysqli_fetch_array($query1);
	$Id=$rw_Admin1[0];
	$Fecha=$rw_Admin1[1];
	$Descripcion=$rw_Admin1[2];
	$Respuesta=$rw_Admin1[3];
	$Gestion=$rw_Admin1[4];
	$Afiliado=$rw_Admin1[5];
	$Usuario=$rw_Admin1[6];
									

	?>
	
	
		<div class="row">
			<input type="text" class="form-control hidden" id="Afiliado" name="Afiliado" value="<?php echo $Afiliado;?>">
			<input type="text" class="form-control hidden" id="GId" name="GId" value="<?php echo $Id;?>">
			<input type="text" class="form-control hidden" id="Usuario" name="Usuario" value="<?php echo $Usuario;?>">
			<div class="col-md-3">
				<label for="GFecha">Fecha</label>
				<input type="date" class="form-control" name="GFecha" id="GFecha" value="<?php echo $Fecha;?>">
			</div>
			<div class="col-md-3">
				<label for="Gestion">Gestion</label>
				<?PHP		
				$query1=mysqli_query($con, "select Codigo,Nombre from GESTION ");
				echo' <select class="form-control" id="Gestion" name ="Gestion" placeholder="AEstado">';									
				while($rw_Admin1=mysqli_fetch_array($query1)){
					if($Gestion==$rw_Admin1['Codigo']){
						echo '<option value="'.$rw_Admin1['Codigo'].'" selected>'.$rw_Admin1['Nombre'].'</option>';	
					}else{
						echo '<option value="'.$rw_Admin1['Codigo'].'">'.$rw_Admin1['Nombre'].'</option>';	
					}
				}
				echo '</select>';
				?>
			</div>
			<div class="col-md-6">
				<label for="GDescripcion">Descripcion</label>
				<input type="text" class="form-control" name="GDescripcion" id="GDescripcion" value="<?php echo $Descripcion;?>" placeholder="Descripcion" onkeyup="javascript:this.value=this.value.toUpperCase();">
			</div>
			<div class="col-md-12">
				<label for="GDescripcion">Respuesta</label>
				<textarea class="form-control" rows="3" id="GRespuesta" name="GRespuesta" onkeyup="javascript:this.value=this.value.toUpperCase();"><?php echo $Respuesta;?></textarea>
			</div>

		</div>
		
	<?php
}else{
	$Afiliado=$_POST['Afiliado'];
	$Usuario= $_SESSION['Nit'];
	?>

		<div class="row">
			<input type="text" class="form-control hidden" id="Afiliado" name="Afiliado" value="<?php echo $Afiliado;?>">
			<input type="text" class="form-control hidden" id="Usuario" name="Usuario" value="<?php echo $Usuario;?>">
			<input type="text" class="form-control hidden" id="GId" name="GId" value="0">
			<div class="col-md-3">
				<label for="GFecha">Fecha</label>
				<input type="date" class="form-control" name="GFecha" id="GFecha">
			</div>
			<div class="col-md-3">
				<label for="Gestion">Gestion</label>
				<?PHP		
				$query1=mysqli_query($con, "select Codigo,Nombre from GESTION ");
				echo' <select class="form-control" id="Gestion" name ="Gestion" placeholder="AEstado">';									
				while($rw_Admin1=mysqli_fetch_array($query1)){
				
						echo '<option value="'.$rw_Admin1['Codigo'].'">'.$rw_Admin1['Nombre'].'</option>';	
					
				}
				echo '</select>';
				?>
			</div>
			<div class="col-md-6">
				<label for="GDescripcion">Descripcion</label>
				<input type="text" class="form-control" name="GDescripcion" id="GDescripcion" placeholder="Descripcion" onkeyup="javascript:this.value=this.value.toUpperCase();">
				<input type="text" class="form-control hidden" name="GRespuesta" id="GRespuesta" placeholder="Respuesta" onkeyup="javascript:this.value=this.value.toUpperCase();">
			</div>
		</div>
		

	<?php
}
	?>
	<script>
	</script>
	