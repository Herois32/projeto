<?php

/**
 * 
 */
class mensagemController extends controller{
	
	public function index(){

      if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){
          unset($_SESSION['cLogin']);
          unset($_SESSION['cId']);
          session_destroy();
          header("location:".BASE_URL."login");
      	}else{
		$this->loadTemplate('admin/cadAnuncios');
		exit;

		}

	}

	public function cadastroMensagens(){

      if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){
          unset($_SESSION['cLogin']);
          unset($_SESSION['cId']);
          session_destroy();
          header("location:".BASE_URL."login");
      	}else{

      		$dados = array();
      		$insert = new Avisos();

      		if(!empty($_POST['titulo'])){

      			$titulo = $_POST['titulo'];
      			$mensagem = $_POST['mensagem'];
      			$data = date('Y-m-d');

      			
      			$insert->insertMensagem($titulo, $mensagem, $data);

      			$dados['alert'] = '<div class="alert alert-success" role="alert">Mensagem cadastrada com sucesso!</div>';

      			$this->loadTemplate('admin/cadAnuncios', $dados);
      			exit;
      		}

      	}

	}


	public function formMensagem(){

		$dados = array();

		$id = $_POST['id'];

		$msg = new Avisos();

		$dados['dados'] = $msg->getMsg($id);;

		$this->loadView('admin/formMensagem', $dados);
		exit;
	}

	public function fecharMsg(){

		return true;
	}


}