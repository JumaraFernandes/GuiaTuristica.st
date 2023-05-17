

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
function setMinimumDate() {
    var inputDate = document.getElementById('dataEntrada');
  
    // Defina a data máxima permitida como hoje menos 18 anos
    var today = new Date();
    var maxDate = new Date(today.getFullYear() - 18, today.getMonth(), today.getDate()).toISOString().split('T')[0];
    inputDate.setAttribute('max', maxDate);
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






 
  

