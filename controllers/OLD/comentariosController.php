<?php 

/**
 * 
 */
class comentariosController extends controller{
	
	public function formComentarios(){

		$this->loadView('admin/formComentAdmin');
		exit;
	}

	public function inserirComentarios(){

        if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){
          unset($_SESSION['cLogin']);
          unset($_SESSION['cId']);
          session_destroy();
          header("location:".BASE_URL."login");
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
					if(!empty($idRoles) and $idRoles == 1 ){
						$coment->insertResponder($id, $comentarios, $data, $nome, $idRoles);
						$dados['listar'] = $coment->getComentarios();
						$this->loadView('admin/Ajax/ajaxComentarios', $dados);
						exit;

					}else{

						$coment->insertComentarios($id, $comentarios, $data, $nome, $idRoles);
						$dados['listar'] = $coment->getComentariosUsr($id);
						$this->loadView('ajaxComentarios', $dados);
						exit;
					}
				}
			}


		}



}