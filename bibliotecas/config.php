<?php
	define('BD_HOSTNAME', 'fabricioinfo.com.br');
	define('BD_PASS', 'sodeboa22');
	define('BD_USER', 'metra926_fabr');
	define('BD_DATABASE', 'metra926_jovemaprendiz');
	define('BD_CHARSET', 'utf8');
	function dbConnect(){
		$database = @mysqli_connect(BD_HOSTNAME,BD_USER,BD_PASS,BD_DATABASE) or die(mysqli_connect_error());
		mysqli_set_charset($database, BD_CHARSET) or die(mysqli_error($database));
		return $database;
	}
	function dbClose($database){
		@mysqli_close($database) or die(mysqli_error($database));
	}

	function corrigeString($dados){
		$bd= dbConnect();
		if(!is_array($dados)){
			$dados= mysqli_real_escape_string($dados);
		}else{
			$aux = $dados;
			foreach ($aux as $key => $value) {
			    $key = mysqli_real_escape_string($key);
			    $value = mysqli_real_escape_string($value);
			    $dados[$key]= $value;
			}
		}
		dbClose($db);
		return $dados;
	}
	
	
?>