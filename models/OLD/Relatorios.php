<?php

/**
 * 
 */
class Relatorios extends model{
	

	public function getRelatoriosDiario($cat){

		$array = array();

		$sql = "SELECT ch.ch_id, ep.ep_razao_social, cg.cg_categoria, 
					   TIMESTAMPDIFF(DAY, ch.ch_data_abertura, ch.ch_data_fechamento) AS total 
					   FROM tb_chamados AS ch INNER JOIN tb_empresas AS ep ON ch.ch_idEmpresa = ep.ep_id 
					   INNER JOIN tb_categoria AS cg ON ch.ch_categoria = cg.cg_categoria 
					   WHERE ch.ch_status = 'Fechado' AND cg.cg_categoria  = :ch_categoria";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':ch_categoria', $cat);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
			return $array;
		}else{
			return false;
		}		
	}

	public function getMes($dataInicio, $dataFim){

		$totalStatus = array();

		$sql = "SELECT ch_status, COUNT(ch_status) AS 'totalStatus' 
				FROM tb_chamados WHERE ch_data_abertura 
				BETWEEN '$dataInicio' AND '$dataFim' 
				GROUP BY ch_status";

		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0){
			$totalStatus = $sql->fetchAll(); 

		}
			return $totalStatus;

	}

	public function getMesResposta($dataInicio, $dataFim){

		$totalRespostas = array();

		$sql = "SELECT usr.usr_nome, COUNT(rc.rc_idChamado) AS total
				FROM tb_respChamado As rc INNER JOIN tb_usuarios AS usr
				ON rc.rc_idUsr = usr.usr_id WHERE usr.usr_id_roles = 1 
				AND rc_data_resposta BETWEEN '$dataInicio' AND '$dataFim'
				GROUP BY rc.rc_idUsr";

		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0){
			$totalRespostas = $sql->fetchAll(); 

		}
			return $totalRespostas;


	}

	public function getRelatoriosAberto($data){

		$sql = "SELECT usr.usr_nome, ch.ch_status, COUNT(ch_status) AS total 
				FROM tb_chamados AS ch INNER JOIN tb_usuarios AS usr ON ch.ch_idNome = usr.usr_id
				WHERE DATE_FORMAT( ch_data_abertura, '%m/%Y' ) = '$data' AND ch.ch_status = 'Aberto'
				GROUP BY usr.usr_nome ORDER BY usr.usr_nome ASC";

		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
			return $array;
		}else{
			return false;
		}		

	}

	public function getRelatoriosFechado($data){

		$sql = "SELECT usr.usr_nome, ch.ch_status, COUNT(ch_status) AS total 
				FROM tb_chamados AS ch INNER JOIN tb_usuarios AS usr ON ch.ch_idNome = usr.usr_id
				WHERE DATE_FORMAT( ch_data_abertura, '%m/%Y' ) = '$data' AND ch.ch_status = 'Fechado'
				GROUP BY usr.usr_nome ORDER BY usr.usr_nome ASC";

		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
			return $array;
		}else{
			return false;
		}		

	}

	public function getRelatoriosAndamento($data){

		$sql = "SELECT usr.usr_nome, ch.ch_status, COUNT(ch_status) AS total 
				FROM tb_chamados AS ch INNER JOIN tb_usuarios AS usr ON ch.ch_idNome = usr.usr_id
				WHERE DATE_FORMAT( ch_data_abertura, '%m/%Y' ) = '$data' AND ch.ch_status = 'Em andamento'
				GROUP BY usr.usr_nome ORDER BY usr.usr_nome ASC";

		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
			return $array;
		}else{
			return false;
		}		

	}

	public function getRelatoriosReaberto($data){

		$sql = "SELECT usr.usr_nome, ch.ch_status, COUNT(ch_status) AS total 
				FROM tb_chamados AS ch INNER JOIN tb_usuarios AS usr ON ch.ch_idNome = usr.usr_id
				WHERE DATE_FORMAT( ch_data_abertura, '%m/%Y' ) = '$data' AND ch.ch_status = 'Reaberto'
				GROUP BY usr.usr_nome ORDER BY usr.usr_nome ASC";

		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
			return $array;
		}else{
			return false;
		}		

	}	



}
