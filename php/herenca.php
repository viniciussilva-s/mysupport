<?php 
	class Felino{
		var $mamifero ='sim';
		var $corre;
		var $nome; 
		function correr(){
			echo 'Correr como felino';
		}
	}
	class chita extends felino{
		
		function setChita ($chita,$correr){
			$this->nome = $chita;
			$this->correr = $correr;
		}
		function getChita (){
			return 'Nome do animal '.$this->nome.' velocidade '.$this->correr ;
		}
		
	}
	class gato extends felino{
		function setGato ($gato,$correr){
			$this->nome = $gato;
			$this->correr = $correr;
		}
		function getGato(){
			return 'Nome do animal '.$this->nome.' velocidade '.$this->correr ;
		}
		
	}
	$chita = new chita();
	echo $chita->setChita('chita',100);
	echo $chita->getChita();
	echo '<br/>';
	$gato = new gato();
	echo $gato->setGato('gato',30);
	echo $gato->getGato();
?>