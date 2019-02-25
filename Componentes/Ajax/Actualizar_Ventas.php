<?php
include('is_logged.php');
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    require_once("../../libraries/password_compatibility_library.php");
}		
if (empty($_POST['Estado'])){
	$errors[] = "El Estado Se Encuentra Vacio";
} elseif (
		!empty($_POST['Estado'])
	
        ){
            require_once ("../../config/db.php");
			require_once ("../../config/conexion.php");
				$Numero_Venta = mysqli_real_escape_string($con,(strip_tags($_POST["Numero_Venta"],ENT_QUOTES)));
				$Estado = mysqli_real_escape_string($con,(strip_tags($_POST["Estado"],ENT_QUOTES)));

				$sql =  "Update Ventas Set Estado_Campana='".$Estado."' where Numero =".$Numero_Venta.";";

                    $query_update = mysqli_query($con,$sql);
                    if ($query_update) {
                        $messages[] = "La Venta Se Actualizo Con Exito.";
                    } else {
                        $errors[] = $sql;
					}
					if (isset($_POST['Observaciones'])) {
						$User=$_SESSION['Nit'];
						$Observaciones = mysqli_real_escape_string($con,(strip_tags($_POST["Observaciones"],ENT_QUOTES)));	
						if ($Observaciones<>''){
							$sql =  "INSERT INTO  observaciones_ventas(Venta,Fecha,Observacion,Usuario) VALUES
							('".$Numero_Venta."', '".date("Y-m-d")."', '".$Observaciones."', '".$User."')";
						 $query_update = mysqli_query($con,$sql);
						 if ($query_update) {
							 $messages[] = "Los Datos Se Han Modificado Con Exito.";
						 } else {
							 $errors[] = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
						 }	
						}
					
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
				<div class="alert alert-success" role="modal">
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