<?php

class comentariosController extends controller {


	public function comentUsuario(){

        if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){
          unset($_SESSION['cLogin']);
          unset($_SESSION['cId']);
          session_destroy();
          header("Location:".BASE_URL."login/sair");

          exit;
      	}else{	

			date_default_timezone_set('America/Sao_Paulo');

			$dados = array();
			$coment = new Comentarios();
			if(!empty($_POST['comentarios'])){
			    $id = $_POST['id'];
				$comentarios = $_POST['comentarios'];
				$nome = $_SESSION['cNome'];
				$idRoles = $_SESSION['cIdRoles'];
				$data = date('Y-m-d H:i:s');

				if($coment->insertComentarios($id, $comentarios, $nome, $idRoles, $data)){

					$dados['coment'] = $coment->getComentariosUsr($id);
					$this->loadView('usr/Ajax/ajaxComentarios', $dados);
					exit;					

				}else{
					header("Location:".BASE_URL."login/sair");
				}

			}

      	}

	}


	public function formComentarios(){

	    if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){
	          unset($_SESSION['cLogin']);
	          unset($_SESSION['cId']);
	          session_destroy();
	          header("Location:".BASE_URL."login/sair");

	    }else{ 

	    	
	    	$this->loadView('admin/formComentAdmin');
	    	exit;
	    	
		}
	}


	public function InserirComentAdmin(){



	    		$dados = array();

	    		$coment = new Comentarios();

	    		if(!empty($_POST['comentarios'])){
	    		
	    			$id = $_POST['id'];
	    			$comentarios = $_POST['comentarios'];
	    			$nome = $_SESSION['cNome'];
	    			$idRoles = $_SESSION['cIdRoles'];
	    			$data = date('Y-m-d H:i:s');
	    		
	    		
	    			$dados['coment'] = $coment->insertComentarios($id, $comentarios, $nome, $idRoles, $data);
	    		    
	    		    }else{
	    		    	header("Location:".BASE_URL."login");
	    		    }


	}



}