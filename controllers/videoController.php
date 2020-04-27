<?php

/**
 * 
 */
class videoController extends controller{
	

		public function index(){

		$dados = array();

		$viewModal = new ViewVideo();

	    $id = $_POST['id'];

		$dados['dados'] = $viewModal->getVideo($id);

		//print_r($dados);
		$this->loadView('admin/modalViewVideo', $dados);
		exit;

	}


		public function fecharModal(){

		$dados = array();

		$viewModal = new ViewVideo();

	     $arquivo = $_POST['al_arquivos'];

		 $dados['arquivo'] = $viewModal->getVideo($arquivo);

	}



}