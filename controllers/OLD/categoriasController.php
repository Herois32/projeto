<?php

/**
 * 
 */
class categoriasController extends controller{


	public function index(){

		$this->loadTemplate('admin/CadCategoria');

	}

	public function add(){

		$dados = array();
		$categoria = new Categorias();

		if(!empty($_POST['nome_categora'])){

			$nome_categoria = $_POST['nome_categora'];
		
				if($categoria->addCategorias($nome_categoria)){ 
					$dados['alert'] = '<div class="alert alert-success" role="alert">Cadastramento realizado com sucesso!!</div>';
					$this->loadTemplate('admin/CadCategoria', $dados);
					exit;
				}else{
					$dados['error'] = '<div class="alert alert-danger" role="alert">Error!! Favor entrar em contato com suporte</div>';
					$this->loadTemplate('admin/CadCategoria', $dados);
					exit;
				}

		}else{

			header("location:".BASE_URL."login");

		}

	}


	public function setCategorias(){

		$dados = array();
		$categoria = new Categorias();

		$dados['listar'] = $categoria->selecCategoria();

		$this->loadTemplate('admin/listaCategorias', $dados);
		exit;
	}

	public function excluirCategoria($id){

		$dados = array();
		$categoria = new Categorias();

		if(!empty($id)){

				$categoria->delete($id);
				$dados['listar'] = $categoria->selecCategoria();
				$dados['mensagem'] = '<div class="alert alert-success" role="alert">Categoria excluída com sucesso!</div>';
		
				$this->loadTemplate('admin/listaCategorias', $dados);
				exit;
			}else{

			header("location:".BASE_URL."login");

			}



	}	


}
