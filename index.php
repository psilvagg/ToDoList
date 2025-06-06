<?php
session_start();
require 'app/Utils/Database.php';
require 'app/Models/Tarefa.php';

use app\Models\Tarefa;

try {
    $tarefas = Tarefa::MostraTarefas($pdo);
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}

if (!empty($_POST['idTarefaExcluir'])) {
    try {
        Tarefa::ExcluirTarefa($pdo);
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        Tarefa::AlterarStatus($pdo);
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
    <title>Gerenciar Tarefas - Sistema de Tarefas</title>
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
            bg = 'bg-[#0056b3]';
        } else {
            bg = 'bg-[#0056b3]';
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
                    <a href="/public/cadastro-tarefa.php"
                        class="px-4 py-2 rounded-md font-medium transition-colors">
                        Cadastro de Tarefas
                    </a>
                    <a href="/public/cadastro-usuarios.php"
                        class="px-4 py-2 rounded-md font-medium transition-colors">
                        Cadastro de Usuários
                    </a>
                    <a href="" onclick="window.reload"
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
                <a href="public/cadastro-tarefa.php
                    class=" block px-3 py-2 rounded-md font-medium hover:bg-gray-700">Cadastro de Tarefas</a>
                <a href="public/cadastro-usuarios.php"
                    class="block px-3 py-2 rounded-md font-medium hover:bg-gray-700">Cadastro de Usuários</a>
                <a href="" onclick="window.reload" class="block px-3 py-2 rounded-md font-medium">Gerenciar
                    Tarefas</a>
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
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-[#000000] mb-2">Gerenciar Tarefas</h2>
                <p class="text-[#000000]">Visualize e gerencie todas as tarefas do sistema</p>
            </div>

            <?php if (!empty($tarefas)): ?>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <h3 class="text-xl font-semibold text-[#000000] mb-4 text-center">A Fazer</h3>
                        <?php foreach ($tarefas as $t): ?>
                            <?php if ($t['statusTarefa'] === 'A fazer'): ?>
                                <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow mb-4">
                                    <div class="flex justify-between items-start mb-4">
                                        <span class="inline-block px-3 py-1 bg-[#0056b326] text-[#0056b3] text-xs font-medium rounded-full">
                                            <?= $t['prioridadeTarefa'] ?>
                                        </span>
                                        <span class="inline-block px-3 py-1 bg-[#0000001a] text-[#000000] text-xs font-medium rounded-full">
                                            <?= $t['statusTarefa'] ?>
                                        </span>
                                    </div>

                                    <h3 class="font-bold text-[#000000] mb-2">Descrição:</h3>
                                    <p class="text-[#000000] mb-3"><?= $t['descricaoTarefa'] ?></p>

                                    <div class="space-y-2 mb-4">
                                        <p class="text-sm"><span class="font-medium text-[#000000]">Setor:</span> <?= $t['nomeSetor'] ?></p>
                                        <p class="text-sm"><span class="font-medium text-[#000000]">Vinculado a:</span> <?= $t['nomeUsuario'] ?></p>
                                    </div>

                                    <form action="" method="POST" class="space-y-3 mb-3">
                                        <div class="flex items-center space-x-2">
                                            <select
                                                class="flex-1 px-3 py-2 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-[#0056b3] focus:border-[#0056b3] text-[#000000]"
                                                name="statusTarefa">
                                                <option value="A fazer" <?= ($t['statusTarefa'] === 'A fazer') ? 'selected' : '' ?>>A fazer</option>
                                                <option value="Fazendo" <?= ($t['statusTarefa'] === 'Fazendo') ? 'selected' : '' ?>>Fazendo</option>
                                                <option value="Pronto" <?= ($t['statusTarefa'] === 'Pronto') ? 'selected' : '' ?>>Pronto</option>
                                            </select>
                                            <input type="hidden" name="idTarefa" value="<?= $t['idTarefa'] ?>">
                                            <button type="submit" class="px-3 py-2 bg-[#0056b3] text-white text-sm rounded hover:bg-[#004a99] transition-colors">
                                                Alterar
                                            </button>
                                        </div>
                                    </form>

                                    <div class="flex space-x-2">
                                        <a href="/public/editar-tarefa.php?id=<?= $t['idTarefa'] ?>"
                                            class="w-full px-3 py-2 bg-[#0056b3] text-white text-sm rounded hover:bg-[#004a99] transition-colors">
                                            Editar
                                        </a>

                                        <form action="" method="POST" class="flex-1"
                                            onsubmit="return confirm('Tem certeza que deseja excluir esta tarefa?');">
                                            <input type="hidden" name="idTarefaExcluir" value="<?= $t['idTarefa'] ?>">
                                            <button type="submit" class="w-full px-3 py-2 bg-[#000000] text-white text-sm rounded hover:opacity-80 transition-colors">
                                                Excluir
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>

                    <div>
                        <h3 class="text-xl font-semibold text-[#000000] mb-4 text-center">Fazendo</h3>
                        <?php foreach ($tarefas as $t): ?>
                            <?php if ($t['statusTarefa'] === 'Fazendo'): ?>
                                <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow mb-4">
                                    <div class="flex justify-between items-start mb-4">
                                        <span class="inline-block px-3 py-1 bg-[#0056b326] text-[#0056b3] text-xs font-medium rounded-full">
                                            <?= $t['prioridadeTarefa'] ?>
                                        </span>
                                        <span class="inline-block px-3 py-1 bg-[#0000001a] text-[#000000] text-xs font-medium rounded-full">
                                            <?= $t['statusTarefa'] ?>
                                        </span>
                                    </div>

                                    <h3 class="font-bold text-[#000000] mb-2">Descrição:</h3>
                                    <p class="text-[#000000] mb-3"><?= $t['descricaoTarefa'] ?></p>

                                    <div class="space-y-2 mb-4">
                                        <p class="text-sm"><span class="font-medium text-[#000000]">Setor:</span> <?= $t['nomeSetor'] ?></p>
                                        <p class="text-sm"><span class="font-medium text-[#000000]">Vinculado a:</span> <?= $t['nomeUsuario'] ?></p>
                                    </div>

                                    <form action="" method="POST" class="space-y-3 mb-3">
                                        <div class="flex items-center space-x-2">
                                            <select
                                                class="flex-1 px-3 py-2 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-[#0056b3] focus:border-[#0056b3] text-[#000000]"
                                                name="statusTarefa">
                                                <option value="A fazer" <?= ($t['statusTarefa'] === 'A fazer') ? 'selected' : '' ?>>A fazer</option>
                                                <option value="Fazendo" <?= ($t['statusTarefa'] === 'Fazendo') ? 'selected' : '' ?>>Fazendo</option>
                                                <option value="Pronto" <?= ($t['statusTarefa'] === 'Pronto') ? 'selected' : '' ?>>Pronto</option>
                                            </select>
                                            <input type="hidden" name="idTarefa" value="<?= $t['idTarefa'] ?>">
                                            <button type="submit" class="px-3 py-2 bg-[#0056b3] text-white text-sm rounded hover:bg-[#004a99] transition-colors">
                                                Alterar
                                            </button>
                                        </div>
                                    </form>

                                    <div class="flex space-x-2">
                                        <a href="/public/editar-tarefa.php?id=<?= $t['idTarefa'] ?>"
                                            class="w-full px-3 py-2 bg-[#0056b3] text-white text-sm rounded hover:bg-[#004a99] transition-colors">
                                            Editar
                                        </a>

                                        <form action="" method="POST" class="flex-1"
                                            onsubmit="return confirm('Tem certeza que deseja excluir esta tarefa?');">
                                            <input type="hidden" name="idTarefaExcluir" value="<?= $t['idTarefa'] ?>">
                                            <button type="submit" class="w-full px-3 py-2 bg-[#000000] text-white text-sm rounded hover:opacity-80 transition-colors">
                                                Excluir
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>

                    <!-- Coluna: Pronto -->
                    <div>
                        <h3 class="text-xl font-semibold text-[#000000] mb-4 text-center">Pronto</h3>
                        <?php foreach ($tarefas as $t): ?>
                            <?php if ($t['statusTarefa'] === 'Pronto'): ?>
                                <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow mb-4">
                                    <div class="flex justify-between items-start mb-4">
                                        <span class="inline-block px-3 py-1 bg-[#0056b326] text-[#0056b3] text-xs font-medium rounded-full">
                                            <?= $t['prioridadeTarefa'] ?>
                                        </span>
                                        <span class="inline-block px-3 py-1 bg-[#0000001a] text-[#000000] text-xs font-medium rounded-full">
                                            <?= $t['statusTarefa'] ?>
                                        </span>
                                    </div>

                                    <h3 class="font-bold text-[#000000] mb-2">Descrição:</h3>
                                    <p class="text-[#000000] mb-3"><?= $t['descricaoTarefa'] ?></p>

                                    <div class="space-y-2 mb-4">
                                        <p class="text-sm"><span class="font-medium text-[#000000]">Setor:</span> <?= $t['nomeSetor'] ?></p>
                                        <p class="text-sm"><span class="font-medium text-[#000000]">Vinculado a:</span> <?= $t['nomeUsuario'] ?></p>
                                    </div>

                                    <form action="" method="POST" class="space-y-3 mb-3">
                                        <div class="flex items-center space-x-2">
                                            <select
                                                class="flex-1 px-3 py-2 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-[#0056b3] focus:border-[#0056b3] text-[#000000]"
                                                name="statusTarefa">
                                                <option value="A fazer" <?= ($t['statusTarefa'] === 'A fazer') ? 'selected' : '' ?>>A fazer</option>
                                                <option value="Fazendo" <?= ($t['statusTarefa'] === 'Fazendo') ? 'selected' : '' ?>>Fazendo</option>
                                                <option value="Pronto" <?= ($t['statusTarefa'] === 'Pronto') ? 'selected' : '' ?>>Pronto</option>
                                            </select>
                                            <input type="hidden" name="idTarefa" value="<?= $t['idTarefa'] ?>">
                                            <button type="submit" class="px-3 py-2 bg-[#0056b3] text-white text-sm rounded hover:bg-[#004a99] transition-colors">
                                                Alterar
                                            </button>
                                        </div>
                                    </form>

                                    <div class="flex space-x-2">
                                        <a href="/public/editar-tarefa.php?id=<?= $t['idTarefa'] ?>"
                                            class="w-full px-3 py-2 bg-[#0056b3] text-white text-sm rounded hover:bg-[#004a99] transition-colors">
                                            Editar
                                        </a>

                                        <form action="" method="POST" class="flex-1"
                                            onsubmit="return confirm('Tem certeza que deseja excluir esta tarefa?');">
                                            <input type="hidden" name="idTarefaExcluir" value="<?= $t['idTarefa'] ?>">
                                            <button type="submit" class="w-full px-3 py-2 bg-[#000000] text-white text-sm rounded hover:opacity-80 transition-colors">
                                                Excluir
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php else: ?>
                <p class="text-center text-[#000000] text-lg mt-10">Nenhuma tarefa encontrada.</p>
            <?php endif; ?>
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