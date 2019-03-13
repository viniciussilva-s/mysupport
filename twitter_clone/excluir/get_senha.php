<?php
	session_start();
	if (!$_SESSION['usuario']){
	 header('Location: index.php?erro=1');
	}
	
	require_once('db.php');
	
	$objDB = new db();
	$link = $objDB->conecta_mysql();
	
	$id_usuario = $_SESSION['id_usuario'];
	//$senha_atual = $_POST['senha_atual'];
	
	
 	
?>