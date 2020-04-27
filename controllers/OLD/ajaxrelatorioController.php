<?php

/**
 * Aqui é  a class que vai carregar o relatorio analitico
 */
/**
 * 
 */
class ajaxRelatorioController extends controller{
	

	public function getAnalitico(){


	      	$dados = array();
	      	$relatorios = new Relatorios();

			$data = $_POST['dataMes'];

			$dados['info'] = $relatorios->getRelatoriosAberto($data);
			$dados['infoFechado'] = $relatorios->getRelatoriosFechado($data);
			$dados['infoAndamento'] = $relatorios->getRelatoriosAndamento($data);
			$dados['infoReaberto'] = $relatorios->getRelatoriosReaberto($data);

			//print_r($dados);
	      	$this->loadView('admin/relatorioAnalitico', $dados);

		}		
	

}
