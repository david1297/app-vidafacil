<?php

include('is_logged.php');
$session_id= session_id();
if (isset($_POST['Numero'])){$Numero=$_POST['Numero'];}
if (isset($_POST['Nit'])){$Nit=$_POST['Nit'];}

require_once ("../../config/db.php");
require_once ("../../config/conexion.php");

    

if (!empty($Numero) )
{
	$insert_tmp=mysqli_query($con, "INSERT INTO USUARIO_CAMP (Campana,	Usuario) VALUES ('$Numero','$Nit')");

}



if (isset($_GET['Campana']))//codigo elimina un elemento del array
{
$Campana=intval($_GET['Campana']);	
$Nit=$_GET['Nit'];
$delete=mysqli_query($con, "DELETE FROM USUARIO_CAMP WHERE Campana='".$Campana."' and Usuario='".$Nit."' ");
}

?>
<div class="table-responsive">
			  <table class="table table-hover">
<tr>
	<th class='text-center'>Numero</th>
	<th>Nombre</th>
	<th class='text-center'>Porcentaje</th>
    <th></th>
</tr>
<?php
	$sumador_total=0;
	$sql=mysqli_query($con, "select CAMPANAS.Numero,CAMPANAS.Nombre,CAMPANAS.Porcentaje  from  USUARIO_CAMP 
	inner join CAMPANAS on CAMPANAS.Numero = USUARIO_CAMP.Campana
	where  USUARIO_CAMP.Usuario='".$Nit."'");
	while ($row=mysqli_fetch_array($sql))
	{

	$Numero=$row["Numero"];
	$Nombre=$row['Nombre'];
	$Porcentaje=$row['Porcentaje'];
	
	

		?>
		<tr>
			<td class='text-center'><?php echo $Numero;?></td>
			<td><?php echo $Nombre;?></td>
			<td class='text-center'><?php echo $Porcentaje;?></td>
			<?php			
								if ( $_SESSION['Estado']=='Activo'){
								?>
			<td class='text-center'><a href="#" class='btn btn-default' onclick="eliminar('<?php echo $Numero ?>')"><i class="glyphicon glyphicon-trash"></i></a></td>
			<?php
								}
								?>
		</tr>		
		<?php
	}
	

?>


</table></div>
