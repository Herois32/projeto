<?php
require 'environment.php';

$config = array();
if(ENVIRONMENT == 'development') {
	define("BASE_URL", "http://localhost/classificados_mvc/");
	$config['dbname'] = 'classificados';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = 'root';
} else {
	define("BASE_URL", "https://sofdev.com.br/subdominio/George/conhecermais/");	
	$config['dbname'] = 'sofdev27_sistemaaula';
	$config['host']   = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
}

global $db;

try {

	$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);

} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
	exit;
}