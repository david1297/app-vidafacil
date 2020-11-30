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
                  <img src="img/banner/Portafolio/3.png" alt="">
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
                  <img src="img/post_servicio/binestar/1.jpg" class="frontal" alt="">
                  <h3>Aumento de Labios</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 20 % </h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Aumento de Labios (Ácido Hialurónico)</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Es una técnica ambulatoria mínimamente invasiva de efectos inmediatos y casi indolora en la cual mediante una micro-aguja, se inyectan los labios con ácido hialurónico, con el fin de aumentar su grosor, perfilarlos y elevar las comisuras.
                      Dirigido a pacientes que deseen aumentar el tamaño de sus labios, así como brindarles hidratación y vitaminas, modalidad de servicio.</p>
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
                  <img src="img/post_servicio/binestar/2.jpg" class="frontal" alt="">
                  <h3>Eliminaión de Arrugas en la Frente</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 20 % </h2>
                    <h2><strong>Cobertura:</strong> Nacional.</h2>
                     <h2><strong>Servicio:</strong> Eliminación de Arrugas en la Frente</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>El Botox permite modular la contracción de los músculos de la mímica facial logrando un aspecto más relajado y fresco. La cantidad de unidades requeridas depende de fuerza y configuración muscular, y no es estándar para todos los pacientes. Los hombres pueden requerir más unidades porque sus músculos son más fuertes.</p>
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
                  <img src="img/post_servicio/binestar/3.jpg" class="frontal" alt="">
                  <h3>Radiofrecuencia Facial</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 20 % </h2>
                    <h2><strong>Cobertura:</strong> Nacional.</h2>
                     <h2><strong>Servicio:</strong> Radiofrecuencia Facial</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>Podrás acceder a consulta de bienestar y mediante el procedimiento consigue estimular la producción de colágeno, por lo que nuestra piel se vuelve más flexible y resistente. Esto, al mismo tiempo, permite prevenir los efectos del paso del tiempo, retrasando la aparición de las arrugas y disminuyendo la apariencia de las líneas de expresión.</p>
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
                  <img src="img/post_servicio/binestar/4.jpg" class="frontal" alt="">
                  <h3>Depilación Laser</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 20 %</h2>
                    <h2><strong>Cobertura</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Depilación Laser</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>Podrás acceder a consulta de bienestar, la depilación láser es un método de eliminación de vello de forma permanente mediante la emisión lumínica de láser, por lo que es un tipo de foto depilación.</p>
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
                  <img src="img/post_servicio/binestar/5.jpg" class="frontal" alt="">
                  <h3>Eliminación de Patas de Gallina</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 20 %</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Eliminación De Patas De Gallina</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>Podrás acceder a consulta de bienestar, Una de las imperfecciones estéticas que más comúnmente buscan eliminar las mujeres son las arrugas en la zona de los ojos, mejor conocidas como patas de gallina. Por esta razón, antes de iniciar cualquier tratamiento es necesario conocer cuáles son las mejores opciones que se tienen para eliminarlas de forma segura.</p>
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
                  <img src="img/post_servicio/binestar/6.jpg" class="frontal" alt="">
                  <h3>Eliminación De Ojeras</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 20 %</h2>
                    <h2><strong>Cobertura:</strong> Vehículos y Motos</h2>
                     <h2><strong>Servicio:</strong> Eliminación De Ojeras</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>Podrás acceder a consulta de bienestar El ácido hialurónico para las ojeras permite recuperar el volumen perdido y rellena la ojera para igualar y proyectar la zona. Con las infiltraciones, la piel se ve más gruesa, con un tono mucho más unificado, disimulando así las ojeras y el aspecto del cansancio de la mirada.</p>
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
                  <img src="img/post_servicio/binestar/7.jpg" class="frontal" alt="">
                  <h3>Estiramiento Facial De Cuello</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 20 %</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong>  Estiramiento Facial De Cuello</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>Podrás acceder a consulta de bienestar,  Los hilos de colágeno es una técnica individualizada para cada paciente y ayuda a combatir la flacidez. El material es reabsorbible y generalmente se necesitan entre 10 y 20 hilos.</p>
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
                  <img src="img/post_servicio/binestar/8.jpg" class="frontal" alt="">
                  <h3>Eliminación De Lunares</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 20 %</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Eliminación De Lunares</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder a consulta de bienestar, La mayoría de los lunares y acro cordones no requieren tratamiento. Pero, en ocasiones, las personas quieren eliminarlos por razones cosméticas.
                    </p>
                    <hr>
                      <h2><strong>Términos y Condiciones:</strong></h2>
                      <p>Los servicios se prestan en horarios de oficina, aplican restricciones y condiciones para uso del servicio, 
                        comunicarse con los medios de atención de S.V.F para conocer las políticas de uso del mismo.
                      </p>
                  
                    </figcaption>
                </figure>
            </div>
          </div>

          <div class="col-md-4 col-12"> 
            
            <div class="contenedor_tarjeta">
              <a href="https://api.whatsapp.com/send?phone=573054232363&text=Hola,%20Quiero%20solicitar%20un%20servicio."  rel="noopener noreferrer"><h1>¡Solicitar Ahora!</h1></a>
                <figure id="tarjeta">
                  <img src="img/post_servicio/binestar/9.jpg" class="frontal" alt="">
                  <h3>Asesoría De Cirugía Plásticas</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 20 %</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Tipo:</strong> Asesoría De Cirugía Plásticas</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>Podrás acceder a consulta de bienestar, A través de este servicio tendrás la oportunidad de conocer al médico especialista en cirugía plástica para resolver las inquietudes que tengas sobre el procedimiento. Así mismo, el médico podrá conocer cuáles son tus expectativas y necesidades para recomendarte los procedimientos adecuados para ti.</p>
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