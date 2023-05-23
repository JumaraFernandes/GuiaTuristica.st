<?php

if(isset($_POST['submit']))
{
    //echo "está a funcionar";
    //die();
    
    $username=$_POST['nomeusario'];
    $passe=$_POST['passe'];
   

    require_once "conexaobd.php";
    require_once "funcao.php";

    if(emptyInputLogin($username,$passe)!== true)
    {
        header ("location: ../login.php?error=emptyinput");
        exit();
    }
    
    loginuser($connect, $username, $passe);
    
}
else
{
    header("location: ../login.php");
    exit();
}
?>