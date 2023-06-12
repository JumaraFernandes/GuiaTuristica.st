<?php

function conetarBD() {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $bd  = "guiaturistica";

    // Criar uma conexão com o banco de dados
    $conn = new mysqli($servername, $username, $password, $bd );

    // Verificar a conexão
    if ($conn->connect_error) {
        echo 'não consegui comunicar';
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }   

    return $conn;
}

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


function login($email, $senha)
{
    $conn = conetarBD();

    echo 'chamou-me';
    $query_select = "SELECT * FROM utilizador WHERE email = ? AND ativo = 1";
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
            $tipo = $row['tipo'];
            echo "Tipo de utilizador: " . $tipo;
            $_SESSION['tipo'] = $tipo;

             if($tipo === 'guia'){
                header ("location: ../PerfilGuia.php");
            } else if($tipo === 'parceiro'){
                header ("location: ../PerfilParceiro.php");
            } else if($tipo === 'turista'){
                header ("location: ../PerfilTurista.php");
            } else if($tipo === 'admin'){
                header ("location: ../PerfilAdmin.php");
            }  
 
        } else {
            echo "Credenciais inválidas. Senha incorreta.";
            echo 'Senha: -'.$senha . "-<br>";
            echo 'Encriptada: -'.$hashedPassword . "-<br>";
            echo 'Encriptada: '. password_verify($hashedPassword, $senha) . "<br>";
            echo var_dump(password_verify($senha, $hashedPassword));
            

        }
    } else {
        echo "Credenciais inválidas. Email não encontrado.";
    }
    echo 'FIM';
    
    mysqli_stmt_close($stmt);
}

function registarGuia($numIdentificacao, $sexo, $experiencia,$enderecoGuia, $cv, $dataNascimento,$foto, $nome, $email, $telefone, $senha, $idiomas)
{
    $conn = conetarBD();
    $hashedSenha = password_hash($senha, PASSWORD_DEFAULT);
    echo 'Senha: '.$senha. '<br>';
    echo 'Encriptada: '.$hashedSenha.'<br>';
    echo 'Comparar: '.password_verify($senha, $hashedSenha) . '<br>';
    $query = "CALL RegistrarGuia(?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssssssssss", $numIdentificacao, $sexo, $experiencia, $enderecoGuia, $cv, $dataNascimento,$foto, $telefone,$nome, $email, $hashedSenha);
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


