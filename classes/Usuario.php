
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

				$this->setData($result[0]);

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

				$this->setData($result[0]);


			}else{
				throw new Exception("Login e/ou senha inválidos");
			}

		}

		public function setData($data){

			$this->setId($data['id']);
			$this->setNome($data['nome']);
			$this->setValor($data['valor']);

		}

		public function insert(){
			$sql = new Sql();

			$result = $sql->select("CALL sp_user_insert(:NOME, :VALOR)", array(
				':NOME'=>$this->getNome(),
				':VALOR'=>$this->getValor()
			));

			if(count($result) > 0){

				$this->setData($result[0]);
			}
		}

		public function update($nome, $valor){

			$this->setNome($nome);
			$this->setValor($valor);

			$sql = new Sql();

			$sql->query("UPDATE user SET nome = :NOME, valor = :VALOR WHERE id = :ID", array(
					':NOME' => $this->getNome(),
					':VALOR' => $this->getValor(),
					':ID' => $this->getId() 
			));

		}

		public function delete(){
			$sql = new Sql();

			$sql->query("DELETE FROM user WHERE id = :ID", array(
				":ID" => $this->getId()
			));

			$this->setId(0);
			$this->setNome("");
			$this->setValor(0);

		}

		public function __construct($nome = "", $valor = ""){
			$this->setNome($nome);
			$this->setValor($valor);
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