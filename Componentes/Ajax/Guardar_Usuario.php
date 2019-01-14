<?php
include('is_logged.php');
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    require_once("../../libraries/password_compatibility_library.php");
}		
if (empty($_POST['Usuario'])){
	$errors[] = "El Nombre de Usuario Se Encuentra Vacio";
} elseif (!filter_var($_POST['Correo'], FILTER_VALIDATE_EMAIL)) {
	$errors[] = "La dirección de correo electrónico no está en un formato de correo electrónico válida";
} elseif (empty($_POST['Rol'])){
	$errors[] = "El Rol de Usuario Se Encuentra Vacia";
}  elseif (empty($_POST['Nombre'])) {
	$errors[] = "El Nombre  Se Encuentra Vacio";
}  elseif (empty($_POST['Apellido'])) {
	$errors[] = "El Apellido  Se Encuentra Vacio";
}  elseif (empty($_POST['Genero'])) {
	$errors[] = "El Genero  Se Encuentra Vacio";
} elseif (empty($_POST['Porcentaje'])) {
	$errors[] = "El Porcentaje Se Encuentra vacío";	
}  elseif (
			!empty($_POST['Usuario'])
			&& filter_var($_POST['Correo'], FILTER_VALIDATE_EMAIL)
            && !empty($_POST['Rol'])
			&& !empty($_POST['Nombre'])
			&& !empty($_POST['Apellido'])
			&& !empty($_POST['Genero'])
			&& !empty($_POST['Porcentaje'])
          )
         {
            require_once ("../../config/db.php");
			require_once ("../../config/conexion.php");
				$Usuario = mysqli_real_escape_string($con,(strip_tags($_POST["Usuario"],ENT_QUOTES)));
				$Correo = mysqli_real_escape_string($con,(strip_tags($_POST["Correo"],ENT_QUOTES)));
				$Rol = mysqli_real_escape_string($con,(strip_tags($_POST["Rol"],ENT_QUOTES)));
				$Nombre = mysqli_real_escape_string($con,(strip_tags($_POST["Nombre"],ENT_QUOTES)));
				$Apellido = mysqli_real_escape_string($con,(strip_tags($_POST["Apellido"],ENT_QUOTES)));
				$Genero = mysqli_real_escape_string($con,(strip_tags($_POST["Genero"],ENT_QUOTES)));
				$Porcentaje = mysqli_real_escape_string($con,(strip_tags($_POST["Porcentaje"],ENT_QUOTES)));
				
				$sql =  "INSERT INTO  usuarios(Usuario,Correo,Rol,Nombre,Apellido,Genero,Porcentaje) VALUES
				('".$Usuario."', '".$Correo."', '".$Rol."', '".$Nombre."', '".$Apellido."', '".$Genero."', '".$Porcentaje."') ON DUPLICATE KEY UPDATE
				Correo = '".$Correo."',Rol ='".$Rol."',Nombre='".$Nombre."',Apellido='".$Apellido."',Genero='".$Genero."',Porcentaje='".$Porcentaje."' ;";
                    $query_update = mysqli_query($con,$sql);
                    if ($query_update) {
                        $messages[] = "Los Datos Se Han Modificado Con Exito.";
                    } else {
                        $errors[] = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.";
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