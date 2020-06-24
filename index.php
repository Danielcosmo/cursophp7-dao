
<?php
	
	
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);



	require_once("config.php");

	// $user = new Usuario();

	// $user->loadById(1);
	
	/////////////////////////////////


	// //carregar lista
	// $lista = Usuario::getList();

	// echo json_encode($lista);

	//carrega lista buscando pelo nome

	// $busca = Usuario::search("in");

	// echo json_encode($busca);

	//carregar po senha e id

	// $rs = new Usuario();

	// $rs->login("Inter", "1");

	// echo $rs;

?>