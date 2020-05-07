<?php

/**
 * 
 */
class psckttransparenteController extends controller{
	

	public function index(){

		//$store = new Store();
		//$products = new Products();

		//$dados = $store->getTemplateData();

		try{

			$sessionCode = \PagSeguro\Services\Session::create(
				\PagSeguro\Configuration\Configure::getAccountCredentials()
			);

			$dados['sessionCode'] = $sessionCode->getResult();

		}catch(Exception $e){
			echo "ERRO: ".$e->getMessage();
			exit;
		}


		$this->loadTemplate('cart_psckttransparente', $dados);

	}

	public function checkout(){

		$dados = array();

		$cadUsr = new Usuarios();

		$pag = new Purchases();

		$id = addslashes($_POST['id']);
		$name = addslashes($_POST['name']);
		$cpf = addslashes($_POST['cpf']);
		$email = addslashes($_POST['email']);
		$senha = addslashes($_POST['senha']);
		$cartao_titular = addslashes($_POST['cartao_titular']);
		$cartao_cpf = addslashes($_POST['cartao_cpf']);
		$numero = addslashes($_POST['numero']);
		$cvv = addslashes($_POST['cvv']);
		$v_mes = addslashes($_POST['v_mes']);
		$v_ano = addslashes($_POST['v_ano']);
		$cartao_token = addslashes($_POST['cartao_token']);
		$parc = explode(';', $_POST['parc']);
		$valor_curso = addslashes($_POST['valor_curso']);

		$data_registro = date('Y-m-d');
		$sexo = "M";
		$telefone = "71993565581";
		$status = "Desativado";
		$idRoles = 2;
		$logado = 1;
		$Acesso = date('Y-m-d H:i:s');
		$ip = 1;
		$qtd = 50;
		$hora = date('H:i:s');
		$curso = "Lente de contato";

		$uid = $cadUsr->cadastrarUsuarios($name, $cpf, $email, $senha, $data_registro, $sexo, $telefone, $status, $idRoles, $logado, $Acesso, $ip, $hora);
		
		$pag->addpurchases($uid, $qtd, 'psckttransparente');

		global $config;

		$creditCard = new \PagSeguro\Domains\Requests\DirectPayment\CreditCard();

		$creditCard->setReceiverEmail($config['pagseguro_seller']);

		$creditCard->setReference($uid);

		$creditCard->setCurrency("BRL");

		//$creditCard->addItems()->withParameters($uid, $curso, intval($qtd), floatval($valor_curso));
		$creditCard->addItems()->addItem('0001', 'Lente de contato', 2, floatval($valor_curso));
		//$creditCard->addItems()->addItem('0001', 'Lente de contato', 2, floatval($valor_curso));

		$creditCard->setSender()->setName($name);
		$creditCard->setSender()->setEmail($email);
		$creditCard->setSender()->setDocument()->withParameters('CPF', $cpf);

			$ddd = substr($telefone, 0, 2);
			$telefone = substr($telefone, 2);

		$creditCard->setSender()->setPhone()->withParameters($ddd, $telefone);

		$creditCard->setSender()->setHash($id);
		$creditCard->setSender()->setIp($_SERVER['REMOTE_ADDR']);

		//Endereço de correspondencia 
		$creditCard->setShipping()->setAddress()->withParameters(

            '01452002',
            'Av. Brig. Faria Lima',
            '1384',
            'apto. 114',
            'Jardim Paulistano',
            'São Paulo',
            'SP',
            'BRA'

			);


		//Endereço de entrega 
		$creditCard->setBilling()->setAddress()->withParameters(

            'João Comprador',
            'email@comprador.com.br',
            '11',
            '56273440',
            'CPF',
            '156.009.442-76'
			);

		$creditCard->setToken($cartao_token);
		$creditCard->setInstallment()->withParameters($parc[0], $parc[1]);
		$creditCard->setHolder()->setName($cartao_titular);
		$creditCard->setHolder()->setDocument()->withParameters('CPF', $cartao_cpf);

		$creditCard->setMode('DEFAULT');
		try{
			$result = $creditCard->register(

				\PagSeguro\Configuration\Configure::getAccountCredentials()
			);

			//print_r($creditCard);
			echo json_encode($result);
			exit;

		}catch(Exception $e){
			echo json_encode(array('error'=>true, 'msg'=>$e->getMessage()));
			exit;
		}			



	}


}