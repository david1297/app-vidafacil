<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
set_time_limit(50000);
session_start();
$_SESSION['Completados1']=0;
$_SESSION['Completados2']=0;
$_SESSION['Erroneos1']=0;
$_SESSION['Erroneos2']=0;
$_SESSION['Registros1']=0;
$_SESSION['Registros2']=0;
$_SESSION['Recorridos1']=0;
$_SESSION['Recorridos2']=0;
$_SESSION['EstadoI']="Iniciado";
$_SESSION['Proceso']=1;
$_SESSION['Errores']="";

if(!empty($_FILES['Archivo']['name'])){
	$errors='';
	$Ruta1= '/var/www/html/';
	//$Ruta1= 'C:/xampp/htdocs/app-vidafacil/';
	$nombreArchivo =$_FILES['Archivo']['name'];
	if(copy($_FILES['Archivo']['tmp_name'], $Ruta1.$_FILES['Archivo']['name'])){
		require_once ("../../config/db.php");
		require_once ("../../config/conexion.php");
		require_once  '../../classes/PHPExcel/IOFactory.php'; 
		//Variable con el nombre del archivo
		$nombreArchivo = $Ruta1.$nombreArchivo;	
		// Cargo la hoja de calculo
		$objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
		//Asigno la hoja de calculo activa
		$objPHPExcel->setActiveSheetIndex(0);
		//Obtengo el numero de filas del archivo
		$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
		date_default_timezone_set('America/Bogota');
		$Fecha =date("d-m-Y h:i:sa");	
		$User=$_SESSION['Nit'];
		$_SESSION['Registros1']=$numRows-1;
		$Completados=0;
		$Erroneos=0;
		for ($i = 2; $i <= $numRows; $i++) {
			echo "ingreso";
			$_SESSION['Proceso']=1;

			$FechaI1 = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
			$FechaV1 = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
			$NombreEmpresa = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
			$Beneficio = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
			$DescuentoH = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
			$Cobertura = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
			$Servicio = $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
			$Descripcion = $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
			$PersonaC = $objPHPExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();
			$Celular = $objPHPExcel->getActiveSheet()->getCell('J'.$i)->getCalculatedValue();
			$Correo	 = $objPHPExcel->getActiveSheet()->getCell('K'.$i)->getCalculatedValue();
			$Whatsapp = $objPHPExcel->getActiveSheet()->getCell('L'.$i)->getCalculatedValue();
			$PaginaWeb = $objPHPExcel->getActiveSheet()->getCell('M'.$i)->getCalculatedValue();
			$Uso = $objPHPExcel->getActiveSheet()->getCell('N'.$i)->getCalculatedValue();
			$Terminos = $objPHPExcel->getActiveSheet()->getCell('O'.$i)->getCalculatedValue();
			$Politicas = $objPHPExcel->getActiveSheet()->getCell('P'.$i)->getCalculatedValue();
			$AutorizacionLogo= $objPHPExcel->getActiveSheet()->getCell('Q'.$i)->getCalculatedValue();
			$Categoria= $objPHPExcel->getActiveSheet()->getCell('R'.$i)->getCalculatedValue();

			$sig='/';

			$FechaI = str_replace($sig,'-',$FechaI1);
			$FechaV = str_replace($sig,'-',$FechaV1);
			


			/*
			$timestamp = PHPExcel_Shared_Date::ExcelToPHP($FechaI1);
			$timestamp = strtotime("+1 day",$timestamp);
			$FechaI = date("Y-m-d",$timestamp);

			$timestamp = PHPExcel_Shared_Date::ExcelToPHP($FechaV1);
			$timestamp = strtotime("+1 day",$timestamp);
			$FechaV = date("Y-m-d",$timestamp);

			$timestamp = PHPExcel_Shared_Date::ExcelToPHP($DescuentoH1);
			$timestamp = strtotime("+1 day",$timestamp);
			$DescuentoH = date("Y-m-d",$timestamp);*/





			$query=mysqli_query($con, "select Codigo from CATEGORIAS where UPPER(Nombre) = UPPER('".$Categoria."')");
			$rw_Admin=mysqli_fetch_array($query);
			if ($rw_Admin[0]<>'' ){
				$Categoria = $rw_Admin[0];	
			}else{
				$Categoria =1;
			}

			$sql =  " INSERT INTO DIRECTORIO (Celular,Categoria,FechaI,FechaV,NombreEmpresa,Beneficio,DescuentoH,Cobertura,Servicio,Descripcion,PersonaC,Whatsapp,
					PaginaWeb,Uso,Terminos,Politicas,AutorizacionLogo,Correo)VALUES
					('".$Celular."','".$Categoria."','".$FechaI."','".$FechaV."','".$NombreEmpresa."','".$Beneficio."','".$DescuentoH."','".$Cobertura."','".$Servicio."','".$Descripcion."',
					'".$PersonaC."','".$Whatsapp."','".$PaginaWeb."','".$Uso."','".$Terminos."','".$Politicas."','".$AutorizacionLogo."','".$Correo."')";
			$query_update = mysqli_query($con,$sql);
			if ($query_update) {
				$Completados= $Completados+1;
				$_SESSION['Completados1']=$Completados;			
			} else {
				$Erroneos = $Erroneos +1;
				$_SESSION['Erroneos1']=$Erroneos;
				$errors = $errors.' Error en la Pagina 1 Fila: '.$i;
			}	
			$_SESSION['Recorridos1']=$_SESSION['Recorridos1']+1; 
		}
		
	}else{
		$errors = "Lo sentimos , no se Cargo la Archivo .<br>";
	}
	$_SESSION['Errores']=$errors;
}
$_SESSION['EstadoI']="Finalizado";
?>