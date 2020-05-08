<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
    }
	require_once ("config/db.php");
	require_once ("config/conexion.php");
	
	$Usuarios="active";

	$Nit ="";
	$Correo ="";
	$Tipo_Persona="";
	$Razon_Social ="";
	$Nombre ="";
	$Apellido ="";
	$Tel_C ="";
	$Direccion ="";
	$Direccion_Adicional="";
	$Correo ="";
	$Cel_C ="";
	$Correo_C ="";
	$Rep_Legal ="";
	$CC ="";
	$Nombre_R1 ="";
	$Tel_R1 ="";
	$Nombre_R2 ="";
	$Tel_R2 ="";
	$Banco_1="";
	$Tipo_Banco_1="";
	$Numero_Cuenta_1="";
	$Area="";
	$Banco_2="";
	$Tipo_Banco_2="";
	$Numero_Cuenta_2="";
	$Titular_1="";
	$Titular_2="";
	$Portafolio=0;
	$Indicativo='';
	$D1='';
	$D2='';
	$D3='';	
	$D4='';
	$Adicional='';
	$CantAfiliados=0;
	$Tipo ="";
	$Estado ="";
	$Porcentaje =0;
	$Perfil="";
	$Comercio="";
	$DescBancario=0;
	$FPrevencion=0;
	$CFondo=3;
	if (isset($_GET['Nit'])) {
		$query=mysqli_query($con, "select * from USUARIOS where Nit ='".$_GET['Nit']."' ");
		$rw_Admin=mysqli_fetch_array($query);

		$Nit =$rw_Admin['Nit'];
		$DescBancario =$rw_Admin['DescBancario'];
		$CFondo =$rw_Admin['CFondo'];
		$FPrevencion =$rw_Admin['FPrevencion'];
		$Tipo_Persona =$rw_Admin['Tipo_Persona'];
		$Razon_Social =$rw_Admin['Razon_Social'];
		$Nombre =$rw_Admin['Nombre'];
		$Apellido =$rw_Admin['Apellido'];
		$Correo =$rw_Admin['Correo'];
		$Tipo =$rw_Admin['Tipo'];
		$Estado =$rw_Admin['Estado'];
		$Rol=$rw_Admin['Rol'];
		$Porcentaje =$rw_Admin['Porcentaje'];
		$Portafolio =$rw_Admin['Portafolio'];
		$Tel_C =$rw_Admin['Tel_C'];
		$Direccion =$rw_Admin['Direccion'];
		$Direccion_Adicional=$rw_Admin['Direccion_Adicional'];
		$Correo =$rw_Admin['Correo'];
		$Cel_C =$rw_Admin['Cel_C'];
		$Correo_C =$rw_Admin['Correo_C'];
		$Rep_Legal =$rw_Admin['Rep_Legal'];
		$CC =$rw_Admin['CC'];
		$Nombre_R1 =$rw_Admin['Nombre_R1'];
		$Tel_R1 =$rw_Admin['Tel_R1'];
		$Nombre_R2 =$rw_Admin['Nombre_R2'];
		$Tel_R2 =$rw_Admin['Tel_R2'];
		$Banco_1=$rw_Admin['Banco_1'];
		$Tipo_Banco_1=$rw_Admin['Tipo_Banco_1'];
		$Numero_Cuenta_1=$rw_Admin['Numero_Cuenta_1'];
		$Banco_2=$rw_Admin['Banco_2'];
		$Tipo_Banco_2=$rw_Admin['Tipo_Banco_2'];
		$Numero_Cuenta_2=$rw_Admin['Numero_Cuenta_2'];
		$Titular_1=$rw_Admin['Titular_1'];
		$Titular_2=$rw_Admin['Titular_2'];
		$Indicativo=$rw_Admin['Indicativo'];
		$Area=$rw_Admin['Area'];
		$D1=$rw_Admin['D1'];
		$D2=$rw_Admin['D2'];
		$D3=$rw_Admin['D3'];
		$D4=$rw_Admin['D4'];
		$Adicional= $rw_Admin['Adicional'];
		$CantAfiliados=$rw_Admin['CantAfiliados'];
		$Comercio=$rw_Admin['Asignado'];

		$EstadoU="Editando";
		$Read= "readonly='readonly'";
	}else
	{
		$EstadoU="Nuevo";
		$Read= "";
		$Rol="2";
	}
	if (isset($_GET['Perfil'])) {
		$Perfil="Si";
	}
?>
<!doctype html>
<html lang="es">
<head>
	<?php 
		include("head.php"); 
		
	?>
