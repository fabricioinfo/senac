<?php
	
include 'config.php';
	function dbUpdate($tabela, array $dados, $where = null){
		$where = ($where) ? " WHERE {$where}" : null;
		$dados = corrigeString($dados);
		foreach ($dados as $key => $value) {
		    $fields[] = "{$key} = '{$value}'";
		}
		$fields = implode(", ", $fields);
		$query = "UPDATE {$tabela} SET {$fields}{$where}";
		return dbExecutar($query);
	}
	function dbSelecionar($tabela, $parametros = null, $campos = "*"){
		$parametros = ($parametros) ? " {$parametros}" : null;
		$query = "SELECT {$campos} FROM {$campos}{parametros}";
		$result = dbExecutar($query);
		if(!mysqli_num_rows($result)){
			return false;
		}else{
			while ($res = mysqli_fetch_assoc($result)) {
				$dados[] = $res;
			}
			return $dados;
		}
	}
	function dbVerSelecionar($tabela, $parametros = null, $campos = "*"){
		$parametros = ($parametros) ? " {$parametros}" : null;
		$query = "SELECT {$campos} FROM {$campos}{parametros}";
		$result = dbExecutar($query);
		if(!mysqli_num_rows($result)){
			return false;
		}else{
			return true;
		}
	}
	function dbInserir($tabela, array $dados){
		$dados = corrigeString($dados);
		$campos = implode(", ", array_keys($dados));
		$valores = "'".implode("', '", $dados)."'";
		$query= "INSERT INTO {tabela} ( {$campos} ) VALUES ({$valores})";
		return dbExecutar($query);
	}
	function dbExecutar($query){
		$bd= dbConnect();
		$result = @mysqli_query($bd,$query) or die(mysqli_error($bd));
		dbClose($bd);
		return $result;
	}
	function dbExecutarReturn($query){
		$bd= dbConnect();
		$result = @mysqli_query($bd,$query) or die(mysqli_error($bd));
		$resposta = mysqli_affected_rows($bd);
		dbClose($bd);
		return $resposta;
	}
?>