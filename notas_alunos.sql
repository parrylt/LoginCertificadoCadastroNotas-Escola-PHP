CREATE DATABASE curso_linux;
USE curso_linux;

CREATE TABLE notas_alunos (
id_aluno numeric (4) primary key,
nm_aluno varchar (30),
nota1 numeric (5,2),
nota2 numeric (5,2),
nota3 numeric (5,2),
nota4 numeric (5,2),
faltas numeric (2)
);

CREATE TABLE loginAluno (
email varchar (40) PRIMARY KEY,
senha varchar (20)
);

CREATE TABLE loginProfessor (
email varchar (40) PRIMARY KEY,
senha varchar (20)
);

INSERT INTO loginProfessor
VALUES ('israel@hotmail.com','123456');

INSERT INTO loginAluno
VALUES ('marina@hotmail.com','123456');

SELECT * FROM notas_alunos;
DROP TABLE notas_alunos;
DROP TABLE loginAluno;
DROP TABLE loginProfessor;