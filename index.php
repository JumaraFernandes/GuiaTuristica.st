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
  <script src="js/funcao.js"></script>
  <link rel="stylesheet" href="css/estiloHome.css">
</head>
<body>
  <header id="cabecalho">

      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid topo">
          <div class="esquerda">
            <a class="navbar-brand" href="index.php"><img src="imagens/logo.png" alt="" width="50px" srcset="">Guia Turistica São Tomé e Principe</a>
          </div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse direita" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="index.php">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="sobre_nos.php">Sobre Nós</a>
              </li>
                <li class="nav-item">
                <a class="nav-link " aria-current="page" href="Guias.php">Guias</a>
                </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" role="button" onmouseenter="ShowDropDown('dropparcerias')" onmouseout="closeDropDown('dropparcerias')">
                  Parcerias
                </a>
                <ul class="dropdown-menu" id="dropparcerias" onmouseover="ShowDropDown('dropparcerias')" onmouseout="closeDropDown('dropparcerias')">
                  <li><a class="dropdown-item" href="hoteis.php">Hoteis</a></li>
                  <li><a class="dropdown-item" href="Restaurantes.php">Restaurante</a></li>
                
                </ul>
                
              </li>
              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" onmouseenter="ShowDropDown('dropInformações')" onmouseout="closeDropDown('dropInformações')">
                  Informações
                </a>
                <ul class="dropdown-menu" id="dropInformações" onmouseover="ShowDropDown('dropInformações')" onmouseout="closeDropDown('dropInformações')">
                  <li><a class="dropdown-item" href="Transportes.php">Transportes</a></li>
                  <li><a class="dropdown-item" href="Contacto.php">Contatos</a></li>
                  <li><a class="dropdown-item" href="Forum.php">Forúm</a></li>
                  <li><a class="dropdown-item" href="Hl.php">Historias e Línguas</a></li>
                  <li><a class="dropdown-item" href="Galeria.php">Galeria</a></li>
                  <li><a class="dropdown-item" href="VistoseMigracao.php">Visto e Migração</a></li>
                  <li><a class="dropdown-item" href="GastronomiaEclima.php">Gastronomia e Clima</a></li>
                </ul>
              </li>
              <?php
              if (isset($_SESSION['nome'])) {
                // Usuário está logado, exibe "Olá [nome do usuário]"
                $nomeUsuario = $_SESSION['nome'];
                echo '<li class="nav-item"><a class="nav-link" aria-current="page" href="Guias.php">Olá ' . $nomeUsuario . '</a></li>';
              } else {
                // Usuário não está logado, exibe "Minha Conta"
                echo '<li class="nav-item dropdown">';
                echo '<a class="nav-link dropdown-toggle" href="#" role="button" onmouseover="ShowDropDown(\'dropMinhaconta\')" onmouseout="closeDropDown(\'dropMinhaconta\')">Minha Conta</a>';
                echo '<ul class="dropdown-menu" id="dropMinhaconta" onmouseover="ShowDropDown(\'dropMinhaconta\')" onmouseout="closeDropDown(\'dropMinhaconta\')">';
                echo '<li><a class="dropdown-item" href="login.php">Login</a></li>';
                echo '<li><a class="dropdown-item ativo" href="Registar.php">Registar</a></li>';
                echo '</ul>';
                echo '</li>';
              }
            ?>
            </ul>
            
          </div>
        </div>
      </nav>
      <div class="titulo">
        <h2>Bem Vindo à São Tomé e Príncipe</h2>
        <p>Descubra a beleza intocada de São Tomé e Príncipe, um paraíso tropical único no coração </p>
        <p>do Oceano Atlântico. </p>
      </div>
    
  </header>

   <main> 
    <div class="corpo">
      <p>O que podemos lhe mostrar</p>
      <h2>Atrações de São Tomé e Principe</h2>
      <p>Descubra as exóticas praias, florestas tropicais exuberantes, plantações de cacau e café, museus, além da rica história colonial e cultura afro-portuguesa que tornam São Tomé e Príncipe um destino turístico imperdível na África. </p>
    </div>
    <section class="atracoes navbar-expand-lg">
      <div class="card">
        <img src="imagens/museu.jpeg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5>Museu do café</h5>
          <p class="card-text">O Museu do Café em São Tomé e Príncipe oferece uma viagem pela história da cultura do cultivo de café, desde a plantação até ao produto final. </p>
        </div>
      </div>
        <div class="card">
          <img src="imagens/marco.jpeg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5>Marco do Equador</h5>
            <p class="card-text">O Marco do Equador é uma atração turística em São Tomé e Príncipe, que marca a linha imaginária do equador e oferece uma experiência única aos visitantes. </p>
          </div>
        </div>
        <div class="card">
          <img src="imagens/parque.jpeg" class="card-img-top" alt="...">
          <h5>Parque Natural de Obó</h5>
          <div class="card-body">
            <p class="card-text">O Parque Natural Obô é um santuário de fauna e flora com elevado endemismo em São Tomé e Príncipe </p>
          </div>
        </div>
        <div class="card">
          <img src="imagens/roça.jpeg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5>Roça Sundy</h5>
            <p class="card-text">A Roça Sundy é uma antiga plantação de cacau transformada em eco-resort de luxo, localizada na ilha do Príncipe em São Tomé e Príncipe.</p>
          </div>
        </div> 
    </section>
    <div class="button-container">
      <a href="Galeria.php" class="my-button">Bora</a>
    </div>
   </main>

   <?php include 'includes/footer.php' ?>
  
</body>
</html>