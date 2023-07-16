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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/estilogeral.css">
  <link rel="stylesheet" href="css/estiloforum.css">
  <script src="js/funcao.js"></script>

</head>
<body>
  <?php include 'includes/header.php';
  require_once "connect/funcao.php";
  $resultados = PesquisarExperiencias();
  ?>

  <main> 
    <div class="corpo">

      <h1>Forum</h1>
      
      <!-- Área para postagens -->
<?php if ($tipo === 'turista') { ?>
  <div>
    <h2>Compartilhe suas experiências:</h2>
    <form class="compar-form" action="connect/forum.php" method="POST">
      <input type="text" placeholder="Título do tópico" name="titulo" required><br>
      <textarea placeholder="Digite sua mensagem..." name="conteudo" required oninput="contarCaracteres(this)"></textarea><br>
      <p id="contador">0/512 carateres</p>
      <button type="submit" name="submit">Publicar</button>
    </form>
  </div>
<?php } ?>

<!-- Lista de tópicos -->
<form class="excluir-form" action="connect/excluirExperiencias.php" method="POST">
  <?php 
     $totalExperiencias = count($resultados);
     for ($i = $totalExperiencias - 1; $i >= 0; $i--) {
       $experiencia = $resultados[$i];
      echo '<input type="hidden" name="experienciaID" value="'. $experiencia['id'] .'">';
      echo '<p><i class="bi bi-person-circle"></i> ' . $experiencia['nome'] . '</p>';
      echo '<h3>' . $experiencia['titulo'] . '</h3>';
      echo '<p>' . $experiencia['conteudo'] . '</p>';
      echo '<p> ' . $experiencia['data'] .'</p>';
      
      if ($tipo === 'admin') {
        echo '<button type="submit" name="submit">Excluir</button>';
      }
    }
  
  ?>
</form>


    </div>
  </main>

  <!--Rodapé-->
  <?php include 'includes/footer.php' ?>
  <script>
    function contarCaracteres(textarea) {
      const maxCaracteres = 512;
      let conteudo = textarea.value;
      
      if (conteudo.length > maxCaracteres) {
        textarea.value = conteudo.slice(0, maxCaracteres); // Limita o texto ao tamanho máximo
      }

      const numCaracteres = textarea.value.length;
      document.getElementById("contador").innerText = numCaracteres + "/" + maxCaracteres + " caracteres";
    }
  </script>
  
  
</body>
</html>