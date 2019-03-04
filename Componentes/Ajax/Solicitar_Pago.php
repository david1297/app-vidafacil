<?php
include('is_logged.php');
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    require_once("../../libraries/password_compatibility_library.php");
}	
require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	
if (empty($_POST['NumeroVenta'])){
	?>
	<div class="alert alert-danger" role="alert">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Error! </strong> 
			No se A selecciondo Ninguna Comision 
	</div>
	<?php
}else{
	foreach($_POST['NumeroVenta'] as $Numero){
		$sql=mysqli_query($con, "select LAST_INSERT_ID(Numero) as last from transacciones order by Numero desc limit 0,1 ");
		$rw=mysqli_fetch_array($sql);
		$numero_Transaccion=$rw['last']+1;
		/*echo $Numero;*/
		$query1=mysqli_query($con, 'SELECT Usuario FROM Ventas where   Numero ='.$Numero.';');
		$rw_Admin1=mysqli_fetch_array($query1);
		$Usuario=$rw_Admin1['Usuario'];
		$sql = "INSERT INTO transacciones(Numero,Usuario,Venta,Fecha,Estado)
				VALUES('".$numero_Transaccion."','".$Usuario."',".$Numero.",'".date("Y-m-d")."','Pendiente')";		
		$query_update = mysqli_query($con,$sql);
		if ($query_update) {
			$sql =  "Update Cuenta_Virtual Set Estado='Solicitada' where Venta =".$Numero.";";				
			$query_update = mysqli_query($con,$sql);
			if ($query_update) {
				$messages[] = "La Solicitud se realizo Correctamente,";
			}
			$sql =  "Update Ventas Set Liquidada='Pendiente' where Numero =".$Numero.";";				
			$query_update = mysqli_query($con,$sql);
			if ($query_update) {
				$messages[] = "La Solicitud se realizo Correctamente,";
			}
		} else {
			$errors[] = $sql;
		}
	}
}


if (isset($errors)){	
	?>
	<div class="alert alert-danger" role="alert">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Error! </strong> 
		<?php
			foreach ($errors as $error) {
				echo $error;
			}
		?>
	</div>
	<?php
	}
		if (isset($messages)){				
			?>
			<div class="alert alert-success" role="modal">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>¡Bien hecho! </strong>
				<?php
					foreach ($messages as $message) {
						echo $message;
					}
				?>
			</div>
			<?php
			}
?>