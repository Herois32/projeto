<?php

/**
 * Aqui é a Class que vai logar o usuario e mandar novamente 
 * para o scriot do Ajax para redirecionar pra pagina inicial
 */
/**
 * 
 */
class ajaxrelatdiasController extends controller{

	public function index(){
        if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){
          unset($_SESSION['cLogin']);
          unset($_SESSION['cId']);
          session_destroy();
          header("location:".BASE_URL."login");
      	}else{		
		$dados = array();

		$relatorios = new Relatorios();	

		if(!empty($_POST['categoria'])){
		
		 $cat = $_POST['categoria'];

		 $dados['info'] = $relatorios->getRelatoriosDiario($cat);
	
		$this->loadView('admin/Ajax/ajaxRelatorioDias', $dados);
		exit;

		}else{

		$this->loadTemplate('admin/relatorioAtendDias');
		exit;	

		}
	}
		
	}	

}

