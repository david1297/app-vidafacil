    <div class="cohete">
        <img src="img/cohete.png" alt="">
    </div>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-2 col-sm-6">
                    <div class="footer__widget">
                        <h5>SITIOS</h5>
                        <ul>
                            <li><a href="./">Inicio</a></li>
                            <li><a href="sol-portafolio">Servicios</a></li>
                            
                            <li><a href="cursos">Cursos</a></li>
                            <li><a href="contacto">Contacto</a></li>                     
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h5>SERVICIOS</h5>
                        <ul>
                            <li><a href="sol-portafolio">Portafolio Soluciones Vida Fácil</a></li>
                            <li><a href="viajes">Viaja con Nosotros</a></li>
                            <li><a href="afiliacion">Afilia tu Marca</a></li>
                            <li><a href="sol-empresarial">soluciones Empresariales</a></li>
                            <li><a href="sol-familiar">Soluciones Hogar</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h5>POLÍTICAS</h5>
                        <ul>
                            <li><a href="tratamiento-de-datos">Política de Tratamiento de datos</a></li>
                            <li><a href="uso-de-informacion">Uso de mi información personal</a></li>
                            <li><a href="tratamiento-por-terceros">Uso de información por terceros</a></li>
                            <li><a href="terminos&condiciones">Términos & Condiciones</a></li>
                            <li><a href="proteccion-de-menores">Protección de Menores</a></li>
                            <li><a href="forms/SOLICITUD DE PQR.pdf" download="Formulario de PQR.pdf">Solicitud PQR</a></li>
                            
                        </ul>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo" >
                            <a href="https://www.sic.gov.co/" target="_blank"><img src="img/sic.png" alt=""></a>
                        </div>
                        <p>¡Soluciones para Todo!</p>
                        <ul>
                            <li>Correo : info@solucionesvidafacil.com</li>
                            <li>Teléfono : (+57) 305 423 2363</li>
                            <li>Nueva linea de atención : (1)+7292080</li>                       
                        </ul>
                    </div>
                </div>
            </div>
    
            <div class="col-lg-12 col-md-12 col-sm-6">
                <div class="row">
                    <div class="col-md-6 img-foot">
                    <a >
                        <img src="img/epayco.png" alt=""></a>
                    </div>
                    <div class="col-md-6 img-foot">
                        <a><img src="img/pagos.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>

            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> Todos los derechos reservados | Diseñado por <a href="https://sebastiancristo.com" target="_blank">Sebástian Cristo</a></p>
                    </div>
                </div>
            </div>
    </footer>
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        $(document).ready(CargarCarrito());

        function Pagar(){
            $.ajax({
                url: "Admin/Ajax/ComprobarLogin.php",
                type: "GET",
                beforeSend: function(objeto){ 
                },
                success: function(datos){ 
                    var Res = datos.split('*');
                    if(Res[1]=='Iniciar'){
                        $("#Login").modal("show");
                    } else{
                        var Total = $('#TotalCarrito').val();
                        if(Total==0){
                            alert("No has seleccionado ningun producto");
                        }else{
                            location.href="Pedido.php";
                        }
                        
                    }
                }	 
            }); 
        }
        $("#Form-Login").submit(function(event) { 
         
            var parametros = $(this).serialize();
            $.ajax({
                url: "Admin/Ajax/Login.php",
                type: "POST",
                data: parametros,
                beforeSend: function(objeto){ 
                    $("#Cargando-Login").show();
                    $("#Respuesta-Login").html("");
                },
                success: function(datos){ 
                    $("#Cargando-Login").hide();
                    var Res = datos.split('*');
                    if(Res[1]=='Correcto'){
                        $("#Respuesta-Login").html(Res[2]);
                        $("#Login").modal("hide");
                        location.reload();
                    } else{
                        $("#Respuesta-Login").html(datos);
                    }
                }	 
            });
         
        event.preventDefault();
    });
    $("#Form-Registro").submit(function(event) { 
        var parametros = $(this).serialize();
            $.ajax({
                url: "Admin/Ajax/Registro.php",
                type: "POST",
                data: parametros,
                beforeSend: function(objeto){ 
                    $("#Cargando-Registro").show();
                    $("#Respuesta-Registro").html("");
                },
                success: function(datos){ 
                    $("#Cargando-Registro").hide();
                    var Res = datos.split('*');
                    if(Res[1]=='Correcto'){
                        $("#Respuesta-Registro").html(Res[2]);
                        $("#Registro").modal("hide");
                        location.reload();
                    } else{
                        $("#Respuesta-Registro").html(datos);
                    }
                }	 
            });
        event.preventDefault();
    });
    function Login(){
        $("#Registro").modal("hide");
        $("#Login").modal("show");
    }
    function Registro(){
        $("#Login").modal("hide");
        $("#Registro").modal("show");
    }


        function CambiarCantidadC(Tipo,Id){
            var Cantidad = $('#Cantidad-'+Id).val();
            if((Cantidad==1)&&(Tipo=="Menos")){
                $.ajax({
                    type: "GET",
                    url: "Admin/Ajax/EliminarC.php?Id="+Id,
                    beforeSend: function(objeto){
                    },
                    success: function(datos){ 
                        CargarCarrito();
                    }
                });
            }else{
                $.ajax({
                    type: "GET",
                    url: "Admin/Ajax/CambiarCantidadC.php?Id="+Id+"&Tipo="+Tipo,
                    beforeSend: function(objeto){
                    },
                    success: function(datos){ 
                        CargarCarrito();
                    }
                });
            }
        }
        function CargarCarrito(){
            $.ajax({
                type: "GET",
                url: "Admin/Ajax/CargarCarrito.php",
                beforeSend: function(objeto){
                },
                success: function(datos){ 
                    $('#CarritoLg').html(datos);
                }
            });
            $.ajax({
                type: "GET",
                url: "Admin/Ajax/CargarNCarrito.php",
                beforeSend: function(objeto){
                },
                success: function(datos){ 
                    $('#cardN').html(datos);
                    $('#cardNM').html(datos);
                }
            });
            
        }
        function AgregarCarrito(Id){
            $.ajax({
                type: "GET",
                url: "Admin/Ajax/AgregarAlCarrito.php?Id="+Id,
                beforeSend: function(objeto){
                },
                success: function(datos){ 
                    CargarCarrito();
                }
            });
            $(".loader").fadeIn();
            $("#preloder").fadeIn();
            $(".loader").fadeOut();
            $("#preloder").delay(200).fadeOut("slow");
        }
        (function(){
            $('#cart').on('click',function(){
                $('.shopping-cart').fadeToggle('fast');
            });
            $('#cartM').on('click',function(){
                $('.shopping-cart').fadeToggle('fast');
            });
        }());
            </script>