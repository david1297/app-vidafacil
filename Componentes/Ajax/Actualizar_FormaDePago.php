<?php
include('is_logged.php');
require_once ("../../config/db.php");
require_once ("../../config/conexion.php");
if($_POST['Campo']=='D'){
	if (empty($_POST['Descripcion'])){
		$errors[] = "La Descripcion Se Encuentra Vacia";
	} elseif (!empty($_POST['Numero']) && !empty($_POST['Descripcion'])){
		$Numero = mysqli_real_escape_string($con,(strip_tags($_POST["Numero"],ENT_QUOTES)));
		$Descripcion = mysqli_real_escape_string($con,(strip_tags($_POST["Descripcion"],ENT_QUOTES)));				
		$sql =  "Update FORMAS_PAGO Set Descripcion='".$Descripcion."' where Codigo=".$Numero."; ";
		$query_update = mysqli_query($con,$sql);
		if ($query_update) {
			$messages[] = "Los Datos Se Han Modificado Con Exito.";
		} else {
			$errors[] = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
		}
	} else {
		$errors[] = "Un error desconocido ocurrió.";
	}
}	else{

	if (empty($_POST['Tipo'])){
		$errors[] = "La Tipo Se Encuentra Vacia";
	} elseif (!empty($_POST['Numero']) && !empty($_POST['Tipo'])){
		$Numero = mysqli_real_escape_string($con,(strip_tags($_POST["Numero"],ENT_QUOTES)));
		$Tipo = mysqli_real_escape_string($con,(strip_tags($_POST["Tipo"],ENT_QUOTES)));				
		$sql =  "Update FORMAS_PAGO Set Tipo='".$Tipo."' where Codigo=".$Numero."; ";
		$query_update = mysqli_query($con,$sql);
		if ($query_update) {
			$messages[] = "Los Datos Se Han Modificado Con Exito.";
		} else {
			$errors[] = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
		}
	} else {
		$errors[] = "Un error desconocido ocurrió.";
	}
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