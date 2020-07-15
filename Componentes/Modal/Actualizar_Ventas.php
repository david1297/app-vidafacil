
			<div class="modal fade bs-example-modal-lg" id="UdateVenta" tabindex="-1" role="dialog" aria-labelledby="UdateVenta">
			  <div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h2 Id="Titulo_Venta"> </h2>
					
				  </div>
				  <div class="modal-body">
					<form class="form-horizontal" method="post"  id="Actualizar_Ventas" name="Actualizar_Ventas">
					  <div class="form-group">
						
						<div class="col-md-6 " id="Descuentos">
							<input type="text" class="form-control hidden" id="Comision" Name="Comision"  autocomplete="off" >
							<input type="text" class="form-control hidden" id="Valor" Name="Valor"  autocomplete="off" >
							<input type="text" class="form-control hidden" id="TPago" Name="TPago"  autocomplete="off" >
							<?php
								$query=mysqli_query($con, "select * from ADMINISTRACION");
								$rw_Admin=mysqli_fetch_array($query);
								$ComisionT =  $rw_Admin['ComisionT'];
								$ComisionF =  $rw_Admin['ComisionF'];
								$IvaG7 =  $rw_Admin['IvaG7'];
								$Retefuente =  $rw_Admin['Retefuente'];
								$ReteIca =  $rw_Admin['ReteIca'];
							?>
									
							<table>
								<tr  class="warning">
									<th>Descripcion</th>
									<th>Valor</th>
								</tr>	
								<tr>
									<td>Valor de Venta</td>
									<td><input type="text" class="form-control valor" readonly name="VVenta" id="VVenta" ></td>	
								</tr>
								<tr>
									<td>comision transaccion Bancaria <?php echo $ComisionT?>%</td>
									<td>
										<input type="text" class="form-control hidden" name="ComisionT" id="ComisionT" value="<?php echo $ComisionT?>">
										<input type="text" class="form-control valor" name="VComisionT" id="VComisionT" readonly value="">
									</td>	
								</tr>
								<tr>
									<td>comision G7 -<?php echo $Porcentaje_Comision;?>%</td>
									<td>
										<input type="text" class="form-control hidden" name="ComisionG7" id="ComisionG7">
										<input type="text" class="form-control valor" readonly name="VComisionG7" id="VComisionG7" value="">
									</td>	
								</tr>	
								<tr>
									<td>Comisión Fija  G7 </td>
									<td><input type="text" class="form-control valor" name ="ComisionF" id="ComisionF" readonly value="<?php echo $ComisionF;?>"></td>	
								</tr>
								<tr>
									<td>Total Comision g7 </td>
									<td><input type="text" class="form-control valor" name ="TotalComisionG7" id="TotalComisionG7"readonly ></td>	
								</tr>
								<tr>
									<td>IVA Comisión g7 - <?php echo $IvaG7;?>% </td>
									<input type="text" class="form-control hidden" name="IvaG7" id="IvaG7" value="<?php echo $IvaG7;?>">
									<td><input type="text" class="form-control valor" name="VIvaG7" id="VIvaG7" readonly ></td>	
								</tr>
								<tr>
									<td>Retencion en la fuente - <?php echo $Retefuente;?>% </td>
									<input type="text" class="form-control hidden" name="Retefuente" id="Retefuente"  value="<?php echo $Retefuente;?>">
									<td><input type="text" class="form-control valor" name="VRetefuente" id="VRetefuente" readonly ></td>	
								</tr>
								<tr>
									<td>Retencion ICA - <?php echo $ReteIca;?>% </td>
									<input type="text" class="form-control hidden "name="ReteIca" id="ReteIca" value="<?php echo $ReteIca;?>">
									<td><input type="text" class="form-control valor"name="VReteIca" id="VReteIca" readonly ></td>	
								</tr>
								<tr>
									<td>Total Descuentos </td>
									<td><input type="text" class="form-control valor"  readonly name="TotalDescuento" id="TotalDescuento"></td>	
								</tr>
								<tr>
									<td>Total  cuenta virtual  </td>
									<td><input type="text" class="form-control valor" readonly name="TotalCuenta" id ="TotalCuenta"></td>	
								</tr>


							</table>				
						</div>
						<div class="col-md-3">		
							<input type="text"class="hidden" id="Numero_Venta"name="Numero_Venta">
							<?php
							$query1=mysqli_query($con, 'SELECT Estado FROM permisos where Modulo="Transacciones" and Permiso="CambiarEstado" and  Usuario ="'.$_SESSION['Nit'].'";');
								$NumeroA="hidden";		
							$rw_Admin1=mysqli_fetch_array($query1);
							if($_SESSION['Rol']<>'2' or $rw_Admin1['Estado']=='true'){
								$NumeroA="";
								?>
								<label for="Estado" class="control-label">Estado</label>
									<select class="form-control" id="Estado" name ="Estado" placeholder="Estado" onchange="ValidarEstado(event)" >';
															
									</select>								
								<?php
							}
							$query1=mysqli_query($con, 'SELECT Estado FROM permisos where Modulo="Transacciones" and Permiso="TipificaionesSeguimiento" and  Usuario ="'.$_SESSION['Nit'].'";');			
							$rw_Admin1=mysqli_fetch_array($query1);
							if($_SESSION['Rol']<>'2' or $rw_Admin1['Estado']=='true'){	
								?>
								<label for="Estado" class="control-label">Estado De Campaña </label>
									<select class="form-control" id="Estado_Campana" name ="Estado_Campana" placeholder="Estado"  >';						
									</select>	
								<?php
							}
							?>
							<label for="Token" class="control-label <?php echo $NumeroA;?>">Numero de Aprobacion</label>
							<input type="text" class="form-control <?php echo $NumeroA;?>" id="Token" Name="Token" placeholder="Numero de Aprobacion" value="" autocomplete="off" >
							<input type="text" class="form-control hidden" id="EstadoA" placeholder="Numero de Aprobacion" value="" autocomplete="off" >
						</div>
						
						<div class="col-md-6 " id="FormaDePago">
							
							</div>


						<div class=" col-md-12">
						<br>
						<div class=" card border-secondary" id="CObservaciones">
						
						
						</div>
						</div>

		
						<div class="col-md-12">
						<br>
  							<label for="Observaciones">Observaciones:</label>
  							<textarea class="form-control" rows="5" id="Observaciones" name="Observaciones"></textarea>
						</div>
						
						
						
						<!--<button type="button" class="btn btn-default" onclick="loadc(1)"><span class='glyphicon glyphicon-search'></span> Buscar</button>-->
					  </div>
						<div id="resultados_ajax2"></div>
						<div id="loaderc" style="position: absolute;	text-align: center;	top: 55px;	width: 100%;display:none;"></div><!-- Carga gif animado -->
					<div class="outer_divc" ></div><!-- Datos ajax Final -->
				  </div>
				  <div class="modal-footer">
					<button type="submit" class="btn btn-primary">Guardar datos</button>
					<button type="button" class="btn btn-default" data-dismiss="modal" >Cerrar</button>
					
					</form>
					
				  </div>
				</div>
			  </div>
			</div>
	<?php

	?>