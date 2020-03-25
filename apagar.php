<?php
	$turma = $_GET['codigo'];
	$data_i = $_GET['data_i'];
	include 'includes/connect.php';
	include 'bibliotecas/auxiliar.php';
	include 'bibliotecas/bancodedados.php';
	$pos = strpos($turma, ".");
	if($pos===false){
		$turma = mask($turma,"####.####.###");
	}else{
		$teste= explode(".", $turma);
		if(sizeof($teste)<3){
			echo "<script>"+
						'alert("Você só colocou um ponto (.) o certo é ter dois pontos (####.####.###) ou sem pontos (###########)");'+
				"</script>";
			
		}
	}
	$sql = "DELETE FROM ponto WHERE turma like '{$turma}' AND data = '$data_i'";
	$resultado =dbExecutarReturn($sql);
	echo($resultado);
	/*if($resultado){
		echo "1";
	}else{
		echo "0";
	}*/
?>