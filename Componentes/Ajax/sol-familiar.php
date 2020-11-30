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
                    <img src="img/banner/empresa/2.png" alt="">
            </div>
        </div>
    </section>
  
<br>
    <!-- start botones -->
        <section>
            <div class="container">
                <div class="row">
                    <!-- cuadro grande -->
                        <div class="col-md-4  col-12 pad">
                            <div class="card-v effect-bt">
                               <a href="text-juridico"  rel="noopener noreferrer"><img src="img/botones/familia/1.png" alt=""></a>
                            </div>
                        </div>

                        <!-- cuadro grande -->
                        <div class="col-md-4 col-12 pad">
                            <div class="card-v set-bg effect-bt">
                               <a href="text-educativo"  rel="noopener noreferrer"><img src="img/botones/familia/2.png" alt=""></a> 
                            </div>
                        </div>

                        <div class="col-md-4 col-12 pad">
                            <div class="card-v set-bg effect-bt">
                               <a href="text-prevision"  rel="noopener noreferrer"><img src="img/botones/familia/3.png" alt=""></a> 
                            </div>
                        </div>

                    
                </div> 

                <div class="row">
                    <!-- cuadro grande -->
                        <div class="col-md-4  col-12 pad">
                            <div class="card-v effect-bt">
                               <a href="text-medicina"  rel="noopener noreferrer"><img src="img/botones/familia/4.png" alt=""></a> 
                            </div>
                        </div>

                        <!-- cuadro grande -->
                        <div class="col-md-4 col-12 pad">
                            <div class="card-v set-bg effect-bt">
                              <a href="text-mascotas"  rel="noopener noreferrer"><img src="img/botones/familia/5.png" alt=""></a> 
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-12 pad">
                            <div class="card-v set-bg effect-bt">
                               <a href="text-reparaciones"  rel="noopener noreferrer"><img src="img/botones/familia/6.png" alt=""></a> 
                            </div>
                        </div>
                </div>
        
            </div>
            </div>
        </section>
        <!-- end botones -->


    <!-- Afiliacion Section Begin -->
    <div class="afiliacion">      
        <a href="mb-familiar"  rel="noopener noreferrer">
            <img src="img/afiliacion.png" alt="">
        </a>
    </div> 
    <?php include("Footer.php")?>
</body>

</html>