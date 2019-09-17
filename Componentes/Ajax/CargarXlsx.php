<?php
require '../../Classes/PHPExcel/IOFactory.php'; //Agregamos la librería 
if(!empty($_FILES['Archivo']['name'])){
	$Ruta=  dirname(__FILE__ );
	$Ruta  = dirname($Ruta);
	$Ruta =dirname($Ruta);
	

	$Ruta1= str_replace('\\',"/",$Ruta).'/';


	$nombreArchivo =$_FILES['Archivo']['name'];
	if(copy($_FILES['Archivo']['tmp_name'], $Ruta1.$_FILES['Archivo']['name'])){
	
		
	}else{
		$errors = "Lo sentimos , no se Cargo la Archivo .<br>";
	}
		

	
	//Variable con el nombre del archivo
	$nombreArchivo = $Ruta1.$nombreArchivo;	
	// Cargo la hoja de cálculo
	$objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
	
	//Asigno la hoja de calculo activa
	$objPHPExcel->setActiveSheetIndex(0);
	//Obtengo el numero de filas del archivo
	$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
	
	echo '<table border=1><tr><td>Producto</td><td>Precio</td><td>Existencia</td></tr>';
	
	for ($i = 7; $i <= $numRows; $i++) {
		
		$FechaFirma = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
		$Nombres = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
		$Documento = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
		$Direccion = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
		$Ciudad = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
		$Barrio = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
		$Celular = $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
		$Correo = $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
		$Duracion = $objPHPExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();
		$Valor = $objPHPExcel->getActiveSheet()->getCell('J'.$i)->getCalculatedValue();
		$Estado = $objPHPExcel->getActiveSheet()->getCell('K'.$i)->getCalculatedValue();
		$Bolsa = $objPHPExcel->getActiveSheet()->getCell('L'.$i)->getCalculatedValue();
		$Observacion = $objPHPExcel->getActiveSheet()->getCell('M'.$i)->getCalculatedValue();
		
		echo '<tr>';
		echo '<td>'. $FechaFirma.'</td>';
		echo '<td>'. $Nombres.'</td>';
		echo '<td>'. $Documento.'</td>';
		echo '<td>'. $Direccion.'</td>';
		echo '<td>'. $Ciudad.'</td>';
		echo '<td>'. $Barrio.'</td>';
		echo '<td>'. $Celular.'</td>';
		echo '<td>'. $Correo.'</td>';
		echo '<td>'. $Duracion.'</td>';
		echo '<td>'. $Valor.'</td>';
		echo '<td>'. $Estado.'</td>';
		echo '<td>'. $Bolsa.'</td>';
		echo '<td>'. $Observacion.'</td>';
		echo '</tr>';
		
	
	}
	
	echo '<table>';
}

?>