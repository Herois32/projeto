<?php
class homeController extends controller {

	public function index(){

				 $email    = addslashes($_POST['email']);
				 $password = addslashes(md5($_POST['password']));
				 $ip = $_SERVER['REMOTE_ADDR'];


				 $usuario  = new Usuarios();

				if(!empty($email) && (!empty($password))){ 

				 	if($usuario->login($email, $password)){

					 		$id = $_SESSION['cId'];
					 		
					 		$ip_logado = $_SESSION['cIp'];
					 		//VERIFICAR SE O IP LOGADO É O MESMO QUE ESTA TENTANDO LOGAR
			 				if($ip == $ip_logado OR $ip_logado == 1){
			 					//CASO SEJA O MESMO IP ATUALIZA O BD 
			 					$usuario->updateIp($id);

				 				header("Location:".BASE_URL."home/painel");
			 			


						}else{
			 			//CASO O USUARIO ESTEJA DESATIVADO
			 			$dados['alert'] = '<div class="alert alert-danger" role="alert">Usuário já logado!</div>';			 			
				 		$this->loadView('login', $dados);
				 		exit;	 								

						 	}

			 		}else{
						//CASO A SENHA OU USUÁRIO ESTEJA INCORRENTO
						$dados['alert'] = '<div class="alert alert-danger" role="alert">Email ou/ senha incorretos!</div>';
						$this->loadView('login', $dados);
						exit;		
			 		}


					}else{
						$this->loadView('login');
						exit;
					}		
	 			

	}

	public function painel(){

      if((!isset ($_SESSION['cLogin']) == true) and (!isset ($_SESSION['cId']) == true)){
          unset($_SESSION['cLogin']);
          unset($_SESSION['cId']);
          session_destroy();
          header("location:".BASE_URL."login/sair");
      	}else{

 			$dados = array(); 


			$data_Atual = date('Y-m-d');	
 			    		
	    	$usuarios = new Usuarios();
	    	$coment   = new Comentarios();
	    	$agend 	  = new Aulas();

	    	$id = $_SESSION['cId'];

	    	$status = "Online";
	    
	    	$dados['usr'] 	 = $usuarios->getUsuarios($id, $status); 
	    		
			$dados['dados'] = $agend->getAulas();		

	    	if($_SESSION['cIdRoles'] == 1 ){

	    	$dados['coment'] = $coment->getComentarios();

			$this->loadTemplate('admin/painel', $dados);
			exit;

	    	}
	    	if($_SESSION['cIdRoles'] == 2 ){

		    	if($agend->getData($data_Atual)){  

				    	if($agend->getHoras($data_Atual)){  

				    	$dados['coment'] = $coment->getComentariosUsr($id);

						$this->loadTemplate('usr/painel', $dados);
						exit;

					}else{
				 	//CASO O HORÁRIO CONSTAR NO BD 	
				 	$dados['alert'] = '<div class="alert alert-info" role="alert">Fora do horário da aula!</div>';	
					$this->loadView('login', $dados);
					exit;
				 	} 

				}else{
			 	//CASO A DATA NÃO CONSTAR NO BD 	
			 	$dados['alert'] = '<div class="alert alert-info" role="alert">Fora da data da aula!</div>';	
				$this->loadView('login', $dados);
				exit;
			 	}




	    	}


		}	

	}	


}