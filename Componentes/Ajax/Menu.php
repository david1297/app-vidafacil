<div id="preloder">
        <div class="loader"></div>
    </div>
    <a href="https://api.whatsapp.com/send?phone=573054232363&text=Hola%2C%20necesito%20m%C3%A1s%20informaci%C3%B3n." class="float" target="_blank"><i class="fa fa-whatsapp my-float"></i></a>
    <a href="#" class="float-Card d-block d-sm-block d-md-none" id="cartM"><i class="fa fa-shopping-cart"></i> 
                            <span class="badge" id="cardNM">3</span></a>
    
    
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__search">
            <i class="fa fa-search search-switch"></i>
        </div>
        <div class="offcanvas__logo">
            <a href="./"><img src="img/logo.png"></a>
        </div>
        <nav class="offcanvas__menu mobile-menu">
            <ul>
                <li><a href="./">Inicio</a></li>
                <li><a >Tienda</a>
                    <ul class="dropdown">
                        <?php
                        $sql="select * from Categorias WHERE Estado='Activa';";
                        $query1=mysqli_query($con, $sql);
                        while($rw_Admin1=mysqli_fetch_array($query1)){
                            if($rw_Admin1['Tipo']==1){
                                ?>
                                <li><a href="Tienda.php?Categoria=<?php echo $rw_Admin1['Id']?>"><?php echo $rw_Admin1['Nombre']?></a></li>   
                                <?php
                            }
                            if($rw_Admin1['Tipo']==2){
                                ?>
                                <li><a href="Poster.php?Categoria=<?php echo $rw_Admin1['Id']?>"><?php echo $rw_Admin1['Nombre']?></a></li>   
                                <?php
                            }
                            if($rw_Admin1['Tipo']==3){
                                ?>
                                <li><a href="<?php echo $rw_Admin1['Url']?>" target="_blank"><?php echo $rw_Admin1['Nombre']?></a></li>   
                                <?php
                            }
                        }
                        ?>
                        <li><a href="Tienda.php?Descuento=Si">Descuentos</a></li>   
                    </ul>
                </li>
                <li class="active"><a >Servicios</a>
                    <ul class="dropdown">
                        <li><a href="sol-portafolio">Portafolio Soluciones Vida Fácil</a></li>
                        <li><a href="viajes">Viaja Con Nosotros</a></li>
                        <li><a href="afiliacion">Afilia Tu Marca</a></li>
                        <li><a href="sol-empresarial">Soluciones Empresariales</a></li>
                        <li><a href="sol-familiar">Soluciones Hogar</a></li>
                        <li><a href="membresia">Membresias</a></li>
                    </ul>
                </li>
                <li><a href="cursos">Cursos</a></li>
                <li><a href="puntos">Puntos SVF</a></li>
                <li><a href="contacto">Contacto</a></li>
                <li><a href="forms/BENEFICIOS.pdf" >Beneficios <i class="fas fa-download"></i></a></li>
                <li><a href="videos" id="cartM">Videos</a></li>
                

                            <?php
                            if (!isset($_SESSION['Correo']) ) {
                                ?>
                                 <li><a href="#" data-toggle="modal" data-target="#Login"><img src="img/User.png" alt="" style="width: 2rem;">&nbsp;Iniciar</a></li>
                                 <?php
                            }else{
                                ?>
                                <li><a style="color: #fff;"><img src="img/User.png" alt="" style="width: 2rem;">&nbsp;<?php echo @$_SESSION['Correo']?></a>
                                    <ul class="dropdown" style="top: 0px;"> 
                                        <li><a href="Datos.php">Datos</a></li>
                                        <li><a href="Pedidos.php">Pedidos</a></li>
                                        <li><a href="Cerrar.php">Cerrar Sesion</a></li>
                                    </ul>
                                </li>
                            <?php
                            }
                            ?>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__social">
            <a href="https://www.zonapagos.net/t_Solucionesvidafacil/pagos.asp" target="_blank" ><i class="icon_header"><img src="img/Pse.png"></i></a>         
        </div>
    </div>

                   
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="./"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-9">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="./">Inicio</a></li>
                            <li><a style="color: #fff;">Tienda</a>
                                <ul class="dropdown">
                                <?php
                                $sql="select * from Categorias WHERE Estado='Activa';";
                                $query1=mysqli_query($con, $sql);
                                while($rw_Admin1=mysqli_fetch_array($query1)){
                                    if($rw_Admin1['Tipo']==1){
                                        ?>
                                        <li><a href="Tienda.php?Categoria=<?php echo $rw_Admin1['Id']?>"><?php echo $rw_Admin1['Nombre']?></a></li>   
                                        <?php
                                    }
                                    if($rw_Admin1['Tipo']==2){
                                        ?>
                                        <li><a href="Poster.php?Categoria=<?php echo $rw_Admin1['Id']?>"><?php echo $rw_Admin1['Nombre']?></a></li>   
                                        <?php
                                    }
                                    if($rw_Admin1['Tipo']==3){
                                        ?>
                                        <li><a href="<?php echo $rw_Admin1['Url']?>" target="_blank"><?php echo $rw_Admin1['Nombre']?></a></li>   
                                        <?php
                                    }
                                }
                                ?>
                                <li><a href="Tienda.php?Descuento=Si">Descuentos</a></li>   
                                </ul>
                            </li>

                            <li><a style="color: #fff;">Servicios</a>
                                <ul class="dropdown">
                                    <li><a href="sol-portafolio">PORTAFOLIO SOLUCIONES VIDA FÁCIL</a></li>
                                        <li><a href="viajes">VIAJA CON NOSOTROS</a></li>
                                        <li><a href="afiliacion">AFILIA TU MARCA</a></li>
                                        <li><a href="sol-empresarial">SOLUCIONES EMPRESARIALES</a></li>
                                        <li><a href="sol-familiar">SOLUCIONES HOGAR</a></li>
                                        <li><a href="membresia">MEMBRESIAS</a></li>
                                </ul>
                            </li>
                            <li><a href="cursos">CURSOS</a></li>
                            <li><a href="puntos">PUNTOS SVF</a></li>
                            <li><a href="contacto">CONTACTO</a></li>
                            <li><a href="forms/BENEFICIOS.pdf" >Beneficios <i class="fas fa-download"></i></a></li>
                            <li><a href="videos">Videos</a></li>
                            
                            
                            <li><a href="#" id="cart"><i class="fa fa-shopping-cart"></i> 
                            <span class="badge" id="cardN">3</span></a></li>

                            <?php
                            if (!isset($_SESSION['Correo']) ) {
                                ?>
                                 <li><a href="#" data-toggle="modal" data-target="#Login"><img src="img/User.png" alt="" style="width: 2rem;">&nbsp;Iniciar</a></li>
                                 <?php
                            }else{
                                ?>
                                <li><a style="color: #fff;"><img src="img/User.png" alt="" style="width: 2rem;">&nbsp;<?php echo @$_SESSION['Correo']?></a>
                                    <ul class="dropdown" style="top: 45px;"> 
                                        <li><a href="Datos.php">Datos</a></li>
                                        <li><a href="Pedidos.php">Pedidos</a></li>
                                        <li><a href="Cerrar.php">Cerrar Sesion</a></li>
                                    </ul>
                                </li>
                            <?php
                            }
                            ?>
                           

                            
                            
                        </ul>
                        
                    </nav>
                </div>
                <div class="col-lg-1">
                    <div class="header__right">
                       <a href="https://www.zonapagos.net/t_Solucionesvidafacil/pagos.asp" target="_blank" ><i class="icon_header"><img src="img/Pse.png"></i></a>
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <span class="fa fa-bars"></span>
            </div>
        </div>
    </header>
    <style>
 
</style>
    
  <div class="shopping-cart" id="CarritoLg">
    

   
  </div>
  <?php include("Admin/Modal/Login.php")?>
  <?php include("Admin/Modal/Registro.php")?>
