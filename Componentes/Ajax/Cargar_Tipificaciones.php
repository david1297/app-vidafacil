<?php

include('is_logged.php');
$session_id= session_id();

if (isset($_POST['Id_N'])){$Id_N=$_POST['Id_N'];}
if (isset($_POST['Categoria'])){$Categoria=$_POST['Categoria'];}
if (isset($_POST['Tip'])){$Tip=$_POST['Tip'];}

require_once ("../../config/db.php");
require_once ("../../config/conexion.php");

$query1=mysqli_query($con, "select Numero,Nombre from TIPIFICACIONES where NCategoria = $Categoria ");
echo' <select class="form-control" id="Tipificacion" name ="Tipificacion" placeholder="Tipificacion" >';								
while($rw_Admin1=mysqli_fetch_array($query1)){
	if ($Tip ==$rw_Admin1['Numero']){
		echo '<option value="'.$rw_Admin1['Numero'].'" selected >'.$rw_Admin1['Nombre'].'</option>';
	} else{
		echo '<option value="'.$rw_Admin1['Numero'].'">'.$rw_Admin1['Nombre'].'</option>';	
	}
}
echo '</select>';

?>
