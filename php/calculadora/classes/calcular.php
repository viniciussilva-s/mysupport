<?php 
	require_once 'calculadora.php';
	$n01 = $_POST['numero1'];
	$n02 = $_POST['numero2'];
	$opc = $_POST['opc'];
	
	$calculadora = new calculadora();
	$calculadora->setNumero1($n01);
	$calculadora->setNumero2($n02);
	
	
	switch ($opc){
		case 'somar':
			$calculadora->somar();	
			break;
		case 'subtrair':
			$calculadora->subtrair();	
			break;
		case 'multiplicar':
			$calculadora->multiplicar();	
			break;
		case 'dividir':
			$calculadora->dividir();	
			break;
	} 
	echo $calculadora->getTotal();
	
?>