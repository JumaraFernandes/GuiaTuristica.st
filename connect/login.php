<?php

if(isset($_POST['submit']))
{
    //echo "está a funcionar";
    //die();
    
    $email=$_POST['email'];
    $passe=$_POST['senha'];
   

    
    require_once "funcao.php";

    if(emptyInputLogin($email,$passe)!== true)
    {
        
        header ("location: ../login.php?error=emptyinput");
        exit();
    }
    
    login($email, $passe);
    
    
}
else
{
    header("location: ../login.php");
    exit();
}
?>