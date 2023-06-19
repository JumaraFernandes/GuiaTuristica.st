<?php
    session_start();
     // Verificar se o usuário está logado
    if (!isset($_SESSION['nome'])) {
        // Redirecionar o usuário para a página de login
        header("Location: login.php");
        exit(); // Certifique-se de sair do script após o redirecionamento
    }

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
     <!--cabeçalho-->
     <?php include 'includes/header.php' ;

   

    require_once "connect/funcao.php";
    $perfilUsuario = PesquisarTurista ($_SESSION['email']);

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
                    <h2>Dados Pessoais</h2>
                    <form class= "row g-3 needs-validation"action="" method="post">
                       <div class="col-md-4 position-relative">
                            <label for="validationTooltip01" class="form-label">Nome</label>
                            <?php echo '<input type="text" class="form-control disabled" id="validationTooltip01"  value="'. $perfilUsuario['Nome'] .'" readonly>'?>
                        </div>

                        <div class="col-md-4 position-relative">
                            <label for="validationTooltipUsername" class="form-label">Email</label>
                            <?php echo '<input type="text" class="form-control disabled" id="validationTooltip01" value="'. $perfilUsuario['Email'] .'"   readonly>'?>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label for="validationTooltip03" class="form-label">sexo</label>
                            <?php echo '<input type="text" class="form-control disabled" id="validationTooltip01"   value="'. $perfilUsuario['sexo'] .'" readonly>'?>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label for="validationTooltip03" class="form-label">Data de Nascimento</label>
                            <?php echo '<input type="text" class="form-control disabled" id="validationTooltip01"  value="'. $perfilUsuario['dataNascimento'] .'" readonly>'?>
                        </div>
                        
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit" name="submit">Guardar Alterações</button>
                        </div>

                    </form>
                </div>
                <div class="" id="reservas" >
                    <h2>Minhas reservas</h2>
                    <?php 
                       $id = $_SESSION['id'];
                       $reserva = ListarReservasPorTurista($id);
                    
                        // Verifica se houve registros pendentes retornados
                       if ($reserva!== null) {
                            // Faça o que desejar com os registros pendentes
                            foreach ($reserva as $reservas) {
                                echo '<div class="card pendentes">
                                        <h5 class="card-header">Nome Guia:'. $reservas['Nome do Guia'] .'</h5>
                                        <p>Local: '. $reservas['Local'] .'</p>
                                        <p>Data Inicio: '. $reservas['Data de Início'] .'</p>
                                        <p>Data Fim: '. $reservas['Data de Fim'] .'</p>
                                        <p>Nº pessoas: '. $reservas['Número de Pessoas'] .'</p>
                                        <div class="card-body">
                                        <a href="connect/cancelarPedidoReserTu.php?id='. $reservas['ID'] .'" class="btn btn-primary btCancelar">Cancela</a>
                                        </div>
                                    </div>';
                            }
                        } else {
                            echo "Não há reservas pendentes.";
                        } 
  
                    ?>
                </div>
                <div class="" id="msg" >
                    <h2 id="idReserva" name="idChat"></h2>
                    <div class="container chat-container">
                        <div id="chatbox">
                            <?php 

                                $minhasmsg = receberMsg(465);
                                if ($minhasmsg  !== null) {
                                    // Faça o que desejar com os registros pendentes
                                    foreach ($minhasmsg as $reservas) {
                                        if($reservas['autor'] == '1'){
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
                        <input type="text" class="form-control" id="userInput" placeholder="Digite sua mensagem...">
                        <div class="input-group-append">
                        <a href="connect/enviarTurista.php?id=<?php echo $idReserva; ?>">
                       <button class="btn btn-primary" type="button" onclick="sendMessage()">Enviar</button>
                     </a>
                        </div>
                    </div>
                </div>
                <div class="" id="listMsg" onclick="changeCard('msg')">
                    <h2>Lista de mensagens</h2>
                    <?php
                    $minhasmsg =ListarReservasPorTurista($id);
                    
                    // Verifica se houve registros pendentes retornados
                   if ($minhasmsg  !== null) {
                        // Faça o que desejar com os registros pendentes
                        foreach ($minhasmsg as $msg) {
                            
                            echo '<div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Guia: - '.$msg['Nome do Guia'].'</h5>
                                <p class="card-text">Reserva nº.'.$msg['ID'].'</p>
                                <a href="chat.php?id='.$msg['ID'].'" class="btn btn-primary">Abrir mensagem</a>
                            </div>
                            <div class="card-footer text-body-secondary">
                                2 days ago
                            </div>
                        </div>';
                        }
                    } else {
                        echo "Não há reservas pendentes.";
                    } 
                    ?>
                </div>
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