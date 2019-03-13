<?php

$data = array(
	"empresa"=>'CODELY SOLUCOES'
);
	setcookie("NOME_DO_COOKIE",json_encode($data),time()+3600);
	echo 'OK';

?>