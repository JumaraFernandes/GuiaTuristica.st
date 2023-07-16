<?php
if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];

    if(empty($nome) || empty($email) || empty($msg)){
        header("location: ../Contacto.php?res=-1");
    } else{
        
        require_once "funcao.php";
         
        SubmeterMsg($nome, $email, $msg);
    }

}
?>
