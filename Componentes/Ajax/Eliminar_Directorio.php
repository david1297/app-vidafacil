<?php

include('is_logged.php');
$session_id= session_id();

if (isset($_POST['Nit'])){$Nit=$_POST['Nit'];}
if (isset($_POST['Perfil'])){$Perfil=$_POST['Perfil'];}

require_once ("../../config/db.php");
require_once ("../../config/conexion.php");
if (isset($_GET['Codigo'])){
	$Codigo=intval($_GET['Codigo']);	
	$delete="DELETE FROM DIRECTORIO  WHERE Codigo=".$Codigo."; ";
	$query_update = mysqli_query($con,$delete);
	if ($query_update) {
		$messages[] = "Los Datos Se Han Modificado Con Exito.";
	} else {
		$errors[] = "Lo sentimos , No se Puede Eliminar El Banco.<br>";
	}
}


?>