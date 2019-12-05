<?php

include('is_logged.php');
$session_id= session_id();

if (isset($_POST['PIN'])){$PIN=$_POST['PIN'];}
if (isset($_POST['Cuotas'])){$Cuotas=$_POST['Cuotas'];}
if (isset($_POST['NumeroVP'])){$NumeroVP=$_POST['NumeroVP'];}
if (isset($_POST['NumeroVT'])){$NumeroVT=$_POST['NumeroVT'];}

if (isset($_POST['NumeroT'])){$NumeroT=$_POST['NumeroT'];}
if (isset($_POST['Mes'])){$Mes=$_POST['Mes'];}
if (isset($_POST['Anio'])){$Anio=$_POST['Anio'];}
if (isset($_POST['SCode'])){$SCode=$_POST['SCode'];}



require_once ("../../config/db.php");
require_once ("../../config/conexion.php");

    

if (!empty($PIN)){
	$sql =  "UPDATE VENTAS set Pin='".$PIN."',Cuotas=$Cuotas  where Numero =$NumeroVP ";
	$query_update = mysqli_query($con,$sql);
    if ($query_update) {
        $messages = "Los Datos Se Han Guardado Con Exito.";
    } else {
        $errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
	}
}
if (!empty($NumeroT)){
$Fecha = $Mes.'/'.$Anio;

	$sql =  "UPDATE VENTAS set NumeroTarjeta='".$NumeroT."',SCode=$SCode,FechaExp='".$Fecha."'  where Numero =$NumeroVT ";
	$query_update = mysqli_query($con,$sql);
    if ($query_update) {
        $messages = "Los Datos Se Han Guardado Con Exito.";
    } else {
        $errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
	}
}

if (isset($errors)){
			echo $sql;
	?>
	<div class="alert alert-danger" role="alert">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Error!</strong> 
			<?php
				foreach ($errors as $error) {
						echo $error;
					}
				?>
	</div>
	<?php
	}
	if (isset($messages)){
		echo '*Correcto*'.$NumeroVP.'*';
		?>
		<div class="alert alert-success" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>¡Bien hecho! La Forma de Pago se Guardo Correctamente.</strong>
				
		</div>
		<?php
	}
?>



