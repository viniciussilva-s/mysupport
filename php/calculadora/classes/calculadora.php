<?php 
	class calculadora{
		private $total , $n01 , $n02; 
		
		function __construct(){
			$this->total = 0 ;
			$this->n01 = 0 ;
			$this->n02 = 0 ;
		}
		public function setNumero1($numero01){
			$this->n01=$numero01;	 
		}
		public function setNumero2($numero02){
			$this->n02=$numero02;	
		}
		
		//operacoes 
		public function somar(){
			$this->total= $this->n01 + $this->n02;	
		} 
		public function subtrair(){
			$this->total= $this->n01 - $this->n02;	
		} 
		public function multiplicar(){
			$this->total= $this->n01 * $this->n02;	
		} 
		public function dividir(){
			$this->total= $this->n01 / $this->n02;	
		} 
		
		// total 
		public function getTotal(){
			return $this->total;	
		} 
		
			
	}
?>