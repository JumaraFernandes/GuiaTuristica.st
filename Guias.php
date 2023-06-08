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
          if (!empty($guias)) {?>
          
            <?php foreach ($guias as $guia) {
              
                echo '<div class="card">
                <img src="imagens/guia.1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5>'. $guia['Nome'] .'</h5>
                  <ul>
                    <li>Idade:'. $guia['dataNascimento'] .' anos</li>
                    <li>Telefone:'. $guia['Telefone'] .' </li>
                    <li>Experiências: '. $guia['Experiencias'] .' </li>
                  </ul>
                </div>';
                if($tipo === 'turista'){
                  echo '<div class="button-container">
                  <a class="my-button" href="Reservas.php">Reserva</a>
                  </div>';
                }
                echo '</div>';
            }
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