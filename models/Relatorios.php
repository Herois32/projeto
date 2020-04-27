<?php

/**
 * 
 */
class Relatorios extends model{
	

	public function getAcessos($data){

		$sql = "SELECT * FROM tb_usuarios WHERE usr_id_roles = '2' AND date_format(usr_ultimo_acesso, '%m/%Y') = '$data' ";
		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0){

			$sql = $sql->fetchAll();
			return $sql;
		}else{
			return false;
		}
	}


	public function getAcessoAlunos($data){


		$sql = "SELECT usr_nome, usr_ultimo_acesso FROM tb_usuarios WHERE date_format(usr_ultimo_acesso, '%m/%Y') = '$data' ";
		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
			return $array;
		}else{
			return false;
		}
	}

	public function getComentarios($data){


		$sql = "SELECT cm_nome, COUNT(cm_nome) as qtd FROM tb_comentarios 
				WHERE cm_idRoles = '2' AND  date_format(cm_data, '%m/%Y') = '$data' 
				GROUP BY cm_nome ";
		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
			return $array;
		}else{
			return false;
		}
	}	


	public function getComparativo($dataInicial, $dataFinal){

		$sql = "SELECT usr_nome, usr_logado, usr_ultimo_acesso 
				FROM tb_usuarios
				WHERE usr_id_roles = '2' AND date_format(usr_ultimo_acesso, '%m/%Y') 
				BETWEEN '$dataInicial' AND '$dataFinal'
				GROUP BY usr_nome ";

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