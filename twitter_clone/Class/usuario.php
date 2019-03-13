<?php
		require_once('Sql.php');
	class Usuario{
		private $id;
		private $usuario;
		private $email;
		private $senha;
		private $dtcadastro;
		private $img;
		
		public function setId($value){
			$this->id=$value;
		}
		public function setUsuario($value){
			$this->usuario = $value;
		}
		public function setEmail($value){
			$this->email = $value;
		}
		public function setSenha($value){
			$this->senha=$value;
		}
		public function setDtcadastro($value){
			$this->dtcadastro=$value;
		}
		public function setImg($value= "imagens/usuariodefault.png"){
			// if(!isset($value) and empty($value)){
			// $this->img='imagens/usuariodefault.png';
			// }
			$this->img=$value;
			
		}
		
		public function setData($data){
			$this->setid($data['id']);
			$this->setUsuario($data['usuario']);
			$this->setEmail($data['email']);
			$this->setSenha($data['senha']);
			$this->setDtcadastro(new DateTime($data['dtcadastro']));
			$this->setImg($data['img']);
				
		}
		
		//---------- END SET 
		public function getId(){
			return $this->id;
		}
		public function getUsuario(){
			return $this->usuario;
		}
		public function getEmail(){
			return $this->email;
		}
		public function getSenha(){
			return $this->senha;
		}
		public function getDtcadastro(){
			return $this->dtcadastro;
		}
		public function getImg(){
			return $this->img;
		}
		//---------- END GET 
		
		public function __construct(){
			$id = $_SESSION['id_usuario'];
			//$id = '5';
			$this->loadById($id);
		}
		public function loadById($id){
			$sql = new Sql();
			$results = $sql->select('Select * From usuarios Where id = :ID ',array(
				":ID"=>$id
			));
			if (count($results)>0){
				$this->setData($results[0]);
			}
		}
		/*public static function getList(){
			$sql = new Sql();
			$retults = $sql->select('Select * from usuarios order by usuario');
			return $retults;
		}*/
		public static function search($login){
			$sql = new Sql();
			$retults = $sql->select('Select * from usuarios WHERE usuario LIKE :search ' ,array(
			':search'=>"%".$login."%"
			));
			return $retults;
		}
		public static function login($login,$senha){
			$sql = new Sql();
			$results = $sql->select('Select * From usuarios Where usuario = :LOGIN AND senha = :SENHA ',array(
				":LOGIN"=>$login,
				":SENHA"=>$senha
			));
			return $results;

		}
		
		
		// Alteração de Tweet 
		public function insert_tweet( $texto_tweet ){
			$sql = new Sql();
			$results = $sql->select("insert into tweet (id_usuario,tweet) values(:LOGIN,'$texto_tweet')",array(
			':LOGIN'=>$this->getId()
			));
		
		}
		public function delete_tweet($id_tweet){
			$sql = new Sql();
			$sql->query("DELETE FROM tweet WHERE id_usuario = :ID AND id_tweet = $id_tweet",array(
			':ID'=>$this->getId()
			));
		} 
		public function update_tweet($text_alt,$id_tweet){
			$sql = new Sql();
			$sql->select("UPDATE tweet SET id_usuario=:ID,tweet='".$text_alt."'  WHERE id_tweet = '".$id_tweet."'and  id_usuario = :ID    ",array(
			':ID'=>$this->getId()
			));
		}
		public function qtd_tweet(){
			$sql = new Sql();
			$results = $sql->select("SELECT COUNT(*) as qtd FROM tweet AS t WHERE t.id_usuario = :ID",array(
			':ID'=>$this->getId()
			));
			$result = array();
			foreach ($results as $key){
				$result = $key;
			}
			return $result ; 
		}
		
		// Alteração de Seguidores 
		public function insert_seguidor(){
			$sql = new Sql();
			$results = $sql->select("CALL sp_usuario_insert(:LOGIN,:SENHA)",array(
			':LOGIN'=>$this->getUsuario(),
			':SENHA'=>$this->getSenha()
			));
			
		}
		public function delete_seguidores($deixar){
			$sql = new Sql();
			$sql->query("DELETE FROM  usuarios_seguidores WHERE id_usuario = :ID AND seguindo_id_usuario ='".$deixar."' " , array(
				':ID'=>$this->getid() 
			));
					
		}
		// Alteração de perfil 
		
		public function consulta_usu($name , $data){
			$sql = new Sql();
			$results = $sql->select("Select * From usuarios Where '".$name."' = '".$data."' and id != :ID ",array(
				":ID"=>$this->getId()
			));
			return $results;
		}
		public function update_usuario(){
			$usu = $this->getUsuario(); 
			$email = $this->getEmail(); 
			$senha = $this->getSenha(); 
			$img = $this->getImg(); 
			$sql = new Sql();
			$results = $sql->query("UPDATE usuarios SET usuario = '".$usu."',email = '".$email."',		senha = '".$senha."', img = '".$img."' WHERE id =:ID",array(
				':ID'=>$this->getid()
			));
						
		}
		
		
		public function __toString(){
			return json_encode(array(
				'id'=>$this->getid(),
				'usuario'=>$this->getUsuario(),
				'email'=> $this->getEmail(),
				'senha'=>$this->getSenha(),
				'dtcadastro'=>$this->getDtcadastro()->format("d/m/Y H:i:s"),
				'img'=>$this->getImg(),
			));
		}
		
	}
		
?>