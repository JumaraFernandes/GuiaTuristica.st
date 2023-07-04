<?php

if(isset($_POST['submit']))
{
    //echo "está a funcionar";
    //die();
    
     require_once "funcao.php";

     session_start();

    $Telefone= $_POST['telefone']; 
    $Endereco= $_POST['Endereco']; 
    $id = $_SESSION['id'];

    $cvNome = $_FILES['cv']['name'];
    $cvTmp = $_FILES['cv']['tmp_name'];
    $cvExtensao = pathinfo($cvNome, PATHINFO_EXTENSION); // Obtém a extensão do arquivo
    $cv = uniqid() . '.' . $cvExtensao;
    $cvPath = '../cvpdf/' . $cv;
    move_uploaded_file($cvTmp, $cvPath);

    echo 'Caminho: ' . $cvPath;



    atualizarDadosGuia($id, $Endereco, $Telefone,  $cv);
    
    
}
else{
    header("location: ../login.php");
    exit();
}


?>