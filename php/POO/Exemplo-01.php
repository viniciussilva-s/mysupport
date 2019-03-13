<?php
	class Pessoa{
		public $nome;
		public $idade;
		
		public function set_nome($nome){
			$this->nome= $nome;
		}
		public function set_idade($idade){
			$this->idade= $idade;
		}
		public function get_pessoa(){
		 return $this->name; // $this->idade;
		}
		public function falar(){
			echo "O(a) $this->nome estar falando, e sua idade : $this->idade";
		}
		
	}
	$n1 = new pessoa ();
	$n1->nome ='Vinicius1';
	$n1->set_idade(30);
	
	$n1->falar();
?>