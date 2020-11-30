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
                <img src="img/banner/empresa/4.png" alt=""></div>
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
                  <img src="img/post_servicio/descuentos/1.jpg" class="frontal" alt="">
                  <h3>Mantenimiento de Lavadoras</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 30%</h2>
                    <h2><strong>Cobertura:</strong> Bogotá</h2>
                     <h2><strong>Servicio:</strong> Mantenimiento de Lavadoras y Secadoras</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder al mantenimiento de neveras, secadoras, lavavajillas, con descuento.
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
                  <img src="img/post_servicio/descuentos/2.jpg" class="frontal" alt="">
                  <h3>Limpieza de Tapicería para Vehiculos</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 10%</h2>
                    <h2><strong>Cobertura:</strong> Bogotá</h2>
                     <h2><strong>Servicio:</strong> Limpieza y Aseo</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Ahorra tiempo y dinero con los descuentos en limpieza y desinfección adquiriendo el servicio de Limpieza de  Tapicería De Carros., Contamos con la experiencia técnica para limpiar, desmanchar, desinfectar y lustrar cada superficie de la tapicería.
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
                  <img src="img/post_servicio/descuentos/3.jpg" class="frontal" alt="">
                  <h3>Limpieza de Tapicería para Muebles</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 10%</h2>
                    <h2><strong>Cobertura:</strong> Bogotá</h2>
                     <h2><strong>Servicio:</strong> Limpieza y Aseo</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Ahorra tiempo y dinero con los descuentos en limpieza y desinfección adquiriendo el servicio de Limpieza Tapicería De Muebles, Contamos con la experiencia técnica para limpiar, desmanchar, desinfectar y lustrar cada superficie de la tapicería.
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
                  <img src="img/post_servicio/descuentos/4.jpg" class="frontal" alt="">
                  <h3>limpieza y Desinfección de Salas & muebles</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 10%</h2>
                    <h2><strong>Cobertura:</strong> Bogotá</h2>
                     <h2><strong>Servicio:</strong> Limpieza y Aseo</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Ahorra tiempo y dinero con los descuentos en limpieza y desinfección adquiriendo el servicio de lavado de muebles 2 x 1, Contamos con la experiencia técnica para limpiar, desmanchar, desinfectar y lustrar cada superficie de la tapicería.
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
                  <img src="img/post_servicio/descuentos/5.jpg" class="frontal" alt="">
                  <h3>Limpieza Profesional a Domicilio</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 50%</h2>
                    <h2><strong>Cobertura:</strong> Bogota</h2>
                     <h2><strong>servicio:</strong> Limpieza Profesional a Domicilio por Días y Horas.</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Aseo general, cuidado de niños y adultos, preparación de alimentos, lavado y planchado de ropa, mayordomía.
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
                  <img src="img/post_servicio/descuentos/6.jpg" class="frontal" alt="">
                  <h3>Tutores Virtuales</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 50%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Class Room</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Si usted o alguien de su familia desea requiere el servicio, contara con tutor virtual GRATIS para 2 asistencias que son asesoría de tareas de primaria o bachillerato utilizando diferentes herramientas tecnológicas.
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
                  <img src="img/post_servicio/descuentos/7.jpg" class="frontal" alt="">
                  <h3>Asesoría por Ingenieros y Arquitectos</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 15%</h2>
                    <h2><strong>Cobertura:</strong> Medellin</h2>
                     <h2><strong>Servicio:</strong> Asesoría profesional</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Desenglobes y/o permisos para construcción, diseño arquitectónico y estructural, visita técnica de un arquitecto y/o ingenieros, evita multas y sanciones por construir sin permiso, factibilidad y estudio de tu proyecto elige tu paquete a tu medida.
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
                  <img src="img/post_servicio/descuentos/8.jpg" class="frontal" alt="">
                  <h3>Materiales de Ferreteria</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 15%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Materiales de Ferreteria</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Para servicios de ferretería en compra de productos como lo son: pisos, baños, pegantes, griferías, porcelanatos, paredes, fachadas, cocinas, decorativos, complementos.
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
                  <img src="img/post_servicio/descuentos/9.jpg" class="frontal" alt="">
                  <h3>Ventas de Colchones</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 30%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Venta</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Aplica Para colchones de la línea Premium, Gold, silver, somier y dúplex, almohadas memory foam y sensación, plumas, cajonería, pillow pad, lencería general para el hogar.
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
                  <img src="img/post_servicio/descuentos/10.jpg" class="frontal" alt="">
                  <h3>Desayunos Sorpresa</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 10%</h2>
                    <h2><strong>Cobertura:</strong> Bogotá y Aledaños</h2>
                     <h2><strong>Servicio:</strong> Desayunos Sorpresa</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Si deseas sorprender a la persona que amas o a un familiar conoce nuestro paquete de desayunos sorpresa para cualquier ocasión hecho de acuerdo a tu necesidad.
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
                  <img src="img/post_servicio/descuentos/11.jpg" class="frontal" alt="">
                  <h3>Postres y Ponqués</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 10%</h2>
                    <h2><strong>Cobertura:</strong> Bogotá</h2>
                     <h2><strong>Servicio:</strong> Reposteria</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Necesitas celebrar una fecha especial, pregunta por nuestros planes de pastelería, costos y diseños disponibles.
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
                  <img src="img/post_servicio/descuentos/12.jpg" class="frontal" alt="">
                  <h3>Lavado Ecológico a Domicilio</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 10%</h2>
                    <h2><strong>Cobertura:</strong> Bogota</h2>
                     <h2><strong>Servicio:</strong> Limpieza y Aseo</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Lavado de tapicería y cojineria llévate gratis un lavado ecostandard, película de seguridad y accesorios,     Aplica para vehículos o camionetas de solo 5 puestos,La Duración del servicio depende del estado de la cojineria del vehículo.
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
                  <img src="img/post_servicio/descuentos/13.jpg" class="frontal" alt="">
                  <h3>Academia De Conducción</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 5%</h2>
                    <h2><strong>Cobertura:</strong> Bogotá y Aledaños</h2>
                     <h2><strong>Servicio:</strong> Academia De Conducción</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Cursos de conducción del A1 hasta C1, refuerzos, pruebas empresariales, exámenes médicos y psicosensomericos, plan de seguridad vial.                    </p>
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
                  <img src="img/post_servicio/descuentos/14.jpg" class="frontal" alt="">
                  <h3>Avaluó comercial</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 25%</h2>
                    <h2><strong>Cobertura:</strong> Bogotá</h2>
                     <h2><strong>Servicio:</strong> Avaluó comercial</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Este servicio es clave en el proceso de compra o venta de un vehículo, ya que se verifica el estado del mismo, examinando rigurosamente cada parte estructural, así como el funcionamiento del sistema eléctrico, la originalidad de los sistemas de identificación y las partes del vehículo que son susceptibles de reparación o cambio, brindándole información sobre el estado real y valor comercial del vehículo.
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
                  <img src="img/post_servicio/descuentos/15.jpg" class="frontal" alt="">
                  <h3>Rastreo y Monitoreo.</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 15%</h2>
                    <h2><strong>Cobertura:</strong> Bogotá, Barranquilla, Bucaramanga, Cali, Medellín, Santa Marta, Villavicencio.</h2>
                     <h2><strong>Servicio:</strong> Limpieza y Aseo</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Lavado de tapicería y cojineria llévate gratis un lavado ecostandard, película de seguridad y accesorios,     Aplica para vehículos o camionetas de solo 5 puestos,La Duración del servicio depende del estado de la cojineria del vehículo.
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