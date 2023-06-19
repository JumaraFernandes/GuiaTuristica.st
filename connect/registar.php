<?php

require_once "funcao.php";

if (isset($_POST['submit'])) {
     $nome = $_POST['nome'];
    $email = $_POST['email'];
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
        echo "Senha: " . $senha . "<br>";
        echo "Confirmação de Senha: " . $confsenha . "<br>";
        echo "Tipo: " . $tipo . "<br>";
        echo "Data NAscimento: " . $dataNascimento . "<br>";
        echo "sEXO do Turista: " . $sexo . "<br>";

        // Processar os dados do registro de turista
        registarTurista($dataNascimento, $sexo, $nome, $email, $senha); 

    } elseif ($tipo === 'registoGuia') {
        // Código para o registro de 
        $telefone = $_POST['telefoneguia'];
        $numIdentificacao = $_POST['numIdentificacao'];
        $enderecoGuia = $_POST['enderecoGuia'];
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
    
        $cvNome = $_FILES['cv']['name'];
        $cvTmp = $_FILES['cv']['tmp_name'];
        $cvExtensao = pathinfo($cvNome, PATHINFO_EXTENSION); // Obtém a extensão do arquivo
        $cvPath = '../cvpdf/' . uniqid() . '.' . $cvExtensao;
        move_uploaded_file($cvTmp, $cvPath);

        $fotoNome = $_FILES['fotoGuia']['name'];
        $fotoTmp = $_FILES['fotoGuia']['tmp_name'];
        $fotoExtensao = pathinfo($fotoNome, PATHINFO_EXTENSION); // Obtém a extensão do arquivo
        $fotoPath = '../imagensguias/' . uniqid() . '.' . $fotoExtensao;
        move_uploaded_file($fotoTmp, $fotoPath);
        

        echo "Número de Identificação: " . $numIdentificacao . "<br>";
        echo "Endereço do Guia: " . $enderecoGuia . "<br>";
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
        registarGuia($numIdentificacao, $sexo, $experiencias, $enderecoGuia, $cvPath, $dataNascimento, $fotoPath, $nome, $email, $telefone, $senha, $idiomasSelecionados);
    }
    
     elseif ($tipo === 'registoParceiro') {
        // Código para o registro de parceiro
        $telefone = $_POST['telefoneparceiro'];
        $enderecoParceiro = $_POST['enderecoParceiro'];
        $link = $_POST['link'];
        $classificacao = $_POST['rate'];
        $tipoParceiro = $_POST['tipoParceiro'];
       

        $fotoNome = $_FILES['fotoparceiro']['name'];
        $fotoTmp = $_FILES['fotoparceiro']['tmp_name'];
        $fotoExtensao = pathinfo($fotoNome, PATHINFO_EXTENSION); // Obtém a extensão do arquivo
        $fotoPath = '../imagensParceiro/' . uniqid() . '.' . $fotoExtensao;
        move_uploaded_file($fotoTmp, $fotoPath);

        echo "Endereço do Parceiro: " . $enderecoParceiro . "<br>";
        echo "Link: " . $link . "<br>";
        echo "Classificação: " . $classificacao . "<br>";
        echo "Tipo de Parceiro: " . $tipoParceiro . "<br>";
       

        echo "Nome: " . $nome . "<br>";
        echo "Email: " . $email . "<br>";
        echo "Telefone: " . $telefone . "<br>";
        echo "Senha: " . $senha . "<br>";
        echo "Confirmação de Senha: " . $confsenha . "<br>";
        echo "Tipo: " . $tipo . "<br>";

        // Processar os dados do registro de parceiro
        registarParceiro($tipoParceiro, $enderecoParceiro, $classificacao, $link, $fotoPath, $telefone, $nome, $email, $senha);

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
