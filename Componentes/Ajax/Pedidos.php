<?php
session_start();
require_once ("config/db.php");
require_once ("config/conexion.php");
?>
<!DOCTYPE html>
<html>
<?php include("Head.php");?>
<body onload="Buscar()">
    <?php include("Menu.php");?>
    <br>
    <section>
        <div class="container">
            
            <br><br>
            <div class="card">
                <h5 class="card-header">Mis Pedidos</h5>
                <div class="card-body" style="padding-top: 0px;">
                    <div id="Cargando">
                        <br>
                        <div class="d-flex justify-content-center">
                            <div class="spinner-border text-primary" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    </div>
                    <div id="Resultados"></div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
    </section>
    <?php include("Footer.php");?>
    <script>
        function Buscar(){
 
            $.ajax({
                type: "GET",
                url: "Admin/Ajax/BuscarPedidosUsuario.php",
                beforeSend: function(objeto){
                    $("#Cargando").show();
                    $("#Resultados").html("");
                },
                success: function(datos){
                    $("#Cargando").hide();
                    $("#Resultados").html(datos);
                }
            });
        }
    </script>
</body>

</html>