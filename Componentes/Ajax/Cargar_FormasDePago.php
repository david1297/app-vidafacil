<?php

include('is_logged.php');
$session_id= session_id();

if (isset($_POST['Nit'])){$Nit=$_POST['Nit'];}
if (isset($_POST['Perfil'])){$Perfil=$_POST['Perfil'];}

require_once ("../../config/db.php");
require_once ("../../config/conexion.php");

$delete=mysqli_query($con, "DELETE FROM formas_pago_temp ");   

   


$sql=mysqli_query($con, "select * from formas_pago");
while ($row=mysqli_fetch_array($sql)){
	$Codigo = $row['Codigo'];
	$Descripcion = $row['Descripcion'];
    $insert_tmp=mysqli_query($con, "INSERT INTO formas_pago_temp (Numero,session_id,Descripcion) VALUES ('$Codigo','$session_id','$Descripcion')");
}


?>
<table class="table">
<tr>
	<th class='text-center'>Codigo</th>
	<th class='text-center'>Descripcion</th>
    <th></th>
</tr>
<?php
	$sumador_total=0;
	$sql=mysqli_query($con, "select distinct Numero_Temp,Numero,Descripcion from formas_pago_temp where session_id='".$session_id."'");
	while ($row=mysqli_fetch_array($sql))
	{
    $Numero_Temp=$row['Numero_Temp'];    
	$Numero=$row["Numero"];
	$Descripcion=$row['Descripcion'];
	
	

		?>
		<tr>
			<td class='text-center'><?php echo $Numero;?></td>
			<td class='text-center'>
			<input type="text" class="form-control" id="Descripcion_<?php echo $Numero;?>" name="Descripcion_<?php echo $Numero;?>"  placeholder="Descripcion" value="<?php echo $Descripcion;?>" onkeypress="UpdateDescFormaPago(event,<?php echo $Numero;?>)">
			 </td>
			<?PHP
			ECHO' 
				<td class="text-center"><a href="#" class="btn btn-default" onclick="eliminar('.$Numero_Temp.')"><i class="glyphicon glyphicon-trash"></i></a></td>
				';
			?>
		</tr>		
		<?php
	}
	

?>


</table>
