<?php
require_once "conexaobd.php";
require_once "funcao.php";

if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];
    $confsenha = $_POST['confsenha'];
    $tipo = $_POST['tipo'];

    echo 'tipo: '.$tipo;

    if ($tipo === 'registoTurista') {
        // Código para o registro de turista
        $dataNascimento = $_POST['dataNascimento'];
        $sexo = $_POST['sexo'];

        // Processar os dados do registro de turista
        registarTurista($conn, $dataNascimento, $sexo, $nome, $email, $telefone, $senha);
        
    
    } elseif ($tipo === 'registoGuia') {
        // Código para o registro de guia
        $numIdentificacao = $_POST['numIdentificacao'];
        $enderecoGuia = $_POST['enderecoGuia'];
        $cv = $_POST['cv'];
        $experiencias = $_POST['experiencias'];
        $idiomas = $_POST['idiomas'];
        $sexo = $_POST['sexo'];
        $dataNascimento = $_POST['dataNascimento'];

        // Processar os dados do registro de guia
        registarGuia($conn, $numIdentificacao, $sexo, $experiencias,$enderecoGuia, $cv, $dataNascimento, $nome, $email, $telefone, $senha);
       // registarGuia($conn, 333, "feminino", "asddd", 12299, "rua largo", "não tenho", 1999-12-04, "jumara", "jumarafernandes", 960102873, "1234", "1234", "rua largo");
     } elseif ($tipo === 'registoParceiro') {
        // Código para o registro de parceiro
        $enderecoParceiro = $_POST['enderecoParceiro'];
        $link = $_POST['link'];
        $classificacao = $_POST['rate'];
        $tipoParceiro = $_POST['tipoParceiro'];
        $foto = $_POST['foto'];

        // Processar os dados do registro de parceiro
        registarParceiro($conn, $tipoParceiro, $enderecoParceiro, $classificacao, $link, $foto, $nome, $email, $telefone, $senha);

    } else {
        // Tipo de registro inválido ou não especificado
        echo "Tipo de registro inválido";
        exit();
    }

    echo "Está funcionando: " . $tipo;

} else {
    header("location: ../registar.php");
    exit();
}
?>
