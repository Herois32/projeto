<?php

/**
 * 
 */
class mensagemController extends controller{
	
	public function index(){

      if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){
          unset($_SESSION['cLogin']);
          unset($_SESSION['cId']);
          session_destroy();
          header("location:".BASE_URL."login/sair");
      	}else{
		$this->loadTemplate('admin/cadAnuncios');
		exit;

		}

	}

	public function cadastroMensagens(){

      if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){
          unset($_SESSION['cLogin']);
          unset($_SESSION['cId']);
          session_destroy();
          header("location:".BASE_URL."login/sair");
      	}else{

      		$dados = array();
      		$insert = new Avisos();

      		if(!empty($_POST['titulo'])){

      			$titulo = $_POST['titulo'];
      			$mensagem = $_POST['mensagem'];
      			$data = date('Y-m-d');

      			
      			$insert->insertMensagem($titulo, $mensagem, $data);

      			$dados['alert'] = '<div class="alert alert-success" role="alert">Mensagem cadastrada com sucesso!</div>';

      			$this->loadTemplate('admin/cadAnuncios', $dados);
      			exit;
      		}

      	}

	}


	public function formMensagem(){

      if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){
          unset($_SESSION['cLogin']);
          unset($_SESSION['cId']);
          session_destroy();
          header("location:".BASE_URL."login/sair");

        }else{    

    		$dados = array();

    		$id = $_POST['id'];

    		$msg = new Avisos();

    		$dados['dados'] = $msg->getMsg($id);;

    		$this->loadView('admin/formMensagem', $dados);
    		exit;
      }

	}

	public function fecharMsg(){

		return true;
	}


  public function listaMsg(){

      if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){
          unset($_SESSION['cLogin']);
          unset($_SESSION['cId']);
          session_destroy();
          header("location:".BASE_URL."login/sair");
          
        }else{  

          $dados = array();

          $msg = new Avisos();

          $dados['msg'] = $msg->listaMensagens();

          $this->loadTemplate('admin/listaMsg', $dados);
          exit;
        }
  }

  public function editarMsg($id){

      if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){
          unset($_SESSION['cLogin']);
          unset($_SESSION['cId']);
          session_destroy();
          header("location:".BASE_URL."login/sair");
          
        }else{  

        if(!empty($id)){

         $dados = array();

         $edtMsg = new Avisos();

         $dados['info'] = $edtMsg->getMsgId($id);

         $this->loadTemplate('admin/editarMsg', $dados);
         exit;

        }

      }

  }


    public function atualizar(){
      
      if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){
          unset($_SESSION['cLogin']);
          unset($_SESSION['cId']);
          session_destroy();
          header("location:".BASE_URL."login/sair");
          
        }else{  

      $dados = array();

      $mens = new Avisos();

          if(!empty($_POST['titulo']) and !empty($_POST['mensagem'])){

            $id = $_POST['id'];
            $titulo = $_POST['titulo'];
            $mensag = $_POST['mensagem'];
            $data = implode("-",array_reverse(explode("/", $_POST['data'])));

            if($dados['aviso'] = $mens->updateMsg($id, $titulo, $mensag, $data)){

              $dados['msg'] = $mens->listaMensagens();
              $dados['alert'] = '<div class="alert alert-success" role="alert">Mensagem atualizados com sucesso!</div>';

            $this->loadTemplate('admin/listaMsg', $dados);
            exit;

            }
      }


  }


}

  public function deletarMsg($id){

  	$dados = array();
  	$del = new Avisos();

  	$del->delMsg($id);
  	$dados['msg'] = $del->listaMensagens();
  	$dados['delet'] = '<div class="alert alert-success" role="alert">Mensagem deletado com sucesso!</div>';
  	$this->loadTemplate('admin/listaMsg', $dados);
  	exit;

  }




}