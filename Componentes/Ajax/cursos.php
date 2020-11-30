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
            <div class="single-hero-item set-bg">
              <img src="img/banner/servicios/10.png" alt="">
            </div>
    </div>
</section>

<br>
    <!-- Hero Section2 Begin -->
    <section>
        <div class="col-lg-12">
            <br>
            <div class="section-title center-title">
                 <h2> Nuestros Cursos</h2>
                <span style="color: black;">¡Los cursos mas populares a tu alcance con Soluciones vida fácil!</span>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-12 bor">
                    <div class="cont-curso">    
                        <div class="card-curso">
                            <img src="https://static-media.hotmart.com/fUhMmj2RP4W5QN0vvsC4uLwuv68=/filters:background_color(white)/hotmart/product_pictures/6a34df99-60b2-4179-ad00-1c31c2715059/NuevaCosturaPM.jpeg"/>
                            <div class="info">
                                <h1>Nueva Costura</h1>
                                <p>En este curso aprenderás todas las tecnicas y herramientas para elaborar cualquier tipo de prenda y explotar tu creatividad.</p>
                                <a href="https://go.hotmart.com/D40465475C"  rel="noopener noreferrer"><button>Inscribirme</button></a>
                            </div>
                        </div>
                    </div>
                   <!--  <div class="card">
                        <h1 class="title-curso">Nueva Costura</h1>  
                    </div> -->
                         
                </div>

                <div class="col-md-3 col-12 bor">
                    <div class="cont-curso">    
                        <div class="card-curso">
                            <img src="https://static-media.hotmart.com/6Es00XmbFvfXLqgZEZKRHeV1MMk=/filters:background_color(white)/hotmart/product_pictures/d6c45989-c4d9-4dcf-ae8e-56ddbaef1eb6/600.jpg"/>
                            <div class="info">
                                <h1>Educanino</h1>
                                <p>Con este curso aprenderás a entrenar a tu mascota enseñandole trucos, tecnicas, cuidados basicos y como prevenir problemas de comportamiento.</p>
                                <a href="https://go.hotmart.com/X40465351I"  rel="noopener noreferrer"><button>Inscribirme</button></a>
                            </div>
                        </div>
                    </div>       
                </div>

                <div class="col-md-3 col-12 bor">
                    <div class="cont-curso">    
                        <div class="card-curso">
                            <img src="https://static-media.hotmart.com/Q7Y5Y_ZCssvo3S8ICqhqS6IuS_s=/filters:background_color(white)/hotmart/product_pictures/4a5afccc-1c86-4ce9-aa63-22b11dffa5cf/2POSTALAutocontrolB.png"/>
                            <div class="info">
                                <h1>Autocontrol</h1>
                                <p>En este curso desarrollarás tecnicas y habitos de autocontrol emocional para ti y todos los integrantes de tu familia para mejorar sus relaciones.</p>
                                <a href="https://go.hotmart.com/V40464470N"  rel="noopener noreferrer"><button>Inscribirme</button></a>
                            </div>
                        </div>
                    </div>       
                </div>

                <div class="col-md-3 col-12 bor">
                    <div class="cont-curso">    
                        <div class="card-curso">
                            <img src="https://static-media.hotmart.com/RbIdzSBHcxladym9pn_O3-eLuHQ=/filters:background_color(white)/hotmart/product_pictures/ba30b075-b232-40bf-8a20-9f776bcb43e4/sello19.jpg"/>
                            <div class="info">
                                <h1>Ex Maquillaje</h1>
                                <p>En este curso aprenderás tecnicas y habilidades para maquillaje corporal de manera profesional con alto nivel de detalle y realismo para generar impacto.</p>
                                <a href="https://go.hotmart.com/C40465668C"  rel="noopener noreferrer"><button>Inscribirme</button></a>
                            </div>
                        </div>
                    </div>       
                </div>

                <div class="col-md-3 col-12 bor">
                    <div class="cont-curso">    
                        <div class="card-curso">
                            <img src="https://static-media.hotmart.com/nQ2UyQ4EoGJELgtJLZ93dRN_nic=/filters:background_color(white)/hotmart/product_pictures/8be47f6e-1341-4176-8a2e-e7d4aaf45f26/ketoMesadetrabajo1100.jpg"/>
                            <div class="info">
                                <h1>Plan 30 Dias Keto</h1>
                                <p>El plan 30 días Keto es un ebook súper completo con el que aprenderás a perder peso con la dieta mas famosa del mundo por sus verdaderos resultados. Te diremos que comer y cuando comer.</p>
                                <a href="https://go.hotmart.com/C40465711P"  rel="noopener noreferrer"><button>Inscribirme</button></a>
                            </div>
                        </div>
                    </div>       
                </div>

                <div class="col-md-3 col-12 bor">
                    <div class="cont-curso">    
                        <div class="card-curso">
                            <img src="https://static-media.hotmart.com/wlmOuQM5VDgcPDAOXc2NHCdAY_o=/filters:background_color(white)/hotmart/product_pictures/8cd22388-a19a-4bd2-9f3c-d6a280f9e543/mainproductblue111.png"/>
                            <div class="info">
                                <h1>Sistema Diabetes</h1>
                                <p>4 descubrimientos que te harán ver la diabetes de una manera diferente.</p>
                                <a href="https://go.hotmart.com/F40465434B"  rel="noopener noreferrer"><button>Inscribirme</button></a>
                            </div>
                        </div>
                    </div>       
                </div>

                <div class="col-md-3 col-12 bor">
                    <div class="cont-curso">    
                        <div class="card-curso">
                            <img src="https://static-media.hotmart.com/S5g1cdulpY3jM2AzS2sHTDTolQQ=/filters:background_color(white)/hotmart/product_pictures/72c1744d-304f-4d7b-aa39-f8084a689db6/LogoStyle3.jpg"/>
                            <div class="info">
                                <h1>BB Glow School</h1>
                                <p>Aprende La Técnica De Rejuvenecimiento Facial Que Está Revolucionando El Mundo De La Belleza e Incrementa Las Ventas De Tu Negocio.</p>
                                <a href="https://go.hotmart.com/V40931702R"  rel="noopener noreferrer"><button>Inscribirme</button></a>
                            </div>
                        </div>
                    </div>       
                </div>

                <div class="col-md-3 col-12 bor">
                    <div class="cont-curso">    
                        <div class="card-curso">
                            <img src="https://static-media.hotmart.com/QN-AMOI0uHoyjO9_2ccxtXPxQoI=/filters:background_color(white)/hotmart/product_pictures/09c66127-6aae-41c6-a119-3d8aace3c568/hm.png"/>
                            <div class="info">
                                <h1>Maestro del Orgasmo</h1>
                                <p>Descubre Un Método Extraño Para Durar Más Tiempo En La Cama y Eliminar Para Siempre La Eyaculación Precoz</p>
                                <a href="https://go.hotmart.com/G40931860V"  rel="noopener noreferrer"><button>Inscribirme</button></a>
                            </div>
                        </div>
                    </div>       
                </div>

                <div class="col-md-3 col-12 bor">
                    <div class="cont-curso">    
                        <div class="card-curso">
                            <img src="https://static-media.hotmart.com/D9EDpKDe7aFMXxf8jMa46YrBrOg=/filters:background_color(white)/hotmart/product_pictures/d4fe410f-4d3d-43da-96e0-a0d2f9a1613d/Diapositiva1.JPG"/>
                            <div class="info">
                                <h1>Curso de Pizzero</h1>
                                <p>Aprende un oficio que no conoce la crisis y disfruta con familiares y amigos.</p>
                                <a href="https://go.hotmart.com/D40932060P"  rel="noopener noreferrer"><button>Inscribirme</button></a>
                            </div>
                        </div>
                    </div>       
                </div>
                
                <div class="col-md-3 col-12 bor">
                    <div class="cont-curso">    
                        <div class="card-curso">
                            <img src="https://static-media.hotmart.com/5RIMkRKOpVXkTd94-a4kBEvGRJo=/filters:background_color(white)/hotmart/product_pictures/6838e852-c8e6-4c74-8bca-8a906cdbd248/jardinverticalhotmart.jpg"/>
                            <div class="info">
                                <h1>Arma tu propio Jardín Vertical en casa</h1>
                                <p>Diseña y contruye un espectacular Jardin Vertical con tus propias manos. Te enseñamos el mejor y más sencillo método para hacerlo</p>
                                <a href="https://go.hotmart.com/B40932780X"  rel="noopener noreferrer"><button>Inscribirme</button></a>
                            </div>
                        </div>
                    </div>       
                </div>

                <div class="col-md-3 col-12 bor">
                    <div class="cont-curso">    
                        <div class="card-curso">
                            <img src="https://static-media.hotmart.com/MZY1GZ2rQty1Y35WWfDqxw2HmNw=/filters:background_color(white)/hotmart/product_pictures/0909e637-3996-4186-8423-dc3da0713094/libro.jpg"/>
                            <div class="info">
                                <h1>Whatsapp Tu Cajero Automático</h1>
                                <p>te gustaría descubrir cómo convertir a WhatsApp en un verdadero cajero automático, crear tu propio clan digital, generar campañas de marketing y sobre todo generar tráfico desde tus redes sociales.</p>
                                <a href="https://go.hotmart.com/V40933165J"  rel="noopener noreferrer"><button>Inscribirme</button></a>
                            </div>
                        </div>
                    </div>       
                </div>

                <div class="col-md-3 col-12 bor">
                    <div class="cont-curso">    
                        <div class="card-curso">
                            <img src="https://static-media.hotmart.com/qlVfGZAIJ94yLMe13GY5_CFMvJ4=/filters:background_color(white)/hotmart/product_pictures/38dee54a-2894-46ad-be19-f39d68504645/LOGOEAV1997.jpg"/>
                            <div class="info">
                                <h1>Gana Dinero Viendo Anuncios</h1>
                                <p>aprenderás las tecnicas y los trucos para ganar dinero viendo Anuncios en Internet.</p>
                                <a href="https://go.hotmart.com/L40932576Q"  rel="noopener noreferrer"><button>Inscribirme</button></a>
                            </div>
                        </div>
                    </div>       
                </div>

                <div class="col-md-3 col-12 bor">
                    <div class="cont-curso">    
                        <div class="card-curso">
                            <img src="https://varicesnuncamas.com/banner/imagen300x250.jpg"/>
                            <div class="info">
                                <h1>Varices Nunca Más</h1>
                                <p>¿Quiere Conocer el Método Oculto Que Hace Desaparecer Várices y Arañas Vasculares en 60 Días o Menos?</p>
                                <a href="http://vidafacil2.varices9.hop.clickbank.net"  rel="noopener noreferrer"><button>Inscribirme</button></a>
                            </div>
                        </div>
                    </div>       
                </div>

                <div class="col-md-3 col-12 bor">
                    <div class="cont-curso">    
                        <div class="card-curso">
                            <img src="https://gimnasiafacial.net/banner/imagen300x270.jpg"/>
                            <div class="info">
                                <h1>Gimnasia Facial</h1>
                                <p>Descubre el Secreto AntiAge Para Lucir Un Rostro 5, 10 y Hasta 20 Años Más Joven en Solo 30 Días!</p>
                                <a href="http://vidafacil2.gimfacial.hop.clickbank.net"  rel="noopener noreferrer"><button>Inscribirme</button></a>
                            </div>
                        </div>
                    </div>       
                </div>

                <div class="col-md-3 col-12 bor">
                    <div class="cont-curso">    
                        <div class="card-curso">
                            <img src="https://enderezarlaspiernas.com/banner/imagen300x250.jpg"/>
                            <div class="info">
                                <h1>Cómo Enderezar Las Piernas</h1>
                                <p>¿Quiere Descubrir Como Corregir la Molesta Curvatura de Sus Piernas en 60 Días o Menos, Utilizando un Método 100% Efectivo, Natural y Comprobado?</p>
                                <a href="http://vidafacil2.endepierna.hop.clickbank.net"  rel="noopener noreferrer"><button>Inscribirme</button></a>
                            </div>
                        </div>
                    </div>       
                </div>

                <div class="col-md-3 col-12 bor">
                    <div class="cont-curso">    
                        <div class="card-curso">
                            <img src="https://zcodesystem.com/images/nuts/spanish/300z250-2.jpg"/>
                            <div class="info">
                                <h1>Zcode System</h1>
                                <p>Nunca nadie en el mundo de las apuestas ofreció un servicio o producto para ganar dinero primero y luego se le cobrará porque sabían que no funcionaría.</p>
                                <a target="_blank" href="http://vidafacil2.zcodesys.hop.clickbank.net"  rel="noopener noreferrer"><button>Inscribirme</button></a>
                            </div>
                        </div>
                    </div>       
                </div>

                <div class="col-md-3 col-12 bor">
                    <div class="cont-curso">    
                        <div class="card-curso">
                            <img src="https://customketodiet.com/uploads/banners/es/keto-diet-fb-banner-2.jpg"/>
                            <div class="info">
                                <h1>Custom Dieta keto</h1>
                                <p>Obtenga Su Plan DE Dierta Keto Personalizado de 8 semanas</p>
                                <a target="_blank" href="http://vidafacil2.1keto.hop.clickbank.net"  rel="noopener noreferrer"><button>Inscribirme</button></a>
                            </div>
                        </div>
                    </div>       
                </div>

                <div class="col-md-3 col-12 bor">
                    <div class="cont-curso">    
                        <div class="card-curso">
                            <img src="https://image.freepik.com/foto-gratis/gato-sobre-fondo-blanco_155003-15385.jpg"/>
                            <div class="info">
                                <h1>Cat Spray Stop</h1>
                                <p>El Increible Spray Para Gatos Ha llegado A Un click De Distancia</p>
                                <a target="_blank" href="https://catspraystop.com/index_en.php?hop=vidafacil2"  rel="noopener noreferrer"><button>Inscribirme</button></a>
                            </div>
                        </div>
                    </div>       
                </div>

                <div class="col-md-3 col-12 bor">
                    <div class="cont-curso">    
                        <div class="card-curso">
                            <img src="https://image.freepik.com/foto-gratis/hoja-calculo-papel-tabla-desarrollo-financiero-cuenta-estadisticas-analisis-inversiones_39768-592.jpg"/>
                            <div class="info">
                                <h1>Excel Full</h1>
                                <p>El mejor curso de Excel Online en español, Empieza hoy mismo a aprender Microsoft Excel desde lo básico a lo avanzado. Excelfull lleva más de 8 años enseñando Excel con la metodología más didáctica e innovadora.</p>
                                <a target="_blank" href="https://12b21lx7fcf6oehjh0vqo6z743.hop.clickbank.net/"  rel="noopener noreferrer"><button>Inscribirme</button></a>
                            </div>
                        </div>
                    </div>       
                </div>

                <div class="col-md-3 col-12 bor">
                    <div class="cont-curso">    
                        <div class="card-curso">
                            <img src="https://corsoaddestramentocani.com/wp-content/uploads/2015/05/adc3d-piccolo1-246x300.jpg"/>
                            <div class="info">
                                <h1>Adiestramiento Canino</h1>
                                <p>Imagina por un segundo. Tu perro te sigue, te espera sentado afuera mientras tomas un café, en cuanto lo llamas por su nombre tienes toda su atención, puedes dejarlo libre en el parque sin problemas, solo un no para entenderse completamente.</p>
                                <a target="_blank" href="https://f37c0lw-n6bxua6nt9q9zj9x3n.hop.clickbank.net/"  rel="noopener noreferrer"><button>Inscribirme</button></a>
                            </div>
                        </div>
                    </div>       
                </div>
                
         
            </div>
        </div>
    </section>


    <!-- Afiliacion Section Begin -->
    <div class="afiliacion">      
        <a href="membresia"  rel="noopener noreferrer">
            <img src="img/afiliacion.png" alt="">
        </a>
    </div> 
    <?php include("Footer.php")?>
</body>

</html>