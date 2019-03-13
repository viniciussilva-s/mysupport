<?php 
$conn = new PDO('mysql:dbname=dbphp7;host=localhost',"root","root");

$stmt = $conn->prepare('SELECT * FROM tb_usuario');

$stmt->execute();

$results = $stmt->fetchALL(PDO::FETCH_ASSOC);
// echo "<pre>";
// print_r($results);
// echo "</pre>";

foreach ($results as $row ){
	foreach($row as $keys => $values){
		echo $keys;
		echo ": ".$values;
		echo "<br/>";
	}
}
?>