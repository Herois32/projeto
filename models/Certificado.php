<?php

/**
 * 
 */
class Certificado extends model{

	public function dadosUsuario($id){


		$sql = "SELECT al.al_curso, usr.usr_nome, usr.usr_email FROM tb_aulas AS al
				INNER JOIN tb_certificados AS cf ON cf.cf_idAula = al.al_id
				INNER JOIN tb_usuarios AS usr ON usr.usr_id = cf.cf_IdUsr
				WHERE usr.usr_id = '$id'";

		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0){
			$sql = $sql->fetchAll();
			return $sql;
		}else{
			return false;
		}		

	}


}