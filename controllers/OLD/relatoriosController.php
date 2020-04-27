<?php

/**
 * 
 */
class relatoriosController extends controller{

	public function index(){
        if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){
          unset($_SESSION['cLogin']);
          unset($_SESSION['cId']);
          session_destroy();
          header("location:".BASE_URL."login");
      	}else{		
		$dados = array();

		$categoria = new Categorias(); 

		$dados['catego'] = $categoria->getLista();
	
		$this->loadTemplate('admin/relatorioAtendDias', $dados);
		exit;

		}

	
	  }
		
	//}

	public function relatorioMes(){
        if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){
          unset($_SESSION['cLogin']);
          unset($_SESSION['cId']);
          session_destroy();
          header("location:".BASE_URL."login");
      	}else{		
	
		 $this->loadTemplate('admin/relatorioAtendMes');
		 exit;

			}		

	}

	public function relatorioAnalitico(){
	    if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){
          unset($_SESSION['cLogin']);
          unset($_SESSION['cId']);
          session_destroy();
          header("location:".BASE_URL."login");
      	}else{	

			$this->loadTemplate('admin/analitico');
			exit;
			
		}

	}

		
}