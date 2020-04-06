<?php
include('is_logged.php');
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    require_once("../../libraries/password_compatibility_library.php");
}	
if (empty($_POST['Identificacion'])){
	$errors[] = "El Numero de Identificacion Se Encuentra Vacio";
} elseif (empty($_POST['Primer_Nombre'])){
	$errors[] = "El Primer Nombre Se Encuentra Vacio";
}elseif (empty($_POST['Primer_Apellido'])){
	$errors[] = "El Primer Apellido Se Encuentra Vacio";
}elseif (empty($_POST['Tipo_Identificacion'])){
	$errors[] = "El Tipo de Identificacion Encuentra Vacio";
}elseif (empty($_POST['Ciudad'])){
	$errors[] = "La Ciudad Se Encuentra Vacia";
}elseif (empty($_POST['Departamento'])){
	$errors[] = "El Departamento Se Encuentra Vacio";
}elseif (empty($_POST['Direccion'])){
	$errors[] = "La Direccion Se Encuentra Vacia";
}elseif (empty($_POST['Telefono'])){
	$errors[] = "El Telefono Se Encuentra Vacio";
}elseif (empty($_POST['Telefono2'])){
	$errors[] = "El Telefono2 Se Encuentra Vacio";
}elseif (empty($_POST['Estado'])){
	$errors[] = "El Estado Se Encuentra Vacio";
}elseif (empty($_POST['NContrato'])){
	$errors[] = "El Numero de Contrato Se Encuentra Vacio";
}elseif (!filter_var($_POST['Correo'], FILTER_VALIDATE_EMAIL)) {
	$errors[] = "La dirección de correo electrónico no está en un formato de correo electrónico válida";
}



