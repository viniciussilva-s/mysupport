<?php 
/*
	class Pessoa{
		
		var $nome;
		var $idade;
		var $sexo;
		
		
		function setInfo($nome_definido,$ida,$sx){
			$this->nome = $nome_definido;
			$this->idade=$ida;	
			$this->sexo=$sx;
		}
		function getInfo(){
				$nome  = $this->nome;
				$idade = $this->idade;
				$sexo  = $this->sexo;
			
			return "Boa noite $nome, Seu sexo é: $sexo e a sua idade é: $idade"; 			
		}
	}
	$pessoa = new Pessoa();
	$pessoa->setInfo('Vinicius','18','Masc');
	echo $pessoa->getInfo();
*/
	class conta{
		var $nome,$lim,$deposito,$sacar;
		
		function setConta($nome,$lim,$deposito,$sacar){
			$this->nome = $nome ;
			$this->lim  = $lim ;
			$this->deposito = $deposito; 
			$this->sacar = $sacar;
		}
		function getPrimeiroSaque(){
			$nome = $this->nome ;
			$lim  = $this->lim;
			$deposito = $this->deposito; 
			$sacar = $this->sacar;
			$lim = $lim + $deposito;
			if ($sacar < $lim ){
				$lim =  $lim - $sacar;
				return "Caro Sr(a) $nome , Seu atual saldo: $lim";
			}
			else {
				return "Caro Sr(a) $nome , Seu limite é insulficiente: $lim";
				
			}
		}
		
	}

$conta01 = new conta();
$conta01->setConta('Vinicius',1000,150,250); 	
echo $conta01->getPrimeiroSaque();

$conta02 = new conta();
$conta02->setConta('Bruno','300','100','450');
echo '<br/>'. $conta02->getPrimeiroSaque();



?>