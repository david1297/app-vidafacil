<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
    }
	require_once ("config/db.php");
	require_once ("config/conexion.php");
	
	$Identificacion="";
	$Id="";
	$Primer_Nombre="";
	$Segundo_Nombre="";
	$Primer_Apellido="";
	$Segundo_Apellido="";
	$Tipo_Identificacion="";
	$Ciudad="";
	$Departamento="";
	$Direccion="";
	$Direccion_Adicional="";
	$Telefono="";
	$Telefono2="";
	$Estado="";
	$Correo="";
	$Comercio="";
	$Tipificacion="5";
	$Observaciones_Cargadas='';
	$Indicativo='';
	$D1='';
	$D2='';
	$D3='';
	$D4='';
	$Adicional='';


	if (isset($_GET['Identificacion'])) {
		$query=mysqli_query($con, "select * from AFILIADOS where Identificacion ='".$_GET['Identificacion']."' ");
		$rw_Admin=mysqli_fetch_array($query);
		$Id=$rw_Admin['Id'];
		$Identificacion=$rw_Admin['Identificacion'];
		$Primer_Nombre=$rw_Admin['Primer_Nombre'];
		$Segundo_Nombre=$rw_Admin['Segundo_Nombre'];
		$Primer_Apellido=$rw_Admin['Primer_Apellido'];
		$Segundo_Apellido=$rw_Admin['Segundo_Apellido'];
		$Tipo_Identificacion=$rw_Admin['Tipo_Identificacion'];
		$Departamento=$rw_Admin['Departamento'];
		$Ciudad=$rw_Admin['Ciudad'];
		$Direccion=$rw_Admin['Direccion'];
		$Direccion_Adicional=$rw_Admin['Direccion_Adicional'];
		$Telefono=$rw_Admin['Telefono'];
		$Telefono2=$rw_Admin['Telefono2'];
		$Estado=$rw_Admin['Estado'];
		$Correo=$rw_Admin['Correo'];
		$Comercio=$rw_Admin['Comercio'];
		$Tipificacion=$rw_Admin['Tipificacion'];
		$Indicativo=$rw_Admin['Indicativo'];
		$D1=$rw_Admin['D1'];
		$D2=$rw_Admin['D2'];
		$D3=$rw_Admin['D3'];
		$D4=$rw_Admin['D4'];
		$Adicional= $rw_Admin['Adicional'];

		$EstadoC="Editando";
		$Read= "readonly='readonly'";

		$sql="SELECT * FROM OBSERVACIONES_AFILIADO 
        inner join USUARIOS on USUARIOS.Nit=OBSERVACIONES_AFILIADO.Usuario WHERE Afiliado=".$Id." order by OBSERVACIONES_AFILIADO.Numero";

		$query = mysqli_query($con, $sql);
		while ($row=mysqli_fetch_array($query)){
			$Observaciones_Cargadas.=
			'<div class="card-header">'.$row['Razon_Social'].'<em>&nbsp;&nbsp;&nbsp;&nbsp;('.$row['Fecha'].')</em></div>
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
			$Observaciones_Cargadas.='
				  </div>
				  
				  

		';
		}
	}else{
		$EstadoC="Nuevo";
		$Read= "";
	}

?>
<!doctype html>
<html lang="es">
<head>
	<?php 
		include("head.php"); 
	?>
