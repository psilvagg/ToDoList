DROP DATABASE IF EXISTS taskFlow;

CREATE DATABASE IF NOT EXISTS taskFlow;

USE taskFlow;

DROP TABLE IF EXISTS Usuarios;

CREATE TABLE
    IF NOT EXISTS Usuarios (
        uuidUsuario CHAR(36) PRIMARY KEY NOT NULL,
        nomeUsuario VARCHAR(100) NOT NULL,
        emailUsuario VARCHAR(100) UNIQUE NOT NULL,
        senhaUsuario VARCHAR(255) NOT NULL,
        cadastroConfirmado BOOLEAN DEFAULT FALSE,
        2fa VARCHAR (100),
        fotoUsuario VARCHAR(40),
        contaDesativada BOOLEAN DEFAULT FALSE,
        dataHoraCadastro DATETIME DEFAULT CURRENT_TIMESTAMP
    );

DROP TABLE IF EXISTS Tarefas;

CREATE TABLE
    IF NOT EXISTS Tarefas (
        uuidTarefa CHAR(36) PRIMARY KEY NOT NULL,
        uuidUsuario_FK CHAR(36) NOT NULL,
        tituloTarefa VARCHAR(100) NOT NULL,
        descricaoTarefa TEXT NOT NULL,
        statusTarefa VARCHAR(20) NOT NULL,
        dataVencimento DATETIME NOT NULL,
        tagsTarefa VARCHAR(255) NOT NULL,
        dataHoraCriacao DATETIME DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (uuidUsuario_FK) REFERENCES Usuarios (uuidUsuario)
    );

DROP TABLE IF EXISTS Dispositivos;

CREATE TABLE
    IF NOT EXISTS Dispositivos (
        uuidDispositivo CHAR(36) PRIMARY KEY NOT NULL,
        uuidUsuario_FK CHAR(36) NOT NULL,
        ipDispositivo VARCHAR(45) NOT NULL,
        tipoDispositivo VARCHAR(20) NOT NULL, -- Desktop, Mobile, Tablet etc
        navegadorDispositivo VARCHAR(50) NOT NULL,
        soDispositivo VARCHAR (50) NOT NULL,
        dispositivoConfirmado BOOLEAN DEFAULT FALSE,
        dataHoraConfirmacao DATETIME DEFAULT CURRENT_TIMESTAMP,
        dataHoraCriacao DATETIME DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (uuidUsuario_FK) REFERENCES Usuarios (uuidUsuario)
    );

DROP TABLE IF EXISTS Logs;

CREATE TABLE
    IF NOT EXISTS Logs (
        uuidLog CHAR(36) PRIMARY KEY NOT NULL,
        uuidUsuario_FK CHAR(36) NOT NULL,
        uuidDispositivo_FK CHAR(36) NOT NULL,
        acaoLog VARCHAR(45) NOT NULL,
        descricaoLog TEXT NOT NULL,
        dataHoraExecucao DATETIME DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (uuidUsuario_FK) REFERENCES Usuarios (uuidUsuario),
        FOREIGN KEY (uuidDispositivo_FK) REFERENCES Dispositivos (uuidDispositivo)
    );

DROP TABLE IF EXISTS ChaveRecuperacao;

CREATE TABLE
    IF NOT EXISTS ChaveRecuperacao (
        uuidChaveRec CHAR(36) PRIMARY KEY NOT NULL,
        uuidUsuario_FK CHAR(36) NOT NULL,
        chaveRecuperacao VARCHAR(45) NOT NULL,
        dataHoraAdicao DATETIME DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (uuidUsuario_FK) REFERENCES Usuarios (uuidUsuario)
    );

DROP TABLE IF EXISTS ConfirmarCadastro;

CREATE TABLE
    IF NOT EXISTS ConfirmarCadastro (
        uuidConfirmacao CHAR(36) PRIMARY KEY NOT NULL,
        uuidUsuario_FK CHAR(36) NOT NULL,
        codigoConfirmacao VARCHAR(20) NOT NULL,
        dataHoraExpiracao DATETIME NOT NULL,
        dataHoraAdicao DATETIME DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (uuidUsuario_FK) REFERENCES Usuarios (uuidUsuario)
    );

DROP TABLE IF EXISTS EsqueceuSenha;

CREATE TABLE
    IF NOT EXISTS EsqueceuSenha (
        uuidEsqueceuSenha CHAR(36) PRIMARY KEY NOT NULL,
        uuidUsuario_FK CHAR(36) NOT NULL,
        tokenEsqueceuSenha VARCHAR(20) NOT NULL,
        dataHoraExpiracao DATETIME NOT NULL,
        dataHoraAdicao DATETIME DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (uuidUsuario_FK) REFERENCES Usuarios (uuidUsuario)
    );

DROP TABLE IF EXISTS AlterarEmail;

CREATE TABLE
    IF NOT EXISTS AlterarEmail (
        uuidAlterarEmail CHAR(36) PRIMARY KEY NOT NULL,
        uuidUsuario_FK CHAR(36) NOT NULL,
        emailAntigo VARCHAR(255) NOT NULL,
        emailNovo VARCHAR(255) NOT NULL,
        tokenConfirmacaoAntigoEmail VARCHAR(64) NOT NULL,
        tokenConfirmacaoNovoEmail VARCHAR(64) NOT NULL,
        confirmadoAntigoEmail BOOLEAN DEFAULT FALSE,
        confirmadoNovoEmail BOOLEAN DEFAULT FALSE,
        dataHoraExpiracao DATETIME NOT NULL,
        dataHoraAdicao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (uuidUsuario_FK) REFERENCES Usuarios (uuidUsuario)
    );