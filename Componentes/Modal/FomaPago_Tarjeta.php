<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="FormaPago_Tarjeta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" >Forma de Pago</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="FormPagoT" name="FormPagoT">
			<div id="resultados_ajax3B"></div>

			  <div class="form-group">
			  	<input type="Text" class="form-control hidden" id="NumeroVT" name="NumeroVT" placeholder="NumeroVT" >
				
				<div class="row">
					<label for="Numero" class="col-sm-4 control-label">Numero De la Tarjeta:</label>
					<div class="col-sm-7">
				  		<input type="Text" class="form-control" id="NumeroT" name="NumeroT" placeholder="Numero De la Tarjeta" required minlength="16"  maxlength="16" value="<?php echo $NumeroTarjeta;?>" onkeypress='return validaNumericos(event)'>
					</div>
				</div>
				<div class="row">
					<label for="PIN" class="col-sm-4 control-label">Fecha de Vencimiento:</label>
					<input type="text" class="hidden" value="<?php echo $FechaExp;?>" name="FechaExp" id="FechaExp">
					<div class="col-sm-2">
						<select name="Mes" id="Mes"class="form-control">
						<option value="Todos">Todos</option>
						</select>
					</div>
				
					
					<div class="col-sm-3">
						<select name="Anio" id="Anio"class="form-control" onchange='Cambio()'>
							<?php
							date_default_timezone_set('America/Bogota');
							$anio =date("Y");	
						
							for($I=$anio;$I<=($anio+20);$I++){
								if ($fom[1]==$I){
									?>
									<option value="<?php echo $I;?>"selected><?php echo $I;?></option>
	
									<?php
								}else{
									?>
								<option value="<?php echo $I;?>"><?php echo $I;?></option>

								<?php
								}
								
							}
							?>
						</select>
					</div>
				</div>
				<div class="row">
				<label for="SCode" class="col-sm-4  control-label">SCode:</label>
				<div class="col-sm-2">
				  <input type="Text" class="form-control" id="SCode" name="SCode" placeholder="SCode" required maxlength="4" value="<?php echo $SCode;?>" onkeypress='return validaNumericos(event)'>
				</div>
				</div>

				
			  </div>
			  
			 
			  

			 
			 
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="actualizar_datos3B">Guardar</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<script>
	
	</script>
	<?php
		}
	?>	