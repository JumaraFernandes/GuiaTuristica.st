<?php


    
     require_once "funcao.php";

     echo 'entrou';


     $id = $_GET['idReserva'];
     $msg = $_GET['$msg'];
    
    
    // Exemplo de uso da função
     //enviarMsgTurista(456, "Exemplo de mensagem");
     enviarMsgTurista($idReserva, $msg);
    
    header("location: ../PerfilTurista.php");


?>