	<?php
		if (isset($con))
		{
	?>	
			<div class="modal fade bs-example-modal-lg" id="BuscarAfiliado" tabindex="-1" role="dialog" aria-labelledby="BuscarAfiliado">
			  <div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Buscar Afiliado</h4>
				  </div>
				  <div class="modal-body">
					<form class="form-horizontal">
					  <div class="form-group">
						<div class="col-md-3">		
									<select class='form-control' id="Filtro" name ="Filtro" placeholder="Filtro" onchange='load(1);'>
										<option value="Identificacion">Identificacion</option>
										<option value="Nombre">Nombre o Apellido</option>
										<option value="Ciudad">Ciudad</option>
										<option value="Departamento">Departamento</option>
										<option value="Telefono">Telefono</option>
									</select>
								</div>		
								<div class="col-md-5">
									<input type="text" class="form-control" id="Busc_Afiliado" autocomplete="off" placeholder="Escriba Su Criterio de Busqueda" onkeyup='load(1);'>
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