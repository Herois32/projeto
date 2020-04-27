<?php

/**
 * 
 */
class ViewVideo extends model{


	public function getVideo($id){

		$array = array();

		$sql = "SELECT al_arquivos, al_curso FROM tb_aulas WHERE al_id = :al_id  ";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':al_id', $id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();

			return $array;
		}else{
			return false;
		}

	}


}