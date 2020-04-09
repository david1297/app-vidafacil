<?php

include('is_logged.php');
$session_id= session_id();


require_once ("../../config/db.php");
require_once ("../../config/conexion.php");
$Filtro = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Filtro'], ENT_QUOTES)));

if($Filtro== 'Estado'){
	?>
	<select class='form-control' id="FEstado" name ="FEstado" placeholder="Estado" onchange='load(1);'>
		<option value="Activo">Activo</option>
		<option value="Pendiente">Pendiente</option>										
		<option value="InActivo">InActivo</option>
		<option value="Bloqueado">Bloqueado</option>
	</select>
	<?php
}else{
	if($Filtro== 'Todos'){
		?>
		<select class='form-control' id="FEstado" name ="FEstado" placeholder="Estado" onchange='load(1);'>
			<option value="Todos">Todos</option>
		</select>
		<?php
	}else{
		if($Filtro== 'Tipo'){
			?>
			<select class='form-control' id="FEstado" name ="FEstado" placeholder="Estado" onchange='load(1);'>
				<option value="Operador">Operador</option>
				<option value="Distribuidor">Distribuidor</option>										
			</select>
			<?php
		}else{
			if($Filtro== 'Campana'){
				$query1=mysqli_query($con, "SELECT Numero,Nombre FROM CAMPANAS where estado='Activa';");
				echo' <select class="form-contro" id="FEstado" name ="FEstado" placeholder="Estado" onchange="load(1);">';
				while($rw_Admin1=mysqli_fetch_array($query1)){
						echo  '<option value="'.$rw_Admin1['Numero'].'">'.$rw_Admin1['Nombre'].'</option>';
				}
				echo '</select>';
			}
		}
	}	
}
    



