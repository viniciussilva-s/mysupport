<?php

	class Usuario{
		private $idusuario;
		private $deslogin;
		private $senha;
		private $dtcadastro;
		
		public function getIdusuario(){
			return $this->idusuario;
		}
		public function setIdusuario($value){
			$this->idusuario=$value;
		}
		public function getDeslogin(){
			return $this->deslogin;
		}
		public function setDeslogin($value){
			$this->deslogin = $value;
		}
		public function getSenha(){
			return $this->senha;
		}
		public function setSenha($value){
			$this->senha=$value;
		}
		public function getDtcadastro(){
			return $this->dtcadastro;
		}
		public function setDtcadastro($value){
			$this->dtcadastro=$value;
		}
		public function loadById($id){
			$sql = new Sql();
			$results = $sql->select('Select * From tb_usuario Where idusuario = :ID ',array(
				":ID"=>$id
			));
			if (count($results)>0){
				$this->setData($results[0]);
			}
		}
		public static function getList(){
			$sql = new Sql();
			$retults = $sql->select('Select * from tb_usuario order by deslogin');
			return $retults;
		}
		public static function search($login){
			$sql = new Sql();
			$retults = $sql->select('Select * from tb_usuario WHERE deslogin LIKE :search ' ,array(
			':search'=>"%".$login."%"
			));
			return $retults;
		}
		public function login($login,$senha){
			$sql = new Sql();
			$results = $sql->select('Select * From tb_usuario Where deslogin = :LOGIN AND senha = :SENHA ',array(
				":LOGIN"=>$login,
				":SENHA"=>$senha
			));
			if (count($results)>0){
				$this->setData($results[0]);
			}else{
				throw new Exception ("Login e/ou senha invalido");
			}
		}
		public function setData($data){
				$this->setIdusuario($data['idusuario']);
				$this->setDeslogin($data['deslogin']);
				$this->setSenha($data['senha']);
				$this->setDtcadastro(new DateTime($data['dtcadastro']));
				
		}
		public function insert(){
			$sql = new Sql();
			$results = $sql->select("CALL sp_usuario_insert(:LOGIN,:SENHA)",array(
			':LOGIN'=>$this->getDeslogin(),
			':SENHA'=>$this->getSenha()
			));
			if (count($results)>0){
				$this->setData($results[0]);
			}
		}
		public function update($login,$senha){
			$this->setDeslogin($login);
			$this->setSenha($senha);
			
			$sql = new Sql();
			$results = $sql->query("UPDATE tb_usuario SET deslogin= :LOGIN, senha = :SENHA WHERE idusuario =:ID",array(
			':LOGIN'=>$this->getDeslogin(),
			':SENHA'=>$this->getSenha(),
			':ID'=>$this->getIdusuario()
			));
		}
		public function delete(){
			$sql = new Sql();
			$sql->query("DELETE FROM tb_usuario WHERE idusuario = :ID" , array(
				':ID'=>$this->getIdusuario() 
			));
			$this->setIdusuario(0);
			$this->setDeslogin(0);
			$this->setSenha(0);
			$this->setDtcadastro(new DateTime());
		
		}
		
		
		public function __construct($login ="" , $senha = ""){
			$this->setDeslogin($login);
			$this->setSenha($senha);
		}
		
		public function __toString(){
			return json_encode(array(
				'idusuario'=>$this->getIdusuario(),
				'deslogin'=>$this->getDeslogin(),
				'senha'=>$this->getSenha(),
				'dtcadastro'=>$this->getDtcadastro()->format("d/m/Y H:i:s")
			));
		}
		
	}
	
	
?>