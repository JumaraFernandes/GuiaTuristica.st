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
  <link rel="stylesheet" href="css/estilogeral.css">
  <link rel="stylesheet" href="css/estiloguia.css">
</head>
<body>
  <!--cabeçalho-->
  <?php include 'includes/header.php' ?>
  <main> 
      <div class="corpo">
        <h1>Nossos Guias</h1>
      </div>
      <section class="guias">
        <div class="card">
          <img src="imagens/guia.1.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5>Carlos Amaro</h5>
            <ul>
              <li>Idade:27 anos</li>
              <li>Nacionalidade: Santomense</li>
              <li> Especialidades :</li>
              <li>História local e cultura</li>
              <li> Ecoturismo e atividades ao ar livre</li>
              <li> Gastronomia e culinária local</li>
              <li> Idiomas falados: </li>
              <li> Português (nativo) </li>
              <li> Inglês (fluente) </li>
              <li> Francês (intermediário) </li>
              <li>Experiências:</li>
              <li>Guia turístico em São Tomé e Príncipe há 5 anos</li>
              <li> Trabalhou com turistas de diferentes nacionalidades</li>
              <li> Certificado em Primeiros Socorros e Segurança em Turismo</li>
            </ul>
          </div>
          <div class="button-container">
            
            <button class="my-button" onclick="window.location.href = 'Reservas.php'">Reserva</button>
            
          </div>
        </div>
          <div class="card">
            <img src="imagens/guia.2.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5>Jão Gomes</h5>
              <ul>
                <li>Idade:27 anos</li>
                <li>Nacionalidade: Santomense</li>
                <li> Especialidades :</li>
                <li>História local e cultura</li>
                <li> Ecoturismo e atividades ao ar livre</li>
                <li> Gastronomia e culinária local</li>
                <li> Idiomas falados: </li>
                <li> Português (nativo) </li>
                <li> Inglês (fluente) </li>
                <li> Francês (intermediário) </li>
                <li>Experiências:</li>
                <li>Guia turístico em São Tomé e Príncipe há 5 anos</li>
                <li> Trabalhou com turistas de diferentes nacionalidades</li>
                <li> Certificado em Primeiros Socorros e Segurança em Turismo</li>
              </ul>
            </div>
            <div class="button-container">
              <button class="my-button" onclick="window.location.href = 'Reservas.php'">Reserva</button>
            </div>
          </div>
          <div class="card">
            <img src="imagens/guia.3.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5>Miguel Monteiro</h5>
              <ul>
                <li>Idade:27 anos</li>
                <li>Nacionalidade: Santomense</li>
                <li> Especialidades :</li>
                <li>História local e cultura</li>
                <li> Ecoturismo e atividades ao ar livre</li>
                <li> Gastronomia e culinária local</li>
                <li> Idiomas falados: </li>
                <li> Português (nativo) </li>
                <li> Inglês (fluente) </li>
                <li> Francês (intermediário) </li>
                <li>Experiências:</li>
                <li>Guia turístico em São Tomé e Príncipe há 5 anos</li>
                <li> Trabalhou com turistas de diferentes nacionalidades</li>
                <li> Certificado em Primeiros Socorros e Segurança em Turismo</li>
              </ul>
            </div>
            <div class="button-container">
              <button class="my-button" onclick="window.location.href = 'Reservas.php'">Reserva</button>
            </div>
          </div>
          <div class="card">
            <img src="imagens/guia4.avif" class="card-img-top" alt="...">
            <div class="card-body">
              <h5>Pedro Santana</h5>
              <ul>
                <li>Idade:27 anos</li>
                <li>Nacionalidade: Santomense</li>
                <li> Especialidades :</li>
                <li>História local e cultura</li>
                <li> Ecoturismo e atividades ao ar livre</li>
                <li> Gastronomia e culinária local</li>
                <li> Idiomas falados: </li>
                <li> Português (nativo) </li>
                <li> Inglês (fluente) </li>
                <li> Francês (intermediário) </li>
                <li>Experiências:</li>
                <li>Guia turístico em São Tomé e Príncipe há 5 anos</li>
                <li> Trabalhou com turistas de diferentes nacionalidades</li>
                <li> Certificado em Primeiros Socorros e Segurança em Turismo</li>
              </ul>
            </div>
            <div class="button-container">
              <button class="my-button" onclick="window.location.href = 'Reservas.php'">Reserva</button>
            </div>
          </div>
      </section>
    </div>
    </main>
  <!--Rodapé-->
  <?php include 'includes/footer.php' ?>
  
</body>
</html>