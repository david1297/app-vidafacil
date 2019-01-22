<?php
include('is_logged.php');
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    require_once("../../libraries/password_compatibility_library.php");
}		
if (empty($_POST['Nit'])){
	$errors[] = "El Nit del Usuario Se Encuentra Vacio";
} elseif (empty($_POST['Tipo_Persona'])) {
	$errors[] = "Tipo Persona Se Encuentra Vacio";
} elseif (empty($_POST['Razon_Social'])){
	$errors[] = "La Razon Social Se Encuentra Vacia";
} elseif (empty($_POST['Nombre'])) {
	$errors[] = "El Nombre  Se Encuentra Vacio";
} elseif (empty($_POST['Apellido'])) {
	$errors[] = "El Apellido  Se Encuentra Vacio";
} elseif (empty($_POST['Rol'])){
	$errors[] = "El Rol de Usuario Se Encuentra Vacia";
} elseif (empty($_POST['Estado'])){
	$errors[] = "El Esatdo de Usuario Se Encuentra Vacio";
} elseif (empty($_POST['Tipo'])) {
	$errors[] = "Tipo  Se Encuentra Vacio";
} elseif (empty($_POST['Tel_C'])) {
	$errors[] = "El Telefono de Contacto Se Encuentra vacío";
} elseif (empty($_POST['Direccion'])) {
	$errors[] = "La Direccion Se Encuentra vacía";
} elseif (!filter_var($_POST['Correo'], FILTER_VALIDATE_EMAIL)) {
	$errors[] = "La dirección de correo electrónico no está en un formato de correo electrónico válida";
} elseif (empty($_POST['Cel_C'])) {
	$errors[] = "El Celular de Contacto Se Encuentra vacío";
} elseif (!filter_var($_POST['Correo_C'], FILTER_VALIDATE_EMAIL)) {
	$errors[] = "La dirección de correo electrónico de Notificacion no está en un formato de correo electrónico válida";
} elseif (empty($_POST['Porcentaje'])) {
	$errors[] = "El Porcentaje Se Encuentra vacío";	
} elseif (empty($_POST['Rep_Legal'])){
	$errors[] = "El Representante Legal Se Encuentra Vacio";
} elseif (empty($_POST['CC'])){
	$errors[] = "El Numero de Documento Representante Legal Se Encuentra Vacio";
} elseif (empty($_POST['Nombre_R1'])){
	$errors[] = "El Nombre de La Referencia 1 Se Encuentra Vacio";
} elseif (empty($_POST['Tel_R1'])){
	$errors[] = "El Tefefono de La Referencia 1 Se Encuentra Vacio";
} elseif (empty($_POST['Nombre_R2'])){
	$errors[] = "El Nombre de La Referencia 2 Se Encuentra Vacio";
} elseif (empty($_POST['Tel_R2'])){
	$errors[] = "El Tefefono de La Referencia 2 Se Encuentra Vacio";	
} elseif (
			!empty($_POST['Nit'])
			&& !empty($_POST['Tipo_Persona'])
			&& !empty($_POST['Razon_Social'])
			&& !empty($_POST['Nombre'])
			&& !empty($_POST['Apellido'])
			&& !empty($_POST['Rol'])
			&& !empty($_POST['Estado'])
			&& !empty($_POST['Tipo'])
			&& !empty($_POST['Tel_C'])
			&& !empty($_POST['Direccion'])
			&& filter_var($_POST['Correo'], FILTER_VALIDATE_EMAIL)
			&& !empty($_POST['Cel_C'])
			&& filter_var($_POST['Correo_C'], FILTER_VALIDATE_EMAIL)
			&& !empty($_POST['Porcentaje'])
			&& !empty($_POST['Rep_Legal'])
			&& !empty($_POST['CC'])
			&& !empty($_POST['Nombre_R1'])
			&& !empty($_POST['Tel_R1'])
			&& !empty($_POST['Nombre_R2'])
			&& !empty($_POST['Tel_R2'])
          )
         {
            require_once ("../../config/db.php");
			require_once ("../../config/conexion.php");
				$Nit = mysqli_real_escape_string($con,(strip_tags($_POST["Nit"],ENT_QUOTES)));
				$Tipo_Persona = mysqli_real_escape_string($con,(strip_tags($_POST["Tipo_Persona"],ENT_QUOTES)));
				$Razon_Social = mysqli_real_escape_string($con,(strip_tags($_POST["Razon_Social"],ENT_QUOTES)));
				$Nombre = mysqli_real_escape_string($con,(strip_tags($_POST["Nombre"],ENT_QUOTES)));
				$Apellido = mysqli_real_escape_string($con,(strip_tags($_POST["Apellido"],ENT_QUOTES)));
				$Rol = mysqli_real_escape_string($con,(strip_tags($_POST["Rol"],ENT_QUOTES)));
				$Estado = mysqli_real_escape_string($con,(strip_tags($_POST["Estado"],ENT_QUOTES)));
				$Tipo = mysqli_real_escape_string($con,(strip_tags($_POST["Tipo"],ENT_QUOTES)));
				$Tel_C = mysqli_real_escape_string($con,(strip_tags($_POST["Tel_C"],ENT_QUOTES)));
				$Direccion = mysqli_real_escape_string($con,(strip_tags($_POST["Direccion"],ENT_QUOTES)));
				$Correo = mysqli_real_escape_string($con,(strip_tags($_POST["Correo"],ENT_QUOTES)));
				$Cel_C = mysqli_real_escape_string($con,(strip_tags($_POST["Cel_C"],ENT_QUOTES)));
				$Correo_C = mysqli_real_escape_string($con,(strip_tags($_POST["Correo_C"],ENT_QUOTES)));
				$Porcentaje = mysqli_real_escape_string($con,(strip_tags($_POST["Porcentaje"],ENT_QUOTES)));
				$Rep_Legal = mysqli_real_escape_string($con,(strip_tags($_POST["Rep_Legal"],ENT_QUOTES)));
				$CC = mysqli_real_escape_string($con,(strip_tags($_POST["CC"],ENT_QUOTES)));
				$Nombre_R1 = mysqli_real_escape_string($con,(strip_tags($_POST["Nombre_R1"],ENT_QUOTES)));
				$Tel_R1 = mysqli_real_escape_string($con,(strip_tags($_POST["Tel_R1"],ENT_QUOTES)));
				$Nombre_R2 = mysqli_real_escape_string($con,(strip_tags($_POST["Nombre_R2"],ENT_QUOTES)));
				$Tel_R2 = mysqli_real_escape_string($con,(strip_tags($_POST["Tel_R2"],ENT_QUOTES)));
				
				
				$sql =  "INSERT INTO  usuarios(Nit,Tipo_Persona,Razon_Social,Nombre,Apellido,Rol,Estado,Tipo,Tel_C,Direccion,
				Correo,Cel_C,Correo_C,Porcentaje,Rep_Legal,CC,Nombre_R1,Tel_R1,Nombre_R2,Tel_R2) VALUES

				('".$Nit."', '".$Tipo_Persona."', '".$Razon_Social."', '".$Nombre."', '".$Apellido."', '".$Rol."', '".$Estado."', '".$Tipo."', '".$Tel_C."', '".$Direccion."'
				, '".$Correo."', '".$Cel_C."', '".$Correo_C."', '".$Porcentaje."', '".$Rep_Legal."', '".$CC."', '".$Nombre_R1."', '".$Tel_R1."', '".$Nombre_R2."', '".$Tel_R2."'
				) ON DUPLICATE KEY UPDATE
				Tipo_Persona = '".$Tipo_Persona."',Razon_Social ='".$Razon_Social."',Nombre='".$Nombre."',Apellido='".$Apellido."',Rol='".$Rol."',Estado='".$Estado."',Tipo='".$Tipo."',Tel_C='".$Tel_C."',Direccion='".$Direccion."' 
				,Correo='".$Correo."',Cel_C='".$Cel_C."',Correo_C='".$Correo_C."',Porcentaje='".$Porcentaje."',Rep_Legal='".$Rep_Legal."',CC='".$CC."',Nombre_R1='".$Nombre_R1."',Tel_R1='".$Tel_R1."',Nombre_R2='".$Nombre_R2."',Tel_R2='".$Tel_R2."';";
                    $query_update = mysqli_query($con,$sql);
                    if ($query_update) {
                        $messages[] = "Los Datos Se Han Modificado Con Exito.";
                    } else {
                        $errors[] = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>".$sql;
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