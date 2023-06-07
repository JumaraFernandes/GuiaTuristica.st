<?php


if(isset($_POST['submit']))
{
    //echo "está a funcionar";
    //die();
    
    $datainicio=$_POST['datainicio'];
     $datafim=$_POST['datafim'];
    $numeropessoas=$_POST['numeropessoas'];
    $local=$_POST['local'];
     $id_guia=$_POST['Guia'];
     $estado=$_POST['$estado'];
     $$id_turista=$_POST['$turista'];

     echo 'entrou na reserva';
     require_once "funcao.php";
   
     // Processar os dados do registro de turista
     adicionarReserva($datainicio, $datafim, $numeropessoas, "pendente",$local, $id_guia, $id_turista);

    
    
    
}

?>