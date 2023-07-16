<?php

if(isset($_POST['submit']))
{
    
    
     require_once "funcao.php";

     session_start();

    $link= $_POST['link']; 
    $estrelas= $_POST['estrelas'];  
    $Telefone= $_POST['telefone'];
    $id = $_SESSION['id'];

    $fotoNome = $_FILES['foto']['name'];
    $fotoTmp = $_FILES['foto']['tmp_name'];
    $fotoExtensao = pathinfo($fotoNome, PATHINFO_EXTENSION); // Obtém a extensão do arquivo
    $foto = uniqid() . '.' . $fotoExtensao;
    $fotoPath = '../imagensParceiro/' . $foto;
    move_uploaded_file($fotoTmp, $fotoPath);

    echo 'Caminho: ' . $foto;


    atualizarDadosParceiro($id, $link,$estrelas, $Telefone,  $foto);
   // echo "link: $link";
    //echo "esterelas: $estrelas";
    //echo "foto: $foto";
   // echo "Telefone: $Telefone";
   

    
}
else{
    header("location: ../login.php");
    exit();
}


?>