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
  <link rel="shortcut icon" href="../imagens/logo.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/estiloPerfil.css">
  <script src="../js/funcao.js"></script>
</head>
<body>
    <!--cabeçalho-->

    <?php include 'includes/header.php' ?>
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
                    <div class="opcao">
                        <i class="bi bi-box-arrow-right"></i>
                        <p>Logout</p>
                        <i class="bi bi-chevron-right"></i>
                    </div>

                </div>
            </div>
            <div class="col">
                <div class="" id="perfil" >
                    <h2>DadosPessois</h2>
                    
     <form class="row g-3 needs-validation" novalidate>
  <div class="col-md-4 position-relative">
    <label for="validationTooltip01" class="form-label">Nome</label>
    <input type="text" class="form-control" id="validationTooltip01" value="Mark" required>
    <div class="valid-tooltip">
      Looks good!
    </div>
  </div>
  <div class="col-md-4 position-relative">
    <label for="validationTooltip02" class="form-label">Apelido</label>
    <input type="text" class="form-control" id="validationTooltip02" value="Otto" required>
    <div class="valid-tooltip">
      Looks good!
    </div>
  </div>
  <div class="col-md-4 position-relative">
    <label for="validationTooltipUsername" class="form-label">Email</label>
    <div class="input-group has-validation">
      <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
      <input type="text" class="form-control" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" required>
      <div class="invalid-tooltip">
        Please choose a unique and valid username.
      </div>
    </div>
  </div>
  <div class="col-md-6 position-relative">
    <label for="validationTooltip03" class="form-label">Morada</label>
    <input type="text" class="form-control" id="validationTooltip03" required>
    <div class="invalid-tooltip">
      Please provide a valid morada.
    </div>
  </div>
  <div class="col-md-6 position-relative">
    <label for="validationTooltip03" class="form-label">Data de Nascimento</label>
    <input type="text" class="form-control" id="validationTooltip03" required>
    <div class="invalid-tooltip">
      Please provide a valid datanascimento.
    </div>
  </div>
  
  <div class="col-md-3 position-relative">
    <label for="validationTooltip05" class="form-label">Telefone</label>
    <input type="text" class="form-control" id="validationTooltip05" required>
    <div class="invalid-tooltip">
      Please provide a valid telefone.
    </div>
  </div>

  <div class="col-md-3 position-relative">
  <label for="validationTooltip05" class="form-label">Curriculo</label>
    <input type="file" class="form-control" aria-label="file example" required>
    <div class="invalid-tooltip">
      Please provide a valid cv.
    </div>
  </div>

  <div class="col-12">
    <button class="btn btn-primary" type="submit">Guardar Alterações</button>
  </div>
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
                            <h5 class="card-title">Cliente - Jumara Santos</h5>
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