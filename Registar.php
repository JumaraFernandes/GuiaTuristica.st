
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
  <link rel="stylesheet" href="css/estiloRegistar.css">
   <script src="js/funcao.js"></script>
</head>
<body onload="setMinimumDate()">
  <!--cabeçalho-->
  <?php include 'includes/header.php' ?>
 
  <main> 
    <div class="corpo">
      <div class="card cardAtivo" id="turista" onclick="clictokRegis('turista')">
        <div class="card-body">
          <h5 class="card-title">Turista</h5>
          <p class="card-text">Registro para turistas</p>
        </div>
      </div>

      <div class="card" id="guia" onclick="clictokRegis('guia')">
        <div class="card-body">
          <h5 class="card-title">Guia</h5>
          <p class="card-text">Registro para guias turísticos</p>
          
        </div>
      </div>
      
      <div class="card" id="parceiro" onclick="clictokRegis('parceiro')">
        <div class="card-body">
          <h5 class="card-title">Parceiro</h5>
          <p class="card-text">Registro para Parceiro</p>
           
        </div>
      </div>
    </div>
    <section id="form">
      <form>
          <div>
              <label for="nome">Nome: <input type="text" id="nome" placeholder="Nome"></label>
              <label for="email">Email: <input type="email" id="email" placeholder="Email" onblur="validarEmail()"></label>
              <div id="valEmail"></div>
              <label for="telefone">Telefone: <input type="text" id="telefone" placeholder="telefone"></label>
              

              <div id="registoTurista">
                <label for="dataEntrada">Data Nacimento: <input type="date" id="dataNascimento"></label>
                <label for="sexo">Sexo: </label>
                <aside id="radioSexo">
                  <label for="masculino">Masculino <input type="radio" id="masculino" name="sexo" value="masculino" checked></label>
                  <label for="feminino">Feminino <input type="radio" id="feminino" name="sexo" value="feminino"></label>
                </aside>
                

              </div>
              <div id="registoGuia">
                <label for="numIdentificacao">Nº Identificação: <input type="text" id="numIdentificacao" placeholder="Insira o seu Nº de Identificação"></label>
                <label for="dataEntrada">Data Nacimento: <input type="date" id="dataEntrada"></label>
                <label for="localidade">Endereço <input type="text" id="endereco" placeholder="endereco"></label>
                <label for="experiencias">Experiencias <textarea name="" id="experiencias" cols="30" rows="3" placeholder="Informa as suas experiencias anteriores"></textarea></label>
                <label for="sexo">Sexo: </label>
                <aside id="radioSexo">
                  <label for="masculino">Masculino <input type="radio" id="masculino" name="sexo" value="masculino" checked></label>
                  <label for="feminino">Feminino <input type="radio" id="feminino" name="sexo" value="feminino"></label>
                </aside>

                <label for="idiomas">Idiomas:                   
                  <select id="idiomas" name="idiomas">
                    <option value="ingles">Ingles</option>
                    <option value="portugues">Portugues</option>
                    <option value="espanhol">Espanhol</option>
                    <option value="frances">Francês</option>
                  </select>
                </label>
                
              </div>

              <div id="registoParceiro">
                <label for="endereco">Endereço<input type="text" id="endereco" placeholder="endereco"></label>
                <label for="link">Link: <input type="text" id="link" placeholder="Insira o link"></label>
                <label for="link">Classificação: <br>
                  <div class="rating">
                      <input type='radio' hidden name='rate' id='rating-opt5' data-idx='0'>	
                      <label for='rating-opt5'></label>
                
                      <input type='radio' hidden name='rate' id='rating-opt4' data-idx='1'>
                      <label for='rating-opt4'></label>
                
                      <input type='radio' hidden name='rate' id='rating-opt3' data-idx='2'>
                      <label for='rating-opt3'></label>
                
                      <input type='radio' hidden name='rate' id='rating-opt2' data-idx='3'>
                      <label for='rating-opt2'></label>
                
                      <input type='radio' hidden name='rate' id='rating-opt1' data-idx='4'>
                      <label for='rating-opt1'></label>
                    </div>
                 
                </label>
                <label for="tipoParceiro">Tipo de parceiro:
                  <select id="tipoParceiro" name="tipoParceiro">
                    <option value="hotel">Hotel</option>
                    <option value="restaurante">Restaurante</option>
                  </select>
                </label>
                <label for="foto">Foto: <input type="file" id="foto" accept="image/*"></label>
              </div>

              <label for="senha">Senha: <input type="password" id="senha" placeholder="Senha"></label>
              <label for="confirma_senha">Confirme a senha: <input type="password" id="confirma_senha" placeholder="Confirme a senha" onblur="validarSenha()"></label>
              
            <input type="button" value="Enviar" onclick="enviar()">
          </div>
        </form>
</section>
    </main>
    
    <?php include 'includes/footer.php' ?>

  <script>
    // Obtém a data atual
    var dataAtual = new Date();

    // Define a data máxima permitida como hoje menos 18 anos
    var dataMaxima = new Date(dataAtual.getFullYear() - 18, dataAtual.getMonth(), dataAtual.getDate());
    var dataMaximaFormatada = dataMaxima.toISOString().split('T')[0];

    // Obtém o elemento de entrada de data
    var inputDataNascimento = document.getElementById('dataNascimento');

    // Define o limite máximo
    inputDataNascimento.setAttribute('max', dataMaximaFormatada);
  </script>

 

  

  
    
    
  
  
</body>
</html>



