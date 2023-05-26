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
        $dataNascimento = $_POST['dataNascimentoturista'];
        $sexo = $_POST['sexo'];

        echo "Nome: " . $nome . "<br>";
        echo "Email: " . $email . "<br>";
        echo "Telefone: " . $telefone . "<br>";
        echo "Senha: " . $senha . "<br>";
        echo "Confirmação de Senha: " . $confsenha . "<br>";
        echo "Tipo: " . $tipo . "<br>";
        echo "Data NAscimento: " . $dataNascimento . "<br>";
        echo "sEXO do Guia: " . $sexo . "<br>";

        // Processar os dados do registro de turista
        registarTurista($conn, $dataNascimento, $sexo, $nome, $email, $telefone, $senha);
        
    
    } elseif ($tipo === 'registoGuia') {
        // Código para o registro de guia
        $numIdentificacao = $_POST['numIdentificacao'];
        $enderecoGuia = $_POST['enderecoGuia'];
        $cv = $_POST['cv'];
        $experiencias = $_POST['experiencias'];
        $sexo = $_POST['sexo'];
        $dataNascimento = $_POST['dataNascimento'];

        $idiomasSelecionados = $_POST['idiomas'];

        // Verifique se foram selecionados idiomas
        if (!empty($idiomasSelecionados)) {
            // Loop pelos idiomas selecionados
            foreach ($idiomasSelecionados as $idioma) {
                // Faça o que precisa ser feito com cada idioma selecionado
                echo "Idioma selecionado: " . $idioma . "<br>";
            }
        } else {
            echo "Nenhum idioma selecionado.";
        }


        echo "Número de Identificação: " . $numIdentificacao . "<br>";
        echo "Endereço do Guia: " . $enderecoGuia . "<br>";
        echo "Currículo: " . $cv . "<br>";
        echo "Experiências: " . $experiencias . "<br>";
        echo "Sexo: " . $sexo . "<br>";
        echo "Data de Nascimento: " . $dataNascimento . "<br>";
        echo "Nome: " . $nome . "<br>";
        echo "Email: " . $email . "<br>";
        echo "Telefone: " . $telefone . "<br>";
        echo "Senha: " . $senha . "<br>";
        echo "Confirmação de Senha: " . $confsenha . "<br>";
        echo "Tipo: " . $tipo . "<br>";


        // Processar os dados do registro de guia
        registarGuia($conn, $numIdentificacao, $sexo, $experiencias,$enderecoGuia, NULL, $dataNascimento, $nome, $email, $telefone, $senha, $idiomasSelecionados);
       // registarGuia($conn, 333, "feminino", "asddd", 12299, "rua largo", "não tenho", 1999-12-04, "jumara", "jumarafernandes", 960102873, "1234", "1234", "rua largo");
     } elseif ($tipo === 'registoParceiro') {
        // Código para o registro de parceiro
        $enderecoParceiro = $_POST['enderecoParceiro'];
        $link = $_POST['link'];
        $classificacao = $_POST['rate'];
        $tipoParceiro = $_POST['tipoParceiro'];
        $foto = $_POST['foto'];

        echo "Endereço do Parceiro: " . $enderecoParceiro . "<br>";
        echo "Link: " . $link . "<br>";
        echo "Classificação: " . $classificacao . "<br>";
        echo "Tipo de Parceiro: " . $tipoParceiro . "<br>";
        echo "Foto: " . $foto . "<br>";

        echo "Nome: " . $nome . "<br>";
        echo "Email: " . $email . "<br>";
        echo "Telefone: " . $telefone . "<br>";
        echo "Senha: " . $senha . "<br>";
        echo "Confirmação de Senha: " . $confsenha . "<br>";
        echo "Tipo: " . $tipo . "<br>";

        // Processar os dados do registro de parceiro
        registarParceiro($conn, $tipoParceiro, $enderecoParceiro, $classificacao, $link, $foto, $nome, $email, $telefone, $senha);

    } elseif ($tipo === 'registoParceiro') {
        // Código para o registro de parceiro
        $enderecoParceiro = $_POST['enderecoParceiro'];
        $link = $_POST['link'];
        $classificacao = $_POST['rate'];
        $tipoParceiro = $_POST['tipoParceiro'];
        $foto = $_POST['foto'];

        echo "Nome: " . $nome . "<br>";
        echo "Email: " . $email . "<br>";
        echo "Telefone: " . $telefone . "<br>";
        echo "Senha: " . $senha . "<br>";
        echo "Confirmação de Senha: " . $confsenha . "<br>";
        echo "Tipo: " . $tipo . "<br>";

        // Processar os dados do registro de parceiro
        //registarParceiro($conn, $tipoParceiro, $enderecoParceiro, $classificacao, $link, $foto, $nome, $email, $telefone, $senha);

    }
    else {
        // Tipo de registro inválido ou não especificado
        echo "Tipo de registro inválido";
        exit();
    }

    echo "Está funcionando: " . $tipo; 

    //registarAdmin($conn, 'Jumara', 'a43691@ipb.pt', 'Jumara.4');


} else {
    header("location: ../registar.php");
    exit();
}
?>
