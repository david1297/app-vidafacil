<?php
include('is_logged.php');
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    require_once("../../libraries/password_compatibility_library.php");
}	
if (empty($_POST['Vigencia'])){
	$errors[] = "Vigencia";
} elseif (empty($_POST['Categoria'])){
	$errors[] = "Categoria";
} elseif (!empty($_POST['Vigencia']) && !empty($_POST['Categoria'])){
            require_once ("../../config/db.php");
			require_once ("../../config/conexion.php");
				$ServicioS = mysqli_real_escape_string($con,(strip_tags($_POST["ServicioS"],ENT_QUOTES)));
				$Convenio = mysqli_real_escape_string($con,(strip_tags($_POST["Convenio"],ENT_QUOTES)));
				$Servicio = mysqli_real_escape_string($con,(strip_tags($_POST["Servicio"],ENT_QUOTES)));
				$Ciudad = mysqli_real_escape_string($con,(strip_tags($_POST["Ciudad"],ENT_QUOTES)));
				$ubicacion = mysqli_real_escape_string($con,(strip_tags($_POST["ubicacion"],ENT_QUOTES)));
				$Porcentaje = mysqli_real_escape_string($con,(strip_tags($_POST["Porcentaje"],ENT_QUOTES)));
				$Descripcion = mysqli_real_escape_string($con,(strip_tags($_POST["Descripcion"],ENT_QUOTES)));
				$Terminos = mysqli_real_escape_string($con,(strip_tags($_POST["Terminos"],ENT_QUOTES)));
				$Uso = mysqli_real_escape_string($con,(strip_tags($_POST["Uso"],ENT_QUOTES)));
				$Persona = mysqli_real_escape_string($con,(strip_tags($_POST["Persona"],ENT_QUOTES)));
				$Correo = mysqli_real_escape_string($con,(strip_tags($_POST["Correo"],ENT_QUOTES)));
				$Telefono = mysqli_real_escape_string($con,(strip_tags($_POST["Telefono"],ENT_QUOTES)));
				$Direccion = mysqli_real_escape_string($con,(strip_tags($_POST["Direccion"],ENT_QUOTES)));
				$Vigencia = mysqli_real_escape_string($con,(strip_tags($_POST["Vigencia"],ENT_QUOTES)));
				$FirmaVf = mysqli_real_escape_string($con,(strip_tags($_POST["FirmaVf"],ENT_QUOTES)));
				$FirmaAc = mysqli_real_escape_string($con,(strip_tags($_POST["FirmaAc"],ENT_QUOTES)));
				$Correo1 = mysqli_real_escape_string($con,(strip_tags($_POST["Correo1"],ENT_QUOTES)));
				$Categoria = mysqli_real_escape_string($con,(strip_tags($_POST["Categoria"],ENT_QUOTES)));
				$Codigo = mysqli_real_escape_string($con,(strip_tags($_POST["Codigo"],ENT_QUOTES)));
				

				if($Codigo=='0'){
					$sql =  " INSERT INTO DIRECTORIO (ServicioS,Convenio,Servicio,Ciudad,ubicacion,Porcentaje,Descripcion,Terminos,Uso,Persona,Correo,Telefono,
					Direccion,Vigencia,FirmaVf,FirmaAc,Correo1,Categoria)VALUES
					('".$ServicioS."','".$Convenio."','".$Servicio."','".$Ciudad."','".$ubicacion."','".$Porcentaje."','".$Descripcion."','".$Terminos."','".$Uso."','".$Persona."',
					'".$Correo."','".$Telefono."','".$Direccion."','".$Vigencia."','".$FirmaVf."','".$FirmaAc."','".$Correo1."','".$Categoria."')";
					$query_update = mysqli_query($con,$sql);
					if ($query_update) {
						$messages[] ="Correcto";
						$sql=mysqli_query($con, "select LAST_INSERT_ID(Codigo) as last from DIRECTORIO order by Codigo desc limit 0,1 ");
						$rw=mysqli_fetch_array($sql);
						$Codigo=$rw['last'];
                    } else {
						$errors[] = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
						

                    }
				
				}else{
					$sql =  " UPDATE DIRECTORIO Set 
					ServicioS ='".$ServicioS."',
					Convenio='".$Convenio."',
					Servicio='".$Servicio."',
					Ciudad='".$Ciudad."',
					ubicacion = '".$ubicacion."',
					Porcentaje='".$Porcentaje."',
					Descripcion='".$Descripcion."',
					Terminos='".$Terminos."',
					Uso = '".$Uso."',
					Persona ='".$Persona."',
					Correo='".$Correo."',
					Telefono='".$Telefono."',
					Direccion='".$Direccion."',Vigencia='".$Vigencia."',FirmaVf='".$FirmaVf."'
					,FirmaAc='".$FirmaAc."',Correo1='".$Correo1."',Categoria='".$Categoria."'					
					WHERE Codigo = $Codigo";
					$query_update = mysqli_query($con,$sql);
					if ($query_update) {
						$messages[] ="Correcto";

						
                    } else {
                        $errors[] = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
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
				echo '*Correcto*'.$Codigo.'*';
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