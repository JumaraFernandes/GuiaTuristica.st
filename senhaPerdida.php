

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
  <link rel="stylesheet" href="css/estilogeral.css">
  <style>
  /* Estilos para centralizar o conteúdo */
    section {
      height: 100%;
      margin: 0;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    /* Estilos para o formulário */
    .form-container {
      text-align: center;
    }
    /* Estilos para o botão enviar */
    .submit-button {
      background-color:#7BF1A8;  /* Cor de fundo */
      color: white; /* Cor do texto */
      padding: 10px 20px; /* Espaçamento interno */
      border: none; /* Remover a borda */
      border-radius: 4px; /* Arredondamento dos cantos */
      cursor: pointer; /* Cursor de apontar */
    }
     .corpo{
      margin-top: 200px;
     }
    .submit-button:hover {
      background-color: #45a049; /* Cor de fundo ao passar o mouse */
    }

    body{
    height: 700px;
    background: #7BF1A8;
  }
  form{
    margin: auto;
      width: 400px;
      background-color: #fff;
      padding: 50px;
      border-radius: 30px;
      margin-top: -50px;
      text-align: center;
  }
  
  </style>
</head>
<body>
  <!--cabeçalho-->
  <?php include 'includes/header.php' ?>


  <main> 
   <section>
        <div class="corpo">
          <form action="connect/SenhaPerdida.php" method="post">
            <div id="FormEmail">
              <div id="form-container"  class="form-container FormEmail">
                <h1>Recuperação de Senha</h1>
                <p>Informe seu endereço de e-mail para redefinir sua senha:</p>
                  <label for="email">E-mail:</label>
                  <input type="email" id="email" name="email" required><br><br>
                  <input type="submit" name="submit"  value="Enviar" class="submit-button" >
              </div>
            </div>
            <div id="FormPassword">
              <div id="reset-container" class="reset-container FormPassword">
                <h1>Renomear Senha</h1>
                <label for="new-password">Nova Senha:</label>
                <input type="password" id="new-password" name="new-password" required><br><br>
                <input type="submit" name="salvar" value="Salvar" class="submit-button">
              </div>

            </div>
          </form>
        </div>
    </section>
  </main>
  <?php
  if(isset($_GET['estado'])){
    $estado = $_GET['estado'];
    //se receber true
    if($estado){
      echo '  <script>
      document.getElementById("FormEmail").style.display = "none";
      document.getElementById("FormPassword").style.display = "block";
    </script>';
    } else{
      echo '  <script>
      document.getElementById("FormEmail").style.display = "block";
      document.getElementById("FormPassword").style.display = "block";
    </script>';
    }
    //caso receber false;
  } else{
    echo '  <script>
    document.getElementById("FormEmail").style.display = "block";
    document.getElementById("FormPassword").style.display = "none";
  </script>';
  }
?>
</body>
</html>


