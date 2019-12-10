
	
<?php

include('is_logged.php');
$session_id= session_id();

	$j='';

if (isset($_POST['Modulo'])){$Modulo=$_POST['Modulo'];}
if (isset($_POST['Usuario'])){$Usuario=$_POST['Usuario'];}

require_once ("../../config/db.php");
require_once ("../../config/conexion.php");
echo'
<style>
	.switch {
	position: relative;
	display: inline-block;
	width: 60px;
	height: 34px;
	}

	.switch input { 
	opacity: 0;
	width: 0;
	height: 0;
	}

	.slider {
	position: absolute;
	cursor: pointer;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	background-color: #ccc;
	-webkit-transition: .4s;
	transition: .4s;
	}

	.slider:before {
	position: absolute;
	content: "";
	height: 26px;
	width: 26px;
	left: 4px;
	bottom: 4px;
	background-color: white;
	-webkit-transition: .4s;
	transition: .4s;
	}

	input:checked + .slider {
	background-color: #2196F3;
	}

	input:focus + .slider {
	box-shadow: 0 0 1px #2196F3;
	}

	input:checked + .slider:before {
	-webkit-transform: translateX(26px);
	-ms-transform: translateX(26px);
	transform: translateX(26px);
	}

	/* Rounded sliders */
	.slider.round {
	border-radius: 34px;
	}

	.slider.round:before {
	border-radius: 50%;
	}
</style> ';
$query1=mysqli_query($con, "select * from PERMISOS where Usuario ='".$Usuario."' and Modulo='".$Modulo."' ");
$h="";
while($rw_Admin1=mysqli_fetch_array($query1)){										
echo'   <div class="form-group row">
			<label for="'.$rw_Admin1['Permiso'].'" class="col-sm-2 col-form-label">
				'.$rw_Admin1['Descripcion'].'
			</label>
			<div class="col-sm-10">
				<label class="switch">';
	if($rw_Admin1['Estado']=='true'){
echo '            	<input type="checkbox"id ="'.$rw_Admin1['Modulo'].'_'.$rw_Admin1['Permiso'].'" onchange="ActualizarPermiso('."'".$rw_Admin1['Modulo'].'_'.$rw_Admin1['Permiso']."'".')"  checked '.$h.' '.$j.' >';	
	}else{
echo '				<input type="checkbox"id ="'.$rw_Admin1['Modulo'].'_'.$rw_Admin1['Permiso'].'" onchange="ActualizarPermiso('."'".$rw_Admin1['Modulo'].'_'.$rw_Admin1['Permiso']."'".')" '.$h.' '.$j.' >';
	}
echo '				<span class="slider round"></span>
				</label>
				<span id="loader_'.$rw_Admin1['Modulo'].'_'.$rw_Admin1['Permiso'].'"></span>
			</div>
		</div>';
	if($rw_Admin1['Permiso']=='Ingreso'){
echo '	<div class="card">';
	if($rw_Admin1['Estado']=='true'){
echo'		<div class="card-body" id="Cart_'.$rw_Admin1['Modulo'].'">';	
	}else{
		$h="disabled";
echo'       <div class="card-header" id="Cart_'.$rw_Admin1['Modulo'].'">';	
	}
	}else{
echo'	<hr>';
	}									
}
echo'		</div>
		</div>';
?>
		
		

					