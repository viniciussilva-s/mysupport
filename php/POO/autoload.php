<?php

   //função unica para busca de classe
	// function __autoload($nomeClasse){
		// require_once("$nomeClasse.php");
	// }
	
	// ----- outra opção
	function incluirClasses($nomeClasse){
		if(file_exists($nomeClasse.".php")===true){//file_exists verifica se existe o arquivo em tal diretorio 
			require_once($nomeClasse.".php");	
		}
		
	}
	
	spl_autoload_register('incluirClasses');

	//----- Caso o arquivo esteja em outra pasta
	// spl_autoload_register(function($nomeClasse){	
		// if(file_exists("pasta". DIRECTORY_SEPARATOR .$nomeClasse.".php")===true){//file_exists 
			// require_once("pasta". DIRECTORY_SEPARATOR .$nomeClasse.".php");	 //DIRECTORY_SEPARATOR  == \ ou / pra navegar em arquivos
		// }	
	// });
	$carro = new DelRey();
	$carro->acelerar(20);

?>