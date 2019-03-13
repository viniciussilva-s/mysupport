<?php
	class db{
		private $host = 'localhost';
		private $usuario = 'root';
		private $password = 'root';
		private $db ='twitter_clone';

		public function conecta_mysql(){
			//mysqli_connect(localização do bd ,usuario de acesso,senha,db);
			$con = mysqli_connect($this->host,$this->usuario,$this->password,$this->db);
			// variavel que guarda informação de conexão ao db , e o uf8 set semelhante ao charset do html		
			mysqli_set_charset($con,'utf8');
			//verificar se houve erro de conexao
			
			if(mysqli_connect_errno() ){ // varialve que verifica a conexao que se nao for 0 deu erro
				echo 'Erro ao tentar se conectar com o BD Mysql: '.mysqli_connect_error() ;// a presenta a mensagem que deu erro 
			}
			return $con;
		}	
	
	
	}

?>