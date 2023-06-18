<?php

if (isset($_POST['submit'])) {

    
      $email = $_POST['email'];
       require_once "funcao.php";

      echo 'Email: '.$email."<br>";
    
    // Inclua aqui o código da função verificarEmailExistente que você mencionou
    
    // Chama a função verificarEmailExistente
    if (verificarEmailExistente($email)) {
      echo "O email existe na base de dados.";
    } else {
      echo "O email não existe na base de dados.";
    }
  

}

?>
