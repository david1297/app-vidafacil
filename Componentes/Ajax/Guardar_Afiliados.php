<?php
include('is_logged.php');
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    require_once("../../libraries/password_compatibility_library.php");
}	
if (empty($_POST['Identificacion'])){
	$errors[] = "El Numero de Identificacion Se Encuentra Vacio";
} elseif (empty($_POST['Primer_Nombre'])){
	$errors[] = "El Primer Nombre Se Encuentra Vacio";
}elseif (empty($_POST['Primer_Apellido'])){
	$errors[] = "El Primer Apellido Se Encuentra Vacio";
}elseif (empty($_POST['Tipo_Identificacion'])){
	$errors[] = "El Tipo de Identificacion Encuentra Vacio";
}elseif (empty($_POST['Fecha_Nacimiento'])){
	$errors[] = "La Fecha de Nacimiento Se Encuentra Vacia";
}elseif (empty($_POST['Nacionalidad'])){
	$errors[] = "La Nacionalidad Se Encuentra Vacia";
}elseif (empty($_POST['Ciudad'])){
	$errors[] = "La Ciudad Se Encuentra Vacia";
}elseif (empty($_POST['Departamento'])){
	$errors[] = "El Departamento Se Encuentra Vacio";
}elseif (empty($_POST['Direccion'])){
	$errors[] = "La Direccion Se Encuentra Vacia";
}elseif (empty($_POST['Direccion'])){
	$errors[] = "La Direccion Se Encuentra Vacia";
}elseif (empty($_POST['Estrato'])){
	$errors[] = "El Estrato Se Encuentra Vacio";
}elseif (empty($_POST['Nivel_Educacion'])){
	$errors[] = "El Nivel de Educacion Se Encuentra Vacio";
}elseif (empty($_POST['Ocupacion'])){
	$errors[] = "La Ocupacion Se Encuentra Vacia";
}elseif (empty($_POST['Rango_Ingresos'])){
	$errors[] = "El Rango de Ingresos Se Encuentra Vacio";
}elseif (empty($_POST['Telefono'])){
	$errors[] = "El Telefono Se Encuentra Vacio";
}elseif (empty($_POST['Forma_Pago'])){
	$errors[] = "La Forma de Pago Se Encuentra Vacia";
}elseif (empty($_POST['Direccion_Firma'])){
	$errors[] = "La Direccion de Firma Se Encuentra Vacia";
}elseif (empty($_POST['Fecha_Firma'])){
	$errors[] = "La Fecha de Firma Se Encuentra Vacia";
}elseif (empty($_POST['Horario'])){
	$errors[] = "La Hora de Firma Se Encuentra Vacia";
}elseif (empty($_POST['Estado'])){
	$errors[] = "El Estado Se Encuentra Vacio";
}elseif (!filter_var($_POST['Correo'], FILTER_VALIDATE_EMAIL)) {
	$errors[] = "La dirección de correo electrónico no está en un formato de correo electrónico válida";
}



