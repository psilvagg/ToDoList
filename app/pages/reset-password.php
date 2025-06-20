<!DOCTYPE html>
<html lang="pt-BR" class="h-full">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nova Senha - TaskFlow</title>
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
      class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8"
    >
      <div class="max-w-md w-full space-y-8 animate-fade-in">
        <div class="text-center">
          <div
            class="mx-auto h-16 w-16 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full flex items-center justify-center"
          >
            <svg
              class="h-8 w-8 text-white"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
              ></path>
            </svg>
          </div>
          <h2 class="mt-6 text-3xl font-extrabold text-white">Nova Senha</h2>
          <p class="mt-2 text-sm text-gray-400">Crie uma nova senha</p>
        </div>

        <form class="mt-8 space-y-6" onsubmit="handleResetPassword(event)">
          <div class="space-y-4">
            <div>
              <label
                for="password"
                class="block text-sm font-medium text-white mb-2"
                >Nova Senha</label
              >
              <div class="relative">
                <input
                  id="password"
                  name="password"
                  type="password"
                  required
                  class="appearance-none rounded-lg relative block w-full px-3 py-3 pr-10 border border-gray-700 placeholder-gray-400 text-white bg-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200"
                />
                <button
                  type="button"
                  onclick="togglePassword('password')"
                  class="absolute inset-y-0 right-0 pr-3 flex items-center"
                >
                  <svg
                    id="password-eye"
                    class="h-5 w-5 text-gray-400 hover:text-gray-300 transition-colors duration-200"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                    ></path>
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                    ></path>
                  </svg>
                  <svg
                    id="password-eye-off"
                    class="h-5 w-5 text-gray-400 hover:text-gray-300 transition-colors duration-200 hidden"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"
                    ></path>
                  </svg>
                </button>
              </div>
              <div class="mt-2 text-xs text-gray-400">
                Mínimo 8 caracteres, incluindo letras e números
              </div>
            </div>

            <div>
              <label
                for="confirmPassword"
                class="block text-sm font-medium text-white mb-2"
                >Confirmar Nova Senha</label
              >
              <div class="relative">
                <input
                  id="confirmPassword"
                  name="confirmPassword"
                  type="password"
                  required
                  class="appearance-none rounded-lg relative block w-full px-3 py-3 pr-10 border border-gray-700 placeholder-gray-400 text-white bg-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200"
                />
                <button
                  type="button"
                  onclick="togglePassword('confirmPassword')"
                  class="absolute inset-y-0 right-0 pr-3 flex items-center"
                >
                  <svg
                    id="confirmPassword-eye"
                    class="h-5 w-5 text-gray-400 hover:text-gray-300 transition-colors duration-200"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                    ></path>
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                    ></path>
                  </svg>
                  <svg
                    id="confirmPassword-eye-off"
                    class="h-5 w-5 text-gray-400 hover:text-gray-300 transition-colors duration-200 hidden"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"
                    ></path>
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div>
            <button
              type="submit"
              class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 transform hover:scale-105"
            >
              Alterar Senha
            </button>
          </div>

          <!-- <div class="text-center">
            <a
              href="index.html"
              class="font-medium text-blue-400 hover:text-blue-300 transition-colors duration-200"
            >
              ← Voltar ao login
            </a>
          </div> -->
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
