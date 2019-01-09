<?php
include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
// checking for minimum PHP version
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    // if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
    // (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
    require_once("../../libraries/password_compatibility_library.php");
}		if (empty($_POST['Usuario'])){
			$errors[] = "Usuariovacío";
		} elseif (empty($_POST['Nombre'])){
			$errors[] = "Nombre vacío";
		} elseif (empty($_POST['Apellido'])){
			$errors[] = "Apellidos vacío";
		}  elseif (empty($_POST['Direccion'])) {
            $errors[] = "Direccion vacía";
        } elseif (empty($_POST['Telefono'])) {
            $errors[] = "Telefono vacío";
        } elseif (!filter_var($_POST['Correo'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Su dirección de correo electrónico no está en un formato de correo electrónico válida";
        }  elseif (
			!empty($_POST['Usuario'])
			&& !empty($_POST['Nombre'])
			&& !empty($_POST['Apellido'])
            && !empty($_POST['Direccion'])
			&& !empty($_POST['Telefono'])
			&& !empty($_POST['Genero'])
            && filter_var($_POST['Correo'], FILTER_VALIDATE_EMAIL)
          )
         {
            require_once ("../../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
			require_once ("../../config/conexion.php");//Contiene funcion que conecta a la base de datos
			
				// escaping, additionally removing everything that could be (html/javascript-) code
                $Usuario = mysqli_real_escape_string($con,(strip_tags($_POST["Usuario"],ENT_QUOTES)));
				$Nombre = mysqli_real_escape_string($con,(strip_tags($_POST["Nombre"],ENT_QUOTES)));
				$Apellido = mysqli_real_escape_string($con,(strip_tags($_POST["Apellido"],ENT_QUOTES)));
                $Direccion = mysqli_real_escape_string($con,(strip_tags($_POST["Direccion"],ENT_QUOTES)));
				$Telefono = mysqli_real_escape_string($con,(strip_tags($_POST["Telefono"],ENT_QUOTES)));
				$Genero = mysqli_real_escape_string($con,(strip_tags($_POST["Genero"],ENT_QUOTES)));
				$Correo = mysqli_real_escape_string($con,(strip_tags($_POST["Correo"],ENT_QUOTES)));

					
               
					// write new user's data into database
                    $sql =  "UPDATE Usuarios SET Nombre='".$Nombre."', Apellido='".$Apellido."', Direccion='".$Direccion."', Telefono='".$Telefono."', Genero='".$Genero."', Correo='".$Correo."'
                            WHERE Usuario='".$Usuario."';";
                    $query_update = mysqli_query($con,$sql);

                    // if user has been added successfully
                    if ($query_update) {
                        $messages[] = "La cuenta ha sido modificada con éxito.";
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
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>