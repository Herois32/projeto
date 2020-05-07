<?php
session_start();
require 'vendor/autoload.php';
require 'config.php';


spl_autoload_register(function($class){

	if(file_exists('controllers/'.$class.'.php')) {
		require 'controllers/'.$class.'.php';
	}
	else if(file_exists('models/'.$class.'.php')) {
		require 'models/'.$class.'.php';
	}
	else if(file_exists('core/'.$class.'.php')) {
		require 'core/'.$class.'.php';
	}

});

/*$log = new Monolog\Logger("Avisos");
$log->pushHandler(new Monolog\Handler\StreamHandler('erros.log', Monolog\Logger::WARNING));*/



$core = new Core();
$core->run();