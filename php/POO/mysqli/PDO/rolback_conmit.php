<?php 

/* Uma outra opção de conexão ao BD
*/
	$conn = new PDO('mysql:dbname=dbphp7;host=localhost',"root","root");
	 
	$conn->beginTransaction();
	
	$stmt = $conn->prepare('insert into tb_usuario(deslogin , senha) VALUES(:usu,:senha)');

	$stmt->bindParam(":usu",$use);
	$stmt->bindParam(":senha",$senha);
	$use = "15,33";
	$senha="0001";
		
	$stmt->execute();
	
	//$conn->rollback(); funçao cancela a execute do sql
	$conn->commit(); //reliza a a gravação ou exclusão de dados
	
	echo "Inserçao com sucesso";
	
/*	Realizar Inserçao com um array , é usando o primeiro interrogação com o primeiro elemento da array 
	
	$stmt = $conn->prepare('insert into tb_usuario(deslogin , senha) VALUES(?,?)');
	
	passando a array a ser inserida no banco de dados 
	$stmt->execute(array($usuario,$senha));
	
*/	
/* Uma opção de conexão ao BD ; 

	$mysqli = new mysqli('localhost', 'root', 'root', 'dbphp7');

	$stmt= $mysqli->prepare('insert into tb_usuario(deslogin , senha) VALUES(?,?)');

	$stmt->bind_param("ss",$use,$senha);
	$use = "vins10";
	$senha="123457";

	$stmt->execute();
*/



//$results = $stmt->fetchALL(PDO::FETCH_ASSOC);
// echo "<pre>";
// print_r($results);
// echo "</pre>";

// foreach ($results as $row ){
	// foreach($row as $keys => $values){
		// echo $keys;
		// echo ": ".$values;
		// echo "<br/>";
	// }
// }
?>