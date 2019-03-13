<?php

	require_once('config.php');

	use Cliente\Cadastro;
	
	$cad = new Cadastro();

	$cad->setNome('Vinicius Souza');
	$cad->setEmail('Vinicius.Souza@codely.com');
	$cad->setSenha('123456');
	
	$cad->registrarVenda();
	echo"<pre>";
	echo $cad;
	echo"</pre>";
	
	
	
?>  