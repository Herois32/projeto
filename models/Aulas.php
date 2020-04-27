<?php

class Aulas extends model {

	
	public function getAulas(){

		$sql = "SELECT * FROM tb_aulas WHERE 1 ORDER BY al_dataInicio DESC  ";
		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0){
			$sql = $sql->fetchAll();
			return $sql;
		}else{
			return false;
		}

	}

	public function getAulasID($id){

		$sql = "SELECT * FROM tb_aulas WHERE al_id = :al_id ";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':al_id', $id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$sql = $sql->fetchAll();
			return $sql;
		}else{
			return false;
		}

	}

	public function getData($data_Atual){

		$sql = "SELECT * FROM tb_aulas WHERE al_dataInicio = :al_dataInicio ";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':al_dataInicio', $data_Atual);
		$sql->execute();

		if($sql->rowCount() > 0){
			return true;
		}else{
			return false;
		}

	}	

	public function getHoras($data_Atual){

		$sql = "SELECT * FROM tb_aulas WHERE al_dataInicio = '$data_Atual' AND now() 
				BETWEEN concat(curdate(),' ',al_horaInico) AND concat(curdate(),' ',al_horaFim)";
		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0){
			return true;
		}else{
			return false;
		}

	}


	public function editarAulas($dataInicio, $dataFim, $horaInicio, $horaFim, $id){

		$sql = "UPDATE tb_aulas SET al_dataInicio = :al_dataInicio, al_dataFim = :al_dataFim, al_horaInico = :al_horaInico,
		         al_horaFim = :al_horaFim WHERE al_id = :al_id";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':al_id', $id);
		$sql->bindValue(':al_dataInicio', $dataInicio);
		$sql->bindValue(':al_dataFim', $dataFim);
		$sql->bindValue(':al_horaInico', $horaInicio);
		$sql->bindValue(':al_horaFim', $horaFim);
		$sql->execute();

			return true;
		       

	}


	public function del($id){

		$sql = "DELETE FROM tb_aulas WHERE al_id = :al_id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':al_id', $id);
		$sql->execute();

		return true;
	}




}