<?php
include('is_logged.php');
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    require_once("../../libraries/password_compatibility_library.php");
}		

if (empty($_POST['GId'])){
	$errors[] = "GId";
} elseif (empty($_POST['GFecha'])){
	$errors[] = "GFecha";
}elseif (empty($_POST['Gestion'])){
	$errors[] = "Gestion";
}elseif (
			!empty($_POST['GId'])
			&& !empty($_POST['GFecha'])
			&& !empty($_POST['Gestion'])
          )
         {
            require_once ("../../config/db.php");
			require_once ("../../config/conexion.php");
				$GId = mysqli_real_escape_string($con,(strip_tags($_POST["GId"],ENT_QUOTES)));
				$GFecha = mysqli_real_escape_string($con,(strip_tags($_POST["GFecha"],ENT_QUOTES)));
				$Gestion = mysqli_real_escape_string($con,(strip_tags($_POST["Gestion"],ENT_QUOTES)));
				$GDescripcion = mysqli_real_escape_string($con,(strip_tags($_POST["GDescripcion"],ENT_QUOTES)));
				$Usuario= $_SESSION['Nit'];
				
				
				
				$sql =  "INSERT INTO  AGENDAMIENTOS(Afiliado,Fecha,Gestion,Descripcion,Usuario) VALUES

				('".$GId."', '".$GFecha."', '".$Gestion."', '".$GDescripcion."','$Usuario'
				) ON DUPLICATE  KEY UPDATE
				Afiliado = '".$GId."',Gestion ='".$Gestion."',Fecha='".$GFecha."',Descripcion='".$GDescripcion."';";
				
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