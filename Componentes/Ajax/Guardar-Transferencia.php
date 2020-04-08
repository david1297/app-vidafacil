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
		$Estado = mysqli_real_escape_string($con,(strip_tags($_POST["Estado"],ENT_QUOTES)));
		$TotalPago = mysqli_real_escape_string($con,(strip_tags($_POST["TotalPago"],ENT_QUOTES)));
		$DescBancario = mysqli_real_escape_string($con,(strip_tags($_POST["DescBancario"],ENT_QUOTES)));
		$Tipo = mysqli_real_escape_string($con,(strip_tags($_POST["Tipo"],ENT_QUOTES)));

		$Fondo =0;
		
		if($Estado<>'Aprobada'){
			$Valor_Aprovado=0;
			$Valor_Rechazado=0;
			$TotalPago=0;	
			$Fondo=0;
		}

		$sql =  "Update TRANSACCIONESE Set Fecha_Revision='".$Fecha_Revision."',Valor_Rechazado=".$Valor_Rechazado.",
		Banco='".$Banco."',Tipo_Cuenta='".$Tipo_Cuenta."',Valor_Aprovado=".$Valor_Aprovado.",Numero_Cuenta='".$Numero_Cuenta."',
		Titular_Cuenta='".$Titular_Cuenta."',Estado='".$Estado."',
		TotalPago=".$TotalPago.",
		DescBancario=".$DescBancario."
		where Numero =".$Numero.";";				
		$query_update = mysqli_query($con,$sql);
		if ($query_update) {
			$delete=mysqli_query($con, "DELETE FROM  CUENTA_VIRTUAL where  NDocumento=".$Numero." and Tipo ='T' ");
			$delete=mysqli_query($con, "DELETE FROM  FONDO_PREVENCION where  NDocumento=".$Numero." and Tipo ='T' ");
			$messages[] = "Encabezado Actualizado";
			if ($Tipo =='F.Prevencion'){
				$Tabla='FONDO_PREVENCION';	
			}else{
				$Tabla='CUENTA_VIRTUAL';
			}
			if($Estado=='por revisar'){
				$sql =  "Update TRANSACCIONESD Set Estado='Pendiente' where Numero =".$Numero.";";				
				$query_update = mysqli_query($con,$sql);
				
			}else{
				if($Estado=='Aprobada'){
					$query1=mysqli_query($con, "SELECT Usuario,FPrevencion FROM TRANSACCIONESE where Numero =".$Numero." ");
					$rw_Admin1=mysqli_fetch_array($query1);
					$Usuario=$rw_Admin1['Usuario'];
					$FPrevencion=$rw_Admin1['FPrevencion'];

					$Fondo = (($Valor_Aprovado-$DescBancario)*($FPrevencion/100));

					if ($Tipo =='F.Prevencion'){
						
						$sql = "INSERT INTO FONDO_PREVENCION(Usuario,Tipo,NDocumento,Cruce,NCruce,Credito,Debito,Porcentaje,Comision,Estado,Fecha)
										VALUES('".$Usuario."','T','".$Numero."','T','".$Numero."','0','".$TotalPago."','0','0','Pagada','".date("Y-m-d")."')";
						$query_update = mysqli_query($con,$sql);
						$sql = "INSERT INTO CUENTA_VIRTUAL(Usuario,Tipo,NDocumento,Cruce,NCruce,Credito,Debito,Porcentaje,Comision,Estado,Fecha)
										VALUES('".$Usuario."','T','".$Numero."','T','".$Numero."','0','".$TotalPago."','0','0','Pagada','".date("Y-m-d")."')";
						$query_update = mysqli_query($con,$sql);
					}else{
						
						$sql = "INSERT INTO CUENTA_VIRTUAL(Usuario,Tipo,NDocumento,Cruce,NCruce,Credito,Debito,Porcentaje,Comision,Estado,Fecha)
										VALUES('".$Usuario."','T','".$Numero."','T','".$Numero."','0','".$TotalPago."','0','0','Pagada','".date("Y-m-d")."')";
						$query_update = mysqli_query($con,$sql);

						$sql = "INSERT INTO FONDO_PREVENCION(Usuario,Tipo,NDocumento,Cruce,NCruce,Credito,Debito,Porcentaje,Comision,Estado,Fecha)
											VALUES('".$Usuario."','T','".$Numero."','T','".$Numero."','".$Fondo."','0','0','0','Pendiente','".date("Y-m-d")."')";
						$query_update = mysqli_query($con,$sql);
						$query1=mysqli_query($con, "SELECT F1,CFondo FROM USUARIOS WHERE  Nit ='".$Usuario."' ");
						$rw_Admin1=mysqli_fetch_array($query1);
						$F1=$rw_Admin1[0];
						$CFondo=$rw_Admin1[1];
						
						if(empty($F1)){
							$F1 = date("Y-m-d");
							if($CFondo==3){
								$Dias = 90;
							}else{
								$Dias= 180;
							}
		
							$F2 = strtotime($F1."+ ".$Dias." days");
							$F3 = strtotime($F1."+ ".($Dias*2)." days");
							$F4 = strtotime($F1."+ ".($Dias*3)." days");

							
							$sql =  "Update USUARIOS Set F1='".$F1."' where Nit ='".$Usuario."';";				
							$query_update = mysqli_query($con,$sql);
							$sql =  "Update USUARIOS Set F2='".date("Y-m-d",$F2)."' where Nit ='".$Usuario."';";				
							$query_update = mysqli_query($con,$sql);
							$sql =  "Update USUARIOS Set F3='".date("Y-m-d",$F3)."' where Nit ='".$Usuario."';";				
							$query_update = mysqli_query($con,$sql);
							$sql =  "Update USUARIOS Set F4='".date("Y-m-d",$F4)."' where Nit ='".$Usuario."';";				
							$query_update = mysqli_query($con,$sql);
						}
					}
					$sql =  "Update TRANSACCIONESD Set Estado='Rechazada' where Numero =".$Numero.";";				
					$query_update = mysqli_query($con,$sql);
					if (isset($_POST['NumeroVenta'])) {
						foreach($_POST['NumeroVenta'] as $Venta){
							$porciones = explode("-", $Venta);
							$sql =  "Update TRANSACCIONESD Set Estado='Pagada' where Numero =".$Numero." and Tipo='".$porciones[0]."'
							and NDocumento=".$porciones[1]."; ";			
							$query_update = mysqli_query($con,$sql);
						}
					}
				}else{
					$sql =  "Update TRANSACCIONESD Set Estado='Rechazada' where Numero =".$Numero.";";				
					$query_update = mysqli_query($con,$sql);
					
				}
			}
			
			
			

			$sql="select TRANSACCIONESE.Usuario,TRANSACCIONESD.NDocumento,TRANSACCIONESD.Tipo,TRANSACCIONESD.Estado,TRANSACCIONESD.Valor from TRANSACCIONESE
			inner join TRANSACCIONESD on TRANSACCIONESD.Numero = TRANSACCIONESE.Numero where TRANSACCIONESE.Numero=".$Numero." ";
			$query = mysqli_query($con, $sql);
			while ($row=mysqli_fetch_array($query)){
				$Usuario=$row['Usuario'];
				$Tipo=$row['Tipo'];
				$Valor=$row['Valor'];
				$NDocumento=$row['NDocumento'];
				$Estado=$row['Estado'];
				if ($Estado=='Rechazada'){
					$Estado='Pendiente';
				}else{
					if ($Estado=='Pendiente'){
						$Estado='Solicitada';
					}		
				}
				$sql =  "Update ".$Tabla." Set Estado='".$Estado."' where NDocumento =".$NDocumento." and Tipo ='".$Tipo."';";				
				$query_update = mysqli_query($con,$sql);
								
				if (($Estado =='Pagada')&&($Tipo=='V')){
					$sql =  "Update VENTAS Set Liquidada='True' where Numero =".$NDocumento.";";				
					$query_update = mysqli_query($con,$sql);
				}
			}

		}else{
			echo $sql;
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