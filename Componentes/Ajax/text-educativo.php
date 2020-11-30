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

<body>
    <?php include("Menu.php")?>
        <section>
            <div class="hero-slider">
                    <div class="single-hero-item set-bg">
                     <img src="img/banner/servicios/8.png" alt="">
                    </div>
            </div>
        </section>
    <!-- Hero Section End -->

<!-- Blog Details Section Begin -->
<div class="blog-details">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8 section-title">
                <!-- <span>Our Great Team</span> -->
                <h2>Educación</h2>
            </div>
            <div class="col-lg-8">
                <div class="blog__details__content">
                    <div class="blog__details__text">
                        <p>Te ofrece la oportunidad de acceder en la modalidad presencial o virtual a los beneficios de los programas académicos, técnicos y profesionales, pensamos en el futuro de nuestros afiliados y sus familiares, Por eso, queremos contarte cómo puedes ahorrar tu dinero con el programa privilegios educación.</p>
                    </div>
                    <div class="blog__details__quote">
                        <i class="fa fa-quote-right"></i>
                        <p>¡Avanzamos más en equipo, afiliate ahora!</p>
                    </div>
                    <div class="blog__details__widget" style="padding-bottom:10px;">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="blog__details__widget__social">
                                    <span>Contacto:</span>
                                    <a href="https://api.whatsapp.com/send?phone=573054232363&text=Hola%2C%20necesito%20m%C3%A1s%20informaci%C3%B3n." ><i class="icon_header"><img src="img/wpp.png"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog Details Section End -->




        <!-- Application Form Section Begin -->
        <div class="afiliacion">      
            <a href="mb-familiar"  rel="noopener noreferrer">
                <img src="img/afiliacion.png" alt="">
            </a>
        </div> 
  
        <?php include("Footer.php")?>
</body>

</html>