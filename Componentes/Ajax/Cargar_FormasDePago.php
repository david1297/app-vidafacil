<?php

include('is_logged.php');
$session_id= session_id();

if (isset($_POST['Nit'])){$Nit=$_POST['Nit'];}
if (isset($_POST['Perfil'])){$Perfil=$_POST['Perfil'];}

require_once ("../../config/db.php");
require_once ("../../config/conexion.php");
if (isset($_GET['Numero'])){
	$Numero=intval($_GET['Numero']);	
	$delete="DELETE FROM FORMAS_PAGO WHERE Codigo=".$Numero."; ";
	$query_update = mysqli_query($con,$delete);
	if ($query_update) {
		$messages[] = "Los Datos Se Han Modificado Con Exito.";
	} else {
		$errors[] = "Lo sentimos , No se Puede Eliminar La Forma De Pago.<br>";
	}
}

if (!isset($errors)){
?>
<table class="table">
<tr>
	<th class='text-center'>Codigo</th>
	<th class='text-center'>Descripcion</th>
	<th class='text-center'>Tipo</th>
    <th></th>
    <th></th>
</tr>
<?php
	$sumador_total=0;
	$sql=mysqli_query($con, "select distinct Codigo,Descripcion,Tipo from FORMAS_PAGO ");
	while ($row=mysqli_fetch_array($sql))
	{
  
	$Numero=$row["Codigo"];
	$Descripcion=$row['Descripcion'];
	$Tipo=$row['Tipo'];
	
	

		?>
		<tr>
			<td class='text-center'><?php echo $Numero;?></td>
			<td class='text-center'>
			<input type="text" class="form-control" id="Descripcion_<?php echo $Numero;?>" name="Descripcion_<?php echo $Numero;?>"  placeholder="Descripcion" value="<?php echo $Descripcion;?>" onkeypress="UpdateDescFormaPago(event,<?php echo $Numero;?>)" onkeyup="javascript:this.value=this.value.toUpperCase();">
			 </td>
			 <td class='text-center'>
			 	<select name="Tipo_<?php echo $Numero;?>" id="Tipo_<?php echo $Numero;?>"class="form-control" onchange="UpdateTipoFormaPago(<?php echo $Numero;?>)">
				 <?php
					if($Tipo=='Ninguno'){
						?>
						<option value="Ninguno" selected>Ninguno</option> 
						<option value="Policia">Policia</option> 
						<option value="Tarjeta">Tarjeta</option> 
						<?php
					}else{
						if($Tipo=='Policia'){
							?>
							<option value="Ninguno" >Ninguno</option> 
							<option value="Policia"selected>Policia</option> 
							<option value="Tarjeta">Tarjeta</option> 
							<?php
						}else{
							?>
							<option value="Ninguno" >Ninguno</option> 
							<option value="Policia">Policia</option> 
							<option value="Tarjeta"selected>Tarjeta</option> 
							<?php
						}
					}

				 ?>
				
				</select>
			 </td>
			 <td><span id="loader_<?php echo $Numero;?>"></span></td>
			<?PHP
			ECHO' 
				<td class="text-center"><a href="#" class="btn btn-default" onclick="eliminar('.$Numero.')"><i class="glyphicon glyphicon-trash"></i></a></td>
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