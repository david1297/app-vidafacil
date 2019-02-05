<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
    }
	require_once ("config/db.php");
    require_once ("config/conexion.php");
    $query=mysqli_query($con, "select * from Campanas where Numero ='3' ");
        $rw_Admin=mysqli_fetch_array($query);
      
        $tuArray = explode("\r\n", $rw_Admin['Estados']);

foreach($tuArray as  $indice => $palabra){
    echo "En la posición " . $indice . " está " . $palabra . "<br />";
}  
    ?>