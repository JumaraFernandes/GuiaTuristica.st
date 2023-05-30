<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Guia Turistica - Minha conta</title>
  
  <link rel="shortcut icon" href="imagens/logo.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/estiloPerfil.css">
  <script src="../js/funcao.js"></script>
</head>
<body>
    <!--cabeçalho-->
    <?php
    // Verificar se o usuário está logado
    if (!isset($_SESSION['nome'])) {
    // Redirecionar o usuário para a página de login
    header("Location: login.php");
    exit(); // Certifique-se de sair do script após o redirecionamento
    }

    // Resto do código da página de perfil

    ?>
    
  
    <section> 
    <div class="container">
        <div class="row">
            <div class="col-6 col-sm-4">
                <div onclick="changeCard('perfil')">
                    <div class="opcao">
                        <i class="bi bi-person-circle"></i>
                        <p>Minha Conta</p>
                        <i class="bi bi-chevron-right"></i>
                    </div>

                </div>
                <div onclick="changeCard('reservas')">
                    <div class="opcao">
                        <i class="bi bi-x-diamond-fill"></i>
                        <p>Minhas reservas</p>
                        <i class="bi bi-chevron-right"></i>
                    </div>

                </div>
                <div onclick="changeCard('listMsg')">
                    <div class="opcao">
                        <i class="bi bi-chat-left-dots"></i>
                        <p>Mensagens</p>
                        <i class="bi bi-chevron-right"></i>
                    </div>
                </div>
                <div>
                    <a href="connect/logout.php" class="opcao">
                        <i class="bi bi-box-arrow-right"></i>
                        <p>Logout</p>
                        <i class="bi bi-chevron-right"></i>
                     </a>
                </div>
            </div>
            <div class="col">
                <div class="" id="perfil" >
                    <h2>DadosPessois</h2>
                    <form action="" method="post">


                    </form>
                </div>
                <div class="" id="reservas" >
                    <h2>Minhas reservas</h2>
                    <div class="card">
                        <h5 class="card-header">Guia - Tatiana Silva</h5>
                        <div class="card-body">
                            <p class="card-text">Local</p>
                            <p class="card-text">Data Inicio</p>
                            <p class="card-text">Data Fim</p>
                            <a href="#" class="btn btn-primary btCancelar">Cancelar</a>
                        </div>
                    </div>
                </div>
                <div class="" id="msg" >
                    <h2>Chat - Reserva nº18334</h2>
                    <div class="container chat-container">
                        <div id="chatbox">
                            <div class="message user-message">Usuário: Olá!</div>
                            <div class="message bot-message">ChatBot: Olá! Como posso ajudar?</div>
                        </div>
                        <input type="text" class="form-control" id="userInput" placeholder="Digite sua mensagem...">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button" onclick="sendMessage()">Enviar</button>
                        </div>
                    </div>
                </div>
                <div class="" id="listMsg" onclick="changeCard('msg')">
                    <h2>Lista de mensagens</h2>
                     <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Guia - Joana Santos</h5>
                            <p class="card-text">Reserva nº.18173</p>
                            <a href="#" class="btn btn-primary">Abrir mensagem</a>
                        </div>
                        <div class="card-footer text-body-secondary">
                            2 days ago
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </section>

    <script>
    // Script JavaScript para o chat
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

    
  </script>


      
  
  
  
</body>
</html>