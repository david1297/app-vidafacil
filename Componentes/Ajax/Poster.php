<?php
require_once ("config/db.php");
require_once ("config/conexion.php");
if(isset($_GET["Categoria"])){
    $Categoria = $_GET["Categoria"];
}
$sql="select * from Categorias WHERE Id=".$Categoria.";";
$query1=mysqli_query($con, $sql);
$rw_Admin1=mysqli_fetch_array($query1);
$Imagen=$rw_Admin1['Imagen'];
$Url=$rw_Admin1['Url'];

?>
<!DOCTYPE html>
<html lang="zxx">
<?php include("Head.php");?>
<body>
<a href="https://api.whatsapp.com/send?phone=573054232363&text=Hola%2C%20necesito%20m%C3%A1s%20informaci%C3%B3n." class="float" target="_blank"><i class="fa fa-whatsapp my-float"></i></a>

<?php include("Menu.php");?>

  <section>
    <div class="hero-slider">
            <div class="single-hero-item set-bg">
                <a href="<?php echo $Url;?>" target="_blank" rel="noopener noreferrer"><img src="Admin/Img/<?php echo $Imagen;?>" alt=""></a> 
            </div>
    </div>
</section>
<?php include("Footer.php");?>


</body>

</html>