<?php
header("Content-type: text/css");

/*fontes*/
$font_paragrafo= "font-family: 'Quicksand', sans-serif";
$font_headers = "font-family: 'Bree Serif', serif";

/*Cores*/
$cor_primaria= array("#FFAC30","#E87D20","#FF6924","#E8AC20","#FFD324");
$cor_secundaria = array("#30A6FF","#205DE8","#242DFF","#20C6E8","#24FFE9");
$cor_terciaria = array("#FF4F4A","#E85738","#FF7C3D","#E8387C","#FF3DE9");

/*Cores Botões*/
$cor_enviar = array("#39C836","#31DE5F","#2FD48A","#70DE31","#A4D42F");
$cor_resetar = array("#C72411","#DE092A","#D4088E","#DE3D09","#D45808");
?>
/*@import url('https://fonts.googleapis.com/css?family=Bree+Serif|Quicksand&display=swap');
*{
	margin: 0px;
	padding: 0px;
}
p{
	<?php echo "$font_paragrafo"; ?>;
}
h1,h2,h3,h4,h5,h6{
	<?php echo "$font_headers"; ?>;
}*/
.content{
	display:grid;
}
<?php
	function gridtemplate($colunas){
		echo ".col-$colunas{";
		echo "grid-template-columns: repeat($colunas,1fr);";
		echo "}";
	}
	gridtemplate(3);
	gridtemplate(4);
	gridtemplate(6);
	gridtemplate(8);
	gridtemplate(9);
	gridtemplate(12);
	function gridstartend($inicio,$fim){
		echo ".line-col-$inicio-$fim{";
		echo "grid-column-start: $inicio;";
		echo "grid-column-end: $fim;";
		echo "}";
	}
	for ($i=1; $i <=12 ; $i++) { 
		for ($j=($i+1); $j <=13 ; $j++) { 
			gridstartend($i,$j);
		}
	}
?>
.painel{
	border: thin solid;
	border-radius: 0px 0px 35px 35px;
	margin:10px;
	display:grid;
	grid-row-gap: 3px;
}
<?php
	function painelCorBorda($tipo){
		global $cor_primaria, $cor_secundaria, $cor_terciaria;
		if($tipo=="primario"){
			echo ".painel-$tipo{";
			echo("border-color: ".$cor_primaria[2].";");
			echo "}";
			echo ".cab-painel-$tipo{";
			echo "background-color: ".$cor_primaria[0].";";
			echo "display:block;";
			echo "}";
		}elseif($tipo=="secundario"){
			echo ".painel-$tipo{";
			echo "border-color: ".$cor_secundaria[2].";";
			echo "}";
			echo ".cab-painel-$tipo{";
			echo "background-color: ".$cor_secundaria[0].";";
			echo "display:block;";
			echo "}";
		}elseif($tipo=="terciario"){
			echo ".painel-$tipo{";
			echo "border-color: ".$cor_terciaria[2].";";
			echo "}";
			echo ".cab-painel-$tipo{";
			echo "background-color: ".$cor_terciaria[0].";";
			echo "display:block;";
			echo "}";
		}
	}
	painelCorBorda("primario");
	painelCorBorda("secundario");
	painelCorBorda("terciario");

?>