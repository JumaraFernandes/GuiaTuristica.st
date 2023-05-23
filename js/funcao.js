


function clictokRegis(tipo) {
  // Selecionar todos os cartões
  const cards = document.querySelectorAll(".card");
  const tipoInput = document.getElementById("tipo");

  // Percorrer todos os cartões e encontrar o cartão com o tipo correspondente
  cards.forEach(card => {
    if (card.id === tipo) {
      // Definir a borda para o cartão correspondente
      card.style.border = "5px solid #7BF1A8";

      if (tipo === 'turista') {
        document.getElementById('registoTurista').style.display = 'block';
        document.getElementById('registoGuia').style.display = 'none';
        document.getElementById('registoParceiro').style.display = 'none';
        tipoInput.value = "registoTurista";
      } else if (tipo === 'guia') {
        document.getElementById('registoTurista').style.display = 'none';
        document.getElementById('registoGuia').style.display = 'block';
        document.getElementById('registoParceiro').style.display = 'none';
        tipoInput.value = "registoGuia";
      } else if (tipo === 'parceiro') {
        document.getElementById('registoTurista').style.display = 'none';
        document.getElementById('registoGuia').style.display = 'none';
        document.getElementById('registoParceiro').style.display = 'block';
        tipoInput.value = "registoParceiro";
      }
    } else {
      // Remover a borda dos outros cartões
      card.style.border = "1px solid #000";
    }
  });
}



    $(document).ready(function() {
      $('#enviar').click(function() {
        var textoLabel = $('label[for="meuLabel"]').text();
        
        $.ajax({
          url: 'seu_arquivo_php.php',
          type: 'POST',
          data: { texto: textoLabel },
          success: function(response) {
            console.log('Dados enviados com sucesso!');
            console.log(response);
          },
          error: function(xhr, status, error) {
            console.log('Erro ao enviar os dados.');
            console.log(error);
          }
        });
      });
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
  
 


