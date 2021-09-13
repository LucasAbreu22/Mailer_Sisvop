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

$SERVICO = $_POST['SERVICO'];
$FANTASIA = $_POST['FANTASIA'];
$EMAIL = $_POST['EMAIL'];
$NOME = $_POST['NOME'];

$mail = new PHPMailer;

$mail->SMTPDebug = 0;

$mail->isSMTP();
$mail->CharSet = "UTF-8";
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->setLanguage('pt_br', '/optional/path/to/language/directory/');
$mail->Username = 'inovatecemails@gmail.com';
$mail->Password = 'Honra2017';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('inovatecemails@gmail.com.com', 'Emails SS Inovatec');
$mail->addAddress($EMAIL);

$mail->isHTML(true);

$mail->Subject = "Orçamento do cliente $FANTASIA para avaliação";
$mail->Body    = "Olá $NOME!<br> 
                Já está disponível a avaliação do orçamento para o 
                serviço de <b>$SERVICO</b> do cliente <b>$FANTASIA</b> 
                na aba de <b>projetos</b> para avaliação!";

if (!$mail->send()) {
    print_r('Mensagem não enviada!');
} else {
    print_r('Mensagem enviada com sucesso!');
}