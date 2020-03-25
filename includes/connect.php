<?php 
	$HOST = "fabricioinfo.com.br";
	$USER = "metra926_fabr";
	$PASS = "sodeboa22";
	$DB = "metra926_jovemaprendiz";
	$CHARSET = "utf8";
	$connect = mysqli_connect($HOST, $USER, $PASS, $DB);
	mysqli_set_charset ($connect , $CHARSET );
?>