create database guiaturistica;
use guiaturistica ;

CREATE TABLE utilizador (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(100) NOT NULL,
    telefone VARCHAR(20),
    ativo bool default false
);

CREATE TABLE Administrador (
  id INT PRIMARY KEY AUTO_INCREMENT,
  id_utilizador INT,
  FOREIGN KEY (id_utilizador) REFERENCES utilizador(id)
);


CREATE TABLE parceiro (
  id INT PRIMARY KEY AUTO_INCREMENT,
  endereco VARCHAR(100),
  estrelas float,
  link VARCHAR(200),
  id_utilizador INT,
  FOREIGN KEY (id_utilizador) REFERENCES utilizador(id)
);

CREATE TABLE turista (
  id INT PRIMARY KEY AUTO_INCREMENT,
  dataNascimento DATE,
  id_utilizador INT,
  FOREIGN KEY (id_utilizador) REFERENCES utilizador(id)
);
CREATE TABLE guia (
  id INT PRIMARY KEY AUTO_INCREMENT,
  BI VARCHAR(20),
  experiencia VARCHAR(100),
  salario DECIMAL(10, 2),
  endereco VARCHAR(100),
  cv binary,
  dataNascimento DATE,
  id_utilizador INT,
  FOREIGN KEY (id_utilizador) REFERENCES utilizador(id)
);

CREATE TABLE reserva (
  id INT PRIMARY KEY AUTO_INCREMENT,
  datainicio DATE NOT NULL,
  datafim DATE NOT NULL,
  numeropessoas INT NOT NULL,
  preferenciaviagem VARCHAR(100),
  local VARCHAR(100),
  id_guia INT NOT NULL,
  id_turista INT NOT NULL,
  FOREIGN KEY (id_guia) REFERENCES guia(id),
  FOREIGN KEY (id_turista) REFERENCES turista(id)
);

CREATE TABLE forum (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nometurista VARCHAR(50) NOT NULL,
  dataescre DATETIME NOT NULL,
  id_turista INT NOT NULL,
  FOREIGN KEY (id_turista) REFERENCES turista(id)
);

CREATE TABLE idiomasfalados (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(50) NOT NULL,
  nivel VARCHAR(20) NOT NULL,
  id_guia INT NOT NULL,
  FOREIGN KEY (id_guia) REFERENCES guia(id)
);
   CREATE TABLE chat (
  id INT PRIMARY KEY AUTO_INCREMENT,
  ativo BOOLEAN NOT NULL DEFAULT TRUE,
  id_reserva INT NOT NULL,
  FOREIGN KEY (id_reserva) REFERENCES reserva(id)
);

CREATE TABLE mensagens (
  id INT PRIMARY KEY AUTO_INCREMENT,
  msg VARCHAR(255) NOT NULL,
  datamsg DATETIME NOT NULL,
  autor VARCHAR(50) NOT NULL,
  id_chat INT NOT NULL,
  FOREIGN KEY (id_chat) REFERENCES chat(id)
);









