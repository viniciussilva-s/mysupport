<?php 
	class pessoa{
		private $nome;
		
		public function correr(){
			echo $this->nome." tá correndo";
		}
		function __construct($pt_nome){
			echo "construtor inciado <br/>";
			echo $this->nome =$pt_nome;
			
		}
		function __destruct(){
			echo"  Objeto removido <br>";
		}
	}
	$pessoa= new pessoa('Vini');
	$pessoa->correr();
?>