<?php
	include 'include/header.php';
?>
	<div class="container-fluid" style="margin-top: 30px;">
		<div class="row flex">
				<div data-toggle="tooltip" data-placement="bottom" title="Lançar horário do ponto" class="box_content" onclick="irPara('lancar.php')">
					<i class="far fa-clock fa-5x"></i>
				</div>
				<div data-toggle="tooltip" data-placement="bottom" title="Imprimir ponto" class="box_content" id="print" onclick="irPara('imprimir.php')">
					<i class="fas fa-print fa-5x"></i>
				</div>
				<div data-toggle="tooltip" data-placement="bottom" title="Apagar data errada" class="box_content" id="apagar" onclick="irPara('apagarData.php')">
					<i class="fas fa-backspace fa-5x"></i>
				</div>
			
		</div>
	</div>
<?php
	include 'include/footer.php';
?>
