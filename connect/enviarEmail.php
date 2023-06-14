<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $email = $_POST["email"];
  $mensagem = $_POST["mensagem"];

  $destinatario = "guiaturistica.st@gmail.com";
  $assunto = "Contato do formulário de contato";
  $corpo = "Nome: " . $nome . "\n"
          . "Email: " . $email . "\n"
          . "Mensagem: " . $mensagem;

  if (mail($destinatario, $assunto, $corpo)) {
    echo "Obrigado pelo seu contato! O e-mail foi enviado com sucesso.";
  } else {
    echo "Desculpe, ocorreu um erro ao enviar o e-mail. Por favor, tente novamente.";
  }
}
?>
