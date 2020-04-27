<?php

/**
 * Aqui é a Class que vai logar o usuario e mandar novamente 
 * para o scriot do Ajax para redirecionar pra pagina inicial
 */
/**
 * 
 */
class ajaxrelatoriomesController extends controller{
	

	public function index(){
        if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){
          unset($_SESSION['cLogin']);
          unset($_SESSION['cId']);
          session_destroy();
          header("location:".BASE_URL."login");
      	}else{		


	      	$dados = array();
	      	$relatorios = new Relatorios();

	      	if(!empty($_POST['dataInicio']) && !empty($_POST['dataFim'])){

			$dataInicio =  implode("-",array_reverse(explode("/", $_POST['dataInicio'])));

			$dataFim = implode("-",array_reverse(explode("/", $_POST['dataFim'])));

			$dados['info'] = $relatorios->getMes($dataInicio, $dataFim);
			$dados['dados'] = $relatorios->getMesResposta($dataInicio, $dataFim);
			$dados['dataInicio'] = implode("/",array_reverse(explode("-", $dataInicio))); 
			$dados['dataFim'] = implode("/",array_reverse(explode("-", $dataFim)));

			//print_r($dados);
	      	$this->loadView('admin/Ajax/ajaxRelatorioMes', $dados);
	      	exit;
	      }else{
			$this->loadTemplate('admin/relatorioAtendMes');
			exit;	

	      }



	    }

	}


	public function graficoAdmin(){
        if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){
          unset($_SESSION['cLogin']);
          unset($_SESSION['cId']);
          session_destroy();
          header("location:".BASE_URL."login");
      }else{

      	$dados = array();
      	$relatorios = new Graficos();


      	if(!empty($_POST['dataInicio']) && !empty($_POST['dataFim'])){

			$dataInicio =  implode("-",array_reverse(explode("/", $_POST['dataInicio'])));

			$dataFim = implode("-",array_reverse(explode("/", $_POST['dataFim'])));      		

      		if($dados['info'] = $relatorios->getAdmin($dataInicio, $dataFim)){
      					$dados['dataInicio'] = implode("/",array_reverse(explode("-", $dataInicio))); 
      					$dados['dataFim'] = implode("/",array_reverse(explode("-", $dataFim)));      		
      		
      		      		$this->loadTemplate('admin/formStatusAdmin', $dados);
      		      	}else{
      		      		$dados['alert'] = '<div class="alert alert-warning" role="alert">Nenum resultado encontrado!</div>';
      					$dados['dataInicio'] = implode("/",array_reverse(explode("-", $dataInicio))); 
      					$dados['dataFim'] = implode("/",array_reverse(explode("-", $dataFim)));      		

      		      		$this->loadTemplate('admin/formStatusAdmin', $dados);      		      		
      		      	}

      		}else{
				$this->loadTemplate('admin/formStatusAdmin');
				exit;	

	      	}

      	}


	}		
	

}
	