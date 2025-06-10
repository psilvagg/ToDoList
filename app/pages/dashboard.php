<!DOCTYPE html>
<html lang="pt-BR" class="h-full">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard - TaskFlow</title>

  <script src="https://unpkg.com/flowbite@latest/dist/flowbite.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/pt.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          animation: {
            "fade-in": "fadeIn 0.5s ease-in-out",
            "slide-in": "slideIn 0.3s ease-out",
            "bounce-in": "bounceIn 0.6s ease-out",
            "pulse-slow": "pulse 2s infinite",
            shake: "shake 0.5s ease-in-out",
          },
        },
      },
    };
  </script>
  <style>
    @keyframes fadeIn {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }

    @keyframes slideIn {
      from {
        transform: translateX(-20px);
        opacity: 0;
      }

      to {
        transform: translateX(0);
        opacity: 1;
      }
    }

    @keyframes bounceIn {
      0% {
        transform: scale(0.3);
        opacity: 0;
      }

      50% {
        transform: scale(1.05);
      }

      70% {
        transform: scale(0.9);
      }

      100% {
        transform: scale(1);
        opacity: 1;
      }
    }

    @keyframes shake {

      0%,
      100% {
        transform: translateX(0);
      }

      25% {
        transform: translateX(-5px);
      }

      75% {
        transform: translateX(5px);
      }
    }

    .task-card {
      transition: all 0.3s ease;
    }

    .task-card:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    .drag-over {
      background-color: rgba(59, 130, 246, 0.1);
      border: 2px dashed #3b82f6;
    }

    .notification {
      position: fixed;
      top: 20px;
      right: 20px;
      z-index: 1000;
      transform: translateX(400px);
      transition: transform 0.3s ease;
    }

    .notification.show {
      transform: translateX(0);
    }

    .tag {
      display: inline-block;
      padding: 2px 8px;
      border-radius: 12px;
      font-size: 10px;
      font-weight: 500;
      margin: 2px;
    }

    .overdue {
      animation: pulse-slow 2s infinite;
    }

    .search-highlight {
      background-color: rgba(255, 255, 0, 0.3);
      padding: 1px 2px;
      border-radius: 2px;
    }

    .custom-checkbox {
      appearance: none;
      -webkit-appearance: none;
      width: 18px;
      height: 18px;
      border: 2px solid #4b5563;
      border-radius: 4px;
      background-color: #1f2937;
      display: inline-block;
      position: relative;
      margin-right: 8px;
      vertical-align: middle;
      cursor: pointer;
    }

    .custom-checkbox:checked {
      background-color: #2563eb;
      border-color: #2563eb;
    }

    .custom-checkbox:checked::after {
      content: "";
      position: absolute;
      left: 5px;
      top: 2px;
      width: 5px;
      height: 10px;
      border: solid white;
      border-width: 0 2px 2px 0;
      transform: rotate(45deg);
    }
  </style>
</head>

