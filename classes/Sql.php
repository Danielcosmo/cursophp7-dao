<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);


class Sql extends PDO{

		private $conn;


		public function __construct(){

			$this->conn = new PDO("mysql:host=localhost;dbname=aulaPhp", "root", "");


		}

		private function setParams($statement, $params = array()){

			foreach ($params as $key => $value) {

					$this->setParam($key, $value);
			}
		}

		private function setParam($statement, $key, $value){

			$statement->bindParam($key, $value);
		}

		public function query($rawQuery, $params = array()){

			$stmt = $this->conn->prepare($rawQuery);

			$this->setParams($stmt, $params);

			$stmt->execute();

			return $stmt;


		}

		public function select($rawQuery, $params = array()){

				$stmt = $this->query($rawQuery, $params);

				return $stmt->fetchAll(PDO::FETCH_ASSOC);

		}

}	


?>