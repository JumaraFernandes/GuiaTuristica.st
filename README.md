# GuiaTuristica

O objetivo deste projeto é desenvolver um site completo de guia turístico para São Tomé e Príncipe, que será uma referência para pessoas que procuram informações sobre os melhores destinos, pacotes de viagens local, hotéis, restaurantes, transporte e guias turísticos na região.

Na página inicial, os utilizadores poderão ter uma visão geral dos serviços oferecidos, incluindo destaques como os pacotes de viagem mais populares e uma lista das principais atrações turísticas locais. Haverá também um formulário de pesquisa para que os utilizadores possam pesquisar pacotes de viagens com base em datas, destino e outras informações relevantes.

Na página de pacotes de viagens local, os utilizadores encontrarão uma lista de todos os pacotes disponíveis, cada um com uma página dedicada que fornecerá informações detalhadas sobre preços, acomodações, atividades e muito mais. Cada página de pacote terá um botão "Reservar agora" que levará o utilizador à página de reservas. Na página de reservas, os utilizadores poderão preencher um formulário com informações como nome, data de chegada, número de pessoas e preferências de transporte. 

Na página de transporte, os utilizadores encontrarão fotos e descrições dos transportes disponíveis para aluguer, bem como informações sobre a capacidade de passageiros. Os guias turísticos ajudarão a selecionar o transporte adequado para o número de pessoas em cada grupo de turistas, com base nas preferências do cliente, com informações sobre preço, disponibilidade e locais de retirada e entrega.

Os hotéis e restaurantes com os quais o site terá parcerias serão convidados a se registar no site através de um sistema de convites. Se aceitarem o convite, poderão criar uma conta e listar suas informações no site, incluindo preços, comodidades, localização e disponibilidade. Os utilizadores poderão pesquisar hotéis e restaurantes com base em sua localização, preço e outros critérios, e cada um terá uma página dedicada com informações mais detalhadas.

A página de guias turísticos listará os guias com os quais o site trabalha e suas áreas de especialização, e cada guia terá uma página dedicada com informações sobre sua experiência, idiomas falados e disponibilidade. A página de atrações turísticas listará as principais atrações turísticas locais, como praias, parques nacionais e museus, e cada atração terá uma página dedicada com informações sobre horários de funcionamento, preços e descrições.
Haverá um administrador do site, que terá acesso a funções adicionais, como gerenciar os convites enviados aos hotéis e restaurantes parceiros, moderar o fórum e revisar as avaliações dos utilizadores antes de serem publicadas.

Além disso, o site contará com um blog com artigos sobre as melhores experiências e dicas de viagem em São Tomé e Príncipe, e uma página que contará um pouco sobre a história e língua de são Tomé e príncipe geografia e gastronomia e como obter o visto para dar entrada no pais, um fórum para que os utilizadores possam compartilhar suas experiências e dúvidas e uma seção para avaliações de hotéis, atrações e guias turísticos pelos utilizadores.

# Modelo Relacional

Certamente! Aqui está o modelo relacional das tabelas que você criou, juntamente com alguns dados de exemplo:

**Tabela: utilizador**

| id | nome  | email              | senha              | ativo |
|----|-------|--------------------|--------------------|-------|
| 1  | Maria | maria@example.com  | 1234maria.txopppppp   | 1  |
| 2  | João  | joao@example.com   | j436bnn1234maria.t    | 1 |
| 3  | Ana   | ana@example.com    | ha4maria.t234mssdc    | 1  |
| 3  | Ana   | ana@example.com    | ha4maria.t234senha    | 1  |
| 4 | Maria | maria@example.com  | ash_senha_aquiha4m    | 1  |
| 5 | João  | joao@example.com   | ddccdsenha_aquihash    | 1 |
| 6  | Ana   | ana@example.com    |  ha4maria.t234mssdc   | 1  |
| 7  | Ana   | ana@example.com    | 1234maria.txopppppp    | 0 |

**Tabela: Administrador**

| id | id_utilizador | telefone     |
|----|---------------|--------------|
| 1  | 2             | 987654321    |

**Tabela: turista**

| id | dataNascimento | sexo | id_utilizador |
|----|----------------|------|---------------|
| 1  | 1990-05-15     | M    | 2            |
| 2  | 1988-09-22     | F    | 3             |

**Tabela: parceiro**

| id | tipo | endereco          | estrelas | link                | id_utilizador | foto        | telefone    |
|----|------|-------------------|----------|---------------------|---------------|-------------|-------------|
| 1  | H    | Rua A, nº 123     | 4.5      | http://www.example1 | 4            | foto1.jpg   | 111111111   |
| 2  | R    | Rua B, nº 456     | 3.8      | http://www.example2 | 5             | foto2.jpg   | 222222222   |

**Tabela: guia**

| id | Nidentificacao | sexo | experiencia      | salario | endereco           | telefone    | cv          | foto        | dataNascimento | id_utilizador |
|----|----------------|------|------------------|----------|---------------------|-------------|--------------|-------------|----------------|---------------|
| 1  | ABC123         | M    | 5 anos           | 2000.00  | Rua C, nº 789       | 333333333   | cv1.pdf      | foto3.jpg   | 1985-12-10     | 6            |
| 2  | XYZ456         | F    | 3 anos           | 1800.00  | Rua D, nº 101112    | 444444444   | cv2.pdf      | foto4.jpg   | 1992-08-25     | 7             |

**Tabela: reserva**

| id | datainicio | datafim   | numeropessoas | estado       | local             | id_guia | id_turista |
|----|------------|-----------|---------------|--------------|-------------------|---------|------------|
| 1  | 2023-07-01 | 2023-07-05| 2             | confirmada   | Praia X           | 1       | 1          |
| 2  | 2023-08-15 | 2023-08-18| 4             | finalizada   | Parque Y          | 2       | 2          |

**Tabela: idiomasfalados**

| id | nome       | id_guia |
|----|------------|---------|
| 1  | Inglês     | 1       |
| 2  | Espanhol   | 1       |
| 3  | Francês    | 2       |

**Tabela: chat**

| id | ativo | id_reserva |
|----|-------|------------|
| 1  | true  | 1          |
| 2  | true  | 2          |

**Tabela: mensagens**

| id | msg                         | datamsg             | autor | id_chat |
|----|-----------------------------|---------------------|-------|---------|
| 1  | Olá, tudo bem?              | 2023-07-02 10:30:00 | 1     | 1       |
| 2  | Sim, estou bem. E você?     | 2023-07-02 10:35:00 | 2     | 1       |
| 3  | Gostaria de fazer uma reserva para a próxima semana.  | 2023-08-16 09:45:00 | 2     | 2   |

**Tabela: forum**

| id | id_turista | titulo             | conteudo           | data       |
|----|------------|--------------------|--------------------|------------|
| 1  | 1          | Dicas de viagem    | Qual o melhor período do ano para visitar a cidade de Angolares? | 2023-07-10 |
| 2  | 2          | Avaliação de hotel | Gostei muito da minha estadia no hotel Pestana. Recomendo! | 2023-08-20 |

Espero que isso ajude a visualizar melhor o modelo relacional e os dados nas tabelas!
