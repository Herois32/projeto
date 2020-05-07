<?php

class loginController extends controller {

	public function index(){


		$this->loadView('login');
		//$this->loadTemplate('painel');

	}


	public function sair(){
	
	$usuario  = new Usuarios();

	$id = $_SESSION['cId'];
	$status = "Desativado";


	$usuario->ZeraIp($id);
	$usuario->getUsuarios($id, $status);

	session_start();
	session_destroy();	
	session_unset();

	$this->loadView('login');

	}

}	