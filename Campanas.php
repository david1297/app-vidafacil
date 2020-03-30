<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
    }
	require_once ("config/db.php");
	require_once ("config/conexion.php");
	
	$Campanas="active";
	$Numero ="";
	$Nombre ="";
	$Contacto="";
	$Area ="";
	$Estado ="";
	$Porcentaje ="";			
	$Tipo ="";
	$EstadoC ="";
	$Porcentaje ="";
	$Perfil="";
	$Observaciones="";
	$Estados="";
	$Seguimiento="";
	$Transportadoras="";
	$Telefonica="";

	if (isset($_GET['Numero'])) {
		$query=mysqli_query($con, "select * from CAMPANAS where Numero ='".$_GET['Numero']."' ");
		$rw_Admin=mysqli_fetch_array($query);
		
		$Numero =$rw_Admin['Numero'];
		$Nombre =$rw_Admin['Nombre'];
		$Contacto=$rw_Admin['Contacto'];
		$Area =$rw_Admin['Area'];
		$Estado =$rw_Admin['Estado'];
		$Porcentaje =$rw_Admin['Porcentaje'];
		$Observaciones=$rw_Admin['Observaciones'];
		$Estados=$rw_Admin['Estados'];
		$Seguimiento=$rw_Admin['Seguimiento'];
		$Transportadoras=$rw_Admin['Transportadoras'];
		$Telefonica=$rw_Admin['Telefonica'];
		$EstadoC="Editando";
		$Read= "readonly='readonly'";
	}else{
		$EstadoC="Nuevo";
		$Read= "";
	}
	if (isset($_GET['Perfil'])) {
		$Perfil="SI";
	}
?>
<!doctype html>
<html lang="es">
<head>
	<?php 
		include("head.php"); 
	?>
