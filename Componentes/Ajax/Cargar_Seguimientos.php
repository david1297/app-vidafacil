<?php

include('is_logged.php');
$session_id= session_id();

if (isset($_POST['Nit'])){$Nit=$_POST['Nit'];}
if (isset($_POST['Perfil'])){$Perfil=$_POST['Perfil'];}

require_once ("../../config/db.php");
require_once ("../../config/conexion.php");
if (isset($_GET['Numero'])){
	$Numero=intval($_GET['Numero']);	
	$delete="DELETE FROM SEGUIMIENTOS  WHERE Numero=".$Numero."; ";
	$query_update = mysqli_query($con,$delete);
	if ($query_update) {
		$messages[] = "Los Datos Se Han Modificado Con Exito.";
	} else {
		$errors[] = "Lo sentimos , No se Puede Eliminar El Seguimiento.<br>";
	}
}

if (!isset($errors)){
?>
<table class="table">
<tr>
	<th class='text-center'>Codigo</th>
	<th class='text-center'>Descripcion</th>
    <th></th>
    <th></th>
</tr>
<?php
	$sumador_total=0;
	$sql=mysqli_query($con, "select distinct Numero,Nombre from SEGUIMIENTOS ");
	while ($row=mysqli_fetch_array($sql))
	{
  
	$Numero=$row["Numero"];
	$Descripcion=$row['Nombre'];
	
	

		?>
		<tr>
			<td class='text-center'><?php echo $Numero;?></td>
			<td class='text-center'>
			<input type="text" class="form-control" id="Descripcion_S<?php echo $Numero;?>" name="Descripcion_S<?php echo $Numero;?>"  placeholder="Descripcion" value="<?php echo $Descripcion;?>" onkeypress="UpdateDescSeguimientos(event,<?php echo $Numero;?>)" onkeyup="javascript:this.value=this.value.toUpperCase();">
			 </td>
			 <td><span id="loader_S<?php echo $Numero;?>"></span></td>
			<?PHP
			ECHO' 
				<td class="text-center"><a href="#" class="btn btn-default" onclick="eliminarSeguimiento('.$Numero.')"><i class="glyphicon glyphicon-trash"></i></a></td>
				';
			?>
		</tr>		
		<?php
	}
echo '</table>'	;
}else{
	echo 'Error';
}

?>