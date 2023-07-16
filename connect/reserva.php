<?php


if(isset($_POST['submit']))
{
    //echo "está a funcionar";
    //die();
    
    $datainicio = $_POST['datainicio'];
    $datafim = $_POST['datafim'];
    $numeropessoas = $_POST['numeropessoas'];
    $local = $_POST['local'];
    $id_guia = $_POST['Guia'];

    if (empty($datainicio) || empty($datafim) || empty($numeropessoas)) {
        // Algumas ou todas as variáveis estão vazias
        header("location: ../Reservas.php?res=-1");
    } else {    
    
        require_once "funcao.php";
    
         
        session_start();
        $id_turista = $_SESSION['id'];
       
        //Processar os dados do registro de turista
        adicionarReserva($datainicio, $datafim, $numeropessoas,$local, $id_guia, $id_turista);
    }



    
    
    
}

?>