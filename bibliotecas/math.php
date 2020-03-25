<?php
	$tipo= $_GET["tipo"];
	$a = $_GET["a"];
	$b = $_GET["b"];
	$c = $_GET["c"];
	try {
		if($tipo == 1){
			hipotenusa($a,$b);
		}elseif ($tipo == 2 ){
			areaC($a);
		}elseif ($tipo == 3){
			areaT($a,$b);
		}elseif ($tipo == 4){
			areaQ($a,$b);
		}else{
			simetria($a,$b,$c);
		}
	} catch (Exception $e) {
		echo "Erro: ".$e->getMessage();
	}
	function hipotenusa($catetoO, $catetoA)
	{
		$catetoA = str_replace(".", "", $catetoA);
		$catetoO = str_replace(".", "", $catetoO);

		$catetoA = str_replace(",", ".", $catetoA);
		$catetoO = str_replace(",", ".", $catetoO);
		if((!is_numeric($catetoA) || !is_numeric($catetoO))){
			throw new Exception("Um dos valores possivelmente não é um número correto");
		}elseif ($catetoO<=0 || $catetoA<=0) {
			throw new Exception("Um dos valores são zero ou menores que zero");
		}
		$hipotenusa = sqrt($catetoO*$catetoO + $catetoA*$catetoA) ;
		echo "<p>O teorema de pitágoras trata de achar a altura (h, hipotenusa) de um triângulo retângulo, onde se usa os outros dois lados Cateto Adjacente ao ângulo da hipotenusa (a) e Cateto Oposto ao ângulo da hipotenusa (b).</p>";
		echo "<p>Deste modo temos o calculo h = raiz quadrada de a<sup>2</sup> + b<sup>2</sup>.</p>";
		echo "<p> Primeiro se resolve os valores elevados ao quadrado, segundo passo somer os dois resultados anteriores e por último fazer a raiz quadrada do resultado do segundo passo. Desta forma temos a altura pelo teorema de pitágoras.</p>";
		echo "<p>Resultado do seu calculo é ".$hipotenusa.", agora tente fazer no papel e confira o resultado.</p>";
	}
	function areaC($raio)
	{
		$raio = str_replace(".", "", $raio);

		$raio = str_replace(",", ".", $raio);
		if((!is_numeric($raio))){
			throw new Exception("Um dos valores possivelmente não é um número correto");
		}elseif ($raio<=0) {
			throw new Exception("Um dos valores são zero ou menores que zero");
		}
		$areaC = pi()*pow($raio,2);
		echo "<p>Quando queremos fazer o calculo de quanto um circulo tem de área devemos usar o valor do pi, que representa os quadrantes de um circulo, e o raio que é a altura do meio do circulo ate a extremidade.</p>";
		echo "<p>Deste modo temos o calculo área = pi * r<sup>2</sup>.</p>";
		echo "<p> Primeiro se resolve os valores elevados ao quadrado, nocaso o raio, segundo passo multiplicar o valor anterior pelo valor do pi. Desta forma temos a área de um circulo.</p>";
		echo "<p>Resultado do seu calculo é ".$areaC.", agora tente fazer no papel e confira o resultado.</p>";
	}
	function areaT($base,$altura)
	{
		$base = str_replace(".", "", $base);
		$altura = str_replace(".", "", $altura);

		$base = str_replace(",", ".", $base);
		$altura = str_replace(",", ".", $altura);
		if((!is_numeric($base) || !is_numeric($altura))){
			throw new Exception("Um dos valores possivelmente não é um número correto");
		}elseif ($base<=0 || $altura<=0) {
			throw new Exception("Um dos valores são zero ou menores que zero");
		}
		$areaT = ($base*$altura)/2;
		echo "<p>Quando queremos fazer o calculo de quanto um triângulo tem de área devemos usar o valor da base (b), que representa os a largura do triangulo, e a altura (a) dele.</p>";
		echo "<p>Deste modo temos o calculo área = (b*a)/2.</p>";
		echo "<p> Primeiro se resolve os valores que estão a se multiplicar (base multiplicado pela altura), por último temos que pegar o resultado do passo anterior e dividir por 2, devido o triangulo ser estreito em sua parte superior.</p>";
		echo "<p>Resultado do seu calculo é ".$areaT.", agora tente fazer no papel e confira o resultado.</p>";
	}
	function areaQ($base,$altura)
	{
		$base = str_replace(".", "", $base);
		$altura = str_replace(".", "", $altura);

		$base = str_replace(",", ".", $base);
		$altura = str_replace(",", ".", $altura);
		if((!is_numeric($base) || !is_numeric($altura))){
			throw new Exception("Um dos valores possivelmente não é um número correto");
		}elseif ($base<=0 || $altura<=0) {
			throw new Exception("Um dos valores são zero ou menores que zero");
		}
		$areaQ = ($base*$altura);
		echo "<p>Quando queremos fazer o calculo de quanto um quadrado tem de área devemos usar o valor da base (b), que representa os a largura do retangulo, e a altura (a) dele.</p>";
		echo "<p>Deste modo temos o calculo área = b*a.</p>";
		echo "<p> Primeiro, e único passo, se resolve os valores que estão a se multiplicar (base multiplicado pela altura).</p>";
		echo "<p>Resultado do seu calculo é ".$areaQ.", agora tente fazer no papel e confira o resultado.</p>";
	}
	function simetria($a,$b,$c)
	{
		$a = str_replace(".", "", $a);
		$b = str_replace(".", "", $b);
		$c = str_replace(".", "", $c);

		$a = str_replace(",", ".", $a);
		$b = str_replace(",", ".", $b);
		$c = str_replace(",", ".", $c);
		if((!is_numeric($a) || !is_numeric($b) || !is_numeric($c))){
			throw new Exception("Um dos valores possivelmente não é um número correto");
		}elseif ((pow($b, 2)-(4*$a*$c))<=0) {
			throw new Exception("Os valores de delta são zero ou menores que zero");
		}
		$bhaskara1 = (-$b + sqrt(pow($b, 2)-(4*$a*$c)))/(2*$a);
		$bhaskara2 = (-$b - sqrt(pow($b, 2)-(4*$a*$c)))/(2*$a);
		echo "<p>A fórmula de Bhaskara é um método resolutivo para equações do segundo grau cujo nome homenageia o grande matemático indiano que a demonstrou. Essa fórmula nada mais é do que um método para encontrar as raízes reais de uma equação do segundo grau fazendo uso apenas de seus coeficientes. Vale lembrar que coeficiente é o número que multiplica uma incógnita em uma equação.</p>";
		echo "<p>É usada também para verificar simetria de dois lados X' e X'', para isso se usa as variáveis a (representa o valor multiplicado pos x<sup>2</sub>), b (representa o valor multiplicado por x) e c (que representa o coeficiente sem o x). Desta forma se calcula X'= (-b + raiz quadrada de b<sup>2</sup> - (4*a*c))/(2*a)</p>";
		echo "<p> Primeiro, resolve-se a equação (4*a*c), segundo passo se resolve a equação b<sup>2</sup>, terceiro passo subtrai o resultado da primeiro do resultado do segundo passo, quarto passo faz a raiz quadrada do resultado do terceiro passo e soma com o valor negativo de b, quinto passo faz a equação (2*a), sexto e último passo divide o valor do passo quarto pelo valor do passo quinto.</p>";
		echo "Desta forma se calcula X''= (-b - raiz quadrada de b<sup>2</sup> - (4*a*c))/(2*a)</p>";
		echo "<p> Primeiro, resolve-se a equação (4*a*c), segundo passo se resolve a equação b<sup>2</sup>, terceiro passo subtrai o resultado da primeiro do resultado do segundo passo, quarto passo faz a raiz quadrada do resultado do terceiro passo e subtrai com o valor negativo de b, quinto passo faz a equação (2*a), sexto e último passo divide o valor do passo quarto pelo valor do passo quinto.</p>";
		echo "<p>Resultado do seu calculo é ".$bhaskara1." e ".$bhaskara2.", agora tente fazer no papel e confira o resultado.</p>";
	}
?>