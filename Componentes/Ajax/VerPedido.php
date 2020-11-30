<?php
session_start();

$Id=$_GET['Id'];
require_once ("config/db.php");
require_once ("config/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("Head.php")?>
</head>

<body style="background: #fff">
    <?php include("Menu.php")?>
    
   
   
<br>

<section class="about-video" style="background: #fff">
    <div class="container">
        <h2 class="text-center">Pedido N: <?php echo $Id?></h2>
       <hr>
       <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Imagen</th>
                  <th scope="col">Combre</th>
                  <th scope="col">Cantidad</th>
                  <th scope="col">Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql="select Productos.Imagen,Productos.Nombre,PedidosD.Cantidad,PedidosD.Valor,PedidosE.Usuario,PedidosE.Nombre as NombreUsuario,PedidosE.Telefono,PedidosE.Direccion,PedidosE.Fecha,PedidosE.Estado from PedidosE 
                inner join PedidosD on PedidosD.Pedido = PedidosE.Id 
                inner join Productos on PedidosD.Producto = Productos.Id
                where PedidosE.Id='".$Id."';";
                $query1=mysqli_query($con, $sql);
                $Total=0;
                $j=0;
                while($rw_Admin1=mysqli_fetch_array($query1)){
                    $j=$j+1;       
                    ?>
                    <tr>
                        <th scope="row">
                            <?php echo $j;?>        
                        </th>
                        <td class="center">
                            <img src="Admin/Img/<?php echo $rw_Admin1['Imagen'];?>" alt="Producto" style="width: auto; height: 100%;" >
                        </td>
                        <td>
                            <?php echo $rw_Admin1['Nombre'];?>
                        </td>
                        <td class="text-center">
                            <?php echo $rw_Admin1['Cantidad'];?>        
                        </td>
                        <td>
                            <?php
                               
                                    $Total= $Total+$rw_Admin1['Valor']*$rw_Admin1['Cantidad'];
                                    echo " <p>$ ".number_format($rw_Admin1['Valor']*$rw_Admin1['Cantidad'])."</p> ";
                                
                            ?>
                        </td>    
                    </tr>
                    <?php
                    $Nombre= $rw_Admin1['NombreUsuario'];
                    $Direccion= $rw_Admin1['Direccion'];
                    $Fecha= $rw_Admin1['Fecha'];
                    $Correo= $rw_Admin1['Usuario'];
                    $Telefono= $rw_Admin1['Telefono'];
                    $Estado= $rw_Admin1['Estado'];
                }
                ?>
                <tr>
                    <td colspan="3"></td>
                    <td class="text-center">Total:</td>
                    <td> $ <?php echo number_format($Total);?></td>
                </tr>
            </tbody>
        </table>
        </div>
        <br>
        <h4>Solicitante</h4>
        <br>
        <div class="col-md-6">
            <?php
                ?>
                <div class="table-responsive">
            <table class="table table-sm">       
                <tbody>
                    <tr>
                        <th>Nombre</th>
                        <td><?php echo  $Nombre;?></td>
                    </tr>
                    <tr>
                        <th>Telefono</th>
                        <td><?php echo $Telefono;?></td>
                    </tr>
                    <tr>
                        <th>Direccion</th>
                        <td><?php echo $Direccion;?></td>
                    </tr>
                    <tr>
                        <th>Fecha</th>
                        <td><?php echo $Fecha;?></td>
                    </tr>
                    <tr>
                        <th>Correo</th>
                        <td><?php echo $Correo;?></td>
                    </tr>
                    <tr>
                        <th>Estado</th>
                        <td><?php echo $Estado;?></td>
                    </tr>
                </tbody>
            </table>  
            </div>
            <br>  
            <br>  
            <br>    
            <br>
        </div>
        <div id="Cargando" style="display: none;">
            <br>
            <div class="d-flex justify-content-center">
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
        <br> 
        <div id="Respuesta"></div> 
        
    </div>
</section>
<!-- About Video Section End -->

    
    
<?php include("Footer.php")?>

<script>
    function HacerPedido(){

        $.ajax({
            url: "Admin/Ajax/GuardarPedido.php",
            type: "GET",
                beforeSend: function(objeto){ 
                    $("#Cargando").show();
                    $("#Respuesta").html("");
                },
            success: function(datos){ 
                $("#Cargando").hide();
                var Res = datos.split('*');
                if(Res[1]=='Correcto'){
                    location.href="RealizarPago.php?Id="+Res[2];
                } else{
                    $("#Respuesta").html(datos);
                }
            }	 
        });
    }
</script>
</body>

</html>