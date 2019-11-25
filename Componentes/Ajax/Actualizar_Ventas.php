<?php
include('is_logged.php');
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    require_once("../../libraries/password_compatibility_library.php");
}		
if (empty($_POST['Estado_Campana'])){
	$errors[] = "El Estado Se Encuentra Vacio";
} elseif (!empty($_POST['Estado_Campana'])){
    require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$Numero_Venta = mysqli_real_escape_string($con,(strip_tags($_POST["Numero_Venta"],ENT_QUOTES)));			
	$Estado_Campana = mysqli_real_escape_string($con,(strip_tags($_POST["Estado_Campana"],ENT_QUOTES)));

	$query1=mysqli_query($con, 'SELECT Usuario,Valor,Porcentaje_Comision,Liquidada,Portafolio,Fecha,Afiliado FROM VENTAS where   Numero ='.$Numero_Venta.';');
	$rw_Admin1=mysqli_fetch_array($query1);
	$Porcentaje_Comision=$rw_Admin1['Porcentaje_Comision'];
	$Portafolio=$rw_Admin1['Portafolio'];
	$Fecha=$rw_Admin1['Fecha'];
	$Usuario=$rw_Admin1['Usuario'];
	$Valor=$rw_Admin1['Valor'];
	$Afiliado=$rw_Admin1['Afiliado'];
	$Liquidada=$rw_Admin1['Liquidada'];

	$User=$_SESSION['Nit'];
	$Observaciones ='';
				$Tipi=0;
				$CargarOb ='NO';
				$CargarTip = 'NO';
				date_default_timezone_set('America/Bogota');
				$FechaT =date("d-m-Y h:i:sa");	
				$Observaciones = mysqli_real_escape_string($con,(strip_tags($_POST["Observaciones"],ENT_QUOTES)));

				if ($Observaciones!='') {
					
				$CargarOb = 'SI';	
				}

				$query1=mysqli_query($con, "select Estado_Campana from VENTAS where Numero = $Numero_Venta;");
				$rw_Admin1=mysqli_fetch_array($query1);
				$TipAnt =$rw_Admin1[0];
		
				if ($TipAnt !=$Estado_Campana ){
					$CargarTip = 'SI';
					$Tipi=$Estado_Campana;
				}

	if($Liquidada == 'True'){
		$errors[]='La Factura Ya Fue Liquidada No se Puede Editar';
	}else{
		if($Liquidada == 'Pendiente'){
			$errors[]='La Venta Una Solicitud de Pago Pendiente No se Puede Editar';
		}else{
			$sql =  "Update VENTAS Set Estado_Campana='".$Estado_Campana."' where Numero =".$Numero_Venta.";";
    		$query_update = mysqli_query($con,$sql);
    		if ($query_update) {
				$messages[] = "La Venta Se Actualizo Con Exito.";
				$sql =  "Update AFILIADOS Set Tipificacion='".$Estado_Campana."' where Id =".$Afiliado.";";
    			$query_update = mysqli_query($con,$sql);
    		} else {
        		$errors[] = $sql;
			}
			if (isset($_POST['Estado'])){
				$Estado = mysqli_real_escape_string($con,(strip_tags($_POST["Estado"],ENT_QUOTES)));
				$sql =  "Update VENTAS Set Estado='".$Estado."' where Numero =".$Numero_Venta.";";				
				$query_update = mysqli_query($con,$sql);
        		if ($query_update) {
					$delete=mysqli_query($con, "DELETE FROM  CUENTA_VIRTUAL where  NDocumento=".$Numero_Venta." and Tipo ='V' ");					
					if ($Estado==1){	

				
						
						$Comision = 0;
						if ($Porcentaje_Comision <> 0 ){
						
							$Comision = ($Valor*$Porcentaje_Comision)/100;	
							$sql = "INSERT INTO CUENTA_VIRTUAL(Usuario,Tipo,NDocumento,Cruce,NCruce,Credito,Porcentaje,Comision,Estado,Fecha)
									VALUES('".$Usuario."','V','".$Numero_Venta."','V','".$Numero_Venta."','".$Valor."','".$Porcentaje_Comision."','".$Comision."','Pendiente','".$Fecha."')";
							$query_update = mysqli_query($con,$sql);
							if ($query_update) {
								$messages[] = "La Cuanta Virtual Se Registro Correctamente,";
							} else {
								$errors[] = $sql;
							}
						}else{
							
							if ($Portafolio > 0 and ($Estado==1)){
								
								$Comision = ($Portafolio);	
								$sql = "INSERT INTO CUENTA_VIRTUAL(Usuario,Tipo,NDocumento,Cruce,NCruce,Credito,Porcentaje,Comision,Estado,Fecha)
									VALUES('".$Usuario."','V','".$Numero_Venta."','V','".$Numero_Venta."','".$Valor."','".$Porcentaje_Comision."','".$Comision."','Pendiente','".$Fecha."')";
							$query_update = mysqli_query($con,$sql);
								if ($query_update) {
									$messages[] = "La Cuanta Virtual Se Registro Correctamente,";
								} else {
									$errors[] = $sql;
								}
							}	
						}		
					}
        		} else {
            		$errors[] = $sql;
				}
			}
		}
	}
	
			
				if(($CargarOb=='SI')||($CargarTip=='SI')){
					$sql =  "INSERT INTO  OBSERVACIONES_VENTAS(Venta,Fecha,Observacion,Usuario,Tipificacion) VALUES
					('".$Numero_Venta."', '".$FechaT."', '".$Observaciones."', '".$User."',$Tipi)";
				 $query_update = mysqli_query($con,$sql);
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
			<div class="alert alert-success" role="modal">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>¡Bien! </strong>
				<?php
					foreach ($messages as $message) {
						echo $message;
					}
				?>
			</div>
			<?php
			}
?>