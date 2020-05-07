<?php

/**

 * 

 */

class usuarioController extends controller{

	

	public function perfilUsuario(){

		    if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){

		          unset($_SESSION['cLogin']);

		          unset($_SESSION['cId']);

		          session_destroy();

		          header("Location:".BASE_URL."login/sair");

		    }else{

		    	$dados = array();

		    	$usuarios = new Usuarios();

		    	$id = $_SESSION['cId'];

		    	$dados['usr'] = $usuarios->getUsuarios($id);

		    	
		    	$this->loadTemplate('perfil', $dados);



			}
	}		


	public function modalTrocarSenha(){

		    	$dados = array();

		    	$usuarios = new Usuarios();
		    	
		    	if(!empty($_POST['senha'])){

		    	$senha = $_POST['senha'];
		    	
		    	$id    = $_POST['id'];	

		    	$dados['info'] = $usuarios->trocarSenhaAdmin($id, $senha);

		    	}else{

		    	$dados['info'] = $_POST['id'];	

		    	$this->loadView('admin/Ajax/ajaxformTrocarSenha', $dados);
		    	exit();

		    	}



			}


	public function cadastrarUsuario(){

		    if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){

		          unset($_SESSION['cLogin']);

		          unset($_SESSION['cId']);

		          session_destroy();

		          header("Location:".BASE_URL."login/sair");

		    }else{		

		    	  $dados = array();

		    	  $usuarios = new Usuarios();


		    	if(!empty($_POST['nome'])){
		    		
		    		$nome = $_POST['nome'];
		    		$cpf  = $_POST['cpf'];
		    		$email = $_POST['email'];
		    		$senha = $_POST['senha'];
		    		$data  = date('Y-m-d');
		    		$sexo  = $_POST['sexo'];
		    		$tel   =  $_POST['telefone'];
		    		$status = "Desativado";
		    		$roles  = 1;
		    		$qtdLogado = "0";
		    		$data_acesso = date('Y-m-d');
		    		$ip    = 1;

		    		if($usuarios->insertUsr($nome, $cpf, $email, $senha, $data, $sexo, $tel, $status, $roles, $qtdLogado, $data_acesso, $ip)){

		    			$dados['alert'] = '<div class="alert alert-success" role="alert">Cadastro realizado com sucesso!</div>';
		    			$dados['infor'] = $usuarios->getAdmin();

		    			$this->loadTemplate('admin/listaUsuario', $dados);
						exit;

		    		}else{

		    			$dados['alert'] = '<div class="alert alert-danger" role="alert">Email já cadastrado!</div>';

		    			$this->loadTemplate('admin/cadastroadmin', $dados);
						exit;

		    		}


		    	}


				$this->loadTemplate('admin/cadastroadmin');
				exit;

			}	

	}	


	public function listar(){

		    if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){

		          unset($_SESSION['cLogin']);

		          unset($_SESSION['cId']);

		          session_destroy();

		          header("Location:".BASE_URL."login/sair");

		    }else{

		    	$dados = array();

		    	$usuarios = new Usuarios();

		    	$dados['infor'] = $usuarios->getAdmin();

				$this->loadTemplate('admin/listaUsuario', $dados);
				exit;

		}	

	}

	public function editarUsuario($id){

		    if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){

		          unset($_SESSION['cLogin']);

		          unset($_SESSION['cId']);

		          session_destroy();

		          header("Location:".BASE_URL."login/sair");

		    }else{
					$dados = array();

					$editarUsr = new Usuarios();

					$dados['editar'] = $editarUsr->getAdminId($id);

					if(!empty($_POST['email'])){
		    		$tel   =  $_POST['telefone'];

		    		$editarUsr->updateUsuario($tel, $id);

		    		$dados['infor'] = $editarUsr->getAdmin();

					$dados['aviso'] = '<div class="alert alert-success" role="alert">Atualização realizada com sucesso!</div>';

		    		$this->loadTemplate('admin/listaUsuario', $dados);
		    		exit;

					}else{

					$this->loadTemplate('admin/editarUsuario', $dados);
					exit;

					}

			}
			
	}

	public function abrirModalExcluir(){

		    if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){

		          unset($_SESSION['cLogin']);

		          unset($_SESSION['cId']);

		          session_destroy();

		          header("Location:".BASE_URL."login/sair");

		    }else{
					$dados = array();

					if(!empty($_POST['id'])){
					
							$dados['id'] = $_POST['id'];
					
							$this->loadView('admin/formDeletarAdmin', $dados);
							exit;
					}else{

						header("Location:".BASE_URL."login/sair");

					}


			}



	}	


	public function excluirAdmin(){

		$dados = array();

		$apagar = new Usuarios();
		
		$id = $_POST['id'];
		
		$apagar->del($id);


	}				


}