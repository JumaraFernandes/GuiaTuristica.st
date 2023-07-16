<?php
    session_start();
    $tipo = $_SESSION['tipo'];

    if($tipo !== 'turista'){
      header("location: guias.php");
    }

    //caso não aconteceu
    $res = 0;

    //caso receber algum resolutado 
    if(isset($_GET['res'])){
      $res = $_GET['res'];
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
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>
</head>
<body>
  <!--cabeçalho-->
  <?php include 'includes/header.php' ;
    require_once "connect/funcao.php";
    $guias = PesquisarTodosGuias();
    
    //caso correu tudo bem
    if($res == 1){
      echo '<div class="alert alert-success d-flex" role="alert" style="height: 60px;">
      <svg style="width: 30px;" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
      <div>Reserva registada com sucesso!</div>
    </div>';
    } else if($res == -1){ //caso correu mal
      echo '<div class="alert alert-danger d-flex align-items-center" role="alert" style="height: 60px;">
      <svg style="width: 30px;" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
      <div>Houve erro ao registar a reserva! Tente mais tarde!</div>
    </div>';
    }
      

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