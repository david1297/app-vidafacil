<?php

include('is_logged.php');
$session_id= session_id();

if (isset($_POST['Nit'])){$Nit=$_POST['Nit'];}

require_once ("../../config/db.php");
require_once ("../../config/conexion.php");

$delete=mysqli_query($con, "DELETE FROM u_camp_temp WHERE  Nit=".$Nit."");   

   


$sql=mysqli_query($con, "select * from usuario_camp where  Usuario='".$Nit."'");
while ($row=mysqli_fetch_array($sql)){
	$Numero = $row['Campana'];
	$query1=mysqli_query($con, "select * from Campanas where Numero=".$Numero." ");
	$rw_Admin1=mysqli_fetch_array($query1);
	$Nombre=$rw_Admin1['Nombre'];
	$Porcentaje =$rw_Admin1['Porcentaje'];

    $insert_tmp=mysqli_query($con, "INSERT INTO u_camp_temp (Numero,Nombre,Porcentaje,session_id,Nit) VALUES ('$Numero','$Nombre','$Porcentaje','$session_id','$Nit')");

}


?>
<table class="table">
<tr>
	<th class='text-center'>Numero</th>
	<th>Nombre</th>
	<th class='text-center'>Porcentaje</th>
    <th></th>
</tr>
<?php
	$sumador_total=0;
	$sql=mysqli_query($con, "select distinct Numero_Temp,Numero,Nombre,Porcentaje from u_camp_temp where Nit='".$Nit."'");
	while ($row=mysqli_fetch_array($sql))
	{
    $Numero_Temp=$row['Numero_Temp'];    
	$Numero=$row["Numero"];
	$Nombre=$row['Nombre'];
	$Porcentaje=$row['Porcentaje'];
	
	

		?>
		<tr>
			<td class='text-center'><?php echo $Numero;?></td>
			<td><?php echo $Nombre;?></td>
			<td class='text-center'><?php echo $Porcentaje;?></td>
			<td class='text-center'><a href="#" class='btn btn-default' onclick="eliminar('<?php echo $Numero_Temp ?>')"><i class="glyphicon glyphicon-trash"></i></a></td>
		</tr>		
		<?php
	}
	

?>


</table>
