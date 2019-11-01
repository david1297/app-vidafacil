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

		$sTable = "VENTAS INNER JOIN AFILIADOS On AFILIADOS.Id=VENTAS.AFILIADO
		inner join USUARIOS on USUARIOS.Nit=VENTAS.Usuario
		inner join CAMPANAS on CAMPANAS.Numero=VENTAS.Campana";
		$sWhere = "where (Fecha >= '$fechaIni' and  Fecha <= '$fechaFin') ";
		if ( $_GET['q'] != "" ){
			if ($Filtro == "Numero"){
				$sWhere.= " and  (VENTAS.Numero like '%$q%' )";	
			}else{
				if ($Filtro =="Nombre"){
					$sWhere.= " and  ((AFILIADOS.Primer_Nombre like '%$q%') OR (AFILIADOS.Segundo_Nombre like '%$q%')OR (AFILIADOS.Primer_Apellido like '%$q%') OR (AFILIADOS.Segundo_Apellido like '%$q%'))";	
				}else {
					if ($Filtro =="Identificacion"){
						$sWhere.= " and  (AFILIADOS.Identificacion like '%$q%' )";	
					}else{
						if($Filtro =="Telefono"){
							$sWhere.= " and  (AFILIADOS.Telefono like '%$q%' )";	
						}
					}

				}

			}
			
		}
		if($EFiltro<>"Todos"){
			if($EFiltro=='Usuario'){
				$sWhere.= " and VENTAS.Usuario ='".$VFiltro."'";		
			}else{
				if($EFiltro=='Estado'){
					$sWhere.= " and VENTAS.Estado ='".$VFiltro."'";		
				}else{
					if($EFiltro=='Campana'){
						$sWhere.= " and VENTAS.Campana ='".$VFiltro."'";		
					}else{
						if($EFiltro=='Departamento'){
							$sWhere.= " and AFILIADOS.Departamento ='".$VFiltro."'";
						}else{
							if($EFiltro=='Ciudad'){
								$sWhere.= " and AFILIADOS.Ciudad ='".$VFiltro."'";
							}	
						}

					}
				}

			}	
		} 

		 
		$sWhere.=" order by VENTAS.Numero ";
		include 'pagination.php';
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 50;
		$adjacents  = 4;
		$offset = ($page - 1) * $per_page;
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './Consultar-BaseGeneral.php';
		$sql="SELECT VENTAS.Numero,AFILIADOS.Primer_Nombre,AFILIADOS.Primer_Apellido,VENTAS.Fecha,USUARIOS.Razon_Social,
		VENTAS.Estado,VENTAS.Estado_Campana,
		CAMPANAS.NOMBRE AS Campana,CAMPANAS.Numero as Cam,VENTAS.Valor,VENTAS.Porcentaje_Comision,VENTAS.Campana as NCampana FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		if ($numrows>0){
			echo mysqli_error($con);
			?>
			<div class="table-responsive">
			  <table class="table table-hover">
				<tr  class="warning">
					<th class="text-center">Numero</th>
					<th>Afiliado</th>
					<th>Usuario</th>
					<th>Campaña</th>
					<th class="text-right">Valor</th>
					<th class="text-right">Porcentaje</th>
					<th class="text-right">Comision</th>
					<th class='text-right'>Estado</th>

					<th class='text-right'>Editar</th>
					<th class='text-right'></th>
					<th class='text-right'></th>
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){

						$Numero=$row['Numero'];
						$Cam=$row['Cam'];
						$Afiliado=$row['Primer_Nombre'].' '.$row['Primer_Apellido'] ;
						$Valor=$row['Valor'];
						$Usuario=$row['Razon_Social'];
						$Campana=$row['Campana'];
						$Estado=$row['Estado'];
						$Estado_Campana=$row['Estado_Campana'];
						$Porcentaje_Comision=$row['Porcentaje_Comision'];
						if ($Estado=="Aprobada"){$label_class='label-success';}
						if ($Estado=="Rechazada"){$label_class='label-danger';}
						if ($Estado=="Negada"){$label_class='label-danger';}
						if ($Estado=="Sin Revisar"){$label_class='label-warning';}
						$NCampana=$row['NCampana'];
						
					?>
					<tr>
						<td class="text-center"><?php echo $Numero; ?></td>
						<td><?php echo $Afiliado; ?></td>
						<td><?php echo $Usuario; ?></td>
						<td><?php echo $Campana; ?></td>
						<td class="text-right"><?php echo '$'.number_format($Valor); ?></td>
						<td class="text-right"><?php echo $Porcentaje_Comision.'%'; ?></td>
						<td class="text-right"><?php echo '$'.number_format(($Valor*$Porcentaje_Comision)/100); ?></td>
						<td class="text-right">
						
						<a href="#" class='btn btn-default' title='Editar Estado' onclick="obtener_datos('<?php echo $Numero;?>','<?php echo $Estado;?>');"  data-toggle="modal" data-target="#UdateVenta"><i class="glyphicon glyphicon-edit"></i><?php echo $Estado; ?></a>
						</td>
						<td class="text-right">
							<a href="#" class='btn btn-default' title='Editar Venta' onclick="obtener_datos1('<?php echo $Numero;?>');"><i class="glyphicon glyphicon-edit"></i></a> 
						</td>
						<td>

						<?php
						
						
						echo' <select class="form-control hidden " id="Estado_Campana'.$Numero.'" name ="Estado_Campana" placeholder="Estado Campaña">';
						$query1=mysqli_query($con, "SELECT Numero,Nombre FROM CAMP_TIPIFICACIONES 
					inner join TIPIFICACIONES on CAMP_TIPIFICACIONES.Tipificacion =TIPIFICACIONES.Numero Where Campana = $NCampana ");
					while($rw_Admin1=mysqli_fetch_array($query1)){
						if ($Est_camp==$rw_Admin1[0]){
							echo '<option value="'.$rw_Admin1[0].'" selected>'.$rw_Admin1[1].'</option>';	
						}else{
							echo '<option value="'.$rw_Admin1[0].'">'.$rw_Admin1[1].'</option>';	
						}
					
						
					}

						
						echo '</select>';
						?>
						</td>
						<td>
						<?php
echo '
	<select class="form-control hidden" id="Estado'.$Numero.'" name ="Estado" placeholder="Estado"  >';
	$tuArray = explode("|", 'Sin Revisar|Aprobada|Rechazada|Negada');
foreach($tuArray as  $indice => $palabra){
	if ($Estado==$palabra){
		echo '<option value="'.$palabra.'" selected>'.$palabra.'</option>';	

	} else{
		echo '<option value="'.$palabra.'" >'.$palabra.'</option>';	

	}
}  
	echo '
	</select>

';

						?>
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