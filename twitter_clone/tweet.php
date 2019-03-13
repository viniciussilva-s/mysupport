<?php
	session_start();
	if (!$_SESSION['usuario']){
	 header('Location: index.php?erro=1');
	}
	
	require_once('config.php');

	$n_usuario = new Usuario();
	$tweets = $n_usuario->qtd_tweet();
	
	if($tweets){
		echo (isset($tweets['qtd']) ?$tweets['qtd']:0 );	
	}else{
		echo'Erro de sintaxe, comunique ao programador ';
	}
	/*
	require_once('db.php');
	$objDB = new db();
	$link = $objDB->conecta_mysql();
 	$sql = "SELECT COUNT(*) as qtd FROM tweet AS t WHERE t.id_usuario= $id_usuario";
	$resultado_id = mysqli_query($link ,$sql);
	$tweets = mysqli_fetch_array($resultado_id,MYSQLI_ASSOC);
	*/
?>
