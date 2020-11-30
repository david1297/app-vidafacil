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
                  <img src="img/banner/Portafolio/2.png" alt="">
                </div>
        </div>
    </section>
  
<br>
    <!-- start botones -->
    <section>

      <div class="contenedor">

        <div class="blog__details__quote">
          <i class="fa fa-quote-right"></i>
          <p>¡Avanzamos más en equipo, afiliate ahora!</p>
      </div>
        <div class="row">
          <div class="col-md-4 col-12"> 
            
            <div class="contenedor_tarjeta">
              <a href="https://api.whatsapp.com/send?phone=573054232363&text=Hola,%20Quiero%20solicitar%20un%20servicio."  rel="noopener noreferrer"><h1>¡Solicitar Ahora!</h1></a>
                <figure id="tarjeta">
                  <img src="img/post_servicio/asesoria/1.jpg" class="frontal" alt="">
                  <h3>Empresas y Documentos</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 100 % </h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Tele Orientación</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      En algún momento necesitaras contar con Asesorías Jurídicas, para afrontar cuestiones legales, te garantizamos la prestación de servicios para la creación y constitución de empresas, elaboración de documentos, regularización de bienes, revisión y elaboración de contratos entre otros.                      </p>
                      <hr>
                      <h2><strong>Términos y Condiciones:</strong></h2>
                      <p>Los servicios se prestan en horarios de oficina, aplican restricciones y condiciones para uso del servicio, 
                        comunicarse con los medios de atención de S.V.F para conocer las políticas de uso del mismo.</p>
                    </figcaption>
                </figure>      
              </a>
            </div>
          </div>

          <div class="col-md-4 col-12">         
            <div class="contenedor_tarjeta">
              <a href="https://api.whatsapp.com/send?phone=573054232363&text=Hola,%20Quiero%20solicitar%20un%20servicio."  rel="noopener noreferrer"><h1>¡Solicitar Ahora!</h1></a>
                <figure id="tarjeta">
                  <img src="img/post_servicio/asesoria/2.jpg" class="frontal" alt="">
                  <h3>Consultoría Jurídica</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 100 % </h2>
                    <h2><strong>Cobertura:</strong> Nacional.</h2>
                     <h2><strong>Servicio:</strong> Consultoría Jurídica</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>Contará con el servicio profesional en Derecho, dónde puede realizar consultas en áreas laborales, civiles y comerciales. Dichas consultas se responderán vía correo electrónico, con el concepto y el soporte jurídico. Cuando se requiera contará con el servicio telefónico por parte del profesional asignado para su caso.</p>
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
                  <img src="img/post_servicio/asesoria/3.jpg" class="frontal" alt="">
                  <h3>Asesoría Contable y Financiera</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 100 %</h2>
                    <h2><strong>Cobertura:</strong> Nacional.</h2>
                     <h2><strong>Servicio:</strong> Consultoría Fiscal Online</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>Contaras con orientación en todo lo relacionado con la economía personal o empresarial si deseas emprender, para que puedas iniciar el proceso de inversión y no dejes de cumplir las obligaciones fiscales, un experto en tribulación te dará todas las opciones.</p>
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
                  <img src="img/post_servicio/asesoria/4.jpg" class="frontal" alt="">
                  <h3>Asesoría laboral</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 100 %</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Tipo:</strong> Consultoría Laboral Virtual</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>Contaras con orientación en todo lo relativo a contratación, recursos humanos, procesos disciplinarios, seguridad y salud en el trabajo, identificación de problemas, liquidaciones salariales, incapacidades, despidos, sanciones, entre otros.</p>
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
                  <img src="img/post_servicio/asesoria/5.jpg" class="frontal" alt="">
                  <h3>Asesoría Tramite de Visa</h3>
                  <figcaption class="trasera">
                    <h2><strong>Servicio:</strong> Hasta el 100 %</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Tipo:</strong> Consultoría De Cancillería Virtual</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>Si deseas iniciar los trámites de solicitud o renovación de Visa, contaras con la orientación de un profesional para realizar el proceso ante la embajada y la solicitud de la cita y demás procedimientos que debes realizar.</p>
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
                  <img src="img/post_servicio/asesoria/6.jpg" class="frontal" alt="">
                  <h3>Asistencia Venta</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Ventas</h2>
                    <h2><strong>Cobertura:</strong> Vehículos y Motos</h2>
                     <h2><strong>Servicio:</strong> Anuncio</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>En caso de vender o permutar tu vehículo, te cubrimos los costos de publicación en plataformas virtuales hasta el limite especificado.</p>
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
                  <img src="img/post_servicio/asesoria/7.jpg" class="frontal" alt="">
                  <h3>Asesoría en Derecho Civil</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 100 %</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Tipo:</strong> Consultoría Civil Virtual</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>Contaras con la orientación para la elaboración y análisis de contratos, reclamaciones de responsabilidad civil, sucesiones, actuaciones de ley en propiedad horizontal, recursos de reposición y apelación, procesos ante juzgados, entre otros.</p>
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
                  <img src="img/post_servicio/asesoria/8.jpg" class="frontal" alt="">
                  <h3>Asesoría Legal en Casos de Familia</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 100 %</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Tipo:</strong> Consultoría en derecho de familia virtual</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>Contaras con orientación para casos como lo son custodias, derechos de visitas, protección de la infancia, divorcios, pensión alimenticia, unión de hecho, acuerdos prematrimoniales o capitulaciones, liquidación de herencias, tutelas, entre otros.</p>
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
                  <img src="img/post_servicio/asesoria/9.jpg" class="frontal" alt="">
                  <h3>Asesoría De Cirugías Plásticas</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 100 %</h2>
                    <h2><strong>Cobertura:</strong> nacional</h2>
                     <h2><strong>Tipo:</strong> Asesoría De Cirugías Plásticas.</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>Podrás acceder a consulta de bienestar, A través de este servicio tendrás la oportunidad de conocer al médico especialista en cirugía plástica para resolver las inquietudes que tengas sobre el procedimiento. Así mismo, el médico podrá conocer cuáles son tus expectativas y necesidades para recomendarte los procedimientos adecuados para ti.</p>
                    <hr>
                    <h2><strong>Términos y Condiciones:</strong></h2>
                    <p>Los servicios se prestan en horarios de oficina, aplican restricciones y condiciones para uso del servicio, 
                      comunicarse con los medios de atención de S.V.F para conocer las políticas de uso del mismo.</p>
                  <h3><a href="https://api.whatsapp.com/send?phone=573054232363&text=Hola,%20Quiero%20solicitar%20un%20servicio."  rel="noopener noreferrer">¡Solicitala ya!</a></h3>
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
    <!-- Afiliation Section End -->
  

    <?php include("Footer.php")?>
</body>

</html>