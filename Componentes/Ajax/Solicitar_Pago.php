<?php
include('is_logged.php');
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    require_once("../../libraries/password_compatibility_library.php");
}	
require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	
	$Usuario = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Usuario'], ENT_QUOTES)));

	$sql=mysqli_query($con, "select count(*) from TRANSACCIONESE where Usuario ='".$Usuario."' and Estado='por revisar' ");
	$rw=mysqli_fetch_array($sql);
	if($rw[0]==0){
		if (empty($_POST['NumeroVenta'])){
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error! </strong> 
					No se A selecciondo Ninguna Comision 
			</div>
			<?php
		}else{

			$sql=mysqli_query($con, "select DescBancario,FPrevencion from USUARIOS where Nit ='".$Usuario."' ");
			$rw=mysqli_fetch_array($sql);
			$DescBancario=$rw[0];
			$FPrevencion=$rw[1];
			$sql=mysqli_query($con, "select LAST_INSERT_ID(Numero) as last from TRANSACCIONESE order by Numero desc limit 0,1 ");
			$rw=mysqli_fetch_array($sql);
			$numero_Transaccion=$rw['last']+1;
			$Usuario = $_POST['Nit'];
			date_default_timezone_set('America/Bogota');
			$Fecha=date("Y-m-d"); 
			$sql = "INSERT INTO TRANSACCIONESE(Numero,Usuario,Fecha_Creacion,Fecha_Revision,Valor_Aprovado,
					Valor_Rechazado,Banco,Tipo_Cuenta,Numero_Cuenta,Titular_Cuenta,Estado,DescBancario,FPrevencion,Tipo)
						VALUES('".$numero_Transaccion."','".$Usuario."','".$Fecha."','".$Fecha."',0,
					0,NULL,NULL,NULL,NULL,'por revisar',$DescBancario,$FPrevencion,'Virtual')";				
			$query_update = mysqli_query($con,$sql);
			if ($query_update) {
				$messages[] = "Encabezado Guardado Con Exito";
				foreach($_POST['NumeroVenta'] as $Numero){
					$porciones = explode("-", $Numero);
					$query1=mysqli_query($con, "SELECT ((Credito-Debito)-Comision) As Comision FROM CUENTA_VIRTUAL where  Tipo ='".$porciones[0]."' and  NDocumento =".$porciones[1].";");
					$rw_Admin1=mysqli_fetch_array($query1);
					$Valor=$rw_Admin1['Comision'];
					
					
		
		
					$sql = "INSERT INTO TRANSACCIONESD(Numero,Tipo,NDocumento,Estado,Valor)
						VALUES(".$numero_Transaccion.",'".$porciones[0]."','".$porciones[1]."','Pendiente',".$Valor.")";
					$query_update = mysqli_query($con,$sql);	
					if ($query_update) {
						$messages[] = "Detalle Guardado Con Exito";
						$sql =  "Update CUENTA_VIRTUAL Set Estado='Solicitada' where Tipo ='".$porciones[0]."' and  NDocumento =".$porciones[1].";";				
						$query_update = mysqli_query($con,$sql);
						if ($query_update) {
							$messages[] = "Estado de Cuenta Actualizado";
							if($porciones[0]=='V'){
								$sql =  "Update VENTAS Set Liquidada='Pendiente' where Numero =".$porciones[1].";";				
								$query_update = mysqli_query($con,$sql);
								if ($query_update) {
									$messages[] = "Estado de Venta";
								}else{
									$errors[] ="Error Al Actualizar Estado de Venta <br>".$sql;		
								}
							}
							
						}else{
							$errors[] ="Error Al Actualizar Estado de Cuenta <br>".$sql;	
						}
					}else{
						$errors[] ="Error Al Guardar Detalle <br>".$sql;	
					}	
				}	
			}else{
				$errors[] ="Error Al Guardar Encabezado <br>".$sql;
			}
		}
	}else{
		?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error! </strong> 
					El Usuario ya Tiene una Transferencia Pendiente
			</div>
			<?php
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
			<div class="alert alert-success" role="modal">
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