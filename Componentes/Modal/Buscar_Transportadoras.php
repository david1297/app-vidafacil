	<?php
		if (isset($con))
		{
	?>	
			<div class="modal fade bs-example-modal-lg" id="AgregarTransportadora" tabindex="-1" role="dialog" aria-labelledby="AgregarTransportadoraLabel">
			  <div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Buscar Transportadoras</h4>
				  </div>
				  <div class="modal-body">
					<form class="form-horizontal">
					  <div class="form-group">
							<div class="col-md-5">
								<input type="text" class="form-control" id="qT" autocomplete="off" placeholder="Escriba Su Criterio de Busqueda" onkeyup='LoadT(1);'>
							</div>
							<div class="col-md-2">
								<span id="loaderT"></span>
							</div>
					  </div>
					</form>
					<div id="loaderT" style="position: absolute;	text-align: center;	top: 55px;	width: 100%;display:none;"></div><!-- Carga gif animado -->
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