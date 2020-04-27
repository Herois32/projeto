<?php

/**
 * 
 */
class graficosController extends controller{
	
	public function buscarStatus(){
	    if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){
          unset($_SESSION['cLogin']);
          unset($_SESSION['cId']);
          session_destroy();
          header("location:".BASE_URL."login");
      	}else{		
      	
      			$dados = array();

            $dataInicio = $_POST['dataInicio'];
            $dataFim    = $_POST['dataFim'];
      	
      			$relatorios = new Graficos();
      	
      			$dados['dados'] = $relatorios->getGraficoStatus($dataInicio, $dataFim);
      			$dados['dadosEmpresa'] = $relatorios->getGraficoEmpresa($dataInicio, $dataFim);
            $dados['dadosMeses'] = $relatorios->getGraficoTodosMeses($dataInicio, $dataFim);
            $dados['dataInicio'] = implode("/",array_reverse(explode("-", $dataInicio))); 
            $dados['dataFim'] = implode("/",array_reverse(explode("-", $dataFim)));
      	
      			$this->loadTemplate('admin/graficos', $dados);
      			exit;
      	}

	
	}

	public function buscarStatusAdim(){

      if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){
          unset($_SESSION['cLogin']);
          unset($_SESSION['cId']);
          session_destroy();
          header("location:".BASE_URL."login");
        }else{

          $this->loadTemplate('admin/formStatusAdmin');
          exit;

        }

	}




}
