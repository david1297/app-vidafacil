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
	//$Ruta1= '/var/www/html/';
	$Ruta1= 'C:/xampp/htdocs/app-vidafacil/';
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
			$_SESSION['Proceso']=1;
			$NContrato = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
			$Nombres = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
			$Documento = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
			$Direccion = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
			$Ciudad1 = $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
			$Barrio = $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
			$Celular = $objPHPExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();
			$Correo = $objPHPExcel->getActiveSheet()->getCell('J'.$i)->getCalculatedValue();
			$Comercio = $objPHPExcel->getActiveSheet()->getCell('K'.$i)->getCalculatedValue();
			$Duracion = $objPHPExcel->getActiveSheet()->getCell('L'.$i)->getCalculatedValue();
			$AEstado = $objPHPExcel->getActiveSheet()->getCell('M'.$i)->getCalculatedValue();
			$Valor = $objPHPExcel->getActiveSheet()->getCell('N'.$i)->getCalculatedValue();
			$Tipificacion = $objPHPExcel->getActiveSheet()->getCell('O'.$i)->getCalculatedValue();
			$Observacion = $objPHPExcel->getActiveSheet()->getCell('P'.$i)->getCalculatedValue();
			$SubTipificacion = $objPHPExcel->getActiveSheet()->getCell('Q'.$i)->getCalculatedValue();
			$Agendamiento = $objPHPExcel->getActiveSheet()->getCell('R'.$i)->getCalculatedValue();
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
			$Telefono = mysqli_real_escape_string($con,(strip_tags($Celular ,ENT_QUOTES)));
			
			$Correo = mysqli_real_escape_string($con,(strip_tags($Correo,ENT_QUOTES)));

			$query1=mysqli_query($con, 'SELECT Estado FROM PERMISOS where Modulo="Afiliados" and Permiso="ImportarAprobados" and  Usuario ="'.$_SESSION['Nit'].'";');
			$rw_Admin1=mysqli_fetch_array($query1);
			if($_SESSION['Rol']=='2' and $rw_Admin1['Estado']=='false'){
				$Estado =mysqli_real_escape_string($con,(strip_tags('Por Activar',ENT_QUOTES)));
			}else{
				$Estado = mysqli_real_escape_string($con,(strip_tags('Aprobado',ENT_QUOTES)));
			}

			$query=mysqli_query($con, "select Nit from USUARIOS where UPPER(Razon_Social) = UPPER('".$Comercio."') ");
			$rw_Admin=mysqli_fetch_array($query);
			if ($rw_Admin[0]<>'' ){
				$Comercio = $rw_Admin[0];	
			}else{
				$Comercio = $_SESSION['Nit'];	
			}
			$query=mysqli_query($con, "select Numero from TIPIFICACIONES where UPPER(Nombre) = UPPER('".$SubTipificacion."')");
			$rw_Admin=mysqli_fetch_array($query);
			if ($rw_Admin[0]<>'' ){
				$Tipificacion = $rw_Admin[0];	
			}else{
				$query=mysqli_query($con, "select Numero from TIPIFICACIONES where UPPER(Categoria) = UPPER('".$Tipificacion."') ");
				$rw_Admin=mysqli_fetch_array($query);
				if ($rw_Admin[0]<>'' ){
					$Tipificacion = $rw_Admin[0];	
				}else{
					$Tipificacion =5;	
				}
			}
			$query=mysqli_query($con, "select Codigo from AESTADOS where UPPER(Nombre) = UPPER('".$AEstado."')");
			$rw_Admin=mysqli_fetch_array($query);
			if ($rw_Admin[0]<>'' ){
				$AEstado = $rw_Admin[0];	
			}else{
				$AEstado =0;
			}
			$query=mysqli_query($con, "select count(*) from AFILIADOS where Identificacion = '$Identificacion'; ");
			$rw_Admin=mysqli_fetch_array($query);
			if ($rw_Admin[0]==0){
				$sql =  "INSERT INTO  AFILIADOS(Identificacion,Primer_Nombre,Segundo_Nombre,Primer_Apellido,Segundo_Apellido,Nombre_Completo,
						Tipo_Identificacion,Ciudad,Departamento,Direccion,Direccion_Adicional,Telefono,Telefono2,Estado,Correo,Comercio,Tipificacion,FechaCracion,NContrato,AEstado) VALUES
					('".$Identificacion."', '".$Primer_Nombre."', '".$Segundo_Nombre."', '".$Primer_Apellido."', '".$Segundo_Apellido."', 
					'".$Nombres."','".$Tipo_Identificacion."','".$Ciudad."', '".$Departamento."', '".$Direccion."', '".$Direccion_Adicional."',
					'".$Telefono."', '".$Telefono."', '".$Estado."', '".$Correo."', '".$Comercio."', ".$Tipificacion.",CURDATE(),'".$NContrato."','".$AEstado."'
					);";
				$query_update = mysqli_query($con,$sql);
				if ($query_update) {
					$Completados= $Completados+1;
					$_SESSION['Completados1']=$Completados;
					$query=mysqli_query($con, "select Id from AFILIADOS where Identificacion = '$Identificacion'; ");
					$rw_Admin=mysqli_fetch_array($query);
					$Id=$rw_Admin[0];
					$sql=mysqli_query($con, "select LAST_INSERT_ID(Numero) as last from VENTAS order by Numero desc limit 0,1 ");
					$rw=mysqli_fetch_array($sql);
					$numero_VEnta=$rw['last']+1;
					$sql=mysqli_query($con, "SELECT * FROM USUARIO_CAMP where Usuario ='$Comercio'; ");
					$rw=mysqli_fetch_array($sql);
					$Campana=$rw[0];
					$sql=mysqli_query($con, "SELECT * FROM CAMP_FORMASPAGO where Campana ='$Campana'; ");
					$rw=mysqli_fetch_array($sql);
					$FormaPago=$rw[0];
					$sql=mysqli_query($con, "SELECT Portafolio,Porcentaje FROM USUARIOS where Nit ='$Comercio'; ");
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
							Valor,Porcentaje_Comision,Liquidada,Portafolio,Forma_Pago,Nombre_Completo,Identificacion,SAfiliado) VALUES
							('".$numero_VEnta."','".$Id."', '".$Comercio."', '".$Fecha."', '".$Campana."', '5', '4', '0', '0'
							, '".$NumeroNip."', '".$DataCreditoTipo."', '".$Servicio."', '".$Canal."', '".$NumeroCelular."', '".$OperadorVenta."', '".$OperadorDonante."'
							, '".$NumeroSim."', '0', '$Porcentaje', 'False', '$Portafolio', '".$FormaPago."','".$Nombres."','".$Identificacion."','N')";
							$query_update = mysqli_query($con,$sql);
							
				} else {
					$Erroneos = $Erroneos +1;
					$_SESSION['Erroneos1']=$Erroneos;
					$errors = $errors.' Error en la Pagina 1 Fila: '.$i;
				}
			}
			$_SESSION['Recorridos1']=$_SESSION['Recorridos1']+1; 
		}
		$objPHPExcel->setActiveSheetIndex(1);
		$numRows = $objPHPExcel->setActiveSheetIndex(1)->getHighestRow();
		$_SESSION['Registros2']=$numRows-1;
		for ($i = 2; $i <= $numRows; $i++) {
			$_SESSION['Proceso']=2;
			$Documento = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
			$Observacion = $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
			$Tipificacion = $objPHPExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();
			$SubTipificacion = $objPHPExcel->getActiveSheet()->getCell('J'.$i)->getCalculatedValue();
			$query=mysqli_query($con, "select Id from AFILIADOS where Identificacion = '$Identificacion'; ");
			$rw_Admin=mysqli_fetch_array($query);
			$Id=$rw_Admin[0];
			$Identificacion = mysqli_real_escape_string($con,(strip_tags($Documento,ENT_QUOTES)));
			$query=mysqli_query($con, "select Numero from TIPIFICACIONES where UPPER(Nombre) = UPPER('".$SubTipificacion."')");
			$rw_Admin=mysqli_fetch_array($query);
			if ($rw_Admin[0]<>'' ){
				$Tipificacion = $rw_Admin[0];	
			}else{
				$query=mysqli_query($con, "select Numero from TIPIFICACIONES where UPPER(Categoria) = UPPER('".$Tipificacion."') ");
				$rw_Admin=mysqli_fetch_array($query);
				if ($rw_Admin[0]<>'' ){
					$Tipificacion = $rw_Admin[0];	
				}else{
					$Tipificacion =5;	
				}
			}	
			//$sql =  "UPDATE  AFILIADOS SET Tipificacion = $Tipificacion  WHERE Id = '".$Id."' ";
			//$query_update = mysqli_query($con,$sql);
			$sql =  "INSERT INTO  OBSERVACIONES_AFILIADO(Afiliado,Fecha,Observacion,Usuario,Tipificacion) VALUES
			('".$Id."', '".$Fecha."', '".$Observacion."', '".$User."',$Tipificacion)";
			$query_update = mysqli_query($con,$sql);
			if ($query_update) {
				$_SESSION['Completados2']=$_SESSION['Completados2']+1;
			} else {
				$_SESSION['Erroneos2']=$_SESSION['Erroneos2']+1;	
				$errors = $errors.' Error en la Pagina 2 Fila: '.$i;
			}
			$_SESSION['Recorridos2']=$_SESSION['Recorridos2']+1;
		}
	}else{
		$errors = "Lo sentimos , no se Cargo la Archivo .<br>";
	}
	$_SESSION['Errores']=$errors;

	
}
$_SESSION['EstadoI']="Finalizado";
?>