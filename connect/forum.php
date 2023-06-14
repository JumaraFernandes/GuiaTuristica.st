<?php
if (isset($_POST['submit'])) {

    $titulo = $_POST['titulo'];
    $conteudo = $_POST['conteudo'];
    
    session_start();
    $id = $_SESSION['id'];

    require_once "funcao.php";
    
    echo 'Seu id ' .$id . "<br> Titulo: " . $titulo . "<br> Conteudo: " .$conteudo;
    // Chame a função InserirExperiencia com os valores do formulário
    InserirExperiencia($id, $titulo, $conteudo);
    header("location: ../Forum.php");


}
?>
