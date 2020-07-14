<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
		}
		
	require_once ("config/db.php");
	require_once ("config/conexion.php");
	
	$Ventas="active";

	$Numero ="";
	$Afiliado ="";
	$Usuario ="";
	$Campana ="";
	$Estado_Campana ="";
	$Estado ="";
	$Fecha =date("Y-m-d");
	$Nombre="";
	$Correo="";
	$Transportadora="";
	$Seguimiento="";
	$Observaciones_Cargadas="";
	$NumeroNip="";
	$DataCreditoTipo="";
	$Servicio="";
	$Canal="";
	$NumeroCelular="";
	$OperadorVenta="";
	$OperadorDonante="";
	$NumeroSim="";
	$Valor="";
	$Liquidada="";
	$For_Pago="";
	$Pin="";
	$Cuotas="";
	$TipoTarjeta="";
	$NumeroTarjeta="";
	$SCode="";
	$FechaExp ="";
	$SAfiliado = "";
	$Correo = "";
	$Nombre_Completo = "";
	$Identificacion="";
	$Token="";
	$Correo="";
	$Telefono="";	

	$TarjetaC="hidden";
	$TarjetaP="hidden";
	
	

	if (isset($_GET['Numero'])) {

		$query=mysqli_query($con, "select VENTAS.Pin,VENTAS.Cuotas,VENTAS.TipoTarjeta,VENTAS.NumeroTarjeta,VENTAS.SCode,
		VENTAS.FechaExp ,VENTAS.Forma_Pago,VENTAS.Liquidada,VENTAS.Portafolio,VENTAS.Numero,VENTAS.Afiliado,VENTAS.Usuario,VENTAS.Campana,
		VENTAS.Estado_Campana,VENTAS.Estado,VENTAS.Fecha,VENTAS.Transportadora,VENTAS.Seguimiento,VENTAS.NumeroNip,VENTAS.DataCreditoTipo,
		VENTAS.Servicio,VENTAS.Canal,VENTAS.NumeroCelular,VENTAS.OperadorVenta,VENTAS.OperadorDonante,VENTAS.NumeroSim,
		VENTAS.Valor,VENTAS.Porcentaje_Comision,USUARIOS.Nit,USUARIOS.Razon_Social,VENTAS.Nombre_Completo,VENTAS.Identificacion,VENTAS.SAfiliado,VENTAS.Token
		,VENTAS.Correo,VENTAS.Telefono	from VENTAS inner join USUARIOS on VENTAS.Usuario=USUARIOS.Nit  where Numero ='".$_GET['Numero']."' ");
		$rw_Admin=mysqli_fetch_array($query);
		$Numero =$rw_Admin['Numero'];
		$Correo =$rw_Admin['Correo'];
		$Telefono =$rw_Admin['Telefono'];
		$Afiliado =$rw_Admin['Afiliado'];
		$Usuario =$rw_Admin['Usuario'];
		$Campana =$rw_Admin['Campana'];
		$Estado =$rw_Admin['Estado'];
		$Estado_Campana =$rw_Admin['Estado_Campana'];
		$Fecha =$rw_Admin['Fecha'];
		$Transportadora=$rw_Admin['Transportadora'];
		$Seguimiento=$rw_Admin['Seguimiento'];
		$NumeroNip=$rw_Admin['NumeroNip'];
		$DataCreditoTipo=$rw_Admin['DataCreditoTipo'];
		$Servicio=$rw_Admin['Servicio'];
		$Canal=$rw_Admin['Canal'];
		$NumeroCelular=$rw_Admin['NumeroCelular'];
		$OperadorVenta=$rw_Admin['OperadorVenta'];
		$OperadorDonante=$rw_Admin['OperadorDonante'];
		$NumeroSim=$rw_Admin['NumeroSim'];
		$Valor=$rw_Admin['Valor'];
		$Porcentaje_Comision=$rw_Admin['Porcentaje_Comision']; 
		$Portafolio=$rw_Admin['Portafolio']; 
		$Nit=$rw_Admin['Nit'];
		$Razon_Social =$rw_Admin['Razon_Social'];
		$Liquidada=$rw_Admin['Liquidada'];
		$For_Pago = $rw_Admin['Forma_Pago'];
		$Pin= $rw_Admin['Pin'];
		$Cuotas= $rw_Admin['Cuotas'];
		$TipoTarjeta= $rw_Admin['TipoTarjeta'];
		$NumeroTarjeta= $rw_Admin['NumeroTarjeta'];
		$SCode= $rw_Admin['SCode'];
		$FechaExp = $rw_Admin['FechaExp'];
		$SAfiliado = $rw_Admin['SAfiliado'];
		$Identificacion = $rw_Admin['Identificacion'];
		$Nombre_Completo = $rw_Admin['Nombre_Completo'];
		$Token = $rw_Admin['Token'];

		if (($Estado==4)&&($_SESSION['Rol']=='1')){
			$NumeroTarjeta= $rw_Admin['NumeroTarjeta'];
			$SCode= $rw_Admin['SCode'];
			$FechaExp = $rw_Admin['FechaExp'];
		}else{
			$NumeroTarjeta= '**** **** **** '.substr($NumeroTarjeta, 12, 4);
				$SCode= '****';
				$FechaExp = '**/**';
		}
		


		

	

	$query1=mysqli_query($con, "SELECT Tipo FROM FORMAS_PAGO WHERE Codigo=".$For_Pago." ");
		$rw_Admin1=mysqli_fetch_array($query1);
		
	

	if ($rw_Admin1['Tipo']=='Tarjeta'){
		$TarjetaC="";
	}else{
		if ($rw_Admin1['Tipo']=='Policia'){
			$TarjetaP="";
		}
	}

		
	
		
		
		



		$EstadoV="Editando";
		$Read= "readonly='readonly'";

		$Numero_venta="Transaccion Numero: ".$Numero;

		$sql="SELECT * FROM  OBSERVACIONES_VENTAS inner join USUARIOS on USUARIOS.Nit=OBSERVACIONES_VENTAS.Usuario WHERE VENTA=".$Numero."";

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
		$Nit=$_SESSION['Nit'];
		$Razon_Social =$_SESSION['Razon_Social'];
		$Porcentaje_Comision=$_SESSION['Porcentaje'];
		$Portafolio=$_SESSION['Portafolio'];
		$EstadoV="Nuevo";
		$Read= "";
		$Numero_venta="Nueva Transaccion";
	}



?>
<!doctype html>
<html lang="es">
<head>
	<?php include("head.php"); 	?>

</head>
<body onload="Cargar()">
	<div id="wrapper">
		<?php
	include("Menu.php");
	?>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN CONTENT -->
		<div id="main-content">
			<div class="container-fluid">
				<div class="panel panel-default">
					<div class="panel-heading">
		    		<div class="btn-group pull-right">
							<button type="button" class="btn btn-default" id="Consultar">
								<span class="fa fa-shopping-cart"></span> Consultar Transacciones
							</button>
							
						</div>
						<h4><i class="fas fa-shopping-cart"></i> <label for="" id='LNumero'><?php echo $Numero_venta; ?></label>  </h4>
					</div>
					<div class="panel-body">
					<?php 
						include("Componentes/Modal/Buscar_Afiliados.php");
						include("Componentes/Modal/FomaPago_Policia.php");
						include("Componentes/Modal/FomaPago_Tarjeta.php");
				
						

//$data = json_decode( file_get_contents('http://69.162.85.4:10005/ProcessRest/1?TipoTrn=001&Interface=00440044&Bin=373737&Fecha=20171130113000&TipoId=CC&Id=79454636&Producto=79&Canal=79 '), true );
//echo $data['opt'];
//$data = file_get_contents('http://69.162.85.4:10005/ProcessRest/1?TipoTrn=001&Interface=00440044&Bin=373737&Fecha=20171130113000&TipoId=CC&Id=79454636&Producto=79&Canal=79 ');
//echo $data;

/*
$url = 'http://69.162.85.4:10005/ProcessRest/1?TipoTrn=017&Interface=00440044&Bin=373737&Fecha=20171130113000&TipoId=CC&Id=79454636&Producto=79&Canal=79 ';


$ch = curl_init($url);
$data = array(
	'Nombre'      => 'juan david andrade',
	'Telefono'    => '3004885454',
	'Direccion'       => 'Carrera 95#2b-21',
	'Valor' => 200000
  );
$payload = json_encode($data);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);

echo $result;

curl_close($ch);*/ 

					?>
					<form class="form-horizontal" method="post" id="Guardar_Ventas" name="Guardar_Ventas">
					<input type="text" class="form-control hidden" id="EstadoV" name="EstadoV"  value="<?php echo $EstadoV; ?>" > 
					<input type="text" class="form-control hidden" id="Liquidada" name="Liquidada"  value="<?php echo $Liquidada; ?>" > 
					
							<div class="form-group container-fluid">
								<div class="row">
									<div class="col-md-4">
										<label for="Afiliado" class="control-label">Afiliado</label>
								 		<div class="input-group">
										 <span class="input-group-btn">
												<button type="button" class="btn btn-default" data-toggle="modal" data-target="#BuscarAfiliado"><span class="glyphicon glyphicon-search"></span></button>
											</span>
								 			<input class="form-control hidden" type="text" id="Numero" name="Numero" VALUE="<?php echo $Numero;?>"   readonly>
								 			<input class="form-control hidden" type="text" id="SinAfiliado" name="SinAfiliado" VALUE="<?php echo $SAfiliado;?>"   readonly>
								 			<input class="form-control hidden" type="text" id="Afiliado" name="Afiliado" VALUE="<?php echo $Afiliado;?>"  required >
											<input class="form-control" type="text" <?php echo  $Read;?>  id="Nombre" name="Nombre" placeholder="Nombre del Afiliado" VALUE="<?php echo $Nombre_Completo;?>" required  <?php if(($SAfiliado=='N')||($SAfiliado=='')){echo 'readonly';}?> autocomplete='off' onkeyup="javascript:this.value=this.value.toUpperCase();">
											<span class="input-group-btn">
												<button type="button" class="btn btn-default" onclick="FSinAfiliado()" ><span class="glyphicon glyphicon-remove"></span></button>
											</span>
										</div>
									</div>
									<div class="col-md-4">
										<label for="mail" class="control-label">Identificacion</label>
										<input type="text" class="form-control" id="Identificacion"<?php echo  $Read;?> name ="Identificacion"VALUE="<?php echo $Identificacion;?>" placeholder="Identificacion" <?php if(($SAfiliado=='N')||($SAfiliado=='')){echo 'readonly';}?> autocomplete='off' onkeyup="javascript:this.value=this.value.toUpperCase();">
									</div>
									<div class="col-md-4">
										<label for="mail" class="control-label">Correo</label>
										<input type="text" class="form-control" id="Correo" <?php echo  $Read;?> name ="Correo"VALUE="<?php echo $Correo;?>" placeholder="Correo" <?php if(($SAfiliado=='N')||($SAfiliado=='')){echo 'readonly';}?> autocomplete='off' onkeyup="javascript:this.value=this.value.toUpperCase();">
									</div>
								</div>	
								<div class="row">
									<div class="col-md-4">
										<label for="mail" class="control-label">Telefono</label>
										<input type="text" class="form-control" <?php echo  $Read;?> id="Telefono"  name ="Telefono"VALUE="<?php echo $Telefono;?>" placeholder="Telefono" <?php if(($SAfiliado=='N')||($SAfiliado=='')){echo 'readonly';}?> autocomplete='off' onkeyup="javascript:this.value=this.value.toUpperCase();">
									</div>	
									<div class="col-md-4">
										<label for="empresa" class="control-label">Usuario</label>
										<input type="text" class="form-control" id="Usuario_N" placeholder="Usuario" value="<?php echo $Razon_Social;?>" readonly>
										<input type="text" class="form-control hidden" id="Usuario" name="Usuario" placeholder="Usuario" value="<?php echo $Nit;?>" readonly>
									</div>
									<div class="col-md-4">
										<label for="tel2" class="control-label">Fecha</label>
										<input type="Date" class="form-control" id="fecha" name="fecha" value="<?php echo $Fecha?>"readonly>
										
									</div>
								</div>	
								<div class="row">
										
									<div class="col-md-4">
										<label for="email" class="control-label">Campaña</label>
										<?PHP
										if($EstadoV=='Nuevo'){
											$query1=mysqli_query($con, "select CAMPANAS.Nombre,CAMPANAS.Numero from USUARIO_CAMP inner join CAMPANAS on USUARIO_CAMP.Campana = CAMPANAS.Numero where Usuario ='".$_SESSION['Nit']."' and CAMPANAS.Estado ='Activa' order by Nombre");
											echo' <select class="form-control" id="Campana" name ="Campana" placeholder="Campaña" onchange="CargarEstados()">';
											while($rw_Admin1=mysqli_fetch_array($query1)){
												if($Campana==$rw_Admin1['Numero']){
													echo '<option value="'.$rw_Admin1['Numero'].'" selected>'.utf8_encode($rw_Admin1['Nombre']).'</option>';	

												}else{
													echo '<option value="'.$rw_Admin1['Numero'].'">'.utf8_encode($rw_Admin1['Nombre']).'</option>';	

												}
											}
											echo '</select>';
										}else{
											$query1=mysqli_query($con, "select CAMPANAS.Nombre from CAMPANAS 
											WHERE CAMPANAS.Numero= '$Campana'");
												while($rw_Admin1=mysqli_fetch_array($query1)){
													?>
													<input type="Text" class="form-control hidden" id="Campana" name="Campana" value="<?php echo $Campana;?>" readonly="readonly">
													<input type="Text" class="form-control " id="NCampana" name="NCampana" value="<?php echo utf8_encode($rw_Admin1['Nombre']);?>" readonly="readonly">

													<?php
													
												
												}
												
										}
												
											?>	
									</div>
									<input type="Text" class="form-control hidden" id="Est_camp" name="Est_camp" require value="<?php echo $Estado_Campana?>" readonly="readonly">
									<input type="Text" class="form-control hidden" id="Seg_camp" name="Seg_camp" require value="<?php echo $Seguimiento?>" readonly="readonly">
									<input type="Text" class="form-control hidden" id="Tran_camp" name="Tran_camp" require value="<?php echo $Transportadora?>" readonly="readonly">
									<input type="Text" class="form-control hidden" id="Forp_camp" name="Forp_camp" require value="<?php echo $For_Pago?>" readonly="readonly">
									<input type="text" class="form-control hidden" id="Porcentaje_Comision" Name="Porcentaje_Comision" placeholder="Porcentaje_Comision" value="<?php echo $Porcentaje_Comision;?>" >
									<input type="text" class="form-control hidden" id="Portafolio" Name="Portafolio" placeholder="Portafolio" value="<?php echo $Portafolio;?>" >
									 
									<div  id="Estados">
									</div>
									<?php 
										if($EstadoV == "Nuevo"){
											echo '
											<input type="Text" class="form-control hidden" id="Estado" name="Estado" require value="4" >';
										} else {
											$query1=mysqli_query($con, 'SELECT Estado FROM PERMISOS where Modulo="Transacciones" and Permiso="CambiarEstado" and  Usuario ="'.$_SESSION['Nit'].'";');
											$rw_Admin1=mysqli_fetch_array($query1);
											if($_SESSION['Rol']<>'2' or $rw_Admin1['Estado']=='true'){
												echo '
												<div class="col-md-4">
													<label for="Estado" class="control-label">Estado</label>';

												$query1=mysqli_query($con, "select Id,Tx from ESTADOS");
												echo' <select class="form-control" id="Estado" name ="Estado" placeholder="Campaña" onchange="ValidarEstado(event)">';
												while($rw_Admin1=mysqli_fetch_array($query1)){
													if($Estado==$rw_Admin1[0]){
														echo '<option value="'.$rw_Admin1[0].'" selected>'.utf8_encode($rw_Admin1[1]).'</option>';	

													}else{
														echo '<option value="'.$rw_Admin1[0].'">'.utf8_encode($rw_Admin1[1]).'</option>';	

													}
												}
												echo '</select>
												</div>';
												echo ' <input type="Text" class="form-control hidden" id="EstadoA"   value="'.$Estado.'" >';
											}else{
												echo '
											<input type="Text" class="form-control hidden" id="Estado" name="Estado" require value="'.$Estado.'" >';
											}
											
											
										}
									?>
									

									<div class="col-md-4">
										<label for="empresa" class="control-label">Valor</label>
										<input type="text" class="form-control valor" <?php echo $Read;?> id="Valor" Name="Valor" placeholder="Valor" value="<?php echo $Valor;?>" autocomplete="off" onchange="Descuentos()">
									</div>
									
									<div  class="" id="Form_Telefonica">
										<div class="col-sm-12">
											<hr class="style1">
										</div>
										<div class="col-md-4">
											<label for="NumeroNip" class="control-label">Numero de NIP</label>
											<input type="text" class="form-control" name="NumeroNip" id="NumeroNip"VALUE="<?php echo $NumeroNip;?>" placeholder="Numero de NIP" >
										</div>
										<div class="col-md-4">
											<label for="DataCreditoTipo" class="control-label">Data Crédito Tipo</label>
											<input type="text" class="form-control" name="DataCreditoTipo" id="DataCreditoTipo"VALUE="<?php echo $DataCreditoTipo;?>" placeholder="Data Crédito Tipo" >
										</div>
										<div class="col-md-4">
											<label for="Servicio" class="control-label">Servicio Ofrecido </label>
											<input type="text" class="form-control" name="Servicio" id="Servicio"VALUE="<?php echo $Servicio;?>" placeholder="Servicio Ofrecido " >
										</div>
										<div class="col-md-4">
											<label for="Servicio" class="control-label">Canal </label>
											<?php
												echo '	
													<select class="form-control" id="Canal" name ="Canal" placeholder="Canal"  >';
													if($Canal == 'Hogar'){
														echo '<option value="Hogar">Hogar</option>';
														echo '<option value="Movil">Movil</option>';
													}else{
														echo '<option value="Movil">Movil</option>';
														echo '<option value="Hogar">Hogar</option>';
													}
													echo '</select>';
											?>
										</div>
										<div class="col-md-4">
											<label for="NumeroCelular" class="control-label">Numero Celular </label>
											<input type="text" class="form-control" name="NumeroCelular" id="NumeroCelular"VALUE="<?php echo $NumeroCelular;?>" placeholder="Numero Celular " >
										</div>		
										<div class="col-md-4">
											<label for="OperadorVenta" class="control-label">Operador Venta </label>
											<?PHP
												$query=mysqli_query($con, "select * from ADMINISTRACION");
												echo' <select class="form-control" id="OperadorVenta" name ="OperadorVenta" placeholder="OperadorVenta">';
												$rw_Admin=mysqli_fetch_array($query);
												$tuArray = explode("\r\n", $rw_Admin['Operador_Venta']);
												foreach($tuArray as  $indice => $palabra){
													if ($OperadorVenta==$palabra){
														echo '<option value="'.$palabra.'" selected>'.$palabra.'</option>';	
											
													} else{
														echo '<option value="'.$palabra.'" >'.$palabra.'</option>';	
											
													}
												}  	
												echo '</select>';
											?>	
										</div>
										<div class="col-md-4">
											<label for="OperadorDonante" class="control-label">Operador Donante </label>
											<?PHP
												echo' <select class="form-control" id="OperadorDonante" name ="OperadorDonante" placeholder="OperadorDonante">';
											
												$tuArray = explode("\r\n", $rw_Admin['Operador_Donante']);
												foreach($tuArray as  $indice => $palabra){
													if ($OperadorDonante==$palabra){
														echo '<option value="'.$palabra.'" selected>'.$palabra.'</option>';	
											
													} else{
														echo '<option value="'.$palabra.'" >'.$palabra.'</option>';	
											
													}
												}  	
												echo '</select>';
											?>	
										</div>
										<div class="col-md-4">
											<label for="NumeroSim" class="control-label">Número de Sim Card </label>
											<input type="text" class="form-control" name="NumeroSim" id="NumeroSim"VALUE="<?php echo $NumeroSim;?>" placeholder="Número de Sim Card " >
										</div>
										<div class="col-sm-12">
											<hr class="style1">	
										</div>
									</div>
									<?php 
										if($EstadoV == "Nuevo"){
											$NumeroAp="hidden";
										}	else{
											$NumeroAp="";

										}
									?>
									<div class="col-md-4 <?php echo $NumeroAp;?>">
										<label for="Token" class="control-label">Numero de Aprobacion</label>
										<input type="text" class="form-control" id="Token" Name="Token" maxlength="20" placeholder="Numero de Aprobacion" value="<?php echo $Token;?>" autocomplete="off" >
									</div>
											
											
										
								</div>
								<div class="col-md-6" id="Descuentos">
									<?php
										$query=mysqli_query($con, "select * from ADMINISTRACION");
										$rw_Admin=mysqli_fetch_array($query);
										$ComisionT =  $rw_Admin['ComisionT'];
										$ComisionF =  $rw_Admin['ComisionF'];
										$IvaG7 =  $rw_Admin['IvaG7'];
										$Retefuente =  $rw_Admin['Retefuente'];
										$ReteIca =  $rw_Admin['ReteIca'];
									?>
									<br>
									<br>
									<table>
										<tr  class="warning">
											<th>Descripcion</th>
											<th>Valor</th>
										</tr>	
										<tr>
											<td>Valor de Venta</td>
											<td><input type="text" class="form-control valor" readonly name="VVenta" id="VVenta" ></td>	
										</tr>
										<tr>
											<td>comision transaccion Bancaria <?php echo $ComisionT?>%</td>
											<td>
												<input type="text" class="form-control hidden" name="ComisionT" id="ComisionT" value="<?php echo $ComisionT?>">
												<input type="text" class="form-control valor" name="VComisionT" id="VComisionT" readonly value="">
											</td>	
										</tr>
										<tr>
											<td>comision G7 -<?php echo $Porcentaje_Comision;?>%</td>
											<td>
												<input type="text" class="form-control hidden" name="ComisionG7" id="ComisionG7" value="<?php echo $Porcentaje_Comision;?>">
												<input type="text" class="form-control valor" readonly name="VComisionG7" id="VComisionG7" value="">
											</td>	
										</tr>	
										<tr>
											<td>Comisión Fija  G7 </td>
											<td><input type="text" class="form-control valor" name ="ComisionF" id="ComisionF" readonly value="<?php echo $ComisionF;?>"></td>	
										</tr>
										<tr>
											<td>Total Comision g7 </td>
											<td><input type="text" class="form-control valor" name ="TotalComisionG7" id="TotalComisionG7"readonly ></td>	
										</tr>
										<tr>
											<td>IVA Comisión g7 - <?php echo $IvaG7;?>% </td>
											<input type="text" class="form-control hidden" name="IvaG7" id="IvaG7" value="<?php echo $IvaG7;?>">
											<td><input type="text" class="form-control valor" name="VIvaG7" id="VIvaG7" readonly ></td>	
										</tr>
										<tr>
											<td>Retencion en la fuente - <?php echo $Retefuente;?>% </td>
											<input type="text" class="form-control hidden" name="Retefuente" id="Retefuente"  value="<?php echo $Retefuente;?>">
											<td><input type="text" class="form-control valor" name="VRetefuente" id="VRetefuente" readonly ></td>	
										</tr>
										<tr>
											<td>Retencion ICA - <?php echo $ReteIca;?>% </td>
											<input type="text" class="form-control hidden "name="ReteIca" id="ReteIca" value="<?php echo $ReteIca;?>">
											<td><input type="text" class="form-control valor"name="VReteIca" id="VReteIca" readonly ></td>	
										</tr>
										<tr>
											<td>Total Descuentos </td>
											<td><input type="text" class="form-control valor"  readonly name="TotalDescuento" id="TotalDescuento"></td>	
										</tr>
										<tr>
											<td>Total  cuenta virtual  </td>
											<td><input type="text" class="form-control valor" readonly name="TotalCuenta" id ="TotalCuenta"></td>	
										</tr>


									</table>		
								</div>
								<div class="col-md-6 <?php echo $TarjetaC; ?>"	id="TarjetaC">
									<br>
									<br>
									<div class="card border-primary mb-3" >
										<div class="card-header">Tarjeta de Credito</div>
										<div class="card-body text-primary">
										<table>
											<tr>
												<td><b>Numero:</b></td>
												<td><p class="card-text"><?php echo $NumeroTarjeta;?></p></td>
											</tr>
											<tr>
												<td><b>Fecha de Vencimiento:&nbsp;&nbsp;&nbsp;  </b></td>
												<td><p class="card-text"><?php echo $FechaExp;?></p></td>
											</tr>
											<tr>
												<td><b>SCode:</b></td>
												<td><p class="card-text"><?php echo $SCode;?></p></td>
											</tr>
										
										</table>
										
										</div>
									</div>
								</div>
								<div class="col-md-6 <?php echo $TarjetaP; ?>"	id="TarjetaP">
									<br>
									<br>
									<div class="card border-primary mb-3" >
										<div class="card-header">Ponal</div>
										<div class="card-body text-primary">
										<table>
											<tr>
												<td><b>Pin:</b></td>
												<td><p class="card-text"><?php echo $Pin;?></p></td>
											</tr>
											<tr>
												<td><b>Cuotas:&nbsp;&nbsp;&nbsp;  </b></td>
												<td><p class="card-text"><?php echo $Cuotas;?></p></td>
											</tr>
											
										
										</table>
										
										</div>
									</div>
								</div>

									<div class="col-md-12">
  										<label for="Observaciones">Observaciones:</label>
  										<textarea class="form-control" rows="5" id="Observaciones" name="Observaciones"></textarea>
									</div>	
									<div class="col-md-12"><br>
									<div class="card border-secondary mb-3">
											<?php echo $Observaciones_Cargadas ?>
  										
									</div>
  										
									</div>									
								</div>
								<br>
								
							</div>	
						
					<div id="resultados_ajax2"></div>
					<div class="modal-footer ">
						<button type="button" class="btn btn-default" id="Cancelar">Cancelar</button>
						<?php
							if ( $_SESSION['Estado']=='Activo'){
								?>
								<button type="submit" class="btn btn-primary">Guardar datos</button>
								<?php
							}
						?>
		  		</div>				
				</form>	
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
	<script type="text/javascript" src="Componentes/JavaScript/Modal_Buscar_Afiliados.js"></script>
	<script src="assets/scripts/common.js"></script>
	
	<script>
	function Descuentos(){
		$('#Descuentos').removeClass("hidden");
		var F = $('#Forma_Pago').val();
		var Forma_Pago = F.split('_');				
		if (Forma_Pago[1]=='1'){
			var TotalDevengado = $('#Valor').val();
			var VVenta=TotalDevengado.replace(/,/g, "");
			$('#VVenta').val(VVenta);
			var ComisionT=$('#ComisionT').val();
			var ComisionG7 =$('#ComisionG7').val();
			TotalDevengado = $('#ComisionF').val();
			var ComisionF=TotalDevengado.replace(/,/g, "");
			var IvaG7 = $('#IvaG7').val();
			var Retefuente = $('#Retefuente').val();
			var ReteIca = $('#ReteIca').val();		
			var VComisionT=VVenta*ComisionT/100;
			$('#VComisionT').val(VComisionT);
			var VComisionG7 = VVenta* ComisionG7 /100;
			$('#VComisionG7').val(VComisionG7);
			var TotalComisionG7 =(ComisionF*1)+(VComisionG7);
			$('#TotalComisionG7').val(TotalComisionG7);
			var VIvaG7 = TotalComisionG7*IvaG7/100;
			$('#VIvaG7').val(VIvaG7);
			var VRetefuente = VVenta*Retefuente/100;
			$('#VRetefuente').val(VRetefuente);
			var VReteIca = VVenta*ReteIca/100;
			$('#VReteIca').val(VReteIca);
			var TotalDescuento = VComisionT+TotalComisionG7+VIvaG7+VRetefuente+VReteIca;
			$('#TotalDescuento').val(TotalDescuento);
			var TotalCuenta = VVenta-TotalDescuento;
			$('#TotalCuenta').val(TotalCuenta);
			$(".valor").keyup();
		}else{
			$('#VVenta').val( $('#Valor').val());
			$('#TotalCuenta').val($('#Valor').val());

			$('#Descuentos').addClass("hidden");
		}
	}

function NuevoAfiliadoa(){
			
			//
			var Numero = $('#Numero').val();
			var Afiliado = $('#Identificacion').val();
			var Nombre = $('#Nombre').val();
			var SinAfiliado = $('#SinAfiliado').val();

			var Telefono =$("#Telefono").val();
			var Correo =	$("#Correo").val();

			if(SinAfiliado=='S'){
				window.open("Afiliados.php?IdentificacionN="+Afiliado+"&Nombre="+Nombre+"&Numero="+Numero+"&Telefono="+Telefono+"&Correo="+Correo, "Diseño Web", "");
			}else{
				window.open("Afiliados.php", "Diseño Web", "");
			}

			
	
		}
	$(".valor").on({
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


$( "#Cancelar" ).click(function( event ) {
	if (document.getElementById('EstadoV').value == 'Editando') {
		location.reload(true);
	}
	else{
		location.href='Consultar-Ventas.php';
	}
})
$( "#Consultar" ).click(function( event ) {
	
		location.href='Consultar-Ventas.php';

})
$( "#Guardar_Ventas" ).submit(function( event ) {
	if($('#Liquidada').val()=='True'){
		alert('La Venta ya fue Liquidada No se Puede Editar');
	} else{
		if($('#Liquidada').val()=='Pendiente'){
			alert('La Venta Tiene Una Solicitud de Pago Pendiente No se Puede Editar');
		}else {
			var parametros = $(this).serialize();
			$.ajax({
				type: "POST",
				url: "Componentes/Ajax/Guardar_Ventas.php",
				data: parametros,
				beforeSend: function(objeto){
					$("#resultados_ajax2").html("Mensaje: Cargando...");
				},
				success: function(datos){
		
					var Res = datos.split('*');
					if(Res[1]=='Correcto'){
						 $('#Numero').val(Res[2]);
						 $('#LNumero').html("Transaccion Numero: "+Res[2]);
						 $("#resultados_ajax2").html(Res[3]);
						
						 var F = $('#Forma_Pago').val();
						 var Forma_Pago = F.split('_');
						var Estado =$('#EstadoV').val();
						if (Estado=='Nuevo'){
							if (Forma_Pago[1]=='2'){
								$('#NumeroVP').val(Res[2]);
								$("#FormaPago_Policia").modal("show");
						 	}else{
								if (Forma_Pago[1]=='1'){
									$('#NumeroVT').val(Res[2]);
									$("#FormaPago_Tarjeta").modal("show");
									Cambio();
						 		} 
						 	}

						}
						 
					}else{
						$("#resultados_ajax2").html(datos);
					}

					
				}
			});
			event.preventDefault();
		}	
	}
})

$( "#FormPagoP" ).submit(function( event ) {
			var parametros = $(this).serialize();
			$.ajax({
				type: "POST",
				url: "Componentes/Ajax/Guardar_Forma_PagoVenta.php",
				data: parametros,
				beforeSend: function(objeto){
					$("#resultados_ajax2").html("Mensaje: Cargando...");
				},
				success: function(datos){
		
					var Res = datos.split('*');
					if(Res[1]=='Correcto'){
					
						 $("#resultados_ajax2").html(Res[3]);
						 $("#FormaPago_Policia").modal("hide");
						
					}else{
						$("#resultados_ajax2").html(datos);
					}

					
				}
			});
			event.preventDefault();
		
	
})
$( "#FormPagoT" ).submit(function( event ) {
			var parametros = $(this).serialize();
			$.ajax({
				type: "POST",
				url: "Componentes/Ajax/Guardar_Forma_PagoVenta.php",
				data: parametros,
				beforeSend: function(objeto){
					$("#resultados_ajax2").html("Mensaje: Cargando...");
				},
				success: function(datos){
		
					var Res = datos.split('*');
					if(Res[1]=='Correcto'){
					
						 $("#resultados_ajax2").html(Res[3]);
						 $("#FormaPago_Tarjeta").modal("hide");
						
					}else{
						$("#resultados_ajax2").html(datos);
					}

					
				}
			});
			event.preventDefault();
		
	
})

function CargarEstados(){
			var Campana = $("#Campana").val();
			var Est_camp = $("#Est_camp").val();
			var Seg_camp = $("#Seg_camp").val();
			var Tran_camp = $("#Tran_camp").val();
			var Forp_camp = $("#Forp_camp").val();
			var EstadoV = $("#EstadoV").val();
			$.ajax({
				type: "POST",
				url: "Componentes/Ajax/Cargar_Estados_Campana.php",
				data: "Campana="+Campana+"&Est_camp="+Est_camp+"&Seg_camp="+Seg_camp+"&Tran_camp="+Tran_camp+"&Forp_camp="+Forp_camp+"&EstadoV="+EstadoV,
				beforeSend: function(objeto){
				},success: function(datos){
					$("#Estados").html(datos);
					if(document.getElementById('Telefonica').value=='True'){
						$('#Form_Telefonica').removeClass("hidden");
					}else{
						$('#Form_Telefonica').addClass("hidden");
					}
					Descuentos();
				}	
			});
		

			

		}

		function Cargar() {
			CargarEstados();
			$("#Valor").keyup();
			
		}

	function validaNumericos(event) {
    	if(event.charCode >= 48 && event.charCode <= 57){
    		return true;
    	}
     	return false;        
	}
	function FSinAfiliado(){
		var Estado = $("#EstadoV").val();

if (Estado=='Nuevo'){
	$("#SinAfiliado").val('S');
	$("#Afiliado").val('1');
	
	$("#Identificacion").removeAttr("readonly");
	$("#Telefono").removeAttr("readonly");
	$("#Correo").removeAttr("readonly");
	
	$("#Nombre").removeAttr("readonly");
}
	
	}
	function ValidarEstado(valor){
		var Estado =$('#Estado').val();
		var EstadoA =$('#EstadoA').val();
		var Token =$('#Token').val();
		if (Token ==''){
			if(Estado==1 ){	
				event.preventDefault();
				$("#Estado").val(EstadoA);
				$('#Estado').change();
				alert('No se Puede Aprobar la Transaccion sin Numero de Aprobacion');				
			}else{
				$('#EstadoA').val(Estado);
			}
		}else{
			$('#EstadoA').val(Estado);
		}

	}
	function Cambio(){
	var anio = $('#Anio').val();
	var FechaExp = $('#FechaExp').val();
	$.ajax({
				url:'Componentes/Ajax/Filtros_fecha.php?Anio='+anio+"&FechaExp="+FechaExp,
				 beforeSend: function(objeto){
				
			  },
				success:function(data){
				
					$("#Mes").html(data);
					
				}
			})
	}

	</script>
</body>

</html>
