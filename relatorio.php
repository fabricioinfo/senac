<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Folha de Presença</title>
	<link rel="stylesheet" type="text/css" href="css/relatorio.css">
</head>
<body>
	<div class="header">
	</div>
	<div class="content">
		<div class="topo">
				<?php
				$i = 1;

				while ($i <= 5) {
					echo "<div class='inicio'>
				<img src='img/logoimp.png'>
				<p style='text-align: center; font-size: 14; font-weight: 600; margin-bottom:1cm;'>FICHA DE FREQUÊNCIA <br>Programa de Aprendizagem</p>
			</div>


			<!--<table cellspacing='0'>-->
			<table border=1 style='border-collapse: collapse'>
				<tr>
					<th>Aprendiz</th>
					<td>Matheus</td>
				</tr>
				<tr>
					<th>Turma</th>
					<td>2020.1234.001</td>
				</tr>
				<tr>
					<th>Período</th>
					<td>Vespertino</td>
				</tr>
				<tr>
					<th>Empresa</th>
					<td>FABRICIO'S BAR</td>
				</tr>
				<tr>
					<th>Supervisor</th>
					<td>
					</td>
				</tr>
				<tr>
					<th>Contato</th>
					<td>
					</td>
				</tr>
			</table><br>

			<table border=1 style='border-collapse: collapse' id='table2'>
				<tr>
					<th>DATA</th>
					<th>HORÁRIO DE ENTRADA</th>
					<th>HORÁRIO DE SAÍDA</th>
					<th>VISTO DO INSTRUTOR</th>
					<th>VISTO DA EMPRESA</th>
				</tr>
				<tr>
					<td>10/01/2019</td>
					<td>13:57</td>
					<td>18:00</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
			</table>";
			$i++;
				}

				?>

		</div>
	</div>


	<div class="footer">
		
	</div>
</body>
</html>