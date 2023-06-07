<?php

if(isset($_POST['submit']))
{
    //echo "está a funcionar";
    //die();
    
     require_once "funcao.php";

     session_start();

    $Telefone= $_POST['telefone']; 
    $Endereco= $_POST['Endereco']; 
    $Cv= $_POST['cv']; 
    $id = $_SESSION['id'];



    atualizarDadosGuia($id, $Endereco, $Telefone,  $Cv);
    
}
else{
    header("location: ../login.php");
    exit();
}


?>