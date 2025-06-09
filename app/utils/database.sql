DROP DATABASE IF EXISTS ToDoList;

CREATE DATABASE IF NOT EXISTS ToDoList;

USE ToDoList;

DROP TABLE IF EXISTS Usuarios;

CREATE TABLE IF NOT EXISTS Usuarios (
    uuidUsuario CHAR(36) PRIMARY KEY NOT NULL,
    nomeUsuario VARCHAR(100) NOT NULL,
    emailUsuario VARCHAR(100) UNIQUE NOT NULL,
    senhaUsuario VARCHAR(255) NOT NULL,
    cadastroConfirmado TINYINT(1) DEFAULT 0,
    authDoisFatores TINYINT (1) DEFAULT 0,
    dataHoraCadastro DATETIME DEFAULT CURRENT_TIMESTAMP
);

DROP TABLE IF EXISTS Tarefas;

CREATE TABLE IF NOT EXISTS Tarefas (
    uuidTarefa INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    uuidUsuario_FK CHAR(36) NOT NULL,
    prioridadeTarefa VARCHAR(20) NOT NULL,
    nomeSetor VARCHAR(40) NOT NULL,
    descricaoTarefa VARCHAR(150) NOT NULL,
    statusTarefa VARCHAR(20) NOT NULL,
    dataHoraCadastroTarefa DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (uuidUsuario_FK)
        REFERENCES Usuarios (idUsuario)
);