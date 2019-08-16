<?php
include('is_logged.php');
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    require_once("../../libraries/password_compatibility_library.php");
}		
if (empty($_POST['Afiliado'])){
	$errors[] = "El Afiliado Se Encuentra Vacio";
} elseif (empty($_POST['Usuario'])){
	$errors[] = "El Usuario Se Encuentra Vacio";
}elseif (empty($_POST['fecha'])){
	$errors[] = "La fecha Se Encuentra Vacio";
}elseif (empty($_POST['Campana'])){
	$errors[] = "La Campaña Se Encuentra Vacia";
}elseif (empty($_POST['Estado_Campana'])){
	$errors[] = "El Estado de la Campaña Se Encuentra Vacio";
}elseif (empty($_POST['Estado'])){
	$errors[] = "El Estado  Se Encuentra Vacio";
}elseif (empty($_POST['Seguimiento'])){
	$errors[] = "El Seguimiento de la Campaña Se Encuentra Vacio";
}elseif (empty($_POST['Transportadora'])){
	$errors[] = "La Transportadora de la Campaña Se Encuentra Vacia";
}elseif (empty($_POST['NumeroNip'])and ($_POST['Telefonica']=='True')){
		$errors[] = "El Numero de Nip Se Encuentra Vacio";
}elseif (empty($_POST['DataCreditoTipo'])and ($_POST['Telefonica']=='True')){
		$errors[] = "El Tipo Data Credito Se Encuentra Vacio";
}elseif (empty($_POST['Servicio'])and ($_POST['Telefonica']=='True')){
		$errors[] = "El Servicio Se Encuentra Vacio";
}elseif (empty($_POST['Canal'])and ($_POST['Telefonica']=='True')){
		$errors[] = "El Canal Se Encuentra Vacio";
}elseif (empty($_POST['NumeroCelular'])and ($_POST['Telefonica']=='True')){
		$errors[] = "El Numero de Celular Se Encuentra Vacio";
}elseif (empty($_POST['OperadorVenta'])and ($_POST['Telefonica']=='True')){
		$errors[] = "El Operador de Venta Se Encuentra Vacio";
}elseif (empty($_POST['OperadorDonante'])and ($_POST['Telefonica']=='True')){
		$errors[] = "El Operador Donante Se Encuentra Vacio";
}elseif (empty($_POST['NumeroSim'])and ($_POST['Telefonica']=='True')){
		$errors[] = "El Numero de Sim Se Encuentra Vacio";
}

