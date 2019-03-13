<?php
	session_start();
	
	if (!$_SESSION['usuario']){
	 header('Location: index.php?erro=1');
	}
	$id_usuario = $_SESSION['id_usuario'];
	
	class alterabutton{
		public $btnSeguir;
		public $btn_deixarSeguir;
		
		public function set_btn($seguir , $deixarSeguir){
			$this->btnSeguir =$seguir; 
			$this->btn_deixarSeguir =$deixarSeguir; 
			
		}
		function get_btnSeguir(){
			 return $this->btnSeguir;
		}
		function get_btn_deixarSeguir(){
			return $this->btn_deixarSeguir;
		}
		
	}
	function new_select($seguidores){
		require_once('db.php');
		$id_usuario = $_SESSION['id_usuario'];
		$objDB = new db();
		$link = $objDB->conecta_mysql();
		
		$sql2 = "SELECT us.seguindo_id_usuario as id FROM usuarios_seguidores as us LEFT JOIN usuarios as u on ( us.seguindo_id_usuario = u.id ) WHERE us.id_usuario = ".$id_usuario." ";
		
		$resultado_id2 = mysqli_query($link ,$sql2);
		$te = "";
		$ret = array();
		if($resultado_id2){
			while ($return1= mysqli_fetch_array($resultado_id2,MYSQLI_ASSOC)){
				$ret = $return1; 
				foreach($ret as $item){ 
					// vare o vetor
					if ($item == $seguidores['id']){ 
						$te = 1; 
						//$altbutton->set_btn('none','block');
						return $te;
					}else{
						//$altbutton->set_btn('block','none');
						$te = 0; 							
					}
					
				}
			}
			
		}else{
			echo 'erro de sintaxe';
		}
		
	}
	
	require_once('db.php');

	$objDB = new db();
	
	$link = $objDB->conecta_mysql();

	$sql = " SELECT us.id_usuario as id, u.usuario,us.id_usuario_seguidores , (SELECT COUNT(*) FROM usuarios_seguidores AS us WHERE us.seguindo_id_usuario= ".$id_usuario."  )as qtd   
FROM usuarios_seguidores AS us 
LEFT JOIN  usuarios as u 
ON (u.id = us.id_usuario)
WHERE us.seguindo_id_usuario= ".$id_usuario." GROUP BY  us.id_usuario
	
	";

	$resultado_id = mysqli_query($link ,$sql);
	
	$pux_seguidores = isset($_POST['pux_seguidores'])?$_POST['pux_seguidores']:0; // puxar seguidores e inserir em campo  os seguidores
		if($pux_seguidores){
			if($resultado_id){
					while ($seguidores = mysqli_fetch_array($resultado_id,MYSQLI_ASSOC)) {
						
							$a = new_select($seguidores);// puxa outro select sendo ele dos id que eu sigo 
							if ($a){ // verifica se foi criada e se nao esta vazia
								
								$altbutton = new alterabutton();
								$altbutton->set_btn('none','block');								
							}else{
								$altbutton = new alterabutton();
								$altbutton->set_btn('block','none');
							}	
						echo "<a href='#' class='list-group-item'>";
							echo "<strong>".$seguidores['usuario'] . " </strong>"; // <small> - ".$registro['email'] . "  </small>
								echo '<p class="list-group-item-text pull-right">';
							if ( (isset($seguidores['id_usuario_seguidores']))  and !(empty($seguidores['id_usuario_seguidores'] )) ){
								$btn_seguir_pessoa_display=  $altbutton->get_btnSeguir();
								$btn_deixar_seguir_pessoa_display = $altbutton->get_btn_deixarSeguir();	
							
								echo "<button type='button' style='display:".$btn_seguir_pessoa_display.";' id='btn_seguir_".$seguidores['id']."' class='btn btn-default btn_seguir' data-id_usuario=".$seguidores['id'].">Seguir</button>";
								
								echo "<button type='button' style='display:".$btn_deixar_seguir_pessoa_display.";' id='btn_deixar_seguir_".$seguidores['id']."' class='btn btn-primary btn_deixar_seguir' data-id_usuario=".$seguidores['id'].">Deixar de seguir</button>";
								
								echo '</p>';
								echo '<div class="clearfix"></div>';
							echo '</a>';
							}
						
					
					
					}
				return false;
			}else{
				echo"erro de sitaxe";
			}	
		}
			
		else{
			
		}
	
	if($resultado_id){
		$seguidores = mysqli_fetch_array($resultado_id,MYSQLI_ASSOC);
		echo (isset($seguidores['qtd']) ?$seguidores['qtd']:0 );	
		
	}else{
		echo'Erro de sintaxe, comunique ao programador ';
		
	}
?>
