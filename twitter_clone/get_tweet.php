<?php
	session_start();
	if (!$_SESSION['usuario']){
	 header('Location: index.php?erro=1');
	}
	
	require_once('db.php');
	
	$id_usuario = $_SESSION['id_usuario'];
	
	$objDB = new db();
	$link = $objDB->conecta_mysql();
	
	$sql = "SELECT usu.usuario ,t.id_tweet, t.tweet,DATE_FORMAT(t.data_inclusao,'%d %b %Y - %T') as data_inclusao FROM tweet AS t
JOIN usuarios AS usu
ON usu.id = t.id_usuario
WHERE  t.id_usuario = $id_usuario OR t.id_usuario IN (SELECT seguindo_id_usuario FROM usuarios_seguidores where usuarios_seguidores.id_usuario = $id_usuario)
ORDER BY t.data_inclusao DESC
	";

	$resultado_id = mysqli_query($link,$sql);	
	if  ($resultado_id){
		while ($registro = mysqli_fetch_array($resultado_id,MYSQLI_ASSOC)){
			echo "<a href='#' class='list-group-item chama-modal' data-id_tweet=".$registro['id_tweet'] ." data-toggle='modal' data-target='#exampleModalCenter' >";
				echo "<h4 class='list-group-item-heading'>". $registro['usuario']."  <small style='float:right;'>".$registro['data_inclusao'] ."</small></h4> ";			
				echo "<p class='list-group-item-text'>".$registro['tweet']."</p>"; 
			echo '</a>';
			
		}
	}else{
		echo 'Erro na consulta de tweets no banco de dados';
	}

?>