elseif (
		!empty($_POST['Afiliado'])
		&& !empty($_POST['Usuario'])
		&& !empty($_POST['fecha'])
		&& !empty($_POST['Campana'])
		&& !empty($_POST['Estado_Campana'])
		&& !empty($_POST['Estado'])
		&& !empty($_POST['Seguimiento'])
		&& !empty($_POST['Transportadora'])
        ){
            require_once ("../../config/db.php");
			require_once ("../../config/conexion.php");
				$Afiliado = mysqli_real_escape_string($con,(strip_tags($_POST["Afiliado"],ENT_QUOTES)));
				$Usuario = mysqli_real_escape_string($con,(strip_tags($_POST["Usuario"],ENT_QUOTES)));
				$fecha = mysqli_real_escape_string($con,(strip_tags($_POST["fecha"],ENT_QUOTES)));
				$Campana = mysqli_real_escape_string($con,(strip_tags($_POST["Campana"],ENT_QUOTES)));
				$Estado_Campana = mysqli_real_escape_string($con,(strip_tags($_POST["Estado_Campana"],ENT_QUOTES)));
				$Estado = mysqli_real_escape_string($con,(strip_tags($_POST["Estado"],ENT_QUOTES)));
				$Seguimiento = mysqli_real_escape_string($con,(strip_tags($_POST["Seguimiento"],ENT_QUOTES)));
				$Transportadora = mysqli_real_escape_string($con,(strip_tags($_POST["Transportadora"],ENT_QUOTES)));
				$Valor1 = mysqli_real_escape_string($con,(strip_tags($_POST["Valor"],ENT_QUOTES)));
				$Porcentaje_Comision = mysqli_real_escape_string($con,(strip_tags($_POST["Porcentaje_Comision"],ENT_QUOTES)));
				$Portafolio = mysqli_real_escape_string($con,(strip_tags($_POST["Portafolio"],ENT_QUOTES)));
				$Forma_Pago = mysqli_real_escape_string($con,(strip_tags($_POST["Forma_Pago"],ENT_QUOTES)));
				$sig=',';
				$Valor = str_replace($sig,'',$Valor1);

				if($_POST['Telefonica']=='True'){
					$NumeroNip = mysqli_real_escape_string($con,(strip_tags($_POST["NumeroNip"],ENT_QUOTES)));
					$DataCreditoTipo = mysqli_real_escape_string($con,(strip_tags($_POST["DataCreditoTipo"],ENT_QUOTES)));
					$Servicio = mysqli_real_escape_string($con,(strip_tags($_POST["Servicio"],ENT_QUOTES)));
					$Canal = mysqli_real_escape_string($con,(strip_tags($_POST["Canal"],ENT_QUOTES)));
					$NumeroCelular = mysqli_real_escape_string($con,(strip_tags($_POST["NumeroCelular"],ENT_QUOTES)));
					$OperadorVenta = mysqli_real_escape_string($con,(strip_tags($_POST["OperadorVenta"],ENT_QUOTES)));
					$OperadorDonante = mysqli_real_escape_string($con,(strip_tags($_POST["OperadorDonante"],ENT_QUOTES)));
					$NumeroSim = mysqli_real_escape_string($con,(strip_tags($_POST["NumeroSim"],ENT_QUOTES)));
				}else{
					$NumeroNip = "";
					$DataCreditoTipo = "";
					$Servicio = "";
					$Canal = "";
					$NumeroCelular = "";
					$OperadorVenta = "";
					$OperadorDonante = "";
					$NumeroSim = "";	
				}

				if (isset($_POST['Numero'])) {
					$Numero = mysqli_real_escape_string($con,(strip_tags($_POST["Numero"],ENT_QUOTES)));	
					if ($Numero<>''){
					$numero_VEnta = $Numero;	
					}else{
						$sql=mysqli_query($con, "select LAST_INSERT_ID(Numero) as last from VENTAS order by Numero desc limit 0,1 ");
						$rw=mysqli_fetch_array($sql);
						$numero_VEnta=$rw['last']+1;
					}
				}	

				

				$sql =  "INSERT INTO  VENTAS(Numero,Afiliado,Usuario,fecha,Campana,Estado_Campana,Estado,Seguimiento,Transportadora,
											NumeroNip,DataCreditoTipo,Servicio,Canal,NumeroCelular,OperadorVenta,OperadorDonante,NumeroSim,
											Valor,Porcentaje_Comision,Liquidada,Portafolio,Forma_Pago
											) VALUES

				('".$numero_VEnta."','".$Afiliado."', '".$Usuario."', '".$fecha."', '".$Campana."'
				, '".$Estado_Campana."', '".$Estado."', '".$Seguimiento."', '".$Transportadora."'
				, '".$NumeroNip."', '".$DataCreditoTipo."', '".$Servicio."', '".$Canal."', '".$NumeroCelular."', '".$OperadorVenta."', '".$OperadorDonante."'
				, '".$NumeroSim."', '".$Valor."', '".$Porcentaje_Comision."', 'False', '".$Portafolio."', ".$Forma_Pago."
				) ON DUPLICATE  KEY UPDATE
				Afiliado = '".$Afiliado."',Usuario ='".$Usuario."',fecha='".$fecha."',Campana='".$Campana."'
				,Estado_Campana='".$Estado_Campana."',Estado='".$Estado."',Seguimiento='".$Seguimiento."',Transportadora='".$Transportadora."'
				,NumeroNip='".$NumeroNip."',DataCreditoTipo='".$DataCreditoTipo."',Servicio='".$Servicio."',Canal='".$Canal."'
				,NumeroCelular='".$NumeroCelular."',OperadorVenta='".$OperadorVenta."',OperadorDonante='".$OperadorDonante."'
				,NumeroSim='".$NumeroSim."',Valor='".$Valor."',Porcentaje_Comision='".$Porcentaje_Comision."',Liquidada='False',Portafolio='".$Portafolio."'
				,Forma_Pago=".$Forma_Pago."
				;";
                    $query_update = mysqli_query($con,$sql);
                    if ($query_update) {
                        $messages[] = "La Venta Se Guardo Con Exito.";
                    } else {
                        $errors[] = $sql;
					}
					if (isset($_POST['Observaciones'])) {
						$User=$_SESSION['Nit'];
						$Observaciones = mysqli_real_escape_string($con,(strip_tags($_POST["Observaciones"],ENT_QUOTES)));	
						if ($Observaciones<>''){
							$Fecha =date("Y-m-d");
							$sql =  "INSERT INTO  OBSERVACIONES_VENTAS(Venta,Fecha,Observacion,Usuario) VALUES
							('".$numero_VEnta."', '".$Fecha."', '".$Observaciones."', '".$User."')";
						 $query_update = mysqli_query($con,$sql);
						 if ($query_update) {
							 $messages[] = "Los Datos Se Han Modificado Con Exito.";
						 } else {
							 $errors[] = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
						 }	
						}
					
					}
						$delete=mysqli_query($con, "DELETE FROM  CUENTA_VIRTUAL where  NDocumento='".$numero_VEnta."'");


						$Comision = 0;
						if ($Porcentaje_Comision > 0 and ($Estado=='Aprobada')){
						
							$Comision = ($Valor*$Porcentaje_Comision)/100;	
							$sql = "INSERT INTO CUENTA_VIRTUAL(Usuario,Tipo,NDocumento,Cruce,NCruce,Credito,Porcentaje,Comision,Estado,Fecha)
									VALUES('".$Usuario."','V','".$numero_VEnta."','V','".$numero_VEnta."','".$Valor."','".$Porcentaje_Comision."','".$Comision."','Pendiente','".$fecha."')";
							$query_update = mysqli_query($con,$sql);
							if ($query_update) {
								$messages[] = "La Cuanta Virtual Se Registro Correctamente,";
							} else {
								$errors[] = $sql;
							}
						}else{
							
							if ($Portafolio > 0 and ($Estado=='Aprobada')){
								
								$Comision = ($Portafolio);	
								$sql = "INSERT INTO CUENTA_VIRTUAL(Usuario,Tipo,NDocumento,Cruce,NCruce,Credito,Porcentaje,Comision,Estado,Fecha)
									VALUES('".$Usuario."','V','".$numero_VEnta."','V','".$numero_VEnta."','".$Valor."','".$Porcentaje_Comision."','".$Comision."','Pendiente','".$fecha."')";
							$query_update = mysqli_query($con,$sql);
								if ($query_update) {
									$messages[] = "La Cuanta Virtual Se Registro Correctamente,";
								} else {
									$errors[] = $sql;
								}
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