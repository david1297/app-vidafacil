<?php

include('is_logged.php');
$session_id= session_id();
if (isset($_POST['Numero'])){$Numero=$_POST['Numero'];}
if (isset($_POST['NumeroC'])){$NumeroC=$_POST['NumeroC'];}

require_once ("../../config/db.php");
require_once ("../../config/conexion.php");

    

if (!empty($Numero) )
{
	$insert_tmp=mysqli_query($con, "INSERT INTO CAMP_TRANSPORTADORA (Campana,Transportadora) VALUES ('$NumeroC','$Numero')");

}



if (isset($_GET['Transportadora']))//codigo elimina un elemento del array
{
$Transportadora=intval($_GET['Transportadora']);	
$NumeroC=intval($_GET['NumeroC']);
$delete=mysqli_query($con, "DELETE FROM CAMP_TRANSPORTADORA WHERE Transportadora='".$Transportadora."' and Campana='".$NumeroC."' ");
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
	$sql=mysqli_query($con, "select TRANSPORTADORAS.Numero,TRANSPORTADORAS.Nombre  from  CAMP_TRANSPORTADORA 
	inner join TRANSPORTADORAS on TRANSPORTADORAS.Numero = CAMP_TRANSPORTADORA.Transportadora
	where  CAMP_TRANSPORTADORA.Campana='".$NumeroC."'");
	while ($row=mysqli_fetch_array($sql))
	{

	$Numero=$row["Numero"];
	$Nombre=$row['Nombre'];
	
	

		?>
		<tr>
			<td class='text-center'><?php echo $Numero;?></td>
			<td><?php echo $Nombre;?></td>
			<td class='text-center'><a href="#" class='btn btn-default' onclick="EliminarT('<?php echo $Numero ?>')"><i class="glyphicon glyphicon-trash"></i></a></td>
		</tr>		
		<?php
	}
	

?>


</table></div>
