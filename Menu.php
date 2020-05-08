<?php

require_once ("config/db.php");
require_once ("config/conexion.php");

?>

<nav class="navbar navbar-default navbar-fixed-top">

    <div class="container-fluid">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-offcanvas"><i class="fas fa-bars"></i></button>
        </div>
        <div id="logo" class="pull-left logo-ini hidden-xs"><a href="#intro" class="scrollto">
                <img src="assets/img/BP1.png" class="img-fluid" alt="" style="height: 50px;">
            </a></div>
        <div class="navbar-right">
            <div id="navbar-menu">
                <ul class="nav navbar-nav">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                            <i class="fas fa-user-cog"></i>
                        </a>
                        <ul class="dropdown-menu user-menu menu-icon">
                            <li class="menu-heading">CONFIGURACIONES DE LA CUENTA</li>
                            <!--<li><a href="#"><i class="fa fa-fw fa-bell"></i> <span>Notificaciones</span></a></li>-->
                            <li><a href="Usuarios.php?Nit=<?php echo $_SESSION['Nit'];?>&Perfil=Si"><i
                                        class="fas fa-sliders-h"></i> <span>Preferencias</span></a></li>
                            <li><a href="login.php?logout"><i class="fa fa-fw fa-sign-out-alt"></i> <span>Cerrar
                                        Sesion</span></a></li>
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
        <nav id="left-sidebar-nav" class="sidebar-nav">
            <ul id="main-menu" class="metismenu">
                <?php
				if( $_SESSION['Rol']<>'1'){
				?>
                <li class="<?php echo $Inicio;?>" style="padding-bottom: 0px;"><a href="index.php"><i class="fas fa-home"></i><span>Inicio</span></a>
                </li>
                <?php

	        $query1=mysqli_query($con, 'SELECT Modulo,Estado FROM PERMISOS where Permiso="Ingreso" AND Usuario ="'.$_SESSION['Nit'].'" AND MODULO ="Usuarios" order by Modulo ;');							
		$rw_Admin1=mysqli_fetch_array($query1);
                if($rw_Admin1['Estado']=='true'){
                        ?>
                        <li class="<?php echo $Usuarios;?>" style="padding-bottom: 0px;">
		                <a href="#uiElements" class="has-arrow" aria-expanded="false"><i class="fas fa-users"></i><span>Usuarios</span></a>				<ul aria-expanded="">
                                <?PHP
                                $query1=mysqli_query($con, 'SELECT Modulo,Estado FROM PERMISOS where Permiso="Crear" AND Usuario ="'.$_SESSION['Nit'].'" AND MODULO ="Usuarios" order by Modulo ;');							
                                $rw_Admin1=mysqli_fetch_array($query1);
                                if($rw_Admin1['Estado']=='true'){
                                ?>
                                <li class=""><a href="Usuarios.php"><i class="fas fa-user-plus"></i>Nuevo</a></li>
                                <?PHP
                                }  
                                ?><li class=""><a href="Consultar-Usuarios.php"><i class="fab fa-searchengin"></i>Consultar</a></li><?PHP
                                $query1=mysqli_query($con, 'SELECT Modulo,Estado FROM PERMISOS where Permiso="CuentaVirtual" AND Usuario ="'.$_SESSION['Nit'].'" AND MODULO ="Usuarios" order by Modulo ;');							
                                $rw_Admin1=mysqli_fetch_array($query1);
                                if($rw_Admin1['Estado']=='true'){
                                ?><li class=""><a href="Consultar-CuentaGeneral.php"><i class="fas fa-credit-card"></i>Cuenta Virtual</a></li><?PHP
                                }   
				?>
			        </ul>
		        </li>
                        <?php
                }
                $query1=mysqli_query($con, 'SELECT Modulo,Estado FROM PERMISOS where Permiso="Ingreso" AND Usuario ="'.$_SESSION['Nit'].'" AND MODULO ="Transacciones" order by Modulo ;');							
		$rw_Admin1=mysqli_fetch_array($query1);
                if($rw_Admin1['Estado']=='true'){
                        ?>
                        <li class="<?php echo $Ventas;?>" style="padding-bottom: 0px;">
                        <a href="#uiElements" class="has-arrow" aria-expanded="false"><i class="fas fa-shopping-cart"></i><span>Trasacciones</span></a>					<ul aria-expanded="">
                                <?PHP
                                $query1=mysqli_query($con, 'SELECT Modulo,Estado FROM PERMISOS where Permiso="Crear" AND Usuario ="'.$_SESSION['Nit'].'" AND MODULO ="Transacciones" order by Modulo ;');							
                                $rw_Admin1=mysqli_fetch_array($query1);
                                if($rw_Admin1['Estado']=='true'){
                                ?>
                                <li class=""><a href="Ventas.php"><i class="fas fa-cart-plus"></i>Nueva</a></li>
                                <?PHP
                                }  
                                
                                $query1=mysqli_query($con, 'SELECT Modulo,Estado FROM PERMISOS where Permiso="Consultar" AND Usuario ="'.$_SESSION['Nit'].'" AND MODULO ="Transacciones" order by Modulo ;');							
                                $rw_Admin1=mysqli_fetch_array($query1);
                                if($rw_Admin1['Estado']=='true'){
                                ?><li class=""><a href="Consultar-Ventas.php"><i class="fab fa-searchengin"></i>Consultar</a></li><?PHP
                                }   
				?>
			        </ul>
		        </li>
                        <?php
                }
                $query1=mysqli_query($con, 'SELECT Modulo,Estado FROM PERMISOS where Permiso="Ingreso" AND Usuario ="'.$_SESSION['Nit'].'" AND MODULO ="Ajustes" order by Modulo ;');							
		$rw_Admin1=mysqli_fetch_array($query1);
                if($rw_Admin1['Estado']=='true'){
                        ?>
                         <li class="<?php echo $Ajustes;?>" style="padding-bottom: 0px;">
                         <a href="#uiElements" class="has-arrow" aria-expanded="false"><i class="fas fa-cogs"></i> <span>Ajustes</span></a>					<ul aria-expanded="">
                                <?PHP
                                $query1=mysqli_query($con, 'SELECT Modulo,Estado FROM PERMISOS where Permiso="Crear" AND Usuario ="'.$_SESSION['Nit'].'" AND MODULO ="Ajustes" order by Modulo ;');							
                                $rw_Admin1=mysqli_fetch_array($query1);
                                if($rw_Admin1['Estado']=='true'){
                                ?>
                                <li class=""><a href="Ajustes.php"><i class="fas fa-cart-plus"></i>Nuevo</a></li>
                                <?PHP
                                }  
                                
                                $query1=mysqli_query($con, 'SELECT Modulo,Estado FROM PERMISOS where Permiso="Consultar" AND Usuario ="'.$_SESSION['Nit'].'" AND MODULO ="Ajustes" order by Modulo ;');							
                                $rw_Admin1=mysqli_fetch_array($query1);
                                if($rw_Admin1['Estado']=='true'){
                                ?><li class=""><a href="Consultar-Ajustes.php"><i class="fab fa-searchengin"></i>Consultar</a></li><?PHP
                                }   
				?>
			        </ul>
		        </li>
                        <?php
                }
                $query1=mysqli_query($con, 'SELECT Modulo,Estado FROM PERMISOS where Permiso="Ingreso" AND Usuario ="'.$_SESSION['Nit'].'" AND MODULO ="Campanas" order by Modulo ;');							
		$rw_Admin1=mysqli_fetch_array($query1);
                if($rw_Admin1['Estado']=='true'){
                        ?>
                         <li class="<?php echo $Campanas;?>" style="padding-bottom: 0px;">
                         <a href="#uiElements" class="has-arrow" aria-expanded="false"><i class="fas fa-bullhorn"></i><span>Campañas</span></a>					<ul aria-expanded="">
                                <?PHP
                                $query1=mysqli_query($con, 'SELECT Modulo,Estado FROM PERMISOS where Permiso="Crear" AND Usuario ="'.$_SESSION['Nit'].'" AND MODULO ="Campanas" order by Modulo ;');							
                                $rw_Admin1=mysqli_fetch_array($query1);
                                if($rw_Admin1['Estado']=='true'){
                                ?>
                                <li class=""><a href="Campanas.php"><i class="fas fa-plus-square"></i>Nueva</a></li>
                                <?PHP
                                }  
                                
                                $query1=mysqli_query($con, 'SELECT Modulo,Estado FROM PERMISOS where Permiso="Consultar" AND Usuario ="'.$_SESSION['Nit'].'" AND MODULO ="Campanas" order by Modulo ;');							
                                $rw_Admin1=mysqli_fetch_array($query1);
                                if($rw_Admin1['Estado']=='true'){
                                ?><li class=""><a href="Consultar-Campanas.php"><i class="fab fa-searchengin"></i>Consultar</a></li><?PHP
                                }   
				?>
			        </ul>
		        </li>
                        <?php
                }
                $query1=mysqli_query($con, 'SELECT Modulo,Estado FROM PERMISOS where Permiso="Ingreso" AND Usuario ="'.$_SESSION['Nit'].'" AND MODULO ="Afiliados" order by Modulo ;');							
		$rw_Admin1=mysqli_fetch_array($query1);
                if($rw_Admin1['Estado']=='true'){
                        ?>
                         <li class="<?php echo $Afiliados;?>" style="padding-bottom: 0px;">
                                <a href="Consultar-Afiliados.php"><i class="fas fa-user-tie"></i><span>Afiliados</span></a>
                        </li>  
                        <?php
                }
                $query1=mysqli_query($con, 'SELECT Modulo,Estado FROM PERMISOS where Permiso="Ingreso" AND Usuario ="'.$_SESSION['Nit'].'" AND MODULO ="Contabilidad" order by Modulo ;');							
		$rw_Admin1=mysqli_fetch_array($query1);
                if($rw_Admin1['Estado']=='true'){
                        ?>
                         <li class="<?php echo $Contabilidad;?>">
                                <a href="Consultar-Contabilidad.php"><i class="fas fa-book"></i><span>Contabilidad</span></a>
                        </li> 
                        <?php
                }
                $query1=mysqli_query($con, 'SELECT Modulo,Estado FROM PERMISOS where Permiso="Ingreso" AND Usuario ="'.$_SESSION['Nit'].'" AND MODULO ="CuentaVirtual" order by Modulo ;');							
		$rw_Admin1=mysqli_fetch_array($query1);
                if($rw_Admin1['Estado']=='true'){
                        ?>
                         <li class="<?php echo $Cuenta;?>" style="padding-bottom: 0px;">
                                <a href="Consultar-Cuenta.php?Nit=<?php echo $_SESSION['Nit'];?>"><i class="fas fa-id-card"></i><span>Cuenta Virtual</span></a>
                        </i>
                        <?php
                }
                $query1=mysqli_query($con, 'SELECT Modulo,Estado FROM PERMISOS where Permiso="Ingreso" AND Usuario ="'.$_SESSION['Nit'].'" AND MODULO ="Transferencias" order by Modulo ;');							
		$rw_Admin1=mysqli_fetch_array($query1);
                if($rw_Admin1['Estado']=='true'){
                        ?>
                         <li class="<?php echo $Transferencias;?>" style="padding-bottom: 0px;">
                                <a href="Consultar-Transferencias.php"><i class="fas fa-exchange-alt"></i><span>Transferencias</span></a>
                        </li>
                        <?php
                }
                $query1=mysqli_query($con, 'SELECT Modulo,Estado FROM PERMISOS where Permiso="Ingreso" AND Usuario ="'.$_SESSION['Nit'].'" AND MODULO ="Directorio" order by Modulo ;');							
		$rw_Admin1=mysqli_fetch_array($query1);
                if($rw_Admin1['Estado']=='true'){
                        ?>
                        <li class="<?php echo $Directorio;?>"style="padding-bottom: 0px;">
                <a href="Consultar-Directorio.php"><i class="fas fa-atlas"></i><span>Directorio</span></a>
        </li> 
                        <?php
                }
                
                
                
		                				
                         
               
		               			
                          

                
              
		?>
                <!--<i class="fas fa-cogs"></i> <i class="fas fa-dolly"></i> -->
                <?php
	        }else{
		        ?>
                        <li class="<?php echo $Inicio;?>"style="padding-bottom: 0px;">
                                <a href="index.php"><i class="fas fa-home"></i><span>Inicio</span></a>
                        </li>
                        <li class="<?php echo $Administracion;?>">
                                <a href="Administracion.php"><i class="fab fa-jedi-order"></i><span>Administracion</span></a>
                        </li>
                        <li class="<?php echo $Usuarios;?>"style="padding-bottom: 0px;">
		                <a href="#uiElements" class="has-arrow" aria-expanded="false"><i class="fas fa-users"></i><span>Usuarios</span></a>				
                                <ul aria-expanded="">
                                        <li class=""><a href="Usuarios.php"><i class="fas fa-user-plus"></i>Nuevo</a></li>
				        <li class=""><a href="Consultar-Usuarios.php"><i class="fab fa-searchengin"></i>Consultar</a></li>
				        <li class=""><a href="Consultar-CuentaGeneral.php"><i class="fas fa-credit-card"></i>Cuenta Virtual</a></li>
			        </ul>
		        </li>
                        <li class="<?php echo $Ventas;?>"style="padding-bottom: 0px;">
		                <a href="#uiElements" class="has-arrow" aria-expanded="false"><i class="fas fa-shopping-cart"></i><span>Trasacciones</span></a>				
                                <ul aria-expanded="">
                                        <li class=""><a href="Ventas.php"><i class="fas fa-cart-plus"></i>Nueva</a></li>
				        <li class=""><a href="Consultar-Ventas.php"><i class="fab fa-searchengin"></i>Consultar</a></li>
			        </ul>
		        </li> 
                        <li class="<?php echo $Ajustes;?>"style="padding-bottom: 0px;">
		                <a href="#uiElements" class="has-arrow" aria-expanded="false"><i class="fas fa-cogs"></i> <span>Ajustes</span></a>				
                                <ul aria-expanded="">
                                        <li class=""><a href="Ajustes.php"><i class="fas fa-cart-plus"></i>Nuevo</a></li>
				        <li class=""><a href="Consultar-Ajustes.php"><i class="fab fa-searchengin"></i>Consultar</a></li>
			        </ul>
		        </li>  
                        <li class="<?php echo $Campanas;?>" style="padding-bottom: 0px;">
		                <a href="#uiElements" class="has-arrow" aria-expanded="false"><i class="fas fa-bullhorn"></i><span>Campañas</span></a>				
                                <ul aria-expanded="">
                                        <li class=""><a href="Campanas.php"><i class="fas fa-plus-square"></i>Nueva</a></li>
				        <li class=""><a href="Consultar-Campanas.php"><i class="fab fa-searchengin"></i>Consultar</a></li>
			        </ul>
		        </li>  
                        <li class="<?php echo $Afiliados;?>"style="padding-bottom: 0px;">
                                <a href="Consultar-Afiliados.php"><i class="fas fa-user-tie"></i><span>Afiliados</span></a>
                        </li>                             
                        <li class="<?php echo $Contabilidad;?>"style="padding-bottom: 0px;">
                                <a href="Consultar-Contabilidad.php"><i class="fas fa-book"></i><span>Contabilidad</span></a>
                        </li>
                        <li class="<?php echo $Cuenta;?>"style="padding-bottom: 0px;">
                                <a href="Consultar-Cuenta.php?Nit=<?php echo $_SESSION['Nit'];?>"><i class="fas fa-id-card"></i><span>Cuenta Virtual</span></a>
                        </i>
                        <li class="<?php echo $Transferencias;?>"style="padding-bottom: 0px;">
                                <a href="Consultar-Transferencias.php"><i class="fas fa-exchange-alt"></i><span>Transferencias</span></a>
                        </li> 
                        <li class="<?php echo $Directorio;?>"style="padding-bottom: 0px;">
                                <a href="Consultar-Directorio.php"><i class="fas fa-atlas"></i><span>Directorio</span></a>
                        </li> 
                                 
                <?php	
						}
					?>


            </ul>
        </nav>

    </div>
</div>