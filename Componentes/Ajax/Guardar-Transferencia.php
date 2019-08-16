<?php
include('is_logged.php');
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    require_once("../../libraries/password_compatibility_library.php");
}	
require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	if (empty($_POST['Numero'])){
		$errors[] = "El Numero  Se Encuentra Vacio";
	}elseif (empty($_POST['Fecha_Revision'])){
		$errors[] = "Fecha_Revision";
	}elseif (empty($_POST['Banco'])){
		$errors[] = "Banco";
	}elseif (empty($_POST['Tipo_Cuenta'])){
		$errors[] = "Tipo_Cuenta";
	}elseif (empty($_POST['Numero_Cuenta'])){
		$errors[] = "Numero_Cuenta";
	}elseif (empty($_POST['Titular_Cuenta'])){
		$errors[] = "Titular_Cuenta";
	}elseif (
		!empty($_POST['Numero'])
		&& !empty($_POST['Fecha_Revision'])
		&& !empty($_POST['Banco'])
		&& !empty($_POST['Tipo_Cuenta'])
		&& !empty($_POST['Numero_Cuenta'])
		&& !empty($_POST['Titular_Cuenta'])
	  )
	 {
		
		$Numero = mysqli_real_escape_string($con,(strip_tags($_POST["Numero"],ENT_QUOTES)));
		$Fecha_Revision = mysqli_real_escape_string($con,(strip_tags($_POST["Fecha_Revision"],ENT_QUOTES)));
		$Valor_Rechazado = mysqli_real_escape_string($con,(strip_tags($_POST["Valor_Rechazado"],ENT_QUOTES)));
		$Banco = mysqli_real_escape_string($con,(strip_tags($_POST["Banco"],ENT_QUOTES)));
		$Tipo_Cuenta = mysqli_real_escape_string($con,(strip_tags($_POST["Tipo_Cuenta"],ENT_QUOTES)));
		$Valor_Aprovado = mysqli_real_escape_string($con,(strip_tags($_POST["Valor_Aprovado"],ENT_QUOTES)));
		$Numero_Cuenta = mysqli_real_escape_string($con,(strip_tags($_POST["Numero_Cuenta"],ENT_QUOTES)));
		$Titular_Cuenta = mysqli_real_escape_string($con,(strip_tags($_POST["Titular_Cuenta"],ENT_QUOTES)));
		$sql =  "Update TRANSACCIONESE Set Fecha_Revision='".$Fecha_Revision."',Valor_Rechazado=".$Valor_Rechazado.",
		Banco='".$Banco."',Tipo_Cuenta='".$Tipo_Cuenta."',Valor_Aprovado=".$Valor_Aprovado.",Numero_Cuenta='".$Numero_Cuenta."',
		Titular_Cuenta='".$Titular_Cuenta."',Estado='Revisada' where Numero =".$Numero.";";				
		$query_update = mysqli_query($con,$sql);
		if ($query_update) {
			
			$messages[] = "Encabezado Actualizado";
			$sql =  "Update TRANSACCIONESD Set Estado='Rechazada' where Numero =".$Numero.";";				
			$query_update = mysqli_query($con,$sql);
			if ($query_update) {
				foreach($_POST['NumeroVenta'] as $Venta){
					$porciones = explode("-", $Venta);
					$sql =  "Update TRANSACCIONESD Set Estado='Pagada' where Numero =".$Numero." and Tipo='".$porciones[0]."'
					and NDocumento=".$porciones[1]."; ";			
					$query_update = mysqli_query($con,$sql);
				}	
				$messages[] = "Estado de Venta";
			}else{
				$errors[] ="Error Al Actualizar Estado de Venta <br>".$sql;		
			}
		}
		$delete=mysqli_query($con, "DELETE FROM  CUENTA_VIRTUAL where  NDocumento=".$Numero." and Tipo ='T' ");
		$sql="select TRANSACCIONESE.Usuario,TransaccionesD.NDocumento,TransaccionesD.Tipo,TransaccionesD.Estado,TransaccionesD.Valor from TRANSACCIONESE
		inner join TransaccionesD on TransaccionesD.Numero = TRANSACCIONESE.Numero where TRANSACCIONESE.Numero=".$Numero." ";
		
		$query = mysqli_query($con, $sql);

		while ($row=mysqli_fetch_array($query)){
		$Usuario=$row['Usuario'];
		$Tipo=$row['Tipo'];
		$Valor=$row['Valor'];
		$NDocumento=$row['NDocumento'];
		$Estado=$row['Estado'];
		$sql =  "Update CUENTA_VIRTUAL Set Estado='".$Estado."' where NDocumento =".$NDocumento." and Tipo ='".$Tipo."';";				
		$query_update = mysqli_query($con,$sql);
		$Debito=0;			
		$Credito=0;
		if ($Valor > 0){
			$Debito = $Valor;
			$Valor = $Valor*(-1);
		}else{
			$Valor = $Valor*(-1);
			$Credito = $Valor;
		}
		;					

		$sql = "INSERT INTO CUENTA_VIRTUAL(Usuario,Tipo,NDocumento,Cruce,NCruce,Credito,Debito,Porcentaje,Comision,Estado,Fecha)
									VALUES('".$Usuario."','T','".$Numero."','".$Tipo."','".$NDocumento."','".$Credito."','".$Debito."','0','".$Valor."','Pagada','".date("Y-m-d")."')";
		$query_update = mysqli_query($con,$sql);						

		$sql =  "Update Ventas Set Liquidada='True' where Numero =".$Venta.";";				
		$query_update = mysqli_query($con,$sql);
	
		}
		if (isset($_POST['Observaciones'])) {
			$User=$_SESSION['Nit'];
			$Observaciones = mysqli_real_escape_string($con,(strip_tags($_POST["Observaciones"],ENT_QUOTES)));	
			if ($Observaciones<>''){
				$Fecha =date("Y-m-d");
				$sql =  "INSERT INTO  OBSERVACIONES_TRANSFERENCIAS(Transferencia,Fecha,Observacion,Usuario) VALUES
				('".$Numero."', '".$Fecha."', '".$Observaciones."', '".$User."')";
			 $query_update = mysqli_query($con,$sql);
			 if ($query_update) {
				 $messages[] = "Los Datos Se Han Modificado Con Exito.";
			 } else {
				 $errors[] = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
			 }	
			}
		
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