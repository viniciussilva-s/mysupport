<?php
	
	require_once('db.php');
	
	
	$objDB = new db();
	$link = $objDB->conecta_mysql();
	
	$sql ="SELECT * FROM usuarios ";
	// executar o comando sql  PARAM 1 - a conexão do db , 2 - o comando a ser executado
	if(mysqli_query($link,$sql)){// verifica se tem algum erro de sintaxe o if 
		echo 'Sitaxe OK';
		$resultado_id = mysqli_query($link,$sql);
		$dados_usuario = array();
		
		
		while ($linha = mysqli_fetch_array($resultado_id,MYSQLI_ASSOC)){
			// tras o resultado da consulta em um array. MYSQLI_NUM ex.:ex.: [0][1] trazendo somente em numero ooou MYSQLI_ASSOC ex.: [id][usuario] e  trazendo o dado conforme o campo da tabela 
			$dados_usuario[]= $linha;
			
		}
		echo "<pre>";
		print_r($dados_usuario);		
		echo "</pre>";
	}else{
		echo 'Sitaxe Error';
	}

?>