<?php
session_start();

require_once ("config/db.php");
require_once ("config/conexion.php");
$orderId =$_GET['orderId'];

$sql="select * from PedidosE WHERE orderId='".$orderId."';";
$query1=mysqli_query($con, $sql);
          
$rw_Admin1=mysqli_fetch_array($query1);
$Id= $rw_Admin1['Id'];

$sql =  "UPDATE PedidosE set Estado='Aprobado' WHERE Id='".$Id."';";
$query_update = mysqli_query($con,$sql); 

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
        <h2 class="text-center">Pedido Numero:<?php echo $Id;?></h2>    
       <hr>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Felicidades </h4>
            <p>El Pago de su Pedido fue Procesado satisfactoreamente .</p>
        </div>
        <br>
        <br>
        <button class="btn btn-primary" onclick="location.href='./'">Regresar</button>
        <br>
        <br>
    </div>
</section>
<?php include("Footer.php")?>
</body>

</html>