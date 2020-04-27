<?php
/**
 * 
 */
class empresaController extends controller{

	public function index(){
        if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){
          unset($_SESSION['cLogin']);
          unset($_SESSION['cId']);
          session_destroy();
          header("location:".BASE_URL."login");
      	}else{
      		if($_SESSION['cIdRoles'] == 1){
      			$this->loadTemplate('admin/cadEmpresa'); 
      		}else{
      			header("location:".BASE_URL."login");
			}
      	}

	
	}
	
	public function insert(){
	    if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){
	          unset($_SESSION['cLogin']);
	          unset($_SESSION['cId']);
	          session_destroy();
	          header("location:".BASE_URL."login");
	    }else{	
				$cnpj 		 = $_POST['cnpj'];
				$razaoSocial = $_POST['razaoSocial'];
				$endereco 	 = $_POST['endereco'];
				$cidade 	 = $_POST['cidade'];
				$estado 	 = $_POST['estado'];
				$cep 		 = $_POST['cep'];
				$telefone 	 = $_POST['telefone'];
				$atividade 	 = $_POST['atividade'];
				$status = "Ativo";

				$dados = array();
				$cadEmpresa = new Empresa();

				if($cadEmpresa->cadastrar($cnpj, $razaoSocial, $endereco, $cidade, $estado, $cep, $telefone, $atividade, $status)){
					$dados['alert'] = '<div class="alert alert-success" role="alert">Cadastramento realizado com sucesso</div>';
					$this->loadTemplate('admin/cadEmpresa', $dados);
					exit;
				}else{
					$dados['error'] = '<div class="alert alert-danger" role="alert">Falha ao cadastrar/Empresa já cadastrada</div>';
					$this->loadTemplate('admin/cadEmpresa', $dados);	
					exit;		
				}
		}		

		
	}

	public function getEmpresas(){
        if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){
          unset($_SESSION['cLogin']);
          unset($_SESSION['cId']);
          session_destroy();
          header("location:".BASE_URL."login");
      	}else{
	      		if($_SESSION['cIdRoles'] == 1){
	  			$dados = array();
				$cadEmpresa = new Empresa();
			
				$dados['listar'] = $cadEmpresa->ListaEmpresas();
				$this->loadTemplate('admin/listaEmpresas', $dados);    			
			}else{
				header("location:".BASE_URL."login");
			}


      	}


	}

	public function edit($id){
	    if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){
	          unset($_SESSION['cLogin']);
	          unset($_SESSION['cId']);
	          session_destroy();
	          header("location:".BASE_URL."login");
	    }else{
			$dados = array();
			$empresas = new Empresa();
			if($_SESSION['cIdRoles'] == 1){
		    	if(!empty($id)){
		    		if(!empty($_POST['cnpj'])){
		    			$endereco   = $_POST['endereco'];
		    			$cidade    = $_POST['cidade'];
		    			$estado    = $_POST['estado'];
		    			$cep       = $_POST['cep'];
		    			$telefone  = $_POST['telefone'];
		    			$atividade = $_POST['atividade'];
		    			$status	   = $_POST['status'];

		    			$empresas->updateEmpresa($id, $endereco, $cidade, $estado, $cep, $telefone, $atividade, $status);
		    			$dados['aviso'] = '<div class="alert alert-success" role="alert">Alteração realizado com sucesso!</div>';
		    			$dados['listar'] = $empresas->ListaEmpresas();
		    			
						$this->loadTemplate('admin/listaEmpresas', $dados);	 
						exit;

		    		}else{
		    			$dados['listar'] = $empresas->ListaEmpresasId($id);
		    			$this->loadTemplate('admin/editEmpresa', $dados);
		    		}
	   		
		    	}else{// ELSE para quando o usuario não enviar o ID
					header("location:".BASE_URL."login");
		    	}			
			}else{//Else para quando o perfil não for admin
				header("Location:".BASE_URL."login");				
			}	

		}		

	}

	public function desativar($id){
		$dados = array();
		$status = "Desativado";

		$empresas = new Empresa();
		$empresas->updateDesativar($id, $status);

		$dados['mensagem'] = '<div class="alert alert-success" role="alert">Empresa desativada com sucesso!</div>';		
		$dados['listar'] = $empresas->ListaEmpresas();
		
		$this->loadTemplate('admin/listaEmpresas', $dados);	 
		exit;
	}

}