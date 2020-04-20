<?php
include('is_logged.php');
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    require_once("../../libraries/password_compatibility_library.php");
}		

            require_once ("../../config/db.php");
			require_once ("../../config/conexion.php");
			$sql=mysqli_query($con, "select Nit from USUARIOS ");
	while($row=mysqli_fetch_array($sql)){
		$Nit=$row["Nit"];
		$sql =  "INSERT INTO PERMISOS (Modulo, Permiso, Estado,Usuario, Descripcion) VALUES 
						
						('Afiliados', 'ConsultarTodoA', 'false', '".$Nit."', 'Ver Todo Agendamientos');
						
						
						;";
							$query_update = mysqli_query($con,$sql);
		  
	}



				
       
		

?>