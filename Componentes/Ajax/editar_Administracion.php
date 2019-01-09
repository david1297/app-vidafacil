<?php
include('is_logged.php');
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    require_once("../../libraries/password_compatibility_library.php");
}		if (empty($_POST['Empresa'])){
			$errors[] = "El Nombre de la Empresa Esta Vacio";
		} elseif (empty($_POST['Nit'])){
			$errors[] = "El Nit de la Empresa Esta Vacio";
		}  elseif (empty($_POST['Direccion'])) {
            $errors[] = "La Direccion de la Empresa Esta vacía";
        } elseif (empty($_POST['Telefono'])) {
            $errors[] = "El Telefono de la Empresa Esta vacío";
        } elseif (!filter_var($_POST['Correo'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Su dirección de correo electrónico no está en un formato de correo electrónico válida";
        }  elseif (
			!empty($_POST['Empresa'])
			&& !empty($_POST['Nit'])
            && !empty($_POST['Direccion'])
			&& !empty($_POST['Telefono'])
            && filter_var($_POST['Correo'], FILTER_VALIDATE_EMAIL)
          )
         {
            require_once ("../../config/db.php");
			require_once ("../../config/conexion.php");
                $Empresa = mysqli_real_escape_string($con,(strip_tags($_POST["Empresa"],ENT_QUOTES)));
				$Nit = mysqli_real_escape_string($con,(strip_tags($_POST["Nit"],ENT_QUOTES)));
                $Direccion = mysqli_real_escape_string($con,(strip_tags($_POST["Direccion"],ENT_QUOTES)));
				$Telefono = mysqli_real_escape_string($con,(strip_tags($_POST["Telefono"],ENT_QUOTES)));
				$Correo = mysqli_real_escape_string($con,(strip_tags($_POST["Correo"],ENT_QUOTES)));
                    $sql =  "UPDATE Administracion SET Empresa='".$Empresa."', Nit='".$Nit."', Direccion='".$Direccion."', Telefono='".$Telefono."', Correo='".$Correo."'
                            WHERE Nit='".$Nit."';";
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