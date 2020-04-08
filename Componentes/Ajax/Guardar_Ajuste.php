<?php
include('is_logged.php');
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    require_once("../../libraries/password_compatibility_library.php");
}	
require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	if (empty($_POST['UsuarioC'])){
		$errors[] = "El UsuarioA de Creacion Se encuentra Vacio";
	}elseif (empty($_POST['UsuarioA'])){
		$errors[] = "El UsuarioA al que se aplica Esta Vacio";
	}elseif (empty($_POST['Estado'])){
		$errors[] = "Estado";
	}elseif (empty($_POST['Fecha_Creacion'])){
		$errors[] = "Fecha_Creacion";
	}elseif (empty($_POST['Tipo'])){
		$errors[] = "Tipo";
	}elseif (
	 !empty($_POST['UsuarioC'])
		&& !empty($_POST['UsuarioA'])
		&& !empty($_POST['Estado'])
		&& !empty($_POST['Fecha_Creacion'])

		&& !empty($_POST['Tipo'])
	  )
	 {
		$UsuarioC = mysqli_real_escape_string($con,(strip_tags($_POST["UsuarioC"],ENT_QUOTES)));
		$UsuarioA = mysqli_real_escape_string($con,(strip_tags($_POST["UsuarioA"],ENT_QUOTES)));
		$Estado = mysqli_real_escape_string($con,(strip_tags($_POST["Estado"],ENT_QUOTES)));
		$Fecha_Creacion = mysqli_real_escape_string($con,(strip_tags($_POST["Fecha_Creacion"],ENT_QUOTES)));
		$Valor1 = mysqli_real_escape_string($con,(strip_tags($_POST["Valor"],ENT_QUOTES)));
		$Tipo = mysqli_real_escape_string($con,(strip_tags($_POST["Tipo"],ENT_QUOTES)));
		$Observacion = mysqli_real_escape_string($con,(strip_tags($_POST["Observacion"],ENT_QUOTES)));
		$Cuenta = mysqli_real_escape_string($con,(strip_tags($_POST["Cuenta"],ENT_QUOTES)));
		$Comision1 = mysqli_real_escape_string($con,(strip_tags($_POST["Comision"],ENT_QUOTES)));

		$sig=',';
		$Valor = str_replace($sig,'',$Valor1);
		$Comision = str_replace($sig,'',$Comision1);
		$Total = $Valor +$Comision;

		if (isset($_POST['Numero'])) {
			$Numero = mysqli_real_escape_string($con,(strip_tags($_POST["Numero"],ENT_QUOTES)));	
			if ($Numero<>''){
			$Numero_Ajuste = $Numero;	
			}else{
				$sql=mysqli_query($con, "select LAST_INSERT_ID(Numero) as last from AJUSTES order by Numero desc limit 0,1 ");
				$rw=mysqli_fetch_array($sql);
				$Numero_Ajuste=$rw['last']+1;
			}
		}

		$sql =  "INSERT INTO  AJUSTES(Numero,UsuarioC,UsuarioA,Estado,Fecha_Creacion,Valor,Tipo,Observacion,Cuenta,Comision) VALUES
		('".$Numero_Ajuste."', '".$UsuarioC."', '".$UsuarioA."', '".$Estado."', '".$Fecha_Creacion."', '".$Valor."', '".$Tipo."', 
		'".$Observacion."', '".$Cuenta."','$Comision') 
		 ON DUPLICATE  KEY UPDATE UsuarioC = '".$UsuarioC."',UsuarioA = '".$UsuarioA."',
		 Estado = '".$Estado."',Fecha_Creacion = '".$Fecha_Creacion."',Valor = '".$Valor."',Tipo = '".$Tipo."',
		 Observacion = '".$Observacion."',Cuenta='".$Cuenta."',Comision='$Comision'  ";				
		$query_update = mysqli_query($con,$sql);
		if ($query_update) {
			if($Cuenta=='Virtual'){
				$Tabla ='CUENTA_VIRTUAL';	
			}else{
				$Tabla ='FONDO_PREVENCION';	
			}
			$delete=mysqli_query($con, "DELETE FROM  CUENTA_VIRTUAL where  NDocumento='".$Numero_Ajuste."' and Tipo= 'A'");
			$delete=mysqli_query($con, "DELETE FROM  FONDO_PREVENCION where  NDocumento='".$Numero_Ajuste."' and Tipo= 'A'");
			
			$messages[] = "Ajuste Almacenado con Exito";
			if ($Tipo =='Debito'){
				$Debito = $Valor * (-1);
				
				
				$sql = "INSERT INTO ".$Tabla."(Usuario,Tipo,NDocumento,Cruce,NCruce,Debito,Porcentaje,Comision,Estado,Fecha)
						VALUES('".$UsuarioA."','A','".$Numero_Ajuste."','A','".$Numero_Ajuste."','".$Valor."','0','$Comision','Pendiente','".$Fecha_Creacion."')";
				$query_update = mysqli_query($con,$sql);
				if ($query_update) {
					$messages[] = "La Cuanta Se Registro Correctamente,";
				} else {
					$errors[] = $sql;
				}
			}else{
				
					$Credito = $Valor;
					$Comision = $Comision * (-1);
					$sql = "INSERT INTO ".$Tabla."(Usuario,Tipo,NDocumento,Cruce,NCruce,Credito,Porcentaje,Comision,Estado,Fecha)
							VALUES('".$UsuarioA."','A','".$Numero_Ajuste."','A','".$Numero_Ajuste."','".$Valor."','$Comision','".$Credito."','Pendiente','".$Fecha_Creacion."')";
					$query_update = mysqli_query($con,$sql);
					if ($query_update) {
						$messages[] = "La Cuanta Se Registro Correctamente,";
					} else {
						$errors[] = $sql;
					}
				
			}



		}else{
			$errors[] = $sql;
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