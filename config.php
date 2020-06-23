<?php

spl_autoload_register(function($className){

	$className = str_replace('\\', '/', $className);

	$filename = "classes" . DIRECTORY_SEPARATOR .$className.".php";

	if(file_exists($filename)){
		require_once($filename);
	}


});


?>