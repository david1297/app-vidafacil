<?php

include('is_logged.php');
$session_id= session_id();

if (isset($_POST['Campana'])){$Campana=$_POST['Campana'];}


require_once ("../../config/db.php");
require_once ("../../config/conexion.php");

$query=mysqli_query($con, "select * from Campanas where Numero ='".$Campana."' ");
        $rw_Admin=mysqli_fetch_array($query);
      
		$tuArray = explode("\r\n", $rw_Admin['Estados']);
echo '<label for="email" class="control-label">Estado Campaña</label>';
	echo' <select class="form-control" id="Estado_Campana" name ="Estado_Campana" placeholder="Estado Campaña">';
	foreach($tuArray as  $indice => $palabra){
			echo '<option value="'.$palabra.'">'.$palabra.'</option>';	
	}  


echo '</select>';



?>
