<?php
if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];

    require_once "funcao.php";

    SubmeterMsg($nome, $email, $msg);
}
?>
