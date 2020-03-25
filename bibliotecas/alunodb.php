<?php
	include 'bancodedados.php';
	$sql = $_POST['sql'];
	
		$resultado =dbExecutar($sql);
	if($resultado){
		echo "1";
	}else{
		echo "0";
	}
?>