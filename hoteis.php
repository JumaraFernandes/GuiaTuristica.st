<?php
    session_start();
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
  <link rel="stylesheet" href="css/estilohotel.css">
   
</head>
<body>
  <!--cabeçalho-->
  <?php include 'includes/header.php';
   require_once "connect/funcao.php";
   $hosteis =  PesquisarHosteis();
  
  ?>
    <div class="posicao">
    <h4>Hotéis e Resorts na ilha de São Tomé e Principe</h4>
    </div>
  <main> 
    <div class="corpo">
      <h1>Hoteis</h1>
    </div>

      <section class="saotome">
         <div>
             <h1>Hotéis e Resorts na ilha de São Tomé</h1>
           <p>
             Em termos de estruturas hoteleiras, a cidade de São Tomé tem alguns hotéis e resorts de qualidade a bom nível. O hotel Miramar, na marginal 12 Julho é um clássico da cidade. Inaugurado nos anos oitenta, foi durante muito tempo o único com condições para receber homens de negócios e visitantes importantes, por isso construiu uma sólida reputação.
           </p>
             <p>
             O Omali Lodge e o Hotel praia são outros refúgios de qualidade inquestionável: localizados na praia Lagarto. Ao extremo sul  encontra-se o Resort Inhame Ecolodge situado a 7 minutos de barco do marco do equador.
             </p>
             <h1>Hotéis e Resorts na Ilha do Príncipe</h1>

             <p> Um dos resorts mais requintados encontra-se na praia Sundy, com decoração luxuosa e uma vista magnífica para o mar. Para aqueles que apreciam o glamour o edifícios emblemáticos e históricos, nada melhor do que visitar o Alojamento na Roça Belo Monte ou Sundy Roça. O Bom-Bom Island Resort foi o primeiro a ser construído na Ilha do Príncipe, onde possui características paisagística únicas, do ilhéu bombom, pode-se desfrutar de uma paisagem, de cortar respiração, para a Ilha do Príncipe.</p>
             <?php 
   if (!empty($hosteis)) {
   echo '<div class="row">';
  
    foreach ($hosteis as $hotel) {
    echo '<div class="col-md-4">
            <div class="card">
              <img src="imagensParceiro/'. $hotel['Foto'] .'" class="card-img-top" alt="...">
              <div class="card-body">
                <h5>'. $hotel['Nome'] .'</h5>
                <p class="card-text">Telefone: '. $hotel['Telefone'] .'</p>
                <p><a class="card-text" href="mailto:'. $hotel['Email'] .'">E-mail: '. $hotel['Email'] .'</a></p>
                <p><a class="card-text" href="https://'. $hotel['Link'] .'" target="_blank">Link: '. $hotel['Link'] .'</a></p>
                <p class="card-text">Endereço: '. $hotel['Endereco'] .'</p>
                <p class="card-text">Estrelas: '. $hotel['Estrelas'] .'</p>
              </div>
            </div>
          </div>';
  }
  
  echo '</div>';
  } else {
  echo "Nenhum hotel encontrado.";
 }
 ?>

   <!--           <div class="row">
  <div class="col-md-4">
    <div class="card">
      <img src="imagens/hotelpestana.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5>PESTANA SÃO TOMÉ</h5>
        <p class="card-text">Av. Marginal 12 de Julho</p>
        <p class="card-text">Tel: (+239) 2244500/2244539</p>
        <a class="card-text" href="mailto:pestana.stome@pestana.com">E-mail: pestana.stome@pestana.com</a>
        <a class="card-text" href="https://www.pestana.com/pt" target="_blank">www.pestana.com</a>
      </div>
    </div>
  </div>
   -->
  <!-- <div class="col-md-4">
    <div class="card">
      <img src="imagens/hotelpraia.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5>HOTEL PRAIA</h5>
        <p class="card-text">Praia Lagarto</p>
        <p class="card-text">Tel: (+239) 2226235/9986250</p>
        <a class="card-text" href="reservas@hotelpraia.st">E-mail:reservas@hotelpraia.st</a>
        <a class="card-text" href="https://www.hotel-praia.com" target="_blank">www.hotel-praia.com</a>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card">
      <img src="imagens/hotelrocasanto.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5>HOTEL ROÇA SANTO ANTONIO</h5>
        <p class="card-text">Roça de Santo António</p>
        <p class="card-text">Tel: (+239)9986652</p>
        <a class="card-text" href="serviruma.rocasantoantonio@gmail.com">E-mail:serviruma.rocasantoantonio@gmail.com</a>
        <a class="card-text" href="https://www.rsaecolodge.pt" target="_blank">www.rsaecolodge.pt</a>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card">
      <img src="imagens/hotelcentral.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5>HOTEL CENTRAL</h5>
        <p class="card-text">Rua de Angola</p>
        <p class="card-text">Tel: (+239) 2227551</p>
        <a class="card-text" href="hotelcentral.saotome@gmail.com">E-mail: hotelcentral.saotome@gmail.com</a>
        <a class="card-text" href="https://www.hotelcentralsaotome.com" target="_blank">www.hotelcentralsaotome.com</a>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card">
      <img src="imagens/MUCUMBLI LODGE.jpeg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5>MUCUMBLI LODGE</h5>
        <p class="card-text">Ponta Figo - Neves</p>
        <p class="card-text">Tel: (+239) 9908737/9908736/9936602</p>
        <a class="card-text" href="mailto:mucumbli@gmail.com">E-mail: mucumbli@gmail.com</a>
        <a class="card-text" href="https://www.mucumbli.wordpress.com" target="_blank">www.mucumbli.wordpress.com</a>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card">
      <img src="imagens/ROÇASÃOJOÃO.jpeg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5>ROÇA SÃO JOÃO</h5>
        <p class="card-text">Angolares</p>
        <p class="card-text">Tel: (+239) 2261140/9929475</p>
        <a class="card-text" href="mailto:tap@cstome.net">E-mail: reservas.rocasjoao@gmail.comt</a>
        <a class="card-text" href="https://www.pestana.com/pt" target="_blank">www.pestana.com</a>
      </div>
    </div>
  </div>
