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

<body class="fondo" style="height: 920px;">
<?php include("Menu.php")?>
    <section class="application-form pricing--page spad" style="padding-top: 30px;padding-bottom: 30px;">
        <div class="container memb-center d-flex justify-content-center align-items-center" > 
            <div class="application__form__content" style="width: 400px; border-radius:10px;">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title center-title">           
                            <h2>Membresias</h2>
                            <span>la solucion para todo</span>
                        </div>
                    </div>
                </div>
                <form action="#">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-6">
                            <a  class="memb-btn second-bg" href='mb-viajes' >viaja con Nosotros</a>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-6">
                            <a  class="memb-btn" href='mb-empresarial' >Portafolio Empresarial</a>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-6">
                            <a  class="memb-btn second-bg" href='mb-familiar' >Portafolio Hogar</a>
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-6">
                            <a  class="memb-btn" href='mb-portafolio' >Portafolio de Descuentos</a>
                        </div>
                        
                        
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- end card -->
    <?php include("Footer.php")?>
</body>

</html>