<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Folha de Presença</title>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		
	<link rel="stylesheet" type="text/css" href="css/modelo.css">
	</head>
<body>
<?php
$turma = $_POST['codigo'];
$data_i = $_POST['data_i'];
$data_f = $_POST['data_f'];
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
$turma_normal= $turma;
$aux= explode(".", $turma);
$turma = $aux[0]."-".$aux[2];
$curso= $aux[1];

$codigos = array();
$nomes = array();
$periodo = array();
$empresas = array();
$sql="SELECT * FROM jovem_com WHERE jovem_com.codigo_turma = '{$turma}' AND jovem_com.matriculado NOT LIKE 'Não' AND jovem_com.codigo_curso = '{$curso}' ORDER BY jovem_com.nome ASC";
$query= $connect->query($sql);
$i=0;
while ($dados=$query->fetch_array(MYSQLI_ASSOC)) 
{
	$codigos[$i]=$dados["codigo"];
	$nomes[$i]=$dados['nome'];
	$empresas[$i] = $dados['empresa'];
	$periodo[$i]= $dados['periodo'];
	$i++;
}
for($i=0;$i<sizeof($codigos);$i++){
	echo '<div style="display: grid;grid-template-columns: 1fr;" ><img class="center-block logo" src="img/logo_senac.png" height="75.58px"><p style="text-align: center; font-size: 14; font-weight: 600; margin-bottom:1cm;">FICHA DE FREQUÊNCIA <BR />Programa de Aprendizagem</p></div><table cellspacing="0" id="dados_'.$codigos[$i].'" class="tabela tabela_ponto cabecalho">';
	echo "<tr style='width: 100%;'><th class='right-table first'>Aprendiz</th><td class='left-table second'>".$nomes[$i]."</td></tr>";
	echo "<tr style='width: 100%;'><th class='right-table first'>Turma</th><td class='left-table second'>".$turma_normal."</td></tr>";
	echo "<tr style='width: 100%;'><th class='right-table first'>Período</th><td class='left-table second'>".$periodo[$i]."</td></tr>";
	echo "<tr style='width: 100%;'><th class='right-table first'>Empresa</th><td class='left-table second'>".$empresas[$i]."</td></tr>";
	echo "<tr style='width: 100%;'><th class='right-table first'>Supervisor</th><td class='left-table second'></td></tr>";
	echo "<tr style='width: 100%;'><th class='right-table first'>Contato</th><td class='left-table second'></td></tr>";

	echo '</table>';

	echo '<div class="data-hora" style="page-break-after: always;display: grid;grid-template-columns: 1fr;"><table cellspacing="0" class="tabela tabela_ponto" id="'.$codigos[$i].'"><tr><th>DATA</th><TH>HORÁRIO DE ENTRADA</TH><TH>HORÁRIO DE SAÍDA</TH><TH>VISTO DO INSTRUTOR</TH><TH>VISTO DA EMPRESA</TH></tr>';

	$sql="SELECT * FROM `ponto completo` WHERE `ponto completo`.`data` BETWEEN '{$data_i}' AND '{$data_f}' AND `ponto completo`.codigo_turma like '{$turma}' AND `ponto completo`.codigo = '".$codigos[$i]."'";

	$query= $connect->query($sql);
	while ($dados2=$query->fetch_array(MYSQLI_ASSOC)) 
	{
		$data_normal= $dados2["data"];
		$data=explode("-", $data_normal);
		$ano = $data[0];
		$mes = $data[1];
		$dia = $data[2];
		echo "<tr class=datas'><td>".$dia."/".$mes."/".$ano."</td><td>".$dados2["entrada"]."</td><td>".$dados2["saida"]."</td><td></td><td></td></tr>";
	}
	echo "</table></div>";
}

?>
</body>
</html>