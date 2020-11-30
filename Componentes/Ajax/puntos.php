<?php
session_start();
$Id=session_id();
require_once ("config/db.php");
require_once ("config/conexion.php");
?>
<!DOCTYPE html>
<html lang="zxx">

    <head>
        <?php include("Head.php")?> 
       
    <script src="//widget.manychat.com/970840273108911.js" async="async"></script>


    </head>

<body class="fondo4">
<?php include("Menu.php")?>
    <div class="container cont-punto">
        <section>
            <div class="hero-slider">
                    <div class="single-hero-item set-bg">
                      <img src="img/banner/puntos.png" alt="">
                    </div>
            </div>

            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="blog__details__content">
                            <br>
                            <div class="col-lg-12 section-title" style="text-align: center;"> 
                                <h2 style=" color: #F70076;"><i class="fas fa-gifts"></i> Tus compras se transforman en puntos <i class="fas fa-gift"></i></h2>
                               <br>
                                <h1><i class="fas fa-plane-departure"></i> COMPRA ONLINE, VIAJA NACIONAL O INTERNACIONAL, ACUMULA Y REDIME PUNTOS CON SOLUCIONES VIDA FACIL</i></h1>
                            </div>
                            <div class="blog__details__text">

                                <p><i class="fas fa-info-circle"></i> para poder hacer la redención de los Puntos SVF que hayas acumulado debes contactarte con nuestros medios de atención.</p>
                                <p><i class="fas fa-donate"></i> Si tienes puntos suficientes para redimir el total de tu compra, recibirás una notificación en el celular, en la que se te indicará cuántos puntos puedes redimir.</p>
                                
                                <p><i class="fas fa-hand-holding-heart"></i> Puntos por comprar. $1=1 punto.</p>
        
                                <p><i class="fas fa-hand-holding-heart"></i> Eventos de compras solo para miembros.</p>
        
                                 <p><i class="fas fa-hand-holding-heart"></i> Gana Puntos cada vez que compres.</p>
                                     
                                <p><i class="fas fa-hand-holding-heart"></i> Usa tus Puntos en experiencias.</p>
                                        
                                <p><i class="fas fa-hand-holding-heart"></i> Acumula puntos por cada compra que realices.</p>
                            </div>
                            
                            <div class="col-lg-12 section-title" style="text-align:center;"> 
                                <h2 style="color: #013D6C;"><i class="fas fa-cash-register"></i> Registrando tus facturas podrás recuperar un % del valor pagado en tus compras. <i class="fas fa-hand-holding-usd"></i></h2>
                               </div>   
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    </div>

    <div class="afiliacion">
        <a href="mb-viajes">
            <img src="img/afiliacion.png" alt="">
        </a> 
    </div> 
    <?php include("Footer.php")?>
    <script src="js/flexiproduct.js"></script>
</body>

</html>