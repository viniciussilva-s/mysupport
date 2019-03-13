<?php
	interface veiculo {
		public function acelerar ($velocidade);
		public function frenar($velocidade);
		public function trocarMarcha($marcha);
	}
	abstract class automovel implements veiculo{
		
		// private $;
		// private $;
		// private $;
		
		public function acelerar ($velocidade){
			echo "O veiculo acelerou até ".$velocidade."km/h <br/>";
			if ($velocidade == 20){
				$this->trocarMarcha(2);
			}
		}
		public function frenar($velocidade){
			echo "O veículo frenou até".$velocidade."km/h <br/>";
			
		}
		public function trocarMarcha($marcha){
			echo "O veículo engatou a  ".$marcha." marcha";
		}
	}
	class DelRey extends automovel{
		public function empurrar(){
			
		}
	}
	$carro = new DelRey();
	$carro->acelerar(200);
	
	
?>	