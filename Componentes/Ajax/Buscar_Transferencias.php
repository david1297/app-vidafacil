<?php
	include('is_logged.php');
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		$q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		$Filtro = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Filtro'], ENT_QUOTES)));
		$fechaIni = mysqli_real_escape_string($con,(strip_tags($_REQUEST['fechaIni'], ENT_QUOTES)));
		$fechaFin = mysqli_real_escape_string($con,(strip_tags($_REQUEST['fechaFin'], ENT_QUOTES)));
		$EFiltro = mysqli_real_escape_string($con,(strip_tags($_REQUEST['EFiltro'], ENT_QUOTES)));
		$VFiltro = mysqli_real_escape_string($con,(strip_tags($_REQUEST['VFiltro'], ENT_QUOTES)));

		$sTable = "TransaccionesE	
		INNER JOIN USUARIOS ON TransaccionesE.USUARIO = USUARIOS.NIT";
		$sWhere = "where (TransaccionesE.Fecha_Creacion >= '$fechaIni' and  TransaccionesE.Fecha_Creacion <= '$fechaFin') ";
		if ( $_GET['q'] != "" ){
			$sWhere.= " and  (TransaccionesE.Numero like '%$q%' )";	
		}	
		if($EFiltro<>"Todos"){
			if($EFiltro=='Usuario'){
				$sWhere.= " and TransaccionesE.Usuario ='".$VFiltro."'";		
			}else{
				if($EFiltro=='Estado'){
					$sWhere.= " and TransaccionesE.Estado ='".$VFiltro."'";		
				}
			}	
		} 
		$order=" order by TransaccionesE.Numero ";
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
										
				


		$sql="SELECT TransaccionesE.Numero,TransaccionesE.Usuario,USUARIOS.RAZON_SOCIAL,TransaccionesE.Fecha_Creacion,
		TransaccionesE.Fecha_Revision,TransaccionesE.ESTADO FROM  $sTable $sWhere   
		$order LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		if ($numrows>0){
			echo mysqli_error($con);
			?>
<div class="table-responsive">
    <table class="table table-hover">
        <tr class="warning">
            <th class="text-center">Numero</th>
            <th>Usuario</th>
            <th>Fecha de Solicitud</th>
            <th>Fecha de Revision</th>
            <th>Valor</th>
            <th>Estado</th>
            <th class='text-right'>Editar</th>
        </tr>
        <?php
				while ($row=mysqli_fetch_array($query)){

						$Numero=$row['Numero'];
						$Nit=$row['Usuario'];
					
						$Usuario=$row['RAZON_SOCIAL'];
						$FechaCreacion=$row['Fecha_Creacion'];
						$FechaRevision=$row['Fecha_Revision'];
						$Estado=$row['ESTADO'];
					
						
						if ($Estado=="Revisada"){$label_class='label-success';}
						if ($Estado=="Pendiente"){$label_class='label-warning';}
					
						
					?>
        <tr>
            <td class="text-center"><?php echo $Numero; ?></td>
            <td><?php echo $Usuario; ?></td>
            <td><?php echo $FechaCreacion; ?></td>
            <td><?php echo $FechaRevision; ?></td>
					<?php
					$Sql1="SELECT Sum(VAlor) FROM transaccionesd where Numero ='".$Numero."';";
			$query1 = mysqli_query($con, $Sql1);
			$row1=mysqli_fetch_array($query1)
?>
            <td><?php echo '$'.number_format($row1[0]); ?></td>

            <td><span class="label <?php echo $label_class;?>"><?php echo $Estado; ?></span></td>
            


            <td class="text-right">
                <a href="#" class='btn btn-default' title='Validar Transferencia'
				onclick="obtener_datos('<?php echo $Numero;?>');" data-toggle="modal"
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