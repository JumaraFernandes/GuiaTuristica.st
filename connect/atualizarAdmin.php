<?php

if(isset($_POST['submit']))
{
    //echo "está a funcionar";
    //die();
    
     require_once "funcao.php";

     echo 'entrou';

     session_start();

    $telefone= $_POST['telefone']; 
    $id = $_SESSION['id'];

    

    atualizarTelefoneAdmin( $id, $telefone);

}
else{
    header("location: ../login.php");
    exit();
}


?>
