<?php

header('Access-Control-Allow-Origin: *');
// Permitted types of request
header('Access-Control-Allow-Methods: POST, OPTIONS');

// Describe custom headers
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Range, Content-Disposition, Content-Type');

// A comma-separated list of domains
// header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);

// Allow cookie
header('Access-Control-Allow-Credentials: true');


require 'PHPMailerAutoload.php';

$ID_VENDEDOR = $_POST['ID_VENDEDOR'];
$VALOR_MINIMO = $_POST['VALOR_MINIMO'];
$VALOR_INTERCESSAO = $_POST['VALOR_INTERCESSAO'];
$VALOR_MAXIMO = $_POST['VALOR_MAXIMO'];
$SERVICO = $_POST['SERVICO'];
$FANTASIA = $_POST['FANTASIA'];
$EMAIL = $_POST['EMAIL'];

$mail = new PHPMailer;

$mail->SMTPDebug = 0;

$mail->isSMTP();
$mail->CharSet = "UTF-8";
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->setLanguage('pt_br', '/optional/path/to/language/directory/');
$mail->Username = 'yourmail@gmail.com';
$mail->Password = 'password';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('yourmail@gmail.com.com', 'Emails SS Inovatec');
$mail->addAddress($EMAIL);

$mail->isHTML(true);

$mail->Subject = "Serviço de $SERVICO do cliente $FANTASIA";
$mail->Body    = "Serviço de <b>$SERVICO</b> do cliente <b>$FANTASIA</b>. 
                <br>Segue abaixo a tabela de orçamentos para venda do serviço:
                <br>Valor Mínimo: <b>R$ $VALOR_MINIMO </b> | Comissão de: <b>1.5%</b>
                <br>Valor de Intercessão: <b>R$ $VALOR_INTERCESSAO</b> | Comissão de: <b>2%</b>
                <br>Valor Máximo: <b>R$ $VALOR_MAXIMO</b> | Comissão de: <b>2.5%</b> ";

if (!$mail->send()) {
    print_r('Mensagem não enviada!');
} else {
    print_r('Mensagem enviada com sucesso!');
}