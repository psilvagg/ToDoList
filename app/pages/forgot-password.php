<!DOCTYPE html>
<html lang="pt-BR" class="h-full">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Recuperar Senha - TaskFlow</title>
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

<body class="h-full bg-gradient-to-br from-gray-950 to-gray-900">
  <div
    class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 animate-fade-in">
      <div class="text-center">
        <div
          class="mx-auto h-16 w-16 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full flex items-center justify-center">
          <svg
            class="h-8 w-8 text-white"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24">
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
          </svg>
        </div>
        <h2 class="mt-6 text-3xl font-extrabold text-white">
          Recuperar Senha
        </h2>
        <p class="mt-2 text-sm text-gray-400">
          Digite seu e-mail para receber as instruções de recuperação de
          senha.
        </p>
      </div>

      <form class="mt-8 space-y-6" onsubmit="handleForgotPassword(event)">
        <div>
          <label for="email" class="block text-sm font-medium text-white mb-2">E-mail</label>
          <input
            id="email"
            name="email"
            type="email"
            required
            class="appearance-none rounded-lg relative block w-full px-3 py-3 border border-gray-700 placeholder-gray-400 text-white bg-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200" />
        </div>

        <div>
          <button
            type="submit"
            class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 transform hover:scale-105">
            Enviar Instruções
          </button>
        </div>

        <div class="text-center">
          <a
            href="login.php"
            class="font-medium text-blue-400 hover:text-blue-300 transition-colors duration-200">
            ← Voltar ao login
          </a>
        </div>
      </form>

      <!-- Success Message -->
      <div
        id="successMessage"
        class="hidden bg-green-900/30 border border-green-700 rounded-lg p-4 mt-4">
        <div class="flex">
          <div class="flex-shrink-0">
            <svg
              class="h-5 w-5 text-green-400"
              fill="currentColor"
              viewBox="0 0 20 20">
              <path
                fill-rule="evenodd"
                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                clip-rule="evenodd"></path>
            </svg>
          </div>
          <div class="ml-3">
            <p class="text-sm font-medium text-green-800 dark:text-green-200">
              Instruções enviadas! Verifique seu email.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>