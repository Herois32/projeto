<?php
/**
 * Esse class é responsável por
 * toda funcionalidade como Abrir chamado,
 * Responder chamado, Lista Chamado
 */

class Chamados extends model{

	//Inserir no Banco um chamado (Sem envio de arquivo)
	public function abrirChamado($categoria, $titulo, $mensagem, $prioridade, $IdEmpresa, $nome_arquivo ){
		date_default_timezone_set('America/Sao_Paulo');
		$dataAbertura = date('Y-m-d');
		$horaAbertura = date('H:i:s');
		$data_ultima_atualizacao = date('Y-m-d H:i:s');
		$dataFechamento = "0000-00-00";
		$horaFechamento = "00:00:00";
		$status = 'Aberto';
		$idNome = $_SESSION['cId'];	
		$nome_arquivo = Null;	

		$sql = "INSERT INTO tb_chamados (ch_idNome, ch_titulo, ch_categoria, ch_texto, ch_data_abertura, ch_hora_abertura, ch_data_ultima_atulizacao, ch_data_fechamento, 		ch_hora_fechamento, ch_idEmpresa, ch_status, ch_arquivo) 
				VALUES(:ch_idNome, :ch_titulo, :ch_categoria, :ch_texto, :ch_data_abertura, :ch_hora_abertura, :ch_data_ultima_atulizacao, 
				:ch_data_fechamento, :ch_hora_fechamento, :ch_idEmpresa, :ch_status, :ch_arquivo)";

						
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':ch_idNome', $idNome);
			$sql->bindValue(':ch_titulo', $titulo);
			$sql->bindValue(':ch_categoria', $categoria);
			$sql->bindValue(':ch_texto', $mensagem);
			$sql->bindValue(':ch_data_abertura', $dataAbertura);
			$sql->bindValue(':ch_hora_abertura', $horaAbertura);
			$sql->bindValue(':ch_data_ultima_atulizacao', $data_ultima_atualizacao);
			$sql->bindValue(':ch_data_fechamento', $dataFechamento);
			$sql->bindValue(':ch_hora_fechamento', $horaFechamento);
			$sql->bindValue(':ch_idEmpresa', $IdEmpresa);
			$sql->bindValue(':ch_status', $status);
			$sql->bindValue(':ch_arquivo', $nome_arquivo);			
			$sql->execute();

