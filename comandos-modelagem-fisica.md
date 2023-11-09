# comandos-modelagem-fisica.md

## Criar banco de dados 

CREATE DATABASE microblog_giuseppe CHARACTER SET utf8mb4;

### Criar tabela de usuarios

CREATE TABLE usuarios(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(45) NOT NULL,
    email VARCHAR(45) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    tipo ENUM('admin', 'editor') NOT NULL
);

CREATE TABLE noticias(
   id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
   data DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
   titulo VARCHAR(150) not null,
   texto TEXT NOT NULL,
   resumo TEXT NOT NULL,
   imagem VARCHAR(45) NOT NULL,
   usuario_id INT NOT NULL
);

## Criar o relaciomento entre tabelas e a chave estrangeira

ALTER TABLE noticias 
ADD CONSTRAINT fk_noticias_usuarios
FOREIGN KEY (usuario_id) REFERENCES usuarios(id);