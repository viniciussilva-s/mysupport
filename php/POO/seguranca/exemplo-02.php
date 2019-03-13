<?php

$id = (isset($_GET['id']))?$_GET['id']:1;
if (!is_numeric($id) || strlen($id)>5) {
	exit('Pegamos vocÊ!');
}
$conn = mysqli_connect("localhost","root","root","dbphp7");
$sql="SELECT * FROM tb_usuario WHERE idusuario = $id";
$resul = mysqli_query($conn,$sql);
while ($resultado = mysqli_fetch_array($resul)){
	echo $resultado['deslogin']."<br/>";
}
?>