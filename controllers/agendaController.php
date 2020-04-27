<?php

class agendaController extends controller {


	public function index(){

		if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){
	          unset($_SESSION['cLogin']);
	          unset($_SESSION['cId']);
	          session_destroy();
	          header("location:".BASE_URL."login");
	    }else{ 		

		$dados = array();
		$agend = new Aulas();

		$dados['dados'] = $agend->getAulas();	

		$this->loadTemplate('admin/agendamentos', $dados);
		exit;

		}

	}

	public function editarAgendamento(){

	    if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){
	          unset($_SESSION['cLogin']);
	          unset($_SESSION['cId']);
	          session_destroy();
	          header("location:".BASE_URL."login");
	    }else{ 

	    	$dados = array();
	    	$editar = new Aulas();    	
	    	$id = $_POST['id'];

	    	$dados['result'] = $editar->getAulasID($id);
			$this->loadView('admin/Ajax/ajaxEditaragendamento', $dados);
			exit;
			
		}	

	}


	public function updateAgenda(){

	    	$dados = array();
	    	$uptade = new Aulas();
	    	$id = $_POST['id'];
	    	$dataInicio = implode("-",array_reverse(explode("/",$_POST['dataInicio'])));
	    	$dataFim  = implode("-",array_reverse(explode("/",$_POST['dataFim'])));
	    	$horaInicio = $_POST['horaInicio'];
	    	$horaFim 	= $_POST['horaFim'];
	    	$uptade->editarAulas($dataInicio, $dataFim, $horaInicio, $horaFim, $id);
	   	

	    }


	public function abrirModalDeletar(){

		    if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){
		          unset($_SESSION['cLogin']);
		          unset($_SESSION['cId']);
		          session_destroy();
		          header("location:".BASE_URL."login");
		    }else{ 		

			if(!empty($_POST['id'])){

			$id = $_POST['id'];

			$dados = array();

			$del = new Aulas();

			$dados['id'] = $id;

			$this->loadView('admin/alertDeletarAgenda', $dados);
			exit;

			}
		

		}

	}    

	public function deletarAgendamento(){
		if(!empty($_POST['id'])){

		$id = $_POST['id'];

		$dados = array();

		$deletar = new Aulas();

		$dados = $deletar->del($id);

		}


	}	
	

}