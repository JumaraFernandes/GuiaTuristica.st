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
  <link rel="stylesheet" href="css/estiloPerfilTurista.css">
</head>
<body style="background-color: #7BF1A8;">
  <!--cabeçalho-->
  <?php include 'includes/header.php' ?>
  
  <main> 
    <div class="corpo">

        <form action="connect/login.php" method="post"> 
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" name="email"  placeholder="name@example.com">
          </div>
          <label for="inputPassword5" class="form-label">Password</label>
          <input type="password" id="inputPassword5"  name="senha" class="form-control" aria-labelledby="passwordHelpBlock">
          <div id="passwordHelpBlock" class="form-text">
            Sua senha deve ter de 8 a 20 caracteres, conter letras e números e não deve conter espaços, caracteres especiais ou emoji.
          </div>
          <div class="col-auto">
          <input type="submit" name="submit" value="Entrar">
          </div>
          <div>
            <a href="Registar.php">Registar</a>
            <a href="#">|</a>
            <a href="senhaPerdida.php">Esqueceu sua senha?</a>

          </div>

        </form>

    </div>
    </main>

      
  
  
  
</body>
</html>