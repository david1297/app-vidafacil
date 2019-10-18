<?php

include('is_logged.php');
$session_id= session_id();
if (isset($_POST['New_DescripcionT'])){$Descripcion=$_POST['New_DescripcionT'];}


require_once ("../../config/db.php");
require_once ("../../config/conexion.php");

    

if (!empty($Descripcion)){
	$SubQ=mysqli_query($con, "SELECT max(NCategoria) FROM TIPIFICACIONES; ");
	$SubR=mysqli_fetch_array($SubQ);
$Categoria = $SubR[0]+1;

	$sql =  "INSERT INTO TIPIFICACIONES (Categoria,Nombre,NCategoria) VALUES ('$Descripcion','$Descripcion',$Categoria);";
	$query_update = mysqli_query($con,$sql);
    if ($query_update) {
        $messages = "Los Datos Se Han Guardado Con Exito.";
    } else {
        $errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
	}
	if (isset($errors)){
			
		?>
		<div class="alert alert-danger" role="alert">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Error!</strong> 
				<?php
					foreach ($errors as $error) {
							echo $error;
						}
					?>
		</div>
		<?php
		}
		if (isset($messages)){
			
			?>
			<div class="alert alert-success" role="alert">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>¡Bien hecho! Los Datos Se Han Guardado Con Exito.</strong>
					
			</div>
			<?php
		}

}
?>