function registarTurista( $dataNascimento, $sexo, $nome, $email, $senha)
{
    $conn = conetarBD();
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

function registarParceiro($tipo, $endereco, $estrelas, $link, $foto, $telefone, $nome, $email, $senha)
{
    $conn = conetarBD();
    $hashedSenha = password_hash($senha, PASSWORD_DEFAULT);
    $query = "CALL RegistrarParceiro(?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssssssss", $tipo, $endereco, $estrelas, $link, $nome, $telefone, $email, $hashedSenha, $foto);
    mysqli_stmt_execute($stmt);
    // Verifique se a consulta foi executada com sucesso
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Parceiro registrado com sucesso!";
    } else {
        echo "Erro ao registrar o parceiro.";
    }
    mysqli_stmt_close($stmt);
}

  function registarAdmin($nome, $email, $senha,$telefone)
{
    $conn = conetarBD();

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


    function PesquisarAdmin( $emailP) {
        $conn = conetarBD();

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

    
        // Retorna o perfil do usuário
        return $perfilUsuario;
    }
     
    function PesquisarGuia( $emailP) {
        $conn = conetarBD();
        // Chama o procedimento armazenado
        $sql = "CALL PesquisarGuia('$emailP')";
        $result = $conn->query($sql);
    
        // Verifica se a chamada foi bem-sucedida e obtém os dados
        if ($result) {
            $row = $result->fetch_assoc();
            
            // Armazena os dados do administrador em um array
            $perfilUsuario = array(
                'ID' => $row['id'],
                'Nome' => $row['nome'],
                'Email' => $row['email'],
                'Telefone' => $row['telefone'],
                'dataNascimento' => $row['dataNascimento'],
                'Morada' => $row['endereco'],
                'cv' => $row['cv']



            );
            
            // Fecha o resultado da consulta
            $result->close();
        } else {
            echo "Erro ao chamar o procedimento armazenado: " . $conn->error;
            // Retorna null ou uma mensagem de erro, dependendo do que for mais adequado para o seu caso
            return null;
        }

    
        // Retorna o perfil do usuário
        return $perfilUsuario;
    }

    function PesquisarTodosGuias() {
        $conn = conetarBD();
        
        // Chama o procedimento armazenado para obter todos os guias
        $sql = "CALL PesquisarTodosGuias()";
        $result = $conn->query($sql);
    
        // Verifica se a chamada foi bem-sucedida e obtém os dados
        if ($result) {
            $guias = array();
    
            // Loop através dos resultados para obter cada guia
            while ($row = $result->fetch_assoc()) {
                // Armazena os dados do guia em um array
                $guia = array(
                    'ID' => $row['id'],
                    'Nome' => $row['nome'],
                    'Email' => $row['email'],
                    'Telefone' => $row['telefone'],
                    'dataNascimento' => $row['dataNascimento'],
                    'Morada' => $row['endereco'],
                    'Experiencias' => $row['experiencia'],
                    'cv' => $row['cv']
                );
    
                // Adiciona o guia ao array de guias
                $guias[] = $guia;
            }
    
            // Fecha o resultado da consulta
            $result->close();
    
            // Retorna o array de guias
            return $guias;
        } else {
            echo "Erro ao chamar o procedimento armazenado: " . $conn->error;
            // Retorna null ou uma mensagem de erro, dependendo do que for mais adequado para o seu caso
            return null;
        }
    }
    

    function atualizarTelefoneAdmin($adminID, $novoTelefone) {
        $conn = conetarBD();

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
      
    function atualizarDadosGuia($guiaID, $novoEndereco, $novoTelefone, $novoCV) {
        $conn = conetarBD();
        // Prepara a chamada do procedimento armazenado
        $sql = "CALL AtualizarDadosGuia($guiaID, '$novoEndereco', '$novoTelefone', '$novoCV')";

        echo 'ID: ' .$guiaID . '<br>';
        echo 'endereço: '. $novoEndereco . '<br>';
        echo 'telefone: '. $novoTelefone . '<br>';
        echo 'cv: ' .$novoCV . '<br>';

    
        // Executa a chamada do procedimento armazenado
        if ($conn->query($sql)) {
            echo "Dados do guia atualizados com sucesso.";
            //header("location: ../PerfilGuia.php");
        } else {
            echo "Erro ao atualizar os dados do guia: " . $conn->error;
            return false;
            //header("location: ../PerfilGuia.php#ERRO!!!");
        }
    }
    

        function obterRegistosPendentes() {
            $conn = conetarBD();

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


        function obterReservasPendentes($id){

            $conn = conetarBD();
            // Chama o procedimento ListarReservasPendentes
            $sql = "CALL ListarReservasPendentes($id)";
            $result = $conn->query($sql);

            // Verifica se houve algum erro na execução do procedimento
            if (!$result) {
                die("Erro ao chamar o procedimento: " . $conn->error);
            }
            // Verifica se a chamada foi bem-sucedida e obtém os resultados
            if ($result) {
                $reservasPendentes  = array();

                // Loop pelos resultados e armazenamento em um array
                while ($row = $result->fetch_assoc()) {
                    $reservasPendentes [] = $row;
                }

                // Retorna os reservass pendentes
                return $reservasPendentes ;
            } else {
                echo "Erro ao chamar o procedimento armazenado: " . $conn->error;
                return null;
            }
        }

    
        
        function adicionarReserva($datainicio, $datafim, $numeropessoas, $estado, $local, $id_guia, $id_turista) {
            $conn = conetarBD();
            // Chama o procedimento AdicionarReserva
            $sql = "CALL AdicionarReserva('$datainicio', '$datafim', $numeropessoas, '$estado', '$local', $id_guia, $id_turista)";
            $result = $conn->query($sql);   
        
            // Verifica se houve algum erro na execução do procedimento
            if ($result) {
                echo 'reservado com sucesso';
                return true;
            } else{
                echo 'errro ao reservar';
                return false;
            }
        
        }
        
     
        function ativarPerfil( $utilizadorID) {
            $conn = conetarBD();

            // Prepara a chamada do procedimento armazenado
            $sql = "CALL AtivarPerfil(?)";
            $stmt = mysqli_stmt_init($conn);
            
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "Erro ao preparar a declaração.";
                return false;
            }
            
            // Vincula o parâmetro adminID
            mysqli_stmt_bind_param($stmt, "i", $utilizadorID);
            
            // Executa o procedimento armazenado
            if (mysqli_stmt_execute($stmt)) {
                echo "Procedimento armazenado executado com sucesso.";
                return true;
            } else {
                echo "Erro ao executar o procedimento armazenado: " . mysqli_error($conn);
                return false;
            }
            
            mysqli_stmt_close($stmt);
        }

        function aceitarReserva( $reservaID) {
            $conn = conetarBD();

            // Prepara a chamada do procedimento armazenado
            $sql = "CALL AceitarReserva(?)";
            $stmt = mysqli_stmt_init($conn);
            
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "Erro ao preparar a declaração.";
                return false;
            }
            
            mysqli_stmt_bind_param($stmt, "i", $reservaID);
            
            // Executa o procedimento armazenado
            if (mysqli_stmt_execute($stmt)) {
                echo "Procedimento armazenado executado com sucesso.";
                return true;
            } else {
                echo "Erro ao executar o procedimento armazenado: " . mysqli_error($conn);
                return false;
            }
            
            mysqli_stmt_close($stmt);
        }


        function CancelarPerfil($utilizadorID) {
            $conn = conetarBD();
            
            // Prepara a chamada do procedimento armazenado
            $sql = "CALL CancelarPerfil(?)";
            $stmt = mysqli_stmt_init($conn);
            
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "Erro ao preparar a declaração.";
                return false;
            }
            
            // Vincula o parâmetro adminID
            mysqli_stmt_bind_param($stmt, "i", $utilizadorID);
            
            // Executa o procedimento armazenado
            if (mysqli_stmt_execute($stmt)) {
                echo "Procedimento armazenado executado com sucesso.";
                return true;
            } else {
                echo "Erro ao executar o procedimento armazenado: " . mysqli_error($conn);
                return false;
            }
            
            mysqli_stmt_close($stmt);
        }
        
        function CancelarReserva($ReservaID) {
            $conn = conetarBD();
            
            // Prepara a chamada do procedimento armazenado
            $sql = "CALL CancelarReserva(?)";
            $stmt = mysqli_stmt_init($conn);
            
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "Erro ao preparar a declaração.";
                return false;
            }
            
            mysqli_stmt_bind_param($stmt, "i", $ReservaID);
            
            // Executa o procedimento armazenado
            if (mysqli_stmt_execute($stmt)) {
                echo "Procedimento armazenado executado com sucesso.";
                return true;
            } else {
                echo "Erro ao executar o procedimento armazenado: " . mysqli_error($conn);
                return false;
            }
            
            mysqli_stmt_close($stmt);
        }
        

        function listarReservasConfirmadas() {
            $conn = conetarBD();
            
            // Prepara a chamada do procedimento armazenado
            $sql = "CALL ListarReservasConfirmadas()";
            $result = mysqli_query($conn, $sql);
            
            $reservas = array(); // Vetor para armazenar as reservas confirmadas
            
            if ($result) {
                // Processa os resultados
                while ($row = mysqli_fetch_assoc($result)) {
                    // Armazena as informações da reserva no vetor
                    $reserva = array(
                        'id' => $row['id'],
                        'datainicio' => $row['datainicio'],
                        'datafim' => $row['datafim'],
                        'local' => $row['local'],
                        'numeropessoas' => $row['numeropessoas'],
                        'nome' => $row['nome'],
                        // Adicione mais campos, se necessário
                    );
                    $reservas[] = $reserva;
                }
                mysqli_free_result($result);
            } else {
                echo "Erro ao executar o procedimento armazenado: " . mysqli_error($conn);
            }
            
            mysqli_close($conn);
            
            return $reservas; // Retorna o vetor de reservas confirmadas
        }
        
        

    

            function obterTotalGuiasRegistrados()
            {
                $conn = conetarBD();
                // Chama o procedimento armazenado
                $sql = "CALL ListarTotalGuias()";
                $result1 = $conn->query($sql);
                
                // Verifica se a chamada do procedimento obteve sucesso
                if ($result1 === false) {
                    die("Erro ao chamar o procedimento: " . $conn->error);
                }
                
                // Obtém o resultado da contagem de guias
                $row = $result1->fetch_assoc();
                $totalGuias = $row["total_guias"]; 
                // Retorna o total de guias

                echo 'Total guia: ' .$totalGuias; 
                return $totalGuias;
            }



?>