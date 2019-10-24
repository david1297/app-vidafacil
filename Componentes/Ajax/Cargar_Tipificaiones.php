<?php

include('is_logged.php');
$session_id= session_id();

if (isset($_POST['Nit'])){$Nit=$_POST['Nit'];}
if (isset($_POST['Perfil'])){$Perfil=$_POST['Perfil'];}

require_once ("../../config/db.php");
require_once ("../../config/conexion.php");
if (isset($_GET['Numero'])){
	$Numero=intval($_GET['Numero']);	
	$delete="DELETE FROM TIPIFICACIONES WHERE Numero=".$Numero."; ";
	$query_update = mysqli_query($con,$delete);
	if ($query_update) {
		$messages[] = "Los Datos Se Han Modificado Con Exito.";
	} else {
		$errors[] = "Lo sentimos , No se Puede Eliminar El Banco.<br>";
	}
}

if (!isset($errors)){
?>
<div class="accordion" id="accordionExample">
						<?php
						$query=mysqli_query($con, "SELECT NCategoria,Categoria FROM TIPIFICACIONES  group by NCategoria,Categoria;");
						$h=0;
						while($rw_Admin=mysqli_fetch_array($query)){
							if ($h==0){
								$Ac='true';
							}else{
								$Ac='false';
							}
							?>
							<div class="card">
								<div class="card-header" id="Head<?php echo $rw_Admin['NCategoria']?>">
								<h3 class="mb-0" style="margin-bottom: 0px;margin-top: 0px;">
								<div class="col-sm-1">
								<button class="btn btn-link collapsed" type="button" data-toggle="collapse" id='BC-<?php echo $rw_Admin['NCategoria']?>' data-target="#Coll<?php echo $rw_Admin['NCategoria']?>" aria-expanded="<?php echo $Ac;?>" aria-controls="Coll<?php echo $rw_Admin['NCategoria']?>">
									<i class="fas fa-plus"></i>
									</button>
								</div>
								<div class="col-sm-8">
								<input type="text" value='<?php echo $rw_Admin['Categoria'];?>' id='InputC-<?php Echo $rw_Admin['NCategoria'] ?>' class='form-control' onkeypress="UpdateTipCat(event,<?php echo $rw_Admin['NCategoria'];?>)" onkeyup="javascript:this.value=this.value.toUpperCase();">

								</div>
								<div class="col-sm-2">
								<span id="loader_TC<?php echo $rw_Admin['NCategoria']?>"></span>
								</div>

								
									
								</h3>
								</div>

								<div id="Coll<?php echo $rw_Admin['NCategoria']?>" class="collapse" aria-labelledby="Head<?php echo $rw_Admin['NCategoria']?>" data-parent="#accordionExample">
								<div class="card-body">
								<table class="table table-hover">
									<thead>
										<tr>
										<th scope="col">#</th>
										<th scope="col">Nombre</th>
										<th scope="col"></th>
										<th scope="col" class="text-center">Eliminar</th>
										</tr>
									</thead>
									<tbody>
								<?php
										$SubQ=mysqli_query($con, "SELECT Numero,Nombre FROM TIPIFICACIONES  where NCategoria=".$rw_Admin['NCategoria']."; ");
										
										
										while($SubR=mysqli_fetch_array($SubQ)){
											?>
											<tr>
											<th scope="row"><?php Echo $SubR['Numero'] ?></th>
											<td> <input type="text" class='form-control'id='Input-<?php Echo $SubR['Numero'] ?>' value='<?php Echo $SubR['Nombre'] ?>' onkeypress="UpdateTipi(event,<?php echo $SubR['Numero'];?>)" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
											<td><span id="loader_T<?php echo $SubR['Numero'];?>"></span></td>
											<td class="text-center">
											<button type="button" class="btn btn-default" onclick="EliminarTipi('<?php Echo $SubR['Numero'] ?>','<?php Echo $rw_Admin['NCategoria'] ?>')">
												<i class="glyphicon glyphicon-trash"></i>
											</button>
											</td>
											</tr>
											<?php
											
										}
									?>	
									</tbody>
								</table>
								<button type="button" class="btn btn-default" onclick="NewSubTipificacion('<?php echo $rw_Admin['NCategoria']?>','<?php echo $rw_Admin['Categoria']?>')">
									<i class="fas fa-plus"></i> Agregar SubTipificacion
								</button>
								</div>
								</div>
							</div>
							
							<?php
							$h=$h +1;
						}
						?>
  							
							    
  						</div>
						  <?php
}else{
	echo 'Error';
}

?>