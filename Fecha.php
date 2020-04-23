<?php 
$Fecha = '43864';
echo $Fecha;

$timestamp = PHPExcel_Shared_Date::ExcelToPHP($Fecha);
$fecha_php = date("Y-m-d H:i:s",$timestamp);
echo $fecha_php;

$Fecha1 = date("Y-m-d", (int)$Fecha); 
echo '<br>';
echo date("d-m-Y", strtotime($Fecha));
echo '<br>';

echo $Fecha1;
?>
