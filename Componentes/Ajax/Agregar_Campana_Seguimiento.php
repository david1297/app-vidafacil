<?php

include('is_logged.php');
$session_id= session_id();
if (isset($_POST['Numero'])){$Numero=$_POST['Numero'];}
if (isset($_POST['NumeroC'])){$NumeroC=$_POST['NumeroC'];}

require_once ("../../config/db.php");
require_once ("../../config/conexion.php");

    

if (!empty($Numero) )
{
	$insert_tmp=mysqli_query($con, "INSERT INTO CAMP_SEGUIMIENTO (Campana,Seguimiento) VALUES ('$NumeroC','$Numero')");

}



if (isset($_GET['Seguimiento']))//codigo elimina un elemento del array
{
$Seguimiento=intval($_GET['Seguimiento']);	
$NumeroC=intval($_GET['NumeroC']);
$delete=mysqli_query($con, "DELETE FROM CAMP_SEGUIMIENTO WHERE Seguimiento='".$Seguimiento."' and Campana='".$NumeroC."' ");
}

?>
<div class="table-responsive">
			  <table class="table table-hover">
<tr>
	<th class='text-center'>Numero</th>
	<th>Nombre</th>
    <?php
		if ( $_SESSION['Estado']=='Activo'){
			?>
    		<th class='text-center'>Eliminar</th>
			<?php
		}
	?>
</tr>
<?php
	$sumador_total=0;
	$sql=mysqli_query($con, "select SEGUIMIENTOS.Numero,SEGUIMIENTOS.Nombre  from  CAMP_SEGUIMIENTO 
	inner join SEGUIMIENTOS on SEGUIMIENTOS.Numero = CAMP_SEGUIMIENTO.Seguimiento
	where  CAMP_SEGUIMIENTO.Campana='".$NumeroC."'");
	while ($row=mysqli_fetch_array($sql))
	{

	$Numero=$row["Numero"];
	$Nombre=$row['Nombre'];
	
	

		?>
		<tr>
			<td class='text-center'><?php echo $Numero;?></td>
			<td><?php echo $Nombre;?></td>
			<?php
			if ( $_SESSION['Estado']=='Activo'){
				?>
			<td class='text-center'><a href="#" class='btn btn-default' onclick="EliminarS('<?php echo $Numero ?>')"><i class="glyphicon glyphicon-trash"></i></a></td>
			<?php
			}
			?>
		</tr>		
		<?php
	}
	

?>


</table></div>
