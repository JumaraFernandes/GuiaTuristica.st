<?php

    // Verifica se o parâmetro 'id' existe na URL
    if(isset($_GET['id'])){
        // Recupera o valor do parâmetro 'id'
        $id = $_GET['id'];
        
        session_start();
        if (isset($_SESSION['nome'])) {
            $tipo = $_SESSION['tipo'];
            if($tipo === 'Admin'){
                header("Location: index.php");
            }
        } else{
            header("Location: index.php");
        }

    } else {
        // Caso o parâmetro 'id' não esteja presente na URL
        header("Location: index.php");
    }


    
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Guia Turistica - STP</title>
  
  <link rel="shortcut icon" href="imagens/logo.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/estilogeral.css">
  <link rel="stylesheet" href="css/estiloPerfil.css">

</head>
<body>
  <?php include 'includes/header.php';
  require_once "connect/funcao.php";


 
  ?>

<div class="" >
                    <h2 id="idReserva" name="idChat"></h2>
                    <p id="idReservaInput"></p>
                    <form action="connect/enviarMsg.php" method="POST">         
                        <div class="container chat-container">
                            <div id="chatbox">
                                
                                <?php 
                                    echo '<input type="hidden" name="idChat" id="" value="'.$id.'">';
                                    $minhasmsg = receberMsg($id);
                                    if ($minhasmsg  !== null) {
                                        // Faça o que desejar com os registros pendentes
                                        foreach ($minhasmsg as $reservas) {
                                            if($reservas['autor'] === 1){
                                                echo '<div class="message user-message">Guia: '. $reservas['msg'] .'</div>';

                                            } else {
                                                echo '<div class="message bot-message">Turista: '. $reservas['msg'] .'</div>';
                                            }
                                        }
                                    } else {
                                        echo "Não há reservas pendentes.";
                                    } 
                                ?>
                                
                            </div>
                            <input type="text" class="form-control" id="userInput" placeholder="Digite sua mensagem..." name="msg">
                            <input type="submit" name="submit" value="Enviar" class="btn btn-primary">

                        </div>
                    </form>
                </div>
        </div>
    </div>

    </section>

    <script>

    // Função para atualizar o conteúdo da div com o ID da reserva
    function atualizarIDReserva() {
        // Obtém o fragmento da URL
        var fragmento = window.location.hash.substring(1);

        // Verifica se o fragmento existe
        if (fragmento) {
            // Atualiza o conteúdo da div com o ID da reserva
            document.getElementById("idReserva").textContent = "Chat - Reserva nº " + fragmento;
        }
    }

    // Função para enviar uma mensagem
    function sendMessage() {
        const userInput = document.getElementById('userInput');
        const message = userInput.value;

        if (message.trim() !== '') {
            const chatbox = document.getElementById('chatbox');
            const chatMessage = document.createElement('div');
            chatMessage.classList.add('message', 'user-message');
            chatMessage.textContent = 'Utilizador: ' + message;
            chatbox.appendChild(chatMessage);

            userInput.value = '';
        }
    }

    // Função para abrir uma mensagem
    function abrirMensagem(idReserva) {
        // Atualiza o fragmento da URL com o ID da reserva
        window.location.hash = idReserva;

        // Atualiza o conteúdo da div com o ID da reserva
        atualizarIDReserva();
    }

    // Chama a função para atualizar o conteúdo da div com o ID da reserva
    atualizarIDReserva();
</script>
</body>
</html>