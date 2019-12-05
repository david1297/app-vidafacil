<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="FormaPago_Policia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" >Forma de Pago</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="FormPagoP" name="FormPagoP">
			<div id="resultados_ajax3B"></div>

			  <div class="form-group">
			  	<input type="Text" class="form-control hidden" id="NumeroVP" name="NumeroVP" placeholder="NumeroVP" >

				<label for="PIN" class="col-sm-4 control-label">PIN:</label>
				<div class="col-sm-8">
				  <input type="Text" class="form-control" id="PIN" name="PIN" placeholder="PIN" required maxlength="10"  value="<?php echo $Pin;?>" onkeypress='return validaNumericos(event)'>
				</div>
				<label for="Cuotas" class="col-sm-4 control-label">Cuotas:</label>
				<div class="col-sm-2">
				  <input type="Text" class="form-control" id="Cuotas" name="Cuotas" placeholder="Cuotas" required maxlength="2" value="<?php echo $Cuotas;?>" onkeypress='return validaNumericos(event)'>
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
	<?php
		}
	?>	