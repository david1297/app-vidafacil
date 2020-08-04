<?php
include('is_logged.php');
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    require_once("../../libraries/password_compatibility_library.php");
}	
if (empty($_POST['FechaI'])){
	$errors[] = "FechaI";
} elseif (empty($_POST['FechaV'])){
	$errors[] = "FechaV";
}elseif (empty($_POST['DescuentoH'])){
	$errors[] = "DescuentoH";
}elseif (empty($_POST['Categoria'])){
	$errors[] = "Categoria";
} elseif (!empty($_POST['FechaI']) && !empty($_POST['Categoria'])){
            require_once ("../../config/db.php");
			require_once ("../../config/conexion.php");
				$Codigo = mysqli_real_escape_string($con,(strip_tags($_POST["Codigo"],ENT_QUOTES)));
				$Categoria = mysqli_real_escape_string($con,(strip_tags($_POST["Categoria"],ENT_QUOTES)));
				$FechaI = mysqli_real_escape_string($con,(strip_tags($_POST["FechaI"],ENT_QUOTES)));
				$FechaV = mysqli_real_escape_string($con,(strip_tags($_POST["FechaV"],ENT_QUOTES)));
				$NombreEmpresa = mysqli_real_escape_string($con,(strip_tags($_POST["NombreEmpresa"],ENT_QUOTES)));
				$Beneficio = mysqli_real_escape_string($con,(strip_tags($_POST["Beneficio"],ENT_QUOTES)));
				$DescuentoH = mysqli_real_escape_string($con,(strip_tags($_POST["DescuentoH"],ENT_QUOTES)));
				$Cobertura = mysqli_real_escape_string($con,(strip_tags($_POST["Cobertura"],ENT_QUOTES)));
				$Servicio = mysqli_real_escape_string($con,(strip_tags($_POST["Servicio"],ENT_QUOTES)));
				$Descripcion = mysqli_real_escape_string($con,(strip_tags($_POST["Descripcion"],ENT_QUOTES)));
				$PersonaC = mysqli_real_escape_string($con,(strip_tags($_POST["PersonaC"],ENT_QUOTES)));
				$Celular = mysqli_real_escape_string($con,(strip_tags($_POST["Celular"],ENT_QUOTES)));
				$Correo = mysqli_real_escape_string($con,(strip_tags($_POST["Correo"],ENT_QUOTES)));
				$Whatsapp = mysqli_real_escape_string($con,(strip_tags($_POST["Whatsapp"],ENT_QUOTES)));
				$PaginaWeb = mysqli_real_escape_string($con,(strip_tags($_POST["PaginaWeb"],ENT_QUOTES)));
				$Uso = mysqli_real_escape_string($con,(strip_tags($_POST["Uso"],ENT_QUOTES)));
				$Terminos = mysqli_real_escape_string($con,(strip_tags($_POST["Terminos"],ENT_QUOTES)));
				$Politicas = mysqli_real_escape_string($con,(strip_tags($_POST["Politicas"],ENT_QUOTES)));
				$AutorizacionLogo = mysqli_real_escape_string($con,(strip_tags($_POST["AutorizacionLogo"],ENT_QUOTES)));
				
				if($Codigo=='0'){
					$sql =  " INSERT INTO DIRECTORIO (Celular,Categoria,FechaI,FechaV,NombreEmpresa,Beneficio,DescuentoH,Cobertura,Servicio,Descripcion,PersonaC,Whatsapp,
					PaginaWeb,Uso,Terminos,Politicas,AutorizacionLogo,Correo)VALUES
					('".$Celular."','".$Categoria."','".$FechaI."','".$FechaV."','".$NombreEmpresa."','".$Beneficio."','".$DescuentoH."','".$Cobertura."','".$Servicio."','".$Descripcion."',
					'".$PersonaC."','".$Whatsapp."','".$PaginaWeb."','".$Uso."','".$Terminos."','".$Politicas."','".$AutorizacionLogo."','".$Correo."')";
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
					Categoria ='".$Categoria."',
					FechaI='".$FechaI."',
					FechaV='".$FechaV."',
					NombreEmpresa='".$NombreEmpresa."',
					Beneficio = '".$Beneficio."',
					DescuentoH='".$DescuentoH."',
					Cobertura='".$Cobertura."',
					Servicio='".$Servicio."',
					Descripcion = '".$Descripcion."',
					PersonaC ='".$PersonaC."',
					Celular='".$Celular."',
					Correo='".$Correo."',
					Whatsapp='".$Whatsapp."',PaginaWeb='".$PaginaWeb."',Uso='".$Uso."'
					,Terminos='".$Terminos."',Politicas='".$Politicas."',AutorizacionLogo='".$AutorizacionLogo."'					
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