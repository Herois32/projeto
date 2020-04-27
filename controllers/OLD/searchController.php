<?php

/**
 * 
 */
class searchController extends controller{

	public function index(){
		$dados = array();
		$pesquisa = $_POST['search'];
		$search = new Pesquisar();
		$chamados = new Chamados();
		$id = $_SESSION['cId'];

		if(!empty($pesquisa)){		
			if($search->search($pesquisa, $id) != false){
			$dados['lista'] = $search->search($pesquisa, $id);
			$dados['total'] = $chamados->qtdChamados();
			$this->loadTemplate('admin/home', $dados);				
			}else{
			$this->loadTemplate('aviso');	
			}

		}else{
			$this->loadTemplate('aviso');
		}

	}
	

}