<?php

function emptyInputRegisto($nome, $email, $username, $passe, $repasse)
{
    $result=true;
    if(empty($nome) or empty($email) or empty($username) or empty($passe) or empty($repasse))
    {
        $result=false;
    }
    return $result;
}

function emptyInputLogin($nome,$passe)
{
    $result=true;
    if(empty($nome) or empty($passe) )
    {
        $result=false;
    }
    return $result;
}

function invalidusername($username)
{
    $result=false;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username))
    {
        $result=true;
    }
    return $result;
}

function vemail($email)
{
    $resulte=false;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $resulte=true;
    }
    return $resulte;
}

function vepass($passe,$repasse)
{
    $resulte=false;
    if ($passe==$repasse)
    {
        $resulte=true;
    }
    return $resulte;
}


function login($conn, $email, $senha)
{
    echo 'chamou-me';
    $query_select = "SELECT * FROM utilizador WHERE email = ?";
    $stmt = mysqli_stmt_init($conn);
    
    if (!mysqli_stmt_prepare($stmt, $query_select)) {
        echo "Ocorreu um erro na preparação da consulta.";
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $resultdata = mysqli_stmt_get_result($stmt);
    
    if ($row = mysqli_fetch_assoc($resultdata)) {
        $hashedPassword = $row['senha'];
        if (password_verify($senha, $hashedPassword)) {
            // Autenticação bem-sucedida
            session_start();
            $_SESSION['email'] = $row['email'];
            $_SESSION['nome'] = $row['nome'];
            $_SESSION['id'] = $row['id'];
            
            echo 'logado!!!';
            // Exemplo de uso:
            $idUtilizador = $row['id']; // ID do utilizador a ser verificado
            echo 'ID do user: '. $idUtilizador . '<br>';
            $tipoUtilizador = getTipoUtilizador($conn, $idUtilizador);
            echo "Tipo de utilizador: " . $tipoUtilizador;
            $_SESSION['tipo'] = $tipoUtilizador;




            if($tipoUtilizador === 'guia'){
                header ("location: ../PerfilGuia.php");
            } else if($tipoUtilizador === 'parceiro'){
                header ("location: ../PerfilParceiro.php");
            } else if($tipoUtilizador === 'turista'){
                header ("location: ../PerfilTurista.php");
            } else if($tipoUtilizador === 'admin'){
                header ("location: ../PerfilAdmin.php");
            }

        } else {
            echo "Credenciais inválidas. Senha incorreta.";
            echo 'Senha: '.$senha . "<br>";
            echo 'Encriptada: '.$hashedPassword . "<br>";
            echo 'Encriptada: '. password_verify($senha, $hashedPassword) . "<br>";
            var_dump(password_verify($senha, $hashedPassword));

        }
    } else {
        echo "Credenciais inválidas. Email não encontrado.";
    }
    echo 'FIM';
    
    mysqli_stmt_close($stmt);
}






function registarGuia($conn, $numIdentificacao, $sexo, $experiencia,$enderecoGuia, $cv, $dataNascimento, $nome, $email, $telefone, $senha, $idiomas)
{
    $hashedSenha = password_hash($senha, PASSWORD_DEFAULT);
    echo 'Senha: '.$senha. '<br>';
    echo 'Encriptada: '.$hashedSenha.'<br>';
    echo 'Comparar: '.password_verify($senha, $hashedSenha) . '<br>';
    $query = "CALL RegistrarGuia(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssssssssss", $numIdentificacao, $sexo, $experiencia, $enderecoGuia, $cv, $dataNascimento, $telefone,$nome, $email, $hashedSenha);
    mysqli_stmt_execute($stmt);

    // Verifique se o guia foi registrado com sucesso
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Guia registrado com sucesso!";
        
        // Insira os idiomas selecionados
        if (!empty($idiomas)) {
            foreach ($idiomas as $idioma) {
                $queryIdioma = "CALL adicionarIdioma(?, ?)";
                $stmtIdioma = mysqli_prepare($conn, $queryIdioma);
                mysqli_stmt_bind_param($stmtIdioma, "ss", $email, $idioma);
                mysqli_stmt_execute($stmtIdioma);
                mysqli_stmt_close($stmtIdioma);

            }
            
            echo "Idiomas adicionados com sucesso!";
        } else {
            echo "Nenhum idioma selecionado.";
        }
    } else {
        echo "Erro ao registrar o guia.";
    }

    // Feche o statement
    mysqli_stmt_close($stmt);
} 



function registarTurista($conn, $dataNascimento, $sexo, $nome, $email, $senha)
{
    $hashedSenha = password_hash($senha, PASSWORD_DEFAULT);
    echo 'Senha: '.$senha . '<br>';
    echo 'Encriptada: ' .$hashedSenha . '<br>';
    echo 'Comparar: '.password_verify($senha, $hashedSenha) . '<br>';
    $query = "CALL RegistrarTurista(?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssss", $dataNascimento, $sexo, $nome, $email, $hashedSenha);
    mysqli_stmt_execute($stmt);

    // Verifique se a consulta foi executada com sucesso
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Turista registrado com sucesso!";
    } else {
        echo "Erro ao registrar o turista.";
    }

    // Feche o statement
    mysqli_stmt_close($stmt);
}

function registarParceiro($conn, $tipo, $endereco, $estrelas, $link, $foto, $nome, $email, $telefone, $senha)
{
    $hashedSenha = password_hash($senha, PASSWORD_DEFAULT);
    $query = "CALL RegistrarParceiro(?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssssssss", $tipo, $endereco, $estrelas, $link, $telefone, $nome, $email, $hashedSenha, $foto);
    mysqli_stmt_execute($stmt);
    // Verifique se a consulta foi executada com sucesso
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Parceiro registrado com sucesso!";
    } else {
        echo "Erro ao registrar o parceiro.";
    }
    mysqli_stmt_close($stmt);
}

