<?php

if(isset($_POST['submit']))
{
    
    
     require_once "funcao.php";

     session_start();

    $link= $_POST['link']; 
    $estrelas= $_POST['estrelas']; 
    $foto= $_POST['foto']; 
    $Telefone= $_POST['telefone'];
    $id = $_SESSION['id'];



    atualizarDadosParceiro($id, $link,$estrelas, $Telefone,  $foto);
    
}
else{
    header("location: ../login.php");
    exit();
}


?>