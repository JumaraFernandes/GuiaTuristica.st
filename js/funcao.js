

    function clictokRegis(tipo) {
      // Selecionar todos os cartões
      const cards = document.querySelectorAll(".card");
    
      // Percorrer todos os cartões e encontrar o cartão com o tipo correspondente
      cards.forEach(card => {
        if (card.id === tipo) {
          // Definir a borda para o cartão correspondente
          card.style.border = "5px solid #7BF1A8";


          if(tipo === 'turista'){
            document.getElementById('registoTurista').style.display = 'block';
            document.getElementById('registoGuia').style.display = 'none';
            document.getElementById('registoParceiro').style.display = 'none';
          } else if(tipo === 'guia'){
            document.getElementById('registoTurista').style.display = 'none';
            document.getElementById('registoGuia').style.display = 'block';
            document.getElementById('registoParceiro').style.display = 'none';
    
          } else if(tipo === 'parceiro'){
            document.getElementById('registoTurista').style.display = 'none';
            document.getElementById('registoGuia').style.display = 'none';
            document.getElementById('registoParceiro').style.display = 'block';
          
          }

        } else {
          // Remover a borda dos outros cartões
          card.style.border = "1px solid #000";
        }
      });

      function validarSenha() {
        var senha = document.getElementById("senha").value;
        var confirmaSenha = document.getElementById("confirma_senha").value;
        var valSenha = document.getElementById("valSenha");
      
        if (senha != confirmaSenha) {
          valSenha.innerHTML = "As senhas não correspondem.";
        } else {
          valSenha.innerHTML = "";
        }
      }
      
    }

    function ShowDropDown(id)
    {
        document.getElementById(id).style.display = 'block';
    }

    function closeDropDown(id) {
        document.getElementById(id).style.display = 'none';
    }
    var valido = true
function enviar()
{
    var nome = document.getElementById('nome').value
    var email = document.getElementById('email').value
    var dataEntrada = window.document.getElementById('dataEntrada').value
    var dataSaida = window.document.getElementById('dataSaida').value
    var adulto = Number(window.document.getElementById('adulto').value)
    var crianca = Number(window.document.getElementById('crianca').value)
    var res = document.getElementById('res')
    var check = document.getElementById('check')
    res.style.color = '#d62828'
    if(nome.length == 0 || email.length == 0 || dataEntrada.length == 0 || dataSaida.length == 0 || adulto.length == 0)
    {
        res.innerText = 'Erro!!! Por favor preenche todos os campos'
    }
    else if(!valido)
    {
        res.innerText = 'Verifica o seu email'
    }
    else if(!check.checked)
    {
        res.innerText = 'Por favor, aceita os termos de licença'
    }
    else
    {
        var inicio = new Date(dataEntrada)
        var fim = new Date(dataSaida)
        var diff = fim.getTime() - inicio.getTime();
        var dias = diff / (1000 * 60 * 60 * 24);
        if(dias > 0)
        {
            var total = (adulto * 50) + (crianca * 30)
            res.style.color = "green"
            res.innerText = `Preço Total: ${total}€`
        }
        else
        {
            res.innerText = 'Datas Inválidas'
        }
    }
}
function validarEmail(){
    var email = document.getElementById('email')
    var res = document.getElementById('valEmail')
    if(!email.checkValidity()){
        res.style.color = '#d62828'
        res.style.marginTop = '-20px'
        res.innerHTML = "Email invalido";  
        valido = false
    }
    else
    {
        res.innerText = ''
        valido = true
    }
}
function submit()
{
    alert("Funcionou")
}

function entrouT()
{
    var linha = document.getElementById('Azul')
    linha.style.backgroundColor = "#81b29a"
}
function saiu()
{
    var linha = document.getElementById('Azul')
    linha.style.backgroundColor = "#81b29a"
}
function entrouA()
{
    var linha = document.getElementById('Azul')
    linha.style.backgroundColor = "#a5a58d"
}
function entrouD()
{
    var linha = document.getElementById('Azul')
    linha.style.backgroundColor = "#00b4d8"
}
function submeter()
{
    var nome = document.getElementById('nome').value
    var email = document.getElementById('email').value
    var msg = document.getElementById('msg').value
    var res = document.getElementById('res')
    if(nome.length == 0 || email.length == 0 || msg.length == 0)
    {
        res.style.color = '#d62828'
        res.innerText = 'ERRO!!! Digite preenche todos os campos'
    }
    else
    {
        res.style.color = "green"
        res.innerText = 'Mensagem submetida com sucesso'
    }
}






 
  

