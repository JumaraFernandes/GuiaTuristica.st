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


    $cvNome = $_FILES['cv']['name'];
    $cvTmp = $_FILES['cv']['tmp_name'];
    $cvExtensao = pathinfo($cvNome, PATHINFO_EXTENSION); // Obtém a extensão do arquivo
    $cvPath = '../cvpdf/' . uniqid() . '.' . $cvExtensao;
    move_uploaded_file($cvTmp, $cvPath);


    atualizarDadosGuia($id, $Endereco, $Telefone, $cvPath);
    
}
else{
    header("location: ../login.php");
    exit();
}


?>