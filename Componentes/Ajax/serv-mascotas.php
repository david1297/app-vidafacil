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
 
    <section>
        <div class="hero-slider">
                <div class="single-hero-item set-bg" >
                <img src="img/banner/Portafolio/5.png" alt="">
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
                  <img src="img/post_servicio/mascotas/1.jpg" class="frontal" alt="">
                  <h3>Certificados de Viajes</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 15%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Certificados</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás  acceder a descuentos para Certificados veterinarios para viajes en avión para tu mascota, la mascota deberá contar con el carnet de vacunación y recuerda que este tendrá vencimiento.</p>
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
                  <img src="img/post_servicio/mascotas/2.jpg" class="frontal" alt="">
                  <h3>Medicamentos para Mascotas</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 15%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Medicamentos</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder con descuento a medicamentos para mascotas teniendo en cuenta que estos permiten el cuidado integral de la misma, los producto farmacéuticos de uso veterinario, pueden ser sustancias naturales o sintéticas, o  una mezcla de ellas, que se administran  a los animales con el fin de prevenir, tratar o curar las enfermedades o sus síntomas.
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
                  <img src="img/post_servicio/mascotas/3.jpg" class="frontal" alt="">
                  <h3>Alimentos para Mascotas</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 15%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Alimentos</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder a descuentos para tu mascota en diferentes marcas, alimentos secos o naturales, galletas, gomas, antiparasitarios, higiene, anti pulgas, suplementos, medicamentos, bienestar, bozales, camas, cepillos, comederos, juguetes, chips de rastreo, placas, tapetes, entre otros.
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
                  <img src="img/post_servicio/mascotas/4.jpg" class="frontal" alt="">
                  <h3>Video Consulta Veterinaria</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 15%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Veterinario</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                     Podrás acceder a consultas para revisar comportamientos extraños de tu mascota, alergias, cambio de alimentación, asesoría en anti pulgas, desparasitaciones y consultas básicas NO urgentes.
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
                  <img src="img/post_servicio/mascotas/5.jpg" class="frontal" alt="">
                  <h3>Snacks para Mascotas</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 15%</h2>
                    <h2><strong>Cobertura:</strong> Nacional </h2>
                     <h2><strong>servicio:</strong> Snacks</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder a descuentos tu mascota en diferentes marcas, alimentos secos o naturales, galletas, gomas, antiparasitarios, higiene, anti pulgas, suplementos, medicamentos, bienestar, bozales, camas, cepillos, comederos, juguetes, chips de rastreo, placas, tapetes, entre otros.
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
                  <img src="img/post_servicio/mascotas/6.jpg" class="frontal" alt="">
                  <h3>Foto Estudio para Mascotas</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 15%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Fotografia</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder a descuentos para tener media hora de sesión de fotos, captando recuerdos divertidos y elegir diferentes planes que incluyen desde las impresiones, hasta la entrega de una revista.
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
                  <img src="img/post_servicio/mascotas/7.jpg" class="frontal" alt="">
                  <h3>Educacion para Mascotas</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 15%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Entrenador Canino</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder a descuentos para realizar clases virtuales mediante la lectura, realizando ejercicios que permitan mejorar la relación con la comida, el respeto de límites, el manejo de juguetes y el uso de correa, entre otros, con profesionales calificados.
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
                  <img src="img/post_servicio/mascotas/8.jpg" class="frontal" alt="">
                  <h3>Suplementos para Mascotas</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 15%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Sumplementos</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Una dieta balanceada debería proporcionar a los animales de compañía las vitaminas, minerales y demás nutrientes que necesita para vivir saludablemente. Sin embargo, así como los humanos han incorporado en sus vidas el uso de suplementos nutricionales, se han creado productos especiales para fortalecer a las mascotas y mejorar su calidad de vida, Estos productos se pueden encontrar en forma de pastillas, jarabes o en gel.
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
                  <img src="img/post_servicio/mascotas/9.jpg" class="frontal" alt="">
                  <h3>Higiene de Mascotas</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 15%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> higiene</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Los productos de higiene para la mascota son los que permiten la limpieza de oídos, ojos, entre los cueles podrás encontrar, champú, tapetes absorbentes, pañitos húmedos, jabones, crema, talco desodorante, repelentes, cortaúñas, entre otros  de diferentes marcas.
                    </p>
                    <hr>
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