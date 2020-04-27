<?php

/**
 * 
 */
class Graficos extends model{
	

	public function getGraficoStatus($dataInicio, $dataFim){

		$sql = "SELECT ep.ep_razao_social, ch.ch_status, COUNT(ch_status) AS total 
				FROM tb_chamados AS ch 
				INNER JOIN tb_empresas AS ep ON ch.ch_idEmpresa = ep.ep_id 
				WHERE DATE_FORMAT( ch_data_abertura, '%m/%Y' ) BETWEEN '$dataInicio' AND '$dataFim'
				GROUP BY ch.ch_status";
		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
			return $array;
		}else{
			return false;
		}		
		
	}

public function getGraficoEmpresa($dataInicio, $dataFim){

		$sql = "SELECT ep.ep_razao_social, ch.ch_status, COUNT(ch_status) AS total 
				FROM tb_chamados AS ch 
				INNER JOIN tb_empresas AS ep ON ch.ch_idEmpresa = ep.ep_id 
				WHERE DATE_FORMAT( ch_data_abertura, '%m/%Y' ) BETWEEN '$dataInicio' AND '$dataFim' 
				GROUP BY ep.ep_razao_social";
		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
			return $array;
		}else{
			return false;
		}		
		
	}


public function getGraficoTodosMeses($dataInicio, $dataFim){

		$sql = "SELECT DATE_FORMAT( ch_data_abertura, '%m/%Y' ) AS data_result, COUNT(ch_data_abertura) AS total 
				FROM tb_chamados WHERE DATE_FORMAT( ch_data_abertura, '%m/%Y' ) BETWEEN '$dataInicio' AND '$dataFim' 
			    GROUP BY DATE_FORMAT( ch_data_abertura, '%m/%Y' )";
		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
			return $array;
		}else{
			return false;
		}		
		
	}


	public function getAdmin($dataInicio, $dataFim){

		$sql = "SELECT usr.usr_nome, usr.usr_id_roles, COUNT(re.rc_id) AS 'totalResposta' 
				FROM tb_respChamado AS re
				INNER JOIN tb_usuarios AS usr ON re.rc_idUsr = usr.usr_id
				WHERE usr.usr_id_roles = '1' AND re.rc_data_resposta 
				BETWEEN '$dataInicio' AND '$dataFim' 
				GROUP BY re.rc_idUsr";

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