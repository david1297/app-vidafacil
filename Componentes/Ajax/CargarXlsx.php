<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
set_time_limit(50000);
session_start();
require_once  '../../classes/PHPExcel/IOFactory.php'; 


	
if(!empty($_FILES['Archivo']['name'])){
	$errors='';

	$Ruta1= '/var/www/html/';
	//$Ruta1= 'C:/xampp/htdocs/app-vidafacil/';


	$nombreArchivo =$_FILES['Archivo']['name'];
	if(copy($_FILES['Archivo']['tmp_name'], $Ruta1.$_FILES['Archivo']['name'])){
		require_once ("../../config/db.php");
		require_once ("../../config/conexion.php");
		
		//Variable con el nombre del archivo
		$nombreArchivo = $Ruta1.$nombreArchivo;	
		// Cargo la hoja de cálculo
		$objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
		
		//Asigno la hoja de calculo activa
		$objPHPExcel->setActiveSheetIndex(0);
		//Obtengo el numero de filas del archivo
		$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
		date_default_timezone_set('America/Bogota');
				$Fecha =date("d-m-Y h:i:sa");	
				$User=$_SESSION['Nit'];
		for ($i = 2; $i <= $numRows; $i++) {
			$Nombres = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
			$Documento = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
			$Direccion = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
			$Ciudad1 = $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
			$Barrio = $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
			$Celular = $objPHPExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();
			$Correo = $objPHPExcel->getActiveSheet()->getCell('J'.$i)->getCalculatedValue();
			$Comercio = $objPHPExcel->getActiveSheet()->getCell('K'.$i)->getCalculatedValue();
			$Duracion = $objPHPExcel->getActiveSheet()->getCell('L'.$i)->getCalculatedValue();
			$Estado = $objPHPExcel->getActiveSheet()->getCell('M'.$i)->getCalculatedValue();
			$Valor = $objPHPExcel->getActiveSheet()->getCell('N'.$i)->getCalculatedValue();
			$Tipificacion = $objPHPExcel->getActiveSheet()->getCell('O'.$i)->getCalculatedValue();
			$Observacion = $objPHPExcel->getActiveSheet()->getCell('P'.$i)->getCalculatedValue();
			
			$Identificacion = mysqli_real_escape_string($con,(strip_tags($Documento,ENT_QUOTES)));
			$Nom = explode(" ", $Nombres);
			if(count($Nom)==2){
				$Primer_Nombre = mysqli_real_escape_string($con,(strip_tags($Nom[0],ENT_QUOTES)));
				$Segundo_Nombre = mysqli_real_escape_string($con,(strip_tags('',ENT_QUOTES)));
				$Primer_Apellido = mysqli_real_escape_string($con,(strip_tags($Nom[1],ENT_QUOTES)));
				$Segundo_Apellido = mysqli_real_escape_string($con,(strip_tags('',ENT_QUOTES)));	

			}else{
				if(count($Nom)==3){
					$Primer_Nombre = mysqli_real_escape_string($con,(strip_tags($Nom[0],ENT_QUOTES)));
					$Segundo_Nombre = mysqli_real_escape_string($con,(strip_tags($Nom[1],ENT_QUOTES)));
					$Primer_Apellido = mysqli_real_escape_string($con,(strip_tags($Nom[2],ENT_QUOTES)));
					$Segundo_Apellido = mysqli_real_escape_string($con,(strip_tags('',ENT_QUOTES)));	
		
				}else{
					$Primer_Nombre = mysqli_real_escape_string($con,(strip_tags($Nom[0],ENT_QUOTES)));
					$Segundo_Nombre = mysqli_real_escape_string($con,(strip_tags($Nom[1],ENT_QUOTES)));
					$Primer_Apellido = mysqli_real_escape_string($con,(strip_tags($Nom[2],ENT_QUOTES)));
					$Segundo_Apellido = mysqli_real_escape_string($con,(strip_tags($Nom[3],ENT_QUOTES)));
				}	
			}

			

			$Tipo_Identificacion = mysqli_real_escape_string($con,(strip_tags('Cedula',ENT_QUOTES)));		
			$query=mysqli_query($con, "select Codigo, Departamento from CIUDADES where  UPPER(Nombre) = UPPER('".$Ciudad1."') ");
			$rw_Admin=mysqli_fetch_array($query);
			if ($rw_Admin['Codigo']<>'' ){
				$Ciudad = mysqli_real_escape_string($con,(strip_tags($rw_Admin['Codigo'],ENT_QUOTES)));
				$Departamento = mysqli_real_escape_string($con,(strip_tags($rw_Admin['Departamento'],ENT_QUOTES)));
			}else{
				$Ciudad = mysqli_real_escape_string($con,(strip_tags('1127',ENT_QUOTES)));
				$Departamento = mysqli_real_escape_string($con,(strip_tags('33',ENT_QUOTES)));
			}	
			$Direccion = mysqli_real_escape_string($con,(strip_tags($Direccion,ENT_QUOTES)));
			$Direccion_Adicional = mysqli_real_escape_string($con,(strip_tags('',ENT_QUOTES)));
			$Forma_Pago = mysqli_real_escape_string($con,(strip_tags('5',ENT_QUOTES)));
			$Telefono = mysqli_real_escape_string($con,(strip_tags($Celular ,ENT_QUOTES)));
			$Estado = mysqli_real_escape_string($con,(strip_tags('Por Activar',ENT_QUOTES)));
			$Correo = mysqli_real_escape_string($con,(strip_tags($Correo,ENT_QUOTES)));

			$query=mysqli_query($con, "select Nit from USUARIOS where UPPER(Razon_Social) = 
			UPPER('".$Comercio."') ");
			$rw_Admin=mysqli_fetch_array($query);
			if ($rw_Admin[0]<>'' ){
			$Comercio = $rw_Admin[0];	
			}else{
				$Comercio = $_SESSION['Nit'];	
			}
			$Tipificacion =5;
			$query=mysqli_query($con, "select count(*) from AFILIADOS where Identificacion = '$Identificacion'; ");
			$rw_Admin=mysqli_fetch_array($query);
			if ($rw_Admin[0]==0){
				$sql =  "INSERT INTO  AFILIADOS(Identificacion,Primer_Nombre,Segundo_Nombre,Primer_Apellido,Segundo_Apellido,
													Tipo_Identificacion,Ciudad,Departamento,
													Direccion,Direccion_Adicional,
													Forma_Pago,Telefono,Telefono2,Estado,
													Correo,Comercio,Tipificacion) VALUES

					('".$Identificacion."', '".$Primer_Nombre."', '".$Segundo_Nombre."', '".$Primer_Apellido."', '".$Segundo_Apellido."', 
					'".$Tipo_Identificacion."','".$Ciudad."', '".$Departamento."', 
					'".$Direccion."', '".$Direccion_Adicional."',
					'".$Forma_Pago."', '".$Telefono."', '".$Telefono."', 
					'".$Estado."', '".$Correo."', '".$Comercio."', ".$Tipificacion."
					);";
						$query_update = mysqli_query($con,$sql);
						if ($query_update) {
							$messages='bien';
						} else {
							$errors = $errors.' Error en la Pagina 1 Fila: '.$i;
						}
			}


			
		
		}

		$objPHPExcel->setActiveSheetIndex(1);
		//Obtengo el numero de filas del archivo
		$numRows = $objPHPExcel->setActiveSheetIndex(1)->getHighestRow();

		for ($i = 2; $i <= $numRows; $i++) {
			$Documento = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
			$Observacion = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
			$Tipificacion = $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();

			$query=mysqli_query($con, "select Id from AFILIADOS where Identificacion = '$Identificacion'; ");
			$rw_Admin=mysqli_fetch_array($query);
			$Id=$rw_Admin[0];

			


			$Identificacion = mysqli_real_escape_string($con,(strip_tags($Documento,ENT_QUOTES)));

			$query=mysqli_query($con, "select Numero from TIPIFICACIONES where UPPER(Nombre) = 
			UPPER('".$Tipificacion."') ");
			$rw_Admin=mysqli_fetch_array($query);
			if ($rw_Admin[0]<>'' ){
			$Tipificacion = $rw_Admin[0];	
			

			}else{
				$Tipificacion =5;	
			}	
			
			$sql =  "UPDATE  AFILIADOS SET Tipificacion = $Tipificacion  WHERE Id = '".$Id."' ";
			$query_update = mysqli_query($con,$sql);

			$sql =  "INSERT INTO  OBSERVACIONES_AFILIADO(Afiliado,Fecha,Observacion,Usuario,Tipificacion) VALUES
			('".$Id."', '".$Fecha."', '".$Observacion."', '".$User."',$Tipificacion)";
			$query_update = mysqli_query($con,$sql);
			if ($query_update) {
				$messages='bien';
			} else {
				$errors = $errors.' Error en la Pagina 2 Fila: '.$i;
			}


		}

	

		
		
	
	
		
	}else{
		$errors = "Lo sentimos , no se Cargo la Archivo .<br>";
	}
	if ($errors ==''){
		echo 'Los Datos Se Cargaron Correctamente';
	}	else{
		echo $errors;
	}

	
}

?>