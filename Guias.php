<?php
    session_start();
    
    if (isset($_SESSION['nome'])) {
      $tipo = $_SESSION['tipo'];
    } else{
      $tipo = 'NOBODY';
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
  <link rel="stylesheet" href="css/estilogeral.css">
  <link rel="stylesheet" href="css/estiloguia.css">
</head>
<body>
  <!--cabeçalho-->
  <?php include 'includes/header.php';

  require_once "connect/funcao.php";
  $guias = PesquisarTodosGuias();


  ?>

  <main> 
      <div class="corpo">
        <h1>Nossos Guias</h1>
      </div>
      <section class="guias">
  <?php 
    if (!empty($guias)) {
      echo '<div class="row">';
      
      foreach ($guias as $guia) {
        echo '<div class="col-md-4">';
        echo '<div class="card">';
        echo '<img src="imagens/hotelpestana.jpg" class="card-img-top" alt="...">';
        echo '<div class="card-body">';
        echo '<h5>'.$guia['Nome'].'</h5>';
        echo '<p class="card-text">Idade: '.$guia['idade'].' anos</p>';
        echo '<p class="card-text">Telefone: '.$guia['Telefone'].'</p>';
        echo '<p class="card-text">Experiências: '.$guia['Experiencias'].'</p>';
        echo '</div>';
        
        if ($tipo === 'turista') {
          echo '<div class="button-container">';
          echo '<a class="my-button" href="Reservas.php">Reserva</a>';
          echo '</div>';
        }
        
        echo '</div>'; // fechando a div com a classe "card"
        echo '</div>'; // fechando a div com a classe "col-md-4"
      }
      
      echo '</div>'; // fechando a div com a classe "row"
    } else {
      echo "Nenhum guia encontrado.";
    }
  ?>
</section>

    </div>
    </main>
  <!--Rodapé-->
  <?php include 'includes/footer.php' ?>
  
</body>
</html>