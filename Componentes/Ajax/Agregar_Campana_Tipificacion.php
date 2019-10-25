<?php

include('is_logged.php');
$session_id= session_id();
if (isset($_POST['Numero'])){$Numero=$_POST['Numero'];}
if (isset($_POST['NumeroC'])){$NumeroC=$_POST['NumeroC'];}

require_once ("../../config/db.php");
require_once ("../../config/conexion.php");

    

if (!empty($Numero) )
{
	$insert_tmp=mysqli_query($con, "INSERT INTO CAMP_TIPIFICACIONES (Campana,Tipificacion) VALUES ('$NumeroC','$Numero')");

}



if (isset($_GET['Tipificacion']))//codigo elimina un elemento del array
{
$Tipificacion=intval($_GET['Tipificacion']);	
$NumeroC=intval($_GET['NumeroC']);
$delete=mysqli_query($con, "DELETE FROM CAMP_TIPIFICACIONES WHERE Tipificacion='".$Tipificacion."' and Campana='".$NumeroC."' ");
}

?>
<div class="table-responsive">
			  <table class="table table-hover">
<tr>
	<th class='text-center'>Numero</th>
	<th>Nombre</th>
    <th class='text-center'>Eliminar</th>
</tr>
<?php
	$sumador_total=0;
	$sql=mysqli_query($con, "select TIPIFICACIONES.Numero,TIPIFICACIONES.Nombre  from  CAMP_TIPIFICACIONES 
	inner join TIPIFICACIONES on TIPIFICACIONES.Numero = CAMP_TIPIFICACIONES.Tipificacion
	where  CAMP_TIPIFICACIONES.Campana='".$NumeroC."'");
	while ($row=mysqli_fetch_array($sql))
	{

	$Numero=$row["Numero"];
	$Nombre=$row['Nombre'];
	
	

		?>
		<tr>
			<td class='text-center'><?php echo $Numero;?></td>
			<td><?php echo $Nombre;?></td>
			<td class='text-center'><a href="#" class='btn btn-default' onclick="EliminarTr('<?php echo $Numero ?>')"><i class="glyphicon glyphicon-trash"></i></a></td>
		</tr>		
		<?php
	}
	

?>


</table></div>
