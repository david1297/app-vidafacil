<?php
include('is_logged.php');
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    require_once("../../libraries/password_compatibility_library.php");
}		

    require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$Id = mysqli_real_escape_string($con,(strip_tags($_POST["Id"],ENT_QUOTES)));			
	$Tipificacion = mysqli_real_escape_string($con,(strip_tags($_POST["Tipificacion"],ENT_QUOTES)));			
	$AEstado = mysqli_real_escape_string($con,(strip_tags($_POST["AEstado"],ENT_QUOTES)));			
	
				$User=$_SESSION['Nit'];
				$Observaciones ='';
				$Tipi=0;
				$CargarOb ='NO';
				$CargarTip = 'NO';
				date_default_timezone_set('America/Bogota');
				$FechaT =date("d-m-Y h:i:sa");	
				$Observaciones = mysqli_real_escape_string($con,(strip_tags($_POST["Observacion"],ENT_QUOTES)));

				if ($Observaciones!='') {
					
				$CargarOb = 'SI';	
				}

				$query1=mysqli_query($con, "select Tipificacion from AFILIADOS where Id = $Id;");
				$rw_Admin1=mysqli_fetch_array($query1);
				$TipAnt =$rw_Admin1[0];
		
				if ($TipAnt !=$Tipificacion ){
					$CargarTip = 'SI';
					$Tipi=$Tipificacion;
				}
				
				$sql =  "Update AFILIADOS Set Tipificacion='".$Tipificacion."',AEstado='".$AEstado."' where Id =".$Id.";";
				$query_update = mysqli_query($con,$sql);
				if($query_update){
					$messages[] = "La Venta Se Actualizo Con Exito.";
				}

	
	
			
				if(($CargarOb=='SI')||($CargarTip=='SI')){
					$sql =  "INSERT INTO  OBSERVACIONES_AFILIADO(Afiliado,Fecha,Observacion,Usuario,Tipificacion) VALUES
					('".$Id."', '".$FechaT."', '".$Observaciones."', '".$User."',$Tipi)";
				 $query_update = mysqli_query($con,$sql);
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
				<strong>¡Bien! </strong>
				<?php
					foreach ($messages as $message) {
						echo $message;
					}
				?>
			</div>
			<?php
			}
?>