<?php
	session_start();
	
	if (!$_SESSION['usuario']){
	 header('Location: index.php?erro=1');
	}
	$id_usuario = $_SESSION['id_usuario'];
	require_once('db.php');
	$id_tweet = $_POST['id_tweet'];	
	$objDB = new db();
	$link = $objDB->conecta_mysql();
	$sql = " SELECT u.id,u.usuario,t.id_tweet,t.tweet, DATE_FORMAT(t.data_inclusao,'%d/%c - %T') as data_inclusao    FROM tweet AS t 
				LEFT JOIN usuarios AS u
				ON (t.id_usuario = u.id)
				WHERE t.id_usuario=  $id_usuario and t.id_tweet = $id_tweet
			" ;

			$resultado_id = mysqli_query($link ,$sql);
	if($resultado_id){
		$tweets = mysqli_fetch_array($resultado_id,MYSQLI_ASSOC);
		if (isset($tweets) and !empty($tweets)){
			echo"
			<div class='modal-header'>
				<h5 style='font-weight:bold;'class='modal-title' id='exampleModalLongTitle'>".$tweets['usuario']." <small >: ".$tweets['data_inclusao'] ."</small></h5>
						<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
						  <span aria-hidden='true'>&times;</span>
						</button>
					  </div>
					  <div class='modal-body'>
					  <textarea id='edit_t' rows='20' cols='50' maxlength='140' class='cursor-close' style='margin: 0px; width: 519px; height: 66px;'>
						".$tweets['tweet']."
						</textarea><i id='edit_i' class='fas fa-edit'><label for='#edit_i'>Editar</label></i> <i id='excluir_i'class='fas fa-trash-alt'><label for='#excluir_i'>Excluir</label></i>
					  </div>
					  <div class='modal-footer'>
					  
						<button id='close' type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
						<button id='alt_reg'type='button' class='btn btn-primary' data-dismiss='modal'>Salvar alterações</button>
					</div>	
						
		";
		}else{
			$objDB = new db();
			$link = $objDB->conecta_mysql();
				$sql = " SELECT u.id,u.usuario,t.id_tweet,t.tweet,DATE_FORMAT(t.data_inclusao,'%d %b %Y - %T') as data_inclusao FROM tweet AS t 
						LEFT JOIN usuarios AS u
						ON (t.id_usuario = u.id)
						WHERE t.id_tweet = $id_tweet
					" ;
			
			$resultado_id = mysqli_query($link ,$sql);
			if($resultado_id){
				$tweets = mysqli_fetch_array($resultado_id,MYSQLI_ASSOC);
				echo"
					<div class='modal-header'>
						<h5 style='font-weight:bold;' class='modal-title' id='exampleModalLongTitle'>".$tweets['usuario']."<small >: ".$tweets['data_inclusao'] ."</small></h5>
								<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
								  <span aria-hidden='true'>&times;</span>
								</button>
							  </div>
							  <div class='modal-body'>
								".$tweets['tweet']."
							  </div>
							  <div class='modal-footer'>
							  
								
							</div>	
							  
						";	  
			}else{
					echo'Erro de sintaxe, comunique ao programador '; 
				}
		}
	}		
	else{
		echo'Erro de sintaxe, comunique ao programador '; 
	}
	
	//$id_tweet = $_POST['id_tweet'];
	$update = isset($_POST['update'])?$_POST['update']:0;
	$delete = isset($_POST['delete'])?$_POST['delete']:0;
	
	if ($update){
		$id_tweet = $_POST['id_tweet'];	
		$text_alt= isset($_POST['text_alt'])?$_POST['text_alt']:"";
		
		require_once('config.php');
		$n_usuario = new usuario();
		$n_usuario->update_tweet($text_alt ,$id_tweet);
					
	/*	Antigo		
		$sql='UPDATE tweet SET id_usuario= '.$id_usuario .' ,tweet= "'.$text_alt.'"  WHERE id_tweet = '.$id_tweet.' and  id_usuario=  '.$id_usuario .' ';
		require_once('db.php');

		$objDB = new db();

		$link = $objDB->conecta_mysql();
		$resultado_id = mysqli_query($link ,$sql);
		
		if($resultado_id){ 
		//echo "TUDO OK";
		}
		else{
			echo"erro de sintaxe no update";
		}
	*/
		return false;
	}
	if ($delete){
		require_once('config.php');
		$n_usuario = new Usuario();
		$n_usuario->delete_tweet($id_tweet);
	/* antigo	
		$sql=' DELETE FROM tweet WHERE id_tweet = '.$id_tweet.' and  id_usuario=  '.$id_usuario .' ';
		$objDB = new db();
		$link = $objDB->conecta_mysql();
		$resultado_id = mysqli_query($link ,$sql);
		if($resultado_id){ 
		}
		else{
			echo"erro de sintaxe no update";
		}
	*/
		return false;
	}
	
		
	
?>
<html>
<head>
	<script type="text/javascript">
		function alterar(){
			//alert('vlou editar');
		}
	</script>
	
		
</head>
<body></body>



</html>
