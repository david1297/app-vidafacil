<?php

include('is_logged.php');
$session_id= session_id();

if (isset($_POST['Id_N'])){$Id_N=$_POST['Id_N'];}
if (isset($_POST['Depto'])){$Depto=$_POST['Depto'];}
if (isset($_POST['Ciu'])){$Ciu=$_POST['Ciu'];}

require_once ("../../config/db.php");
require_once ("../../config/conexion.php");


   

echo' <select class="form-control" id="Ciudad" name ="Ciudad" placeholder="Ciudad">';

$sql=mysqli_query($con, "select * from Ciudades where  Departamento=".$Depto."");
while ($row=mysqli_fetch_array($sql)){
	
	if ($Ciu ==$row['Codigo']){
		echo '<option value="'.$row['Codigo'].'" selected >'.$row['Nombre'].'</option>';
	} else{
		echo '<option value="'.$row['Codigo'].'">'.$row['Nombre'].'</option>';	
	}


	
}
echo '</select>';



?>