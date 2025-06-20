<!DOCTYPE html>
<html lang="pt-BR" class="h-full">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TaskFlow - Gerenciador de Tarefas</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          animation: {
            "fade-in": "fadeIn 0.5s ease-in-out",
            "slide-up": "slideUp 0.3s ease-out",
            "bounce-in": "bounceIn 0.6s ease-out",
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

    @keyframes slideUp {
      from {
        transform: translateY(20px);
        opacity: 0;
      }

      to {
        transform: translateY(0);
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
      transition: all 0.2s ease;
    }

    .custom-checkbox:checked {
      background-color: #2563eb;
      border-color: #2563eb;
    }

    .custom-checkbox:checked::after {
      content: "";
      position: absolute;
      left: 4px;
      top: 1px;
      width: 6px;
      height: 10px;
      border: solid white;
      border-width: 0 2px 2px 0;
      transform: rotate(45deg);
    }

    .custom-checkbox:hover {
      border-color: #6b7280;
    }

    .custom-checkbox:focus {
      outline: none;
      ring: 2px;
      ring-color: #3b82f6;
      ring-opacity: 0.5;
    }
  </style>
</head>

<body class="h-full bg-gradient-to-br from-gray-950 to-gray-900">
  <div
    class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 animate-fade-in">
      <div class="text-center">
        <div
          class="mx-auto h-16 w-16 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full flex items-center justify-center animate-bounce-in">
          <svg
            class="h-8 w-8 text-white"
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
        <h2 class="mt-6 text-3xl font-extrabold text-white">TaskFlow</h2>
        <p class="mt-2 text-sm text-gray-300">
          Gerencie suas tarefas de forma eficiente
        </p>
      </div>

      <form class="mt-8 space-y-6" onsubmit="handleLogin(event)">
        <div class="rounded-md shadow-sm space-y-4">
          <div>
            <label
              for="email"
              class="block text-sm font-medium text-white mb-2">E-mail</label>
            <input
              id="email"
              name="email"
              type="email"
              required
              class="appearance-none rounded-lg relative block w-full px-3 py-3 border border-gray-700 placeholder-gray-400 text-white bg-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm transition-all duration-200" />
          </div>
          <div>
            <label
              for="password"
              class="block text-sm font-medium text-white mb-2">Senha</label>
            <div class="relative">
              <input
                id="password"
                name="password"
                type="password"
                required
                class="appearance-none rounded-lg relative block w-full px-3 py-3 pr-10 border border-gray-700 placeholder-gray-400 text-white bg-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm transition-all duration-200" />
              <button
                type="button"
                onclick="togglePassword('password')"
                class="absolute inset-y-0 right-0 pr-3 flex items-center">
                <svg
                  id="password-eye"
                  class="h-5 w-5 text-gray-400 hover:text-gray-300 transition-colors duration-200"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24">
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                </svg>
                <svg
                  id="password-eye-off"
                  class="h-5 w-5 text-gray-400 hover:text-gray-300 transition-colors duration-200 hidden"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24">
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
                </svg>
              </button>
            </div>
          </div>
        </div>

        <div class="flex items-center justify-between">
          <div class="flex items-center">
            <input
              id="remember-me"
              name="remember-me"
              type="checkbox"
              class="custom-checkbox" />
            <label for="remember-me" class="block text-sm text-white">
              Lembrar de mim
            </label>
          </div>

          <div class="text-sm">
            <a
              href="forgot-password.php"
              class="font-medium text-blue-400 hover:text-blue-300 transition-colors duration-200">
              Esqueceu a senha?
            </a>
          </div>
        </div>

        <div>
          <button
            type="submit"
            class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 transform hover:scale-105">
            Entrar
          </button>
        </div>

        <div class="text-center">
          <span class="text-sm text-gray-400">Não tem uma conta? </span>
          <a
            href="register.php"
            class="font-medium text-blue-400 hover:text-blue-300 transition-colors duration-200">
            Cadastre-se
          </a>
        </div>
      </form>
    </div>
  </div>

  <script>
    // Toggle password visibility
    function togglePassword(inputId) {
      const input = document.getElementById(inputId);
      const eyeIcon = document.getElementById(inputId + "-eye");
      const eyeOffIcon = document.getElementById(inputId + "-eye-off");

      if (input.type === "password") {
        input.type = "text";
        eyeIcon.classList.add("hidden");
        eyeOffIcon.classList.remove("hidden");
      } else {
        input.type = "password";
        eyeIcon.classList.remove("hidden");
        eyeOffIcon.classList.add("hidden");
      }
    }
  </script>
</body>

</html>