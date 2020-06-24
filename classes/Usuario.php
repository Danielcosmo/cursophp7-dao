
<?php

	
	class Usuario{

		private $id;
		private $nome;
		private $valor;

		public function setId($id){
			$this->id = $id;
		}
		public function getId(){
			return $this->id;
		}

		
		public function setNome($nome){
			$this->nome = $nome;
		}
		public function getNome(){
			return $this->nome;
		}

		public function setValor($valor){
			$this->valor = $valor;
		}
		public function getValor(){
			return $this->valor;
		}

		public function loadById($id){
			$sql = new Sql();

			$result = $sql->select("SELECT * FROM user WHERE id = :ID", array(
				":ID" => $id

			));

			if(count($result) > 0){

				$row = $result[0];

				$this->setId($row['id']);
				$this->setNome($row['nome']);
				$this->setValor($row['valor']);


			}

		}

		public static function getList(){
			$sql = new Sql();

			return $sql->select("SELECT * FROM user ORDER BY id");
		}

		public static function search($nome){
			$sql = new Sql();

			return $sql->select("SELECT * FROM user WHERE nome LIKE :SEARCH", array(':SEARCH' => "%".$nome."%"

			));


		}

		public function login($nome, $id){

				$sql = new Sql();

			$result = $sql->select("SELECT * FROM user WHERE nome = :NOME AND id = :ID", array(

				":NOME" => $nome,
				":ID" => $id

			));

			if(count($result) > 0){

				$row = $result[0];

				$this->setId($row['id']);
				$this->setNome($row['nome']);
				$this->setValor($row['valor']);


			}else{
				throw new Exception("Login e/ou senha inválidos");
			}

		}

		public function __toString(){

			return json_encode(array(
				"Id" => $this->getId(),
				"Nome" => $this->getNome(),
				"Valor" => $this->getValor()

			)); 
		}
	}

?>