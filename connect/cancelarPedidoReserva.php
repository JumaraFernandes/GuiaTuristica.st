<?php


    //echo "está a funcionar";
    //die();
    
     require_once "funcao.php";

     echo 'entrou';


     $id = $_GET['id'];
     
     echo 'id: '.$id;
    

     CancelarReserva( $id);
    
    header("location: ../PerfilGuia.php");


?>