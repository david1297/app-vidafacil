<?php
include('is_logged.php');
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    require_once("../../libraries/password_compatibility_library.php");
}	
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	
	$Fondo = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Fondo'], ENT_QUOTES)));
	$Usuario = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Usuario'], ENT_QUOTES)));
	$sql=mysqli_query($con, "select count(*) from TRANSACCIONESE where Usuario ='".$Usuario."' and Estado='por revisar' ");
	$rw=mysqli_fetch_array($sql);
	if($rw[0]==0){
		

			$sql=mysqli_query($con, "select DescBancario,FPrevencion from USUARIOS where Nit ='".$Usuario."' ");
			$rw=mysqli_fetch_array($sql);
			$DescBancario=$rw[0];
			$FPrevencion=0;
			$sql=mysqli_query($con, "select LAST_INSERT_ID(Numero) as last from TRANSACCIONESE order by Numero desc limit 0,1 ");
			$rw=mysqli_fetch_array($sql);
			$numero_Transaccion=$rw['last']+1;
			$Fecha=date("Y-m-d"); 
			$sql = "INSERT INTO TRANSACCIONESE(Numero,Usuario,Fecha_Creacion,Fecha_Revision,Valor_Aprovado,
					Valor_Rechazado,Banco,Tipo_Cuenta,Numero_Cuenta,Titular_Cuenta,Estado,DescBancario,FPrevencion,Tipo)
						VALUES('".$numero_Transaccion."','".$Usuario."','".$Fecha."','".$Fecha."',0,
					0,NULL,NULL,NULL,NULL,'por revisar',$DescBancario,$FPrevencion,'Prevencion')";				
			$query_update = mysqli_query($con,$sql);
			if ($query_update) {
				$messages[] = "Encabezado Guardado Con Exito";
				$query1=mysqli_query($con, "SELECT CFondo,".$Fondo." FROM USUARIOS Where Nit='".$Usuario."' ");			
				$rw_Admin1=mysqli_fetch_array($query1);
				$CFondo=$rw_Admin1[0];
				$F=$rw_Admin1[1];
				if($CFondo==3){
					$Dias = 90;
				}else{
					$Dias= 180;	
				}
				$FF = strtotime($F."+ ".$Dias." days");
				$NewF= date('Y-m-d',strtotime($F."+ ".($Dias*4)." days"));
				$sql =  "Update USUARIOS Set ".$Fondo."='".$NewF."' where Nit ='".$Usuario."' ";				
						$query_update = mysqli_query($con,$sql);

				$sql="SELECT sum((Credito-Debito)) as valor,Tipo,NDocumento FROM FONDO_PREVENCION 
						Where Usuario='".$Usuario."' and (Estado= 'Pendiente') and (Fecha >= '".$F."' and Fecha <'".date("Y-m-d",$FF)."')
						group by Tipo,NDocumento
						;";
				$query1=mysqli_query($con, $sql);											
				while($rw_Admin1=mysqli_fetch_array($query1)){
					$Valor=$rw_Admin1[0];
					$Tipo=$rw_Admin1[1];
					$Numero=$rw_Admin1[2];
					$sql = "INSERT INTO TRANSACCIONESD(Numero,Tipo,NDocumento,Estado,Valor)
						VALUES(".$numero_Transaccion.",'".$Tipo."','".$Numero."','Pendiente',".$Valor.")";
					$query_update = mysqli_query($con,$sql);
					if ($query_update) {
						$messages[] = "Detalle Guardado Con Exito";
						$sql =  "Update FONDO_PREVENCION Set Estado='Solicitada' where Tipo ='".$Tipo."' and  NDocumento =".$Numero.";";				
						$query_update = mysqli_query($con,$sql);
						if ($query_update) {
							
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