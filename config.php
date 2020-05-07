<?php
require 'environment.php';

//phpinfo();

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
	$config['dbuser'] = 'sofdev27_consig';
	$config['dbpass'] = 'Herois32@';
}

   $config['pagseguro_seller'] = 'george_diu@hotmail.com';



global $db;

try {

	$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);

} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
	exit;
}

\PagSeguro\Library::initialize();
\PagSeguro\Library::cmsVersion()->setName("Conhecermais")->setRelease("1.0.0");
\PagSeguro\Library::moduleVersion()->setName("Conhecermais")->setRelease("1.0.0");

\PagSeguro\Configuration\Configure::setEnvironment('sandbox');
\PagSeguro\Configuration\Configure::setAccountCredentials('george_diu@hotmail.com', 'D7BC07F23B2F41C89F3F516F1E2C57F6');
\PagSeguro\Configuration\Configure::setCharset('UTF-8');
\PagSeguro\Configuration\Configure::setLog(true, 'pagseguro.log');