function getTipoUtilizador($conn, $idUtilizador) {
    // Verificar se é um guia
    $query = "SELECT id FROM guia WHERE id_utilizador = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $idUtilizador);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    if (mysqli_stmt_num_rows($stmt) > 0) {
        mysqli_stmt_close($stmt);
        return "guia";
    }

    // Verificar se é um parceiro
    $query = "SELECT id FROM parceiro WHERE id_utilizador = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $idUtilizador);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    if (mysqli_stmt_num_rows($stmt) > 0) {
        mysqli_stmt_close($stmt);
        return "parceiro";
    }

    // Verificar se é um turista
    $query = "SELECT id FROM turista WHERE id_utilizador = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $idUtilizador);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    if (mysqli_stmt_num_rows($stmt) > 0) {
        mysqli_stmt_close($stmt);
        return "turista";
    }

    // Verificar se é um administrador
    $query = "SELECT id FROM Administrador WHERE id_utilizador = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $idUtilizador);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    if (mysqli_stmt_num_rows($stmt) > 0) {
        mysqli_stmt_close($stmt);
        return "admin";
    }

    // Caso nenhum tipo seja encontrado
    mysqli_stmt_close($stmt);
    return "Tipo de utilizador desconhecido";
}

function registarAdmin($conn, $nome, $email, $senha,$telefone)
{
    echo 'Registar Admin'.'<br>';
    $hashedSenha = password_hash($senha, PASSWORD_DEFAULT);
    echo 'Encriptada: ' .$hashedSenha;
    $query = "CALL RegistarAdmin(?, ?, ?,?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssss",$telefone, $nome, $email, $hashedSenha);
    mysqli_stmt_execute($stmt);
    
    // Verifique se o administrador foi registrado com sucesso
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Administrador registrado com sucesso!";
    } else {
        echo "Erro ao registrar o administrador.";
    }
    
    // Feche o statement
    mysqli_stmt_close($stmt);
}


function validarConta($conn, $emissor, $receptor, $message, )
{
    
    // Cabeçalhos do e-mail
    $headers = 'From: jumaraandrade4@gmail.com' . "\r\n" .
               'Reply-To: jumarafernandes25@gmail.com' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();
    
    // Enviar o e-mail
    $mailSent = mail($emissor, $receptor, $message, $headers);
    
    // Verificar se o e-mail foi enviado com sucesso
    if ($mailSent) {
        echo 'E-mail enviado com sucesso.';
    } else {
        echo 'Ocorreu um erro ao enviar o e-mail.';
    }

}


 
    function PesquisarAdmin($conn, $emailP) {
        // Chama o procedimento armazenado
        $sql = "CALL PesquisarAdmin('$emailP')";
        $result = $conn->query($sql);
    
        // Verifica se a chamada foi bem-sucedida e obtém os dados
        if ($result) {
            $row = $result->fetch_assoc();
            
            // Armazena os dados do administrador em um array
            $perfilUsuario = array(
                'ID' => $row['id'],
                'Nome' => $row['nome'],
                'Email' => $row['email'],
                'Telefone' => $row['telefone']
            );
            
            // Fecha o resultado da consulta
            $result->close();
        } else {
            echo "Erro ao chamar o procedimento armazenado: " . $conn->error;
            // Retorna null ou uma mensagem de erro, dependendo do que for mais adequado para o seu caso
            return null;
        }
    
        // Fecha a conexão com o banco de dados
        $conn->close();
    
        // Retorna o perfil do usuário
        return $perfilUsuario;
    }

    function atualizarTelefoneAdmin($conn, $adminID, $novoTelefone) {
        // Prepara a chamada do procedimento armazenado
        $sql = "CALL AtualizarTelefoneAdmin($adminID, '$novoTelefone')";

        // Executa a chamada do procedimento armazenado
        if ($conn->query($sql)) {
            echo "Telefone do administrador atualizado com sucesso.";
            header("location: ../PerfilAdmin.php");
        } else {
            echo "Erro ao atualizar o telefone do administrador: " . $conn->error;
            return false;
            header("location: ../PerfilAdmin.php#ERRO!!!");
        }
    }




        function obterRegistosPendentes($conn) {
            // Prepara a chamada do procedimento armazenado
            $sql = "CALL RegistosPendentes()";

            // Executa a chamada do procedimento armazenado
            $result = $conn->query($sql);

            // Verifica se a chamada foi bem-sucedida e obtém os resultados
            if ($result) {
                $registosPendentes = array();

                // Loop pelos resultados e armazenamento em um array
                while ($row = $result->fetch_assoc()) {
                    $registosPendentes[] = $row;
                }

                // Retorna os registros pendentes
                return $registosPendentes;
            } else {
                echo "Erro ao chamar o procedimento armazenado: " . $conn->error;
                return false;
            }
        }
        // Chama a função para obter os registros pendentes
        $registosPendentes = obterRegistosPendentes($conn);

        // Verifica se houve registros pendentes retornados
        if ($registosPendentes) {
            // Faça o que desejar com os registros pendentes
            foreach ($registosPendentes as $registo) {
                echo "ID: " . $registo['id'] . "<br>";
                echo "Nome: " . $registo['nome'] . "<br>";
                echo "Email: " . $registo['email'] . "<br>";
                echo "ativo: " . $registo['ativo'] . "<br>";
                
            }
        } else {
            // Tratar caso não haja registros pendentes
            echo "Não há registros pendentes.";
        }

        // Fecha a conexão com o banco de dados
        $conn->close();



?>