<?php
	session_start();
	
	if (!$_SESSION['usuario']){
	 header('Location: index.php?erro=1');
	}
	require_once('db.php');
	require_once('config.php');
	
	$id_usuario = $_SESSION['id_usuario'];
	$deixar_seguir_id_usuario = $_POST['deixar_seguir_id_usuario'];
	
	if ($id_usuario =='' || $deixar_seguir_id_usuario == ''){
		echo 'Erro na exclusão d_s.php';
		die;	
	}
	$seguir = new Usuario();
	$seguir->delete_seguidores($deixar_seguir_id_usuario);
	
	/*
	$objDB = new db();
	$link = $objDB->conecta_mysql();
	$sql = " DELETE FROM  usuarios_seguidores WHERE id_usuario = $id_usuario AND seguindo_id_usuario = $deixar_seguir_id_usuario";
		
		echo $sql;
	mysqli_query($link,$sql);
	//mysqli_fetch_array('');
	
	*/
	
	
?>
