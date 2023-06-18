<?php
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $emailTurista = $_POST['emailTurista'];

    require_once "funcao.php";

    if ($email === $emailTurista) {
        AtualizarEstado($email);
        header("location: ../login.php");
    } else {
        echo "O email fornecido não corresponde ao email do turista.";
        header("location: ../validarperfil.php?email=".$email);
    }
}
?>
