<?php
	require_once('db.php');

	$usu = $_POST['usuario'];
	$email = $_POST['email'];
	$senha = md5($_POST['senha']);
	
	$objDB = new db();
	$link = $objDB->conecta_mysql();
	$dados_usuario['usuario']= ver_usu($link,$usu);
	$dados_usuario['email'] = ver_email($link,$email);
	$retorno_get='';
	
		if ((isset($dados_usuario['usuario'])) || (isset($dados_usuario['email']))){
			if ((isset($dados_usuario['usuario']))){
				$retorno_get='erro_usuario=1&';
			}
			if ((isset($dados_usuario['email']))){
				$retorno_get='erro_email=1&';
			}
			
			header('Location: inscrevase.php?'.$retorno_get);
		}
		if ((!isset($dados_usuario['email'])) and (!isset($dados_usuario['usuario'])) ) {
			cad_usu($link,$usu,$email,$senha);
		}
		
		function ver_usu($link,$usu){
			$sql = "SELECT usuario FROM usuarios WHERE usuario = '$usu'";
			$resultado_id = mysqli_query($link,$sql);
			$dados_usuario = mysqli_fetch_array($resultado_id,MYSQLI_ASSOC);
			return ($dados_usuario);
		}
		function ver_email($link,$email){
			$sql = "SELECT email FROM usuarios WHERE email = '$email'";
			$resultado_id = mysqli_query($link,$sql);
			$dados_usuario = mysqli_fetch_array($resultado_id,MYSQLI_ASSOC);
			return ($dados_usuario);
		}
		
		function cad_usu($link,$usu,$email,$senha){
			$sql ="insert into usuarios(usuario,email,senha) values ('$usu','$email','$senha')";
			// executar o comando sql  PARAM 1 - a conexão do db , 2 - o comando a ser executado
			if(mysqli_query($link,$sql)){// verifica se tem algum erro de sintaxe o if 
				echo'Usuário registrado com sucesso!';
			}else{
				echo 'Erro ao registrar o usuário!';
			}
		}
?>