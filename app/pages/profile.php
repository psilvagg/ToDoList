<!DOCTYPE html>
<html lang="pt-BR" class="h-full">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Perfil - TaskFlow</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          animation: {
            "fade-in": "fadeIn 0.5s ease-in-out",
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
  </style>
</head>

<body class="h-full bg-gray-950">
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
          <!-- Back to Dashboard -->
          <a
            href="dashboard.php"
            class="text-gray-300 hover:text-white transition-colors duration-200 flex items-center space-x-2">
            <svg
              class="h-4 w-4"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            <span>Dashboard</span>
          </a>

          <!-- Logout -->
          <button
            onclick="logout()"
            class="text-gray-300 hover:text-white transition-colors duration-200">
            <svg
              class="h-5 w-5"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
            </svg>
          </button>
        </div>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <main class="max-w-4xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <div class="animate-fade-in">
      <!-- Header -->
      <div class="mb-8">
        <h1 class="text-3xl font-bold text-white">Perfil do Usuário</h1>
        <p class="mt-2 text-gray-400">
          Gerencie suas informações pessoais e preferências
        </p>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Profile Card -->
        <div class="lg:col-span-1">
          <div
            class="bg-gray-900 rounded-lg shadow-md border border-gray-800 p-6">
            <div class="text-center">
              <div
                class="mx-auto h-24 w-24 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mb-4">
                <span
                  class="text-white text-2xl font-bold"
                  id="profileInitials">U</span>
              </div>
              <h3 class="text-lg font-semibold text-white" id="profileName">
                Usuário
              </h3>
              <p class="text-gray-400" id="profileEmail">user@example.com</p>
              <div class="mt-4">
                <span
                  class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-900/50 text-green-200">
                  <svg
                    class="w-2 h-2 mr-1"
                    fill="currentColor"
                    viewBox="0 0 8 8">
                    <circle cx="4" cy="4" r="3" />
                  </svg>
                  Ativo
                </span>
              </div>
            </div>

            <div class="mt-6 border-t border-gray-800 pt-6">
              <div class="text-sm">
                <div class="flex justify-between py-2">
                  <span class="text-gray-400">Membro desde:</span>
                  <span class="text-white" id="memberSince">Janeiro 2024</span>
                </div>
                <div class="flex justify-between py-2">
                  <span class="text-gray-400">Tarefas criadas:</span>
                  <span class="text-white" id="tasksCreated">0</span>
                </div>
                <div class="flex justify-between py-2">
                  <span class="text-gray-400">Tarefas concluídas:</span>
                  <span class="text-white" id="tasksCompleted">0</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Profile Form -->
        <div class="lg:col-span-2">
          <div
            class="bg-gray-900 rounded-lg shadow-md border border-gray-800">
            <div class="p-6 border-b border-gray-800">
              <h3 class="text-lg font-semibold text-white">
                Informações Pessoais
              </h3>
            </div>

            <form class="p-6 space-y-6" onsubmit="updateProfile(event)">
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                  <label
                    for="firstName"
                    class="block text-sm font-medium text-white-700 text-gray-300 mb-2">Nome</label>
                  <input
                    type="text"
                    id="firstName"
                    class="w-full px-3 py-2 border border-gray-700 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
                </div>

                <div>
                  <label
                    for="lastName"
                    class="block text-sm font-medium text-white-700 text-gray-300 mb-2">Sobrenome</label>
                  <input
                    type="text"
                    id="lastName"
                    class="w-full px-3 py-2 border border-gray-700 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
                </div>
              </div>

              <div>
                <label
                  for="email"
                  class="block text-sm font-medium text-white-700 text-gray-300 mb-2">Email</label>
                <input
                  type="email"
                  id="email"
                  class="w-full px-3 py-2 border border-gray-700 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
              </div>

              <div>
                <label
                  for="phone"
                  class="block text-sm font-medium text-white-700 text-gray-300 mb-2">Telefone</label>
                <input
                  type="tel"
                  id="phone"
                  class="w-full px-3 py-2 border border-gray-700 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
              </div>

              <div>
                <label
                  for="bio"
                  class="block text-sm font-medium text-white-700 text-gray-300 mb-2">Biografia</label>
                <textarea
                  id="bio"
                  rows="4"
                  class="w-full px-3 py-2 border border-gray-700 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                  placeholder="Conte um pouco sobre você..."></textarea>
              </div>

              <div class="flex justify-end">
                <button
                  type="submit"
                  class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-200">
                  Salvar Alterações
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Security Settings -->
      <div class="mt-8">
        <div class="bg-gray-900 rounded-lg shadow-md border border-gray-800">
          <div class="p-6 border-b border-gray-800">
            <h3 class="text-lg font-semibold text-white">
              Configurações de Segurança
            </h3>
          </div>

          <div class="p-6 space-y-6">
            <div class="flex items-center justify-between">
              <div>
                <h4 class="text-sm font-medium text-white">Alterar Senha</h4>
                <p class="text-sm text-gray-400">
                  Atualize sua senha regularmente para manter sua conta segura
                </p>
              </div>
              <button
                onclick="changePassword()"
                class="px-4 py-2 bg-gray-800 hover:bg-gray-700 text-gray-300 font-medium rounded-lg transition-colors duration-200">
                Alterar Senha
              </button>
            </div>

            <div class="border-t border-gray-800 pt-6">
              <div class="flex items-center justify-between">
                <div>
                  <h4 class="text-sm font-medium text-white">
                    Autenticação de Dois Fatores
                  </h4>
                  <p class="text-sm text-gray-400">
                    Adicione uma camada extra de segurança à sua conta
                  </p>
                </div>
                <div class="flex items-center">
                  <input
                    type="checkbox"
                    id="twoFactor"
                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" />
                  <label
                    for="twoFactor"
                    class="ml-2 text-sm text-gray-700 dark:text-gray-300">Ativar 2FA</label>
                </div>
              </div>
            </div>

            <div class="border-t border-gray-800 pt-6">
              <div class="flex items-center justify-between">
                <div>
                  <h4 class="text-sm font-medium text-white">
                    Sessões Ativas
                  </h4>
                  <p class="text-sm text-gray-400">
                    Gerencie onde você está logado
                  </p>
                </div>
                <button
                  onclick="viewSessions()"
                  class="px-4 py-2 bg-gray-800 hover:bg-gray-700 text-gray-300 font-medium rounded-lg transition-colors duration-200">
                  Ver Sessões
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script>
    function changePassword() {
      window.location.href = "reset-password.php";
    }
  </script>
</body>

</html>