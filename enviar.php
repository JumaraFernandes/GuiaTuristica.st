<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Incluir as classes do PHPMailer
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Configurações do servidor de e-mail SMTP
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.example.com';  // Servidor de e-mail SMTP
$mail->SMTPAuth = true;
$mail->Username = 'seu_email@example.com';  // Seu endereço de e-mail
$mail->Password = 'sua_senha';  // Sua senha de e-mail
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

// Informações do remetente e destinatário
$mail->setFrom('seu_email@example.com', 'Seu Nome');  // Remetente
$mail->addAddress('destinatario@example.com', 'Nome do Destinatário');  // Destinatário

// Configurações do e-mail
$mail->isHTML(true);
$mail->Subject = 'Assunto do E-mail';
$mail->Body = 'Conteúdo do E-mail';

// Enviar o e-mail
try {
    $mail->send();
    echo 'E-mail enviado com sucesso.';
} catch (Exception $e) {
    echo 'Ocorreu um erro ao enviar o e-mail: ' . $mail->ErrorInfo;
}
?>
