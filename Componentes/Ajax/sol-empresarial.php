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
                    <img src="img/banner/empresa/1.png" alt="">
                </div>
        </div>
    </section>
  
<br>
    <!-- start botones -->
        <section>
            <div class="container">
                <div class="row">
                    <!-- cuadro grande -->
                        <div class="col-md-6 col-12 pad">
                            <div class="card-v effect-bt">
                             <a href="text-crm"  rel="noopener noreferrer"><img src="img/botones/empresa/1.png" alt=""></a>
                            </div>
                        </div>

                        <!-- cuadro grande -->
                        <div class="col-md-6 col-12 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="text-asesoria"  rel="noopener noreferrer"><img src="img/botones/empresa/2.png" alt=""></a>
                            </div>
                        </div>
                </div>

                <div class="row">

                        <!-- cuadro grande -->
                        <div class="col-md-6 col-12 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="text-tecnologia"  rel="noopener noreferrer"><img src="img/botones/empresa/3.png" alt=""></a>
                            </div>
                        </div>
                

                    <!-- cuadro grande -->
                        <div class="col-md-6  col-12 pad">
                            <div class="card-v effect-bt">
                                <a href="text-campaña"  rel="noopener noreferrer"><img src="img/botones/empresa/4.png" alt=""></a>
                            </div>
                        </div>     
                 </div> 
        
            </div>
        </section>
            
    <div class="afiliacion">      
        <a href="mb-empresarial"  rel="noopener noreferrer">
            <img src="img/afiliacion.png" alt="">
        </a>
    </div> 
    <?php include("Footer.php")?>
</body>

</html>