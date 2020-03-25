<?php
	include 'include/header.php';
?>
	<!--<div class="container" style="margin-top: 30px;">-->
		<div class="row " style="margin-top: 30px;">
			<div class="col-xl-6 offset-xl-3 col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-12 col-12 text-center">
				<h2>Informar dados</h2>
			</div>
		</div>
			<div class="row">
				<div class="col-xl-6 offset-xl-3 col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-12 col-12 text-center">
					<form id="formulario" action="lista.php" method="GET">
						<div class="form-group">
							<label for="codigo">Código da Turma</label>
							<input class="form-control" type="text" name="turma" id="turma">	
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xl-6 col-6">
								<button type="submit" class="btn btn-primary btn-block">Enviar</button>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xl-6 col-6">
								<button type="reset" class="btn btn-danger  btn-block">Apagar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
					
	<!--</div>-->
<?php
	include 'include/footer.php';
?>
