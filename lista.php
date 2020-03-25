<?php
include 'includes/connect.php';
include 'bibliotecas/auxiliar.php';
include 'bibliotecas/bancodedados.php';
$turma = $_GET['turma'];
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
	if(!$connect){
		echo "Erro ao conectar o banco: ".mysqli_errno();
	}

	
	include 'include/header.php';
 ?>

 <div class="container" style="margin-top: 30px;">
		<div class="row justify-content-center">
			<div class="col-lg-8 offset-lg-2 col-md-6 col-xl-8 offset-xl-2 col-sm-12 col-12">
				<h3 style="margin-bottom: 15px; text-align: center;">Lista de Jovens</h3>
				<h5 style="margin-bottom: 15px; text-align: center;">Turma: <?php echo "$turma_normal"; ?></h5>
				<form style="margin-bottom: 30px;">
					<div class="form-row">
					    <div class="col">
						      <label>Data do Ponto</label>
							<input type="date" class="form-control" id="data_ponto" placeholder="Hora de Entrada">
					    </div>
					 </div>
					 <div class="form-row">
					    <div class="col">
						     <label>Hora de Entrada</label>
							<input type="time" class="form-control" id="entrada_hora" placeholder="Hora de Entrada">
					    </div>
					    <div class="col">
						     <label>Hora de Saída</label>
							<input type="time" class="form-control" id="saida_hora" placeholder="Hora de Entrada">
					    </div>
					 </div>
					 <input type="hidden" class="form-control" id="turma_normal"  value="<?php echo($turma_normal);?>">
				</form>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-lg-8 offset-lg-2 col-md-6 col-sm-12 col-12 col-xl-8 offset-xl-2 text-center">
				<button class="btn btn-outline-success " id="entrada">Entrada</button>
				<button class="btn btn-outline-success" id="saida">Saída</button>
				<button class="btn btn-outline-danger" id="falta">Falta</button>
				<button class="btn btn-outline-danger" id="desligado">Desligado</button>
				<button class="btn btn-outline-info" id="atestado">Justificado</button>
				<button class="btn btn-outline-info" id="empresa">Empresa</button>
				<button class="btn btn-outline-info" id="Recesso">Recesso/Feriado</button>
			</div>
		</div>
		<div style="margin-top: 30px;" class="row ">
			<div class="col-lg-8 offset-lg-3 col-md-6 offset-md-3 col-xl-8 offset-xl-3 col-sm-12 col-12 align-self-center lista_alunos scroll-over">
				<form>
				<table class="table table-hover ">
					<thead>
						<tr>
							<th scope="col" data-toggle="tooltip" data-placement="bottom" title="Selecionar Tudo" ><input type="checkbox" id="select_all" /> </th>
							<th scope="col" class="diferente">Aluno <i class="fas fa-user-graduate"></i></th>
							<th scope="col" class="diferente">Empresa <i class="fas fa-money-check-alt"></i></th>
						</tr>
					</thead>
						<?php
								$sql= "SELECT * FROM jovem_com WHERE codigo_turma='{$turma}' and codigo_curso='{$curso}' and matriculado = 'Sim' ORDER BY nome ASC";
								$query= $connect->query($sql);
								while ($dados=$query->fetch_array(MYSQLI_ASSOC)) 
								{
									echo "<tr class='{$dados['codigo']}'><td class='selecionar codigo_aluno'><input type='checkbox' name='codigo_aluno' value='{$dados['codigo']}' id='{$dados['codigo']}' ></td>";
									echo '<td class="diferente">'.$dados['nome']."</td>";
									echo '<td class="diferente">'.$dados['nome_curto']."</td></tr>";
								}
							?>
				</table></form>
			</div>
		</div>
	</div>
</body>
</html>