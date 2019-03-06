<?php
	include('is_logged.php');
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		$q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		$Filtro = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Filtro'], ENT_QUOTES)));
		$Estado = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Estado'], ENT_QUOTES)));
		$fechaIni = mysqli_real_escape_string($con,(strip_tags($_REQUEST['fechaIni'], ENT_QUOTES)));
		$fechaFin = mysqli_real_escape_string($con,(strip_tags($_REQUEST['fechaFin'], ENT_QUOTES)));

		$sTable = "transacciones
		INNER JOIN VENTAS ON VENTAS.NUMERO= TRANSACCIONES.VENTA
		INNER JOIN USUARIOS ON VENTAS.USUARIO = USUARIOS.NIT
		INNER JOIN CUENTA_VIRTUAL ON CUENTA_VIRTUAL.VENTA = VENTAS.NUMERO";
		$sWhere = "where (transacciones.Fecha >= '$fechaIni' and  transacciones.Fecha <= '$fechaFin') ";
		if ( $_GET['q'] != "" ){
			if ($Filtro == "Numero"){
				$sWhere.= " and  (transacciones.Numero like '%$q%' )";	
			}else{
				if ($Filtro =="Documento"){
						$sWhere.= " and  (USUARIOS.NIT like '%$q%' )";	
				}else{
					if($Filtro =="Usuario"){
						$sWhere.= " and  (Usuarios.Razon_Social like '%$q%' )";
					}
				}
			}
		}	
		if($Estado<>"Todos"){
			$sWhere.= " and transacciones.Estado ='".$Estado."'";	
		} 
		$order=" order by transacciones.Numero ";
		include 'pagination.php';
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 50;
		$adjacents  = 4;
		$offset = ($page - 1) * $per_page;
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './Consultar-Transferencias.php';
		$query1=mysqli_query($con, 'SELECT Estado FROM permisos where Modulo="Transferencias" and Permiso="ConsultarTodo" and  Usuario ="'.$_SESSION['Nit'].'";');
										
				$rw_Admin1=mysqli_fetch_array($query1);
				if(($rw_Admin1['Estado']=='false') && ($_SESSION['Rol']<>'1')){
					$Condicion=' and TRANSACCIONES.Usuario = "'.$_SESSION['Nit'].'"';
				}else{
					$Condicion='';
				}


		$sql="SELECT TRANSACCIONES.Numero,TRANSACCIONES.Usuario,USUARIOS.RAZON_SOCIAL,TRANSACCIONES.Fecha,TRANSACCIONES.ESTADO,SUM(CUENTA_VIRTUAL.COMISION)as VALOR FROM  $sTable $sWhere  $Condicion 
		group by TRANSACCIONES.Usuario,TRANSACCIONES.Numero,TRANSACCIONES.Fecha
		$order LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		if ($numrows>0){
			echo mysqli_error($con);
			?>
<div class="table-responsive">
    <table class="table table-hover">
        <tr class="warning">
            <th class="text-center">Numero</th>
            <th>Nit</th>
            <th>Usuario</th>
            <th>Fecha</th>
            <th>Estado</th>
            <th class="text-right">Valor</th>
            <th class='text-right'>Editar</th>
        </tr>
        <?php
				while ($row=mysqli_fetch_array($query)){

						$Numero=$row['Numero'];
						$Nit=$row['Usuario'];
					
						$Usuario=$row['RAZON_SOCIAL'];
						$Fecha=$row['Fecha'];
						$Estado=$row['ESTADO'];
						$Valor=$row['VALOR'];
						
						if ($Estado=="Revisada"){$label_class='label-success';}
						if ($Estado=="Pendiente"){$label_class='label-warning';}
					
						
					?>
        <tr>
            <td class="text-center"><?php echo $Numero; ?></td>
            <td><?php echo $Nit; ?></td>
            <td><?php echo $Usuario; ?></td>
            <td><?php echo $Fecha; ?></td>
            <td><span class="label <?php echo $label_class;?>"><?php echo $Estado; ?></span></td>
            <td class="text-right"><?php echo '$'.number_format($Valor); ?></td>


            <td class="text-right">
                <a href="#" class='btn btn-default' title='Editar Venta'
                    onclick="" data-toggle="modal"
                    data-target="#UdateVenta"><i class="glyphicon glyphicon-edit"></i></a>
            </td>


        </tr>
        <?php
				}
				?>
        <tr>
            <td colspan=11><span class="pull-right"><?php
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
        </tr>
    </table>
</div>
<?php
		}
	}
	
?>