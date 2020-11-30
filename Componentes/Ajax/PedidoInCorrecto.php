<?php
session_start();

require_once ("config/db.php");
require_once ("config/conexion.php");
$orderId =$_GET['orderId'];

$sql="select * from PedidosE WHERE orderId='".$orderId."';";
$query1=mysqli_query($con, $sql);
          
$rw_Admin1=mysqli_fetch_array($query1);
$Id= $rw_Admin1['Id'];

$sql =  "UPDATE PedidosE set Estado='Rechazado' WHERE Id='".$Id."';";
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
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Lo Sentimos </h4>
            <p>El Pago de su Pedido fue Rechazado.</p>
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