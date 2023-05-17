<?php
$host  = "locaslhost";
$usuario = "root";
$bd = "guiaturistica";

$mysqli = new $mysqli($host,$usuario,$bd);

if($mysqli->connect_errno);
  echo "Falha na conexão: (".$mysqli->connect_errno.") ".$mysql->connect_error;
else{
    echo "Fez bem"
}
?>