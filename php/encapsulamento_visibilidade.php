<?php 
	class veiculo{
		
		private $placa , $cor ,$pl01,$pl02;
		protected $tipo = 'Caminhonete';
		
		public function setPlaca($parametro_placa){
			//validação de atributo
					
			if (strlen($parametro_placa)== 7 ){
				$this->pl01=strtoupper(substr($parametro_placa,0,3));
				if (is_numeric(substr($parametro_placa,3,7))){
					$this->pl02= (substr($parametro_placa,3,7));
				}			
			}
			//$this->placa=$parametro_placa;
		}
		public function getPlaca(){
			
			return 'Placa: '.$this->pl01.'-'.$this->pl02;
		}
				
	}
	class carro extends veiculo{
		public function exibirTipo(){
			echo $this->tipo;
		}
	}
	$veiculo=new veiculo();
	$veiculo->setPlaca('gty2015');
	echo $veiculo->getPlaca(); 
	
	$carro = new carro();
	$carro->exibirTipo();
	echo"<br/>";
	print_r($veiculo);
		
?>