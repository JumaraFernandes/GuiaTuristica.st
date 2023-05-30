<?php
require_once "conexaobd.php";
require_once "funcao.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$telefone= $_POST['telefone'];


registarAdmin($conn, 'Jumara', 'jumarafernades@gmail.com', 'Jumara.4','960790265');

    header("location: ../login.php");
    exit();
?>