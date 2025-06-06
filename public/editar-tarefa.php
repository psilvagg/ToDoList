<?php
session_start();
require '../app/Utils/Database.php';
require '../app/Models/Tarefa.php';

use app\Models\Tarefa;

if ($_GET['id']) {
    $sql = $pdo->prepare("
        SELECT 
            t.idTarefa,
            t.prioridadeTarefa,
            t.nomeSetor,
            t.descricaoTarefa,
            t.statusTarefa,
            t.dataHoraCadastroTarefa,
            u.nomeUsuario,
            u.idUsuario
        FROM Tarefas t
        INNER JOIN Usuarios u ON t.idUsuario_FK = u.idUsuario
        WHERE t.idTarefa = :idTarefa
    ");
    $sql->bindValue('idTarefa', $_GET['id']);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $dadosTarefa = $sql->fetchAll(PDO::FETCH_ASSOC);
    } else {
        header('Location: /');
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        Tarefa::EditarTarefa($pdo);
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Tarefa - Sistema de Tarefas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0056b3',
                        dark: '#000000'
                    }
                }
            }
        }
    </script>
</head>

<script>
    function notify(msg, type = 'success') {
        let bg;
        if (type === 'success') {
            bg = 'bg-[#0056b3]';
        } else if (type === 'error') {
            bg = 'bg-[#000000]';
        } else {
            bg = 'bg-[#000000]';
        }

        const toast = document.createElement('div');
        toast.className = `${bg} text-white px-4 py-2 rounded fixed top-5 right-5 shadow-lg z-50`;
        toast.innerText = msg;
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 4000);
    }
</script>

<body class="bg-gray-50 min-h-screen">
    <nav class="bg-dark text-white fixed top-0 left-0 right-0 z-50 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div>
                    <h1 class="text-xl font-bold">Sistema de Tarefas</h1>
                </div>

                <div class="hidden md:flex space-x-6">
                    <a href="cadastro-tarefa.php"
                        class="px-4 py-2 rounded-md font-medium transition-colors">
                        Cadastro de Tarefas
                    </a>
                    <a href="cadastro-usuarios.php"
                        class="px-4 py-2 rounded-md font-medium transition-colors">
                        Cadastro de Usuários
                    </a>
                    <a href="/"
                        class="px-4 py-2 rounded-md font-medium transition-colors">
                        Gerenciar Tarefas
                    </a>
                </div>

                <div class="md:hidden">
                    <button id="mobile-menu-btn" class="p-2 rounded-md hover:bg-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div id="mobile-menu" class="hidden md:hidden bg-gray-800">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="" onclick="window.reload" class="block px-3 py-2 rounded-md font-medium">
                    Cadastro de Tarefas
                </a>
                <a href="cadastro-usuarios.php" class="block px-3 py-2 rounded-md font-medium hover:bg-gray-700">
                    Cadastro de Usuários
                </a>
                <a href="/" class="block px-3 py-2 rounded-md font-medium hover:bg-gray-700">
                    Gerenciar Tarefas
                </a>
            </div>
        </div>
    </nav>

    <?php if (isset($_SESSION['erro'])): ?>
        <script>
            notify('<?= $_SESSION['erro'] ?>', 'error');
        </script>
        <?php unset($_SESSION['erro']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['sucesso'])): ?>
        <script>
            notify('<?= $_SESSION['sucesso'] ?>', 'success');
        </script>
        <?php unset($_SESSION['sucesso']); ?>
    <?php endif; ?>

    <main class="pt-20 pb-8">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-lg p-6 md:p-8">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-[#000000] mb-2">Editar de Tarefas</h2>
                    <p class="text-gray-600">Altere os dados para editar a tarefa</p>
                </div>

                <form class="space-y-6" action="" method="POST">
                    <div>
                        <label for="setor" class="block text-sm font-medium text-[#000000] mb-2">
                            Usuário
                        </label>
                        <input type="text" id="setor" name="setorTarefa" required disabled value="<?= $dadosTarefa[0]['nomeUsuario'] ?>"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0056b3] focus:border-[#0056b3] transition-colors">
                    </div>

                    <div>
                        <label for="setor" class="block text-sm font-medium text-[#000000] mb-2">
                            Setor
                        </label>
                        <input type="text" id="setor" name="setorTarefa" required disabled value="<?= $dadosTarefa[0]['nomeSetor'] ?>"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0056b3] focus:border-[#0056b3] transition-colors">
                    </div>

                    <div>
                        <label for="prioridade" class="block text-sm font-medium text-[#000000] mb-2">
                            Prioridade
                        </label>
                        <select id="prioridade" name="prioridadeTarefa" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0056b3] focus:border-[#0056b3] transition-colors">
                            <option value="" disabled>Selecione a prioridade...</option>
                            <option value="Baixa" <?= ($dadosTarefa[0]['prioridadeTarefa'] === 'Baixa') ? 'selected' : '' ?>>Baixa</option>
                            <option value="Media" <?= ($dadosTarefa[0]['prioridadeTarefa'] === 'Media') ? 'selected' : '' ?>>Média</option>
                            <option value="Alta" <?= ($dadosTarefa[0]['prioridadeTarefa'] === 'Alta') ? 'selected' : '' ?>>Alta</option>
                        </select>
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-medium text-[#000000] mb-2">
                            Status
                        </label>
                        <select id="status" name="statusTarefa" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0056b3] focus:border-[#0056b3] transition-colors">
                            <option value="" disabled>Selecione o status...</option>
                            <option value="A fazer" <?= ($dadosTarefa[0]['statusTarefa'] === 'A fazer') ? 'selected' : '' ?>>A fazer</option>
                            <option value="Fazendo" <?= ($dadosTarefa[0]['statusTarefa'] === 'Fazendo') ? 'selected' : '' ?>>Fazendo</option>
                            <option value="Pronto" <?= ($dadosTarefa[0]['statusTarefa'] === 'Pronto') ? 'selected' : '' ?>>Pronto</option>
                        </select>
                    </div>

                    <div>
                        <label for="descricao" class="block text-sm font-medium text-[#000000] mb-2">
                            Descrição da Tarefa
                        </label>
                        <textarea id="descricao" name="descricaoTarefa" rows="4" required disabled
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0056b3] focus:border-[#0056b3] transition-colors resize-vertical"><?= $dadosTarefa[0]['descricaoTarefa'] ?></textarea>
                    </div>

                    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">

                    <div class="pt-4">
                        <button type="submit"
                            class="w-full bg-[#0056b3] text-white py-3 px-6 rounded-lg font-medium text-lg hover:bg-[#004a99] focus:ring-4 focus:ring-[#99c2f0] transition-all duration-200 transform hover:scale-[1.02]">
                            Editar Tarefa
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>


    <script>
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>

</html>