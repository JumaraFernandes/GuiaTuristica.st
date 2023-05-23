<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Guia Turistica - STP</title>
  
  <link rel="shortcut icon" href="imagens/logo.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/estilogeral.css">
  <link rel="stylesheet" href="css/estilotransportes.css">
  <script src="../js/funcao.js"></script>

</head>
<body>
  <!--cabeçalho-->
  <?php include 'includes/header.php' ?>
   
  <main>

    <div class="corpo">
      <h1>Transportes</h1>
      <section class="transportes">
        <div class="card rent">
          <div class="card-body">
            <h3>Rent-a-Car</h3>
            <i class="bi bi-arrow-right"></i>
          </div>
          <div class="cardAnimacao"></div>
        </div>
        <div class="card taxi">
          <div class="card-body">
          <h3>Táxis</h3>
          <i class="bi bi-arrow-right"></i>
          </div>
          <div class="cardAnimacao"></div>
        </div>  
        <div class="card aluguer">
          <div class="card-body">
            <h3>Aluguer de Embarcações</h3>
            <i class="bi bi-arrow-right"></i>
          </div class="card">
          <div class="cardAnimacao"></div>
        </div>
        <div class="card compahias">
          <div class="card-body">
            <h3>Companhias Aéreas</h3>
            <i class="bi bi-arrow-right"></i>
          </div>
          <div class="cardAnimacao"></div>
        </div>
      </section>
    </div>
         
  </main>
       
  

    <?php include 'includes/footer.php' ?>
  
  
</body>
</html>