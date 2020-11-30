<?php
session_start();

$Id=session_id();
require_once ("config/db.php");
require_once ("config/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("Head.php")?>
        <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/5b86e6f5f31d0f771d844375/default';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
            })();
        </script>
</head>

<body>
    <?php include("Menu.php")?>
    
    <section>
    <div class="hero-slider">
        <div class="hero-items owl-carousel">
            
            <!-- <div class="single-hero-item set-bg">
                <img src="img/sliders/1.png" alt="">
            </div>  -->

            <div class="single-hero-item set-bg">
                <img src="img/sliders/2.png" alt="">
            </div>

            <div class="single-hero-item set-bg">
                <img src="img/sliders/3.png" alt="">
            </div>

            <div class="single-hero-item set-bg">
                <img src="img/sliders/4.png" alt="">
            </div>

            <div class="single-hero-item set-bg">
                <img src="img/sliders/5.png" alt="">
            </div>

            <div class="single-hero-item set-bg">
                <img src="img/sliders/6.png" alt="">
            </div>
            
            <div class="single-hero-item set-bg">
                <img src="img/sliders/7.png" alt="">
            </div>

        </div>
    </div>
</section>
    <!-- Hero Section End -->
<br>
<!-- About Video Section Begin -->
<section class="about-video">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 p-0">
                <div class="about__video__bg set-bg" >
                    <div class="section-title" style="margin: 0;"> 
                        <a href="cursos" class="primary-btn second-bg btn-curso">CURSOS</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 p-0">
                <div class="about__video__bg set-bg">
                    <a href="cursos"  rel="noopener noreferrer"><img src="img/hotmart/1.jpg" alt=""></a> 
                </div>
            </div>
            <div class="col-lg-4 p-0">
                <div class="about__video__bg set-bg">
                  <a href="cursos"  rel="noopener noreferrer"><img src="img/hotmart/2.png" alt=""></a> 
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Video Section End -->

<!-- Hero Section Begin -->
    <section>
        <div class="container">
            <div class="single-hero-item set-bg" data-setbg="img/banner-nosotros.png">
        </div>
    </section>

</div>

<br>
<section class="courses" >
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-7">
                <div class="section-title">
                    <h2>PRODUCTOS DESTACADOS</h2>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5">
                <div class="courses__all">
                
                </div>
            </div>
        </div>
        <div class="row">
            <?php
                    $sql="select * from Productos WHERE Destacado='Si';";
             
                    $query1=mysqli_query($con, $sql);
                    
                    while($rw_Admin1=mysqli_fetch_array($query1)){
                        ?>
                        <div class="col-md-4">
                            <div class="product-card">
                                <?php
                                    if($rw_Admin1['Descuento']=='Si'){
                                       
                                        echo " <div class='badgeD'>Descuento</div> ";
                                    }
                                    if($rw_Admin1['Destacado']=='Si'){
                                       
                                        echo " <div class='badge'>Destacado</div> ";
                                    }
                                ?>
                                
                                <div class="product-tumb">
                                    <img src="Admin/Img/<?php echo $rw_Admin1['Imagen'];?>" alt="">
                                </div>
                                <div class="product-details">
                                    <h4><a href=""><?php echo $rw_Admin1['Nombre'];?></a></h4>
                                    <p><?php echo $rw_Admin1['Descripcion'];?></p>
                                    <div class="product-bottom-details">
                                        <?php
                                            if($rw_Admin1['Tipo']==1){
                                                ?>
                                                <div class="product-price">
                                                
                                                <?php
                                                    if($rw_Admin1['Descuento']=='Si'){
                                                        echo "<s><p style='height: 20px;'> $ ".number_format($rw_Admin1['Precio'])." </p></s>";
                                                        echo " $ ".number_format($rw_Admin1['PrecioDescuento'])." ";
                                                    }else{
                                                        echo " $ ".number_format($rw_Admin1['Precio'])." ";
                                                    }
                                                    ?>
                                                
                                                </div>
                                                    <div class="product-links">
                                                        <a href="#" onclick="AgregarCarrito(<?php echo $rw_Admin1['Id'];?>)">Comprar <i class="fa fa-shopping-cart"></i></a>
                                                    </div>
                                                <?php
                                            }else{
                                                ?>
                                                
                                                    <div class="product-links text-center" style="width: 100%;">
                                                        <a href="<?php echo $rw_Admin1['Url'];?>" target="_blank" >Ver Mas <i class="far fa-eye"></i></a>
                                                    </div>
                                                <?php
                                            }
                                        ?>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
        </div>
    </div>
</section>

<div class="afiliacion">
    <a href="membresia">
        <img src="img/afiliacion.png" alt="">
    </a>         
</div> 
    
    
<?php include("Footer.php")?>
</body>

</html>