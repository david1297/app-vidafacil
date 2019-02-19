

<nav class="navbar navbar-default navbar-fixed-top">

			<div class="container-fluid">
				<div class="navbar-btn" >
					<button type="button" class="btn-toggle-offcanvas"><i class="fas fa-bars"></i></button>
				</div>
      <div id="logo" class="pull-left logo-ini hidden-xs"><a href="#intro" class="scrollto">
        <img src="assets/img/logo-vida-facil2.jpg" class="img-fluid" alt="" style="height: 50px;">
     </a></div>
				<div class="navbar-right">
					<div id="navbar-menu">
						<ul class="nav navbar-nav">
							<!--<li class="dropdown">
								<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
								<i class="far fa-bell"></i>
									<span class="notification-dot"></span>
								</a>
								<ul class="dropdown-menu notifications">
									<li class="header"><strong>Tiene 7 Notificaciones</strong></li>
									<li>
										<a href="#">
											<div class="media">
												<div class="media-left">
													<i class="fa fa-fw fa-flag-checkered text-muted"></i>
												</div>
												<div class="media-body">
													<p class="text">Tu campaña <strong>Venta de vacaciones</strong> está comenzando a involucrar a clientes potenciales.</p>
													<span class="timestamp">Hace 24 minutos</span>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="media">
												<div class="media-left">
													<i class="fa fa-fw fa-exclamation-triangle text-warning"></i>
												</div>
												<div class="media-body">
													<p class="text">Campaña <strong>Venta de vacaciones</strong> está a punto de alcanzar el límite presupuestario.</p>
													<span class="timestamp">Hace 2 Horas</span>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="media">
												<div class="media-left">
													<i class="fa fa-fw fa-bar-chart text-muted"></i>
												</div>
												<div class="media-body">
													<p class="text">Las visitas al sitio web de Facebook son un 27% más altas que la semana pasada.</p>
													<span class="timestamp">Ayer</span>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="media">
												<div class="media-left">
													<i class="fa fa-fw fa-check-circle text-success"></i>
												</div>
												<div class="media-body">
													<p class="text">Tu campaña <strong>Venta de vacaciones</strong> esta aprobado.</p>
													<span class="timestamp">Hace 2 Dias</span>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="media">
												<div class="media-left">
													<i class="fa fa-fw fa-exclamation-circle text-danger"></i>
												</div>
												<div class="media-body">
													<p class="text">Error en las configuraciones analíticas del sitio web</p>
													<span class="timestamp">Hace 3 Dias</span>
												</div>
											</div>
										</a>
									</li>
									<li class="footer"><a href="#" class="more">Ver todas las notificaciones</a></li>
								</ul>
							</li>-->
							<li class="dropdown">
								<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
								<i class="fas fa-user-cog"></i>
								</a>
								<ul class="dropdown-menu user-menu menu-icon">
									<li class="menu-heading">CONFIGURACIONES DE LA CUENTA</li>
									<!--<li><a href="#"><i class="fa fa-fw fa-bell"></i> <span>Notificaciones</span></a></li>-->
									<li><a href="Usuarios.php?Nit=<?php echo $_SESSION['Nit'];?>&Perfil=Si"><i class="fas fa-sliders-h"></i> <span>Preferencias</span></a></li>
									<li><a href="login.php?logout"><i class="fa fa-fw fa-sign-out-alt"></i> <span>Cerrar Sesion</span></a></li>
								</ul>
							</li>
					</div>
				</div>
			</div>
		</nav>
		<div id="left-sidebar" class="sidebar">
			<button type="button" class="btn btn-xs btn-link btn-toggle-fullwidth" id="boton">
				<span class="sr-only">Toggle Fullwidth</span>
				<i class="fa fa-angle-left"></i>
			</button>
			<div class="sidebar-scroll">
				<div class="user-account">
			
				</div>
				<nav id="left-sidebar-nav" class="sidebar-nav">
					<ul id="main-menu" class="metismenu">
					<!--<i class="fas fa-cogs"></i> <i class="fas fa-dolly"></i> -->
						<li class="<?php echo $Inicio;?>"><a href="index.php"><i class="fas fa-home"></i> <span>Inicio</span></a></li>
						<li class="<?php echo $Administracion;?>"><a href="Administracion.php"><i class="fab fa-jedi-order"></i> <span>Administracion</span></a></li>
						<li class="<?php echo $Afiliados;?>"><a href="Consultar-Afiliados.php"><i class="fas fa-user-tie"></i><span>Afiliados</span></a></li>
						<!--<li class="<?php echo $Contabilidad;?>"><a href="#"><i class="fas fa-book"></i> <span>Contabilidad</span></a></li>-->
						<!--<li class="<?php echo $Transacciones;?>"><a href="#"><i class="fas fa-exchange-alt"></i>  <span>Transacciones</span></a></li>-->
						<li class="<?php echo $Ventas;?>"><a href="Consultar-Ventas.php"><i class="fas fa-shopping-cart"></i>  <span>Ventas</span></a></li>
						<li class="<?php echo $Campanas;?>"><a href="Consultar-Campanas.php"><i class="fas fa-bullhorn"></i>  <span>Campañas</span></a></li>
						
						
						<li class="<?php echo $Usuarios;?>"><a href="Consultar-Usuarios.php"><i class="fas fa-users"></i>  <span>Usuarios</span></a></li>
						
					</ul>
				</nav>
				
			</div>
		</div>