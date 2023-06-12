<?php


    
     require_once "funcao.php";

     echo 'entrou';


     $id = $_GET['idReserva'];
     $msg = $_GET['$msg'];
    
    
      // Exemplo de uso da função
      //enviarMsgGuia(456, "Exemplo de mensagem");
     enviarMsgGuia($idReserva, $msg);
    
    header("location: ../PerfilGuia.php");


?>