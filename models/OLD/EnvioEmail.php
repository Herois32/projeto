<?php
/**
 * 
 */
class EnvioEmail extends model{

   // Metodo para enviar pro E-mail a nova senha do usuario
	public function enviarEmailRecuperar($email, $nova_senha){

	// emails para quem será enviado o formulário
	  //$emailenviar = "george_diu@hotmail.com";
	  	$destino = $email;
	  	//$destino .= "george_diu@hotmail.com";
	  	$assunto = "Email - RECUPERAÇÃO DE SENHA"; //$titulo;
	
		//$assunto_codificado = '=?UTF-8?B?'.base64_encode($assunto).'?=';
		$assunto_codificado = sprintf('=?%s?%s?%s?=', 'UTF-8', 'Q', quoted_printable_encode($assunto));
  // É necessário indicar que o formato do e-mail é html
  	  $headers   = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
      $headers .= "X-Mailer: PHP/" . phpversion();
      $headers .= 'From:'.$assunto_codificado;
      $corpo   .= "Você solicitou uma nova senha de acesso ao sistema de Help Desk.<br/> Sua nova senha: ".$nova_senha."<br/>
      			<strong>É recomendado que ao acessar o sistema trocar a senha no Menu MEU PERFIL.</strong>";
  	  //$headers .= "Bcc: $EmailPadrao\r\n";

 
	  $enviaremail = mail($destino, $assunto_codificado, $corpo, $headers);
	  if($enviaremail){
	 return true;
	   }else{
	 	return false;
	  }



 	}

 	//Metodo para enviar pro E-mail quando for aberto um chamado novo
 	public function enviarEmailChamado($titulo, $email, $mensagem, $maior_id){
 		date_default_timezone_set('America/Sao_Paulo');
	// emails para quem será enviado o formulário

 		$dataAbertura = date('d/m/Y');
	  	//$destino = "idelvan.isidorio@hotmail.com";//$email;
	  	$destino = "george_diu@hotmail.com, idelvan.isidorio@hotmail.com";
	  	$assunto = $titulo; //$titulo;

		$assunto_codificado = sprintf('=?%s?%s?%s?=', 'UTF-8', 'Q', quoted_printable_encode($assunto));

		$mensagem_completa = "<p> CHAMADO FOI ABERTO TICKET <strong> ".$maior_id."</strong></p>
						      <strong>Status:</strong> Novo</br></br>
						      <strong>Requerente:</strong> Técnico</br></br>
						      <strong>Data de abertura:</strong> ".$dataAbertura."</br></br>
						      <strong>Descrição:</strong> ".$mensagem."";



	  // É necessário indicar que o formato do e-mail é html
	  	  $headers   = 'MIME-Version: 1.0' . "\r\n";
	      $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
	      $headers .= "X-Mailer: PHP/" . phpversion();
	      $headers .= 'From:'.$assunto_codificado.'<$email>';
	      $corpo   .= $mensagem_completa;
  	 //$headers .= "Bcc: $EmailPadrao\r\n";
   
	  $enviaremail = mail($destino, $assunto_codificado, $corpo, $headers);
	  if($enviaremail){
	 return true;
	   }else{
	 	return false;
	  }



 	}	
	

}
