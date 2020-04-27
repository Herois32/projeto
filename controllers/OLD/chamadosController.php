<?php
/**
 * 
 */
class chamadosController extends controller{


	public function index(){

        if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){
          unset($_SESSION['cLogin']);
          unset($_SESSION['cId']);
          session_destroy();
          header("location:".BASE_URL."login");
      	}else{		
				$dados = array();
				$id = $_SESSION['cId'];	

				$usuario  = new Usuarios();
				$chamados = new Chamados();
				$coment = new Comentarios();		
	
				if($_SESSION['cIdRoles'] == 1){
					$dados['lista'] = $chamados->getAll();	
					$dados['total'] = $chamados->qtdChamados();

					if(!empty($_GET['aviso'])){
						$dados['msg'] = '<div class="alert alert-success" role="alert">Chamado respondido!</div>';	
					}
					$dados['listar'] = $coment->getComentarios();
					$this->loadTemplate('admin/home', $dados);	
					exit;

				}else if($_SESSION['cIdRoles'] == 2){
					
					if(!empty($_GET['alert'])){
						$dados['alert'] = '<div class="alert alert-success" role="alert">Abertura de chamado realizado com sucesso!</div>';
					}else if(!empty($_GET['aviso'])){
						$dados['aviso'] = '<div class="alert alert-success" role="alert">Reabetura de chamado realizado com sucesso!</div>';				
					}		
					$dados['listar'] = $coment->getComentariosUsr($id);
					$dados['info'] = $chamados->getUsr();
					$this->loadTemplate('usr/home', $dados);
					exit;
				}else{
					header("location:".BASE_URL."login");
				}
		}	

	}

	public function ajaxtabela(){
		$chamados = new Chamados();
		$dados['lista'] = $chamados->getAll();	
		$this->loadView('admin/Ajax/ajaxtabela', $dados);
		exit;
	}


	public function abrirChamado(){
   
        if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)) {
          unset($_SESSION['cLogin']);
          unset($_SESSION['cId']);
          session_destroy();
          header("location:".BASE_URL."login");
      	}else{
	        $dados = array();
	        $categoria = new Categorias();        	
	        $dados['info'] = $categoria->getLista();		
			$this->loadTemplate('usr/abrirChamado', $dados);


      }
	            
	}


	public function respChamado($id){		
       if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){
          unset($_SESSION['cLogin']);
          unset($_SESSION['cId']);
          session_destroy();
          header("location:".BASE_URL."login");
      	}else{		
			$dados = array();
			$mensagem = $_POST['mensagem'];
			$idUsr = $_SESSION['cId'];

			$respChamado = new Chamados();
			$usuario = new Usuarios();
			$upload = new Arquivos();

			if(!empty($id)){
				if(!empty($mensagem)){
					$status = $_POST['status'];
					$data_resposta = date('Y-m-d');
					$hora_resposta = date('H:i:s');
					$data_ultima_respota = date('Y-m-d');
					$hora_ultima_resposta = date('H:i:s');
					$data_fechamento = date('Y-m-d');

					if(!empty($_FILES['arquivo']['name'])){
					$nome_arquivo = $_FILES['arquivo']['name'];
					$tamanho_arquivo = $_FILES['arquivo']['size'];
				    $arquivo_temporario = $_FILES['arquivo']['tmp_name'];
				    	if($upload->uploadArquivoResposta($id, $idUsr, $mensagem, $status, $data_resposta, $hora_resposta, $data_ultima_respota,
							$hora_ultima_resposta, $data_fechamento, $nome_arquivo, $tamanho_arquivo, $arquivo_temporario)){

				    		header("Location: ".BASE_URL."chamados?aviso=certo");

				    		}else{
							$aviso['error'] = '<div class="alert alert-danger" role="alert">Error! Arquivo não permitido ou no máximo até 2MB</div>';
							$aviso['lista'] = $respChamado->getAllUsr($id);	
							$aviso['resp'] = $respChamado->getResp($id);
						    $this->loadTemplate('respChamado', $aviso);	
						   exit;				    		
				    	}

				    }else{

					$respChamado->insertRespostaChamado($id, $idUsr, $mensagem, $status, $data_resposta, $hora_resposta, $data_ultima_respota,
					$hora_ultima_resposta, $data_fechamento, $nome_arquivo);

					header("Location: ".BASE_URL."chamados?aviso=certo");
					exit;	

				    }
					
				}			
					
				$dados['lista'] = $respChamado->getAllUsr($id);	
				$dados['resp'] = $respChamado->getResp($id);
				$this->loadTemplate('respChamado', $dados);
				exit;			
	
			}else{
				header("Location: ".BASE_URL."login");
			}	
		}
	}

	public function novoChamado(){
       if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){
          unset($_SESSION['cLogin']);
          unset($_SESSION['cId']);
          session_destroy();
          header("location:".BASE_URL."login");
      	}else{               
				$aviso = array();
				$usuario = new Usuarios();
				$categ = new Categorias();
				$abrirChamado = new Chamados();
				$envEmail = new EnvioEmail();		
				$upload = new Arquivos();

				$IdEmpresa = $_SESSION['cIdEmpresa'];
				$email = $_SESSION['cEmail'];
				$categoria  = $_POST['categoria'];
				$titulo	    = $_POST['titulo'];
				$mensagem   = $_POST['mensagem'];

				//Se o arquivo vim do formulário
				if(!empty($_FILES['arquivo']['name'])){
				 $nome_arquivo = $_FILES['arquivo']['name'];
				 $tamanho_arquivo = $_FILES['arquivo']['size'];
				 $arquivo_temporario = $_FILES['arquivo']['tmp_name'];	
					if($upload->uploadArquivo($categoria, $titulo, $mensagem, $prioridade, $IdEmpresa, $nome_arquivo,
					 	$tamanho_arquivo, $arquivo_temporario)){
							$maior_id = $abrirChamado->ultimoId();
								$envEmail->enviarEmailChamado($titulo, $email, $mensagem, $maior_id);
									header("Location: ".BASE_URL."chamados?alert=ok");

						}else{
							$aviso['error'] = '<div class="alert alert-danger" role="alert">Error! Arquivo não permitido ou arquivo muito 						grande!</div>';
							$aviso['info'] = $categ->getLista();
						   $this->loadTemplate('usr/abrirChamado', $aviso);			
					}

				}else{// Caso não venha o arquivo em anexo mando pra aqui.

					if($abrirChamado->abrirChamado($categoria, $titulo, $mensagem, $prioridade, $IdEmpresa, $nome_arquivo)){
						$maior_id = $abrirChamado->ultimoId();
							$envEmail->enviarEmailChamado($titulo, $email, $mensagem, $maior_id);
							
								header("Location: ".BASE_URL."chamados?alert=ok");

						}else{
							$aviso['error'] = '<div class="alert alert-danger" role="alert">Error! Favor entra em contato com suporte</div>';
							$aviso['info'] = $categ->getLista();
						   $this->loadTemplate('usr/abrirChamado', $aviso);			
					}

			}
		}

	}


}