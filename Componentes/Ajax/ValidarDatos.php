<?php
	include('is_logged.php');
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");

	$Tipo = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Tipo'], ENT_QUOTES)));
	$Valor = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Valor'], ENT_QUOTES)));
	

	if($Tipo=='Nit'){
		$sql="SELECT count(*) FROM  USUARIOS where Nit='$Valor'";
		$query = mysqli_query($con, $sql);
		$row=mysqli_fetch_array($query);
		if ($row[0]>0){
			echo '!Existe!';
		}else{
			echo '!Correcto!';
		}
	}
	if($Tipo=='RepLegal'){
		$Nit = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Nit'], ENT_QUOTES)));
		$sql="SELECT count(*) FROM  USUARIOS where CC='$Valor' and Nit <>'$Nit'";
		$query = mysqli_query($con, $sql);
		$row=mysqli_fetch_array($query);
		if ($row[0]>0){
			echo '!Existe!';
		}else{
			echo '!Correcto!';
		}
	}
	if(($Tipo=='Ref1')||($Tipo=='Ref2')){
		$Nit = mysqli_real_escape_string($con,(strip_tags($_REQUEST['Nit'], ENT_QUOTES)));
		$sql="SELECT count(*) FROM  USUARIOS where (Tel_R1='$Valor' or Tel_R2='$Valor') and Nit <>'$Nit' ";
		$query = mysqli_query($con, $sql);
		$row=mysqli_fetch_array($query);
		if ($row[0]>0){
			echo '!Existe!';
		}else{
			echo '!Correcto!';
		}
	}

	if($Tipo=='Identificacion'){
	
		$sql="SELECT count(*) FROM  AFILIADOS where Identificacion='$Valor' ";
		$query = mysqli_query($con, $sql);
		$row=mysqli_fetch_array($query);
		if ($row[0]>0){
			echo '!Existe!';
		}else{
			echo '!Correcto!';
		}
	}
?>