<?php

include('is_logged.php');
$session_id= session_id();



require_once ("../../config/db.php");
require_once ("../../config/conexion.php");
if (isset($_POST['Id'])){
	$Id=$_POST['Id'];	
	?>
	<div class="table-responsive">
								<table class="table table-hover">
									<tr  class="warning">
										<th>Numero</th>
										<th>Fecha</th>
										<th>Gestion</th>
										<th>Descripcion</th>
										<th>Respuesta</th>
										<th>Ver</th>
									</tr>
									
									<?php
									$query1=mysqli_query($con, "select AGENDAMIENTOS.Id,AGENDAMIENTOS.Fecha,
																AGENDAMIENTOS.Descripcion,AGENDAMIENTOS.Respuesta,
																GESTION.Nombre from AGENDAMIENTOS
																inner join GESTION on GESTION.Codigo= AGENDAMIENTOS.Gestion 
																WHERE AGENDAMIENTOS.Afiliado= $Id  order by Fecha DESC");							
									while($rw_Admin1=mysqli_fetch_array($query1)){
										$AId=$rw_Admin1[0];
										$AFecha=$rw_Admin1[1];
										$ADescripcion=$rw_Admin1[2];
										$ARespuesta=$rw_Admin1[3];
										$AGestion=$rw_Admin1[4];
										?>
										<tr>
											<td><?php echo $AId; ?></td>
											<td><?php echo date("d-m-Y", strtotime($AFecha)); ?></td>
											<td><?php echo $AGestion; ?></td>
											<td><?php echo $ADescripcion; ?></td>
											<td><?php echo $ARespuesta; ?></td>
											<td class="text-center">
												<a href="#" class='btn btn-default' title='Ver Gestion' onclick="VerGestion('<?php echo $AId;?>');"><i class="glyphicon glyphicon-eye-open"></i></a> 
											</td>
										</tr>
										<?php
									}
									?>	
									
								</table>
							</div>
	<?php
}
?>