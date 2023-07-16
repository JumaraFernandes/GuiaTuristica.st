<?php
    session_start();
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

    <?php include 'includes/header.php' ?>
    <?php

 

    require_once "connect/funcao.php";
    $perfilUsuario = PesquisarGuia($_SESSION['email']);

    $idReserva = '-1';

    ?>
  
    <section> 
    <div class="container">
        <div class="row">
            <div class="col-6 col-sm-4">
                <div onclick="changeCardGuia('perfil')">
                    <div class="opcao">
                        <i class="bi bi-person-circle"></i>
                        <p>Minha Conta</p>
                        <i class="bi bi-chevron-right"></i>
                    </div>
                </div>

                <div onclick="changeCardGuia('reservas')">
                    <div class="opcao">
                    <i class="bi bi-exclamation-octagon"></i>
                        <p>Pedidos da reservas</p>
                        <i class="bi bi-chevron-right"></i>
                    </div>
                    </div>

                    <div onclick="changeCardGuia('minhasRerserva')">
                    <div class="opcao">
                        <i class="bi bi-x-diamond-fill"></i>
                        <p>Minhas Reservas</p>
                        <i class="bi bi-chevron-right"></i>
                    </div>
                    </div>

                    <div onclick="changeCardGuia('Reservafinalizada')">
                    <div class="opcao">
                        <i class="bi bi-x-diamond-fill"></i>
                        <p> Reservas Finalizadas</p>
                        <i class="bi bi-chevron-right"></i>
                    </div>
                    </div>
                   


                <div onclick="changeCardGuia('listMsg')">
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
                    <h2>DadosPessoais</h2>
                    
                    <form class="row g-3 needs-validation" action="connect/atualizardadosguias.php" method="POST" enctype="multipart/form-data">
                        <div class="col-md-4 position-relative">
                            <label for="validationTooltip01" class="form-label">Nome</label>
                            <?php echo '<input type="text" class="form-control disabled" id="validationTooltip01"  value="'. $perfilUsuario['Nome'] .'" readonly>'?>
                        </div>

                        <div class="col-md-4 position-relative">
                            <label for="validationTooltipUsername" class="form-label">Email</label>
                            <?php echo '<input type="text" class="form-control disabled" id="validationTooltip01" value="'. $perfilUsuario['Email'] .'" readonly>'?>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label for="validationTooltip03" class="form-label">Morada</label>
                            <?php echo '<input type="text" class="form-control disabled" id="validationTooltip01"  name="Endereco" value="'. $perfilUsuario['Morada'] .'" required>'?>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label for="validationTooltip03" class="form-label">Data de Nascimento</label>
                            <?php echo '<input type="text" class="form-control disabled" id="validationTooltip01"  value="'. $perfilUsuario['dataNascimento'] .'" readonly>'?>
                        </div>
                        
                        <div class="col-md-3 position-relative">
                            <label for="validationTooltip05" class="form-label">Telefone</label>
                            <?php echo '<input type="text" class="form-control disabled" id="validationTooltip01" name="telefone" value="'. $perfilUsuario['Telefone'] .'" required>'?>
                        </div>
                        <div class="col-md-3 position-relative">
                        <label for="validationTooltip05" class="form-label">Curriculo</label>
                        <?php echo '<input type="file" class="form-control" aria-label="file example"  name="cv" accept="application/pdf"'. $perfilUsuario['cv'] .'">'?>
                        <a href="cvpdf/<?php echo $perfilUsuario['cv']; ?>" download>baixarpdf</a>
                        </div>
                        <div class="col-md-3 position-relative">
                        
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary" type="submit" name="submit">Guardar Alterações</button>
                        </div>
                    </form>
                </div>
                <div class="" id="reservas" >
                    <h2> Pedidos de reservas</h2>
                    <?php 
                        $id = $_SESSION['id'];
                        
                        $reservasPendentes = obterReservasPendentes($id);

                        // Verifica se houve registros pendentes retornados
                        if ($reservasPendentes != null) {
                            // Faça o que desejar com os registros pendentes
                            foreach ($reservasPendentes as $reservas) {
                                echo '<div class="card pendentes">
                                        <h5 class="card-header">'. $reservas['nome'] .'</h5>
                                        <p>Local: '. $reservas['local'] .'</p>
                                        <p>Data Inicio: '. $reservas['datainicio'] .'</p>
                                        <p>Data Fim: '. $reservas['datafim'] .'</p>
                                        <p>Nº pessoas: '. $reservas['numeropessoas'] .'</p>
                                        <div class="card-body">
                                        <a href="connect/cancelarPedidoReserva.php?id='. $reservas['id'] .'" class="btn btn-primary btCancelar">Cancela</a>
                                        <a href="connect/aceitarPedidoReserva.php?id='. $reservas['id'] .'" class="btn btn-primary btCancelar">Aceita</a>
                                        </div>
                                    </div>';
                            }
                        } else {
                            echo "Não há reservas pendentes.";
                        } 
  
                    ?>
                
                </div>
                <div class="" id="minhasRerserva" >
                    <h2> Minhas Reservas</h2>

                      <?php 
                         $id = $_SESSION['id'];
                       $minhasreserva = listarReservasConfirmadas($id);
                    
                        // Verifica se houve registros pendentes retornados
                       if ($minhasreserva  != null) {
                            // Faça o que desejar com os registros pendentes
                            foreach ($minhasreserva as $reservas) {
                                echo '<div class="card pendentes">
                                        <h5 class="card-header">'. $reservas['nome'] .'</h5>
                                        <p>Local: '. $reservas['local'] .'</p>
                                        <p>Data Inicio: '. $reservas['datainicio'] .'</p>
                                        <p>Data Fim: '. $reservas['datafim'] .'</p>
                                        <p>Nº pessoas: '. $reservas['numeropessoas'] .'</p>
                                        <div class="card-body">
                                        </div>
                                    </div>';
                            }
                        } else {
                            echo "Não há Minhas Reservas.";
                        } 
  
                    ?>
                </div>

                <div class="" id="msg" >
                    <h2 id="idReserva" name="idChat"></h2>
                    <p id="idReservaInput"></p>

                    <div class="container chat-container">
                        <div id="chatbox">
                            <?php 

                                $minhasmsg = receberMsg(465);
                                if ($minhasmsg  != null) {
                                    
                                    foreach ($minhasmsg as $reservas) {
                                        if($reservas['autor'] == '1'){
                                            echo '<div class="message user-message">Guia: '. $reservas['msg'] .'</div>';

                                        } else {
                                            echo '<div class="message bot-message">Turista: '. $reservas['msg'] .'</div>';
                                        }
                                    }
                                } else {
                                    echo "Não há Mensagens.";
                                } 
                            ?>
                            
                        </div>
                        <input type="text" class="form-control" id="userInput" placeholder="Digite sua mensagem...">
                        <div class="input-group-append">
                        <a href="connect/enviarGuia.php?id=<?php echo $idReserva; ?>">
                       <button class="btn btn-primary" type="button" onclick="sendMessage()">Enviar</button>
                     </a>
                        </div>
                    </div>
                </div>
                <div class="" id="Reservafinalizada">
                    <h2> Minhas Reservas Finalizadas</h2>

                      <?php 
                         $id = $_SESSION['id'];
                       $minhasreserva = finalizarReservasConfirmadas($id);
                    
                        // Verifica se houve registros pendentes retornados
                       if ($minhasreserva  != null) {
                            // Faça o que desejar com os registros pendentes
                            foreach ($minhasreserva as $reservas) {
                                echo '<div class="card pendentes">
                                        <h5 class="card-header">'. $reservas['nome'] .'</h5>
                                        <p>Local: '. $reservas['local'] .'</p>
                                        <p>Data Inicio: '. $reservas['datainicio'] .'</p>
                                        <p>Data Fim: '. $reservas['datafim'] .'</p>
                                        <p>Nº pessoas: '. $reservas['numeropessoas'] .'</p>
                                        <div class="card-body">
                                        </div>
                                    </div>';
                            }
                        } else {
                            echo "Não há reservas finalizadas.";
                        } 
  
                    ?>
                </div>
                <div class="" id="listMsg">
                    <h2>Lista de mensagens</h2>
                    <?php
                    $id = $_SESSION['id'];
                    $minhasmsg =listarReservasConfirmadas($id);
                    
                    // Verifica se houve registros pendentes retornados
                   if ($minhasmsg  != null) {
                        // Faça o que desejar com os registros pendentes
                        foreach ($minhasmsg as $msg) {
                            
                            echo '<div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Cliente - '.$msg['nome'].'</h5>
                                        <p class="card-text">Reserva nº.'.$msg['id'].'</p>
                                        <a href="chat.php?id='.$msg['id'].'" class="btn btn-primary" onclick="changeCardGuia(\'msg\')">Abrir mensagem</a>
                                    </div>
                                
                                </div>';

                        }
                    } else {
                        echo "Não há reservas Confirmadas.";
                    } 
                    ?>
                </div>
            </div>
        </div>
    </div>

    </section>

    

    </form>

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