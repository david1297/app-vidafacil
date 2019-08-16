<?php

include('is_logged.php');
$session_id= session_id();
if (isset($_POST['Usuario'])){$Usuario=$_POST['Usuario'];}


require_once ("../../config/db.php");
require_once ("../../config/conexion.php");

    

if (!empty($Usuario)){
	$delete=mysqli_query($con, "DELETE FROM USUARIO_CAMP WHERE Usuario='".$Usuario."'");

	$query1=mysqli_query($con, "select Numero from u_camp_temp where  u_camp_temp.session_id='".$session_id."'  and Nit='".$Usuario."'");
while($row=mysqli_fetch_array($query1)){

	$Campana=$row['Numero'];

	$sql =  "INSERT INTO  USUARIO_CAMP(Campana,Usuario) VALUES ('".$Campana."', '".$Usuario."');";
	$query_update = mysqli_query($con,$sql);
    if ($query_update) {
        $messages = "Los Datos Se Han Modificado Con Exito.";
    } else {
        $errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
    }
}
}
if (isset($messages)){
				
	?>
	<div class="alert alert-success" role="alert">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>¡Bien hecho! </strong>
			<?php
				
						echo $messages;
				
				?>
	</div>
	<?php
}
if (isset($errors)){
	?>
	<div class="alert alert-danger" role="alert">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Error! </strong> 
			<?php
						echo $errors;
				?>
	</div>
	<?php
	}
	$delete=mysqli_query($con, "DELETE FROM  u_camp_temp where  u_camp_temp.session_id='".$session_id."'  and Nit='".$Usuario."'");
?>



