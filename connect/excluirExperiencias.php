<?php
if (isset($_POST['submit'])) {

    $experienciaID = $_POST['experienciaID'];
   
    
    session_start();
    $id = $_SESSION['id'];
    require_once "funcao.php";


    echo '  Seu ID: ' . $experienciaID;
    
    // Chame a função ExcluirExperiencia com os valores do formulário
    ExcluirExperiencia($experienciaID);
    header("location: ../Forum.php");


}

?>