</head>
<body onload="Cargar()">
	<div id="wrapper">
		<?php
			include("Menu.php");
		?>
		<div id="main-content">
			<div class="container-fluid">
				<div class="panel panel-default">
					<div class="panel-heading">
		    			<div class="btn-group pull-right">				
							<button type="button" class="btn btn-default" id="Consultar">
								<span class="fas fa-user-tie"></span> Consultar Afiliados
							</button>
						</div>
						<h4><i class="fas fa-user-tie"></i>   Afiliados</h4>
					</div>
					<div class="panel-body">
						<div class="tab-content content-profile">
							<div class="tab-pane fade in active" id="Informacion">
								<form class="form-horizontal col-sm-8" method="post" id="Guardar_Afiliado" name="Guardar_Afiliado">
			   						<div id="resultados_ajax"></div>
									<input type="text" class="form-control hidden" id="EstadoC" name="EstadoC"  value="<?php echo $EstadoC; ?>" > 
									<?php
										if ($EstadoC=='Editando'){
											?>
											<div class="form-group">
				  						<label for="Identificacion" class="col-sm-3  control-label">Id</label>
				  						<div class="col-sm-9 ">
				   							<input type="text" class="form-control" id="Id" name="Id" placeholder="Id" value="<?php echo $Id; ?>" <?php echo $Read; ?> required>
				  						</div>
			   						</div>
									   <?php
										}

										?>
									
									<div class="form-group">
				  						<label for="Identificacion" class="col-sm-3  control-label">Identificacion</label>
				  						<div class="col-sm-9 ">
				   							<input type="text" class="form-control" id="Identificacion" name="Identificacion" placeholder="Identificacion" value="<?php echo $Identificacion; ?>" <?php echo $Read; ?> required onchange='ValidarDatos("Identificacion",$(this).val())'>
											   <input type="text " class="form-control hidden" id="VIdentificacion" name="VIdentificacion" value="Yes" > 
											   <div class="invalid-feedback">
											   	El Numero de Identificacion Ya se Encuentra Registrado
      											</div>
											</div>
			   						</div>
									<div class="form-group" >
										<label for="Tipo_Identificacion" class="col-sm-3 control-label">Tipo de Identificacion</label>
										<div class="col-sm-9">
											<select class='form-control' id="Tipo_Identificacion" name ="Tipo_Identificacion" placeholder="Tipo de Identificacion" >
											<?php 
												$Cedula="";
												$Extranjeria="";
												$Contrasena="";
												$Pasaporte="";
												if($Tipo_Identificacion == 'Cedula'){
													$Cedula="selected"; 
												}else{
													if($Tipo_Identificacion == 'Cedula De Extranjeria'){
														$Extranjeria="selected"; 												
													}else{
														if($Tipo_Identificacion == 'Contraseña'){
															$Contrasena="selected"; 
														}else{
															if($Tipo_Identificacion == 'Pasaporte'){
																$Pasaporte="selected"; 
															}	
														}	
													}
												}
												echo '<option value="Cedula"'.$Cedula.'>Cedula</option>';
												echo '<option value="Cedula De Extranjeria"'.$Extranjeria.'>Cedula De Extranjeria</option>';
												echo '<option value="Contraseña"'.$Contrasena.'>Contraseña</option>';
												echo '<option value="Pasaporte"'.$Pasaporte.'>Pasaporte</option>';
							  				?>
											</select>
										</div>
									</div>
									<div class="form-group" >
										<label for="Nombres"  class="col-sm-3 control-label">Nombres</label>
				  						<div class="col-sm-4">
 				   							<input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();"class="form-control" id="Primer_Nombre" name="Primer_Nombre"  placeholder="Primer Nombre" value="<?php echo $Primer_Nombre; ?>">
				  						</div>
										<div class="col-sm-5">
 				   							<input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();"class="form-control" id="Segundo_Nombre" name="Segundo_Nombre"  placeholder="Segundo Nombre" value="<?php echo $Segundo_Nombre; ?>">
				  						</div>
			   						</div> 
									<div class="form-group" >
					  					<label for="Apellidos" class="col-sm-3 control-label">Apellidos</label>
				  						<div class="col-sm-4">
 				   							<input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();"class="form-control" id="Primer_Apellido" name="Primer_Apellido"  placeholder="Primer Apellido" value="<?php echo $Primer_Apellido; ?>"  onkeyup="RazonSocial()">
				  						</div>
										  <div class="col-sm-5">
 				   							<input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();"class="form-control" id="Segundo_Apellido" name="Segundo_Apellido"  placeholder="Segundo Apellido" value="<?php echo $Segundo_Apellido; ?>"  onkeyup="RazonSocial()">
				  						</div>  
			   						</div>
									<div class="form-group">
										<label for="Fecha_Nacimiento" class="col-sm-3 control-label">Departamento</label>
										<div class="col-sm-9">
										<?PHP
												$query1=mysqli_query($con, "select * from DEPARTAMENTOS order by Nombre");
												echo' <select class="form-control" id="Departamento" name ="Departamento" placeholder="Departamento" onchange="CargarCiudades()">';
																				
												while($rw_Admin1=mysqli_fetch_array($query1)){
													if ($Departamento ==$rw_Admin1['Codigo']){
														echo '<option value="'.$rw_Admin1['Codigo'].'" selected >'.utf8_encode($rw_Admin1['Nombre']).'</option>';
													} else{
														echo '<option value="'.$rw_Admin1['Codigo'].'">'.utf8_encode($rw_Admin1['Nombre']).'</option>';	
													}
												}
												echo '</select>';
											?>	
										</div>
									</div>
									<div class="form-group">
										<label for="Ciudad" class="col-sm-3 control-label">Ciudad</label>
										<input type="Text" class="form-control hidden" id="Ciu" name="Ciu" require value="<?php echo $Ciudad?>" readonly="readonly">

										<div class="col-sm-9" id="Ciudades" >

										</div>
									</div>
									<div class="form-group">
										<label for="Direccion" class="col-sm-3 control-label">Direccion</label>
										<div class="col-sm-2">
											<?PHP
												$query=mysqli_query($con, "select * from ADMINISTRACION");
												echo' <select class="form-control" id="Indicativo" name ="Indicativo" placeholder="OperadorVenta" onchange="CambioDir()">';
												$rw_Admin=mysqli_fetch_array($query);
												$tuArray = explode("\r\n", $rw_Admin['Indicativos']);
												foreach($tuArray as  $indice => $palabra){
													if ($Indicativo==$palabra){
														echo '<option value="'.$palabra.'" selected>'.$palabra.'</option>';	
											
													} else{
														echo '<option value="'.$palabra.'" >'.$palabra.'</option>';	
											
													}
												}  	
												echo '</select>';
											?>
										</div>
										<div class="col-sm-2">
											<input type="text" class="form-control" id="D1" name="D1"   value="<?php echo $D1;?>" onchange="CambioDir()">
										</div>
										<div class="col-sm-1" style="padding-left: 0px; padding-right: 0px;width: 32px;">
											<label for="" class="col-sm-1 control-label">#</label>
										</div>
										<div class="col-sm-2">
											<input type="text" class="form-control" id="D2" name="D2"   value="<?php echo $D2;?>" onchange="CambioDir()">
										</div>
										<div class="col-sm-1" style="padding-left: 0px; padding-right: 0px;width: 32px;">
											<label for="" class="col-sm-1 control-label">-</label>
										</div>
										<div class="col-sm-2">
											<input type="text" class="form-control" id="D3" name="D3"   value="<?php echo $D3;?>" onchange="CambioDir()">
										</div>
										<div class="col-sm-9 col-sm-offset-3">
											<input type="text" class="form-control" id="Direccion" name="Direccion"  placeholder="Direccion" value="<?php echo $Direccion;?>" readonly='readonly'>
										</div>
									</div>
									<div class="form-group">
										<label for="Direccion_Adicional" class="col-sm-3 control-label">Direccion Adicional</label>
										<div class="col-sm-5">
											<?PHP
												$query=mysqli_query($con, "select * from ADMINISTRACION");
												echo' <select class="form-control" id="Adicional" name ="Adicional" placeholder="OperadorVenta" onchange="CambioDirA()">';
												$rw_Admin=mysqli_fetch_array($query);
												$tuArray = explode("\r\n", $rw_Admin['Adicionales']);
												foreach($tuArray as  $indice => $palabra){
													if ($Adicional==$palabra){
														echo '<option value="'.$palabra.'" selected>'.$palabra.'</option>';	
											
													} else{
														echo '<option value="'.$palabra.'" >'.$palabra.'</option>';	
											
													}
												}  	
												echo '</select>';
											?>
										</div>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="D4" name="D4"   value="<?php echo $D4;?>" onchange="CambioDirA()">
										</div>
										<div class="col-sm-9 col-sm-offset-3">
											<input type="text" class="form-control" id="Direccion_Adicional" name="Direccion_Adicional"  placeholder="Direccion Adicional" value="<?php echo $Direccion_Adicional;?>" readonly='readonly'>
										</div>
									</div>
									<div class="form-group">
										<label for="Telefono" class="col-sm-3 control-label">Telefono</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="Telefono" name="Telefono" required placeholder="Telefono" value="<?php echo $Telefono;?>" maxlength="10"  onkeypress='return validaNumericos(event)'>
										</div>
									</div>	
									<div class="form-group">
										<label for="Telefono2" class="col-sm-3 control-label">Telefono 2</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="Telefono2" name="Telefono2"  placeholder="Telefono2" value="<?php echo $Telefono2;?>" maxlength="10"  onkeypress='return validaNumericos(event)'>
										</div>
									</div>
									<div class="form-group">
										<label for="Correo" class="col-sm-3 control-label">Correo</label>
										<div class="col-sm-9">
											<input type="Email" class="form-control" id="Correo" name="Correo" required placeholder="Correo" value="<?php echo $Correo;?>">
										</div>
									</div>	
									
									<div class="form-group">
										<label for="Comercio" class="col-sm-3 control-label">Comercio</label>
										<div class="col-sm-9">
										<?PHP
										if( $_SESSION['Rol']<>'1'){
											if($EstadoC == "Nuevo"){
												$Comercio = $_SESSION['Nit'];
												$NComercio = $_SESSION['Razon_Social'];
											}else{
												$query1=mysqli_query($con, "select Razon_Social from USUARIOS where Nit  = '".$Comercio."' ");
												
																				
												$rw_Admin1=mysqli_fetch_array($query1);
												$NComercio =$rw_Admin1['Razon_Social'];
											}
											?>
												<input type="Text" class="form-control hidden" id="Comercio" name="Comercio" require value="<?php echo $Comercio?>" readonly="readonly">
												<input type="Text" class="form-control " id="NComercio" name="NComercio" require value="<?php echo $NComercio?>" readonly="readonly">


											<?php
											
										}	else{
											echo' <select class="form-control" id="Comercio" name ="Comercio" placeholder="Comercio">';
											$query1=mysqli_query($con, "select * from USUARIOS where Estado = 'Activo' ");
											if ($Comercio==""){
												$Comercio = $_SESSION['Nit'];
											}
																				
												while($rw_Admin1=mysqli_fetch_array($query1)){
													if ($Comercio ==$rw_Admin1['Nit']){
														echo '<option value="'.$rw_Admin1['Nit'].'" selected >'.$rw_Admin1['Razon_Social'].'</option>';
													} else{
														echo '<option value="'.$rw_Admin1['Nit'].'">'.$rw_Admin1['Razon_Social'].'</option>';	
													}
												}
												echo '</select>';
											
										}?>	
												
										</div>
									</div>
									
									

									<?php 
										if($EstadoC == "Nuevo"){
											echo '
											<input type="Text" class="form-control hidden" id="Estado" name="Estado" require value="Por Activar" >';
										} else {
											echo '
											<div class="form-group">
												<label for="Estado" class="col-sm-3 control-label">Estado</label>
												<div class="col-md-9 col-sm-9">
													<select class="form-control" id="Estado" name ="Estado" placeholder="Estado"  >';
													if($Estado == 'Aprobado'){
														echo '<option value="Aprobado" selected>Aprobado</option>';
														echo '<option value="Negado">Negado</option>';
														echo '<option value="Por Activar">Por Activar</option>';
													}else{
														if($Estado == 'Negado'){
															echo '<option value="Aprobado" >Aprobado</option>';
														echo '<option value="Negado" selected>Negado</option>';
														echo '<option value="Por Activar">Por Activar</option>';
														}else{
															echo '<option value="Aprobado" >Aprobado</option>';
														echo '<option value="Negado">Negado</option>';
														echo '<option value="Por Activar" selected>Por Activar</option>';
														}
													}
													
													
													
													
													echo '
													</select>
												</div>
											</div>';
										}
									?>
									<div class="form-group">
										<label for="Fecha_Nacimiento" class="col-sm-3 control-label">Tipificacion</label>
										<div class="col-sm-5">
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
												echo '</select></div>
												';
												?>
												<input type="Text" class="form-control hidden" id="Tip" name="Tip" require value="<?php echo $Tipificacion?>" readonly="readonly">
												<div class="col-sm-4" id="Tipi">	
										</div>
									</div>
									 <div class="col-md-12">
  										<label for="Observaciones">Observaciones:</label>
  										<textarea class="form-control" rows="5" id="Observaciones" name="Observaciones"></textarea>
									</div>
									<BR>
									<BR>
									<BR>
									<BR>
									<BR>
									<BR>
									<BR>
									<BR>
									
									
									
									<div id="resultados_ajax2"></div>
									<hr class="style1">
									<div class=" pull-right">
										<button type="button" class="btn btn-default" id="Cancelar">Cancelar</button>
										<?php
										
											if ( $_SESSION['Estado']=='Activo'){
												?>
													<button type="button" class="btn btn-primary" id='GAfiliado'>Guardar datos</button>
												<?php
											}
										?>
										
		  							</div>	
									  <div class="col-md-12"><br>
									  <div class="card border-secondary mb-3">
											<?php echo $Observaciones_Cargadas ?>
  										
									</div>			
									</div>			
								</form>	
							</div>
							<div class="tab-pane fade" id="Permisos">
								<!-- Permisos-->
								Aqui Van Los Permisos 
							</div>
							<div class="tab-pane fade" id="Campanas">
								<!-- Campañas-->
								Aqui Van Las Campañas
							</div>
						</div>
					</div>			
		  		</div>	
			</div>	  		
		</div>
	</div>
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/metisMenu/metisMenu.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
	<script src="assets/scripts/common.js"></script>
	<script>
