<?php

require_once("config/db.php");
require_once("classes/Login.php");
require_once ("config/conexion.php");
$login = new Login();
if ($login->isUserLoggedIn() == true) {
   header("location: index.php");

} else {
    ?>
<!doctype html>
<html lang="es" class="fullscreen-bg">

<head>
	<?php include("head.php");?>
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box">
					<div class="content">
						<div class="header">
						<div class="text-center"><img src="assets/img/BP.png" class="img-fluid " alt="Responsive image" ></div>
							<p class="lead">Ingrese a su cuenta</p>
						</div>
						<form method="post" accept-charset="utf-8" action="login.php" name="loginform" autocomplete="off" role="form" class="form-signin">
							<?php
				if (isset($login)) {
					if ($login->errors) {
						?>
						<div class="alert alert-danger alert-dismissible" role="alert">
						    <strong>Error!</strong> 
						
						<?php 
						foreach ($login->errors as $error) {
							echo $error;
						}
						?>
						</div>
						<?php
					}
					if ($login->messages) {
						?>
						<div class="alert alert-success alert-dismissible" role="alert">
						    <strong>Aviso!</strong>
						<?php
						foreach ($login->messages as $message) {
							echo $message;
						}
						?>
						</div> 
						<?php 
					}
				}
				?>
							<div class="form-group">
								<label for="signin-email" class="control-label sr-only">Nit</label>
								<input type="Text" class="form-control" id="signin-email" name="user_name" value="1112492933" placeholder="Nit o Numero de Documento" autofocus="" required>
							</div>
							<div class="form-group">
								<label for="signin-password" class="control-label sr-only">Contraseña</label>
								<input type="password" class="form-control" id="signin-password" value="Admin123" placeholder="Contraseña" name="user_password" autocomplete="off" required>
							</div>
							<button type="submit" class="btn btn-primary btn-lg btn-block" name="login" id="submit">INICIAR SESIÓN</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
	<?php
}