<html>
<body>
	

<?php

include('is_logged.php');
$session_id= session_id();

if (isset($_GET['Modulo'])){$Modulo=$_GET['Modulo'];}
if (isset($_GET['Usuario'])){$Usuario=$_GET['Usuario'];}

require_once ("../../config/db.php");
require_once ("../../config/conexion.php");

									$query1=mysqli_query($con, "select * from Permisos where Usuario ='".$Usuario."' and Modulo='".$Modulo."' ");
									$h="";
									while($rw_Admin1=mysqli_fetch_array($query1)){
										
										echo'<div class="form-group row">
													<label for="inputPassword" class="col-sm-2 col-form-label">
														'.$rw_Admin1['Permiso'].'
													</label>
													<div class="col-sm-10">
											
													';
										if($rw_Admin1['Estado']=='true'){
											echo '<input type="checkbox"id ="'.$rw_Admin1['Modulo'].'_'.$rw_Admin1['Permiso'].'" checked class="Boton" data-toggle="toggle" data-on="Activo" data-off="InActivo	" data-width="100" '.$h.'>
												';	
										}else{
											echo '<input type="checkbox"id ="'.$rw_Admin1['Modulo'].'_'.$rw_Admin1['Permiso'].'"  class="Boton" data-toggle="toggle" data-on="Activo" data-off="InActivo	" data-width="100" '.$h.'>
													';
										}
										echo '
										<span id="loader_'.$rw_Admin1['Modulo'].'_'.$rw_Admin1['Permiso'].'"></span>
										</div>
									</div><hr>';
									if($rw_Admin1['Permiso']=='Ingreso'){
										echo '<div class="card">';
										if($rw_Admin1['Estado']=='true'){
										echo'
										<div class="card-body" id="'.$rw_Admin1['Modulo'].'">';	
										}else{
											$h="disabled";
											echo'
											<div class="card-header" id="'.$rw_Admin1['Modulo'].'">';	
										}

									}
									}
								echo'	
							
								</div>
	
	</div>
	

		';
								?>
	<script type="text/javascript" src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script>
 $('.Boton').change(function() {

var Id=$(this).attr("id");

var Cadena = Id.split("_");	
var Modulo = Cadena[0];
var Permiso = Cadena[1];
var Usuario = $("#Nit").val();
var Valor = $(this).prop('checked');

$.ajax({
type: "POST",
	url: "Componentes/Ajax/Actualizar_Permisos.php",
data: "Modulo="+Modulo+"&Permiso="+Permiso+"&Usuario="+Usuario+"&Valor="+Valor,
beforeSend: function(objeto){
	$('#loader_'+Id).html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
},success: function(datos){
	$('#loader_'+Id).html(datos);


		
}
});

})</script>	

								</body>	</html>