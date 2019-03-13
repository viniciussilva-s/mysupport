<?php
	session_start();
	require_once('config.php');

	$usu = $_POST['usuario'];
	//$email = $_POST['email'];
	$senha = md5($_POST['senha']);
	$novo_usuario= usuario::login($usu,$senha);
	
	if(!empty($novo_usuario)){
		echo"nao estou vazio";
	
		foreach($novo_usuario as $keys =>$value){
						
			$_SESSION['id_usuario']=$value['id'];
			$_SESSION['usuario']=$value['usuario'];
			$_SESSION['email']=$value['email'];
			
			$n1 = new Usuario();
		}
			
		header('Location: home.php');
	}else{
		header('Location: index.php?erro=1');
	}
	
?>