</head>
<body>
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
								<span class="fas fa-bullhorn"></span> Consultar Campañas
							</button>
						</div>
						<h4><i class="fas fa-bullhorn"></i>   Campañas</h4>
					</div>
					<?php 
						include("Componentes/Modal/Buscar_Transportadoras.php");
						include("Componentes/Modal/Buscar_Seguimientos.php");
						include("Componentes/Modal/Buscar_Tipificaciones.php");
						include("Componentes/Modal/Buscar_FormasPagos.php");
						?>
					<div class="panel-body">
						<ul class="nav nav-tabs" role="tablist">
							<li class="active"><a href="#Informacion" role="tab" data-toggle="tab">Informacion</a></li>
							<li><a href="#Transportadoras" role="tab" data-toggle="tab" id="Click_Transportadoras">Transportadoras</a></li>
							<li><a href="#Seguimientos" role="tab" data-toggle="tab" id="Click_Seguimientos">Seguimientos</a></li>
							<li><a href="#FormasPagos" role="tab" data-toggle="tab" id="Click_FormasPagos">Formas de Pago</a></li>
							<li><a href="#Tipificaciones" role="tab" data-toggle="tab" id="Click_Tipificaciones">Tipificaciones</a></li>
						</ul>

						<div class="tab-content content-profile">
							<div class="tab-pane fade in active" id="Informacion">
								<form class="form-horizontal " method="post" id="Guardar_Campana" name="Guardar_Campana">
									<div id="resultados_ajax"></div>
									<input type="text" class="form-control hidden" id="EstadoC" name="EstadoC"  value="<?php echo $EstadoC; ?>" > 
									<div class="form-group col-sm-8">
				  						<label for="Numero" class="col-sm-3  control-label">Numero</label>
				  						<div class="col-sm-8 ">
				   							<input type="text" class="form-control" id="Numero" name="Numero" placeholder="Numero" value="<?php echo $Numero; ?>" <?php echo $Read; ?> required>
				  						</div>
			   						</div>
									<div class="form-group col-sm-8" >
										<label for="Nombre"  class="col-sm-3 control-label">Nombre</label>
				  						<div class="col-sm-8">
 				   							<input type="text" class="form-control" id="Nombre" name="Nombre"  placeholder="Nombre" value="<?php echo $Nombre; ?>">
				  						</div>
			   						</div> 
									<div class="form-group col-sm-8" >
					  					<label for="Contacto" class="col-sm-3 control-label">Contacto</label>
				  						<div class="col-sm-8">
 				   							<input type="text" class="form-control" id="Contacto" name="Contacto"  placeholder="Contacto" value="<?php echo $Contacto; ?>"  onkeyup="RazonSocial()">
				  						</div>
			   						</div>
									<div class="form-group col-sm-8" >
										<label for="Area" class="col-sm-3 control-label">Area</label>
										<div class="col-sm-8">
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
									<?php 
									if($EstadoC == "Nuevo"){
										echo '
										<input type="Text" class="form-control hidden" id="Estado" name="Estado" require value="Pendiente" >
										';
									} else {
										echo '
										<div class="form-group col-sm-8">
											<label for="Estado" class="col-sm-3 control-label">Estado</label>
											<div class="col-md-8 col-sm-8">
												<select class="form-control" id="Estado" name ="Estado" placeholder="Estado"  >';
											if($Estado == 'Activa'){
												echo '<option value="Activa">Activa</option>';
												echo '<option value="InActiva">InActiva</option>';
											}else{
												echo '<option value="InActiva">InActiva</option>';
												echo '<option value="Activa">Activa</option>';
											}
											echo '
												</select>
											</div>
										</div>';
									}
									?>
									<div class="form-group col-sm-8">
										<label for="Porcentaje" class="col-sm-3 control-label">Porcentaje</label>
										<div class="col-sm-8">
											<input type="number" class="form-control" id="Porcentaje" name="Porcentaje" required placeholder="Porcentaje" value="<?php echo $Porcentaje;?>"  min="0" max="100" step="0.5" onchange="UpdatePorcentaje()">
										</div>
									</div>
									<div class="form-group col-sm-8">
										<label for="Porcentaje" class="col-sm-3 control-label">Telefonica</label>
										<div class="col-sm-8">
											<?php
											if($Telefonica =='True'){
											echo'	<input type="checkbox" class="form-check-input" id="Telefonica" name="Telefonica" value="True" checked>';
											}else{
											echo'	<input type="checkbox" class="form-check-input" id="Telefonica" name="Telefonica" value="False">';

											}
											?>
  										</div>
									</div>
									<div class="form-group col-sm-8">
										<label for="Observaciones" class="col-sm-3 control-label">Observaciones:</label>
										<div class="col-sm-8">
  											<textarea class="form-control" rows="5" id="Observaciones"NAME="Observaciones" ><?php echo $Observaciones;?></textarea>
										</div>
									</div>
									<div class="col-sm-8"id="resultados_ajax2"></div>
									<hr class="style1 col-sm-8">
									<div class=" pull-right col-sm-8">
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
							<div class="tab-pane fade" id="Transportadoras">
								<?php
									if ( $_SESSION['Estado']=='Activo'){
									?>
								<button type="button" class="btn btn-default" data-toggle="modal" data-target="#AgregarTransportadora">
									<i class="fas fa-plus"></i> Agregar Transportadora
								</button>
								<?php
									}
								?>
								<br><br>
								<div id="resultados_Transportadora"></div>
								<div id="resultadosT" class='col-md-12' style="margin-top:10px"></div><!-- Carga los datos ajax -->	
							</div>
							<div class="tab-pane fade" id="Seguimientos">
								<?php
									if ( $_SESSION['Estado']=='Activo'){
									?>
								<button type="button" class="btn btn-default" data-toggle="modal" data-target="#AgregarSeguimiento">
									<i class="fas fa-plus"></i> Agregar Seguimiento
								</button>
								<?php
									}
								?>
								<br><br>
								<div id="resultados_Seguimiento"></div>
								<div id="resultadosS" class='col-md-12' style="margin-top:10px"></div><!-- Carga los datos ajax -->	
							</div>
							<div class="tab-pane fade" id="FormasPagos">
								<?php
									if ( $_SESSION['Estado']=='Activo'){
									?>
								<button type="button" class="btn btn-default" data-toggle="modal" data-target="#AgregarFormasPago">
									<i class="fas fa-plus"></i> Agregar Forma de Pago
								</button>
								<?php
									}
								?>
								<br><br>
								<div id="resultados_FormasPago"></div>
								<div id="resultadosF" class='col-md-12' style="margin-top:10px"></div><!-- Carga los datos ajax -->	
							</div>
							<div class="tab-pane fade" id="Tipificaciones">
								<?php
									if ( $_SESSION['Estado']=='Activo'){
									?>
								<button type="button" class="btn btn-default" data-toggle="modal" data-target="#AgregarTipificacion">
									<i class="fas fa-plus"></i> Agregar Tipificacion
								</button>
								<?php
									}
								?>
								<br><br>
								<div id="resultados_Tipificacion"></div>
								<div id="resultadosTr" class='col-md-12' style="margin-top:10px"></div><!-- Carga los datos ajax -->	
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
	<script type="text/javascript" src="Componentes/JavaScript/Campanas_Transportadora.js"></script>
	<script type="text/javascript" src="Componentes/JavaScript/Campanas_Seguimiento.js"></script>
	<script type="text/javascript" src="Componentes/JavaScript/Campanas_Tipificacion.js"></script>
	<script type="text/javascript" src="Componentes/JavaScript/Campanas_FormasPago.js"></script>
	
	<script>
