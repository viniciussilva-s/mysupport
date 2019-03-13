<?php
	session_start();
	
	if (!$_SESSION['usuario']){
	 header('Location: index.php?erro=1');
	}
	
	require_once('config.php');
	
	$texto_tweet = $_POST['texto_tweet'];
	$id_usuario = $_SESSION['id_usuario'];
	
	if ($texto_tweet =='' || $id_usuario == ''){
		echo 'Erro na inserção do tweet';
		die;	
	}
	$novo_usuario = new Usuario();
	$novo_usuario->insert_tweet($texto_tweet);
	
	//require_once('db.php');
	// $objDB = new db();
	// $link = $objDB->conecta_mysql();
	// $sql = "insert into tweet (id_usuario,tweet) values($id_usuario,'$texto_tweet')";
		
	// mysqli_query($link,$sql);
	
?>