elseif (
			!empty($_POST['Identificacion'])
			&& !empty($_POST['Primer_Nombre'])
			&& !empty($_POST['Primer_Apellido'])
			&& !empty($_POST['Tipo_Identificacion'])
			&& !empty($_POST['Ciudad'])
			&& !empty($_POST['Departamento'])
			&& !empty($_POST['Direccion'])
			&& !empty($_POST['Telefono'])
			&& !empty($_POST['Estado'])
			&& !empty($_POST['NContrato'])
			&& filter_var($_POST['Correo'], FILTER_VALIDATE_EMAIL)
          )
         {
            require_once ("../../config/db.php");
			require_once ("../../config/conexion.php");
				$EstadoC = mysqli_real_escape_string($con,(strip_tags($_POST["EstadoC"],ENT_QUOTES)));
				$Identificacion = mysqli_real_escape_string($con,(strip_tags($_POST["Identificacion"],ENT_QUOTES)));
				$Primer_Nombre = mysqli_real_escape_string($con,(strip_tags($_POST["Primer_Nombre"],ENT_QUOTES)));
				$Segundo_Nombre = mysqli_real_escape_string($con,(strip_tags($_POST["Segundo_Nombre"],ENT_QUOTES)));
				$Primer_Apellido = mysqli_real_escape_string($con,(strip_tags($_POST["Primer_Apellido"],ENT_QUOTES)));
				$Segundo_Apellido = mysqli_real_escape_string($con,(strip_tags($_POST["Segundo_Apellido"],ENT_QUOTES)));
				$Tipo_Identificacion = mysqli_real_escape_string($con,(strip_tags($_POST["Tipo_Identificacion"],ENT_QUOTES)));
				$Ciudad = mysqli_real_escape_string($con,(strip_tags($_POST["Ciudad"],ENT_QUOTES)));
				$Departamento = mysqli_real_escape_string($con,(strip_tags($_POST["Departamento"],ENT_QUOTES)));
				$Direccion = mysqli_real_escape_string($con,(strip_tags($_POST["Direccion"],ENT_QUOTES)));
				$Direccion_Adicional = mysqli_real_escape_string($con,(strip_tags($_POST["Direccion_Adicional"],ENT_QUOTES)));
				$Telefono = mysqli_real_escape_string($con,(strip_tags($_POST["Telefono"],ENT_QUOTES)));
				$Estado = mysqli_real_escape_string($con,(strip_tags($_POST["Estado"],ENT_QUOTES)));
				$Correo = mysqli_real_escape_string($con,(strip_tags($_POST["Correo"],ENT_QUOTES)));
				$Tipificacion = mysqli_real_escape_string($con,(strip_tags($_POST["Tipificacion"],ENT_QUOTES)));
				$NFactura = mysqli_real_escape_string($con,(strip_tags($_POST["NFactura"],ENT_QUOTES)));
				$NContrato = mysqli_real_escape_string($con,(strip_tags($_POST["NContrato"],ENT_QUOTES)));
				
				$Nombre_Completo = $Primer_Nombre;
				if($Segundo_Nombre != ''){
					$Nombre_Completo =$Nombre_Completo.' '.$Segundo_Nombre;
				} 
				$Nombre_Completo =$Nombre_Completo.' '.$Primer_Apellido;
				if($Segundo_Apellido != ''){
					$Nombre_Completo =$Nombre_Completo.' '.$Segundo_Apellido;
				}


				$Comercio = mysqli_real_escape_string($con,(strip_tags($_POST["Comercio"],ENT_QUOTES)));
				$Indicativo = mysqli_real_escape_string($con,(strip_tags($_POST["Indicativo"],ENT_QUOTES)));
				$D1 = mysqli_real_escape_string($con,(strip_tags($_POST["D1"],ENT_QUOTES)));
				$D2 = mysqli_real_escape_string($con,(strip_tags($_POST["D2"],ENT_QUOTES)));
				$D3 = mysqli_real_escape_string($con,(strip_tags($_POST["D3"],ENT_QUOTES)));
				$Adicional = mysqli_real_escape_string($con,(strip_tags($_POST["Adicional"],ENT_QUOTES)));
				$D4 = mysqli_real_escape_string($con,(strip_tags($_POST["D4"],ENT_QUOTES)));
				$Telefono2 = mysqli_real_escape_string($con,(strip_tags($_POST["Telefono2"],ENT_QUOTES)));
				
				$CargarOb ='NO';
				$CargarTip = 'NO';
				$User=$_SESSION['Nit'];
				$Observaciones ='';
				$Tipi=0;
				date_default_timezone_set('America/Bogota');
				$Fecha =date("d-m-Y h:i:sa");	
				$Observaciones = mysqli_real_escape_string($con,(strip_tags($_POST["Observaciones"],ENT_QUOTES)));

				$Observaciones ='';
				$Tipi=0;
				$CargarOb ='NO';
				$CargarTip = 'NO';
				date_default_timezone_set('America/Bogota');
				$Fecha =date("d-m-Y h:i:sa");	
				$Observaciones = mysqli_real_escape_string($con,(strip_tags($_POST["Observaciones"],ENT_QUOTES)));

				if ($Observaciones!='') {
					
				$CargarOb = 'SI';	
				}
				$query1=mysqli_query($con, "select Tipificacion from AFILIADOS where Identificacion = $Identificacion;");
				$rw_Admin1=mysqli_fetch_array($query1);
				$TipAnt =$rw_Admin1[0];
				if ($TipAnt !=$Tipificacion ){
					$CargarTip = 'SI';
					$Tipi=$Tipificacion;
				}
				if($EstadoC=='Nuevo'){
					$sql =  "INSERT INTO  AFILIADOS(Identificacion,Primer_Nombre,Segundo_Nombre,Primer_Apellido,Segundo_Apellido,
					Tipo_Identificacion,Ciudad,Departamento,
					Direccion,Direccion_Adicional,
					Telefono,
					Estado,Correo,Comercio,Tipificacion,Indicativo,D1,D2,D3,D4,Adicional,Telefono2,FechaCracion,Nombre_Completo,
					NFactura,NContrato) VALUES

						('".$Identificacion."', '".$Primer_Nombre."', '".$Segundo_Nombre."', '".$Primer_Apellido."', '".$Segundo_Apellido."', 
					'".$Tipo_Identificacion."', '".$Ciudad."', '".$Departamento."', 
					'".$Direccion."', '".$Direccion_Adicional."', '".$Telefono."', 
					'".$Estado."', '".$Correo."', '".$Comercio."', $Tipificacion, '".$Indicativo."', '".$D1."', '".$D2."', '".$D3."', '".$D4."', 
					'".$Adicional."', '".$Telefono2."',CURDATE(), '".$Nombre_Completo."','".$NFactura."','".$NContrato."'
					);";
					$query_update = mysqli_query($con,$sql);
					if ($query_update) {
						$messages[] = "El Afiliado se a Creado con Exito!";

						$sql1="SELECT Id FROM AFILIADOS WHERE Identificacion='$Identificacion' ";
						$query1 = mysqli_query($con, $sql1);
						$row1=mysqli_fetch_array($query1); 
						$Id=$row1[0];
						if(($CargarOb=='SI')||($CargarTip=='SI')){


							


							$sql =  "INSERT INTO  OBSERVACIONES_AFILIADO(Afiliado,Fecha,Observacion,Usuario,Tipificacion) VALUES
							('".$Id."', '".$Fecha."', '".$Observaciones."', '".$User."',$Tipi)";
						 $query_update = mysqli_query($con,$sql);
						
						}
						$sql=mysqli_query($con, "select LAST_INSERT_ID(Numero) as last from VENTAS order by Numero desc limit 0,1 ");
						$rw=mysqli_fetch_array($sql);
						$numero_VEnta=$rw['last']+1;

						$sql=mysqli_query($con, "SELECT * FROM USUARIO_CAMP where Usuario ='$User'; ");
						$rw=mysqli_fetch_array($sql);
						$Campana=$rw[0];

						$sql=mysqli_query($con, "SELECT * FROM CAMP_FORMASPAGO where Campana ='$Campana'; ");
						$rw=mysqli_fetch_array($sql);
						$FormaPago=$rw[0];

						$sql=mysqli_query($con, "SELECT Portafolio,Porcentaje FROM USUARIOS where Nit ='$User'; ");
					$rw=mysqli_fetch_array($sql);
					$Portafolio=$rw[0];
					$Porcentaje=$rw[1];

						$NumeroNip = "";
						$DataCreditoTipo = "";
						$Servicio = "";
						$Canal = "";
						$NumeroCelular = "";
						$OperadorVenta = "";
						$OperadorDonante = "";
						$NumeroSim = "";
						$Fecha =date("Y-m-d");

						$sql =  "INSERT INTO  VENTAS(Numero,Afiliado,Usuario,fecha,Campana,Estado_Campana,Estado,Seguimiento,Transportadora,
											NumeroNip,DataCreditoTipo,Servicio,Canal,NumeroCelular,OperadorVenta,OperadorDonante,NumeroSim,
											Valor,Porcentaje_Comision,Liquidada,Portafolio,Forma_Pago,Nombre_Completo,Identificacion,SAfiliado
											) VALUES

				('".$numero_VEnta."','".$Id."', '".$User."', '".$Fecha."', '".$Campana."'
				, '5', '4', '0', '0'
				, '".$NumeroNip."', '".$DataCreditoTipo."', '".$Servicio."', '".$Canal."', '".$NumeroCelular."', '".$OperadorVenta."', '".$OperadorDonante."'
				, '".$NumeroSim."', '0', '$Porcentaje', 'False', '$Portafolio', '".$FormaPago."','".$Nombre_Completo."','".$Identificacion."','N'
				)";
			
				   $query_update = mysqli_query($con,$sql);

						

                    } else {
                        $errors[] = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
                    }

				}else{

					$Id = mysqli_real_escape_string($con,(strip_tags($_POST["Id"],ENT_QUOTES)));

					$sql =  " UPDATE AFILIADOS Set 
					Primer_Nombre ='".$Primer_Nombre."',
					Segundo_Nombre='".$Segundo_Nombre."',
					Primer_Apellido='".$Primer_Apellido."',
					Segundo_Apellido='".$Segundo_Apellido."',
					Tipo_Identificacion = '".$Tipo_Identificacion."',
					Ciudad='".$Ciudad."',
					Tipificacion='".$Tipificacion."',
					Departamento='".$Departamento."',
					Direccion = '".$Direccion."',
					Direccion_Adicional ='".$Direccion_Adicional."',
					Telefono='".$Telefono."',
					Estado='".$Estado."',
					Correo='".$Correo."',Comercio='".$Comercio."',Indicativo='".$Indicativo."'
					,D1='".$D1."',D2='".$D2."',D3='".$D3."',D4='".$D4."',Adicional='".$Adicional."',Telefono2='".$Telefono2."',
					Nombre_Completo = '".$Nombre_Completo."',
					NFactura = '".$NFactura."',
					NContrato = '".$NContrato."'					
					WHERE Id = $Id";
					$query_update = mysqli_query($con,$sql);
					if ($query_update) {
						$messages[] = "El Afiliado se a Actualizo con Exito!";
						$sql1="SELECT Id FROM AFILIADOS WHERE Identificacion='$Identificacion' ";
						$query1 = mysqli_query($con, $sql1);
						$row1=mysqli_fetch_array($query1); 
						$Id=$row1[0];
						if(($CargarOb=='SI')||($CargarTip=='SI')){


							


							$sql =  "INSERT INTO  OBSERVACIONES_AFILIADO(Afiliado,Fecha,Observacion,Usuario,Tipificacion) VALUES
							('".$Id."', '".$Fecha."', '".$Observaciones."', '".$User."',$Tipi)";
						 $query_update = mysqli_query($con,$sql);
						
						}

						

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