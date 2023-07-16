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
    mysqli_stmt_bind_param($stmt, "sssssssssss", $numIdentificacao, $sexo, $experiencia, $enderecoGuia, $cv,$foto, $dataNascimento, $telefone,$nome, $email, $hashedSenha);
    mysqli_stmt_execute($stmt);

    // Verifique se o guia foi registrado com sucesso
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        
        // Insira os idiomas selecionados
        if (!empty($idiomas)) {
            foreach ($idiomas as $idioma) {
                $queryIdioma = "CALL adicionarIdioma(?, ?)";
                $stmtIdioma = mysqli_prepare($conn, $queryIdioma);
                mysqli_stmt_bind_param($stmtIdioma, "ss", $email, $idioma);
                mysqli_stmt_execute($stmtIdioma);
                mysqli_stmt_close($stmtIdioma);

            }
        } 
        header("location: ../Registar.php?res=1");
    } else {
        header("location: ../Registar.php?res=-1");
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
        header("location: ../validarperfil.php?email=".$email);
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
    mysqli_stmt_bind_param($stmt, "sssssssss", $tipo, $endereco, $estrelas, $link, $foto, $nome, $telefone, $email, $hashedSenha);
    mysqli_stmt_execute($stmt);
    // Verifique se a consulta foi executada com sucesso
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        header("location: ../Registar.php?res=1");
    } else {
        header("location: ../Registar.php?res=-1");
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
    mysqli_stmt_bind_param($stmt, "ssss",$nome,  $email, $hashedSenha, $telefone);
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
    function PesquisarTurista( $emailP) {
        $conn = conetarBD();
        // Chama o procedimento armazenado
        $sql = "CALL PesquisarTurista('$emailP')";
        $result = $conn->query($sql);
    
        // Verifica se a chamada foi bem-sucedida e obtém os dados
        if ($result) {
            $row = $result->fetch_assoc();
            
            // Armazena os dados do administrador em um array
            $perfilUsuario = array(
                'ID' => $row['id'],
                'Nome' => $row['nome'],
                'Email' => $row['email'],
                'dataNascimento' => $row['dataNascimento'],
                'sexo' => $row['sexo'],
                

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

    function PesquisarParceiro( $emailP) {
        $conn = conetarBD();
        // Chama o procedimento armazenado
        $sql = "CALL PesquisarParceiro('$emailP')";
        $result = $conn->query($sql);
    
        // Verifica se a chamada foi bem-sucedida e obtém os dados
        if ($result) {
            $row = $result->fetch_assoc();
            
            //armazer os dados
            $perfilUsuario = array(
                'ID' => $row['id'],
                'Nome' => $row['nome'],
                'Email' => $row['email'],
                'tipo' => $row['tipo'],
                'endereco' => $row['endereco'],
                'estrelas' => $row['estrelas'],
                'link' => $row['link'],
                'foto' => $row['foto'],
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
                    'idade' => $row['idade'],
                    'Morada' => $row['endereco'],
                    'Experiencias' => $row['experiencia'],
                    'foto' => $row['foto'],
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
   

    function PesquisarIdiomas($id) {
        $conn = conetarBD();
        
        // Chama o procedimento armazenado para obter todos os idiomas
        $sql = "CALL PesquisarIdiomas($id)";
        $result = $conn->query($sql);
    
        // Verifica se a chamada foi bem-sucedida e obtém os dados
        if ($result) {
            $idioma = array();
    
            // Loop através dos resultados para obter cada idioma
            while ($row = $result->fetch_assoc()) {
               
                // Armazena os dados do guia em um array
                $idioma = array(
                    'Nome' => $row['nome'],
                    
                );
    
                // Adiciona o idioma ao array de idiomas
                $idiomas[] =  $idioma;
            }
    
            // Fecha o resultado da consulta
            $result->close();
    
            // Retorna o array de guias
            return  $idiomas;
        } else {
            echo "Erro ao chamar o procedimento armazenado: " . $conn->error;
            // Retorna null ou uma mensagem de erro, dependendo do que for mais adequado para o seu caso
            return null;
        }
    }
    function PesquisarHosteis() {
        $conn = conetarBD();
    
        // Chama o procedimento armazenado para pesquisar hosteis
        $sql = "CALL PesquisarHosteis()";
        $result = $conn->query($sql);
    
        // Verifica se a chamada foi bem-sucedida e obtém os dados
        if ($result) {
            $hosteis = array();
    
            // Loop através dos resultados para obter cada hostel
            while ($row = $result->fetch_assoc()) {


                // Armazena os dados do hostel em um array
                $hostel = array(
                    'Tipo' => $row['tipo'],
                    'Endereco' => $row['endereco'],
                    'Estrelas' => $row['estrelas'],
                    'Link' => $row['link'],
                    'Telefone' => $row['telefone'],
                    'Foto' => $row['foto'],
                    'Nome' => $row['nome'],
                    'Email' => $row['email']
                );
    
                // Adiciona o hostel ao array de hosteis
                $hosteis[] = $hostel;
            }
    
            // Fecha o resultado da consulta
            $result->close();
    
            // Retorna o array de hosteis
            return $hosteis;
        } else {
            echo "Erro ao chamar o procedimento armazenado: " . $conn->error;
            // Retorna null ou uma mensagem de erro, dependendo do que for mais adequado para o seu caso
            return null;
        }
    }
    
    function PesquisarRestaurantes() {
        $conn = conetarBD();
    
        // Chama o procedimento armazenado para pesquisar restaurantes
        $sql = "CALL PesquisarRestaurantes()";
        $result = $conn->query($sql);
    
        // Verifica se a chamada foi bem-sucedida e obtém os dados
        if ($result) {
            $restaurantes = array();
    
            // Loop através dos resultados para obter cada restaurante
            while ($row = $result->fetch_assoc()) {
                // Armazena os dados do restaurante em um array
                $restaurante = array(
                    'Tipo' => $row['tipo'],
                    'Endereco' => $row['endereco'],
                    'Estrelas' => $row['estrelas'],
                    'Link' => $row['link'],
                    'Telefone' => $row['telefone'],
                    'Foto' => $row['foto'],
                    'Nome' => $row['nome'],
                    'Email' => $row['email']
                );
    
                // Adiciona o restaurante ao array de restaurantes
                $restaurantes[] = $restaurante;
            }
    
            // Fecha o resultado da consulta
            $result->close();
    
            // Retorna o array de restaurantes
            return $restaurantes;
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
        // Executa a chamada do procedimento armazenado
        if ($conn->query($sql)) {
            echo "Dados do guia atualizados com sucesso.";
            header("location: ../PerfilGuia.php#".$novoCV);
        } else {
            echo "Erro ao atualizar os dados do guia: " . $conn->error;
            return false;
            header("location: ../PerfilGuia.php#ERRO!!!");
        }
    }
    
    function atualizarDadosParceiro($parceiroID, $novolink,$novoestrelas, $novoTelefone, $novofoto) {
        $conn = conetarBD();
        // Prepara a chamada do procedimento armazenado
        $sql = "CALL AtualizarDadosParceiro($parceiroID, '$novolink','$novoestrelas ','$novoTelefone', '$novofoto')";

    
        // Executa a chamada do procedimento armazenado
        if ($conn->query($sql)) {
            echo "Dados do parceiro atualizados com sucesso.";
            header("location: ../PerfilParceiro.php");
           
        } else {
            echo "Erro ao atualizar os dados do parceiro: " . $conn->error;
            return false;
            header("location: ../PerfilParceiro.php#ERRO!!!");
          
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

   
    function finalizarReservasConfirmadas($id) {
        $conn = conetarBD();
        
        // Prepara a chamada do procedimento armazenado
        $sql = "CALL listarReservarFinalizadas($id)";
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
        
        return $reservas; // Retorna o vetor de reservas finalizadas

    }

    
        function adicionarReserva($datainicio, $datafim, $numeropessoas, $local, $id_guia, $id_turista) {
            $conn = conetarBD();
            // Chama o procedimento AdicionarReserva
            $sql = "CALL AdicionarReserva('$datainicio', '$datafim','$numeropessoas','$local', $id_guia, $id_turista)";
            $result = $conn->query($sql);   
        
            // Verifica se houve algum erro na execução do procedimento
            if ($result) {
                echo 'reservado com sucesso';
                header("location: ../Reservas.php?res=1");
                return true;
            } else{
                echo 'errro ao reservar';
                return false;
                header("location: ../Reservas.php?res=-1");
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
        

        function listarReservasConfirmadas($id) {
            $conn = conetarBD();
            
            // Prepara a chamada do procedimento armazenado
            $sql = "CALL ListarReservasConfirmadas($id)";
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
        
        function ListarReservasPorTurista($utilizadorID) {
            $conn = conetarBD();
        
            // Chama o procedimento armazenado para listar as reservas por turista
            $sql = "CALL ListarReservasPorTurista($utilizadorID)";
            $result = $conn->query($sql);
        
            // Verifica se a chamada foi bem-sucedida e obtém os dados
            if ($result) {
                $reservas = array();
        
                // Loop através dos resultados para obter cada reserva
                while ($row = $result->fetch_assoc()) {
                    // Armazena os dados da reserva em um array
                    $reserva = array(
                        'ID' => $row['id'],
                        'Data de Início' => $row['datainicio'],
                        'Data de Fim' => $row['datafim'],
                        'Número de Pessoas' => $row['numeropessoas'],
                        'Local' => $row['local'],
                        'Nome do Guia' => $row['Nome do Guia']
                    );
        
                    // Adiciona a reserva ao array de reservas
                    $reservas[] = $reserva;
                }
        
                // Fecha o resultado da consulta
                $result->close();
        
                // Retorna o array de reservas
                return $reservas;
            } else {
                echo "Erro ao chamar o procedimento armazenado: " . $conn->error;
                // Retorna null ou uma mensagem de erro, dependendo do que for mais adequado para o seu caso
                return null;
            }
        }
        
        function enviarMsgGuia($idReserva, $msg) {
            $conn = conetarBD();
            $sql = "CALL enviarMsgGuia(?, ?)";
        
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "is", $idReserva, $msg);
            mysqli_stmt_execute($stmt);
        
            if (mysqli_stmt_affected_rows($stmt) > 0) {
                echo "Mensagem enviada com sucesso!";
            } else {
                echo "Erro ao enviar a mensagem.";
            }
        
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        }
        

        function enviarMsgTurista($idReserva, $msg) {
            $conn = conetarBD();
            $sql = "CALL enviarMsgTurista(?, ?)";
        
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "is", $idReserva, $msg);
            mysqli_stmt_execute($stmt);
        
            if (mysqli_stmt_affected_rows($stmt) > 0) {
                echo "Mensagem enviada com sucesso!";
            } else {
                echo "Erro ao enviar a mensagem.";
            }
        
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        }

        
        function enviarMsg($idReserva, $msg, $id) {
            $conn = conetarBD();

            $sql = "CALL enviarMsg(?, ?, ?)";
        
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "isi", $idReserva, $msg, $id);
            mysqli_stmt_execute($stmt);
        
            if (mysqli_stmt_affected_rows($stmt) > 0) {
                echo "Mensagem enviada com sucesso!";
                
            } else {
                echo "Erro ao enviar a mensagem.";
            }
        
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        }
        

        function receberMsg($idReserva) {
            $conn = conetarBD();
            $sql = "CALL receberMsg(?)";
        
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "i", $idReserva);
            mysqli_stmt_execute($stmt);
        
            $result = mysqli_stmt_get_result($stmt);
            $mensagens = []; // Vetor para armazenar as mensagens
        
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $mensagem = [
                        'id' => $row['id'],
                        'msg' => $row['msg'],
                        'datamsg' => $row['datamsg'],
                        'autor' => $row['autor']
                    ];
        
                    $mensagens[] = $mensagem; // Adiciona a mensagem ao vetor
                }
            } else {
                echo "Nenhuma mensagem encontrada.";
            }
        
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        
            return $mensagens; // Retorna o vetor de mensagens
        }
            
        function InserirExperiencia($idTurista, $titulo, $conteudo) {
            $conn = conetarBD();
            
            try {
                $stmt = $conn->prepare("CALL InserirExperiencia(?, ?, ?)");
                $stmt->bind_param("iss", $idTurista, $titulo, $conteudo);
                $stmt->execute();
        
                echo "Procedimento armazenado executado com sucesso!";
            } catch (mysqli_sql_exception $e) {
                echo "Erro ao chamar o procedimento armazenado: " . $e->getMessage();
            }
        
        }

        
        function PesquisarExperiencias() {
            $conn = conetarBD();
            $sql = "CALL PesquisarExperiencias()";
            
            $result = $conn->query($sql);
            $experiencias = []; // Vetor para armazenar as experiências
            
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $experiencia = [
                        'id' => $row['id'],
                        'titulo' => $row['titulo'],
                        'conteudo' => $row['conteudo'],
                        'data' => $row['data'],
                        'nome' => $row['nome']
                    ];
            
                    $experiencias[] = $experiencia; // Adiciona a experiência ao vetor
                }
            } else {
                echo "Nenhuma experiência encontrada.";
            }
            
            return $experiencias; // Retorna o vetor de experiências
        }
        
        function ExcluirExperiencia($experienciaID) {
            $conn = conetarBD();
            
            try {
                $stmt = $conn->prepare("CALL ExcluirExperiencia(?)");
                $stmt->bind_param("i", $experienciaID);
                $stmt->execute();
        
                echo "Procedimento armazenado executado com sucesso!";
            } catch (mysqli_sql_exception $e) {
                echo "Erro ao chamar o procedimento armazenado: " . $e->getMessage();
            }
            
        }
        
            
       
        function verificarEmailExistente($email) {
            $conn = conetarBD();
        
            // Chama o procedimento armazenado
            $sql = "CALL PesquisarEmail('$email')";
            $result = $conn->query($sql);
        
            // Verifica se a chamada foi bem-sucedida e obtém os dados
            if ($result && $result->num_rows > 0) {
                // O email existe na base de dados
                $result->close();
                return true;
            } else {
                // O email não existe na base de dados ou ocorreu um erro
                if ($result) {
                    $result->close();
                }
                return false;
            }
        }
        
        
        
        function AtualizarEstado($emailValidar) {
            $conn = conetarBD();
            // Escapar caracteres especiais para evitar SQL injection
            $emailValidar = mysqli_real_escape_string($conn, $emailValidar);
            
            // Chamar o procedimento armazenado
            $query = "CALL AtualizarEstado('$emailValidar')";
            $result = mysqli_query($conn, $query);
            
            // Verificar se a chamada do procedimento foi bem-sucedida
            if ($result) {
                echo "Estado atualizado com sucesso.";
            } else {
                echo "Erro ao chamar o procedimento armazenado: " . mysqli_error($conn);
            }
            
            
        }

        function SubmeterMsg($nome, $email, $msg) {
            $conn = conetarBD();
            
            try {
                $stmt = $conn->prepare("CALL submeterMsg(?, ?, ?)");
                $stmt->bind_param("sss", $nome, $email, $msg);
                $stmt->execute();
        
                header("location: ../Contacto.php?res=1");
            } catch (mysqli_sql_exception $e) {
                header("location: ../Contacto.php?res=-1");
            }
        
        }
        
        function AtualizarSenha($email, $pass) {
            $conn = conetarBD();
        
            // Encriptar a senha usando bcrypt
            $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
        
            // Chamar o procedimento armazenado usando uma declaração preparada
            $query = "CALL AtualizarSenha(?, ?)";
            $stmt = mysqli_prepare($conn, $query);
        
            // Verificar se a preparação da declaração foi bem-sucedida
            if ($stmt) {
                // Vincular os parâmetros à declaração preparada
                mysqli_stmt_bind_param($stmt, "ss", $email, $hashedPass);
        
                // Executar a declaração preparada
                $result = mysqli_stmt_execute($stmt);
        
                // Verificar se a chamada do procedimento foi bem-sucedida
                if ($result) {
                    echo "Senha atualizada com sucesso.";
                } else {
                    echo "Erro ao chamar o procedimento armazenado: " . mysqli_error($conn);
                }
        
                // Fechar a declaração preparada
                mysqli_stmt_close($stmt);
            } else {
                echo "Erro ao preparar a declaração: " . mysqli_error($conn);
            }
        
            // Fechar a conexão com o banco de dados
            mysqli_close($conn);
        }
        
       


?>