<body class="h-full bg-gray-950">
  <!-- Notification Container -->
  <div id="notificationContainer"></div>

  <!-- Navigation -->
  <nav class="bg-gray-900 shadow-sm border-b border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
        <div class="flex items-center">
          <div class="flex-shrink-0 flex items-center">
            <div
              class="h-8 w-8 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center">
              <svg
                class="h-5 w-5 text-white"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </div>
            <span class="ml-2 text-xl font-bold text-white">TaskFlow</span>
          </div>
        </div>

        <div class="flex items-center space-x-4">
          <!-- Notifications -->
          <button
            onclick="openTaskModal()"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200 flex items-center space-x-2">
            <svg
              class="h-4 w-4"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            <span>Nova Tarefa</span>
          </button>

          <!-- Profile Dropdown -->
          <div class="relative">
            <button
              onclick="toggleProfileMenu()"
              class="flex items-center space-x-2 text-gray-300 hover:text-white transition-colors duration-200">
              <div
                class="h-8 w-8 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center">
                <span class="text-white text-sm font-medium" id="userInitials">U</span>
              </div>
              <svg
                class="h-4 w-4"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M19 9l-7 7-7-7"></path>
              </svg>
            </button>

            <div
              id="profileMenu"
              class="hidden absolute right-0 mt-2 w-48 bg-gray-800 rounded-lg shadow-lg border border-gray-700 z-50">
              <div class="py-1">
                <a
                  href="profile.php"
                  class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 transition-colors duration-200">
                  <div class="flex items-center space-x-2">
                    <svg
                      class="h-4 w-4"
                      fill="none"
                      stroke="currentColor"
                      viewBox="0 0 24 24">
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span>Perfil</span>
                  </div>
                </a>
                <button
                  onclick="logout()"
                  class="w-full text-left block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 transition-colors duration-200">
                  <div class="flex items-center space-x-2">
                    <svg
                      class="h-4 w-4"
                      fill="none"
                      stroke="currentColor"
                      viewBox="0 0 24 24">
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    <span>Sair</span>
                  </div>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <!-- Header with Filters -->
    <div class="mb-8">
      <div
        class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
        <div>
          <h1 class="text-3xl font-bold text-white">Dashboard</h1>
          <p class="mt-2 text-gray-400">
            Gerencie suas tarefas de forma eficiente
          </p>
        </div>
      </div>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
      <div
        class="bg-gray-900 rounded-lg shadow-md border border-gray-800 p-6 animate-fade-in">
        <div class="flex items-center">
          <div class="p-2 bg-blue-900 rounded-lg">
            <svg
              class="h-6 w-6 text-blue-400"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
            </svg>
          </div>
          <div class="ml-4">
            <p class="text-sm font-medium text-gray-400">A Fazer</p>
            <p class="text-2xl font-bold text-white" id="todoCount">0</p>
          </div>
        </div>
      </div>

      <div
        class="bg-gray-900 rounded-lg shadow-md border border-gray-800 p-6 animate-fade-in"
        style="animation-delay: 0.1s">
        <div class="flex items-center">
          <div class="p-2 bg-yellow-900 rounded-lg">
            <svg
              class="h-6 w-6 text-yellow-400"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
          </div>
          <div class="ml-4">
            <p class="text-sm font-medium text-gray-400">Em Andamento</p>
            <p class="text-2xl font-bold text-white" id="inProgressCount">
              0
            </p>
          </div>
        </div>
      </div>

      <div
        class="bg-gray-900 rounded-lg shadow-md border border-gray-800 p-6 animate-fade-in"
        style="animation-delay: 0.2s">
        <div class="flex items-center">
          <div class="p-2 bg-green-900 rounded-lg">
            <svg
              class="h-6 w-6 text-green-400"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
          </div>
          <div class="ml-4">
            <p class="text-sm font-medium text-gray-400">Concluído</p>
            <p class="text-2xl font-bold text-white" id="doneCount">0</p>
          </div>
        </div>
      </div>

      <div
        class="bg-gray-900 rounded-lg shadow-md border border-gray-800 p-6 animate-fade-in"
        style="animation-delay: 0.3s">
        <div class="flex items-center">
          <div class="p-2 bg-red-900 rounded-lg">
            <svg
              class="h-6 w-6 text-red-400"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
            </svg>
          </div>
          <div class="ml-4">
            <p class="text-sm font-medium text-gray-400">Atrasadas</p>
            <p class="text-2xl font-bold text-white" id="overdueCount">0</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Task Board -->
    <div id="kanbanView" class="grid grid-cols-1 lg:grid-cols-3 gap-6">
      <!-- To Do Column -->
      <div class="bg-gray-900 rounded-lg shadow-md border border-gray-800">
        <div class="p-4 border-b border-gray-800">
          <h3 class="text-lg font-semibold text-white flex items-center">
            <div class="w-3 h-3 bg-blue-500 rounded-full mr-2"></div>
            A Fazer
            <span
              class="ml-2 bg-blue-900/50 text-blue-200 text-xs px-2 py-1 rounded-full"
              id="todoColumnCount">0</span>
          </h3>
        </div>
        <div
          id="todoColumn"
          class="p-4 min-h-96 space-y-3"
          ondrop="drop(event)"
          ondragover="allowDrop(event)"
          ondragenter="dragEnter(event)"
          ondragleave="dragLeave(event)">
          <!-- Tasks will be dynamically added here -->
        </div>
      </div>

      <!-- In Progress Column -->
      <div class="bg-gray-900 rounded-lg shadow-md border border-gray-800">
        <div class="p-4 border-b border-gray-800">
          <h3 class="text-lg font-semibold text-white flex items-center">
            <div class="w-3 h-3 bg-yellow-500 rounded-full mr-2"></div>
            Em Andamento
            <span
              class="ml-2 bg-yellow-900/50 text-yellow-200 text-xs px-2 py-1 rounded-full"
              id="inProgressColumnCount">0</span>
          </h3>
        </div>
        <div
          id="inProgressColumn"
          class="p-4 min-h-96 space-y-3"
          ondrop="drop(event)"
          ondragover="allowDrop(event)"
          ondragenter="dragEnter(event)"
          ondragleave="dragLeave(event)">
          <!-- Tasks will be dynamically added here -->
        </div>
      </div>

      <!-- Done Column -->
      <div class="bg-gray-900 rounded-lg shadow-md border border-gray-800">
        <div class="p-4 border-b border-gray-800">
          <h3 class="text-lg font-semibold text-white flex items-center">
            <div class="w-3 h-3 bg-green-500 rounded-full mr-2"></div>
            Concluído
            <span
              class="ml-2 bg-green-900/50 text-green-200 text-xs px-2 py-1 rounded-full"
              id="doneColumnCount">0</span>
          </h3>
        </div>
        <div
          id="doneColumn"
          class="p-4 min-h-96 space-y-3"
          ondrop="drop(event)"
          ondragover="allowDrop(event)"
          ondragenter="dragEnter(event)"
          ondragleave="dragLeave(event)">
          <!-- Tasks will be dynamically added here -->
        </div>
      </div>
    </div>

    <!-- List View (Hidden by default) -->
    <div id="listView" class="hidden">
      <div class="bg-gray-900 rounded-lg shadow-md border border-gray-800">
        <div class="p-4 border-b border-gray-800">
          <h3 class="text-lg font-semibold text-white">Lista de Tarefas</h3>
        </div>
        <div id="taskList" class="divide-y divide-gray-800">
          <!-- Tasks will be dynamically added here -->
        </div>
      </div>
    </div>
  </main>

  <!-- Enhanced Task Modal -->
  <div
    id="taskModal"
    class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div
      class="relative top-10 mx-auto p-5 border border-gray-800 w-full max-w-2xl shadow-lg rounded-lg bg-gray-900 max-h-[90vh] overflow-y-auto">
      <div class="mt-3">
        <div class="flex items-center justify-between mb-4">
          <h3 class="text-lg font-semibold text-white" id="modalTitle">
            Nova Tarefa
          </h3>
          <button
            onclick="closeTaskModal()"
            class="text-gray-400 hover:text-gray-300">
            <svg
              class="h-6 w-6"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>
        </div>

        <form>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div class="md:col-span-2">
              <label
                for="taskTitle"
                class="block text-sm font-medium text-gray-300 mb-2">Título *</label>
              <input
                type="text"
                id="taskTitle"
                required
                class="w-full px-3 py-2 border border-gray-700 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
            </div>

            <div class="md:col-span-2">
              <label
                for="taskDescription"
                class="block text-sm font-medium text-gray-300 mb-2">Descrição</label>
              <textarea
                id="taskDescription"
                rows="3"
                class="w-full px-3 py-2 border border-gray-700 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
            </div>

            <div>
              <label
                for="taskCategory"
                class="block text-sm font-medium text-gray-300 mb-2">Status</label>
              <select
                id="taskCategory"
                class="w-full px-3 py-2 border border-gray-700 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                <option value="" disabled selected>Selecionar o status</option>
                <option value="A fazer">A fazer</option>
                <option value="Em andamento">Em andamento</option>
                <option value="Concluído">Concluído</option>
              </select>
            </div>

            <div>
              <label for="taskDueDate" class="block text-sm font-medium text-gray-300 mb-2">
                Data de Vencimento
              </label>
              <div class="relative">
                <input
                  type="text"
                  id="taskDueDate"
                  datepicker
                  datepicker-autohide
                  class="w-full px-3 py-2 border border-gray-700 rounded-lg bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                  placeholder="Selecione uma data" />
              </div>
            </div>


            <div class="md:col-span-2">
              <label
                for="taskTags"
                class="block text-sm font-medium text-gray-300 mb-2">Tags (separadas por vírgula)</label>
              <input
                type="text"
                id="taskTags"
                placeholder="ex: urgente, reunião, cliente"
                class="w-full px-3 py-2 border border-gray-700 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
            </div>
          </div>

          <div class="flex justify-end space-x-3">
            <button
              type="button"
              onclick="closeTaskModal()"
              class="px-4 py-2 text-sm font-medium text-gray-300 bg-gray-700 hover:bg-gray-600 rounded-lg transition-colors duration-200">
              Cancelar
            </button>
            <button
              type="submit"
              class="px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors duration-200">
              Salvar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Share Modal -->
  <div
    id="shareModal"
    class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div
      class="relative top-20 mx-auto p-5 border border-gray-800 w-96 shadow-lg rounded-lg bg-gray-900">
      <div class="mt-3">
        <div class="flex items-center justify-between mb-4">
          <h3 class="text-lg font-semibold text-white">Compartilhar Lista</h3>
          <button
            onclick="closeShareModal()"
            class="text-gray-400 hover:text-gray-300">
            <svg
              class="h-6 w-6"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>
        </div>

        <div class="space-y-4">
          <div>
            <label
              for="shareEmail"
              class="block text-sm font-medium text-gray-300 mb-2">Email do colaborador</label>
            <input
              type="email"
              id="shareEmail"
              placeholder="email@exemplo.com"
              class="w-full px-3 py-2 border border-gray-700 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
          </div>

          <div>
            <label
              for="sharePermission"
              class="block text-sm font-medium text-gray-300 mb-2">Permissão</label>
            <select
              id="sharePermission"
              class="w-full px-3 py-2 border border-gray-700 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
              <option value="view">Visualizar apenas</option>
              <option value="edit">Editar</option>
              <option value="admin">Administrador</option>
            </select>
          </div>

          <div class="flex justify-end space-x-3">
            <button
              onclick="closeShareModal()"
              class="px-4 py-2 text-sm font-medium text-gray-300 bg-gray-700 hover:bg-gray-600 rounded-lg transition-colors duration-200">
              Cancelar
            </button>
            <button
              onclick="shareList()"
              class="px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 rounded-lg transition-colors duration-200">
              Compartilhar
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function openTaskModal() {
      document.getElementById("taskModal").classList.remove("hidden");
    }

    function closeTaskModal() {
      document.getElementById("taskModal").classList.add("hidden");
    }

    function toggleProfileMenu() {
      const menu = document.getElementById('profileMenu');
      menu.classList.toggle('hidden');
    }

    document.addEventListener('click', function(event) {
      const menu = document.getElementById('profileMenu');
      const button = event.target.closest('button[onclick="toggleProfileMenu()"]'); // botão que abre o menu

      if (!menu.classList.contains('hidden')) {
        // Se o clique NÃO foi no botão de abrir nem dentro do menu, fecha o menu
        if (
          !menu.contains(event.target) &&
          !button
        ) {
          menu.classList.add('hidden');
        }
      }
    });
  </script>
</body>

</html>