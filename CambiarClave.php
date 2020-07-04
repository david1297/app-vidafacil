<?php
session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
	}
	
	require_once ("config/db.php");
	require_once ("config/conexion.php");
?>
<!doctype html>
<html lang="es">
<head>
	<?php 
		include("head.php"); 
		
	?>
</head>
<body>
	<div class="" id="CambiarPass"  aria-labelledby="CambiarPass">	
	  	<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Cambiar contraseña</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" method="post" id="editar_password" name="editar_password">
						<div id="resultados_ajax3"></div>
						<div class="form-group">
							<label for="user_password_new3" class="col-sm-4 control-label">Nueva contraseña</label>
							<div class="col-sm-8">
								<input type="password" class="form-control" id="user_password_new3" name="user_password_new3" placeholder="Nueva contraseña" pattern=".{6,}" title="Contraseña ( min . 6 caracteres)" required>
								<input type="hidden" id="user_id_mod" name="user_id_mod" value="<?php echo $_SESSION['Nit']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="user_password_repeat3" class="col-sm-4 control-label">Repite contraseña</label>
							<div class="col-sm-8">
								<input type="password" class="form-control" id="user_password_repeat3" name="user_password_repeat3" placeholder="Repite contraseña" pattern=".{6,}" required>
							</div>
						</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary" id="actualizar_datos3">Cambiar contraseña</button>
				</div>
					</form>
			</div>
		</div>
	</div> 

    <script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/metisMenu/metisMenu.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
	<script src="assets/scripts/common.js"></script>
	<script type="text/javascript" src="Componentes/JavaScript/Campanas_Usuario.js"></script>
	<script type="text/javascript" src="Componentes/JavaScript/Permisos.js"></script>
    <script>
    $( "#editar_password" ).submit(function( event ) {
  $('#actualizar_datos3').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "Componentes/Ajax/editar_passwordI.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax3").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax3").html(datos);
		

            var Res = datos.split('*');
					if(Res[1]=='Correcto'){
						
						 $("#resultados_ajax3").html(Res[3]);
                         location.href="index.php";
						 
					}else{
						$("#resultados_ajax3").html(datos);
					}
                    $('#actualizar_datos3').attr("disabled", false);
  
		  }
	});
  event.preventDefault();
})
</script>
</body>
   