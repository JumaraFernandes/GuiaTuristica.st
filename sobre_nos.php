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
  <link rel="stylesheet" href="css/estilogeral.css">
  <link rel="stylesheet" href="css/estiloSobre.css">
</head>
<body>
  <!--cabeçalho-->
  <?php include 'includes/header.php' ?>
  <main> 
    <div class="tituloSobre">
      <span>Deixe-nos apresentar</span>
      <h1>SOBRE A NOSSA EMPRESA</h1>
      <p>Bem-vindo à nossa empresa, a sua melhor escolha para explorar as belezas naturais e culturais de São Tomé e Príncipe com guias especializados e experientes. </p>
      <hr>
    </div>
    <div class="lado">
      <div>
        <span>Administradora</span>
        <h1>Jumara  Fernandes</h1>
        <p>uma empreendedora de 25 anos que transformou sua paixão por viagens em um negócio bem-sucedido em São Tomé e Príncipe.</p>
        <a href="mailto:jumaraandrade4@gmail.com"><i class="bi bi-envelope-fill"></i> jumaraandrade4@gmail.com</a>
      </div>
      <div>
        <img src="imagens/foto.jpeg" alt="" width="500px">
      </div>
    </div>
    <div class="missaovisao">         
       <h2>Missão e visão</h2>
       <p> Guia Turística de São Tomé e Príncipe </p>
       <div>
       <h3>Missão </h3>
       <ul>
        <li>Promover São Tomé e Príncipe como destino turístico;</li>
        <li>Promover e divulgar as belezas naturais e culturais de São Tomé e Príncipe</li>
        <li>Contribuir para o desenvolvimento sustentável do turismo em São Tomé e Príncipe </li>
        <li>Proporcionar experiências autênticas e memoráveis aos nossos clientes.</li>
        <li>Proporcionar experiências autênticas e memoráveis aos nossos clientes.</li>
        <li>Oferecer serviços de qualidade para os turistas que visitam o país</li>
        <li>Valorizar e respeitar a cultura e as tradições locais</li>
       </ul>
      </div>
      <div class="visao">
        <h3>visão</h3>
        <ul>
          <li>Ser reconhecido como um guia confiável e de qualidade para os visitantes de São Tomé e Príncipe</li>
          <li>Tornar-se a principal referência em turismo em São Tomé e Príncipe</li>
          <li>Um compromisso</li>

        </ul>
      </div>
      
    </div>
    </main>

    <?php include 'includes/footer.php' ?>
  
  
</body>
</html>