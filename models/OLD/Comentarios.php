<?php

/**
 * 
 */
class Comentarios extends model{

	public function getComentarios(){

		$sql = "SELECT * FROM tb_comentarios
				ORDER BY cm_data DESC 
				LIMIT 10";

		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
			return $array;
		}else{
			return false;
		}
	}

	public function getComentariosUsr($id){

			$sql = "SELECT * FROM tb_comentarios
					WHERE cm_idUsr = :cm_idUsr
					ORDER BY cm_data DESC 
					LIMIT 5 ";

			$sql = $this->db->prepare($sql);
			$sql->bindValue(':cm_idUsr', $id);
			$sql->execute();

			if($sql->rowCount() > 0){
				$array = $sql->fetchAll();
				return $array;
			}else{
				return false;
			}
		}


	public function insertComentarios($id, $comentarios, $data, $nome, $idRoles){

		//$this->update($id, $id_logado);

				$sql = "INSERT INTO tb_comentarios(cm_idUsr, cm_cometarios, cm_data, cm_nome, cm_idRoles) 
						VALUES(:cm_idUsr, :cm_cometarios, :cm_data, :cm_nome, :cm_idRoles)";
		
				$sql = $this->db->prepare($sql);
				$sql->bindValue(':cm_idUsr', $id);
				$sql->bindValue(':cm_cometarios', $comentarios);
				$sql->bindValue(':cm_data', $data);
				$sql->bindValue(':cm_nome', $nome);
				$sql->bindValue(':cm_idRoles', $idRoles);
				$sql->execute();

			

		return true;		
	}


	public function insertResponder($id, $comentarios, $data, $nome, $idRoles){

		//$this->update($id, $id_logado);
		
				$sql = "INSERT INTO tb_comentarios(cm_idUsr, cm_cometarios, cm_data, cm_nome, cm_idRoles) 
						VALUES(:cm_idUsr, :cm_cometarios, :cm_data, :cm_nome, :cm_idRoles)";
		
				$sql = $this->db->prepare($sql);
				$sql->bindValue(':cm_idUsr', $id);
				$sql->bindValue(':cm_cometarios', $comentarios);
				$sql->bindValue(':cm_data', $data);
				$sql->bindValue(':cm_nome', $nome);
				$sql->bindValue(':cm_idRoles', $idRoles);
				$sql->execute();
		
				return true;
		

	}

	/*private function update($id, $id_logado){

		$sql = "INSERT INTO tb_respComentarios(rcom_IdUsr, rcom_idUsrAdmin) VALUES(:rcom_IdUsr, :rcom_idUsrAdmin)";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':rcom_IdUsr', $id);
		$sql->bindValue(':rcom_idUsrAdmin', $id_logado);
		$sql->execute();

			return true;


	}*/


}