CREATE DATABASE sistema_simples;

USE sistema_simples;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);


INSERT INTO usuarios (usuario, senha) VALUES ('admin', '123');