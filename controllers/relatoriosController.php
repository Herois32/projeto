<?php 
/**
 * 
 */
class relatoriosController extends controller{
	
	public function aqtAcessos(){

		    if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){

		          unset($_SESSION['cLogin']);

		          unset($_SESSION['cId']);

		          session_destroy();

		          header("Location:".BASE_URL."login/sair");

		    }else{	

		    $dados = array();

			$usuarios = new Usuarios();	

			$dados['info'] = $usuarios->listarAlunos();	

			$this->loadTemplate('admin/relatorioAcesso', $dados);
			exit;

			}

	}

	public function dadosAlunos(){

		    if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){

		    unset($_SESSION['cLogin']);

		    unset($_SESSION['cId']);

		    session_destroy();

		    header("Location:".BASE_URL."login/sair");

		    }else{		

			$dados = array();

			$usuarios = new Usuarios();

			$dados['info'] = $usuarios->listarAlunos();

			$this->loadTemplate('admin/relatorioAlunos', $dados);
			exit;

			}
		

	}


	public function graficos(){

		    if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){

		    unset($_SESSION['cLogin']);

		    unset($_SESSION['cId']);

		    session_destroy();

		    header("Location:".BASE_URL."login/sair");

		    }else{

		    $dados = array();

		    $qtdAcesso = new Relatorios();

			    if(!empty($_POST['data'])){
			    
			    $data = date("m/Y", strtotime($_POST['data']));
			    
			    $dados['qtd'] = $qtdAcesso->getAcessos($data);
			    $dados['AcessoMes'] = $qtdAcesso->getAcessoAlunos($data);
			    $dados['coment'] = $qtdAcesso->getComentarios($data);
			    $dados['data'] = $data;

			    $this->loadTemplate('admin/charts', $dados);
			    exit;

			    }else{
			    
			    $data = date('m/Y');

			    $dados['qtd'] = $qtdAcesso->getAcessos($data);
				$dados['AcessoMes'] = $qtdAcesso->getAcessoAlunos($data);
				$dados['coment'] = $qtdAcesso->getComentarios($data);
				$dados['data'] = $data;

			    $this->loadTemplate('admin/charts', $dados);
			    exit;

			    }

		    }

	}


	public function comparativo(){


		    if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){

		    unset($_SESSION['cLogin']);

		    unset($_SESSION['cId']);

		    session_destroy();

		    header("Location:".BASE_URL."login/sair");

		    }else{		

			$dados = array();

			$comparativo = new Relatorios();

			if(!empty($_POST['dataInicio'])){
			
						$dataInicial = date("m/Y", strtotime($_POST['dataInicio']));
						$dataFim 	 = date("m/Y", strtotime($_POST['dataFim']));
			
						if($dados['info'] = $comparativo->getComparativo($dataInicial, $dataFim)){

						$dados['dataInicial'] = $dataInicial;
						$dados['dataFim']     = $dataFim;	
								print_r($dados);	
						$this->loadTemplate('admin/comparativo', $dados);
						exit;

						}else{

						$dados['alert'] = '<div class="alert alert-warning" role="alert">Nenhum dados encontrado!</div>';
						$this->loadTemplate('admin/comparativo', $dados);
						exit;	

						}

				}else{

					$dataInicial = date('m/Y');
					$dataFim     = date('m/Y');

					$dados['info'] = $comparativo->getComparativo($dataInicial, $dataFim);
					$dados['dataInicial'] = $dataInicial;
					$dados['dataFim']     = $dataFim;
					print_r($dados);	
					$this->loadTemplate('admin/comparativo', $dados);
					exit;	


				}
			
			}

	}



}
