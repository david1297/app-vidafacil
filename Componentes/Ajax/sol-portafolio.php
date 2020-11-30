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
                <img src="img/banner/empresa/3.png" alt="">
            </div>
        </div>
    </section>
  
    <br>
    <!-- start botones -->
        <section>
            <div class="container">
                <div class="row">
                    <!-- cuadro grande -->
                        <div class="col-md-3 col-12 pad">
                            <div class="card-v effect-bt">
                              <a href="serv-seguros"  rel="noopener noreferrer"><img src="img/botones/servicios/1.png"></a> 
                            </div>
                        </div>

                        <!-- cuadro grande -->
                        <div class="col-md-3 col-12 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="serv-asesoria"  rel="noopener noreferrer"><img src="img/botones/servicios/2.png"></a> 
                            </div>
                        </div>

                        <!-- cuadro grande -->
                        <div class="col-md-3 col-12 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="serv-binestar"  rel="noopener noreferrer"><img src="img/botones/servicios/3.png"></a> 
                            </div>
                        </div>

                         <!-- cuadro grande -->
                         <div class="col-md-3 col-12 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="serv-educacion"  rel="noopener noreferrer"><img src="img/botones/servicios/4.png"></a> 
                            </div>
                        </div>
                </div> 

                <div class="row">
                    <!-- cuadro grande -->
                        <div class="col-md-4  col-12 pad">
                            <div class="card-v effect-bt">
                                <a href="serv-mascotas"  rel="noopener noreferrer"><img src="img/botones/servicios/5.png"></a> 
                            </div>
                        </div>

                        <!-- cuadro grande -->
                        <div class="col-md-4 col-12 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="serv-materiales"  rel="noopener noreferrer"><img src="img/botones/servicios/6.png"></a> 
                            </div>
                        </div>

                        <!-- cuadro grande -->
                        <div class="col-md-4 col-12 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="serv-salud"  rel="noopener noreferrer"><img src="img/botones/servicios/7.png"></a> 
                            </div>
                        </div>        
                </div>

                <div class="row">
                    <!-- cuadro grande -->
                        <div class="col-md-4  col-12 pad">
                            <div class="card-v effect-bt">
                                <a href="serv-turismo"  rel="noopener noreferrer"><img src="img/botones/servicios/8.png"></a> 
                            </div>
                        </div>

                        <!-- cuadro grande -->
                        <div class="col-md-4 col-12 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="serv-vehiculos"  rel="noopener noreferrer"><img src="img/botones/servicios/9.png"></a> 
                            </div>
                        </div>

                        <!-- cuadro grande -->
                        <div class="col-md-4 col-12 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="serv-otros"  rel="noopener noreferrer"><img src="img/botones/servicios/10.png"></a> 
                            </div>
                        </div>        
                </div>
        
            </div>


                <!-- <div class="row">
                
                     <div class="col-md-2 col-12 pad">
                        <div class="card-v effect-bt">
                             <img src="img/botones/empresa/5.png" alt="">
                         </div>
                    </div>

           
                    <div class="col-md-2 col-12 pad">
                        <div class="card-v effect-bt">
                             <img src="img/botones/empresa/1.png" alt="">
                         </div>
                    </div>
                </div> -->
            </div>
        </section>
        <!-- end botones -->


    <!-- Afiliacion Section Begin -->
    <div class="afiliacion">      
        <a href="mb-portafolio"  rel="noopener noreferrer">
            <img src="img/afiliacion.png" alt="">
        </a>
    </div> 
    <?php include("Footer.php")?>
</body>

</html>