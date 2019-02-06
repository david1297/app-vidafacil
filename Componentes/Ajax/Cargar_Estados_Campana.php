<?php

include('is_logged.php');
$session_id= session_id();

if (isset($_POST['Campana'])){$Campana=$_POST['Campana'];}
if (isset($_POST['Est_camp'])){$Est_camp=$_POST['Est_camp'];}
if (isset($_POST['Seg_camp'])){$Seg_camp=$_POST['Seg_camp'];}
if (isset($_POST['Tran_camp'])){$Tran_camp=$_POST['Tran_camp'];}


require_once ("../../config/db.php");
require_once ("../../config/conexion.php");

$query=mysqli_query($con, "select * from Campanas where Numero ='".$Campana."' ");
        $rw_Admin=mysqli_fetch_array($query);
      
		$tuArray = explode("\r\n", $rw_Admin['Estados']);
		echo '<div class="col-md-4"> 
		<label for="email" class="control-label">Estado Campaña</label>';
	echo' <select class="form-control" id="Estado_Campana" name ="Estado_Campana" placeholder="Estado Campaña">';
	foreach($tuArray as  $indice => $palabra){
		if ($Est_camp==$palabra){
			echo '<option value="'.$palabra.'" selected>'.$palabra.'</option>';	

		} else{
			echo '<option value="'.$palabra.'" >'.$palabra.'</option>';	

		}
	}  
echo '</select></div>';

      
		$tuArray = explode("\r\n", $rw_Admin['Seguimiento']);
echo '<div class="col-md-4">
<label for="email" class="control-label">Seguimiento Campaña</label>';
	echo' <select class="form-control" id="Seguimiento" name ="Seguimiento" placeholder="Seguimiento Campaña">';
	foreach($tuArray as  $indice => $palabra){
		if ($Seg_camp==$palabra){
			echo '<option value="'.$palabra.'" selected>'.$palabra.'</option>';	

		} else{
			echo '<option value="'.$palabra.'" >'.$palabra.'</option>';	

		}
	}  
echo '</select> </div>';
$tuArray = explode("\r\n", $rw_Admin['Transportadoras']);
echo '<div class="col-md-4">
<label for="email" class="control-label">Transportadora Campaña</label>';
	echo' <select class="form-control" id="Transportadora" name ="Transportadora" placeholder="Transportadora Campaña">';
	foreach($tuArray as  $indice => $palabra){
		if ($Tran_camp==$palabra){
			echo '<option value="'.$palabra.'" selected>'.$palabra.'</option>';	

		} else{
			echo '<option value="'.$palabra.'" >'.$palabra.'</option>';	

		}
	}  
echo '</select> </div>';



?>
