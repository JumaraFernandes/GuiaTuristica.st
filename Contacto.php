<?php
    session_start();

    //caso não aconteceu
    $res = 0;

    //caso receber algum resolutado 
    if(isset($_GET['res'])){
      $res = $_GET['res'];
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
  <script src="js/funcao.js"></script>
  <link rel="stylesheet" href="css/estiloContacto.css">
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
  </svg>
</head>
<body style="background-color: #7BF1A8;">
  <?php include 'includes/header.php';

  //caso correu tudo bem
  if($res == 1){
    echo '<div class="alert alert-success d-flex" role="alert" style="height: 60px;">
    <svg style="width: 30px;" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
    <div>Mensagem enviado com sucesso!</div>
  </div>';
  } else if($res == -1){ //caso correu mal
    echo '<div class="alert alert-danger d-flex align-items-center" role="alert" style="height: 60px;">
    <svg style="width: 30px;" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
    <div>Houve erro submeter a mensagem!</div>
  </div>';
  }
  
  
  ?>
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