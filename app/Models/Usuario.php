<?php

namespace app\Models;

session_start();

use PDO;

class Usuario
{
    public $idUsuario;
    public $nomeUsuario;
    public $emailUsuario;

    public static function CadastroUsuario($pdo)
    {
        if (empty(trim($_POST['nomeUsuario'])) || empty(trim($_POST['emailUsuario']))) {
            $_SESSION['erro'] = 'Os campos nome e e-mail são obrigatórios.';
            header('Location: /public/cadastro-usuarios.php');
            exit();
        }

        if (!filter_var($_POST['emailUsuario'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['erro'] = 'O e-mail informado é inválido.';
            header('Location: /public/cadastro-usuarios.php');
            exit();
        }

        $sql = $pdo->prepare("SELECT * FROM Usuarios WHERE emailUsuario = :emailUsuario");
        $sql->bindValue(':emailUsuario', $_POST['emailUsuario']);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $_SESSION['erro'] = 'Já existe um usuário com esse e-mail.';
            header('Location: /public/cadastro-usuarios.php');
            exit();
        }

        $nome = $_POST['nomeUsuario'];
        $email = $_POST['emailUsuario'];

        $sql = $pdo->prepare("INSERT INTO Usuarios (nomeUsuario, emailUsuario) VALUES (:nomeUsuario, :emailUsuario)");
        $sql->bindValue(':nomeUsuario', $nome);
        $sql->bindValue(':emailUsuario', $email);

        if ($sql->execute()) {
            $_SESSION['sucesso'] = 'Usuário cadastro com sucesso!';
            header('Location: /');
            exit();
        } else {
            $_SESSION['erro'] = 'Erro ao cadastrar usuário.';
            header('Location: /public/cadastro-usuarios.php');
            exit();
        }
    }

    public static function MostrarUsuarios($pdo)
    {
        $sql = $pdo->prepare("SELECT * FROM Usuarios");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $data = [
                [
                    'idUsuario' => NULL,
                    'nomeUsuario' => 'Nenhum usuário encontrado.',
                    'emailUsuario' => NULL,
                ]
            ];
        }

        return $data;
    }
}
