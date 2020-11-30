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
                  <img src="img/banner/Portafolio/1.png" alt="">
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
                      <img src="img/post_servicio/asistencia/soat.jpg" class="frontal" alt="">
                         <h3>Seguro Obligatorio de Accidentes de Transito</h3> 
                      <figcaption class="trasera">
                        <h2><strong>Beneficio:</strong> Hasta el 5 % </h2>
                        <h2><strong>Cobertura:</strong> Nacional.</h2>
                         <h2><strong>Servicio:</strong> Seguro Obligatorio SOAT </h2>
                        <hr>
                        <h2><strong>Descripción:</strong></h2>
                        <p>
                          Tener un SOAT activo te ayudara en caso de accidentes de tránsito en territorio colombiano, este seguro obligatorio cubre las lesiones o fallecimiento de conductores, pasajeros, o peatones (no cubre los daños a vehículos de terceros ni a sus propiedades) Podrás acceder con descuento hasta de un 5% dependiendo el tipo de vehículo, si es auto o moto, contaras con diferentes medios de pago y llegara a tu MAIL de forma inmediata.
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
                     
                      <img src="img/post_servicio/asistencia/riesgo.jpg" class="frontal" alt="">
                        <h3>Seguro Todo Riesgo</h3>
                      <figcaption class="trasera">
                        <h2><strong>Beneficio:</strong> Hasta el 5 % </h2>
                        <h2><strong>Cobertura:</strong> Nacional.</h2>
                         <h2><strong>Servicio:</strong> Seguro Todo Riesgo</h2>
                        <hr>
                        <h2><strong>Descripción:</strong></h2>
                        <p>Reintegramos el costo del parqueadero en caso que no alcances a llegar a tu destino por la primera hora del pico y placa.</p>
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
                      <img src="img/post_servicio/asistencia/exequial.jpg" class="frontal" alt="">
                      <h3>Seguro Exequial</h3>
                      <figcaption class="trasera">
                        <h2><strong>Beneficio:</strong> Hasta el 7% </h2>
                        <h2><strong>Cobertura:</strong> Nacional.</h2>
                         <h2><strong>Servicio:</strong> Seguro Exequial</h2>
                        <hr>
                        <h2><strong>Descripción:</strong></h2>
                        <p>Podrá acceder al servicio de Póliza Exequial Individual con descuentos hasta De acuerdo al Plan, donde le incluye DESTINO INICIAL (Reporte del siniestro hasta la salida de la sala de Velación) DESTINO FINAL (Salida sala de velación hasta el proceso de Inhumación o Cremación en el Parque Cementerio), además de otros servicios.</p>
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
                      <img src="img/post_servicio/asistencia/parqueadero.jpg" class="frontal" alt="">
                      <h3>Asistencia Paqueadero</h3>
                      <figcaption class="trasera">
                        <h2><strong>Servicio:</strong> Paqueadero</h2>
                        <h2><strong>Sector:</strong> Vehículos y Motos</h2>
                         <h2><strong>Tipo:</strong> Parqueadero Por Accidente</h2>
                        <hr>
                        <h2><strong>Descripción:</strong></h2>
                        <p>Reintegramos el costo del parqueadero en caso de accidente o avería por la primera hora del suceso.</p>
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
                      <img src="img/post_servicio/asistencia/pico.jpg" class="frontal" alt="">
                      <h3>Asistencia en Pico y Placa</h3>
                      <figcaption class="trasera">
                        <h2><strong>Servicio:</strong> Paqueadero</h2>
                        <h2><strong>Sector:</strong> Vehículos y Motos</h2>
                         <h2><strong>Tipo:</strong> Pico y Placa</h2>
                        <hr>
                        <h2><strong>Descripción:</strong></h2>
                        <p>Reintegramos el costo del parqueadero en caso que no alcances a llegar a tu destino por la primera hora del pico y placa.</p>
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
                      <img src="img/post_servicio/asistencia/venta.jpg" class="frontal" alt="">
                      <h3>Asistencia Venta</h3>
                      <figcaption class="trasera">
                        <h2><strong>Beneficio:</strong> Ventas</h2>
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
                      <img src="img/post_servicio/asistencia/mecanico.jpg" class="frontal" alt="">
                      <h3>Asistencia Mecánico Virtual</h3>
                      <figcaption class="trasera">
                        <h2><strong>Servicio:</strong> mecánico Virtual</h2>
                        <h2><strong>Sector:</strong> Vehiculos y Motos</h2>
                         <h2><strong>Tipo:</strong> Falla Técnica</h2>
                        <hr>
                        <h2><strong>Descripción:</strong></h2>
                        <p>Si sufres varada de tu vehículo, encuentra al alcance de una vídeo llamada, la orientación telefónica de expertos en mecánica automotriz para dar diagnostico a la avería.</p>
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
                      <img src="img/post_servicio/asistencia/mascotas.jpg" class="frontal" alt="">
                      <h3>Asistencia Mascotas</h3>
                      <figcaption class="trasera">
                        <h2><strong>Servicio:</strong> Asistencia de Mascotas</h2>
                        <h2><strong>Sector:</strong> Mascotas</h2>
                         <h2><strong>Tipo:</strong> Medicina Pre Pagada</h2>
                        <hr>
                        <h2><strong>Descripción:</strong></h2>
                        <p>Podrás acceder a planes de servicios pre pagados para que tu mascota está protegido contando con servicios como hospitalizaciones, medicamentos, médico veterinario, citas de valoración, vacunación entre otros.</p>
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
                      <img src="img/post_servicio/asistencia/acita.jpg" class="frontal" alt="">
                      <h3>Asistencia Agendamiento de Citas Medicas</h3>
                      <figcaption class="trasera">
                        <h2><strong>Servicio:</strong> Salud</h2>
                        <h2><strong>Sector:</strong> Citas Medicas</h2>
                         <h2><strong>Tipo:</strong> Agendamiento</h2>
                        <hr>
                        <h2><strong>Descripción:</strong></h2>
                        <p>Si requieres programar citas médicas pondremos a tu disposición personal responsable para que se encargue de esto.</p>
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
                      <img src="img/post_servicio/asistencia/busqueda.jpg" class="frontal" alt="">
                      <h3>Asistencia por Perdidad o Robo de Mascotas</h3>
                      <figcaption class="trasera">
                        <h2><strong>Servicios:</strong> Mascotas</h2>
                        <h2><strong>Sector:</strong> Perdida o Robo</h2>
                         <h2><strong>Tipo:</strong> Publicidad</h2>
                        <hr>
                        <h2><strong>Descripción:</strong></h2>
                        <p>Te entregaremos 100 volantes con recompensa para recuperar o encontrar tu mascota e iniciaremos campaña en redes sociales. Aplica hasta el límite especificado de la asistencia.</p>
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
                      <img src="img/post_servicio/asistencia/funemascotas.jpg" class="frontal" alt="">
                      <h3>Seguro Funario para Mascotas</h3>
                      <figcaption class="trasera">
                        <h2><strong>Servicio:</strong> Mascotas</h2>
                        <h2><strong>Sector:</strong> Funerario</h2>
                         <h2><strong>Tipo:</strong> Funeraria</h2>
                        <hr>
                        <h2><strong>Descripción:</strong></h2>
                        <p>Podrá acceder a diferentes planes entre los cuales puede incluir servicios de cremación, cementerio, traslado, baúl, recordatorio, entre otrass asistencias.</p>
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
                      <img src="img/post_servicio/asistencia/responsabilidad.jpg" class="frontal" alt="">
                      <h3>Seguro de Responsabilidad Civil y Accidentes</h3>
                      <figcaption class="trasera">
                        <h2><strong>Beneficio:</strong> Hasta el 15%</h2>
                        <h2><strong>Cobertura:</strong> Nacional</h2>
                         <h2><strong>Servicio:</strong> Seguro de responsabilidad civil y accidentes.</h2>
                        <hr>
                        <h2><strong>Descripción:</strong></h2>
                        <p>De acuerdo con la ley artículo 2353 del código civil, como propietario de perro o gato se debe contar con el seguro de responsabilidad civil, el seguro dependiendo el tipo de póliza cubre por daños a terceros + Muerte accidental.</p>
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