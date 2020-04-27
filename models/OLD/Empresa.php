<?php
/**
 * 
 */
class Empresa extends model{
	
	public function cadastrar($cnpj, $razaoSocial, $endereco, $cidade, $estado, $cep, $telefone, $atividade, $status){

		if($this->verificarEmpresa($cnpj) == true){
				$sql = "INSERT INTO tb_empresas(ep_razao_social, ep_cidadade, ep_cnpj, ep_endereco, ep_estado, ep_cep, ep_telefone, ep_atividade, ep_status)
						VALUES(:ep_razao_social, :ep_cidadade, :ep_cnpj, :ep_endereco, :ep_estado, :ep_cep, :ep_telefone, :ep_atividade, :ep_status)";

				$sql = $this->db->prepare($sql);
				$sql->bindValue(':ep_razao_social', $razaoSocial);
				$sql->bindValue(':ep_cidadade', $cidade);
				$sql->bindValue(':ep_cnpj', $cnpj);
				$sql->bindValue(':ep_endereco', $endereco);
				$sql->bindValue(':ep_estado', $estado);		
				$sql->bindValue(':ep_cep', $cep);
				$sql->bindValue(':ep_telefone', $telefone);
				$sql->bindValue(':ep_atividade', $atividade);
				$sql->bindValue(':ep_status', $status);
				$sql->execute();

				if($sql->rowCount() > 0){
					return true;
				}else{
					return false;
				}
		}else{
			return false;
		}		
	}

	private function verificarEmpresa($cnpj){

		$sql = "SELECT ep_cnpj FROM tb_empresas WHERE ep_cnpj = :ep_cnpj";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':ep_cnpj', $cnpj);
		$sql->execute();

		if($sql->rowCount() == 0){
			return true;
		}else{
			return false;
		}
	}

	public function ListaEmpresas(){

		$sql = "SELECT * FROM tb_empresas";
		$sql = $this->db->query($sql);
		$sql->execute();

		$array = array();

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
			return $array;
		}else{
			return false;
		}
	}

	public function ListaEmpresasId($id){
		$array = array();
		$sql = "SELECT * FROM tb_empresas WHERE ep_id = :ep_id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':ep_id', $id);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetch();
			return $array;
		}else{
			return false;
		}
	}

	public function updateEmpresa($id, $endereco, $cidade, $estado, $cep, $telefone, $atividade, $status){
		$sql = "UPDATE tb_empresas SET ep_cidadade = :ep_cidadade, ep_endereco = :ep_endereco, ep_estado = :ep_estado, ep_cep = :ep_cep, ep_telefone = :ep_telefone, ep_atividade = :ep_atividade, ep_status = :ep_status WHERE ep_id = :ep_id";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':ep_cidadade', $cidade);		
		$sql->bindValue(':ep_endereco', $endereco);
		$sql->bindValue(':ep_estado', $estado);
		$sql->bindValue(':ep_cep', $cep);
		$sql->bindValue(':ep_telefone', $telefone);
		$sql->bindValue(':ep_atividade', $atividade);
		$sql->bindValue(':ep_status', $status);
		$sql->bindValue(':ep_id', $id);
		$sql->execute();
	}

	public function updateDesativar($id, $status){

		$sql = "UPDATE tb_empresas SET ep_status = :ep_status  WHERE ep_id = :ep_id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':ep_status', $status);
		$sql->bindValue(':ep_id', $id);
		$sql->execute();
	}	


}