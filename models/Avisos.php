<?php

/**
 * 
 */
class Avisos extends model{
	
	public function getAlunoOline($status, $id_roles){

		$sql = "SELECT usr_nome, usr_status, usr_sexo FROM tb_usuarios WHERE usr_hora > :usr_hora AND usr_id_roles = :usr_id_roles ";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':usr_hora', date('H:i:s', strtotime("-45 minutes")));
		$sql->bindValue(':usr_id_roles', $id_roles);
		$sql->execute();

		if($sql->rowCount() > 0){
			$sql = $sql->fetchAll();
			return $sql;
		}else{
			return false;
		}

	}

	public function qtdOnline($status, $id_roles){

		$array = array();

		$sql = "SELECT COUNT(usr_nome) as total FROM tb_usuarios WHERE usr_hora > :usr_hora AND usr_id_roles = :usr_id_roles ";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':usr_hora', date('H:i:s', strtotime("-45 minutes")));
		$sql->bindValue(':usr_id_roles', $id_roles);
		$sql->execute();

		if($sql->rowCount() > 0){
			$total = $sql->fetch();
			return $array = $total['total'];
		}else{
			return false;
		}

	}

	public function getMensagens(){

		$sql = "SELECT * FROM tb_mensagens ORDER BY ms_data DESC LIMIT 4";
		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0){
			$sql = $sql->fetchAll();
			return $sql;
		}else{
			return false;
		}
	}

	public function qtdMensagens(){

		$sql = "SELECT COUNT(ms_id) AS total FROM tb_mensagens WHERE 1";
		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0){
			$totalMens = $sql->fetch();
			return $qtd = $totalMens['total'];
		}else{
			return false;
		}

	}

	public function insertMensagem($titulo, $mensagem, $data){

		$sql = "INSERT INTO tb_mensagens(ms_titulo, ms_descricao, ms_data)
				VALUES (:ms_titulo, :ms_descricao, :ms_data)";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':ms_titulo', $titulo);
		$sql->bindValue(':ms_descricao', $mensagem);		
		$sql->bindValue(':ms_data', $data);				
		$sql->execute();

		return true;

	}

	public function getMsg($id){

		$sql = "SELECT * FROM tb_mensagens WHERE ms_id = :ms_id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':ms_id', $id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$sql = $sql->fetchAll();
			return $sql;
		}else{
			return false;
		}

	}

}