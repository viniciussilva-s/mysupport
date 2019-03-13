<?php

	abstract class animal{
		public function falar(){
			return "Som";
		}
		public function mover(){
			return "Anda";
		}
		
	}
	class cachorro extends animal{
		public function falar(){
			return "Late";
		}	
		
	}
	class gato extends animal{
		public function falar(){
			return "Mia";
		}		
	}	
	class passaro extends animal{
		public function falar(){
			return "Canta";
		}		
		public function mover(){
			return "Voar e ". parent::mover() ;
		}
	}
	$pluto = new cachorro();
	echo $pluto->falar() . "<br/>";
	echo $pluto->mover() . "<br/>";
	
	echo"------------------------<br/>";
	
	$gato = new gato();
	echo $gato->falar() . "<br/>";
	echo $gato->mover() . "<br/>";
	
	echo"------------------------<br/>";
	
	$passaro = new passaro();
	echo $passaro->falar() . "<br/>";
	echo $passaro->mover() . "<br/>";



?>