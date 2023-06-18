<?php

if (isset($_POST['submit'])) {

    if(isset($_POST['email'])){

        $email=$_POST['email'];
        require_once "funcao.php";

        echo 'Email: '.$email."<br>";
        
        // Inclua aqui o código da função verificarEmailExistente que você mencionou
        
        // Chama a função verificarEmailExistente
        if (verificarEmailExistente($email)) {
          echo "O email existe na base de dados.";
        } else {
          echo "O email não existe na base de dados.";
        }
    } else{

    }
  

}

if (isset($_POST['salvar'])) {

    if(isset($_POST['new-password'])){

        $pass=$_POST['new-password'];
        $email=$_POST['email'];
        require_once "funcao.php";

        echo 'Passowrd: -'.$pass."-<br>";
        
        // Inclua aqui o código da função verificarEmailExistente que você mencionou
        
        // Chama a função verificarEmailExistente
        if (AtualizarSenha($email, $pass)) {
          echo "O email existe na base de dados.";
        } else {
          echo "O email não existe na base de dados.";
        }
    } else{

    }
  

}

?>
