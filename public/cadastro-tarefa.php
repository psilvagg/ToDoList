<?php
session_start();
require '../app/Utils/Database.php';
require '../app/Models/Tarefa.php';
require '../app/Models/Usuario.php';

use app\Models\Tarefa;
use app\Models\Usuario;

try {
    $usuarios = Usuario::MostrarUsuarios($pdo);
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        Tarefa::CadastrarTarefa($pdo);
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
    <title>Cadastro de Tarefas - Sistema de Tarefas</title>
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
                    <a href="" ondblclick="window.reload"
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
                    <h2 class="text-3xl font-bold text-dark mb-2">Cadastro de Tarefas</h2>
                    <p class="text-gray-600">Preencha os dados para criar uma nova tarefa</p>
                </div>

                <form class="space-y-6" action="" method="POST">
                    <div>
                        <label for="usuario" class="block text-sm font-medium text-dark mb-2">
                            Usuário
                        </label>
                        <select id="usuario" name="idUsuario_FK" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors">
                            <option value="" disabled selected>Selecione um usuário...</option>
                            <?php if (!empty($usuarios)): ?>
                                <?php foreach ($usuarios as $u): ?>
                                    <option value="<?= htmlspecialchars($u['idUsuario']) ?>">
                                        <?= htmlspecialchars($u['nomeUsuario']) ?> - <?= htmlspecialchars($u['emailUsuario']) ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>

                    <div>
                        <label for="prioridade" class="block text-sm font-medium text-dark mb-2">
                            Prioridade
                        </label>
                        <select id="prioridade" name="prioridadeTarefa" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors">
                            <option value="" disabled selected>Selecione a prioridade...</option>
                            <option value="Baixa">Baixa</option>
                            <option value="Media">Média</option>
                            <option value="Alta">Alta</option>
                        </select>
                    </div>

                    <div>
                        <label for="setor" class="block text-sm font-medium text-dark mb-2">
                            Setor
                        </label>
                        <input type="text" id="setor" name="setorTarefa" required autocomplete="off"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors">
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-medium text-dark mb-2">
                            Prioridade
                        </label>
                        <select id="prioridade" name="statusTarefa" required disabled
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors">
                            <option value="" selected>A fazer</option>
                        </select>
                    </div>

                    <div>
                        <label for="descricao" class="block text-sm font-medium text-dark mb-2">
                            Descrição da Tarefa
                        </label>
                        <textarea id="descricao" name="descricaoTarefa" rows="4" required autocomplete="off"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors resize-vertical"></textarea>
                    </div>

                    <div class="pt-4">
                        <button type="submit"
                            class="w-full bg-primary text-white py-3 px-6 rounded-lg font-medium text-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 transition-all duration-200 transform hover:scale-[1.02]">
                            Cadastrar Tarefa
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