<?php
include('is_logged.php');
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    require_once("../../libraries/password_compatibility_library.php");
}		
if (empty($_POST['Usuario'])){
	$errors[] = "El Usuario Se Encuentra Vacio";
} elseif (empty($_POST['Modulo'])){
	$errors[] = "El Modulo Se Encuentra Vacio";
}elseif (empty($_POST['Permiso'])){
	$errors[] = "El Permiso Se Encuentra Vacio";
}elseif (empty($_POST['Valor'])){
	$errors[] = "El Valor Se Encuentra Vacio";
} elseif (
			!empty($_POST['Usuario'])
			&& !empty($_POST['Modulo'])
			&& !empty($_POST['Permiso'])
			&& !empty($_POST['Valor'])
          )
         {
            require_once ("../../config/db.php");
			require_once ("../../config/conexion.php");
				$Usuario = mysqli_real_escape_string($con,(strip_tags($_POST["Usuario"],ENT_QUOTES)));
				$Modulo = mysqli_real_escape_string($con,(strip_tags($_POST["Modulo"],ENT_QUOTES)));
				$Permiso = mysqli_real_escape_string($con,(strip_tags($_POST["Permiso"],ENT_QUOTES)));
				$Valor = mysqli_real_escape_string($con,(strip_tags($_POST["Valor"],ENT_QUOTES)));
				
				
				$sql =  "Update PERMISOS Set Estado='".$Valor."' where Usuario='".$Usuario."' 
						and Modulo='".$Modulo."' and Permiso='".$Permiso."'
				; ";

                    $query_update = mysqli_query($con,$sql);
                    if ($query_update) {
                        $messages[] = "Los Datos Se Han Modificado Con Exito.";
                    } else {
                        $errors[] = $sql;
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
				<a href="#" class="btn btn-success"><i class="fas fa-check"></i></a>
				
				<?php
			}

?>