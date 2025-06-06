DROP DATABASE IF EXISTS SAEP_Kanban;

CREATE DATABASE IF NOT EXISTS SAEP_Kanban;

USE SAEP_Kanban;

DROP TABLE IF EXISTS Usuarios;

CREATE TABLE
    IF NOT EXISTS Usuarios (
        idUsuario INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
        nomeUsuario VARCHAR(100) NOT NULL,
        emailUsuario VARCHAR(100) UNIQUE NOT NULL
    );

DROP TABLE IF EXISTS Tarefas;

CREATE TABLE
    IF NOT EXISTS Tarefas (
        idTarefa INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
        idUsuario_FK INT NOT NULL,
        prioridadeTarefa VARCHAR(20) NOT NULL,
        nomeSetor VARCHAR(40) NOT NULL,
        descricaoTarefa VARCHAR(150) NOT NULL,
        statusTarefa VARCHAR(20) NOT NULL,
        dataHoraCadastroTarefa DATETIME DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (idUsuario_FK) REFERENCES Usuarios (idUsuario)
    );