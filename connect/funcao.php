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
function uidexists($conn, $username, $email)
{
    $query_select = "SELECT * FROM users WHERE nomeusario = ? or email = ?";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $query_select))
    {
        header ("location: ../Registar.php?error=stmtuidexist");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultdata=mysqli_stmt_get_result($stmt);
    if($row=mysqli_fetch_assoc($resultdata)){
    return $row;}
    else{$result=false;}
    mysqli_stmt_close($stmt);
}


function loginuser($conn , $username, $passe)
{
    $uidexits=uidexists($conn, $username, $username);

    if($uidexits===false)
    {
        header ("location: ../login.php?error=loginerrado");
        exit();
    }
    $hashedpwd=$uidexits['passe'];
    $very= password_verify($passe, $hashedpwd);

    if($very===false)
    {
        header ("location: ../login.php?error=passeerrada");
        exit();
    }
    else if($very===true)
    {
        session_start();
        $_SESSION["nomeusario"]=$uidexits['passe'];
        $_SESSION["nome"]=$uidexits['nome'];
        header ("location: ../index.php");
        exit();
    }
}
                    
function registarGuia($conn, $numIdentificacao, $sexo, $experiencia,$enderecoGuia, $cv, $dataNascimento, $nome, $email, $telefone, $senha)
{
    /* $query = "CALL RegistrarGuia(?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    $sexo = 'M';
    mysqli_stmt_bind_param($stmt, "sssssssss", $numIdentificacao, $sexo, $experiencia, $enderecoGuia, $cv, $dataNascimento, $nome, $email, $senha);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt); */

    $query = "CALL RegistrarGuia(?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssssssss", $numIdentificacao, $sexo, $experiencia, $enderecoGuia, $cv, $dataNascimento, $nome, $email, $senha);
    mysqli_stmt_execute($stmt);

    // Verifique se a consulta foi executada com sucesso
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Guia registrado com sucesso!";
    } else {
        echo "Erro ao registrar o guia.";
    }

    // Feche o statement
    mysqli_stmt_close($stmt);

    
}

function loginUtilizador($conn, $username, $password)
{
    $query = "CALL LoginUtilizador(?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    $loggedIn = $row['loggedIn'];
    mysqli_stmt_close($stmt);
    
    return $loggedIn;
}


function registarTurista($conn, $dataNascimento, $sexo, $nome, $email, $senha)
{
    $query = "CALL RegistrarTurista(?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssss", $dataNascimento, $sexo, $nome, $email, $senha);
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



function registarParceiro($conn, $tipo, $endereco, $estrelas, $link, $nome, $email, $senha, $telefone)
{
    $query = "CALL RegistrarParceiro(?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssssssi", $tipo, $endereco, $estrelas, $link, $nome, $email, $senha, $telefone);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}




?>