			if($sql->rowCount() > 0){
				return true;
			}else{
				return false;
			}	

	}

	//Inserir no Banco a resposta do chamado
	public function insertRespostaChamado($id, $idUsr, $mensagem, $status, $data_resposta, $hora_resposta, $data_ultima_respota, $hora_ultima_resposta, $data_fechamento, $nome_arquivo){

			if($this->update($id, $status)){
				
				$sql = "INSERT INTO tb_respChamado(rc_idChamado, rc_idUsr, rc_texto, rc_data_resposta, rc_hora_resposta, rc_data_ultima_resposta, rc_hora_ultima_resposta, rc_data_fechamento, rc_arquivo) 
						VALUES(:rc_idChamado, :rc_idUsr, :rc_texto, :rc_data_resposta, :rc_hora_resposta, :rc_data_ultima_resposta, :rc_hora_ultima_resposta, :rc_data_fechamento, :rc_arquivo)";
				$sql = $this->db->prepare($sql);
				$sql->bindValue(':rc_idChamado', $id);
				$sql->bindValue(':rc_idUsr', $idUsr);
				$sql->bindValue(':rc_texto', $mensagem);
				$sql->bindValue(':rc_data_resposta', $data_resposta);
				$sql->bindValue(':rc_hora_resposta', $hora_resposta);
				$sql->bindValue(':rc_data_ultima_resposta', $data_ultima_respota);
				$sql->bindValue(':rc_hora_ultima_resposta', $hora_ultima_resposta);
				$sql->bindValue(':rc_data_fechamento', $data_fechamento);
				$sql->bindValue(':rc_arquivo', $nome_arquivo);
				$sql->execute();

				if($sql->rowCount() > 0){
					return true;
				}else{
					return false;
				}
			}	
	}

	//Atualizar o status da tabela tb_chamados
	private function update($id, $status){
		date_default_timezone_set('America/Sao_Paulo');
		$data_ultima_atualizacao = date('Y-m-d H:i:s');

		if($status == "Fechado"){
			$data_fechamento = date('Y-m-d');
			$horafechamento = date('H:i:s');
			
			$sql = "UPDATE tb_chamados SET ch_status = :ch_status, ch_data_ultima_atulizacao = :ch_data_ultima_atulizacao,
						 ch_data_fechamento = :ch_data_fechamento, ch_hora_fechamento = :ch_hora_fechamento WHERE ch_id = :ch_id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':ch_id', $id);
			$sql->bindValue(':ch_data_ultima_atulizacao', $data_ultima_atualizacao);
			$sql->bindValue(':ch_status', $status);
			$sql->bindValue(':ch_data_fechamento', $data_fechamento);
			$sql->bindValue(':ch_hora_fechamento', $horafechamento);
			$sql->execute();		
		
		}else{

			$sql = "UPDATE tb_chamados SET ch_data_ultima_atulizacao = :ch_data_ultima_atulizacao, ch_status = :ch_status WHERE ch_id = :ch_id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':ch_id', $id);
			$sql->bindValue(':ch_data_ultima_atulizacao', $data_ultima_atualizacao);
			$sql->bindValue(':ch_status', $status);
			$sql->execute();				
			} 

			return true;
		
	}

	//Na tela de resposta colocar o dialago de resposta entre o Usuário de Admin
	public function getResp($id){
		$array = array();

		$sql = "SELECT rp.rc_texto, rp.rc_data_resposta, rp.rc_data_ultima_resposta, 
					   rp.rc_hora_ultima_resposta, rp.rc_data_fechamento, rp.rc_arquivo, usr.usr_nome 
					   FROM tb_respChamado AS rp 
					   INNER JOIN tb_usuarios AS usr 
					   ON rp.rc_idUsr = usr.usr_id
					   WHERE rp.rc_idChamado = :rc_idChamado";
		$sql = $this->db->prepare($sql);
		$sql->bindValue('rc_idChamado',$id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array; 			   

	}

	//Trazer todos os chamados para a tela do Administrador
	public function getAll() {
		$array = array();

		$sql = ("SELECT ch.ch_id, ch.ch_categoria, ch.ch_data_abertura, ch.ch_data_ultima_atulizacao, ch.ch_data_fechamento, ch.ch_status, ch.ch_arquivo, usr.usr_nome, ep.ep_razao_social 
				FROM tb_chamados AS ch 
				INNER JOIN tb_usuarios AS usr 
				ON ch.ch_idNome = usr.usr_id 
				INNER JOIN tb_empresas AS ep 
				ON ch.ch_idEmpresa = ep.ep_id ");

		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0 ){
			$array = $sql->fetchAll();
		}

		return $array;
		
	}


	//Lista todos os chamados de Usuário de acordo com seu ID na tela de RESPOSTA
	public function getAllUsr($id){
		$array = array();

		$sql = ("SELECT ch.ch_id, ch.ch_texto, ch.ch_data_abertura, ch.ch_data_ultima_atulizacao, ch.ch_status, ch.ch_arquivo, usr.usr_nome, ep.ep_razao_social 
				FROM tb_chamados AS ch 
				INNER JOIN tb_usuarios AS usr 
				ON ch.ch_idNome = usr.usr_id 
				INNER JOIN tb_empresas AS ep 
				ON ch.ch_idEmpresa = ep.ep_id
				WHERE ch.ch_id = :ch_id ");

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':ch_id', $id);
		$sql->execute();

		if($sql->rowCount() > 0 ){
			$array = $sql->fetchAll();
		}

		return $array;
	}

   	//Lista todos os chamados para quando o perfil for Usuário com o ID dele na sessão
	public function getUsr(){
		$array = array();
		$id = $_SESSION['cId'];	

		$sql = ("SELECT ch.ch_id, ch.ch_categoria, ch.ch_data_abertura, ch.ch_data_ultima_atulizacao, ch.ch_status, ch.ch_arquivo, usr.usr_nome 
				FROM tb_chamados AS ch 
				INNER JOIN tb_usuarios AS usr 
				ON ch.ch_idNome = usr.usr_id 
				INNER JOIN tb_empresas AS ep 
				ON ch.ch_idEmpresa = ep.ep_id
				WHERE ch.ch_idNome = :ch_idNome ");

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':ch_idNome', $id);
		$sql->execute();

		if($sql->rowCount() > 0 ){
			$array = $sql->fetchAll();
		}

		return $array;
	}

	//Função para informar a quantidade de chamados em Abertos
	public function qtdChamados() {
		$dado = array();
		$filtrostring = array('1=1');

		$perfil = $_SESSION['cIdRoles'];
		$id = $_SESSION['cId'];
		$status = "Aberto";

		if($perfil == 1){
		$filtrostring[] = 'ch_status = :ch_status';	
		}
		if($perfil == 2){
		$filtrostring[] = 'ch_status = :ch_status AND ch_idNome = :ch_idNome';	
		}
		$sql = ("SELECT COUNT(ch_id) AS conta FROM tb_chamados WHERE ".implode(' AND ', $filtrostring));
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':ch_status', $status);
		if($perfil == 2){
		$sql->bindValue(':ch_idNome', $id);	
		}		
		
		$sql->execute();	

		if($sql->rowCount() > 0 ){
			$total = $sql->fetch();
			$dado = $total['conta'];
		}

		return $dado;
		
	}

	//Metódo para pegar o ID do ultimo chamado aberto
	public function ultimoId(){

		$array = array();

		$sql = "SELECT max(ch_id) AS maiorId FROM tb_chamados WHERE 1";
		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0){
			$result = $sql->fetch();
			$array = $result['maiorId'];
			
		}
			return $array;
	}	

}