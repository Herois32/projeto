<?php
/**
 * 
 */
class senhaController extends controller{
	
	public function index(){

		if(!empty($_POST['email'])){
		
				$email = $_POST['email'];
				$nova_senha = rand(10000000,99999999);
		
					$enviarEmail = new EnvioEmail();
					$usuarios = new Usuarios();
					if($enviarEmail->enviarEmailRecuperar($email, $nova_senha)){
						$nova_senha = md5($nova_senha);
						$usuarios->updateSenha($email, $nova_senha);
						return false;
					}else{
						return true;
				}
		}

	}

	public function formSenha(){


		$this->loadView('altsenhaUsuario');
	}

	public function trocarSenha(){

		$id = $_POST['id'];
		$senha = md5(addslashes($_POST['senha']));
		$usuarios = new Usuarios();
		$usuarios->trocarSenhaAdmin($id, $senha);

	}

}