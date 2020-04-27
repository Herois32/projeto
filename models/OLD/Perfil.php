<?php

/**
 * 
 */
class Perfil extends model{

	public function Roles(){

		$sql = "SELECT * FROM tb_roles";
		$sql = $this->db->query($sql);
		$sql->execute();

		$array = array();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();	
			return $array;
		}else{
			return false;
		}	
	}
	

}