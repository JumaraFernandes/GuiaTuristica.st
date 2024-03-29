


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
  

  
  function changeCardTurista(tipo) {
    if (tipo === 'perfil') {
        document.getElementById('perfil').style.display = 'block';
          document.getElementById('reservas').style.display = 'none';
          document.getElementById('msg').style.display = 'none';
          document.getElementById('listMsg').style.display = 'none';
          
            
        } else if (tipo === 'reservas') {
            document.getElementById('perfil').style.display = 'none';
            document.getElementById('reservas').style.display = 'block';
            document.getElementById('msg').style.display = 'none';
            document.getElementById('listMsg').style.display = 'none';
        } else if (tipo === 'msg') {
            document.getElementById('perfil').style.display = 'none';
            document.getElementById('reservas').style.display = 'none';
            document.getElementById('msg').style.display = 'block';
            document.getElementById('listMsg').style.display = 'none';
        } else if (tipo === 'listMsg') {
            document.getElementById('listMsg').style.display = 'block';
            document.getElementById('perfil').style.display = 'none';
            document.getElementById('reservas').style.display = 'none';
            document.getElementById('msg').style.display = 'none';
        }

    }

  function changeCardGuia(tipo) {
    
    if (tipo === 'perfil') {
        document.getElementById('perfil').style.display = 'block';
          document.getElementById('reservas').style.display = 'none';
          document.getElementById('msg').style.display = 'none';
          document.getElementById('listMsg').style.display = 'none';
          document.getElementById('minhasRerserva').style.display = 'none';
          document.getElementById('Reservafinalizada').style.display = 'none';
          
            
        } else if (tipo === 'reservas') {
            document.getElementById('perfil').style.display = 'none';
            document.getElementById('reservas').style.display = 'block';
            document.getElementById('msg').style.display = 'none';
            document.getElementById('listMsg').style.display = 'none';
            document.getElementById('minhasRerserva').style.display = 'none';
            document.getElementById('Reservafinalizada').style.display = 'none';
        } else if (tipo === 'msg') {
            document.getElementById('perfil').style.display = 'none';
            document.getElementById('reservas').style.display = 'none';
            document.getElementById('msg').style.display = 'block';
            document.getElementById('listMsg').style.display = 'none';
            document.getElementById('minhasRerserva').style.display = 'none';
            document.getElementById('Reservafinalizada').style.display = 'none';

          } else if (tipo === 'minhasRerserva') {
            document.getElementById('perfil').style.display = 'none';
            document.getElementById('reservas').style.display = 'none';
            document.getElementById('msg').style.display = 'none';
            document.getElementById('minhasRerserva').style.display = 'block';
            document.getElementById('Reservafinalizada').style.display = 'none';
            document.getElementById('listMsg').style.display = 'none';
          } else if (tipo === 'Reservafinalizada') {
            document.getElementById('perfil').style.display = 'none';
            document.getElementById('reservas').style.display = 'none';
            document.getElementById('msg').style.display = 'none';
            document.getElementById('minhasRerserva').style.display = 'none';
            document.getElementById('Reservafinalizada').style.display = 'block';
            document.getElementById('listMsg').style.display = 'none';
        } else if (tipo === 'listMsg') {
            document.getElementById('perfil').style.display = 'none'; 
            document.getElementById('reservas').style.display = 'none';
            document.getElementById('msg').style.display = 'none';
            document.getElementById('minhasRerserva').style.display = 'none';
            document.getElementById('Reservafinalizada').style.display = 'none';
            document.getElementById('listMsg').style.display = 'block';
        }

    }


  function changeCardAdmin(tipo) {
    
    if (tipo === 'perfil') {
        document.getElementById('perfil').style.display = 'block';
          document.getElementById('pedidos').style.display = 'none';
          document.getElementById('totalGuias').style.display = 'none';
          
            
        } else if (tipo === 'pedidos') {
            document.getElementById('perfil').style.display = 'none';
            document.getElementById('pedidos').style.display = 'block';
            document.getElementById('totalGuias').style.display = 'none';
        } 
        else {
          document.getElementById('perfil').style.display = 'none';
            document.getElementById('pedidos').style.display = 'none';
            document.getElementById('totalGuias').style.display = 'block';
      } 


    }


    function validarData() {
      
      var dataInicio = document.getElementById("dataEntrada").value;
      var dataFimInput = document.getElementById("dataSaida");
      
      var dataMinima = new Date(dataInicio);
      dataMinima.setDate(dataMinima.getDate() + 1);
      
      var diaMinimo = dataMinima.toISOString().split("T")[0];
      dataFimInput.min = diaMinimo;
      dataFimInput.value = diaMinimo;

    }
   
 

function contarCaracteres(textarea) {
  const maxCaracteres = 512;
  const numCaracteres = textarea.value.length;
  document.getElementById("contador").innerText = numCaracteres + "/" + maxCaracteres + " caracteres";
}