<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Guia Turistica - Minha conta</title>
  <link rel="shortcut icon" href="imagens/logo.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/estiloPerfil.css">
  <script src="../js/funcao.js"></script>
</head>
<body>
    <!--cabeçalho-->

    <?php include 'includes/header.php' ?>
    <?php
    // Verificar se o usuário está logado
    if (!isset($_SESSION['nome'])) {
    // Redirecionar o usuário para a página de login
    header("Location: login.php");
    exit(); // Certifique-se de sair do script após o redirecionamento
    }

    // Resto do código da página de perfil
    require_once "connect/conexaobd.php";
    require_once "connect/funcao.php";

    $perfilUsuario = PesquisarAdmin($conn,$_SESSION['email']);
     
    ?>
  
    <section> 
    <div class="container">
        <div class="row">
            <div class="col-6 col-sm-4">
                <div onclick="changeCardAdmin('perfil')">
                    <div class="opcao">
                        <i class="bi bi-person-circle"></i>
                        <p>Minha Conta</p>
                        <i class="bi bi-chevron-right"></i>
                    </div>

                </div>
                <div onclick="changeCardAdmin('pedidos')">
                    <div class="opcao">
                    <i class="bi bi-exclamation-octagon"></i>
                        <p> registros pendentes  </p>
                        <i class="bi bi-chevron-right"></i>
                    </div>

                </div>
                <div onclick="changeCardAdmin('pedidos')">
                    <div class="opcao">
                    <i class="bi bi-person-plus-fill"></i>
                        <p> Total de guias </p>
                        <i class="bi bi-chevron-right"></i>
                    </div>

                </div>

                <div>
                    <a href="connect/logout.php" class="opcao">
                        <i class="bi bi-box-arrow-right"></i>
                        <p>Logout</p>
                        <i class="bi bi-chevron-right"></i>
                     </a>
                </div>
            </div>
            <div class="col">
                <div class="" id="perfil" >
                    <h2>DadosPessois</h2>
                    
     <form class="row g-3 needs-validation" action="connect/atualizarAdmin.php" method="post">
    <div class="col-md-4 position-relative">
    <label for="validationTooltip01" class="form-label">Nome</label>
    <?php echo '<input type="text" class="form-control disabled" id="validationTooltip01" value="'. $perfilUsuario['Nome'] .'" readonly>'?>
  </div>

  <div class="col-md-4 position-relative">
    <label for="validationTooltipUsername" class="form-label">Email</label>
    <div class="input-group has-validation">
      <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
      <?php echo ' <input type="text" class="form-control" id="validationTooltipUsername" value="'. $perfilUsuario['Email'] .'" readonly>'?>
    </div>
  </div>

  <div class="col-md-3 position-relative">
    <label for="validationTooltip05" class="form-label">Telefone</label>
    <?php echo '  <input type="text" class="form-control" name="telefone" id="validationTooltip05" value="'. $perfilUsuario['Telefone'] .'" required>'?>
  </div>


  <div class="col-12">
    <button class="btn btn-primary" type="submit" name="submit">Guardar Alterações</button>
  </div>
    </form>
                </div>
                <div class="" id="pedidos" >
                    <h2>Pedidos</h2>
                    <div class="card">
                        <h5 class="card-header">Guia - Tatiana Silva</h5>
                        <div class="card-body">
                            <a href="#" class="btn btn-primary btCancelar">Cancela</a>
                            <a href="#" class="btn btn-primary btCancelar">Aceita</a>
                        </div>
                    </div>
                </div>
               
                    </div>
                </div>
            </div>
        </div>
    </div>

    </section>


      
  
  
</body>
</html>