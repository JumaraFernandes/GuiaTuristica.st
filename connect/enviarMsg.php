<?php
if (isset($_POST['submit'])) {

    $idChat = $_POST['idChat'];
    $msg = $_POST['msg'];
   
    
    session_start();
    $tipo = $_SESSION['tipo'];
    require_once "funcao.php";


    echo '  Seu ID: ' . $idChat. '<br>';
    echo '  Conteudo: ' . $msg . '<br>';
    echo '  Tipo: ' . $tipo . '<br>';

    if($tipo === 'turista'){
        enviarMsg($idChat, $msg, 0);

    } else{
        enviarMsg($idChat, $msg, 1);
    }


    
    

    header("location: ../chat.php?id=".$idChat);




}

?>