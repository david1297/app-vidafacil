<?php

include('is_logged.php');
$session_id= session_id();


require_once ("../../config/db.php");
require_once ("../../config/conexion.php");
$Filtro = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Filtro'], ENT_QUOTES)));

if($Filtro== 'Usuario'){
	$query1=mysqli_query($con, "SELECT Nit,Razon_Social FROM USUARIOS where estado='Activo';");
	echo' <select class="form-contro" id="FEstado" name ="FEstado" placeholder="Estado" onchange="load(1);">';
	while($rw_Admin1=mysqli_fetch_array($query1)){
			echo  '<option value="'.$rw_Admin1['Nit'].'">'.$rw_Admin1['Razon_Social'].'</option>';
	}
	echo '</select>';

}else{
	if($Filtro== 'Todos'){
		?>
		<select class='form-control' id="FEstado" name ="FEstado" placeholder="Estado" onchange='load(1);'>
			<option value="Todos">Todos</option>
		</select>
		<?php
	}else{
		if($Filtro== 'Estado'){
			$Tipo=$_SESSION['Tipo'];
				$query1=mysqli_query($con, "SELECT Id,".$Tipo." FROM ESTADOS ;");
				echo' <select class="form-contro" id="FEstado" name ="FEstado" placeholder="Estado" onchange="load(1);">';
				while($rw_Admin1=mysqli_fetch_array($query1)){
						echo  '<option value="'.$rw_Admin1[0].'">'.$rw_Admin1[1].'</option>';
				}
				echo '</select>';
		}else{
			if($Filtro== 'Campana'){
				$query1=mysqli_query($con, "SELECT Numero,Nombre FROM CAMPANAS where estado='Activa';");
				echo' <select class="form-contro" id="FEstado" name ="FEstado" placeholder="Estado" onchange="load(1);">';
				while($rw_Admin1=mysqli_fetch_array($query1)){
						echo  '<option value="'.$rw_Admin1['Numero'].'">'.$rw_Admin1['Nombre'].'</option>';
				}
				echo '</select>';
			}else{
				if($Filtro== 'Departamento'){
					$query1=mysqli_query($con, "SELECT Codigo,Nombre FROM DEPARTAMENTOS order by Nombre;");
					echo' <select class="form-contro" id="FEstado" name ="FEstado" placeholder="Estado" onchange="load(1);">';
					while($rw_Admin1=mysqli_fetch_array($query1)){
							echo  '<option value="'.$rw_Admin1['Codigo'].'">'.$rw_Admin1['Nombre'].'</option>';
					}
					echo '</select>';
				}else{
					if($Filtro== 'Ciudad'){
						$query1=mysqli_query($con, "SELECT Codigo,Nombre FROM CIUDADES order by Nombre;");
						echo' <select class="form-contro" id="FEstado" name ="FEstado" placeholder="Estado" onchange="load(1);">';
						while($rw_Admin1=mysqli_fetch_array($query1)){
								echo  '<option value="'.$rw_Admin1['Codigo'].'">'.$rw_Admin1['Nombre'].'</option>';
						}
						echo '</select>';
					}
				}
			}
		}
	}	
}
    



