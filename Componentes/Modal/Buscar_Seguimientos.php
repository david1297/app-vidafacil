
	<?php
		if (isset($con))
		{
	?>	
			<div class="modal fade bs-example-modal-lg" id="AgregarSeguimiento" tabindex="-1" role="dialog" aria-labelledby="AgregarSeguimientoLabel">
			  <div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Buscar Seguimientos</h4>
				  </div>
				  <div class="modal-body">
					<form class="form-horizontal">
					  <div class="form-group">
							<div class="col-md-5">
								<input type="text" class="form-control" id="qS" autocomplete="off" placeholder="Escriba Su Criterio de Busqueda" onkeyup='LoadS(1);'>
							</div>
							<div class="col-md-2">
								<span id="loaderS"></span>
							</div>
					  </div>
					</form>
					<div id="loaderS" style="position: absolute;	text-align: center;	top: 55px;	width: 100%;display:none;"></div><!-- Carga gif animado -->
					<div class="outer_div" ></div><!-- Datos ajax Final -->
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					
				  </div>
				</div>
			  </div>
			</div>
	<?php
		}
	?>