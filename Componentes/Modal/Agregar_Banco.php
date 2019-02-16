	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="AgregarBanco" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="AgregarBanco"> Agregar Bancos</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="New_Banco" name="New_Banco">
			<div id="resultados_ajax3B"></div>
			 
			 
			 
			 
			  <div class="form-group">
				<label for="New_DescripcionB" class="col-sm-4 control-label">Descripcion</label>
				<div class="col-sm-8">
				  <input type="Text" class="form-control" id="New_DescripcionB" name="New_DescripcionB" placeholder="Descripcion" required>
				
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