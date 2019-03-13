<?php
	session_start();
	if (!$_SESSION['usuario']){
	 header('Location: index.php?erro=1');
	}
	
	require_once('db.php');
	$nome_pessoa = $_POST['nome_pessoa'];
	$id_usuario = $_SESSION['id_usuario'];
	
	$objDB = new db();
	$link = $objDB->conecta_mysql();
	
	$sql = " SELECT u.*, us.*
		FROM usuarios AS u 
		LEFT JOIN usuarios_seguidores AS us
		ON (us.id_usuario = $id_usuario AND u.id = us.seguindo_id_usuario)
		WHERE u.usuario like '%$nome_pessoa%' AND u.id <>$id_usuario
	"; // like e % é usado para uma comparaçao de caracter ou seja , qlqr combinação caracter existe no bd e retorna

	$resultado_id = mysqli_query($link,$sql);	
	
	if  ($resultado_id){
		while ($registro = mysqli_fetch_array($resultado_id,MYSQLI_ASSOC)){
			echo "<a href='#' class='list-group-item'>";
				echo "<strong>".$registro['usuario'] . " </strong> <small> - ".$registro['email'] . "  </small>";
					echo '<p class="list-group-item-text pull-right">';
					
					if ( (isset($registro['id_usuario_seguidores']))  and !(empty($registro['id_usuario_seguidores'] ))    ){
						$btn_seguir_pessoa_display = 'none';
						$btn_deixar_seguir_pessoa_display ='block';
					}else{
						$btn_seguir_pessoa_display = 'block';
						$btn_deixar_seguir_pessoa_display ='none';
					}
										
					echo "<button type='button' style='display:".$btn_seguir_pessoa_display.";' id='btn_seguir_".$registro['id']."' class='btn btn-default btn_seguir' data-id_usuario=".$registro['id'].">Seguir</button>";
					
					echo "<button type='button' style='display:".$btn_deixar_seguir_pessoa_display.";' id='btn_deixar_seguir_".$registro['id']."' class='btn btn-primary btn_deixar_seguir' data-id_usuario=".$registro['id'].">Deixar de seguir</button>";
					
					echo '</p>';
					echo '<div class="clearfix"></div>';
			echo '</a>';
		}
	}else{
		echo 'Erro na consulta de usuarios no banco de dados';
	}
	
?>
