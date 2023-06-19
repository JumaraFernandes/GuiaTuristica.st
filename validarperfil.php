<?php
  $email = $_GET['email'];
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
  <link rel="stylesheet" href="css/estilogeral.css">
  <style>
      main {
      height: 100%;
      margin: 0;
      display: flex;
      align-items: center;
      justify-content: center;
    }
     
      /* Estilos para o botão enviar */
    .submit-button {
      background-color: #7BF1A8; /* Cor de fundo */
      color: white; /* Cor do texto */
      padding: 10px 20px; /* Espaçamento interno */
      border: none; /* Remover a borda */
      border-radius: 4px; /* Arredondamento dos cantos */
      cursor: pointer; /* Cursor de apontar */
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
    
  <main > 
    <div class="corpo">
      <form action="connect/validar_registro.php" method="POST">
        <label for="codigo">Email</label>
        <input type="hidden" name="email" id="email" value="<?php echo $email ?>">
        <input type="text" id="emailTurista" name="emailTurista" placeholder="Digite seu email..." required><br><br>
        <input type="submit" name="submit" value="Validar Registro" class="submit-button">
      </form>
    </div>
    </main>

 
  
  
</body>
</html>
