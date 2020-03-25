$(document).ready(function(){
	$("#meu_login").submit(function(event){
		alert("Deu certo");
		var meu_get= $('form#meu_login').serialize();
		$(".loading_section").removeClass("esconder");
	/*	$.ajax({
		  method: "GET",
		  url: "some.php?"+meu_get,
		  async: false
		}).done(function( msg ) {
		    alert( "Data Saved: " + msg );
		  });*/

		event.preventDefault();
	});
});