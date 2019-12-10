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
}elseif (($_POST['Tipo_Persona']=='Narutal') && ((empty($_POST['Razon_Social'])) || (empty($_POST['Nombre'])) ||  (empty($_POST['Apellido']))) ){
	$errors[] = "La Razon Social o Nombres Se Encuentra Vacia";
}  
elseif (($_POST['Tipo_Persona']=='Juridica') && ( (empty($_POST['Razon_Social'])) )){
	$errors[] = "La Razon Social Se Encuentra Vacia";
}elseif (empty($_POST['Rol'])){
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
}  elseif (($_POST['Tipo']=='Distribuidor') && (empty($_POST['Rep_Legal']))){
	$errors[] = "El Representante Legal Se Encuentra Vacio";
} elseif (($_POST['Tipo']=='Distribuidor') && (empty($_POST['CC']))){
	$errors[] = "El Numero de Documento Representante Legal Se Encuentra Vacio";
} elseif (($_POST['Tipo']=='Operador') && (empty($_POST['Area']))){
	$errors[] = "El Area se Encuentra Vacia";
} elseif (($_POST['Tipo']=='Distribuidor') && (empty($_POST['Nombre_R1']))){
	$errors[] = "El Nombre de La Referencia 1 Se Encuentra Vacio";
} elseif (($_POST['Tipo']=='Distribuidor') && (empty($_POST['Tel_R1']))){
	$errors[] = "El Tefefono de La Referencia 1 Se Encuentra Vacio";
} elseif (($_POST['Tipo']=='Distribuidor') && (empty($_POST['Nombre_R2']))){
	$errors[] = "El Nombre de La Referencia 2 Se Encuentra Vacio";
} elseif (($_POST['Tipo']=='Distribuidor') && (empty($_POST['Tel_R2']))){
	$errors[] = "El Tefefono de La Referencia 2 Se Encuentra Vacio";	
} elseif (
			!empty($_POST['Nit'])
			&& !empty($_POST['Tipo_Persona'])
			&& !empty($_POST['Rol'])
			&& !empty($_POST['Estado'])
			&& !empty($_POST['Tipo'])
			&& !empty($_POST['Tel_C'])
			&& !empty($_POST['Direccion'])
			&& filter_var($_POST['Correo'], FILTER_VALIDATE_EMAIL)
			&& !empty($_POST['Cel_C'])
			&& filter_var($_POST['Correo_C'], FILTER_VALIDATE_EMAIL)
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
				$Portafolio = mysqli_real_escape_string($con,(strip_tags($_POST["Portafolio"],ENT_QUOTES)));
				$Rep_Legal = mysqli_real_escape_string($con,(strip_tags($_POST["Rep_Legal"],ENT_QUOTES)));
				$CC = mysqli_real_escape_string($con,(strip_tags($_POST["CC"],ENT_QUOTES)));
				$Nombre_R1 = mysqli_real_escape_string($con,(strip_tags($_POST["Nombre_R1"],ENT_QUOTES)));
				$Tel_R1 = mysqli_real_escape_string($con,(strip_tags($_POST["Tel_R1"],ENT_QUOTES)));
				$Nombre_R2 = mysqli_real_escape_string($con,(strip_tags($_POST["Nombre_R2"],ENT_QUOTES)));
				$Tel_R2 = mysqli_real_escape_string($con,(strip_tags($_POST["Tel_R2"],ENT_QUOTES)));
				
				$Banco_1 = mysqli_real_escape_string($con,(strip_tags($_POST["Banco_1"],ENT_QUOTES)));
				$Tipo_Banco_1 = mysqli_real_escape_string($con,(strip_tags($_POST["Tipo_Banco_1"],ENT_QUOTES)));
				$Numero_Cuenta_1 = mysqli_real_escape_string($con,(strip_tags($_POST["Numero_Cuenta_1"],ENT_QUOTES)));
				$Banco_2 = mysqli_real_escape_string($con,(strip_tags($_POST["Banco_2"],ENT_QUOTES)));
				$Tipo_Banco_2 = mysqli_real_escape_string($con,(strip_tags($_POST["Tipo_Banco_2"],ENT_QUOTES)));
				$Numero_Cuenta_2 = mysqli_real_escape_string($con,(strip_tags($_POST["Numero_Cuenta_2"],ENT_QUOTES)));
				$Titular_1 = mysqli_real_escape_string($con,(strip_tags($_POST["Titular_1"],ENT_QUOTES)));
				$Titular_2 = mysqli_real_escape_string($con,(strip_tags($_POST["Titular_2"],ENT_QUOTES)));
				$Indicativo = mysqli_real_escape_string($con,(strip_tags($_POST["Indicativo"],ENT_QUOTES)));
				$D1 = mysqli_real_escape_string($con,(strip_tags($_POST["D1"],ENT_QUOTES)));
				$D2 = mysqli_real_escape_string($con,(strip_tags($_POST["D2"],ENT_QUOTES)));
				$D3 = mysqli_real_escape_string($con,(strip_tags($_POST["D3"],ENT_QUOTES)));
				$CantAfiliados = mysqli_real_escape_string($con,(strip_tags($_POST["CantAfiliados"],ENT_QUOTES)));
				$Area = mysqli_real_escape_string($con,(strip_tags($_POST["Area"],ENT_QUOTES)));


				$sql =  "INSERT INTO  USUARIOS(Nit,Tipo_Persona,Razon_Social,Nombre,Apellido,Rol,Estado,Tipo,Tel_C,Direccion,
				Correo,Cel_C,Correo_C,Porcentaje,Portafolio,Rep_Legal,CC,Nombre_R1,Tel_R1,Nombre_R2,Tel_R2,Banco_1,Tipo_Banco_1,Numero_Cuenta_1,Banco_2,Tipo_Banco_2,Numero_Cuenta_2,Titular_1,Titular_2,Indicativo,D1,D2,D3,CantAfiliados,Area) VALUES

				('".$Nit."', '".$Tipo_Persona."', '".$Razon_Social."', '".$Nombre."', '".$Apellido."', '".$Rol."', '".$Estado."', '".$Tipo."', '".$Tel_C."', '".$Direccion."'
				, '".$Correo."', '".$Cel_C."', '".$Correo_C."',".$Porcentaje.",".$Portafolio.", '".$Rep_Legal."', '".$CC."', '".$Nombre_R1."', '".$Tel_R1."', '".$Nombre_R2."', '".$Tel_R2."'
				, '".$Banco_1."', '".$Tipo_Banco_1."', '".$Numero_Cuenta_1."', '".$Banco_2."', '".$Tipo_Banco_2."', '".$Numero_Cuenta_2."', '".$Titular_1."', '".$Titular_2."', '".$Indicativo."', '".$D1."', '".$D2."', '".$D3."',".$CantAfiliados.",".$Area."
				) ON DUPLICATE  KEY UPDATE
				Tipo_Persona = '".$Tipo_Persona."',Razon_Social ='".$Razon_Social."',Nombre='".$Nombre."',Apellido='".$Apellido."',Rol='".$Rol."',Estado='".$Estado."',Tipo='".$Tipo."',Tel_C='".$Tel_C."',Direccion='".$Direccion."' 
				,Correo='".$Correo."',Cel_C='".$Cel_C."',Correo_C='".$Correo_C."',Porcentaje=".$Porcentaje.",Portafolio=".$Portafolio.",Rep_Legal='".$Rep_Legal."',CC='".$CC."',Nombre_R1='".$Nombre_R1."',Tel_R1='".$Tel_R1."',Nombre_R2='".$Nombre_R2."',Tel_R2='".$Tel_R2."'
				,Banco_1='".$Banco_1."',Tipo_Banco_1='".$Tipo_Banco_1."',Numero_Cuenta_1='".$Numero_Cuenta_1."',Banco_2='".$Banco_2."',Tipo_Banco_2='".$Tipo_Banco_2."',Numero_Cuenta_2='".$Numero_Cuenta_2."'
				,Titular_1='".$Titular_1."',Titular_2='".$Titular_2."',Indicativo='".$Indicativo."'
				,D1='".$D1."',D2='".$D2."',D3='".$D3."',CantAfiliados =".$CantAfiliados." ,Area =".$Area." ;";
				
                    $query_update = mysqli_query($con,$sql);
                    if ($query_update) {
                        $messages[] = "Los Datos Se Han Guardado Con Exito.";
                    } else {
                        $errors[] = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
					}
					$EstadoU = mysqli_real_escape_string($con,(strip_tags($_POST["EstadoU"],ENT_QUOTES)));
					if($EstadoU=='Nuevo'){
						$sql =  "INSERT INTO PERMISOS (Modulo, Permiso, Estado,Usuario, Descripcion) VALUES 
						('Afiliados', 'Ingreso', 'false', '".$Nit."', 'Ingreso al Modulo'),
						('Contabilidad', 'Ingreso', 'false', '".$Nit."', 'Ingreso al Modulo'),
						('Transacciones', 'Ingreso', 'false', '".$Nit."', 'Ingreso al Modulo'),
						('Campanas', 'Ingreso', 'false', '".$Nit."', 'Ingreso al Modulo'),
						('CuentaVirtual', 'Ingreso', 'false', '".$Nit."', 'Ingreso al Modulo'),
						('Transferencias', 'Ingreso', 'false', '".$Nit."', 'Ingreso al Modulo'),
						('Transferencias', 'ConsultarTodo', 'false', '".$Nit."', 'Consultar No Asignadas'),
						('Usuarios', 'Ingreso', 'false', '".$Nit."', 'Ingreso al Modulo'),
						('Ajustes', 'Ingreso', 'false', '".$Nit."', 'Ingreso al Modulo'),
						('Ajustes', 'Crear', 'false', '".$Nit."', 'Crear Ajuste'),
						('Ajustes', 'Consultar', 'false', '".$Nit."', 'Consultar'),
						('Ajustes', 'ConsultarTodo', 'false', '".$Nit."', 'Consultar No Asignados'),
						('Campanas', 'Crear', 'false', '".$Nit."', 'Crear Campaña'),
						('Campanas', 'Consultar', 'false', '".$Nit."', 'Consultar Campañas'),
						('Afiliados', 'Crear', 'false', '".$Nit."', 'Crear Afiliado'),
						('Afiliados', 'Editar', 'false', '".$Nit."', 'Editar Afiliado'),
						('Afiliados', 'ConsultarTodo', 'false', '".$Nit."', 'Consultar No Asignados'),
						('Transacciones', 'CambiarEstado', 'false', '".$Nit."', 'Cambiar Estados'),
						('Usuarios', 'Crear', 'false', '".$Nit."', 'Crear Usuario'),
						('Usuarios', 'Editar', 'false', '".$Nit."', 'Editar Usuario'),
						('Usuarios', 'CuentaVirtual', 'false', '".$Nit."', 'Ingreso Cuenta Virtual'),
						
						('Transacciones', 'Crear', 'false', '".$Nit."', 'Crear Transaccion'),
						('Transacciones', 'Consultar', 'false', '".$Nit."', 'Consultar Transacciones'),
						('Transacciones', 'ConsultarTodo', 'false', '".$Nit."', 'Consultar No Asignadas'),
						('Transacciones', 'TipificaionesSeguimiento', 'false', '".$Nit."', 'Cambiar Tipificaciones y Seguimiento')
						
						
						;";
							$query_update = mysqli_query($con,$sql);
							if ($query_update) {
								$messages[] = "Los Datos Se Han Guardado Con Exito.";
							} else {
								$errors[] = $sql;
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