function UpdatePorcentaje(){
if($("#Porcentaje").val()< 0){
	var p = $("#Porcentaje").val();
	document.getElementById('Porcentaje').value = p* (-1);

}
}
$( "#Cancelar" ).click(function( event ) {
	if (document.getElementById('EstadoC').value == 'Editando') {
		location.reload(true);
	}
	else{
		location.href='Consultar-Campanas.php';
	}
})
$( "#Consultar" ).click(function( event ) {
	
		location.href='Consultar-Campanas.php';

})

$( "#Click_Transportadoras" ).click(function( event ) {
	LoadT(1);
var NumeroC =$("#Numero").val();
$.ajax({
	type: "POST",
	url: "Componentes/Ajax/Agregar_Campana_Transportadora.php",
	data: "NumeroC="+NumeroC,
	beforeSend: function(objeto){
		$("#resultadosT").html("Mensaje: Cargando...");
	},success: function(datos){
		$("#resultadosT").html(datos);
	}
});

})
$( "#Click_Seguimientos" ).click(function( event ) {
	LoadS(1);

var NumeroC =$("#Numero").val();
$.ajax({
	type: "POST",
	url: "Componentes/Ajax/Agregar_Campana_Seguimiento.php",
	data: "NumeroC="+NumeroC,
	beforeSend: function(objeto){
		$("#resultadosS").html("Mensaje: Cargando...");
	},success: function(datos){
		$("#resultadosS").html(datos);
	}
});

})
$( "#Click_Tipificaciones" ).click(function( event ) {

	LoadTr(1);
var NumeroC =$("#Numero").val();
$.ajax({
	type: "POST",
	url: "Componentes/Ajax/Agregar_Campana_Tipificacion.php",
	data: "NumeroC="+NumeroC,
	beforeSend: function(objeto){
		$("#resultadosTr").html("Mensaje: Cargando...");
	},success: function(datos){
		$("#resultadosTr").html(datos);
	}
});

})
$( "#Click_FormasPagos" ).click(function( event ) {
	LoadF(1);

var NumeroC =$("#Numero").val();
$.ajax({
	type: "POST",
	url: "Componentes/Ajax/Agregar_Campana_FormasPago.php",
	data: "NumeroC="+NumeroC,
	beforeSend: function(objeto){
		$("#resultadosF").html("Mensaje: Cargando...");
	},success: function(datos){
		$("#resultadosF").html(datos);
	}
});

})


	$( "#Guardar_Campana" ).submit(function( event ) {
 var parametros = $(this).serialize();

	 $.ajax({
			type: "POST",
			url: "Componentes/Ajax/Guardar_Campana.php",
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
$("#Telefonica").click(function( event){
	if(document.getElementById("Telefonica").checked == true){
		document.getElementById('Telefonica').value= 'True';
	}else{
		document.getElementById('Telefonica').value= 'False';

	}
})

	</script>
</body>

</html>
