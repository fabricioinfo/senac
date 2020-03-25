function irPara(str_url){
	window.location.href = str_url;
}

$(document).ready(function(){

	$('#select_all').change(function() {
	  var checkboxes = $(this).closest('form').find(':checkbox');
	  checkboxes.prop('checked', $(this).is(':checked'));
	});

	$("#formulario_apagar").submit(function(event){
		event.preventDefault();
		var data_form = $("#formulario_apagar").serialize();
		console.log(data_form);
		if (confirm("Tem certeza que deseja apagar os registros dessa data? Confirme para não errar")) {
			$.ajax({
	                url: "apagar.php?"+data_form,
	                type: 'get',
	                success: function(data) {
	                    if(data>0){
	                    	alert(data+" registro(s) apagado(s)");
	                    }else{
	                    	alert("Não houve registro nessa data");
	                    }
	                }
	        });
		}

		
	});
	
	$("#entrada").click(function(){
		var vals=valores();
		console.log(vals);
		var vazio=estaVazioEntrada();
		if(!vazio){
			alert("Existem valores vazios verifique-os e tente novamente");
			return;
		}

		for (var i = 0; i <= vals.length-1; i++) {
			var id="."+vals[i]+"";
			var data = $("#data_ponto").val();
			var entrada = $("#entrada_hora").val();
			var id_ponto = ""+data+id;
			var turma_nor= $("#turma_normal").val();
			query= "INSERT INTO ponto (id_ponto, data, entrada, id_aluno, turma) VALUES ('"+id_ponto+"', '"+data+"', '"+entrada+"', '"+vals[i]+"', '"+turma_nor+"') ON DUPLICATE KEY UPDATE entrada = '"+entrada+"'";
				
				$.ajax({
	                url: 'bibliotecas/alunodb.php',
	                type: 'post',
	                async: false,
	                data: {
	                	sql: query
	                },
	                success:function(data){
	                	if(data=="1"){
	                		$(id).addClass("bg-success");
	                	}else{
	                		alert(data+" informe o administrador do site");
	                	}
	                }
	            });
		}
	});


	$("#saida").click(function(){
		var vals=valores();
		console.log(vals);
		var vazio=estaVazioSaida();
		if(!vazio){
			alert("Existem valores vazios verifique-os e tente novamente");
			return;
		}

		for (var i = 0; i <= vals.length-1; i++) {
			var id="."+vals[i]+"";
			var data = $("#data_ponto").val();
			var saida = $("#saida_hora").val();
			var id_ponto = ""+data+id;
			var turma_nor= $("#turma_normal").val();
			query= "INSERT INTO ponto (id_ponto, data, saida, id_aluno, turma) VALUES ('"+id_ponto+"', '"+data+"', '"+saida+"', '"+vals[i]+"', '"+turma_nor+"') ON DUPLICATE KEY UPDATE saida = '"+saida+"'";
				
				$.ajax({
	                url: 'bibliotecas/alunodb.php',
	                type: 'post',
	                async: false,
	                data: {
	                	sql: query
	                },
	                success:function(data){
	                	if(data=="1"){
	                		$(id).addClass("bg-warning");
	                	}else{
	                		alert(data+" informe o administrador do site");
	                	}
	                }
	            });
		}
	});

$("#falta").click(function(){
		var vals=valores();
		console.log(vals);
		var vazio=estaVazioData();
		if(!vazio){
			alert("Existem valores vazios verifique-os e tente novamente");
			return;
		}

		for (var i = 0; i <= vals.length-1; i++) {
			var id="."+vals[i]+"";
			var data = $("#data_ponto").val();
			var id_ponto = ""+data+id;
			var turma_nor= $("#turma_normal").val();
			query= "REPLACE INTO ponto (id_ponto, data, entrada, saida, id_aluno, turma) VALUES ('"+id_ponto+"', '"+data+"', 'Falta', 'Falta', '"+vals[i]+"', '"+turma_nor+"')";
				
				$.ajax({
	                url: 'bibliotecas/alunodb.php',
	                type: 'post',
	                async: false,
	                data: {
	                	sql: query
	                },
	                success:function(data){
	                	if(data=="1"){
	                		$(id).addClass("bg-danger");
	                	}else{
	                		alert(data+" informe o administrador do site");
	                	}
	                }
	            });
		}
	});

$("#empresa").click(function(){
		var vals=valores();
		console.log(vals);
		var vazio=estaVazioData();
		if(!vazio){
			alert("Existem valores vazios verifique-os e tente novamente");
			return;
		}

		for (var i = 0; i <= vals.length-1; i++) {
			var id="."+vals[i]+"";
			var data = $("#data_ponto").val();
			var id_ponto = ""+data+id;
			var turma_nor= $("#turma_normal").val();
			query= "REPLACE INTO ponto (id_ponto, data, entrada, saida, id_aluno, turma) VALUES ('"+id_ponto+"', '"+data+"', 'Na Empresa', 'Na Empresa', '"+vals[i]+"', '"+turma_nor+"')";
				
				$.ajax({
	                url: 'bibliotecas/alunodb.php',
	                type: 'post',
	                async: false,
	                data: {
	                	sql: query
	                },
	                success:function(data){
	                	if(data=="1"){
	                		$(id).addClass("bg-primary");
	                	}else{
	                		alert(data+" informe o administrador do site");
	                	}
	                }
	            });
		}
	});

$("#atestado").click(function(){
		var vals=valores();
		console.log(vals);
		var vazio=estaVazioData();
		if(!vazio){
			alert("Existem valores vazios verifique-os e tente novamente");
			return;
		}

		for (var i = 0; i <= vals.length-1; i++) {
			var id="."+vals[i]+"";
			var data = $("#data_ponto").val();
			var id_ponto = ""+data+id;
			var turma_nor= $("#turma_normal").val();
			query= "REPLACE INTO ponto (id_ponto, data, entrada, saida, id_aluno, turma) VALUES ('"+id_ponto+"', '"+data+"', 'Justificado', 'Justificado', '"+vals[i]+"', '"+turma_nor+"')";
				
				$.ajax({
	                url: 'bibliotecas/alunodb.php',
	                type: 'post',
	                async: false,
	                data: {
	                	sql: query
	                },
	                success:function(data){
	                	if(data=="1"){
	                		$(id).addClass("bg-primary");
	                	}else{
	                		alert(data+" informe o administrador do site");
	                	}
	                }
	            });
		}
	});


$("#Recesso").click(function(){
		var vals=valores();
		console.log(vals);
		var vazio=estaVazioData();
		if(!vazio){
			alert("Existem valores vazios verifique-os e tente novamente");
			return;
		}

		for (var i = 0; i <= vals.length-1; i++) {
			var id="."+vals[i]+"";
			var data = $("#data_ponto").val();
			var id_ponto = ""+data+id;
			var turma_nor= $("#turma_normal").val();
			query= "REPLACE INTO ponto (id_ponto, data, entrada, saida, id_aluno, turma) VALUES ('"+id_ponto+"', '"+data+"', 'Feriado/Recesso', 'Feriado/Recesso', '"+vals[i]+"', '"+turma_nor+"')";
				
				$.ajax({
	                url: 'bibliotecas/alunodb.php',
	                type: 'post',
	                async: false,
	                data: {
	                	sql: query
	                },
	                success:function(data){
	                	if(data=="1"){
	                		$(id).addClass("bg-primary");
	                	}else{
	                		alert(data+" informe o administrador do site");
	                	}
	                }
	            });
		}
	});

	$("#desligado").click(function(){
		var vals=valores();
		console.log(vals);
		var query="";
		if (confirm("Tem certeza que deseja desligar este jovem?")) {
			for (var i = 0; i <= vals.length-1; i++) {
				var id="."+vals[i]+"";
				query= "UPDATE aluno SET matriculado = 'Não' WHERE codigo = "+vals[i];
				$.ajax({
	                url: 'bibliotecas/alunodb.php',
	                type: 'post',
	                async: false,
	                data: {
	                	sql: query
	                },
	                success:function(data){
	                	if(data=="1"){
	                		alert("Aluno desligado com sucesso");
	                		$(id).hide();
	                	}else{
	                		alert(data+" informe o administrador do site");
	                	}
	                }
	            });
			}
			console.log(query);
		}
		
	});
	function valores(){
		var checkValues = $('input[name=codigo_aluno]:checked').map(function()
            {
                return $(this).val();
            }).get();
		return checkValues;
	}
	function estaVazioEntrada(){
		var vals = valores;
		var data= $("#data_ponto").val();
		var entrada = $("#entrada_hora").val();
		//var saida = $("#saida_hora").val();

		if (!vals || !data || !entrada ) {
			return false;
		}
		return true;
	}

	function estaVazioSaida(){
		var vals = valores;
		var data= $("#data_ponto").val();
		//var entrada = $("#entrada_hora").val();
		var saida = $("#saida_hora").val();

		if (!vals || !data || !saida ) {
			return false;
		}
		return true;
	}
	function estaVazioData(){
		var vals = valores;
		var data= $("#data_ponto").val();
		//var entrada = $("#entrada_hora").val();
		//var saida = $("#saida_hora").val();

		if (!vals || !data ) {
			return false;
		}
		return true;
	}
});