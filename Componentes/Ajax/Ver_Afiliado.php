<?php
	include('is_logged.php');
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$Id = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Id'], ENT_QUOTES)));
	$sql="SELECT USUARIOS.Razon_Social,AFILIADOS.Id,AFILIADOS.Nombre_Completo,TIPIFICACIONES.Categoria, 
		TIPIFICACIONES.NCategoria,Identificacion,AFILIADOS.Telefono,AFILIADOS.Correo,AFILIADOS.Tipificacion,
		AFILIADOS.Estado,AFILIADOS.AEstado FROM  AFILIADOS 
		inner join TIPIFICACIONES on TIPIFICACIONES.Numero = AFILIADOS.Tipificacion
		left join USUARIOS on AFILIADOS.Comercio= USUARIOS.Nit where AFILIADOS.Visible ='S' and Id='$Id'";
	$query = mysqli_query($con, $sql);
	$row=mysqli_fetch_array($query);
	$Identificacion=$row['Identificacion'];
	$Nombre_Completo=$row['Nombre_Completo'];
	$Telefono=$row['Telefono'];
	$Correo=$row['Correo'];
	$NCategoria = $row['NCategoria'];
	$Tipificacion = $row['Tipificacion'];
	$AEstado = $row['AEstado'];

	$sql="SELECT * FROM OBSERVACIONES_AFILIADO 
	inner join USUARIOS on USUARIOS.Nit=OBSERVACIONES_AFILIADO.Usuario WHERE Afiliado=".$Id." order by OBSERVACIONES_AFILIADO.fecha DESC";
	$Observaciones_Cargadas="";
	$query = mysqli_query($con, $sql);
	while ($row=mysqli_fetch_array($query)){
		$Observaciones_Cargadas.=
		'<div class="card border-primary mb-3"><div class="card-header">'.$row['Razon_Social'].'<em>&nbsp;&nbsp;&nbsp;&nbsp;('.$row['Fecha'].')</em></div>
				<div class="card-body text-secondary">';
		if($row['Tipificacion']!=0 ){
			$Observaciones_Cargadas.='<b>Se Realiza Tipificacion a: </b>';
			$sql1="SELECT * FROM TIPIFICACIONES WHERE Numero=".$row['Tipificacion']."";
			$query1 = mysqli_query($con, $sql1);
			$row1=mysqli_fetch_array($query1); 
			$Observaciones_Cargadas.=utf8_encode($row1['Nombre']);
			$Observaciones_Cargadas.='<br><br>';
		}
		if($row['Observacion']!='' ){	
			$Observaciones_Cargadas.='<b>Observacion:</b> '.$row['Observacion'].'';
		}  
		$Observaciones_Cargadas.='</div></div>';
	}				
	?>
	<div class="row">
		<div class="col-md-2">
			<label for="Identificacion">Identificacion</label>
			<input type="text" class="form-control" id="Identificacion" readonly value="<?php echo $Identificacion;?>">
		</div>
		<div class="col-md-4">
			<label for="Nombre_Completo">Nombre </label>
			<input type="text" class="form-control" id="Nombre_Completo" readonly value="<?php echo $Nombre_Completo;?>">
		</div>
		<div class="col-md-3">
			<label for="Telefono">Telefono</label>
			<input type="text" class="form-control" id="Telefono" readonly value="<?php echo $Telefono;?>">
		</div>
		<div class="col-md-3">
			<label for="Correo">Correo</label>
			<input type="text" class="form-control" id="Correo" readonly value="<?php echo $Correo;?>">
		</div>
	</div>
	<input type="text" class="form-control hidden" id="Id" name="Id" readonly value="<?php echo $Id;?>">
	<div class="row">
	<?php
		$query1=mysqli_query($con, 'SELECT Estado FROM PERMISOS where Modulo="Afiliados" and Permiso="Tipificaiones" and  Usuario ="'.$_SESSION['Nit'].'";');
		$rw_Admin1=mysqli_fetch_array($query1);
		if($_SESSION['Rol']=='1' or $rw_Admin1['Estado']=='true'){	
			?>
			<div class="col-md-4">
				<label for="Fecha_Nacimiento" class="control-label">Tipificacion</label>
				<?PHP
				$query1=mysqli_query($con, "select NCategoria from TIPIFICACIONES where Numero = $Tipificacion");
				$rw_Admin1=mysqli_fetch_array($query1);
				$Categoria =$rw_Admin1[0];			
				$query1=mysqli_query($con, "select Categoria,NCategoria from TIPIFICACIONES GROUP BY Categoria,NCategoria ORDER BY NCategoria ASC");
				echo' <select class="form-control" id="TipificacionC" name ="TipificacionC" placeholder="TipificacionC" onchange="CargarTipificaciones()" >';									
				while($rw_Admin1=mysqli_fetch_array($query1)){
					if ($Categoria ==$rw_Admin1['NCategoria']){
						echo '<option value="'.$rw_Admin1['NCategoria'].'" selected >'.$rw_Admin1['Categoria'].'</option>';
					} else{
						echo '<option value="'.$rw_Admin1['NCategoria'].'">'.$rw_Admin1['Categoria'].'</option>';	
					}
				}
				echo '</select>';
				?>
			</div>
			<div class="col-md-4">
				<label for="Fecha_Nacimiento" class="control-label">Sub Tipificacion</label>
				<input type="Text" class="form-control hidden" id="Tip" name="Tip" require value="<?php echo $Tipificacion?>" readonly="readonly">
				<div id="Tipi"></div>
			</div>
				<?php
		}else{
			?>
			<div class="col-md-4">
				<label for="Fecha_Nacimiento" class="control-label">Tipificacion</label>
				<?php
				$query1=mysqli_query($con, "select Categoria,Nombre,Numero from TIPIFICACIONES where Numero = $Tipificacion");
				$rw_Admin1=mysqli_fetch_array($query1);
				$Categoria =$rw_Admin1[0];			
				$Nombre =$rw_Admin1[1];	
				$Numero =$rw_Admin1[2];	
				?>
				<input type="text" class="form-control" value="<?php echo $Nombre;?>" readonly>
			</div>
			<div class="col-md-4">
				<label for="Fecha_Nacimiento" class="control-label">Sub Tipificacion</label>
				<input type="Text" class="form-control" id="Tip" name="Tip" require value="<?php echo $Categoria?>" readonly="readonly">
				<input type="Text" class="form-control hidden" id="Tipificacion" name="Tipificacion" require value="<?php echo $Numero?>" readonly="readonly">
			
			</div>
		
			<?php	
		}
	?>
		<div class="col-md-4">
			<label for="AEstado" class="control-label">Estado</label>
			<?PHP		
			$query1=mysqli_query($con, "select Codigo,Nombre from AESTADOS ");
			echo' <select class="form-control" id="AEstado" name ="AEstado" placeholder="AEstado">';									
			while($rw_Admin1=mysqli_fetch_array($query1)){
				if ($AEstado ==$rw_Admin1['Codigo']){
					echo '<option value="'.$rw_Admin1['Codigo'].'" selected >'.$rw_Admin1['Nombre'].'</option>';
				} else{
					echo '<option value="'.$rw_Admin1['Codigo'].'">'.$rw_Admin1['Nombre'].'</option>';	
				}
			}
			echo '</select>';
			?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<label for="Observacion">Observacion:</label>
			<textarea class="form-control" rows="3" id="Observacion" name="Observacion"></textarea>
		</div><br>
		<div class="col-md-12" id="RActualizarAfilido"></div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-12">
		<div class="accordion" id="accordionExample">
			<div class="card">
				<div class="card-header" id="headingOne">
				<h2 class="mb-0" style="margin-bottom: 0px;margin-top: 0px;">
					<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
					<i class="fas fa-angle-down"></i>Agendamientos
					</button>
				</h2>
				</div>

				<div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
				<div class="card-body">
					<button class="btn btn-primary"type="button" onclick="GenerarGestion('<?php echo $Id;?>')">Agregar Agendamiento</button>
					
					<div id='RAgendamientos'>
					</div>
						
				
					
				
				</div>
			</div>
			<div class="card">
				<div class="card-header" id="headingTwo">
				<h2 class="mb-0" style="margin-bottom: 0px;margin-top: 0px;">
					<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					<i class="fas fa-angle-down"></i>Observaciones
					</button>
				</h2>
				</div>
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
				<div class="card-body">
					
					<?php
						echo $Observaciones_Cargadas;
					?>	
				
				</div>
				</div>
			</div>
				
		</div>
		</div>
	</div>
	
		

	