</head>
<body onload='Cargar()'>
	<div id="wrapper">
		<?php
			include("Menu.php");
			
		?>	
		<div id="main-content">
			<div class="container-fluid">
				<div class="panel panel-default">
					<div class="panel-heading">
		    			<div class="btn-group pull-right">
							<?php
								if ($Perfil <>'Si'){
									echo '
									<button type="button" class="btn btn-default" id="Consultar">
										<span class="fas fa-users"></span> Consultar Usuarios
									</button>';
								}
							?>
						</div>
						<h4><i class="fas fa-user-tie"></i>   Usuarios</h4>
					</div>
					<div class="panel-body">
					<?php 
						include("Componentes/Modal/Buscar_Campanas.php");
						include("Componentes/Modal/cambiar_password.php");
						?>
						<ul class="nav nav-tabs" role="tablist">
							<li class="active"><a href="#Informacion" role="tab" data-toggle="tab">Informacion</a></li>
							<li><a href="#Configuracion" role="tab" data-toggle="tab">Configuracion</a></li>
							<?php
								if ($Perfil <>'Si'){
									?>
									<li><a href="#Permisos" role="tab" data-toggle="tab" id="Click_Permisos">Permisos</a></li>
									<li><a href="#CampanasU" role="tab" data-toggle="tab">Campañas</a></li>
									<?php
								}
							?>
						</ul>
						<div class="tab-content content-profile">
							<div class="tab-pane fade in active" id="Informacion">
								<form class="form-horizontal col-sm-12" method="post" id="Guardar_Usuario" name="Guardar_Usuario">
			   						<div id="resultados_ajax"></div>
									   	<input type="text" class="form-control hidden" id="EstadoU" name="EstadoU"  value="<?php echo $EstadoU; ?>" > 
										<input type="text" class="form-control hidden" id="Perfil" name="Perfil"  value="<?php echo $Perfil; ?>" > 
										<div class="form-group col-sm-9">
											<label for="Tipo_Persona" class="col-sm-3 control-label">Tipo</label>
											<div class="col-md-9 col-sm-9">
												<select class='form-control' id="Tipo" name ="Tipo" placeholder="Tipo" onchange="TipoU()">
													<?php 
													if($Tipo == 'Operador'){
														echo '<option value="Operador">OPERADOR</option>';
														echo '<option value="Distribuidor">DISTRIBUIDOR</option>';
													}else{
														echo '<option value="Distribuidor">DISTRIBUIDOR</option>';
														echo '<option value="Operador">OPERADOR</option>';
													}
													?>
												</select>
											</div>
										</div> 
									
									<div class="form-group col-sm-9">
										<label for="Tipo_Persona" class="col-sm-3 control-label">Tipo Persona</label>
										<div class="col-md-9 col-sm-9">
											<select class='form-control' id="Tipo_Persona" name ="Tipo_Persona" placeholder="Tipo Persona" onchange="TipoPersona()"> 
												<?php 
													if($Tipo_Persona == 'Natural'){
														echo '<option value="Natural">NATURAL</option>';
														echo '<option value="Juridica">JURIDICA</option>';
													}else{
														echo '<option value="Juridica">JURIDICA</option>';
														echo '<option value="Natural">NATURAL</option>';
													}
							  					?>
											</select>
										</div>
									</div>  
									<div class="form-group col-sm-9">
				  						<label for="Nit" class="col-sm-3  control-label" id="label-Nit">Nit</label>
				  						<div class="col-sm-9 ">
				   							<input type="text" class="form-control" id="Nit" name="Nit" placeholder="Nit" value="<?php echo $Nit; ?>" <?php echo $Read; ?> required onchange='ValidarDatos("Nit",$(this).val())'> 
				   							<input type="text " class="form-control hidden" id="VNit" name="VNit" value="Yes" > 
											   <div class="invalid-feedback">
											   	El Numero de Documento o Nit Ya se Encuentra Registrado
      											</div>
				  						</div>
								   </div>
								   
									<div class="form-group col-sm-9" id="D_Razon_Social">
										<label for="Razon_Social"  class="col-sm-3 control-label">Razon Social</label>
				  						<div class="col-sm-9">
 				   							<input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="Razon_Social" name="Razon_Social"  placeholder="Razon Social" value="<?php echo $Razon_Social; ?>">
				  						</div>
			   						</div> 
									<div class="form-group col-sm-9" id="D_Nombre">
					  					<label for="Nombre" class="col-sm-3 control-label">Nombre</label>
				  						<div class="col-sm-9">
 				   							<input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="Nombre" name="Nombre"  placeholder="Nombre" value="<?php echo $Nombre; ?>"  onkeyup="RazonSocial()">
				  						</div>
			   						</div>
									<div class="form-group col-sm-9" id="D_Apellido">
										<label for="Apellido"  onkeyup="javascript:this.value=this.value.toUpperCase();" class="col-sm-3 control-label">Apellido</label>
										<div class="col-sm-9">
				  							<input type="text" class="form-control" id="Apellido" name="Apellido"  placeholder="Apellido" value="<?php echo $Apellido; ?>"  onkeyup="RazonSocial()">
										</div>
									</div>
									<input type="Text" class="form-control hidden" id="Rol" name="Rol" require value="<?php echo $Rol; ?>" readonly="readonly">
									<?php 
										if($EstadoU == "Nuevo"){
											echo '
											<input type="Text" class="form-control hidden" id="Estado" name="Estado" require value="Pendiente" >';
										} else{
											echo '
											<div class="form-group col-sm-9">
												<label for="Estado" class="col-sm-3 control-label">Estado</label>
												<div class="col-md-9 col-sm-9">
													<select class="form-control" id="Estado" name ="Estado" placeholder="Estado"  >';
											if($Estado == 'Activo'){
												echo '<option value="Activo">ACTIVO</option>';
												echo '<option value="InActivo">INACTIVO</option>';
												echo '<option value="Bloqueado">BLOQUEADO</option>';
											}else{
												if($Estado == 'InActivo'){
													echo '<option value="InActivo">INACTIVO</option>';
													echo '<option value="Activo">ACTIVO</option>';
													echo '<option value="Bloqueado">BLOQUEADO</option>';
												}else{
													echo '<option value="Bloqueado">BLOQUEADO</option>';
													echo '<option value="InActivo">INACTIVO</option>';
													echo '<option value="Activo">ACTIVO</option>';
												}
											}
											echo '</select>
												</div>
											</div>';
										}
									?>
									
									<div class="form-group col-sm-9">
										<label for="Tel_C" class="col-sm-3 control-label">Telefono de Contacto</label>
										
										<div class="col-sm-9 ">
				   							<input type="text" class="form-control" id="Tel_C" name="Tel_C" placeholder="Telefono de Contacto" value="<?php echo $Tel_C; ?>" maxlength="7"  required onchange='ValidarDatos("TelC",$(this).val())'  onkeypress='return validaNumericos(event)'> 
				   							<input type="text " class="form-control hidden" id="VTelC" name="VTelC" value="Yes" > 
											   <div class="invalid-feedback">
											   	El Numero de Telefono Ya se Encuentra Registrado
      											</div>
				  						</div>
									</div>
									<div class="form-group col-sm-9">
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
											<input type="text" class="form-control" id="D1" name="D1"   value="<?php echo $D1;?>" onchange="CambioDir()" onkeyup="javascript:this.value=this.value.toUpperCase();">  
										</div>
										<div class="col-sm-1" style="padding-left: 0px; padding-right: 0px;width: 10px;">
											<label for="" class="col-sm-1 control-label" style="padding-left: 0px;padding-right: 0px;">#</label>
										</div>
										<div class="col-sm-2">
											<input type="text" class="form-control" id="D2" name="D2"   value="<?php echo $D2;?>" onchange="CambioDir()" onkeyup="javascript:this.value=this.value.toUpperCase();">
										</div>
										<div class="col-sm-1" style="padding-left: 0px; padding-right: 0px;width: 10px;">
											<label for="" class="col-sm-1 control-label" style="padding-left: 0px;padding-right: 0px;">-</label>
										</div>
										<div class="col-sm-2">
											<input type="text" class="form-control" id="D3" name="D3"   value="<?php echo $D3;?>" onchange="CambioDir()" onkeyup="javascript:this.value=this.value.toUpperCase();">
										</div>
										<div class="col-sm-9 col-sm-offset-3">
											<input type="text" class="form-control" id="Direccion" name="Direccion"  placeholder="Direccion" value="<?php echo $Direccion;?>" readonly='readonly'>
										</div>
									</div>
									<div class="form-group col-sm-9">
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
									<div class="form-group col-sm-9">
										<label for="Correo_N" class="col-sm-3 control-label">Correo Electronico</label>
										<div class="col-sm-9">
											<input type="email" class="form-control" id="Correo" name="Correo" require placeholder="Correo Electronico" value="<?php echo $Correo; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();">				  
										</div>
			  						</div>
									<div class="form-group col-sm-9">
										<label for="Cel_C" class="col-sm-3 control-label">Celular de Contacto</label>
			
										<div class="col-sm-9 ">
				   							<input type="text" class="form-control" id="Cel_C" name="Cel_C" placeholder="Celular de Contacto" value="<?php echo $Cel_C; ?>" maxlength="10"  required onchange='ValidarDatos("CelC",$(this).val())'  onkeypress='return validaNumericos(event)'> 
				   							<input type="text " class="form-control hidden" id="VCelC" name="VCelC" value="Yes" > 
											   <div class="invalid-feedback">
											   	El Numero de Celular Ya se Encuentra Registrado
      											</div>
				  						</div>
									</div>
									<div class="form-group col-sm-9">
										<label for="Correo_C" class="col-sm-3 control-label">Correo de Contacto</label>
										<div class="col-sm-9">
											<input type="email" class="form-control" id="Correo_C" name="Correo_C" require placeholder="Correo de Contacto" value="<?php echo $Correo_C; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();">				  
										</div>
			  						</div>
				  					
									<div id='Replegal'>
										<div class="form-group col-sm-9">
											<label for="Rep_Legal" class="col-sm-3 control-label" id="Label-Rep_Legal">Representante Legal</label>
											<div class="col-sm-9">
												<input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="Rep_Legal" name="Rep_Legal" required placeholder="Representante Legal" value="<?php echo $Rep_Legal; ?>">
											</div>
										</div>
										<div class="form-group col-sm-9">
											<label for="CC" class="col-sm-3 control-label" id="Label-CC">Numero de Documento</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" id="CC" name="CC" required placeholder="Numero de Documento" value="<?php echo $CC; ?>" onkeypress='return validaNumericos(event)' onchange='ValidarDatos("RepLegal",$(this).val())'>
												<input type="text " class="form-control hidden" id="VCC" name="VCC" value="Yes" > 
												<div class="invalid-feedback">
												El Numero de Documento Del Representante Legal ya se Encuentra Registrado
      											</div>
											</div>
										</div>
									</div>
									<div id='TArea'>
										<div class="form-group col-sm-9">
											<label for="Rep_Legal" class="col-sm-3 control-label" id="Label-Rep_Legal">Area</label>
											<div class="col-sm-9">
											<?PHP
												$query1=mysqli_query($con, "select * from AREAS");
												echo' <select class="form-control" id="Area" name ="Area" placeholder="Area">';
												while($rw_Admin1=mysqli_fetch_array($query1)){
													if ($Area ==$rw_Admin1['Numero']){
														echo '<option value="'.$rw_Admin1['Numero'].'" selected>'.$rw_Admin1['Nombre'].'</option>';
													} else{
														echo '<option value="'.$rw_Admin1['Numero'].'" >'.$rw_Admin1['Nombre'].'</option>';
													}
												}
												echo '</select>';
											?>
											</div>
										</div>
									</div>
									
									<div class="form-group col-sm-9">
										<label for="Comercio" class="col-sm-3 control-label">Asignado A:</label>
										<div class="col-sm-9">
										<?PHP
										if( $_SESSION['Rol']<>'1'){
											if($EstadoU == "Nuevo"){
												$Comercio = $_SESSION['Nit'];
												$NComercio = $_SESSION['Razon_Social'];
											}else{
												$query1=mysqli_query($con, "select Razon_Social from USUARIOS where Nit  = '".$Comercio."' ");
												
																				
												$rw_Admin1=mysqli_fetch_array($query1);
												$NComercio =$rw_Admin1['Razon_Social'];
											}
											?>
												<input type="Text" class="form-control hidden" id="Asignado" name="Asignado" require value="<?php echo $Comercio?>" readonly="readonly">
												<input type="Text" class="form-control " id="NAsignado" name="NAsignado" require value="<?php echo $NComercio?>" readonly="readonly">


											<?php
											
										}	else{
											if ($Comercio==""){
												$Comercio = $_SESSION['Nit'];
											}
										
											echo' <select class="form-control" id="Asignado" name ="Asignado" placeholder="Comercio">';
											$query1=mysqli_query($con, "select * from USUARIOS where Estado = 'Activo' ");
												
																				
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
									<div class="col-sm-12">
										<hr class="style1">
										<H2 style="text-align: left; ">Bancos</H2>
										<hr class="style1">
									</div>
									<div class="form-group col-sm-12 " >
										<div class="col-sm-3">
											<label for="Banco_1">Nombre</label>
											<?PHP
												$query1=mysqli_query($con, "select * from BANCOS");
												echo' <select class="form-control" id="Banco_1" name ="Banco_1" placeholder="Banco_1 " onchange="TipoBanco1()">';
												while($rw_Admin1=mysqli_fetch_array($query1)){
													if ($Banco_1 ==$rw_Admin1['Nombre']){
														$Bancos_1 = '<option value="'.$rw_Admin1['Nombre'].'">'.$rw_Admin1['Nombre'].'</option>';
													} else{
														$Bancot_1 = $Bancot_1.'<option value="'.$rw_Admin1['Nombre'].'">'.$rw_Admin1['Nombre'].'</option>';	
													}
													
													
												}
												echo $Bancos_1;
													echo $Bancot_1;
												echo '</select>';
											?>
										</div>
										<div class="col-sm-3">
											<label for="Tipo_Banco_1" >Tipo de Cuenta</label>
											<select class="form-control" id="Tipo_Banco_1" name ="Tipo_Banco_1" placeholder="Tipo_Banco_1 ">
												<?PHP	
													if($Banco_1 =='NEQUI'){
														echo '<option value="Telefonica">TELEFONICA</option>';
													}else{
														if ($Tipo_Banco_1 == 'Corriente'){
															echo '<option value="Corriente">CORRIENTE</option>';
															echo '<option value="Ahorros">AHORROS</option>';
														}else {
															echo '<option value="Ahorros">AHORROS</option>';
															echo '<option value="Corriente">CORRIENTE</option>';	
														}			
													}
											echo '</select>';
												?>
										</div>
										<div class="col-sm-3">
											<label for="Titular_1">Titular</label>
											<input type="text"  onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="Titular_1" name="Titular_1"  placeholder="Titular de la Cuenta" value="<?php echo $Titular_1; ?>">
										</div>
										<div class="col-sm-3">
											<label for="Numero_Cuenta_1">Numero de cuenta</label>
											<input type="text" class="form-control" id="Numero_Cuenta_1" name="Numero_Cuenta_1"  placeholder="Numero de Cuenta" value="<?php echo $Numero_Cuenta_1; ?>">
										</div>
									</div>
								
									<div class="form-group col-sm-12 " >
										<div class="col-sm-3">
											<label for="Banco_2">Nombre</label>
											<?PHP
												$query1=mysqli_query($con, "select * from BANCOS");
												echo' <select class="form-control" id="Banco_2" name ="Banco_2" placeholder="Banco_2 " onchange="TipoBanco2()">';
												while($rw_Admin1=mysqli_fetch_array($query1)){
													if ($Banco_2 ==$rw_Admin1['Nombre']){
														$Bancos_2 = '<option value="'.$rw_Admin1['Nombre'].'">'.$rw_Admin1['Nombre'].'</option>';
													} else{
														$Bancot_2 = $Bancot_2.'<option value="'.$rw_Admin1['Nombre'].'">'.$rw_Admin1['Nombre'].'</option>';	
													}
												}
												echo $Bancos_2;
													echo $Bancot_2;
												echo '</select>';
											?>
										</div>
										<div class="col-sm-3">
											<label for="Tipo_Banco_2" >Tipo de Cuenta</label>
											<select class="form-control" id="Tipo_Banco_2" name ="Tipo_Banco_2" placeholder="Tipo_Banco_2 ">
												<?PHP	
													if($Banco_2 =='NEQUI'){
														echo '<option value="Telefonica">TELEFONICA</option>';
													}else{
														if ($Tipo_Banco_2 == 'Corriente'){
															echo '<option value="Corriente">CORRIENTE</option>';
															echo '<option value="Ahorros">AHORROS</option>';
														}else {
															echo '<option value="Ahorros">AHORROS</option>';
															echo '<option value="Corriente">CORRIENTE</option>';	
														}			
													}
											echo '</select>';
												?>
										</div>
										<div class="col-sm-3">
											<label for="Titular_2">Titular</label>
											<input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="Titular_2" name="Titular_2"  placeholder="Titular de la Cuenta" value="<?php echo $Titular_2; ?>">
										</div>
										<div class="col-sm-3">
											<label for="Numero_Cuenta_2">Numero de cuenta</label>
											<input type="text" class="form-control" id="Numero_Cuenta_2" name="Numero_Cuenta_2"  placeholder="Numero de Cuenta" value="<?php echo $Numero_Cuenta_2; ?>">
										</div>
									</div>	
									<div id='DReferencias'>
										<div class="col-sm-12">
											<hr class="style1">
											<H2 style="text-align: left;">Referencias</H2>
											<hr class="style1">
										</div>
										<div class="form-group col-sm-8">
											<label for="Nombre_R1" class="col-sm-3 control-label">Nombre</label>
											<div class="col-sm-8">
												<input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="Nombre_R1" name="Nombre_R1" required placeholder="Nombre de Referencia 1" value="<?php echo $Nombre_R1; ?>">
											</div>
										</div>
										<div class="form-group col-sm-8">
											<label for="Tel_R1" class="col-sm-3 control-label">Telefono</label>
											<div class="col-sm-8">
												<input type="text" class="form-control" id="Tel_R1" name="Tel_R1" required placeholder="Telefono de Referencia 1" value="<?php echo $Tel_R1; ?>" maxlength="10"  onkeypress='return validaNumericos(event)' onchange='ValidarDatos("Ref1",$(this).val())'>
												<div class="invalid-feedback">
												Uno de los Numeros de Referencia ya se Encuentra Registrado
      											</div>
											</div>
										</div>			
										<div class="form-group col-sm-8">
											<hr class="style1">
											<label for="Nombre_R2" class="col-sm-3 control-label">Nombre</label>
											<div class="col-sm-8">
												<input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="Nombre_R2" name="Nombre_R2" required placeholder="Nombre de Referencia 2" value="<?php echo $Nombre_R2; ?>">
											</div>
										</div>
										<div class="form-group col-sm-8">
											<label for="Tel_R2" class="col-sm-3 control-label">Telefono</label>
											<div class="col-sm-8">
												<input type="text" class="form-control" id="Tel_R2" name="Tel_R2" required placeholder="Telefono de Referencia 2" value="<?php echo $Tel_R2; ?>" maxlength="10"  onkeypress='return validaNumericos(event)' onchange='ValidarDatos("Ref2",$(this).val())'>
												<div class="invalid-feedback">
												Uno de los Numeros de Referencia ya se Encuentra Registrado
      											</div>
											</div>
											
										</div>	
										<input type="text" class="form-control hidden" id="VTel_R" name="VTel_R" value="Yes">

									</div>
									
									<?php
										if ($EstadoU=="Editando"){		
											if ( $_SESSION['Estado']=='Activo'){
												?>
												<div class="form-group col-sm-8">
													<div class="col-sm-8 col-md-offset-3">
														<button type="button"  class="btn btn-primary"  data-toggle="modal" data-target="#CambiarPass">Cambiar Contraseña</button>
													</div>
												</div>
												<?php
											}
										}
									?>
									<div class=" col-sm-8">
									<div class="resultados_ajax2"></div>
									<hr class="style1">
									</div>
									
									<div class=" pull-right col-sm-8">
									
										<button type="button" class="btn btn-default" id="Cancelar">Cancelar</button>
										<?php
											
											if ( $_SESSION['Estado']=='Activo'){
												?>
													<button type="button" class="btn btn-primary GUsuario" >Guardar datos</button>
												<?php
											}
										?>
		  							</div>				
								
							</div>
							<div class="tab-pane fade" id="Configuracion">
								<div class="form-group col-sm-9">	
									<label for="DescBancario"  class="col-sm-3 control-label">Descuento Bancario</label>
				  					<div class="col-sm-9">
 				   						<input type="text"  class="form-control" id="DescBancario" name="DescBancario"  placeholder="Descuento Bancario" value="<?php echo $DescBancario;?>"  onkeypress='return validaNumericos(event)'>
				  					</div>
								</div> 
								<div class="form-group col-sm-9">
											<label for="CFondo" class="col-sm-3 control-label">Tiempo Fondo</label>
											<div class="col-md-9 col-sm-9">
												<select class='form-control' id="CFondo" name ="CFondo" placeholder="CFondo" >
													<?php 
													if($CFondo == 3){
														echo '<option value="3" selected>3 Meses</option>';
														echo '<option value="6">6 Meses</option>';
													}else{
														echo '<option value="3">3 Meses</option>';
														echo '<option value="6" selected>6 Meses</option>';
													}
													?>
												</select>
											</div>
										</div> 
								<div class="form-group col-sm-9">	
									<label for="FPrevencion"  class="col-sm-3 control-label">Fondo de Prevencion%</label>
				  					<div class="col-sm-9">
 				   						<input type="number"  class="form-control" id="FPrevencion" name="FPrevencion"  placeholder="Fondo de Prevencion" value="<?php echo $FPrevencion;?>" min="1" max="100" step="0.5">
				  					</div>
								</div> 
								<div class="form-group col-sm-9">
									<label for="Porcentaje" class="col-sm-3 control-label">Porcentaje Comision</label>
									<div class="col-sm-9">
										<?php
											if($_SESSION['Rol'] == '2'){
										?>
										<input type="Number" class="form-control" id="Porcentaje" name="Porcentaje" required placeholder="Porcentaje" value="<?php echo $Porcentaje;?>" min="1" max="100" step="0.5" <?php echo $Read; ?> onchange="UpdatePorcentaje()" >
										<?php
											}else{
										?>
										<input type="Number" class="form-control" id="Porcentaje" name="Porcentaje" required placeholder="Porcentaje" value="<?php echo $Porcentaje;?>" min="1" max="100" step="0.5" onchange="UpdatePorcentaje()"> 
										<?php
											}
										?>
									</div>
								</div>
								<div class="form-group col-sm-9">
									<label for="Portafolio" class="col-sm-3 control-label">Valor Portafolio</label>
									<div class="col-sm-9">
										<?php
											if($_SESSION['Rol'] == '2'){
										?>
										<input type="text" class="form-control" id="Portafolio" name="Portafolio" required placeholder="Portafolio" value="<?php echo $Portafolio;?>"  <?php echo $Read; ?> onchange="UpdatePortafolio()"  onkeypress='return validaNumericos(event)'>
										<?php
											}else{
										?>
										<input type="text" class="form-control" id="Portafolio" name="Portafolio" required placeholder="Portafolio" value="<?php echo $Portafolio;?>"  onchange="UpdatePortafolio()"  onkeypress='return validaNumericos(event)'> 
										<?php
											}
										?>
									</div>
								</div>
								<div class="form-group col-sm-9">
									<label for="CC" class="col-sm-3 control-label" id="Label-CC">Afiliados Diarios</label>
									<div class="col-sm-9">
										<input type="number" min="1" max="100" class="form-control" id="CantAfiliados" name="CantAfiliados" required placeholder="Afiliados Diarios" value="<?php echo $CantAfiliados; ?>">
									</div>
								</div>
								<div class=" col-sm-8">
									<div class="resultados_ajax2"></div>
									<hr class="style1">
								</div>
								<div class=" pull-right col-sm-8">
									
										<button type="button" class="btn btn-default" id="Cancelar">Cancelar</button>
										<?php
											
											if ( $_SESSION['Estado']=='Activo'){
												?>
													<button type="button" class="btn btn-primary GUsuario" >Guardar datos</button>
												<?php
											}
										?>
		  							</div>	
								</form>	
							</div>
							<div class="tab-pane fade" id="Permisos">
								<!-- -->
								<ul class="nav nav-tabs" role="tablist">
									<li class="active"><a href="#Usuarios" class="Permisos" role="tab" data-toggle="tab" id="Click_Usuarios">Usuarios</a></li>
									<li><a href="#Transacciones" class="Permisos" role="tab" data-toggle="tab" id="Click_Transacciones">Transacciones</a></li>
									<li><a href="#Ajustes" class="Permisos" role="tab" data-toggle="tab" id="Click_Ajustes">Ajustes</a></li>
									<li><a href="#Campanas" class="Permisos"role="tab" data-toggle="tab" id="Click_Campanas">Campañas</a></li>
									<li><a href="#Afiliados" class="Permisos" role="tab" data-toggle="tab" id="Click_Afiliados">Afiliados</a></li>
									<li><a href="#Contabilidad"class="Permisos" role="tab" data-toggle="tab" id="Click_Contabilidad">Contabilidad</a></li>
									<li><a href="#Directorio"class="Permisos" role="tab" data-toggle="tab" id="Click_Directorio">Directorio</a></li>
									
									
									<li><a href="#CuentaVirtual" class="Permisos" role="tab" data-toggle="tab" id="Click_CuentaVirtual">Cuenta Virtual</a></li>
									<li><a href="#Transferencias" class="Permisos" role="tab" data-toggle="tab" id="Click_Transferencias">Transferencias</a></li>
									
								</ul>
								<div class="tab-content">
								<div class="tab-pane fade in active" id="Usuarios">
									</div>
									<div class="tab-pane fade" id="Afiliados">
									</div>
									<div class="tab-pane fade" id="Contabilidad">
									</div>
									<div class="tab-pane fade" id="Ajustes">
									</div>
									<div class="tab-pane fade" id="Transacciones">
									</div>
									<div class="tab-pane fade" id="Campanas">
									</div>
									<div class="tab-pane fade" id="CuentaVirtual">
									</div>
									<div class="tab-pane fade" id="Transferencias">
									</div>
									<div class="tab-pane fade" id="Directorio">
									</div>
									
								</div>
								<!-- -->				
							</div>
							<div class="tab-pane fade" id="CampanasU">
								<!-- Campañas-->
								
							<?php			
								if ( $_SESSION['Estado']=='Activo'){
								?>
<button type="button" class="btn btn-default" data-toggle="modal" data-target="#AgregarCampana">
									<i class="fas fa-plus"></i> Agregar Campaña
								</button>
								<?php
								}
								?>
								<br><br>
								<div id="resultados_Campana"></div>
								<div id="resultados" class='col-md-12' style="margin-top:10px"></div><!-- Carga los datos ajax -->			
								</div>
							</div>
						</div>
					</div>			
		  		</div>	
			</div>	  		
		</div>
	</div>
	

	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/metisMenu/metisMenu.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
	<script src="assets/scripts/common.js"></script>
	<script type="text/javascript" src="Componentes/JavaScript/Campanas_Usuario.js"></script>
	<script type="text/javascript" src="Componentes/JavaScript/Permisos.js"></script>



	<script>
	function CambioDir(){
		$('#Direccion').val($('#Indicativo').val()+' '+$('#D1').val()+' # '+$('#D2').val()+' - '+$('#D3').val());
	}
   $('#Click_Permisos').click(function() {

		$('#Click_Afiliados').click();

	 })

		$('.Permisos').click(function() {
			$('#'+Modulo).html('');
			var Id=$(this).attr("id");
			var Cadena = Id.split("_");	
			var Modulo = Cadena[1];
			var Usuario = $("#Nit").val();
			$.ajax({
        type: "POST",
				url: "Componentes/Ajax/Cargar_Permisos.php",
        data: "Modulo="+Modulo+"&Usuario="+Usuario,
			beforeSend: function(objeto){
				
			},success: function(datos){
				$('#'+Modulo).html(datos);
				
			
			
					
			}
		});
			
    })

function UpdatePorcentaje(){
if($("#Porcentaje").val()< 0){
	var p = $("#Porcentaje").val();
	document.getElementById('Porcentaje').value = p* (-1);

}
document.getElementById('Portafolio').value =0;
}

function UpdatePortafolio(){
if($("#Portafolio").val()< 0){
	var p = $("#Portafolio").val();
	document.getElementById('Portafolio').value = p* (-1);

}
document.getElementById('Porcentaje').value = 0;


}
	$( "#Cancelar" ).click(function( event ) {
		if (document.getElementById('EstadoU').value == 'Editando') {
			location.reload(true);
		}
		else{
			location.href='Consultar-Usuarios.php';
		}
	})
$( "#Consultar" ).click(function( event ) {
		location.href='Consultar-Usuarios.php';
})

$(".GUsuario").click(function( event ) {
	if($('#VCC').val()=='Nou'){
		alert('El Numero de Documento Del Representante Legal ya se Encuentra Registrado');
	}else{
		if($('#VTel_R').val()=='Nou'){
			alert('Uno de los Numeros de Referencia ya se Encuentra Registrado');
		}else{
			if($('#VTelC').val()=='Nou'){
				alert('El Telefono de Contacto ya se Encuentra Registrado');
			}else{
				if($('#VCelC').val()=='Nou'){
					alert('El Celular de Contacto ya se Encuentra Registrado');
				}else{
					if(document.getElementById('EstadoU').value== 'Editando'){
						var r = confirm("Confirmas Actualizacion de Usuario");
						if (r == true) {
							$( "#Guardar_Usuario" ).submit();
						} 
					}else{
						if($('#VNit').val()=='Nou'){
							alert('El Numero de Documento o Nit Ya se Encuentra Registrado');
						}else{
							$( "#Guardar_Usuario" ).submit();
						}
					}
				}	
			}
				
		}
	}
});

	$( "#Guardar_Usuario" ).submit(function( event ) {
 		var parametros = $(this).serialize();
	 	$.ajax({
			type: "POST",
			url: "Componentes/Ajax/Guardar_Usuario.php",
			data: parametros,
			 beforeSend: function(objeto){
				$(".resultados_ajax2").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$(".resultados_ajax2").html(datos);
			
		  }
	});
  event.preventDefault();
})
$( "#editar_password" ).submit(function( event ) {
  $('#actualizar_datos3').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "Componentes/Ajax/editar_password.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax3").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax3").html(datos);
			$('#actualizar_datos3').attr("disabled", false);
			
		  }
	});
  event.preventDefault();
})
function TipoU(){
													
	
	if (document.getElementById('Tipo').value=='Operador'){
		$('#Replegal').addClass("hidden");
		$('#TArea').removeClass("hidden");
		$('#DReferencias').addClass("hidden");
		

		
	} else{
		$('#Replegal').removeClass("hidden");
		$('#TArea').addClass("hidden");
		$('#DReferencias').removeClass("hidden");

	}
	
}
function TipoPersona(){
	
	if (document.getElementById('Tipo_Persona').value=='Natural'){
		$('#D_Nombre').removeClass("hidden");
		$('#D_Apellido').removeClass("hidden");
		$('#D_Razon_Social').addClass("hidden");
		$('#label-Nit').text('Numero de Documento');
		$("#Nit").attr("placeholder", "Numero de Documento");
		$('#Label-Rep_Legal').text('Nombre de Establecimiento');
		$("#Rep_Legal").attr("placeholder", "Nombre de Establecimiento");
		$('#Label-CC').text('Nit');
		$("#CC").attr("placeholder", "Nit");
	} else{
		$('#D_Nombre').addClass("hidden");
		$('#D_Apellido').addClass("hidden");
		$('#D_Razon_Social').removeClass("hidden");
		$('#label-Nit').text('Nit');
		$("#Nit").attr("placeholder", "Nit");
		$('#Label-Rep_Legal').text('Representante Legal');
		$("#Rep_Legal").attr("placeholder", "Representante Legal");
		$('#Label-CC').text('Numero de Documento');
		$("#CC").attr("placeholder", "Numero de Documento");

	}
	
}
function Cargar() {
	if (document.getElementById('Tipo_Persona').value=='Natural'){
		$('#D_Nombre').removeClass("hidden");
		$('#D_Apellido').removeClass("hidden");
		$('#D_Razon_Social').addClass("hidden");
	} else{
		$('#D_Nombre').addClass("hidden");
		$('#D_Apellido').addClass("hidden");
		$('#D_Razon_Social').removeClass("hidden");
	}
	CargarCampanas();
	TipoU();
	$("#DescBancario").keyup();
	$("#Portafolio").keyup();
	
}
function RazonSocial(){
	document.getElementById('Razon_Social').value = document.getElementById('Nombre').value	 +' '+document.getElementById('Apellido').value;
}
function TipoBanco1() {
var x = document.getElementById("Tipo_Banco_1");
var option = document.createElement("option");
var option2 = document.createElement("option");
if(document.getElementById("Banco_1").value=='NEQUI'){
	x.remove(0);
	x.remove(0);
	option.text = "Telefonica";
	option.value="Telefonica";
	x.add(option, x[0]);
}else {
	x.remove(0);
	x.remove(0);	
	option.text = "Ahorros";
	option.value="Ahorros";
	x.add(option, x[0]);
	option2.text = "Corriente";
	option2.value="Corriente";
	x.add(option2, x[1]);
}
}
function TipoBanco2() {
var x = document.getElementById("Tipo_Banco_2");
var option = document.createElement("option");
var option2 = document.createElement("option");
if(document.getElementById("Banco_2").value=='NEQUI'){
	x.remove(0);
	x.remove(0);
	option.text = "Telefonica";
	option.value="Telefonica";
	x.add(option, x[0]);
}else {
	x.remove(0);
	x.remove(0);	
	option.text = "Ahorros";
	option.value="Ahorros";
	x.add(option, x[0]);
	option2.text = "Corriente";
	option2.value="Corriente";
	x.add(option2, x[1]);
}




}
function ValidarDatos(Tipo,Valor){
	var Nit = $('#Nit').val();
	$.ajax({
			url: "Componentes/Ajax/ValidarDatos.php?Tipo="+Tipo+"&Valor="+Valor+"&Nit="+Nit,
			 beforeSend: function(objeto){
				$("#resultados_ajax3").html("Mensaje: Cargando...");
			  },
			success: function(datos){
				
			var Res = datos.split('!');
			if(Res[1] == 'Correcto'){
				if(Tipo=='Nit'){
					$('#Nit').removeClass("is-invalid");
					$('#Nit').addClass("is-valid");
					$('#VNit').val('Yes');
				}
				if(Tipo=='RepLegal'){
					$('#CC').removeClass("is-invalid");
					$('#CC').addClass("is-valid");
					$('#VCC').val('Yes');
				}
				if(Tipo=='TelC'){
					$('#Tel_C').removeClass("is-invalid");
					$('#Tel_C').addClass("is-valid");
					$('#VTelC').val('Yes');
				}
				if(Tipo=='CelC'){
					$('#Cel_C').removeClass("is-invalid");
					$('#Cel_C').addClass("is-valid");
					$('#VCelC').val('Yes');
				}
				if(Tipo=='Ref1'){
					$('#Tel_R1').removeClass("is-invalid");
					$('#Tel_R1').addClass("is-valid");
					if($('#Tel_R1').val()!=$('#Tel_R2').val()){
						$('#VTel_R').val('Yes');
					}else{
						$('#VTel_R').val('Nou');
						$('#Tel_R2').removeClass("is-valid");
						$('#Tel_R2').addClass("is-invalid");	
					}
				}
				if(Tipo=='Ref2'){
					$('#Tel_R2').removeClass("is-invalid");
					$('#Tel_R2').addClass("is-valid");
					if($('#Tel_R1').val()!=$('#Tel_R2').val()){
						$('#VTel_R').val('Yes');
					}else{
						$('#VTel_R').val('Nou');
						$('#Tel_R1').removeClass("is-valid");
						$('#Tel_R1').addClass("is-invalid");	
					}
				}
			}else{
				if(Tipo=='Nit'){
					$('#Nit').removeClass("is-valid");
					$('#Nit').addClass("is-invalid");
					$('#VNit').val('Nou');
				}
				if(Tipo=='RepLegal'){
					$('#CC').removeClass("is-valid");
					$('#CC').addClass("is-invalid");
					$('#VCC').val('Nou');
				}
				if(Tipo=='TelC'){
					$('#Tel_C').removeClass("is-valid");
					$('#Tel_C').addClass("is-invalid");
					$('#VTelC').val('Nou');
				}
				if(Tipo=='CelC'){
					$('#Cel_C').removeClass("is-valid");
					$('#Cel_C').addClass("is-invalid");
					$('#VCelC').val('Nou');
				}
				if(Tipo=='Ref1'){
					$('#Tel_R1').addClass("is-invalid");
					$('#Tel_R1').removeClass("is-valid");
					$('#VTel_R').val('Nou');
				}
				if(Tipo=='Ref2'){
					$('#Tel_R2').addClass("is-invalid");
					$('#Tel_R2').removeClass("is-valid");
					$('#VTel_R').val('Nou');
					}
				
			}
			
			
		  }
	});
}

function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;        
}
$("#DescBancario").on({
    "focus": function (event) {
        $(event.target).select();
    },
    "keyup": function (event) {
        $(event.target).val(function (index, value ) {
            return value.replace(/\D/g, "")       
                        .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
        });
    }
});
$("#Portafolio").on({
    "focus": function (event) {
        $(event.target).select();
    },
    "keyup": function (event) {
        $(event.target).val(function (index, value ) {
            return value.replace(/\D/g, "")       
                        .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
        });
    }
});
function CambioDirA(){
		$('#Direccion_Adicional').val($('#Adicional').val()+' '+$('#D4').val());
	}

	</script>
</body>

</html>
