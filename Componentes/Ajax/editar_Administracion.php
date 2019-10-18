<?php
include('is_logged.php');
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    require_once("../../libraries/password_compatibility_library.php");
}		if (empty($_POST['Operador_Venta'])){
			$errors[] = "Los Operadores de Venta Se Encuentran Vacios";
		} elseif (empty($_POST['Operador_Donante'])){
			$errors[] = "Los Operadores Donantes Se Encuentran Vacios";
		} elseif (
			!empty($_POST['Operador_Venta'])
			&& !empty($_POST['Operador_Donante'])
          )
         {
            require_once ("../../config/db.php");
			require_once ("../../config/conexion.php");
                $Operador_Donante = mysqli_real_escape_string($con,(strip_tags($_POST["Operador_Donante"],ENT_QUOTES)));
				$Operador_Venta = mysqli_real_escape_string($con,(strip_tags($_POST["Operador_Venta"],ENT_QUOTES)));
				$Indicativos = mysqli_real_escape_string($con,(strip_tags($_POST["Indicativos"],ENT_QUOTES)));
				$Adicionales = mysqli_real_escape_string($con,(strip_tags($_POST["Adicionales"],ENT_QUOTES)));

$sql =  "UPDATE ADMINISTRACION SET Operador_Donante='".$Operador_Donante."', Operador_Venta='".$Operador_Venta."'
, Indicativos='".$Indicativos."'
, Adicionales='".$Adicionales."'

                            WHERE Numero=1;";
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