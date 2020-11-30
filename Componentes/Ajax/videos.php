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

<body>
<?php include("Menu.php")?>

<br>
    <!-- Hero Section2 Begin -->
    <section>
        <div class="col-lg-12">
            <br>
            <div class="section-title center-title">
                    <h2>Nuestros Videos</h2>
                    <!-- <span style="color: black;">¡Nuestros Videos a un click!</span> -->
            </div>
        </div>
    </section>
    <section class="videos">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-xs-6 col-12">
                    <div class="vid-card">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/8xZJETvIWlk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                    </div>
                </div>
                
            </div>
        </div>
    </section>


    <!-- Afiliacion Section Begin -->
    <div class="afiliacion">      
        <a href="membresia"  rel="noopener noreferrer">
            <img src="img/afiliacion.png" alt="">
        </a>
    </div> 
    <!-- Afiliation Section End -->

    <?php include("Footer.php")?>
</body>

</html>