<?php
include('is_logged.php');
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    require_once("libraries/password_compatibility_library.php");
}		

            require_once ("config/db.php");
			require_once ("config/conexion.php");
			$sql=mysqli_query($con, "select Nit from USUARIOS where Rol =2 ");
	while($row=mysqli_fetch_array($sql)){
		$Nit=$row["Nit"];
		$sql1 =  "INSERT INTO PERMISOS (Modulo, Permiso, Estado,Usuario, Descripcion) VALUES 
						('Afiliados', 'Ingreso', 'false', '".$Nit."', 'Ingreso al Modulo'),
						('Contabilidad', 'Ingreso', 'false', '".$Nit."', 'Ingreso al Modulo'),
						('Transacciones', 'Ingreso', 'false', '".$Nit."', 'Ingreso al Modulo'),
						('Campanas', 'Ingreso', 'false', '".$Nit."', 'Ingreso al Modulo'),
						('CuentaVirtual', 'Ingreso', 'false', '".$Nit."', 'Ingreso al Modulo'),
						('Transferencias', 'Ingreso', 'false', '".$Nit."', 'Ingreso al Modulo'),
						('Transferencias', 'ConsultarTodo', 'false', '".$Nit."', 'Ver Todo'),
						('Usuarios', 'Ingreso', 'false', '".$Nit."', 'Ingreso al Modulo'),
						('Usuarios', 'CamapansAsignadas', 'false', '".$Nit."', 'Ver Todas las Campañas'),
						('Ajustes', 'Ingreso', 'false', '".$Nit."', 'Ingreso al Modulo'),
						('Ajustes', 'Crear', 'false', '".$Nit."', 'Crear Ajuste'),
						('Ajustes', 'Consultar', 'false', '".$Nit."', 'Consultar'),
						('Ajustes', 'ConsultarTodo', 'false', '".$Nit."', 'Ver Todo'),
						('Campanas', 'Crear', 'false', '".$Nit."', 'Crear Campaña'),
						('Campanas', 'Consultar', 'false', '".$Nit."', 'Consultar Campañas'),
						('Afiliados', 'Crear', 'false', '".$Nit."', 'Crear Afiliado'),
						('Afiliados', 'Editar', 'false', '".$Nit."', 'Editar Afiliado'),
						('Afiliados', 'ConsultarTodo', 'false', '".$Nit."', 'Ver Todo'),
						('Afiliados', 'ConsultarTodoA', 'false', '".$Nit."', 'Ver Todo Agendamientos'),
						('Afiliados', 'ImportarAprobados', 'false', '".$Nit."', 'Importar Xlsx Aprobado'),
						('Afiliados', 'Tipificaiones', 'false', '".$Nit."', 'Cambiar Tipificaciones'),
						('Transacciones', 'CambiarEstado', 'false', '".$Nit."', 'Cambiar Estados'),
						('Usuarios', 'Crear', 'false', '".$Nit."', 'Crear Usuario'),
						('Usuarios', 'Editar', 'false', '".$Nit."', 'Editar Usuario'),
						('Usuarios', 'CuentaVirtual', 'false', '".$Nit."', 'Ingreso Cuenta Virtual'),
						('Usuarios', 'ConsultarTodo', 'false', '".$Nit."', 'Ver Todo'),
						('Transacciones', 'Crear', 'false', '".$Nit."', 'Crear Transaccion'),
						('Transacciones', 'Consultar', 'false', '".$Nit."', 'Consultar Transacciones'),
						('Transacciones', 'ConsultarTodo', 'false', '".$Nit."', 'Ver Todo'),
						('Transacciones', 'TipificaionesSeguimiento', 'false', '".$Nit."', 'Cambiar Tipificaciones y Seguimiento'),
						('Directorio', 'Ingreso', 'false', '".$Nit."', 'Ingreso al Modulo'),
						('Directorio', 'Editar', 'false', '".$Nit."', 'Editar'),
						('Directorio', 'Eliminar', 'false', '".$Nit."', 'Eliminar')
						
						
						;";		echo $sql1.'<br>';			
							$query_update = mysqli_query($con,$sql1);
		  
	}



				
       
		

?>