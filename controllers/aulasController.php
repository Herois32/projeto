<?php

/**
 * 
 */
class aulasController extends controller{

	public function index(){

	    if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){
	          unset($_SESSION['cLogin']);
	          unset($_SESSION['cId']);
	          session_destroy();
	          header("location:".BASE_URL."login");
	    }else{    		

			$this->loadTemplate('admin/agendarvideo');
			exit;
		}

    }
	
	public function montarAulas(){

	    if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){
	          unset($_SESSION['cLogin']);
	          unset($_SESSION['cId']);
	          session_destroy();
	          header("location:".BASE_URL."login");
	    }else{ 		

			$dados = array();
			$upload = new Arquivos();
			$agend = new Aulas();

			if(!empty($_FILES['arquivo']['name'])){

				$dataInicio = implode("-",array_reverse(explode("/",$_POST['dataInicio'])));
				$dataFim 	= implode("-",array_reverse(explode("/",$_POST['dataFim'])));
				$horaInicio = $_POST['horaInicio'];
				$horaFim 	= $_POST['horaFim'];
				$nomeCurso  = $_POST['tituloAula'];

				$nome_arquivo = $_FILES['arquivo']['name'];
				$tamanho_arquivo = $_FILES['arquivo']['size'];
				$arquivo_temporario = $_FILES['arquivo']['tmp_name'];	

				if($upload->uploadArquivo($nome_arquivo, $tamanho_arquivo, $arquivo_temporario, $dataInicio, $dataFim, $horaInicio, $horaFim, $nomeCurso) == true){

					

					echo "sucesso";
					
				}

				echo  "sucesso";		

			}

			

		}

		

	}


	public function ajaxAgendamento(){

	    if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){
	          unset($_SESSION['cLogin']);
	          unset($_SESSION['cId']);
	          session_destroy();
	          header("location:".BASE_URL."login");
	    }else{ 		

			$dados = array();

			$agend = new Aulas();

		    $dados['dados'] = $agend->getAulas();
			$dados['msg'] = '<div class="alert alert-success" role="alert">Aula Agendada com sucesso!</div>';
			
			$this->loadTemplate('admin/agendamentos', $dados);
			exit;

		}

	}


}