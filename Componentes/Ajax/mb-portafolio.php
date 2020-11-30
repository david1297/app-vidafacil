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
    
    
    </head>

<body class="fondo">
<?php include("Menu.php")?>

    <br>
    
    <!-- card -->

    <section class="application-form pricing--page spad" style="padding-top: 50px;padding-bottom: 20px;">
        <div class="container memb-center d-flex justify-content-center align-items-center" > 
            <div class="application__form__content" style="width: 400px; border-radius:10px;">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title center-title">           
                            <h2>Portafolio SVF</h2>
                            <span>la mejor solución opción para ti</span>
                        </div>
                        <div class="section-title center-title">           
                            <div class="cd-member">
                                <img src="img/tarjetas/3.png">
                               </div>
                        </div>
                    </div>
                </div>
                <form action="#">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-6">
                            <ul class="list-group list-group-flush">
                                
                                <li class="list-group-item text-bg "><a class="text-pc" href="serv-seguros"><i class="fas fa-star"></i> SEGUROS</a></li>
                                <li class="list-group-item text-bg "><a class="text-pc" href="serv-asesoria"><i class="fas fa-star"></i> ASESORIAS</a></li>
                                <li class="list-group-item text-bg "><a class="text-pc" href="serv-binestar"><i class="fas fa-star"></i> BIENESTAR</a></li>
                                <li class="list-group-item text-bg "><a class="text-pc" href="serv-educacion"><i class="fas fa-star"></i> EDUCACION</a></li>
                                <li class="list-group-item text-bg "><a class="text-pc" href="serv-mascotas"><i class="fas fa-star"></i> MASCOTAS</a></li>
                                <li class="list-group-item text-bg "><a class="text-pc" href="serv-materiales"><i class="fas fa-star"></i> CONSTRUCCIÓN</a></li>
                                <li class="list-group-item text-bg "><a class="text-pc" href="serv-salud"><i class="fas fa-star"></i> SALUD</a></li>
                                <li class="list-group-item text-bg "><a class="text-pc" href="serv-turismo"><i class="fas fa-star"></i> TURISMO</a></li>
                                <li class="list-group-item text-bg "><a class="text-pc" href="serv-vehiculos"><i class="fas fa-star"></i> VEHICULOS</a></li>
                                <li class="list-group-item text-bg "><a class="text-pc" href="serv-otros"><i class="fas fa-star"></i> DESCUENTOS</a></li>
                           
                            </ul> 
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-6">
                            <br>
                            <a  class="memb-btn" href='https://api.whatsapp.com/send?phone=573054232363&text=Hola%2C%20deseo%20afiliarme%20una%20membresia' >Afiliarme</a>
                        </div>
                        
                        
                    </div>
                </form>
            </div>
        </div>
    </section>
    
    <?php include("Footer.php")?>
</body>

</html>