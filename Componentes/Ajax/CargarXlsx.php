<?php
require '../../Classes/PHPExcel/IOFactory.php'; //Agregamos la librería 
if(!empty($_FILES['Archivo']['name'])){
	$Ruta=  dirname(__FILE__ );
	$Ruta  = dirname($Ruta);
	$Ruta =dirname($Ruta);
	$errors='';

	$Ruta1= str_replace('\\',"/",$Ruta).'/';


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
	
	
	for ($i = 8; $i <= $numRows; $i++) {
		
		$FechaFirma = date("Y-m-d");
		$Nombres = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
		$Documento = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
		$Direccion = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
		$Ciudad1 = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
		$Barrio = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
		$Celular = $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
		$Correo = $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
		$Duracion = $objPHPExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();
		$Valor = $objPHPExcel->getActiveSheet()->getCell('J'.$i)->getCalculatedValue();
		$Estado = $objPHPExcel->getActiveSheet()->getCell('K'.$i)->getCalculatedValue();
		$Bolsa = $objPHPExcel->getActiveSheet()->getCell('L'.$i)->getCalculatedValue();
		$Observacion = $objPHPExcel->getActiveSheet()->getCell('M'.$i)->getCalculatedValue();
		
		$Identificacion = mysqli_real_escape_string($con,(strip_tags($Documento,ENT_QUOTES)));
		$Nom = explode(" ", $Nombres);
		if(count($Nom)==2){
			$Primer_Nombre = mysqli_real_escape_string($con,(strip_tags($Nom[0],ENT_QUOTES)));
			$Segundo_Nombre = mysqli_real_escape_string($con,(strip_tags('',ENT_QUOTES)));
			$Primer_Apellido = mysqli_real_escape_string($con,(strip_tags($Nom[1],ENT_QUOTES)));
			$Segundo_Apellido = mysqli_real_escape_string($con,(strip_tags('',ENT_QUOTES)));	

		}
		else{
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
		$Fecha_Nacimiento = mysqli_real_escape_string($con,(strip_tags(date("Y-m-d"),ENT_QUOTES)));		
		$Nacionalidad = mysqli_real_escape_string($con,(strip_tags('colombiano',ENT_QUOTES)));
		
		$query=mysqli_query($con, "select Codigo, Departamento from CIUDADES where Nombre = 
		'".$Ciudad1."' ");
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
		$Estrato = mysqli_real_escape_string($con,(strip_tags('2',ENT_QUOTES)));
		$Nivel_Educacion = mysqli_real_escape_string($con,(strip_tags('Otro',ENT_QUOTES)));
		$Ocupacion = mysqli_real_escape_string($con,(strip_tags('Otro',ENT_QUOTES)));
		$Forma_Pago = mysqli_real_escape_string($con,(strip_tags('5',ENT_QUOTES)));
		$Rango_Ingresos = mysqli_real_escape_string($con,(strip_tags('2',ENT_QUOTES)));
		$Telefono = mysqli_real_escape_string($con,(strip_tags($Celular ,ENT_QUOTES)));

				$Direccion_Firma = mysqli_real_escape_string($con,(strip_tags($Direccion,ENT_QUOTES)));
				$Fecha_Firma = mysqli_real_escape_string($con,(strip_tags($FechaFirma,ENT_QUOTES)));
				$Horario = mysqli_real_escape_string($con,(strip_tags('12:00:00',ENT_QUOTES)));
				$Estado = mysqli_real_escape_string($con,(strip_tags('Activo',ENT_QUOTES)));
				$Correo = mysqli_real_escape_string($con,(strip_tags($Correo,ENT_QUOTES)));
				$Fecha_Expedicion = mysqli_real_escape_string($con,(strip_tags(date("Y-m-d"),ENT_QUOTES)));
				
				
				$sql =  "INSERT INTO  AFILIADOS(Identificacion,Primer_Nombre,Segundo_Nombre,Primer_Apellido,Segundo_Apellido,
												Tipo_Identificacion,Fecha_Nacimiento,Nacionalidad,Ciudad,Departamento,
												Direccion,Direccion_Adicional,Estrato,Nivel_Educacion,Ocupacion,
												Forma_Pago,Rango_Ingresos,Telefono,Direccion_Firma,Fecha_Firma,
												Horario,Estado,Correo,Fecha_Expedicion) VALUES

				('".$Identificacion."', '".$Primer_Nombre."', '".$Segundo_Nombre."', '".$Primer_Apellido."', '".$Segundo_Apellido."', 
				'".$Tipo_Identificacion."', '".$Fecha_Nacimiento."', '".$Nacionalidad."', '".$Ciudad."', '".$Departamento."', 
				'".$Direccion."', '".$Direccion_Adicional."', '".$Estrato."', '".$Nivel_Educacion."', '".$Ocupacion."', 
				'".$Forma_Pago."', '".$Rango_Ingresos."', '".$Telefono."', '".$Direccion_Firma."', '".$Fecha_Firma."', 
				'".$Horario."', '".$Estado."', '".$Correo."', '".$Fecha_Expedicion."'
				) ON DUPLICATE  KEY UPDATE
				Identificacion = '".$Identificacion."',Primer_Nombre ='".$Primer_Nombre."',Segundo_Nombre='".$Segundo_Nombre."',Primer_Apellido='".$Primer_Apellido."',Segundo_Apellido='".$Segundo_Apellido."',
				Tipo_Identificacion = '".$Tipo_Identificacion."',Fecha_Nacimiento ='".$Fecha_Nacimiento."',Nacionalidad='".$Nacionalidad."',Ciudad='".$Ciudad."',Departamento='".$Departamento."',
				Direccion = '".$Direccion."',Direccion_Adicional ='".$Direccion_Adicional."',Estrato='".$Estrato."',Nivel_Educacion='".$Nivel_Educacion."',Ocupacion='".$Ocupacion."',
				Forma_Pago = '".$Forma_Pago."',Rango_Ingresos ='".$Rango_Ingresos."',Telefono='".$Telefono."',Direccion_Firma='".$Direccion_Firma."',Fecha_Firma='".$Fecha_Firma."',
				Horario='".$Horario."',Estado='".$Estado."',Correo='".$Correo."',Fecha_Expedicion='".$Fecha_Expedicion."';";
                    $query_update = mysqli_query($con,$sql);
                    if ($query_update) {
                        $messages='bien';
                    } else {
                        $errors = 'Error en la Fila: '.$i;
					}
	}
	
		
	}else{
		$errors = "Lo sentimos , no se Cargo la Archivo .<br>";
	}
	if ($errors ==''){
		echo 'Correcto';
	}	else{
		echo $errors;
	}

	
}

?>