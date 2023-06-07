<?php

echo 'entrou na reserva';
if(isset($_POST['submit']))
{
    //echo "está a funcionar";
    //die();
    
    $datainicio=$_POST['datainicio'];
     $datafim=$_POST['datafim'];
    $numeropessoas=$_POST['numeropessoas'];
    $local=$_POST['local'];
     $id_guia=$_POST['Guia'];

     echo 'guia'.$id_guia;



     require_once "funcao.php";

     
    


   
     // Processar os dados do registro de turista
     //adicionarReserva($datainicio, $datafim, $numeropessoas, null,$local, $id_guia, null);

    
    
    
}

?>