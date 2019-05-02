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
		$Nit = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Nit'], ENT_QUOTES)));
		$sTable = "Cuenta_Virtual
		inner join Usuarios on cuenta_virtual.Usuario = Usuarios.Nit";
		
		$sWhere = " Where Cuenta_Virtual.Usuario = '".$Nit."' and  Cuenta_Virtual.Estado ='Pendiente'";	
		$Group=" Group by Cuenta_Virtual.Cruce,Cuenta_Virtual.NCruce,Cuenta_Virtual.Usuario,
				Usuarios.Razon_Social,Cuenta_Virtual.Fecha
		";


		$order=" order by Cuenta_Virtual.NCruce ";
		include 'pagination.php';
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 50;
		$adjacents  = 4;
		$offset = ($page - 1) * $per_page;
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere $Group");
	
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './Solicitar_Pago.php';
		$sql="SELECT Cuenta_Virtual.Cruce,Cuenta_Virtual.NCruce,Cuenta_Virtual.Fecha,
		Usuarios.Razon_Social,Cuenta_Virtual.Usuario,sum(Credito-Debito) as Valor  FROM 
		 $sTable $sWhere $Group $order LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		
		if ($numrows>0){
			echo mysqli_error($con);
			?>
			<div class="table-responsive">
			  <table class="table table-hover">
				<tr  class="warning">
					<th class="text-center">Tipo</th>
					<th class="text-center">Numero</th>
					<th>Usuario</th>
					<th>Fecha</th>
					<th class="text-right">Valor</th>
					<th class="text-right">Seleccion</th>
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){

						$Numero=$row['NCruce'];
						$Tipo=$row['Cruce'];
						
						
						$Usuario=$row['Razon_Social'];
						$Valor=$row['Valor'];
						
						$Fecha=$row['Fecha'];
						
						$label_class='label-default';
						
						
						
					?>
					<tr>
						<td class="text-center"><?php echo $Tipo; ?></td>
						<td class="text-center"><?php echo $Numero; ?></td>
						<td><?php echo $Usuario; ?></td>
						<td><?php echo date("d-m-Y", strtotime($Fecha)); ?></td>
						<td class="text-right"><?php echo '$'.number_format($Valor); ?></td>
						<input type="hidden" id="Nit" Name="Nit"value="<?php echo $Nit;?>">
						<td ><input type="checkbox" class="form-control" name="NumeroVenta[]" id="NumeroVenta[]" value="<?php echo $Tipo.'-'.$Numero;?>" checked <?php if($Tipo == 'A'){
							echo ' onclick="return false;" ';	
						}?>></td>
					</tr>
					<?php
				}	
					?>
					<tr>
						<td colspan=9><span class="pull-right"><?php
						 echo paginate($reload, $page, $total_pages, $adjacents);
						?></span></td>
					</tr>
				  </table>
				</div>
				<?php
			}
		


		
		
	}
?>