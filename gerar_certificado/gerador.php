<?php
setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' );
date_default_timezone_set( 'America/Sao_Paulo' );
require('fpdf/alphapdf.php');
require('PHPMailer/class.phpmailer.php');


// --------- Variáveis do Formulário ----- //
$email    = $_POST['email'];
$nome     = utf8_decode($_POST['nome']);
$nome_arquivo = rand(1,100);//$_POST['cpf'];

// --------- Variáveis que podem vir de um banco de dados por exemplo ----- //
$empresa  = "Curso do Grupo Conhecermais";
$curso    = $_POST['curso'];
$data     = date('d/m/Y');
$carga_h  = "8 horas";


$texto1 = utf8_decode($empresa);
$texto2 = utf8_decode("Nós certificamos que o aluno devido concluíu de forma completa e agora possui \n habilidade comprovada em ".strtoupper($curso)." e está completamente apto ao exercício \n profissional dos cargos e atividade relacionada a esta habilidade, \n na data ".$data." com carga horária total de ".$carga_h.".");
$texto3 = utf8_decode("Salvador, ".utf8_encode(strftime( '%d de %B de %Y', strtotime( date( 'Y-m-d' ) ) )));


$pdf = new AlphaPDF();

// Orientação Landing Page ///
$pdf->AddPage('L');

$pdf->SetLineWidth(1.5);


// desenha a imagem do certificado
$pdf->Image('certificado.jpg',0,0,295);

// opacidade total
$pdf->SetAlpha(1);

// Mostrar texto no topo
$pdf->SetFont('Arial', '', 15); // Tipo de fonte e tamanho
$pdf->SetXY(109,46); //Parte chata onde tem que ficar ajustando a posição X e Y
$pdf->MultiCell(265, 10, $texto1, '', 'L', 0); // Tamanho width e height e posição

// Mostrar o nome
$pdf->SetFont('Arial', '', 30); // Tipo de fonte e tamanho
$pdf->SetXY(20,86); //Parte chata onde tem que ficar ajustando a posição X e Y
$pdf->MultiCell(265, 10, $nome, '', 'C', 0); // Tamanho width e height e posição

// Mostrar o corpo
$pdf->SetFont('Arial', '', 15); // Tipo de fonte e tamanho
$pdf->SetXY(20,110); //Parte chata onde tem que ficar ajustando a posição X e Y
$pdf->MultiCell(265, 10, $texto2, '', 'C', 0); // Tamanho width e height e posição

// Mostrar a data no final
$pdf->SetFont('Arial', '', 15); // Tipo de fonte e tamanho
$pdf->SetXY(32,172); //Parte chata onde tem que ficar ajustando a posição X e Y
$pdf->MultiCell(165, 10, $texto3, '', 'L', 0); // Tamanho width e height e posição

$pdfdoc = $pdf->Output('', 'S');



// ******** Agora vai enviar o e-mail pro usuário contendo o anexo
// ******** e também mostrar na tela para caso o e-mail não chegar

$subject = 'Seu Certificado do Conhecermais';
$messageBody = "Olá $nome<br><br>É com grande prazer que entregamos o seu certificado.<br>Ele está em anexo nesse e-mail.<br><br>Atenciosamente,<br>Gildemar Souza<br><a href='http://www.lnborges.com.br'>http://www.lnborges.com.br</a>";


$mail = new PHPMailer();
$mail->SetFrom("george.santos@sofdev.com.br", "Certificado");
$mail->Subject    = $subject;
$mail->MsgHTML(utf8_decode($messageBody));
$mail->AddAddress($email); 
$mail->addStringAttachment($pdfdoc, 'certificado.pdf');
$mail->Send();

$certificado="arquivos/$nome_arquivo.pdf"; //atribui a variável $certificado com o caminho e o nome do arquivo que será salvo (vai usar o gerador de string aleatorio para ser o nome do arquivo)
$pdf->Output($certificado,'F'); //Salva o certificado no servidor (verifique se a pasta "arquivos" tem a permissão necessária)

$pdf->Output(); // Mostrar o certificado na tela do navegador

?>
