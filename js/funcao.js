

    function clictokRegis(tipo) {
      // Selecionar todos os cartões
      const cards = document.querySelectorAll(".card");
    
      // Percorrer todos os cartões e encontrar o cartão com o tipo correspondente
      cards.forEach(card => {
        if (card.id === tipo) {
          // Definir a borda para o cartão correspondente
          card.style.border = "5px solid #7BF1A8";
        } else {
          // Remover a borda dos outros cartões
          card.style.border = "1px solid #000";
        }
      });
    }

    function ShowDropDown(id)
    {
        document.getElementById(id).style.display = 'block';
    }

    function closeDropDown(id) {
        document.getElementById(id).style.display = 'none';
    }
  

