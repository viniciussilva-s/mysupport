<?php 
		class n_usuario{
			
			private $id; 	
			private $usu; 
			private $email;
			private $senha;
			private $img;
			
			public function set_usu($usuario){
				$this->usu = $usuario;
			}
			public function set_email($email){
				$this->email = $email;
			}
			public function set_senha($senha){
				$this->senha= $senha;
			}
			public function get_geral(){
				echo "$this->email aqui $this->usu $this->senha";
			
			}
			
		}
		
	require_once('db.php');
	
	$objDB = new db();
	$link = $objDB->conecta_mysql();	
		
	$sql= "select * FROM usuarios where id = 2"	;
	
	$resultado = mysqli_query($link,$sql);
	$dados_usu = mysqli_fetch_array($resultado,MYSQLI_ASSOC);
	if ($resultado){
			///print_r($dados_usu);
			
		$n1 = new n_usuario(); 
		$n1->set_usu($dados_usu['usuario']);
		$n1->set_email($dados_usu['email']);
		$n1->set_senha($dados_usu['senha']);	
		
	echo $n1->get_geral();		
	}else {
		echo 'erro de sintaxe';
	}
	
	// $n1 = new n_usuario(); 
	// $n1->set_usu('vini');
	// $n1->set_email('vini@ba.com');
	// $n1->set_senha('123456');
	
	//echo $n1->get_geral();
	
?>