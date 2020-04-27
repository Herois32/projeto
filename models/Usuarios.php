<?php
class Usuarios extends model {

	public function login($email, $password){

				$sql = "SELECT * FROM tb_usuarios WHERE usr_email = :usr_email AND usr_password = :usr_password ";
				$sql = $this->db->prepare($sql);		
				$sql->bindValue(":usr_email", $email);
				$sql->bindValue(":usr_password", $password);
				$sql->execute();

				$dados = array();
				if($sql->rowCount() > 0) {
					$dados = $sql->fetch();
					session_start();
					$_SESSION['cId'] = $dados['usr_id'];
					$_SESSION['cNome'] = $dados['usr_nome'];
					$_SESSION['cIdRoles'] = $dados['usr_id_roles'];
					$_SESSION['cEmail'] = $dados['usr_email'];
					$_SESSION['cStatus'] = $dados['usr_status'];
					$_SESSION['cSexo'] = $dados['usr_sexo'];
					$_SESSION['cIp'] = $dados['usr_ip'];
					$qtd = $dados['usr_logado'];
					$_SESSION['cLogin'] = true;

					$id = $_SESSION['cId'];
									
					$this->contarLogar($id, $qtd);
					return true;
				} else {
					return false;
				}		

	}


	public function updateIp($id){

		$ip = $_SERVER['REMOTE_ADDR'];

		$sql = "UPDATE tb_usuarios SET usr_ip = :usr_ip WHERE usr_id = :usr_id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':usr_ip', $ip);
		$sql->bindValue(':usr_id', $id);
		$sql->execute();


	}

	public function ZeraIp($id){

		$ip_logado = 1;

		$sql = "UPDATE tb_usuarios SET usr_ip = :usr_ip WHERE usr_id = :usr_id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':usr_ip', $ip_logado);
		$sql->bindValue(':usr_id', $id);
		$sql->execute();

		return true;

	}	


	private function contarLogar($id, $qtd){

		$dataAcesso = date('Y-m-d H:i:s');

		$sql = "UPDATE tb_usuarios SET usr_logado = :usr_logado, usr_ultimo_acesso = :usr_ultimo_acesso WHERE usr_id = :usr_id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':usr_logado', $qtd + 1 );
		$sql->bindValue(':usr_ultimo_acesso', $dataAcesso);
		$sql->bindValue(':usr_id', $id);
		$sql->execute();

		return true;

	}	

	public function getUsuarios($id, $status){

		//Atualizar a tabela status para informa que o usuario esta logado
		$this->updateStatus($id, $status);

		$array = array();

		$sql = "SELECT * FROM tb_usuarios WHERE usr_id = :usr_id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":usr_id", $id);
		$sql->execute();
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}
		return $array;
	}

	private function updateStatus($id, $status){

		$sql = "UPDATE tb_usuarios SET usr_status = :usr_status, usr_hora = :usr_hora WHERE usr_id = :usr_id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':usr_status', $status);
		$sql->bindValue(':usr_hora', date('H:i:s'));		
		$sql->bindValue(':usr_id', $id);
		$sql->execute();

	}


	public function getAdmin(){

		$array = array();

		$sql = "SELECT * FROM tb_usuarios WHERE usr_id_roles = 1";
		$sql = $this->db->query($sql);
		$sql->execute();
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}
		return $array;
	}

	public function getAdminId($id){

		$sql = "SELECT * FROM tb_usuarios WHERE usr_id = :usr_id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':usr_id', $id);
		$sql->execute();
		if($sql->rowCount() > 0){
			$sql = $sql->fetchAll();
		}
		return $sql;
	}	


	public function listarAlunos(){
		$array = array();

		$sql = "SELECT * FROM tb_usuarios WHERE usr_id_roles = 2 ";
		$sql = $this->db->query($sql);
		$sql->execute();
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}
		return $array;

	}




	public function trocarSenhaAdmin($id, $senha){
		$sql = "UPDATE tb_usuarios SET usr_password = :usr_password WHERE usr_id = :usr_id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':usr_password', md5($senha));		
		$sql->bindValue(':usr_id', $id);
		$sql->execute();		
	}

	/* FUNÇÃO PARA CADASTRAR UM NOVO USUARIO ADMIN */
	public function insertUsr($nome, $cpf, $email, $senha, $data, $sexo, $tel, $status, $roles, $qtdLogado, $data_acesso, $ip){

	if($this->verificarEmail($email)){	
	
			$sql = "INSERT INTO tb_usuarios(usr_email, usr_password, usr_nome, usr_data_registro, usr_sexo, usr_telefone, usr_cpf, usr_status, usr_id_roles, usr_logado, usr_ultimo_acesso, usr_ip)
					VALUES(:usr_email, :usr_password, :usr_nome, :usr_data_registro, :usr_sexo, :usr_telefone, :usr_cpf, :usr_status, :usr_id_roles, :usr_logado, :usr_ultimo_acesso, :usr_ip)";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':usr_email', $email);
			$sql->bindValue(':usr_password', md5($senha));
			$sql->bindValue(':usr_nome', $nome);
			$sql->bindValue(':usr_data_registro', $data);
			$sql->bindValue(':usr_sexo', $sexo);		
			$sql->bindValue(':usr_telefone', $tel);
			$sql->bindValue(':usr_cpf', $cpf);
			$sql->bindValue(':usr_status', $status);
			$sql->bindValue(':usr_id_roles', $roles);
			$sql->bindValue(':usr_logado', $qtdLogado);
			$sql->bindValue(':usr_ultimo_acesso', $data_acesso);
			$sql->bindValue(':usr_ip', $ip);
			$sql->execute();
	
			if($sql->rowCount() > 0 ){
				return true;
			}
				return false;
	
		}else{

			return false;
		}

	}


	//Verificar se já existe o email que vai ser cadastrado 
	private function verificarEmail($email){
		$sql = "SELECT usr_email FROM tb_usuarios WHERE usr_email = :usr_email";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':usr_email', $email);
		$sql->execute();

		if($sql->rowCount() == 0){
			return true;
		}else{			
			return false;
		}

	}	

	public function updateUsuario($tel, $id){

		$sql = "UPDATE tb_usuarios SET usr_telefone = :usr_telefone WHERE usr_id = :usr_id";
	    $sql = $this->db->prepare($sql);
	    $sql->bindValue(':usr_telefone', $tel);
	    $sql->bindValue(':usr_id', $id);
	    $sql->execute();

	 

	}

	public function del($id){

		$sql = "DELETE FROM tb_usuarios WHERE usr_id = :usr_id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':usr_id', $id);
		$sql->execute();

		return true;
	}	




}

?>