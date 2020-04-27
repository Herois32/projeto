<?php
/**
 * 
 */
class arquivoController extends controller{
	
	public function dowloand(){

		$arquivo = $_GET['arquivo'];

		$dowloand = new Arquivos();

		$dowloand->dowlandArquivo($arquivo);

	}

}