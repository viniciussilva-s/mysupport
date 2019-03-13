<?php
/* VIA CEP PARA BUSCA DE ENDEREÇO , RETORNO POR JSON    */ 

$end1 = endereco_cep('02850000');
$end2 = endereco_cep('05319000');
echo "<pre>";
print_r($end1);
echo "<br/>Proxi <br/>";
print_r($end2);
echo "</pre>";
	function endereco_cep($cep){
		//$cep = '02850000';
		$link = "https://viacep.com.br/ws/$cep/json/";

		$ch = curl_init($link);

		curl_setopt($ch,CURLOPT_RETURNTRANSFER , 1);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);

		$response = curl_exec($ch);

		curl_close($ch);

		$data = json_decode($response,true);

		return $data;
	}



?>