elseif (
			!empty($_POST['Identificacion'])
			&& !empty($_POST['Primer_Nombre'])
			&& !empty($_POST['Primer_Apellido'])
			&& !empty($_POST['Tipo_Identificacion'])
			&& !empty($_POST['Fecha_Nacimiento'])
			&& !empty($_POST['Nacionalidad'])
			&& !empty($_POST['Ciudad'])
			&& !empty($_POST['Departamento'])
			&& !empty($_POST['Direccion'])
			&& !empty($_POST['Estrato'])
			&& !empty($_POST['Nivel_Educacion'])
			&& !empty($_POST['Ocupacion'])
			&& !empty($_POST['Forma_Pago'])
			&& !empty($_POST['Rango_Ingresos'])
			&& !empty($_POST['Telefono'])
			&& !empty($_POST['Direccion_Firma'])
			&& !empty($_POST['Fecha_Firma'])
			&& !empty($_POST['Horario'])
			&& !empty($_POST['Estado'])
			&& filter_var($_POST['Correo'], FILTER_VALIDATE_EMAIL)
          )
         {
            require_once ("../../config/db.php");
			require_once ("../../config/conexion.php");
				$Identificacion = mysqli_real_escape_string($con,(strip_tags($_POST["Identificacion"],ENT_QUOTES)));
				$Primer_Nombre = mysqli_real_escape_string($con,(strip_tags($_POST["Primer_Nombre"],ENT_QUOTES)));
				$Segundo_Nombre = mysqli_real_escape_string($con,(strip_tags($_POST["Segundo_Nombre"],ENT_QUOTES)));
				$Primer_Apellido = mysqli_real_escape_string($con,(strip_tags($_POST["Primer_Apellido"],ENT_QUOTES)));
				$Segundo_Apellido = mysqli_real_escape_string($con,(strip_tags($_POST["Segundo_Apellido"],ENT_QUOTES)));
				$Tipo_Identificacion = mysqli_real_escape_string($con,(strip_tags($_POST["Tipo_Identificacion"],ENT_QUOTES)));
				$Fecha_Nacimiento = mysqli_real_escape_string($con,(strip_tags($_POST["Fecha_Nacimiento"],ENT_QUOTES)));
				$Nacionalidad = mysqli_real_escape_string($con,(strip_tags($_POST["Nacionalidad"],ENT_QUOTES)));
				$Ciudad = mysqli_real_escape_string($con,(strip_tags($_POST["Ciudad"],ENT_QUOTES)));
				$Departamento = mysqli_real_escape_string($con,(strip_tags($_POST["Departamento"],ENT_QUOTES)));
				$Direccion = mysqli_real_escape_string($con,(strip_tags($_POST["Direccion"],ENT_QUOTES)));
				$Direccion_Adicional = mysqli_real_escape_string($con,(strip_tags($_POST["Direccion_Adicional"],ENT_QUOTES)));
				$Estrato = mysqli_real_escape_string($con,(strip_tags($_POST["Estrato"],ENT_QUOTES)));
				$Nivel_Educacion = mysqli_real_escape_string($con,(strip_tags($_POST["Nivel_Educacion"],ENT_QUOTES)));
				$Ocupacion = mysqli_real_escape_string($con,(strip_tags($_POST["Ocupacion"],ENT_QUOTES)));
				$Forma_Pago = mysqli_real_escape_string($con,(strip_tags($_POST["Forma_Pago"],ENT_QUOTES)));
				$Rango_Ingresos = mysqli_real_escape_string($con,(strip_tags($_POST["Rango_Ingresos"],ENT_QUOTES)));
				$Telefono = mysqli_real_escape_string($con,(strip_tags($_POST["Telefono"],ENT_QUOTES)));
				$Direccion_Firma = mysqli_real_escape_string($con,(strip_tags($_POST["Direccion_Firma"],ENT_QUOTES)));
				$Fecha_Firma = mysqli_real_escape_string($con,(strip_tags($_POST["Fecha_Firma"],ENT_QUOTES)));
				$Horario = mysqli_real_escape_string($con,(strip_tags($_POST["Horario"],ENT_QUOTES)));
				$Estado = mysqli_real_escape_string($con,(strip_tags($_POST["Estado"],ENT_QUOTES)));
				$Correo = mysqli_real_escape_string($con,(strip_tags($_POST["Correo"],ENT_QUOTES)));
				
				
				$sql =  "INSERT INTO  Afiliados(Identificacion,Primer_Nombre,Segundo_Nombre,Primer_Apellido,Segundo_Apellido,
												Tipo_Identificacion,Fecha_Nacimiento,Nacionalidad,Ciudad,Departamento,
												Direccion,Direccion_Adicional,Estrato,Nivel_Educacion,Ocupacion,
												Forma_Pago,Rango_Ingresos,Telefono,Direccion_Firma,Fecha_Firma,
												Horario,Estado,Correo) VALUES

				('".$Identificacion."', '".$Primer_Nombre."', '".$Segundo_Nombre."', '".$Primer_Apellido."', '".$Segundo_Apellido."', 
				'".$Tipo_Identificacion."', '".$Fecha_Nacimiento."', '".$Nacionalidad."', '".$Ciudad."', '".$Departamento."', 
				'".$Direccion."', '".$Direccion_Adicional."', '".$Estrato."', '".$Nivel_Educacion."', '".$Ocupacion."', 
				'".$Forma_Pago."', '".$Rango_Ingresos."', '".$Telefono."', '".$Direccion_Firma."', '".$Fecha_Firma."', 
				'".$Horario."', '".$Estado."', '".$Correo."'
				) ON DUPLICATE  KEY UPDATE
				Identificacion = '".$Identificacion."',Primer_Nombre ='".$Primer_Nombre."',Segundo_Nombre='".$Segundo_Nombre."',Primer_Apellido='".$Primer_Apellido."',Segundo_Apellido='".$Segundo_Apellido."',
				Tipo_Identificacion = '".$Tipo_Identificacion."',Fecha_Nacimiento ='".$Fecha_Nacimiento."',Nacionalidad='".$Nacionalidad."',Ciudad='".$Ciudad."',Departamento='".$Departamento."',
				Direccion = '".$Direccion."',Direccion_Adicional ='".$Direccion_Adicional."',Estrato='".$Estrato."',Nivel_Educacion='".$Nivel_Educacion."',Ocupacion='".$Ocupacion."',
				Forma_Pago = '".$Forma_Pago."',Rango_Ingresos ='".$Rango_Ingresos."',Telefono='".$Telefono."',Direccion_Firma='".$Direccion_Firma."',Fecha_Firma='".$Fecha_Firma."',
				Horario='".$Horario."',Estado='".$Estado."',Correo='".$Correo."';";
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