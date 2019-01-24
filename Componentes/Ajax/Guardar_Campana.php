<?php
include('is_logged.php');
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    require_once("../../libraries/password_compatibility_library.php");
}		
if (empty($_POST['Numero'])){
	$errors[] = "El Numero de la Campaña Se Encuentra Vacio";
} elseif (empty($_POST['Nombre'])){
	$errors[] = "El Nombre de la Campaña Se Encuentra Vacio";
}elseif (empty($_POST['Contacto'])){
	$errors[] = "El Contacto de la Campaña Se Encuentra Vacio";
}elseif (empty($_POST['Area'])){
	$errors[] = "El Area de la Campaña Se Encuentra Vacio";
}elseif (empty($_POST['Estado'])){
	$errors[] = "El Estado de la Campaña Se Encuentra Vacio";
}elseif (empty($_POST['Porcentaje'])){
	$errors[] = "El Porcentaje de la Campaña Se Encuentra Vacio";
}
elseif (
			!empty($_POST['Numero'])
			&& !empty($_POST['Nombre'])
			&& !empty($_POST['Contacto'])
			&& !empty($_POST['Area'])
			&& !empty($_POST['Estado'])
			&& !empty($_POST['Porcentaje'])
          )
         {
            require_once ("../../config/db.php");
			require_once ("../../config/conexion.php");
				$Numero = mysqli_real_escape_string($con,(strip_tags($_POST["Numero"],ENT_QUOTES)));
				$Nombre = mysqli_real_escape_string($con,(strip_tags($_POST["Nombre"],ENT_QUOTES)));
				$Contacto = mysqli_real_escape_string($con,(strip_tags($_POST["Contacto"],ENT_QUOTES)));
				$Area = mysqli_real_escape_string($con,(strip_tags($_POST["Area"],ENT_QUOTES)));
				$Estado = mysqli_real_escape_string($con,(strip_tags($_POST["Estado"],ENT_QUOTES)));
				$Porcentaje = mysqli_real_escape_string($con,(strip_tags($_POST["Porcentaje"],ENT_QUOTES)));
				
				
				$sql =  "INSERT INTO  Campanas(Numero,Nombre,Contacto,Area,Estado,Porcentaje) VALUES

				('".$Numero."', '".$Nombre."', '".$Contacto."', '".$Area."', '".$Estado."', '".$Porcentaje."'
				) ON DUPLICATE  KEY UPDATE
				Numero = '".$Numero."',Nombre ='".$Nombre."',Contacto='".$Contacto."',Area='".$Area."',Estado='".$Estado."',Porcentaje='".$Porcentaje."';";
                    $query_update = mysqli_query($con,$sql);
                    if ($query_update) {
                        $messages[] = "Los Datos Se Han Modificado Con Exito.";
                    } else {
                        $errors[] = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
                    }
        } else {
            $errors[] = "Un error desconocido ocurrió.";
        }
		if (isset($errors)){
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error! </strong> 
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
						<strong>¡Bien hecho! </strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>