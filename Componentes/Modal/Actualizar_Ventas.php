
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
						<div class="col-md-3">		
							<input type="text"class="hidden" id="Numero_Venta"name="Numero_Venta">
							<?php
							if($_SESSION['Rol']<>'2'){
								?>
								<label for="Estado" class="control-label">Estado</label>
									<select class="form-control" id="Estado" name ="Estado" placeholder="Estado"  >';
										<option value="Aprobada">Aprobada</option>';
										<option value="Rechazada">Rechazada</option>';							
									</select>								
								<?php
							}
							?>
								</div>		
								<div class="col-md-12">
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