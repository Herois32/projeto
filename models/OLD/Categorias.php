<?php
class Categorias extends model {

	public function getLista() {
		$array = array();

		$sql = "SELECT * FROM tb_categoria";
		$sql = $this->db->query($sql);
		$sql->execute();
		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function addCategorias($nome_categoria){

		$sql = "INSERT INTO tb_categoria(cg_categoria) VALUES(:cg_categoria)";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':cg_categoria', $nome_categoria);
		$sql->execute();

		if($sql->rowCount() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function selecCategoria(){

		$array = array();

		$sql = "SELECT * FROM tb_categoria ORDER BY cg_categoria ASC";
		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
			return $array;
		}else{
			return false;
		}
	}


	public function delete($id){

		$sql = "DELETE FROM tb_categoria WHERE cg_id = :cg_id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':cg_id', $id);
		$sql->execute();

	}

	

}
