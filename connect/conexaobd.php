<?php
$servername = "localhost";
$username = "root";
$password = "";
$bd  = "guia";

// Criar uma conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $bd );

// Verificar a conexão
if ($conn->connect_error) {
    echo 'não consegui comunicar';
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}
?>