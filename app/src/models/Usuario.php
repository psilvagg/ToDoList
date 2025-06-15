<?php

namespace App\Models;

require_once '../config/db.php';

use PDO;

class Usuario
{
    public $uuidUsuario;
    public $nomeUsuario;
    public $emailUsuario;
    public $senhaUsuario;
    public $ip;
    private $pdo;

    public function __construct($uuidUsuario, $nomeUsuario, $emailUsuario, $senhaUsuario, $ip)
    {
        global $pdo;
        $this->pdo = $pdo;

        $this->uuidUsuario = $uuidUsuario;
        $this->nomeUsuario = $nomeUsuario;
        $this->emailUsuario = $emailUsuario;
        $this->senhaUsuario = password_hash($senhaUsuario, PASSWORD_DEFAULT);
        $this->ip = $ip;
    }

    public function cadastrarUsuario()
    {
        $sql = $this->pdo->prepare("SELECT * FROM Usuarios WHERE emailUsuario = :email");
        $sql->bindValue(':email', $this->emailUsuario);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return false;
        }

        $sql = $this->pdo->prepare("INSERT INTO Usuarios (uuidUsuario, nomeUsuario, emailUsuario, senhaUsuario) VALUES (:uuid, :nome, :email, :senha)");
        $sql->bindValue(':uuid', $this->uuidUsuario);
        $sql->bindValue(':nome', $this->nomeUsuario);
        $sql->bindValue(':email', $this->emailUsuario);
        $sql->bindValue(':senha', $this->senhaUsuario);

        return $sql->execute();
    }

    public function registrarDispositivo($uuid, $ip, $tipo, $navegador, $so)
    {

        return true;
    }
}
