<?php
    session_start();
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
  <script src="js/funcao.js"></script>
  <link rel="stylesheet" href="css/estiloContacto.css">
</head>
<body style="background-color: #7BF1A8;">
  <?php include 'includes/header.php' ?>
  <main> 
    <section id="contact">
      <h3>Contatos</h3>
      <aside id="cont">
          <aside id="infor">
              <div class="conts">
                  <div class="icons">
                    <i class="bi bi-geo-alt"></i>
                  </div>
                  <div>
                      <h6>Endereço</h6>
                      <p><a href="https://www.google.com/maps/dir//R.+Irene+Lisboa+1,+2900-028+Set%C3%BAbal/@38.5305507,-8.9036547,17z/data=!4m9!4m8!1m0!1m5!1m1!1s0xd1943047e414a01:0x318bdf6911d10f3a!2m2!1d-8.901466!2d38.5305507!3e0">Rua Irene Lisboa, nº 1 , 2900-028 Setúbal (Portugal)</a></p>
                  </div>
              </div>
              <div class="conts">
                  <div class="icons">
                    <i class="bi bi-telephone-fill"></i>
                  </div>
                  <div>
                      <h6>Telefone</h6>
                      <p>+351938098673</p>
                      <p>+351989067456</p>
                  </div>
              </div>
              <div class="conts">
                  <div class="icons">
                    <i class="bi bi-envelope-fill"></i>
                  </div>
                  <div>
                      <h6>Email</h6>
                      <p><a href="mailto:guiaturistica.st@gmail.com">guiaturistica.st@gmail.com</a></p>
                  </div> 
              </div>
          </aside>
          <aside id="enviar">
            <form action="connect/enviarEmail.php" method="POST">
                  <h3>Sua Mensagem</h3>
                  <div>
  
                      <label for="nome">Nome: <input type="text" name="nome"  id="nome"  placeholder="Nome Completo"></label>
                      <label for="email">Email: <input type="email" name="email" id ="email" onblur="validarEmail()" placeholder="Email"></label>
                      <div id="valEmail"></div>
                      <label for="msg">Digite sua mensagem: <textarea name="msg" id="msg" cols="30" rows="3" placeholder="Sua Mensagem"></textarea></label>
                      <input type="submit" name="submit" value="Submeter">
                      <div id="res"></div>
                  </div>
              </form>
          </aside>
      </aside>
    </section>
  </main>
  
</body>
</html>