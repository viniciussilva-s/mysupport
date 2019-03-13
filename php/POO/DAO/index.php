<?php

require_once('config.php');
//carrega a tabela pela class sql 
	// $sql = new Sql();
	// $tbUsuario =$sql->select("Select * From tb_usuario");
	// echo json_encode($tbUsuario);

//carragar um unico usuario;
	// $usu = new Usuario();
	// $usu->loadById(2);
	// echo $usu;

//carrega lista de usuario
	// $lista = Usuario::getList();
	// echo json_encode($lista);


//carrega lista de usuario buscando pelo deslogin
	// $lista = Usuario::search("vin");
	// echo json_encode($lista);

//carraga usuario ,usando o login e senha 
	//$usu = new Usuario();
	//$usu->login('root','1515');
	//echo $usu;

//Usando Procedue para insert de dados no banco , e usando um select para retorna o ultimo dado inserido...	
	// $aluno = new Usuario('Usuario 05','123456');
	// $aluno->insert();
	// echo $aluno; 
	
// Alterando usuario 	
	// $usu = new Usuario();
	// $usu->loadById(26);
	// $usu->update('Usuario 01','1234');
		// echo $usu;
		
// Função Delete 
	$usu = new Usuario();
	$usu->loadById(25);
	$usu->delete();
		//echo $usu;
?>