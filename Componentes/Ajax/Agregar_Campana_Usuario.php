<?php

include('is_logged.php');
$session_id= session_id();
if (isset($_POST['Numero'])){$Numero=$_POST['Numero'];}
if (isset($_POST['Nit'])){$Nit=$_POST['Nit'];}

require_once ("../../config/db.php");
require_once ("../../config/conexion.php");

    

if (!empty($Numero) )
{
	$insert_tmp=mysqli_query($con, "INSERT INTO usuario_camp (Campana,	Usuario) VALUES ('$Numero','$Nit')");

}



if (isset($_GET['Campana']))//codigo elimina un elemento del array
{
$Campana=intval($_GET['Campana']);	
$Nit=intval($_GET['Nit']);
$delete=mysqli_query($con, "DELETE FROM usuario_camp WHERE Campana='".$Campana."' and Usuario='".$Nit."' ");
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
	$sql=mysqli_query($con, "select Campanas.Numero,Campanas.Nombre,Campanas.Porcentaje  from  usuario_camp 
	inner join Campanas on Campanas.Numero = usuario_camp.Campana
	where  usuario_camp.Usuario='".$Nit."'");
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
			<td class='text-center'><a href="#" class='btn btn-default' onclick="eliminar('<?php echo $Numero ?>')"><i class="glyphicon glyphicon-trash"></i></a></td>
		</tr>		
		<?php
	}
	

?>


</table></div>
