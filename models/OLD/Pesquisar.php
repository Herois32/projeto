<?php
/**
 * 
 */
class Pesquisar extends model{
	
	public function search($pesquisa, $id){
		$array = array();

		if($_SESSION['cIdRoles'] == 1){
		
				$sql = "SELECT ch.ch_id, ch.ch_categoria, ch.ch_data_abertura, ch.ch_data_fechamento, ch.ch_status, 
							   usr.usr_nome, ep.ep_razao_social
						FROM tb_chamados AS ch 
						INNER JOIN tb_usuarios AS usr ON ch.ch_idNome = usr.usr_id
						INNER JOIN tb_empresas AS ep ON ep.ep_id = ch.ch_idEmpresa 
						WHERE ch.ch_categoria LIKE '%$pesquisa%' ";
		$sql = $this->db->query($sql);

	   }else if($_SESSION['cIdRoles'] == 2){

				$sql = "SELECT ch.ch_id, ch.ch_categoria, ch.ch_data_abertura, ch.ch_data_fechamento, ch.ch_status, 
							   usr.usr_nome, ep.ep_razao_social
						FROM tb_chamados AS ch 
						INNER JOIN tb_usuarios AS usr ON ch.ch_idNome = usr.usr_id
						INNER JOIN tb_empresas AS ep ON ep.ep_id = ch.ch_idEmpresa 
						WHERE (ch.ch_categoria LIKE '%$pesquisa%') AND usr.usr_id = :usr_id ";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":usr_id", $id);
		
							   	
	   }

		$sql->execute();

		if($sql->rowCount() > 0){
		$array = $sql->fetchAll();
			return $array;
		}else{
			return false;
		}	
	}

}