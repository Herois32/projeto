<?php

/**
 * 
 */
class Arquivos extends model{

	//Inserir no Banco um agendamento (Com envio de arquivo)
	public function uploadArquivo($nome_arquivo, $tamanho_arquivo, $arquivo_temporario, $dataInicio, $dataFim, $horaInicio, $horaFim, $nomeCurso){

				if($this->VerificarAula($dataInicio)){
				
							    if($this->validarExtensao($nome_arquivo)){
							    	if($this->validarTamanho($tamanho_arquivo)){
						
									    $extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //pega a extensao do arquivo
									    $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
									    $diretorio = "arquivos/"; //define o diretorio para onde enviaremos o arquivo
									    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome); //efetua o upload
									    
									   	$sql = "INSERT INTO tb_aulas (al_dataInicio, al_dataFim, al_horaInico, al_horaFim, al_curso, al_arquivos) 
												VALUES(:al_dataInicio, :al_dataFim, :al_horaInico, :al_horaFim, :al_curso, :al_arquivos)";

					





									$sql = $this->db->prepare($sql);
									$sql->bindValue(':al_dataInicio', $dataInicio);
									$sql->bindValue(':al_dataFim', $dataFim);
									$sql->bindValue(':al_horaInico', $horaInicio);
									$sql->bindValue(':al_horaFim', $horaFim);
									$sql->bindValue(':al_curso', $nomeCurso);
									$sql->bindValue(':al_arquivos', $novo_nome);			
									$sql->execute();
						
									if($sql->rowCount() > 0){
										return true;
									}else{
										return false;
									}

									//IF DO VERIFICAR O TAMANHO			
									}else{
									return false;
									}		

					//IF DO VERIFICAR EXTENSÃO
					}else{
					return false;
					}
									

									
			//IF DO VERIFICAR A DATA 
			}else{
				return false;
			}

	}


	private function VerificarAula($dataInicio){


		$sql = "SELECT * FROM tb_aulas WHERE al_dataInicio = :al_dataInicio ";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':al_dataInicio', $dataInicio);
		$sql->execute();

		if($sql->rowCount() == 0){
			return true;
		}else{
			return false;
		}

	}




	private function validarExtensao($nome_arquivo){

		  $ext = strrchr($nome_arquivo, '.');
		  $extensoes_validas = array(".mp4", ".mkv", ".rmvb");
		  $limitar_ext = "sim";
		 

		if ($limitar_ext == "sim" && in_array($ext, $extensoes_validas)){
				return true;
			}else{
				return false;
			}
			
	}

	private function validarTamanho($tamanho_arquivo){
		$limitar_tamanho = "sim";
		$tamanho_bytes = 1024 * 1024 * 1000; //"975097152";

		if (($limitar_tamanho = "sim") && ($tamanho_arquivo < $tamanho_bytes)){
					return true;
				}else{
					return false;
					}		
	}

	private function pegaExtensao($nome_arquivo){
		  $ext = explode('.',$nome_arquivo);
		  $ext = array_reverse($ext);
		  return ".".$ext[0]; 
	}

	private function pegaSomenteNome($nome_arquivo){
		  $nome = pathinfo($nome_arquivo);
		  return $nome['filename'];
	}

	public function geraNomeAleatorio($nome_arquivo){
	  $extensao    = $this->pegaExtensao($nome_arquivo);
	  $somenteNome = $this->pegaSomenteNome($nome_arquivo);
	  $rand	       = rand(0, 99999);
	  //ou
	  //$rand = sha1($somenteNome.time());
	  return $somenteNome.$rand.$extensao;	
	}

	
	
	public function dowlandArquivo($arquivo){
		// Aqui vale qualquer coisa, desde que seja um diretório seguro :)
		define('DIR_DOWNLOAD', 'arquivos/');
		// Vou dividir em passos a criação da variável $arquivo pra ficar mais fácil de entender, mas você pode juntar tudo
		//$arquivo = $_GET['arquivo'];
		// Retira caracteres especiais
		$arquivo = filter_var($arquivo, FILTER_SANITIZE_STRING);
		// Retira qualquer ocorrência de retorno de diretório que possa existir, deixando apenas o nome do arquivo
		$arquivo = basename($arquivo);
		// Aqui a gente só junta o diretório com o nome do arquivo
		$caminho_download = DIR_DOWNLOAD . $arquivo;
		// Verificação da existência do arquivo
		if (!file_exists($caminho_download))
		   die('Arquivo não existe! <a href="https://sofdev.com.br/home">Clique aqui para retorna ao sistema</a>');
		header('Content-type: octet/stream');
		// Indica o nome do arquivo como será "baixado". Você pode modificar e colocar qualquer nome de arquivo
		header('Content-disposition: attachment; filename="'.$arquivo.'";'); 
		// Indica ao navegador qual é o tamanho do arquivo
		header('Content-Length: '.filesize($caminho_download));
		// Busca todo o arquivo e joga o seu conteúdo para que possa ser baixado
		readfile($caminho_download);


	}
	
}