$("#GAfiliado").click(function( event ) {
	if($('#VIdentificacion').val()=='Nou'){
		alert('El Numero de Identificacion Ya se Encuentra Registrado');
	}else{
		$( "#Guardar_Afiliado" ).submit();		
	}
});


	function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;        
}
	function CambioDir(){
		$('#Direccion').val($('#Indicativo').val()+' '+$('#D1').val()+' # '+$('#D2').val()+' - '+$('#D3').val());
	}
	function CambioDirA(){
		$('#Direccion_Adicional').val($('#Adicional').val()+' '+$('#D4').val());
	}
		function CargarCiudades(){
			var Depto = $("#Departamento").val();
			var Id_N = $("#Identificacion").val();
			var Ciu = $("#Ciu").val();
			$.ajax({
				type: "POST",
				url: "Componentes/Ajax/Cargar_Ciudades.php",
				data: "Depto="+Depto+"&Id_N="+Id_N+"&Ciu="+Ciu,
				beforeSend: function(objeto){
				},success: function(datos){
					$("#Ciudades").html(datos);
				}	
			});
		}
		function CargarTipificaciones(){
			var Categoria = $("#TipificacionC").val();
			var Id_N = $("#Identificacion").val();
			var Tip = $("#Tip").val();
		
			$.ajax({
				type: "POST",
				url: "Componentes/Ajax/Cargar_Tipificaciones.php",
				data: "Categoria="+Categoria+"&Id_N="+Id_N+"&Tip="+Tip,
				beforeSend: function(objeto){
				},success: function(datos){
					$("#Tipi").html(datos);
				}	
			});
		}

		function Cargar() {
			CargarCiudades();
			CargarTipificaciones();
		}

		$( "#Cancelar" ).click(function( event ) {
			if (document.getElementById('EstadoC').value == 'Editando') {
				location.reload(true);
			} else {
				location.href='Consultar-Afiliados.php';
			}
		})
		
		$( "#Consultar" ).click(function( event ) {
			location.href='Consultar-Afiliados.php';
		})
		$( "#Guardar_Afiliado" ).submit(function( event ) {
			var parametros = $(this).serialize();
			$.ajax({
				type: "POST",
				url: "Componentes/Ajax/Guardar_Afiliados.php",
				data: parametros,
				beforeSend: function(objeto){
					$("#resultados_ajax2").html("Mensaje: Cargando...");
				},
				success: function(datos){
					$("#resultados_ajax2").html(datos);
				}
			});
			event.preventDefault();
		})


		function ValidarDatos(Tipo,Valor){
	var Id = $('#Id').val();
	$.ajax({
			url: "Componentes/Ajax/ValidarDatos.php?Tipo="+Tipo+"&Valor="+Valor+"&Id="+Id,
			 beforeSend: function(objeto){
				$("#resultados_ajax3").html("Mensaje: Cargando...");
			  },
			success: function(datos){
				
			var Res = datos.split('!');
			if(Res[1] == 'Correcto'){
				if(Tipo=='Identificacion'){
					$('#Identificacion').removeClass("is-invalid");
					$('#Identificacion').addClass("is-valid");
					$('#VIdentificacion').val('Yes');
				}
				
			}else{
				if(Tipo=='Identificacion'){
					$('#Identificacion').removeClass("is-valid");
					$('#Identificacion').addClass("is-invalid");
					$('#VIdentificacion').val('Nou');
				}
				
				
			}
			
			
		  }
	});
}


	</script>
</body>
</html>