</div>   

         </div>

      </section>
     
      <section class="pricinpe">
         
           <div>
           <h1>Hotéis e Resorts na Ilha do Príncipe</h1>

             <p> Um dos resorts mais requintados encontra-se na praia Sundy, com decoração luxuosa e uma vista magnífica para o mar. Para aqueles que apreciam o glamour o edifícios emblemáticos e históricos, nada melhor do que visitar o Alojamento na Roça Belo Monte ou Sundy Roça. O Bom-Bom Island Resort foi o primeiro a ser construído na Ilha do Príncipe, onde possui características paisagística únicas, do ilhéu bombom, pode-se desfrutar de uma paisagem, de cortar respiração, para a Ilha do Príncipe.</p>

             <div class="row">
              <div class="col-md-4">
                <div class="card">
                  <img src="imagens/Photelrural.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5>HOTEL RURAL PRAIA ABADE</h5>
                    <p class="card-text">Tel: (+239) 9916024</p>
                    <a class="card-text" href="mailto:rocaabade@gmail.com">E-mail: rocaabade@gmail.com</a>
                    <a class="card-text" href="https://www.abadeprincipe.com" target="_blank">www.abadeprincipe.com</a>
                  </div>
                </div>
              </div>
              
              <div class="col-md-4">
                <div class="card">
                  <img src="imagens/Photelroca.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5>HOTEL ROÇA BELO MONTE</h5>
                    <p class="card-text">Tel: (+239) 2251167</p>
                    <a class="card-text" href="belomonte@africas-eden.com">E-mail: belomonte@africas-eden.com</a>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="card">
                  <img src="imagens/Photelbom.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5>BOM BOM ISLAND RESORT</h5>
                    <p class="card-text">Tel: (+239) 2251114</p>
                    <a class="card-text" href="mailto:reservations@bombomprincipe.com">E-mail: reservations@bombomprincipe.com</a>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="card">
                  <img src="imagens/resortsundy.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5>RESORT SUNDY PRAIA</h5>
                    <p class="card-text">Tel: (+239) 999 5000</p>
                    <a class="card-text" href="mailto:reservations@sundyprincipe.com">E-mail: reservations@sundyprincipe.com</a>
                  </div>
                </div>
              </div>


              <div class="col-md-4">
                <div class="card">
                  <img src="imagens/hotelsundy.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5>HOTEL SUNDY ROÇA</h5>
                    <p class="card-text">Tel: (+239) 2251155</p>
                    <a class="card-text" href="mailto:reservations@hotelrocasundy.com">E-mail: reservations@hotelrocasundy.com</a>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
              <div class="card">
                  <img src="imagens/Photelrural.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5>HOTEL RURAL PRAIA ABADE</h5>
                    <p class="card-text">Tel: (+239) 9916024</p>
                    <a class="card-text" href="mailto:rocaabade@gmail.com">E-mail: rocaabade@gmail.com</a>
                   
                  </div>
                </div>
              </div>

           </div>
         </div> -->

         </section>
     </div>
    </main>

  <!--Rodapé-->
  <?php include 'includes/footer.php' ?>
  
  
</body>
</html>