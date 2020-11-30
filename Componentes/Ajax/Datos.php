<?php
session_start();
$Id=session_id();
require_once ("config/db.php");
require_once ("config/conexion.php");

 $sql="select * from Usuarios WHERE Correo='".$_SESSION['Correo']."';";
                                $query1=mysqli_query($con, $sql);
                                $rw_Admin1=mysqli_fetch_array($query1);
$Correo=$rw_Admin1['Correo'];
$Nombre=$rw_Admin1['Nombre'];
$Telefono=$rw_Admin1['Telefono'];
$Direccion=$rw_Admin1['Direccion'];
$Direccion=$rw_Admin1['Direccion'];
$DireccionAdicional=$rw_Admin1['DireccionAdicional'];

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
<?php include("Head.php")?> 

</head>

<body class="fondo3">
<?php include("Menu.php")?>


<!-- Contact Section Begin -->
<section class="contact spad" >
    <div class="container">
        <div class="row">

            <div class=" col-lg-12 col-md-12">
                <div class="card border">
                    <div class="contact__form border" style="background-color:#edf1f5;">
                        <br>
                        <h4>Datos de Usuario</h4>
                        
                        <form name="Guardar_Datos" id="Guardar_Datos"method="post" role="form">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label class="control-label">Correo:</label>
                                    <input type="text" readonly="readonly" name="Correo" id="Correo" placeholder="Correo" data-rule="minlen:4" data-msg="Ingrese un Correo valido" value="<?php echo $Correo;?>" required>
                                </div>
                                <div class="col-lg-12">
                                    <label class="control-label">Nombre:</label>
                                    <input type="text" name="Nombre" id="Nombre" placeholder="Nombre" data-rule="minlen:4" data-msg="Ingrese un Nombre valido" value="<?php echo $Nombre;?>" required>
                                </div>
                                <div class="col-lg-12">
                                    <label class="control-label">Telefono:</label>
                                    <input type="text" name="Telefono" id="Telefono" placeholder="Numero Telefónico" data-rule="minlen:7" data-msg="Ingrese un teléfono" value="<?php echo $Telefono;?>" required>
                                </div>
                                <div class="col-lg-6">
                                    <label class="control-label">Direccion:</label>
                                    <input type="text" name="Direccion" id="Direccion" placeholder="Direccion "data-msg="Ingrese una Direccion valida" value="<?php echo $Direccion;?>" required>
                                </div>
                                <div class="col-lg-6">
                                    <label class="control-label">Direccion Adicional:</label>
                                    <input type="text" name="DireccionAdicional" id="DireccionAdicional" 
                                    placeholder="Direccion Adicional" value="<?php echo $DireccionAdicional;?>" data-msg="Ingrese una Direccion Adicional valida" required>
                                </div>
                                <div id="Cargando" style="display:none;">
                                    <br>
                                    <div class="d-flex justify-content-center">
                                        <div class="spinner-border text-primary" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                <br> 
                                <div id="Respuesta" class="col-lg-12"></div> 
                                
                            </div>     
                            <button type="submit" class="site-btn">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Contact Section End -->




        <!-- Application Form Section Begin -->
        <div class="afiliacion">
            <a href="membresia">
            <img src="img/afiliacion.png" alt="">
            </a>
        </div> 

        <?php include("Footer.php")?>
</body>
<script>
 $("#Guardar_Datos").submit(function(event) { 
        var parametros = $(this).serialize();
       
        $.ajax({
            url: "Admin/Ajax/GuardarDatos.php",
            type: "POST",
            data: parametros,
                beforeSend: function(objeto){ 
                    $("#Cargando").show();
                    $("#Respuesta").html("");
                },
            success: function(datos){ 
                $("#Cargando").hide();
                $("#Respuesta").html(datos);
                
            }	 
        });
        event.preventDefault();
    });
</script>
</html>