<?php
include('is_logged.php');
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    require_once("../../libraries/password_compatibility_library.php");
}		
if (empty($_POST['Numero'])){
	$errors[] = "El Numero Se Encuentra Vacio";
} elseif (empty($_POST['Descripcion'])){
	$errors[] = "La Descripcion Se Encuentra Vacia";
} elseif (
			!empty($_POST['Numero'])
			&& !empty($_POST['Descripcion'])
          )
         {
            require_once ("../../config/db.php");
			require_once ("../../config/conexion.php");
				$Numero = mysqli_real_escape_string($con,(strip_tags($_POST["Numero"],ENT_QUOTES)));
				$Descripcion = mysqli_real_escape_string($con,(strip_tags($_POST["Descripcion"],ENT_QUOTES)));
				
				
				$sql =  "Update CATEGORIAS Set Nombre='".$Descripcion."' where Codigo=".$Numero."; ";

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
				<a href="#" class="btn btn-success"><i class="fas fa-check"></i></a>
				
				<?php
			}

?>