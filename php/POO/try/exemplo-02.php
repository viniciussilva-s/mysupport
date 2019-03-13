<?php

	function trataNome ($name){
		if(!$name){
			throw new Exception('Nenhum nome foi informado',1);
		}	
		echo ucfirst( strtolower ($name))."<br/>";
	}
	try{
		trataNome('BIANCA');
		trataNome('');
	}catch(Exception $e){
		
		echo $e->getMessage();
	}finally{
		echo 'Executou o Try!';
	}

?>