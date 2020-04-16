<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="AgregarGestion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="AgregarGestiones"> Agregar Gestiones</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="New_Gestion" name="New_Gestion">
			<div id="resultados_ajax3G"></div>
			 
			 
			 
			 
			  <div class="form-group">
				<label for="New_DescripcionG" class="col-sm-4 control-label">Descripcion</label>
				<div class="col-sm-8">
				  <input type="Text" class="form-control" id="New_DescripcionG" name="New_DescripcionG" placeholder="Descripcion" required onkeyup="javascript:this.value=this.value.toUpperCase();">
				
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