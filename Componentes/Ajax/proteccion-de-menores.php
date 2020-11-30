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



<!-- Blog Details Section Begin -->
<div class="blog-details">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="blog__details__content">
                    <div class="col-lg-12 section-title"> 
                        <h2>PROTECCIÓN A MENORES</h2>
                       <br>
                        <h1>CONTRA LA PORNOGRAFÍA INFANTIL</h1>
                    </div>
                    <div class="blog__details__text">
                        <p>De acuerdo con la <span>Ley 679 de 2001</span> y <span>Ley 1336 de 2009</span>, mediante la cual se dictan disposiciones para prevenir y contrarrestar la explotación, la pornografía y el turismo sexual con menores de edad, de conformidad con lo establecido en dichas leyes, todas las personas deben prevenir, bloquear, combatir y denunciar la explotación, alojamiento, uso, publicación, difusión de imágenes, textos, documentos, archivos audiovisuales, uso indebido de redes globales de información, o el establecimiento de vínculos telemáticos de cualquier clase relacionados con material pornográfico o alusivo a actividades sexuales de menores de edad.</p>
                        
                        <p>En desarrollo de lo dispuesto en el artículo 17 de la <span>Ley 679 de 2001</span>, <span>Soluciones Vida Fácil S.A.S.</span> advierte al turista que la explotación y el abuso sexual de menores de edad en el país son considerados como delitos y por tanto sancionados penalmente.</p>

                        <p>En virtud del <span>Decreto 3840 de 2009</span>, <span> Soluciones Vida Fácil S.A.S.</span> ha adoptado un modelo de “Código de Conducta", que promueve políticas de prevención y evita la utilización y explotación sexual de niños, niñas y adolescentes en la actividad turística.</p>

                         <p>A si mismo <span>Soluciones Vida Fácil S.A.S.</span> apoya la Estrategia Nacional de Prevención de la Explotación Social y Comercial de Niños, Niñas y Adolescentes (ESCNNA) en el Contexto de viajes y Turismo, la cual tiene como objetivos:</p>
                             
                        <p><span>-</span> Empoderar al sector turístico como garante de los derechos de niños, niñas y adolescentes, blindando al sector turístico del delito de la ESCNNA, trata de personas, microtráfico, entre otros.</p>
                         
                        <p><span>-</span> Formar a los prestadores de servicios turísticos para la actuación ética responsable, sostenible y sustentable.</p>

                        <p><span>-</span> Promover la imagen de Colombia como un destino para el desarrollo de actividades turísticas responsables.</p>
                    
                    </div>
                    <div class="blog__details__widget">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <p>Tag: protección de Menores, Documento, Descarga</p>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="blog__details__widget__social">
                                    <span>Descargar:</span>
                                    <a href="forms/PROTECCION-DE-MENORES.pdf" download="Politicas de Protección de Menores (2020).pdf" style="background: #fff;"><i class="fas fa-file-pdf"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog Details Section End -->




        <!-- Application Form Section Begin -->
        <div class="afiliacion">      
            <a href="mb-empresarial"  rel="noopener noreferrer">
                <img src="img/afiliacion.png" alt="">
            </a>
        </div> 
  
        <?php include("Footer.php")?> 
</body>

</html>