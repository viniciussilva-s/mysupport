<?php
	session_start();
	if (!$_SESSION['usuario']){
	 header('Location: index.php?erro=1');
	}

	require_once('config.php');
		
	//$n_usuario = ('name_edit','email_edit','control_file_edit','senha-atual' = 'Senha_atual_edit ','nova-senha1'= 'Senha_nova_edit1 ','nova-senha2' ='Senha_nova_edit2');
	
$usu = new usuario();	
	$n_usuario = array();
	foreach ($_POST as $info => $values){
		$n_usuario[$info] = $values; 	
	}
	
	$senha_atual = md5($n_usuario['Senha_atual_edit']);
	$senhaCad = $usu->getSenha();
	
	$location = 'Location: edit_usu.php?';
	if ($senhaCad == $senha_atual ){
		$senha = !(empty($n_usuario['Senha_nova_edit2']))?md5($n_usuario['Senha_nova_edit2']): $senhaCad ;
		$usu->setSenha($senha);	
	}else {
		header($location .= 'erro_senha=1&');
		//return false ;
	}

		
		echo "<pre>";
		//print_r($_FILES['fileedit']);
		echo "</pre>";
		$file  = $_FILES["fileedit"];

		if($file['error']){
			//throw new Exception ("Error: ".$file['error']);
			header($location .= 'erro_img=1&');	
		}

		$dirUploads = "imagens";
		if(!is_dir($dirUploads)){
			mkdir($dirUploads);
		}
		$e = explode('.',$file['name']);
		



		if(move_uploaded_file($file["tmp_name"],$dirUploads. DIRECTORY_SEPARATOR .($file['name'] = $usu->getUsuario().".".$e[1])  )){
			
			//echo "Upload realizado com sucesso!" ; 
			$i = $dirUploads."/". $file['name'];
			$usu->setImg($i); 
			$usu->update_usuario();
		}else{
			//throw new Exception ("Não foi possivel realizar o upload");
			header($location .= 'erro_img=1&');	
		}
			
	
	$usu_edit = $n_usuario['name_edit'];
	$email_edit = $n_usuario['email_edit'];
	
	$dados_usuario['usuario']= ver_usu($usu,$usu_edit);
	$dados_usuario['email'] = ver_email($usu,$email_edit);
	$retorno_get='';
		
		// if ((!isset($dados_usuario['usuario'])) || (!isset($dados_usuario['email']))){
			// if (!(empty($dados_usuario['usuario']))){
				// $retorno_get='erro_usuario=1&';
			// }
			// if (!(empty($dados_usuario['email']))){
				// $retorno_get='erro_email=1&';
			// }
			// //header($location .= $retorno_get);
		// }
		// if ((empty($dados_usuario['email'])) and (empty($dados_usuario['usuario']))) {
			// // (!empty($usu_edit))?$usu->setUsuario($usu_edit):$usu->getUsuario();
			// // (!empty($email_edit))?$usu->setEmail($email_edit) :$usu->getEmail();
						
			// $usu->update_usuario();
			
			// // $_SESSION['usuario']=$usu;
			// // $_SESSION['email']= $email;
			// //cad_usu($link,$id_usuario,$usu,$email,$senha);
		//}
		
		function ver_usu($usu,$usu_edit){
			//$usu = new usuario();
			$dados_usuario = $usu->consulta_usu('usuario',$usu_edit);
			if (empty($dados_usuario)){
				$usu->setUsuario($usu_edit);
				$usu->update_usuario();
			}
			return ($dados_usuario);
		}
		function ver_email($usu,$email_edit){
			$usu = new usuario();
			$dados_usuario = $usu->consulta_usu('email',$email_edit);
			if (empty($dados_usuario)){
				$usu->setEmail($email_edit);
				$usu->update_usuario();
			}
			
			return ($dados_usuario);
		}



?>