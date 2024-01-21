CREATE DATABASE PC;
USE PC;
CREATE TABLE User(
	nome VARCHAR(30) PRIMARY KEY not null,
    password VARCHAR(20) not null
);
CREATE TABLE Componentes (
    id VARCHAR(50) not null,
    processador VARCHAR(50) not null,
    PlacaMae VARCHAR(50) not null,
    Memoria VARCHAR(50) not null,
    PlacaVideo VARCHAR(50) not null,
    Disco VARCHAR(50) not null,
    Fonte VARCHAR(50) not null,
    Torre VARCHAR(50) not null,
    Nome VARCHAR(30)not null,
    CONSTRAINT fkuser FOREIGN KEY (Nome) REFERENCES User(nome)
);



select * from Componentes;
