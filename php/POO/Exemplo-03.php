<?php
	class endereco{
		private $logradouro;
		private $numero;
		private $cidade;
		
		public function __construct($logradouro,$numero,$cidade){
			$this->logradouro = $logradouro;
			$this->numero = $numero; 
			$this->cidade =$cidade; 
		}
		public function __destruct(){
			var_dump('destruir'); 
		}
		public function __toString(){
			return $this->logradouro.",". $this->numero."-".$this->cidade;
		}
	}
	

	$meuede = new endereco("Av. Queiroz Filho","123","Santos");
	// var_dump($meuede);
	// unset($meuede);
	echo $meuede;

?>