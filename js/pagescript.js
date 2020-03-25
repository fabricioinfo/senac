var config = {
    apiKey: "AIzaSyBrc-70ZVhFTg8BGLhAadTV6dB7IutJVpg",
    authDomain: "aprendiz-ee57c.firebaseapp.com",
    databaseURL: "https://aprendiz-ee57c.firebaseio.com",
    projectId: "aprendiz-ee57c",
    storageBucket: "aprendiz-ee57c.appspot.com",
    messagingSenderId: "613765082175"
  };
  firebase.initializeApp(config);

function rolagem(){
	var topWindow=$(window).scrollTop();
	if(topWindow>60){
		$("header").addClass("header_fixed");
	}else{
		$("header").removeClass("header_fixed");
	}
}
function jaCarregado(){
	$("a.tooltip").mouseover(function(){
		var texto= $(this).attr("data-tooltip");
		$(this).children(".text_tooltip").html(texto);
		$(this).children(".text_tooltip").css("opacity","1");
	});
	$("a.tooltip").mouseout(function(){
		$(this).children(".text_tooltip").css("opacity","0");
	});
	$(".text_tooltip").mouseover(function(e){
		e.stopPropagation();
	});

	var page= $("body");


	$("nav").mouseover(function(){
		$(".nav_itens").addClass("nav-show");
	});
	$("nav").mouseout(function(){
		$(".nav_itens").removeClass("nav-show");
	});
	$("#verPonto").on("click", function(event){
		event.preventDefault();
		var mes = $("#mes").val();
		if(mes.toString().length == 1){
			mes = "0"+mes;
		}
		var ano = $("#ano").val();
		var cod = $("#codigo").val();
		var tabela1 = firebase.database().ref("jovem/");
		var vetores;
		var codigos=[];
		var i=0;
		tabela1.orderByChild("Turma").equalTo(cod).on("value", function(data){
			data.forEach(function(data2){
				vetores = data2.val();
				$("#pontos").append('<div style="display: grid;grid-template-columns: 1fr;" ><img class="center-block logo" src="img/logo.png" height="75.58px"><p style="text-align: center; font-size: 14; font-weight: 600; margin-bottom:1cm;">FICHA DE FREQUÊNCIA <BR />Programa de Aprendizagem</p></div><table cellspacing="0" id="dados_'+vetores.Codigo+'" class="tabela cabecalho">');
				$("#dados_"+vetores.Codigo).append("<tr style='width: 100%;'><th class='right-table first'>Aprendiz</th><td class='left-table second'>"+vetores.Nome+"</td></tr>");
	  				$("#dados_"+vetores.Codigo).append("<tr style='width: 100%;'><th class='right-table first'>Turma</th><td class='left-table second'>"+vetores.Turma+"</td></tr>");
	  				$("#dados_"+vetores.Codigo).append("<tr style='width: 100%;'><th class='right-table first'>Período</th><td class='left-table second'>"+vetores.Periodo+"</td></tr>");
	  				$("#dados_"+vetores.Codigo).append("<tr style='width: 100%;'><th class='right-table first'>Empresa</th><td class='left-table second'>"+vetores.Empresa+"</td></tr>");
	  				$("#dados_"+vetores.Codigo).append("<tr style='width: 100%;'><th class='right-table first'>Supervisor</th><td class='left-table second'></td></tr>");
	  				$("#dados_"+vetores.Codigo).append("<tr style='width: 100%;'><th class='right-table first'>Contato</th><td class='left-table second'></td></tr>");
				$("#pontos").append('</table><div class="data-hora" style="page-break-after: always"><table cellspacing="0" class="tabela" id="'+vetores.Codigo+'"><tr><th>DATA</th><TH>HORÁRIO DE ENTRADA</TH><TH>HORÁRIO DE SAÍDA</TH><TH>VISTO DO INSTRUTOR</TH><TH>VISTO DA EMPRESA</TH></tr>');
				codigos.push(vetores.Codigo);
				firebase.database().ref("datas/"+ano+"/"+mes+"/").orderByKey().once('value').then(function(result) {
				
				result.forEach(function (childSnap) {
					if(typeof childSnap.val()[codigos[i]]!="undefined"){
						console.log(childSnap.val()[codigos[i]]);
						$("#"+codigos[i]).append("<tr class=datas'><td>"+childSnap.val()[codigos[i]]["Dia"]+"/"+mes+"/"+ano+"</td><td>"+childSnap.val()[codigos[i]]["Entrada"]+"</td><td>"+childSnap.val()[codigos[i]]["Saida"]+"</td><td></td><td></td></tr>");
					}
					
					//$("#atv").append("<option>"+childSnap.val()["nome atividade"]+"</option>");
				});
				i++;

					}).catch(function(error){
							alert("Aconteceu um erro verifique os dados adicionados ou contate o administrador fabricio@pantheontechsol.com.br com o erro "+error);
						});
				$("#pontos").append('</table></div>');
			});
			$("header").addClass("esconder");
			$("footer").addClass("esconder");
			$("nav").addClass("esconder");
			$("#formulario_ponto").addClass("esconder");
			$("main").css("padding-top","0");
		});
	});
}
$(document).ready(jaCarregado());
$(document).scroll(rolagem());