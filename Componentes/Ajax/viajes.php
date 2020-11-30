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
    <script type="text/javascript">
        document.forms[0].elements[0].value=Date();
    </script>
    </head>

<body class="fondo2">  
    <?php include("Menu.php")?>
    <div class="container cont-cont">
        <br>
        <p style="background-color: transparent; text-align: center;">
            <a class="btn btn-primary solicitar"  data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">ELIGE TU DESTINO  <i class="fab fa-wpforms"></i></a> 
        </p>
        <section class="contact collapse" id="collapseExample"      style="padding-top: 20px; padding-bottom: 20px;">

            <div class="container" id="form">
                <div class="row">
                    <div class=" col-lg-12 col-md-12">
                        <div class="card border">
                            <div class="form-viajes border">
                                <div class="section-title center-title">           
                                    <h2 style="font-size:28px;">Viaja con soluciones vida facil a tu destino preferido</h2>
                                    <span style="font-size:18px;">¡Vive la experiencia, No permitas que te la cuenten!</span>
                                </div>
                                <br>
                                <form action="forms/contacto-viaje.php" method="POST" role="form">
                                    <div class="row">
                                        <div class="form-check col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <input class="check-box" type="radio" name="paquete" value="Hotel" checked>
                                                    <label class="form-check-label" for="exampleRadios1">Hotel</label>
                                                </div>
                                                <div class="col-lg-3">
                                                    <input class="check-box" type="radio" name="paquete" value="Hotel + vuelo">
                                                    <label class="form-check-label" for="exampleRadios2">Hotel + Vuelo</label>
                                                </div>
                                                <div class="col-lg-4">
                                                    <input class="check-box" type="radio" name="paquete" value="Hotel + Vuelo + Tour">
                                                    <label class="form-check-label" for="exampleRadios3">Hotel + Vuelo + Tour</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" name="lorigen" id="lorigen" placeholder="Ciudad de Origen" data-rule="minlen:5" data-msg="Ingrese la ciudad de origen" required>
                                        </div>

                                        <div class="col-lg-6">
                                            <input type="text" name="ldestino" id="ldestino" placeholder="Ciudad de Destino" data-rule="minlen:5" data-msg="Ingrese la ciudad de destino" required>
                                        </div>

                                            <div class="col-lg-6">
                                                <label for="">Fecha de Ida</label>
                                            <input id="fida" name="fida" type="date" value="" required>
                                            </div>
                                        <div class="col-lg-6">
                                            <label for="">Fecha de Regreso</label>
                                            <input id="fregreso" name="fregreso" type="date" value="" required>
                                        </div>
                                        <div class="col-lg-3 select">
                                            <label for="">Habitaciones</label>
                                            <select class="form-control" name="nhabitac" id="nhabitac">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>  
                                            </select>
                                        </div>
                                        <div class="col-lg-3 select">                        
                                                <label for="">Adultos</label>
                                                <select class="form-control" name="nadult" id="nadult">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                    <option>6</option>
                                                    <option>7</option>
                                                    <option>8</option>
                                                    <option>9</option>
                                                </select>
                                        </div>
                                        <div class="col-lg-3 select">
                                            <label for="">Menores de (2-17)</label>
                                            <select class="form-control" name="nmenor" id="nmenor">
                                                <option>0</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3 select">
                                            <label for="">Edad de los menores</label>
                                            <input type="text" name="edmenores" id="edmenores" placeholder="Ej: 3,5,5,7,15,9"  data-msg="Ingrese la ciudad de destino"  style="margin: 0;">
                                        </div>

                                        <div class="col-lg-12">
                                            <label for="">Datos del Afiliado</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" name="nombre" id="nombre" placeholder="Nombre Completo" data-rule="minlen:5" data-msg="Ingrese el nombre completo" required>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" name="telefono" id="telfono" placeholder="Numero Telefónico" data-rule="minlen:5" data-msg="Ingrese un teléfono" required>
                                        </div>
                                        
                                        <div class="col-lg-12"> 
                                            <input type="checkbox" class="check-box" id="cbox2" name="checkb" value="second_checkbox" style="margin: 0;" required checked> <a href="terminos&condiciones" class="none" target="_blank">Acepto Términos & Condiciones De Uso.</span></a><hr class="hr-1"><br>
                                <input type="checkbox" class="check-box" id="cbox2" name="checkb" value="second_checkbox" style="margin: 0;" required checked> <a href="tratamiento-de-datos" class="none" target="_blank" >Acepto Política De Tratamiento De Datos.</a><hr class="hr-1"><br>
                                <input type="checkbox" class="check-box" id="cbox2" name="checkb" value="second_checkbox" style="margin: 0;" required checked> <a href="uso-de-informacion" class="none" target="_blank" >Acepto El Uso De Mi Información Personal.</a><hr class="hr-1"><br>
                                <input type="checkbox" class="check-box" id="cbox2" name="checkb" value="second_checkbox" style="margin: 0;" required checked> <a href="tratamiento-por-terceros" class="none" target="_blank" >Acepto El Uso De Mi Información Por Terceros.</a><hr class="hr-1"><br>
                                        </div>
                                    </div>     
                                    <button type="submit" class="site-btn">Enviar Contizacion</button>
                                </form>
                            </div>
                        </div>
                    </div>
        
                </div>
            </div>
        </section>
        <div class="container" style="padding: 0;">
            <div class="sello">
                <img src="img/sello.png" alt="">
            </div>
                <div class="hero-slider">
                    
                    <div class="hero-items owl-carousel">
                                            
                        <div class="single-hero-item set-bg">
                            <img src="img/sliders/viajes/1.png" alt="">
                        </div>

                        <div class="single-hero-item set-bg">
                            <img src="img/sliders/viajes/2.png" alt="">
                        </div>

                        <div class="single-hero-item set-bg">
                            <img src="img/sliders/viajes/3.png" alt="">
                        </div>
            
                    </div>
                </div>
            </div>
            <!-- <div class="d-none d-sm-none d-md-block" style="text-align: center;">

                <ins class="bookingaff" data-aid="2069021" data-target_aid="2069021" data-prod="sbp" data-width="1100" data-height="400" data-lang="es" data-cc1="us" data-df_num_properties="3" data-bk-touched="true"><iframe src="//www.booking.com/flexiproduct?product=sbp&amp;w=1100&amp;h=400&amp;cc1=us&amp;lang=es&amp;aid=2069021&amp;target_aid=2069021&amp;df_num_properties=3&amp;fid=1599921906337&amp;" width="1100" height="400" scrolling="no" style="order:none;padding:0;margin:0;overflow:hidden;width:1100px;height:400px;background:#ffffff;" marginheight="0" marginwidth="0" frameborder="0" allowtransparency="true" id="booking_widget__2069021__1599921906337" data-responsive="false"></iframe></ins>
            
            </div> -->

                <div class="row">
                    <!-- cuadro grande -->
                        <div class="col-md-3 col-6 pad">
                            <div class="card-v effect-bt">
                            <a href="#form"   rel="noopener noreferrer"><img src="img/botones/viajes/1.png"></a> 
                            </div>
                        </div>

                        <!-- cuadro grande -->
                        <div class="col-md-3 col-6 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="#form" rel="noopener noreferrer"><img src="img/botones/viajes/2.png"></a> 
                            </div>
                        </div>

                        <!-- cuadro grande -->
                        <div class="col-md-3 col-6 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="#form" rel="noopener noreferrer"><img src="img/botones/viajes/3.png"></a> 
                            </div>
                        </div>

                        <!-- cuadro grande -->
                        <div class="col-md-3  col- col-6 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="#form" rel="noopener noreferrer"><img src="img/botones/viajes/4.png"></a> 
                            </div>
                        </div>
            
                    <!-- cuadro grande -->
                        <div class="col-md-3  col-6 pad">
                            <div class="card-v effect-bt">
                                <a href="#form" rel="noopener noreferrer"><img src="img/botones/viajes/5.png"></a> 
                            </div>
                        </div>

                        <!-- cuadro grande -->
                        <div class="col-md-3 col-6 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="#form" rel="noopener noreferrer"><img src="img/botones/viajes/6.png"></a> 
                            </div>
                        </div>

                        <!-- cuadro grande -->
                        <div class="col-md-3 col-6 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="#form" rel="noopener noreferrer"><img src="img/botones/viajes/7.png"></a> 
                            </div>
                        </div>  
                        
                        <div class="col-md-3 col-6 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="#form" rel="noopener noreferrer"><img src="img/botones/viajes/8.png"></a> 
                            </div>
                        </div>  
            
                    <!-- cuadro grande -->
                        <div class="col-md-3  col-6 pad">
                            <div class="card-v effect-bt">
                                <a href="#form" rel="noopener noreferrer"><img src="img/botones/viajes/9.png"></a> 
                            </div>
                        </div> 

                        <!-- cuadro grande -->
                        <div class="col-md-3 col-6 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="#form" rel="noopener noreferrer"><img src="img/botones/viajes/10.png"></a> 
                            </div>
                        </div>

                        <!-- cuadro grande -->
                        <div class="col-md-3 col-6 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="#form" rel="noopener noreferrer"><img src="img/botones/viajes/11.png"></a> 
                            </div>
                        </div>

                        <div class="col-md-3 col-6 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="#form" rel="noopener noreferrer"><img src="img/botones/viajes/12.png"></a> 
                            </div>
                        </div>          
            
                    <!-- cuadro grande -->
                        <div class="col-md-3  col-6 pad">
                            <div class="card-v effect-bt">
                                <a href="#form"   rel="noopener noreferrer"><img src="img/botones/viajes/13.png"></a> 
                            </div>
                        </div>

                        <!-- cuadro grande -->
                        <div class="col-md-3 col-6 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="#form" rel="noopener noreferrer"><img src="img/botones/viajes/14.png"></a> 
                            </div>
                        </div>

                        <!-- cuadro grande -->
                        <!-- <div class="col-md-3 col-6 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="#form"   </div>
                        </div> -->

                        <div class="col-md-3 col-6 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="#form" rel="noopener noreferrer"><img src="img/botones/viajes/16.png"></a> 
                            </div>
                        </div>          
            
                    <!-- cuadro grande -->
                        <div class="col-md-3  col-6 pad">
                            <div class="card-v effect-bt">
                                <a href="#form" rel="noopener noreferrer"><img src="img/botones/viajes/17.png"></a> 
                            </div>
                        </div>

                        <!-- cuadro grande -->
                        <div class="col-md-3 col-6 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="#form" rel="noopener noreferrer"><img src="img/botones/viajes/18.png"></a> 
                            </div>
                        </div>

                        <!-- cuadro grande -->
                        <div class="col-md-3 col-6 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="#form" rel="noopener noreferrer"><img src="img/botones/viajes/19.png"></a> 
                            </div>
                        </div> 

                        <div class="col-md-3 col-6 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="#form" rel="noopener noreferrer"><img src="img/botones/viajes/20.png"></a> 
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-6 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="#form" rel="noopener noreferrer"><img src="img/botones/viajes/21.png"></a> 
                            </div>
                        </div>

                        <div class="col-md-3 col-6 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="#form" rel="noopener noreferrer"><img src="img/botones/viajes/22.png"></a> 
                            </div>
                        </div> 

                        <div class="col-md-3 col-6 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="#form" rel="noopener noreferrer"><img src="img/botones/viajes/23.png"></a> 
                            </div>
                        </div> 

                        <div class="col-md-3 col-6 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="#form" rel="noopener noreferrer"><img src="img/botones/viajes/24.png"></a> 
                            </div>
                        </div> 

                        <div class="col-md-3 col-6 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="#form" rel="noopener noreferrer"><img src="img/botones/viajes/25.png"></a> 
                            </div>
                        </div> 

                        <div class="col-md-3 col-6 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="#form" rel="noopener noreferrer"><img src="img/botones/viajes/26.png"></a> 
                            </div>
                        </div> 

                        <div class="col-md-3 col-6 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="#form" rel="noopener noreferrer"><img src="img/botones/viajes/27.png"></a> 
                            </div>
                        </div> 

                        <div class="col-md-3 col-6 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="#form" rel="noopener noreferrer"><img src="img/botones/viajes/28.png"></a> 
                            </div>
                        </div> 

                        <div class="col-md-3 col-6 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="#form" rel="noopener noreferrer"><img src="img/botones/viajes/29.png"></a> 
                            </div>
                        </div> 

                        <div class="col-md-3 col-6 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="#form" rel="noopener noreferrer"><img src="img/botones/viajes/30.png"></a> 
                            </div>
                        </div> 

                        <div class="col-md-3 col-6 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="#form" rel="noopener noreferrer"><img src="img/botones/viajes/31.png"></a> 
                            </div>
                        </div> 

                        <div class="col-md-3 col-6 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="#form" rel="noopener noreferrer"><img src="img/botones/viajes/32.png"></a> 
                            </div>
                        </div> 

                        <div class="col-md-3 col-6 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="#form" rel="noopener noreferrer"><img src="img/botones/viajes/33.png"></a> 
                            </div>
                        </div> 

                        <div class="col-md-3 col-6 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="#form" rel="noopener noreferrer"><img src="img/botones/viajes/34.png"></a> 
                            </div>
                        </div> 

                        <div class="col-md-3 col-6 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="#form" rel="noopener noreferrer"><img src="img/botones/viajes/35.png"></a> 
                            </div>
                        </div> 

                        <div class="col-md-3 col-6 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="#form" rel="noopener noreferrer"><img src="img/botones/viajes/36.png"></a> 
                            </div>
                        </div> 

                        <div class="col-md-3 col-6 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="#form" rel="noopener noreferrer"><img src="img/botones/viajes/37.png"></a> 
                            </div>
                        </div> 

                        <div class="col-md-3 col-6 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="#form" rel="noopener noreferrer"><img src="img/botones/viajes/38.png"></a> 
                            </div>
                        </div> 

                        <div class="col-md-3 col-6 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="#form" rel="noopener noreferrer"><img src="img/botones/viajes/39.png"></a> 
                            </div>
                        </div> 

                        <div class="col-md-3 col-6 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="#form" rel="noopener noreferrer"><img src="img/botones/viajes/40.png"></a> 
                            </div>
                        </div> 

                        <div class="col-md-3 col-6 pad">
                            <div class="card-v set-bg effect-bt">
                                <a href="#form"   rel="noopener noreferrer"><img src="img/botones/viajes/41.png"></a> 
                            </div>
                        </div> 

                </div>
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