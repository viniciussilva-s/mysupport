<?php

spl_autoload_register(function ($class_name){
	$filename="Class".DIRECTORY_SEPARATOR .$class_name.".php";
	if(file_exists($filename)){
		require_once($filename);
		return false;
	}
	// else if (file_exists($class_name.".php")){ Se estiver na mesma pasta 
		
		
		// require_once($class_name.".php");
		// return false;
	// }
	
});
//"Class".DIRECTORY_SEPARATOR .
?> 

