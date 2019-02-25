<?php
require_once ('../../PHPExcel-1.8/Classes/PHPExcel.php');
		
$objPHPExcel = new PHPExcel();

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="helloworld.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2016');

$objWriter->save('php://output');

require_once ("../../config/db.php");
require_once ("../../config/conexion.php");
	
	
	$q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
	$Filtro = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Filtro'], ENT_QUOTES)));
	$Estado = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Estado'], ENT_QUOTES)));
	$fechaIni = mysqli_real_escape_string($con,(strip_tags($_REQUEST['fechaIni'], ENT_QUOTES)));
	$fechaFin = mysqli_real_escape_string($con,(strip_tags($_REQUEST['fechaFin'], ENT_QUOTES)));
	$Pest = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Pest'], ENT_QUOTES)));


			
	if($Pest=='ResIngresos'){		
			$sTable = "Ventas INNER JOIN AFILIADOS On AFILIADOS.IDENTIFICACION=VENTAS.AFILIADO
						inner join Usuarios on Usuarios.Nit=Ventas.Usuario
						inner join Campanas on Campanas.Numero=Ventas.Campana";
			$sWhere = "where (Fecha >= '$fechaIni' and  Fecha <= '$fechaFin') ";
			if ( $_GET['q'] != "" ){
				if ($Filtro == "Numero"){	
					$sWhere.= " and  (Ventas.Numero like '%$q%' )";	
				}else{
					if ($Filtro =="Nombre"){
						$sWhere.= " and  ((AFILIADOS.Primer_Nombre like '%$q%') OR (AFILIADOS.Segundo_Nombre like '%$q%')OR (AFILIADOS.Primer_Apellido like '%$q%') OR (AFILIADOS.Segundo_Apellido like '%$q%'))";	
					}else {
						if ($Filtro =="Cedula"){
							$sWhere.= " and  (AFILIADOS.Identificacion like '%$q%' )";	
						}else{
							if($Filtro =="Telefono"){
								$sWhere.= " and  (AFILIADOS.Telefono like '%$q%' )";	
							}else{
								if($Filtro =="Campaña"){
									$sWhere.= " and  (Campanas.Nombre like '%$q%' )";	
								}else{
									if($Filtro =="Usuario"){
										$sWhere.= " and  (Usuarios.Razon_Social like '%$q%' )";
									}else{
										if($Filtro =="Estado"){
											$sWhere.= " and  (Ventas.Estado_Campana like '%$q%' )";
										}
									}
								}
							}
						}
					}
				}	
			}
			if($_SESSION['Rol'] == '2'){
				$sWhere.= " and  Ventas.Usuario='".$_SESSION['Nit']."' ";
			}	
			if($Estado<>"Todos"){
				$sWhere.= " and VENTAS.Estado ='".$Estado."'";	
			} 
			$sWhere.=" order by Ventas.Numero ";
	}else{
		if($Pest=='ResEgresos'){
			$sTable = "Cuenta_Virtual 
						INNER JOIN VENTAS	On Ventas.Numero = 	Cuenta_Virtual.Venta
						INNER JOIN AFILIADOS On AFILIADOS.IDENTIFICACION=VENTAS.AFILIADO
						inner join Usuarios on Usuarios.Nit=Ventas.Usuario
						inner join Campanas on Campanas.Numero=Ventas.Campana";
			$sWhere = "where (Fecha >= '$fechaIni' and  Fecha <= '$fechaFin') ";
			if ( $_GET['q'] != "" ){
				if ($Filtro == "Numero"){	
					$sWhere.= " and  (Ventas.Numero like '%$q%' )";	
				}else{
					if ($Filtro =="Nombre"){
						$sWhere.= " and  ((AFILIADOS.Primer_Nombre like '%$q%') OR (AFILIADOS.Segundo_Nombre like '%$q%')OR (AFILIADOS.Primer_Apellido like '%$q%') OR (AFILIADOS.Segundo_Apellido like '%$q%'))";	
					}else {
						if ($Filtro =="Cedula"){
							$sWhere.= " and  (AFILIADOS.Identificacion like '%$q%' )";	
						}else{
							if($Filtro =="Telefono"){
								$sWhere.= " and  (AFILIADOS.Telefono like '%$q%' )";	
							}else{
								if($Filtro =="Campaña"){
									$sWhere.= " and  (Campanas.Nombre like '%$q%' )";	
								}else{
									if($Filtro =="Usuario"){
										$sWhere.= " and  (Usuarios.Razon_Social like '%$q%' )";
									}else{
										if($Filtro =="Estado"){
											$sWhere.= " and  (Ventas.Estado_Campana like '%$q%' )";
										}
									}
								}
							}
						}
					}
				}	
			}
			if($_SESSION['Rol'] == '2'){
				$sWhere.= " and  Ventas.Usuario='".$_SESSION['Nit']."' ";
			}	
			if($Estado<>"Todos"){
				$sWhere.= " and VENTAS.Estado ='".$Estado."'";	
			} 
			$sWhere.=" order by Ventas.Numero ";
		}
	}
	if($Pest=='ResIngresos'){
			$sql="SELECT VENTAS.Numero,AFILIADOS.Primer_Nombre,AFILIADOS.Primer_Apellido,VENTAS.Fecha,USUARIOS.Razon_Social,Ventas.Fecha,
			VENTAS.Estado_Campana,
			CAMPANAS.NOMBRE AS Campana,ventas.Valor,ventas.Porcentaje_Comision,Ventas.Campana as NCampana FROM  $sTable $sWhere";	
			$query = mysqli_query($con, $sql);
			$objPHPExcel->getActiveSheet()->setCellValue('A1', 'Numero');
			$objPHPExcel->getActiveSheet()->setCellValue('B1', 'Afiliado');
			$objPHPExcel->getActiveSheet()->setCellValue('C1', 'Usuario');
			$objPHPExcel->getActiveSheet()->setCellValue('D1', 'Campaña');
			$objPHPExcel->getActiveSheet()->setCellValue('E1', 'Fecha');
			$objPHPExcel->getActiveSheet()->setCellValue('F1', 'Estado');
			$objPHPExcel->getActiveSheet()->setCellValue('G1', 'Valor');
			$h=2;
			while ($row=mysqli_fetch_array($query)){
				$Numero=$row['Numero'];
				$Afiliado=$row['Primer_Nombre'].' '.$row['Primer_Apellido'] ;
				$Valor=$row['Valor'];
				$Usuario=$row['Razon_Social'];
				$Campana=$row['Campana'];
				$Estado=$row['Estado_Campana'];
				$Fecha=$row['Fecha'];
				$Porcentaje_Comision=$row['Porcentaje_Comision'];
				$label_class='label-default';
				$NCampana=$row['NCampana'];

				$objPHPExcel->getActiveSheet()->setCellValue('A'.$h, $Numero);
				$objPHPExcel->getActiveSheet()->setCellValue('B'.$h, $Afiliado);
				$objPHPExcel->getActiveSheet()->setCellValue('C'.$h, $Usuario);
				$objPHPExcel->getActiveSheet()->setCellValue('D'.$h, $Campana);
				$objPHPExcel->getActiveSheet()->setCellValue('E'.$h, date("d-m-Y", strtotime($Fecha)));
				$objPHPExcel->getActiveSheet()->setCellValue('F'.$h, $Estado);
				$objPHPExcel->getActiveSheet()->setCellValue('G'.$h, $Valor);
				$h=$h+1;			
			}
				
		}else{
			if($Pest=='ResEgresos'){
				$sql="SELECT VENTAS.Numero,AFILIADOS.Primer_Nombre,AFILIADOS.Primer_Apellido,VENTAS.Fecha,USUARIOS.Razon_Social,Ventas.Fecha,
						VENTAS.Estado_Campana,
						CAMPANAS.NOMBRE AS Campana,Cuenta_Virtual.Valor,Cuenta_Virtual.Porcentaje,Cuenta_Virtual.Comision,Ventas.Campana as NCampana FROM  $sTable $sWhere LIMIT $offset,$per_page";
				$query = mysqli_query($con, $sql);
					?>
					<div class="table-responsive">
					  <table class="table table-hover">
						<tr  class="warning">
							<th class="text-center">Numero</th>
							<th>Afiliado</th>
							<th>Usuario</th>
							<th>Campaña</th>
							<th>Fecha</th>
							<th class="text-right">Porcentaje</th>
							<th class="text-right">Comision</th>
						</tr>
						<?php
						while ($row=mysqli_fetch_array($query)){
		
								$Numero=$row['Numero'];
								$Afiliado=$row['Primer_Nombre'].' '.$row['Primer_Apellido'] ;
								$Valor=$row['Comision'];
								$Usuario=$row['Razon_Social'];
								$Campana=$row['Campana'];
								$Estado=$row['Estado_Campana'];
								$Fecha=$row['Fecha'];
								$Porcentaje_Comision=$row['Porcentaje'];
								$label_class='label-default';
								$NCampana=$row['NCampana'];
								
							?>
							<tr>
								<td class="text-center"><?php echo $Numero; ?></td>
								<td><?php echo $Afiliado; ?></td>
								<td><?php echo $Usuario; ?></td>
								<td><?php echo $Campana; ?></td>
								<td><?php echo date("d-m-Y", strtotime($Fecha)); ?></td>
								<td class="text-right"><?php echo $Porcentaje_Comision.'%'; ?></td>
								<td class="text-right"><?php echo '$'.number_format($Valor); ?></td>
		
		
							</tr>
							<?php
						}
						?>
						
					  </table>
					</div>
					<?php
			}		
		}


?>