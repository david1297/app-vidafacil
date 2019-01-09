	<?php
		if (isset($con))
		{
	?>	
			<div class="modal fade bs-example-modal-lg" id="BuscarCliente" tabindex="-1" role="dialog" aria-labelledby="BuscarClienteLabel">
			  <div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Buscar Cliente</h4>
				  </div>
				  <div class="modal-body">
					<form class="form-horizontal">
					  <div class="form-group">
						<div class="col-sm-6">
						  <input type="text" class="form-control" id="Busc_Cliente" placeholder="Buscar Cliente" onkeyup="loadc(1)">
						</div>
						<!--<button type="button" class="btn btn-default" onclick="loadc(1)"><span class='glyphicon glyphicon-search'></span> Buscar</button>-->
					  </div>
					</form>
					<div id="loaderc" style="position: absolute;	text-align: center;	top: 55px;	width: 100%;display:none;"></div><!-- Carga gif animado -->
					<div class="outer_divc" ></div><!-- Datos ajax Final -->
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