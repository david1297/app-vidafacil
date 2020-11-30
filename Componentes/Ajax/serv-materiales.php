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
                <div class="single-hero-item set-bg" >
                <img src="img/banner/Portafolio/6.png" alt="">
                </div>
        </div>
    </section>
  
<br>
    <!-- start botones -->
    <section>
      <div class="contenedor">
        <div class="row">
          <div class="col-md-4 col-12">
             
            <div class="contenedor_tarjeta">
              <a href="https://api.whatsapp.com/send?phone=573054232363&text=Hola,%20Quiero%20solicitar%20un%20servicio."  rel="noopener noreferrer"><h1>¡Solicitar Ahora!</h1></a>
                <figure id="tarjeta">
                  <img src="img/post_servicio/materiales/1.jpg" class="frontal" alt="">
                  <h3>Materiales para Pisos</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 15%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Pisos</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder a productos con descuento para diferentes tipos de piso como lo son Marmolizados, Geométricos, Maderas, Rústicos, Pisos baño, Exteriores granillados, Full HD, Maderas 15 x 90, Lisos, de diferentes colores, formatos y marcas.
                      </p>
                      <hr>
                      <h2><strong>Términos y Condiciones:</strong></h2>
                      <p>Los servicios se prestan en horarios de oficina, aplican restricciones y condiciones para uso del servicio, 
                        comunicarse con los medios de atención de S.V.F para conocer las políticas de uso del mismo.</p>
                    
                      </figcaption>
                </figure>
            </div>
          </div>

          <div class="col-md-4 col-12">
             
            <div class="contenedor_tarjeta">
              <a href="https://api.whatsapp.com/send?phone=573054232363&text=Hola,%20Quiero%20solicitar%20un%20servicio."  rel="noopener noreferrer"><h1>¡Solicitar Ahora!</h1></a> 
                <figure id="tarjeta">
                  <img src="img/post_servicio/materiales/2.jpg" class="frontal" alt="">
                  <h3>Materiales para Baños</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 15%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Baños</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder a productos con descuento para diferentes tipos de baños como lo son Porcelana sanitaria, Combos, Sanitarios, Lavamanos, Sets de baño, Griferías, De lavamanos, De lavaplatos, De ducha, Cabinas de baño, Muebles lavamanos madera, de diferentes colores, formatos y marcas.                      </p>                    <hr>
                      <h2><strong>Términos y Condiciones:</strong></h2>
                      <p>Los servicios se prestan en horarios de oficina, aplican restricciones y condiciones para uso del servicio, 
                        comunicarse con los medios de atención de S.V.F para conocer las políticas de uso del mismo.</p>
                  
                      </figcaption>
                </figure>
            </div>
          </div>

          <div class="col-md-4 col-12">
             
            <div class="contenedor_tarjeta">
              <a href="https://api.whatsapp.com/send?phone=573054232363&text=Hola,%20Quiero%20solicitar%20un%20servicio."  rel="noopener noreferrer"><h1>¡Solicitar Ahora!</h1></a>
                <figure id="tarjeta">
                  <img src="img/post_servicio/materiales/3.jpg" class="frontal" alt="">
                  <h3>Pegante para Pisos</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 50%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Pegante para Piso</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder al servicio a productos con descuento en la categoría de pegantes como lo son, Pegantes de Cerámica, Porcelanato, Aditivos Morteros, Fragua-lechada, de diferentes colores, formatos y marcas.                      </p>                    <hr>
                      <h2><strong>Términos y Condiciones:</strong></h2>
                      <p>Los servicios se prestan en horarios de oficina, aplican restricciones y condiciones para uso del servicio, 
                        comunicarse con los medios de atención de S.V.F para conocer las políticas de uso del mismo.</p>
                  
                      </figcaption>
                </figure>
            </div>
          </div>

          <div class="col-md-4 col-12">
             
            <div class="contenedor_tarjeta">
              <a href="https://api.whatsapp.com/send?phone=573054232363&text=Hola,%20Quiero%20solicitar%20un%20servicio."  rel="noopener noreferrer"><h1>¡Solicitar Ahora!</h1></a>
                <figure id="tarjeta">
                  <img src="img/post_servicio/materiales/4.jpg" class="frontal" alt="">
                  <h3>Productos para Griferias</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 15%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Griferias</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder al servicio a productos con descuento en la categoría de grifería como lo son, Griferías, De lavamanos, De lavaplatos, De ducha, Accesorios, de diferentes colores, formatos y marcas.
                      </p>
                    <hr>
                      <h2><strong>Términos y Condiciones:</strong></h2>
                      <p>Los servicios se prestan en horarios de oficina, aplican restricciones y condiciones para uso del servicio, 
                        comunicarse con los medios de atención de S.V.F para conocer las políticas de uso del mismo.</p>
                  
                      </figcaption>
                </figure>
            </div>
          </div>

          <div class="col-md-4 col-12">
             
            <div class="contenedor_tarjeta">
              <a href="https://api.whatsapp.com/send?phone=573054232363&text=Hola,%20Quiero%20solicitar%20un%20servicio."  rel="noopener noreferrer"><h1>¡Solicitar Ahora!</h1></a>
                <figure id="tarjeta">
                  <img src="img/post_servicio/materiales/5.jpg" class="frontal" alt="">
                  <h3>Productos para Paredes</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 15%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>servicio:</strong> Paredes</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder al servicio a productos con descuento en la categoría de paredes como lo son, Paredes Marmolizados, Biseladas ,Rectificadas, Decorados , Paredes Full HD, Lisas , Rústicos , Piedra, Fachadas , de diferentes colores, formatos y marcas.
                    </p>
                    <hr>
                      <h2><strong>Términos y Condiciones:</strong></h2>
                      <p>Los servicios se prestan en horarios de oficina, aplican restricciones y condiciones para uso del servicio, 
                        comunicarse con los medios de atención de S.V.F para conocer las políticas de uso del mismo.</p>
                  
                      </figcaption>
                </figure>
            </div>
          </div>

          <div class="col-md-4 col-12">
             
            <div class="contenedor_tarjeta">
              <a href="https://api.whatsapp.com/send?phone=573054232363&text=Hola,%20Quiero%20solicitar%20un%20servicio."  rel="noopener noreferrer"><h1>¡Solicitar Ahora!</h1></a>
                <figure id="tarjeta">
                  <img src="img/post_servicio/materiales/6.jpg" class="frontal" alt="">
                  <h3>Productos para Fachadas</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 15%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Fachadas</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder al servicio a productos con descuento en la categoría de fachadas, de diferentes colores, formatos y marcas.
                    </p>
                       <h2><strong>Términos y Condiciones:</strong></h2>
                      <p>Los servicios se prestan en horarios de oficina, aplican restricciones y condiciones para uso del servicio, 
                        comunicarse con los medios de atención de S.V.F para conocer las políticas de uso del mismo.</p>
                  
                      </figcaption>
                </figure>
            </div>
          </div>

 
          <div class="col-md-4 col-12">
             
            <div class="contenedor_tarjeta">
              <a href="https://api.whatsapp.com/send?phone=573054232363&text=Hola,%20Quiero%20solicitar%20un%20servicio."  rel="noopener noreferrer"><h1>¡Solicitar Ahora!</h1></a>
                <figure id="tarjeta">
                  <img src="img/post_servicio/materiales/7.jpg" class="frontal" alt="">
                  <h3>Productos para Cocinas</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 15%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Cocinas</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder al servicio a productos con descuento en la categoría de cocinas como lo son, Lavaplatos , Cocinas integrales , Muebles microondas , de diferentes colores, formatos y marcas.
                    </p>                    <hr>
                      <h2><strong>Términos y Condiciones:</strong></h2>
                      <p>Los servicios se prestan en horarios de oficina, aplican restricciones y condiciones para uso del servicio, 
                        comunicarse con los medios de atención de S.V.F para conocer las políticas de uso del mismo.</p>
                  
                      </figcaption>
                </figure>
            </div>
          </div>

          <div class="col-md-4 col-12">
             
            <div class="contenedor_tarjeta">
              <a href="https://api.whatsapp.com/send?phone=573054232363&text=Hola,%20Quiero%20solicitar%20un%20servicio."  rel="noopener noreferrer"><h1>¡Solicitar Ahora!</h1></a>
                <figure id="tarjeta">
                  <img src="img/post_servicio/materiales/8.jpg" class="frontal" alt="">
                  <h3>Productos Decorativos</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 15%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Decoracion</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder al servicio a productos con descuento en la categoría de decorativos como lo son, Cenefas, Baño, Cocina, Baño y/o cocina , Trenzas , Perfiles , Apliques , Guardaescobas, de diferentes colores, formatos y marcas.
                    </p>                    <hr>
                      <h2><strong>Términos y Condiciones:</strong></h2>
                      <p>Los servicios se prestan en horarios de oficina, aplican restricciones y condiciones para uso del servicio, 
                        comunicarse con los medios de atención de S.V.F para conocer las políticas de uso del mismo.</p>
                  
                      </figcaption>
                </figure>
            </div>
          </div>

          <div class="col-md-4 col-12">
             
            <div class="contenedor_tarjeta">
              <a href="https://api.whatsapp.com/send?phone=573054232363&text=Hola,%20Quiero%20solicitar%20un%20servicio."  rel="noopener noreferrer"><h1>¡Solicitar Ahora!</h1></a>
                <figure id="tarjeta">
                  <img src="img/post_servicio/materiales/9.jpg" class="frontal" alt="">
                  <h3>Productos para Complementos</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 15%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Complementos</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder al servicio a productos con descuento en la categoría de complementos como lo son, Espejos, Cabinas de baño, Jacuzzis, de diferentes colores, formatos y marcas.
                    </p>
                    <hr>
                    <h2><strong>Términos y Condiciones:</strong></h2>
                    <p>Los servicios se prestan en horarios de oficina, aplican restricciones y condiciones para uso del servicio, 
                      comunicarse con los medios de atención de S.V.F para conocer las políticas de uso del mismo.</p>
                
                    </figcaption>
                </figure>
            </div>
          </div>

      
          <div class="col-md-4 col-12">
             
            <div class="contenedor_tarjeta">
              <a href="https://api.whatsapp.com/send?phone=573054232363&text=Hola,%20Quiero%20solicitar%20un%20servicio."  rel="noopener noreferrer"><h1>¡Solicitar Ahora!</h1></a>
                <figure id="tarjeta">
                  <img src="img/post_servicio/materiales/10.jpg" class="frontal" alt="">
                  <h3>Productos para Porcelanatos</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 50%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Porcelanato</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder al servicio a productos con descuento en la categoría de pegantes como lo son, porcelanato , de diferentes colores, formatos y marcas.
                    </p>                    <hr>
                      <h2><strong>Términos y Condiciones:</strong></h2>
                      <p>Los servicios se prestan en horarios de oficina, aplican restricciones y condiciones para uso del servicio, 
                        comunicarse con los medios de atención de S.V.F para conocer las políticas de uso del mismo.</p>
                  
                      </figcaption>
                </figure>
            </div>
          </div>
        </div>

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