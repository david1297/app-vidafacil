	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="nuevoCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Agregar nuevo cliente</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="guardar_cliente" name="guardar_cliente">
			<div id="resultados_ajax"></div>
			<div class="form-group">
				<label for="Tipo_Documento" class="col-sm-3 control-label">Tipo De Documento</label>
				<div class="col-sm-8">
				 <select class="form-control" id="Tipo_Documento" name="Tipo_Documento" required>
					<option value="1" selected>Nit</option>
					<option value="0">Cedula De Ciudadania</option>
				  </select>
				</div>
			  </div>


			<div class="form-group">
				<label for="Nit" class="col-sm-3 col-xs-12 control-label">N.Documento</label>
				<div class="col-sm-6 col-xs-8">
				  <input type="text" class="form-control" id="Nit" name="Nit" placeholder="Numero de Documento"  required>
				</div>
				<div class="col-sm-2 col-xs-4">
				  <input type="text" class="form-control" id="Cv" name="Cv" required readonly placeholder="Cv" > 
				</div>
			  </div>
				<div class="form-group">
				<label for="Nombre" class="col-sm-3 control-label">Nombre</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="Nombre" name="Nombre" required placeholder="Nombre Completo">
				</div>
			  </div>
				<div class="form-group">
				<label for="Direccion" class="col-sm-3 control-label">Direccion</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="Direccion" name="Direccion" required placeholder="Direccion">
				</div>
				</div>
				<div class="form-group">
				<label for="Telefono" class="col-sm-3 control-label">Telefono</label>
				<div class="col-sm-6">
				  <input type="text" class="form-control" id="Telefono" name="Telefono" required placeholder="Telefono">
				</div>
				<div class="col-sm-2">
				  <input type="text" class="form-control" id="Ext" name="Ext"placeholder="Ext" >
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="Correo" class="col-sm-3 control-label">Correo</label>
				<div class="col-sm-8">
					<input type="email" class="form-control" id="Correo" name="Correo" require placeholder="Correo Electronico" >
				  
				</div>
			  </div>

				<div class="form-group">
					<label for="Direccion" class="col-sm-3 control-label">Pais</label>
					<div class="col-md-8">
						<select class='form-control' id="condiciones" placeholder="Pais">
							<option value="1">Colombia</option>
							<option value="2">Chile</option>
							<option value="3">Venezuela</option>
							<option value="4">Estados Unidos</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="Direccion" class="col-sm-3 control-label">Departamento</label>
					<div class="col-md-4">
						<select class='form-control' id="condiciones">
							<option value="1">Valle Del Cauca</option>
							<option value="2">Antioquia</option>
							<option value="3">Bolívar</option>
							<option value="4">Santander</option>
						</select>
					</div>
					<label for="Direccion" class="col-sm-1 control-label">Ciudad</label>
					<div class="col-md-3">
						<select class='form-control' id="condiciones">
							<option value="1">Cali</option>
							<option value="2">Medellín</option>
							<option value="3">Cartagena</option>
							<option value="4">Bucaramanga</option>
						</select>
					</div>
				</div>

				


			  
			  
			  
			
			 
			 
			 
			 
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="guardar_datos">Guardar datos</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>