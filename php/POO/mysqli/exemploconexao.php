<?php 
$conn = new mysqli("localhost","root","root","dbphp7");

	if($conn->connect_error){
		echo "Error: ".$conn->connect_error;
	}
	
$result = $conn->query('select * from tb_usuario');

$data=array();
while ($row = $result->fetch_array(MYSQLI_ASSOC)){
	array_push($data,$row);
	
}
echo json_encode($data);

		// $stmt = $conn->prepare('insert into tb_usuario(deslogin , senha) VALUES(?,?)');
		
		// $stmt->bind_param("ss",&$user, $senha);
		// $user = 'eu';
		// $senha='123';
		
		// $stmt->execute();
	
?>