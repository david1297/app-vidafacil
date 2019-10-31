<?php

include('is_logged.php');
$session_id= session_id();


require_once ("../../config/db.php");
require_once ("../../config/conexion.php");
$Filtro = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Filtro'], ENT_QUOTES)));

	if($Filtro== 'Todos'){
		?>
		<select class='form-control' id="FEstado" name ="FEstado" placeholder="Estado" onchange='load(1);'>
			<option value="Todos">Todos</option>
		</select>
		<?php
	}else{
		if($Filtro== 'Estado'){
			?>
			<select class='form-control' id="FEstado" name ="FEstado" placeholder="Estado" onchange='load(1);'>
				<option value="Aprobado">Aprobado</option>
				<option value="Negado">Negado</option>
				<option value="Por Activar">Por Activar</option>							
			</select>
			<?php
		}else{
			if ($Filtro =='Tipificacion'){
			
				$query1=mysqli_query($con, "SELECT NCategoria,Categoria FROM TIPIFICACIONES GROUP BY NCategoria,Categoria ;");
	echo' <select class="form-contro" id="FEstado" name ="FEstado" placeholder="Estado" onchange="load(1);">';

	while($rw_Admin1=mysqli_fetch_array($query1)){
			echo  '<option value="'.$rw_Admin1['NCategoria'].'">'.$rw_Admin1['Categoria'].'</option>';
	}
	echo '</select>';
			}
		}
	}	

    



