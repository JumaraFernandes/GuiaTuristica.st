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
  <link rel="stylesheet" href="css/estilogaleria.css">
</head>
<body>
  <!--cabeçalho-->
  <?php include 'includes/header.php' ?>
  <main> 
    <section id="portifolio">
        <div id="texto">
            <h2>Galaria</h2>
            <p>Algumas fotos do nosso Pais</p>
        </div>
        <div id="galeria">

        <?php
        // Criar vetor de nomes de imagem
        $imagens = array("imagem1.jpg", "imagem2.jpg", "imagem3.jpg", "imagem4.jpg", "imagem5.jpg", "imagem6.jpg", "imagem7.jpg", "imagem8.jpg", "imagem9.jpg", "imagem10.jpg", "imagem11.jpg", "imagem1.jpg", "imagem2.jpg", "imagem3.jpg", "imagem4.jpg", "imagem5.jpg", "imagem6.jpg", "imagem7.jpg", "imagem8.jpg", "imagem9.jpg", "imagem10.jpg", "imagem11.jpg");

        // Iterar sobre o vetor para exibir as imagens
        for ($i = 0; $i < count($imagens); $i++) {
            ?>
            <img src="imagens/<?php echo $imagens[$i]; ?>" alt="Imagem do país">
            <?php
        }
        ?>

        </div>
    </section>

    </div>
    </main>

    <?php include 'includes/footer.php' ?>
  
  
</body>
</html>


