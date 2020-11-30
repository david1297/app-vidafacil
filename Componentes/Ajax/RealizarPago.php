<?php
require_once ("config/db.php");
require_once ("config/conexion.php");
$Id= $_GET['Id'];

$sql="select * From PedidosE  WHERE Id='".$Id."';";

                $query1=mysqli_query($con, $sql);
                $rw_Admin1=mysqli_fetch_array($query1);

$Valor=$rw_Admin1['Valor'];
$parametros =

'amount='.$Valor.'&currency=170&language=es&orderNumber='.$Id.'&returnUrl=http://localhost/SolucionesVidaFacil/PedidoCorrecto.php&jsonParams={"installments":"1","IVA.amount":"0"}&userName=SOLUCIONES_VIDA_FACIL_SAS-api&password=SOLUCIONES_VIDA_FACIL_SAS&failUrl=http://localhost/SolucionesVidaFacil/PedidoInCorrecto.php';



// abrimos la sesión cURL
$ch = curl_init();
 
// definimos la URL a la que hacemos la petición
curl_setopt($ch, CURLOPT_URL,"https://ecouat.credibanco.com/payment/rest/register.do");
// indicamos el tipo de petición: POST
curl_setopt($ch, CURLOPT_POST, TRUE);
// definimos cada uno de los parámetros
curl_setopt($ch, CURLOPT_POSTFIELDS, $parametros);
 
// recibimos la respuesta y la guardamos en una variable
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$remote_server_output = curl_exec ($ch);
 
// cerramos la sesión cURL
curl_close ($ch);
 
// hacemos lo que queramos con los datos recibidos
// por ejemplo, los mostramos
//print_r($remote_server_output);

$Array= json_decode($remote_server_output,TRUE);

if($Array["formUrl"]!=''){
    $orderId= $Array["orderId"];

    $sql =  "UPDATE PedidosE set orderId='".$orderId."' WHERE Id='".$Id."'   ";
    $query_update = mysqli_query($con,$sql); 
    ?>
    <script>
        location.href="<?php echo $Array['formUrl'];?>";
    </script>
   
    <?php
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("Head.php")?>
</head>

<body style="background: #fff">
<div id="preloder">
        <div class="loader"></div>
</div>


<script>


</script>
</body>

</html>