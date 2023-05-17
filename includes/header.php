

<link rel="shortcut icon" href="imagens/logo.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="js/funcao.js"></script>
  <link rel="stylesheet" href="css/estilogeral.css">
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
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" onmouseenter="ShowDropDown('dropServicos')">
                Serviços
              </a>
              <ul class="dropdown-menu" id="dropServicos" onmouseover="ShowDropDown('dropServicos')" onmouseout="closeDropDown('dropServicos')">
                <li><a class="dropdown-item" href="Guias.php">Guias</a></li>
                <li><a class="dropdown-item" href="Transportes.php">Transportes</a></li>
              
              </ul>
              
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" role="button" onmouseenter="ShowDropDown('dropparcerias')">
                Parcerias
              </a>
              <ul class="dropdown-menu" id="dropparcerias" onmouseover="ShowDropDown('dropparcerias')" onmouseout="closeDropDown('dropparcerias')">
                <li><a class="dropdown-item" href="hoteis.php">Hoteis</a></li>
                <li><a class="dropdown-item" href="Restaurantes.php">Restaurante</a></li>
              
              </ul>
              
            </li>
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" onmouseenter="ShowDropDown('dropInformações')">
                Informações
              </a>
              <ul class="dropdown-menu" id="dropInformações" onmouseover="ShowDropDown('dropInformações')" onmouseout="closeDropDown('dropInformações')">
                <li><a class="dropdown-item" href="Contacto.php">Contatos</a></li>
                <li><a class="dropdown-item" href="Forum.php">Forúm</a></li>
                <li><a class="dropdown-item" href="Hl.php">Historias e Línguas</a></li>
                <li><a class="dropdown-item" href="Galeria.php">Galeria</a></li>
                <li><a class="dropdown-item" href="VistoseMigracao.php">Visto e Migração</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" onmouseenter="ShowDropDown('dropMinhaconta')" onmouseout="closeDropDown('dropMinhaconta')">
                Minha Conta
              </a>
              <ul class="dropdown-menu" id="dropMinhaconta" onmouseover="ShowDropDown('dropMinhaconta')" onmouseout="closeDropDown('dropMinhaconta')">
                <li><a class="dropdown-item" href="login.php">login</a></li>
                <li><a class="dropdown-item ativo" href="Registar.php">Registar</a></li>
              
              </ul>
              
            </li>
          </ul>
          
        </div>
      </div>
    </nav>
  </header>