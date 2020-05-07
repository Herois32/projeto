<?php

/**
 * 
 */
class certificadosController extends controller{
	
	public function index(){

		if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){

		          unset($_SESSION['cLogin']);

		          unset($_SESSION['cId']);

		          session_destroy();

		          header("Location:".BASE_URL."login/sair");

		    }else{		

				$dados = array();

				$gerarCertificado = new Certificado();	

				$id = $_SESSION['cId'];

				$dados['info'] = $gerarCertificado->dadosUsuario($id);
				//print_r($dados);

				$this->loadTemplate('usr/certificado', $dados);	
				exit;

		}
		
	}


}

