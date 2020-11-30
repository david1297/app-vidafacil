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
                  <img src="img/banner/Portafolio/7.png" alt="">
                
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
                  <img src="img/post_servicio/salud/1.jpg" class="frontal" alt="">
                  <h3>Medico Pediatra</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 20%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Pediatra</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder a descuentos para consultas con especialistas calificados , recibe la mejor atención , en las consultas se genera historia clínica y en caso de ser necesario se pueden generar ordenes medicas de exámenes y medicamentos.
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
                  <img src="img/post_servicio/salud/2.jpg" class="frontal" alt="">
                  <h3>Consulta y Exámenes de Cardiologia</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 20%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Cardiologia</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder a descuentos en la Especialidad médica que se ocupa del estudio, diagnóstico, tratamiento y prevención de las enfermedades cardiovasculares a través de servicios como la consulta de cardiología, cardiología pediátrica, consulta por electrofisiología, exámenes por cardiología, de monitoreo electrocardiográfico, test de ejercicio, electrocardiograma de Ritmo entre otros.
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
                  <img src="img/post_servicio/salud/3.jpg" class="frontal" alt="">
                  <h3>Consulta Neurología</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 20%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Neurología</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder a descuentos para consultas con especialistas calificados, recibe la mejor atención, en las consultas se genera historia clínica y en caso de ser necesario se pueden generar ordenes medicas de exámenes y medicamentos.
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
                  <img src="img/post_servicio/salud/4.jpg" class="frontal" alt="">
                  <h3>Odontología y Procedimientos</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 40%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Odontología</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder a procedimientos de higiene oral y una completa valoración odontológica soportada con ayudas diagnósticas de primera elección, con el fin de realizar un diagnóstico general y especializado completo, que permitan la identificación temprana de la enfermedad bucal y la protección específica.
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
                  <img src="img/post_servicio/salud/5.jpg" class="frontal" alt="">
                  <h3>Laboratorio Clínico</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 40%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>servicio:</strong> Laboratorios</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder a servicios de laboratorio clínico , Con el análisis de muestras y fluidos corporales como sangre, orina, materia fecal, secreción vaginal o uretral ayudaran para diagnosticar, prevenir y controlar un gran número de patologías, la  toma de las muestras se puede realizar en algunos casos a domicilio de acuerdo al tipo de examen.
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
                  <img src="img/post_servicio/salud/6.jpg" class="frontal" alt="">
                  <h3>Medicina General</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 20%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Medicina General</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Recibe Tele orientación Médica por Video llamada o de forma presencial atención con un médico general, el profesional te brindará asesoría, resolverá tus inquietudes, generará recomendaciones y sugerirá medicamentos de venta libre en los casos que aplique.
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
                  <img src="img/post_servicio/salud/7.jpg" class="frontal" alt="">
                  <h3>Servicio de Terapias</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 40%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Terapias</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder a descuentos para Servicios de terapias de lenguaje, respiratorias, física, nebulizaciones, las cuales deben estar ya con con formula y diagnostico de un profesional de la salud.
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
                  <img src="img/post_servicio/salud/8.jpg" class="frontal" alt="">
                  <h3>Pruebas Genéticas</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 20%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Pruebas Genéticas</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder a descuentos para Servicios de pruebas genéticas como Prueba para conocer el sexo del bebé, tamizaje prenatal, perdida del embrazo, microbiomix, framacogenetica, entre otros.
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
                  <img src="img/post_servicio/salud/9.jpg" class="frontal" alt="">
                  <h3>Imágenes diagnosticas</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 40%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> AImágenes diagnosticas</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder a descuentos para la toma de estudios de imágenes diagnosticas para determinar qué sucede y ayudar a los profesionales de la salud respecto al diagnóstico y la toma de decisiones para el adecuado tratamiento de tus síntomas, los estudios como radiografías, tomografías, ecografías, Escanografia, mamografías, son ideales para ver los órganos, tejidos y estructuras internas del cuerpo por medio de procedimientos mínimamente invasivos.
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
                  <img src="img/post_servicio/salud/10.jpg" class="frontal" alt="">
                  <h3>Servicio de Nutricionista</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 20%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Nutrición</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Recibe la mejor atención virtual o presencial donde un profesional calificado  te brindará asesoría, resolverá tus inquietudes, generará recomendaciones y sugerirá medicamentos de venta libre en los casos que aplique.
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
                  <img src="img/post_servicio/salud/11.jpg" class="frontal" alt="">
                  <h3>Servicio de Psicología</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 20%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Psicología</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Recibe la mejor atención virtual o presencial donde un profesional calificado  te brindará asesoría, resolverá tus inquietudes, generará recomendaciones y sugerirá medicamentos de venta libre en los casos que aplique.
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
                  <img src="img/post_servicio/salud/12.jpg" class="frontal" alt="">
                  <h3>Servicio de Urología</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 20%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Urologia</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Recibe la mejor atención en la Especialidad médico quirúrgica que diagnostica y trata todas las patologías del aparato urinario masculino y femenino en niños y adultos, podrás acceder a consultas de urología, procedimientos como colocación de prótesis de pene, colocación de dispositivo de incontinencia urinaria, reconstrucciones de pene , correcciones de curvatura, entre otras.
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
                  <img src="img/post_servicio/salud/13.jpg" class="frontal" alt="">
                  <h3>Servicio de Oftalmologo</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 20%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Oftalmología</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder a descuentos para consultas de oftalmología especializada en cornea, ultrasonografía ocular, recuento de células, consulta por oftalmología especialista en ojo seco, uveítis, retina y vítreo plástica y oncológica, exámenes de agudeza visual, biometría, ecografía de orbita, medición de agudeza visual, recuento de células, sensibilidad al contaste, terapias, tomografías, procedimientos como cirugía de cataratas entre otros.
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
                  <img src="img/post_servicio/salud/14.jpg" class="frontal" alt="">
                  <h3>Consultas Dermatologicas</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 20%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Dermatologia</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Recibe la mejor atención donde un profesional calificado te brindará asesoría, resolverá tus inquietudes, generará recomendaciones y sugerirá medicamentos de venta libre en los casos que aplique, también podrás acceder a diferentes tratamientos como lo son valoraciones para la eliminación de manchas de acné, eliminación de arrugas, nutrición facial, entre otros.
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
                  <img src="img/post_servicio/salud/15.jpg" class="frontal" alt="">
                  <h3>Medicina Alternativa</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 20%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Medicina Alternativa</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder a descuentos para consultas homeopáticas, medicina alternativa, neural terapia, naturopatía, medicina tradicional china, además de tratamientos según sea el caso.
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
                  <img src="img/post_servicio/salud/16.jpg" class="frontal" alt="">
                  <h3>Medicina Reproductiva</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 20%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Medicina Reproductiva</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Recibe la mejor atención donde un profesional calificado podrás acceder a diferentes tratamientos como lo son exámenes para inicio de fertilización in vitro, consulta con especialista en reproducción, crio preservación de óvulos, fertilización, inseminación, entre otros.
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
                  <img src="img/post_servicio/salud/17.jpg" class="frontal" alt="">
                  <h3>Neurologia</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 20%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Neurologia</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder a descuentos para consultas con especialistas calificados, recibe la mejor atención, en las consultas se genera historia clínica y en caso de ser necesario se pueden generar ordenes medicas de exámenes y medicamentos.
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
                  <img src="img/post_servicio/salud/18.jpg" class="frontal" alt="">
                  <h3>Gastroenterología</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 20%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Gastroenterología</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder a descuentos para consultas con especialistas calificados, recibe la mejor atención, en las consultas se genera historia clínica y en caso de ser necesario se pueden generar ordenes medicas de exámenes y medicamentos.
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
                  <img src="img/post_servicio/salud/19.jpg" class="frontal" alt="">
                  <h3>Ginecología</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 20%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Ginecología</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder a descuentos para consultas con especialistas calificados, recibe la mejor atención, en las consultas se genera historia clínica y en caso de ser necesario se pueden generar ordenes medicas de exámenes y medicamentos.
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
                  <img src="img/post_servicio/salud/20.jpg" class="frontal" alt="">
                  <h3>Medicina Estética</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 20%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Medicina Estética</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder a consultas para tratamientos faciales, corporales y estéticos como lo son, abdominosplastia, aumento de senos, aumento de glúteos, levantamiento de senos, marcación abdominal, rinoplastia,  cirugía de mentón de orejas parpados, reducción de mejillas, entre otros.
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
                  <img src="img/post_servicio/salud/21.jpg" class="frontal" alt="">
                  <h3>Ginecobstetricia</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 20%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Ginecobstetricia</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder a descuentos para consultas con especialistas calificados, recibe la mejor atención, en las consultas se genera historia clínica y en caso de ser necesario se pueden generar ordenes medicas de exámenes y medicamentos.
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
                  <img src="img/post_servicio/salud/22.jpg" class="frontal" alt="">
                  <h3>Infectologia</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 20%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Infectologia</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder a descuentos para consultas con especialistas calificados, recibe la mejor atención, en las consultas se genera historia clínica y en caso de ser necesario se pueden generar ordenes medicas de exámenes y medicamentos.
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
                  <img src="img/post_servicio/salud/23.jpg" class="frontal" alt="">
                  <h3>Neumonologia</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 20%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Neumonologia</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder a descuentos para consultas con especialistas calificados, recibe la mejor atención, en las consultas se genera historia clínica y en caso de ser necesario se pueden generar ordenes medicas de exámenes y medicamentos.
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
                  <img src="img/post_servicio/salud/24.jpg" class="frontal" alt="">
                  <h3>Neurocirugía</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 20%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Neurocirugía</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder a descuentos para consultas con especialistas calificados, recibe la mejor atención, en las consultas se genera historia clínica y en caso de ser necesario se pueden generar ordenes medicas de exámenes y medicamentos.
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
                  <img src="img/post_servicio/salud/25.jpg" class="frontal" alt="">
                  <h3>Hepatología</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 20%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Hepatología</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder a descuentos para consultas con especialistas calificados, recibe la mejor atención, en las consultas se genera historia clínica y en caso de ser necesario se pueden generar ordenes medicas de exámenes y medicamentos.
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
                  <img src="img/post_servicio/salud/26.jpg" class="frontal" alt="">
                  <h3>Medicina Interna</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 20%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Medicina Interna</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder a descuentos para consultas con especialistas calificados, recibe la mejor atención, en las consultas se genera historia clínica y en caso de ser necesario se pueden generar ordenes medicas.
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
                  <img src="img/post_servicio/salud/27.jpg" class="frontal" alt="">
                  <h3>Nefrologia</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 20%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Nefrologia</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder a descuentos para consultas con especialistas calificados, recibe la mejor atención, en las consultas se genera historia clínica y en caso de ser necesario se pueden generar ordenes medicas de exámenes y medicamentos.
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
                  <img src="img/post_servicio/salud/28.jpg" class="frontal" alt="">
                  <h3>Psiquiatría</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 20%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Psiquiatría</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder a descuentos para consultas con especialistas calificados, recibe la mejor atención, en las consultas se genera historia clínica y en caso de ser necesario se pueden generar ordenes medicas de exámenes y medicamentos.
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
                  <img src="img/post_servicio/salud/29.jpg" class="frontal" alt="">
                  <h3>Reumatología</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 20%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Reumatología</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder a descuentos para consultas con especialistas calificados, recibe la mejor atención, en las consultas se genera historia clínica y en caso de ser necesario se pueden generar ordenes medicas de exámenes y medicamentos.
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
                  <img src="img/post_servicio/salud/30.jpg" class="frontal" alt="">
                  <h3>Ortopedia</h3>
                  <figcaption class="trasera">
                    <h2><strong>Descuento:</strong> Hasta el 20%</h2>
                    <h2><strong>Cobertura:</strong> Nacional</h2>
                     <h2><strong>Servicio:</strong> Ortopedia</h2>
                    <hr>
                    <h2><strong>Descripción:</strong></h2>
                    <p>
                      Podrás acceder a descuentos para consultas con especialistas calificados, recibe la mejor atención, en las consultas se genera historia clínica y en caso de ser necesario se pueden generar ordenes medicas de exámenes y medicamentos.
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