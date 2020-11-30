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

<body class="fondo3">
    <?php include("Menu.php")?>
    <section class="contact spad" >
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4" >
                    <div class="card">
                        <div class="bord contact__address" style="background-color:#edf1f5;">
                            <h4 style="text-align:center;">Categorias</h4>
                            <hr>
                            <ul>
                                <li>
                                    <div class="icon">
                                        <i class="fas fa-adjust"></i>
                                    </div>
                                <a href="serv-asesoria"  rel="noopener noreferrer"><p><span>Asesorías</span></p></a> 
                                </li>

                                <li>
                                    <div class="icon">
                                        <i class="fas fa-adjust"></i>
                                    </div>
                                <a href="serv-binestar"  rel="noopener noreferrer"><p><span>Bienestar</span></p></a> 
                                </li>

                                <li>
                                    <div class="icon">
                                        <i class="fas fa-adjust"></i>
                                    </div>
                                    <a href="serv-educacion"  rel="noopener noreferrer"><p><span>Educación</span></p></a> 
                                </li>

                                <li>
                                    <div class="icon">
                                        <i class="fas fa-adjust"></i>
                                    </div>
                                    <a href="serv-mascotas"  rel="noopener noreferrer"><p><span>Mascotas</span></p></a> 
                                </li>

                                <li>
                                    <div class="icon">
                                        <i class="fas fa-adjust"></i>
                                    </div>
                                    <a href="serv-materiales"  rel="noopener noreferrer"><p><span>Construcción</span></p></a> 
                                </li>

                                <li>
                                    <div class="icon">
                                        <i class="fas fa-adjust"></i>
                                    </div>
                                    <a href="serv-salud"  rel="noopener noreferrer"><p><span>Salud</span></p></a> 
                                </li>

                                <li>
                                    <div class="icon">
                                        <i class="fas fa-adjust"></i>
                                    </div>
                                    <a href="serv-turismo"  rel="noopener noreferrer"><p><span>Turismo</span></p></a> 
                                </li>

                                <li>
                                    <div class="icon">
                                        <i class="fas fa-adjust"></i>
                                    </div>
                                    <a href="serv-vehiculos"  rel="noopener noreferrer"><p><span>Vehículos</span></p></a> 
                                </li>

                                <li>
                                    <div class="icon">
                                        <i class="fas fa-adjust"></i>
                                    </div>
                                    <a href="serv-otros"  rel="noopener noreferrer"><p><span>Productos</span></p></a> 
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class=" col-lg-8 col-md-8">
                    <div class="card border">
                        <div class="contact__form border" style="background-color:#edf1f5;">
                            <h4>Afiliate Ahora Mismo!</h4>
                            <br>
                            <form action="forms/correo.php" method="post" role="form">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text"  name="nombre" id="nombre" placeholder="Nombre" data-rule="minlen:4" data-msg="Ingrese un Nombre valido" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="apellido" id="apellido" placeholder="Apellido" data-rule="minlen:4" data-msg="Ingrese un Apellido valido" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="telefono" id="telefono" placeholder="Numero Telefónico" data-rule="minlen:7" data-msg="Ingrese un teléfono" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="email" name="correo" id="correo" placeholder="Correo Electrónico" data-rule="email" data-msg="Ingrese un correo electrónico valido" required>
                                    </div>
                                    <div class="col-lg-12">
                                        <select class="form-control" name="categoria" id="categoria">
                                            <option>Asesorías</option>
                                            <option>Bienestar</option>
                                            <option>Educación</option>
                                            <option>Mascotas</option>
                                            <option>Construcción</option>
                                            <option>Salud</option>
                                            <option>Turismo</option>
                                            <option>Vehículos</option>
                                            <option>Productos</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-12">
                                        <br>
                                    <textarea name="mensaje" id="mensaje" placeholder="Escribe tu mensaje"></textarea>
                                    </div>
                                    <div class="col-lg-12"> 
                                        <input type="checkbox" class="check-box" id="cbox2" name="checkb" value="second_checkbox" style="margin: 0;" required checked> <a href="terminos&condiciones" class="none" target="_blank">Acepto Términos & Condiciones De Uso.</span></a><hr class="hr-1"><br>
                                        <input type="checkbox" class="check-box" id="cbox2" name="checkb" value="second_checkbox" style="margin: 0;" required checked> <a href="tratamiento-de-datos" class="none" target="_blank" >Acepto Política De Tratamiento De Datos.</a><hr class="hr-1"><br>
                                        <input type="checkbox" class="check-box" id="cbox2" name="checkb" value="second_checkbox" style="margin: 0;" required checked> <a href="uso-de-informacion" class="none" target="_blank" >Acepto El Uso De Mi Información Personal.</a><hr class="hr-1"><br>
                                        <input type="checkbox" class="check-box" id="cbox2" name="checkb" value="second_checkbox" style="margin: 0;" required checked> <a href="tratamiento-por-terceros" class="none" target="_blank" >Acepto El Uso De Mi Información Por Terceros.</a><hr class="hr-1"><br>
                                    </div>
                                </div>     
                                <button type="submit" class="site-btn">Enviar</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <?php include("Footer.php")?>
</body>

</html>