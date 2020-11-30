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
                <img src="img/banner/Portafolio/9.png" alt="">
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
                  <img src="img/post_servicio/vehiculos/1.jpg" class="frontal" alt="">
                  <h3>Lubricantes y Aditivos</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 10%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                    <h2><strong>Servicio:</strong> Descuento En La Compra De Lubricantes y Aditivos</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Cambio de aceite, cambio de pastillas de frenos, cambio de líquido refrigerante, limpieza de aire acondicionado, mecánica rápida y servicios de servitecas directas.
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
                  <img src="img/post_servicio/vehiculos/2.jpg" class="frontal" alt="">
                  <h3>Accesorios y Repuestos</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 20%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                    <h2><strong>Servicio:</strong> Compra de moto, accesorios y repuestos</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Descuento para la compra de motocicleta de la marca auteco, Discovery, bóxer  al 3% cilindrada de 90 cc a 200 cc,  1% de  200 cc hasta 790 cc; 10% de descuento, el cual se verá reflejado en los repuestos que compren por almacén (no redimible con otros descuentos).
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
                  <img src="img/post_servicio/vehiculos/3.jpg" class="frontal" alt="">
                  <h3>Suspensiones Vehículos y Motos</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 50%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                    <h2><strong>Servicio:</strong> Suspensiones para vehículos y motos</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder al servicio para la revisión de amortiguadores, rotulas, terminales, axiales, bujes de tijeras, ejes, tijeras, todo lo que implica la suspensión y dirección de un vehículo para garantizar la correcta operación del vehículo.
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
                  <img src="img/post_servicio/vehiculos/4.jpg" class="frontal" alt="">
                  <h3>Montaje</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 10%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                    <h2><strong>Servicio:</strong> Montaje</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder al servicio para instalar la llanta en el rin de manera homogénea para que gire en forma óptima y no genere desgaste irregular.
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
                  <img src="img/post_servicio/vehiculos/5.jpg" class="frontal" alt="">
                  <h3>Alineación</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 10%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                    <h2><strong>servicio:</strong> Alineación</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder al servicio y lograr un alto grado de exactitud, la alineación se hace  para optimizar el área de contacto que deben tener las 4 llantas del vehículo para así evitar vibraciones, desgastes irregulares y optimizar el frenado en momentos de emergencia.
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
                  <img src="img/post_servicio/vehiculos/6.jpg" class="frontal" alt="">
                  <h3>Balanceo</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 10%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                    <h2><strong>Servicio:</strong> Balanceo</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
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
                  <img src="img/post_servicio/vehiculos/7.jpg" class="frontal" alt="">
                  <h3>Rectificación</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 10%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                    <h2><strong>Servicio:</strong> Rectificación</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder al servicio y lograr devolverle a un rin su forma original, la cual ha perdido o ha sido alterada debido a golpes o impacto. Esta corrección es de suma importancia para evitar los desgastes irregulares en las llantas y evitar vibraciones en el conjunto llanta-rin.
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
                  <img src="img/post_servicio/asistencia/soat.jpg" class="frontal" alt="">
                  <h3>Seguro Obligatorio de Accidente</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 5%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                    <h2><strong>Servicio:</strong> Seguro Obligatorio SOAT</h2>
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
                    <h2><strong>Descuento:</strong> Hasta el 5%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                    <h2><strong>Servicio:</strong> Seguro Todo Riesgo</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder a diferentes pólizas que buscan proteger tu patrimonio de daños propios o daños causados a terceros, te cubre en caso de un desastre natural, hurto o daño, dependiendo el tipo de plan que elijas también tendrás diferentes asistencias. Te recomendamos adquirir un el Seguro Todo Riesgo, de esta manera disminuyes el impacto económico y material que este pueda producir, puede ser un seguro para moto o seguro para auto.
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
    <!-- Afiliation Section End -->
    <?php include("Footer.php")?>
</body>

</html>