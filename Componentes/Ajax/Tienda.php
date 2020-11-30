<?php
session_start();
$Id=session_id();
require_once ("config/db.php");
require_once ("config/conexion.php");
if(isset($_GET["Categoria"])){
    $Categoria = $_GET["Categoria"];
    $sql="select * from Categorias WHERE Id=".$Categoria.";";
$query1=mysqli_query($con, $sql);
$rw_Admin1=mysqli_fetch_array($query1);
$Nombre=$rw_Admin1['Nombre'];
$sqlTienda="select * from Productos WHERE Categoria=".$Categoria.";";
}else{
    $Nombre="Descuentos";
    $sqlTienda="select * from Productos WHERE Descuento='Si';";
}


?>
<!DOCTYPE html>
<html>
    <?php include("Head.php");?>
<body>
    <?php include("Menu.php");?>
    <section>
        <div class="hero-slider">
            <div class="hero-items owl-carousel">          
                <div class="single-hero-item set-bg">
                    <img src="img/sliders/productos/1.png" alt="">
                </div> 
                <div class="single-hero-item set-bg">
                    <img src="img/sliders/productos/2.png" alt="">
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="col-lg-12">
            <br>
            <div class="section-title center-title">
                 <h2><?php echo $Nombre;?></h2>
                <span>¡La solución para todo!</span>
            </div>
        </div>
        <section>
            <div class="container">
                <div class="row">
                    <?php
                   
             
                    $query1=mysqli_query($con, $sqlTienda);
                    
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
                                                       
                                                        <button style="
                                                                        display: inline-block;
                                                                        margin-left: 5px;
                                                                        color: #fff;
                                                                        transition: 0.3s;
                                                                        font-size: 17px;
                                                                        background: #56EF73;
                                                                        padding: 1px 5px;
                                                                        border-radius: 5px;
                                                                        border-color: #56EF73;
"onclick="AgregarCarrito(<?php echo $rw_Admin1['Id'];?>)">Comprar <i class="fa fa-shopping-cart"></i></button>
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
    </section>

    <div class="afiliacion">      
        <a href="membresia"  rel="noopener noreferrer">
            <img src="img/afiliacion.png" alt="">
        </a>
    </div> 
   <?php include("Footer.php");?>
   <script>
        

    </script>
</body>

</html>