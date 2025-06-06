<?php

namespace app\Models;

use PDO;

class Tarefa
{
    public $idTarefa;
    public $idUsuario_FK;
    public $descricaoTarefa;
    public $nomSetor;
    public $prioridadeTarefa;
    public $statusTarefa;

    public static function CadastrarTarefa($pdo)
    {
        if (!isset($_POST['idUsuario_FK']) || !isset($_POST['prioridadeTarefa']) || !isset($_POST['setorTarefa']) || !isset($_POST['descricaoTarefa'])) {
            $_SESSION['erro'] = 'Todos os campos são obrigatórios.';
            header('Location: /public/cadastro-tarefa.php');
            exit();
        }

        $statusTarefaPadrao = 'A fazer';

        $sql = $pdo->prepare("INSERT INTO Tarefas (idUsuario_FK, prioridadeTarefa, nomeSetor, descricaoTarefa, statusTarefa) 
        VALUES (:idUsuario_FK, :prioridadeTarefa, :nomeSetor, :descricaoTarefa, :statusTarefa)");
        $sql->bindValue(':idUsuario_FK', $_POST['idUsuario_FK']);
        $sql->bindValue(':prioridadeTarefa', $_POST['prioridadeTarefa']);
        $sql->bindValue(':nomeSetor', $_POST['setorTarefa']);
        $sql->bindValue(':descricaoTarefa', $_POST['descricaoTarefa']);
        $sql->bindValue(':statusTarefa', $statusTarefaPadrao);

        if ($sql->execute()) {
            $_SESSION['sucesso'] = 'Tarefa cadastrada com sucesso!';
            header('Location: /');
            exit();
        } else {
            $_SESSION['erro'] = 'Erro ao cadastrar tarefa.';
            header('Location: /public/cadastro-tarefa.php');
            exit();
        }
    }

    public static function MostraTarefas($pdo)
    {
        $sql = $pdo->prepare("
        SELECT 
            t.idTarefa,
            t.prioridadeTarefa,
            t.nomeSetor,
            t.descricaoTarefa,
            t.statusTarefa,
            t.dataHoraCadastroTarefa,
            u.nomeUsuario
        FROM Tarefas t
        INNER JOIN Usuarios u ON t.idUsuario_FK = u.idUsuario
        ORDER BY t.dataHoraCadastroTarefa DESC
    ");

        $sql->execute();

        if ($sql->rowCount() > 0) {
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public static function AlterarStatus($pdo)
    {
        if (!isset($_POST['statusTarefa']) || !isset($_POST['idTarefa'])) {
            $_SESSION['erro'] = 'Os campos status e ID da Tarefa são obrigatórios.';
            header('Location: /');
            exit();
        }

        $idTarefa = $_POST['idTarefa'];

        $sql = $pdo->prepare("UPDATE Tarefas SET statusTarefa = :statusTarefa WHERE idTarefa = :idTarefa");
        $sql->bindValue(':statusTarefa', $_POST['statusTarefa']);
        $sql->bindValue(':idTarefa', $idTarefa, PDO::PARAM_INT);
        if ($sql->execute()) {
            $_SESSION['sucesso'] = 'O Status da tarefa foi atualizado com sucesso!';
            header('Location: /');
            exit();
        } else {
            $_SESSION['erro'] = 'Erro ao atualizar o status da tarefa.';
            header('Location: /');
            exit();
        }
    }

    public static function EditarTarefa($pdo)
    {
        if (!isset($_POST['prioridadeTarefa']) || !isset($_POST['statusTarefa']) || !isset($_POST['id'])) {
            $_SESSION['erro'] = 'Os campso prioridade e status não podem ficar vazios.';
            header("Location: /public/editar-tarefa.php?id={$_POST['id']}");
            exit();
        }

        $idTarefa = $_POST['id'];

        $sql = $pdo->prepare("UPDATE Tarefas SET prioridadeTarefa = :prioridadeTarefa, statusTarefa = :statusTarefa WHERE idTarefa = :idTarefa");
        $sql->bindValue(':prioridadeTarefa', $_POST['prioridadeTarefa']);
        $sql->bindValue(':statusTarefa', $_POST['statusTarefa']);
        $sql->bindValue(':idTarefa', $idTarefa, PDO::PARAM_INT);

        if ($sql->execute()) {
            $_SESSION['sucesso'] = 'Tarefa atualizada com sucesso!';
            header('Location: /');
            exit();
        } else {
            $_SESSION['erro'] = 'Erro ao atualizar tarefa.';
            header("Location: /public/editar-tarefa.php?id={$_POST['id']}");
            exit();
        }
    }

    public static function ExcluirTarefa($pdo)
    {
        if (empty($_POST['idTarefaExcluir'])) {
            $_SESSION['erro'] = 'O ID da Tarefa é obrigatório.';
            header("Location: /");
            exit();
        }

        $idTarefa = $_POST['idTarefaExcluir'];

        $sql = $pdo->prepare("SELECT * FROM Tarefas WHERE idTarefa = :idTarefa");
        $sql->bindValue('idTarefa', $idTarefa, PDO::PARAM_INT);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $sql = $pdo->prepare("DELETE FROM Tarefas WHERE idTarefa = :idTarefa");
            $sql->bindValue('idTarefa', $idTarefa, PDO::PARAM_INT);

            if ($sql->execute()) {
                $_SESSION['sucesso'] = 'Tarefa excluída com sucesso!';
                header("Location: /");
                exit();
            } else {
                $_SESSION['erro'] = 'Erro ao excluir tarefa.';
                header("Location: /");
                exit();
            }
        }
    }
}
