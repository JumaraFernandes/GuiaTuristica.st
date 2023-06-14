<?php
    session_start();
    $tipo = $_SESSION['tipo'];

    if($tipo !== 'turista'){
      header("location: guias.php");
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
  <link rel="stylesheet" href="css/estiloReserva.css">
  <script src="../js/funcao.js"></script>
</head>
<body>
  <!--cabeçalho-->
  <?php include 'includes/header.php' ;
    require_once "connect/funcao.php";
    $guias = PesquisarTodosGuias();
    ?>
  <main> 
    <div class="corpo">
      <h1>Reserva</h1>
      <section id="form">
            <form action="connect/reserva.php" method="post">
                <h3>Faça a sua Reserva</h3>
                <div>
                    <label for="dataEntrada">Data Inicio: <input type="date" id="dataEntrada" name="datainicio" onchange="validarData()"></label>
                    <label for="dataSaida" >Data Fim: <input type="date" id="dataSaida" name="datafim"></label>
                    <label for="Pessoas">Nº Pessoas: <input type="number" id="adulto" name="numeropessoas" placeholder="Número de Adultos" min="1"></label>
                    <label for="Local">Local:                   
                      <select id="Local" name="local">
                        <option value="Parquue">Parque Natural de Obó</option>
                        <option value="roca">Roça Sundy</option>
                        <option value="marco">Marco do Equador</option>
                        <option value="museu">Museu do café</option>
                      </select>
                    </label>
                      <?php if (!empty($guias)) { ?>
                  <label for="Guia">Escolher o Guia:</label>
                  <select id="Guia" name="Guia">
                      <?php foreach ($guias as $guia) { ?>
                          <option value="<?php echo $guia['ID']; ?>"><?php echo $guia['Nome']; ?></option>
                      <?php } ?>
                  </select>
              <?php } else { ?>
              <p>Nenhum guia encontrado.</p>
              <?php } ?>
                </div> 
                <label for="check"><input type="checkbox" name="" id="check"> Aceito os termos de lincença</label>
                <input type="submit" name="submit" value="Enviar">
                <div id="res"></div>
            </form>
    </section>
    </div>
    </main>

    <?php include 'includes/footer.php' ?>
  
    <script>
     var dataAtual = new Date();

    // Formata a data atual no formato necessário (ano-mês-dia)
    var dataAtualFormatada = dataAtual.toISOString().split('T')[0];

    // Atribui a data atual ao atributo min do campo de entrada de data
    document.getElementById("dataEntrada").min = dataAtualFormatada;


    </script>
  
</body>
</html>