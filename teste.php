<?php
// conexão com o banco de dados

$servername = "localhost";
$dbusername = "root";
$bdpassword = "";
$dbname = "guiaturistica";

$conn =mysqli_connect($servername, $dbusername, $bdpassword, $dbname);

// Verificar a conexão
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
  }
  
  // Inserir dados na tabela
  $sql = "INSERT INTO utilizador (nome, email, senha, telefone, ativo) VALUES ('João Silva', 'joao.silva@email.com', 'minhasenha', '(11) 1234-5678', true);";
  
  if (mysqli_query($conn, $sql)) {
    echo "Dados inseridos com sucesso!";
  } else {
    echo "Erro ao inserir dados: " . mysqli_error($conn);
  }
  
  // Fechar a conexão
  mysqli_close($conn);
  ?>
