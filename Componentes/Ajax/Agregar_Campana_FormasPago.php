<?php

include('is_logged.php');
$session_id= session_id();
if (isset($_POST['Numero'])){$Numero=$_POST['Numero'];}
if (isset($_POST['NumeroC'])){$NumeroC=$_POST['NumeroC'];}

require_once ("../../config/db.php");
require_once ("../../config/conexion.php");

    

if (!empty($Numero) )
{
	$insert_tmp=mysqli_query($con, "INSERT INTO CAMP_FORMASPAGO (Campana,FormaPago) VALUES ('$NumeroC','$Numero')");

}



if (isset($_GET['FormaPago']))//codigo elimina un elemento del array
{
$FormaPago=intval($_GET['FormaPago']);	
$NumeroC=intval($_GET['NumeroC']);
$delete=mysqli_query($con, "DELETE FROM CAMP_FORMASPAGO WHERE FormaPago='".$FormaPago."' and Campana='".$NumeroC."' ");
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
	$sql=mysqli_query($con, "select FORMAS_PAGO.Codigo,FORMAS_PAGO.Descripcion  from  CAMP_FORMASPAGO 
	inner join FORMAS_PAGO on FORMAS_PAGO.Codigo = CAMP_FORMASPAGO.FormaPago
	where  CAMP_FORMASPAGO.Campana='".$NumeroC."'");
	while ($row=mysqli_fetch_array($sql))
	{

	$Numero=$row["Codigo"];
	$Nombre=$row['Descripcion'];
	
	

		?>
		<tr>
			<td class='text-center'><?php echo $Numero;?></td>
			<td><?php echo $Nombre;?></td>
			<td class='text-center'><a href="#" class='btn btn-default' onclick="EliminarF('<?php echo $Numero ?>')"><i class="glyphicon glyphicon-trash"></i></a></td>
		</tr>		
		<?php
	}
	

?>


</table></div>
