<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastro - TaskFlow</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          animation: {
            "fade-in": "fadeIn 0.5s ease-in-out",
            "slide-up": "slideUp 0.3s ease-out",
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

  <div id="toast-container" class="fixed top-4 right-4 z-50 space-y-3 max-w-sm w-full"></div>

  <!-- Loading Overlay -->
  <div id="loading-overlay" class="fixed inset-0 bg-black bg-opacity-30 loading-overlay hidden items-center justify-center z-40">
    <div class="bg-gray-800 rounded-lg p-6 flex items-center space-x-3">
      <div class="animate-spin rounded-full h-6 w-6 border-b-2 border-blue-500"></div>
      <span class="text-white">Processando...</span>
    </div>
  </div>

  <div
    class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
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
              d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
          </svg>
        </div>
        <h2 class="mt-6 text-3xl font-extrabold text-white">Criar Conta</h2>
        <p class="mt-2 text-sm text-gray-400">Junte-se ao TaskFlow hoje</p>
      </div>

      <form class="mt-8 space-y-6" id="cadastro-form" action="../src/api/Cadastro.php" method="POST">
        <div class="space-y-4">
          <div>
            <label
              for="name"
              class="block text-sm font-medium text-white mb-2">Nome Completo</label>
            <input
              id="name"
              name="nomeUsuario"
              type="text"

              class="appearance-none rounded-lg relative block w-full px-3 py-3 border border-gray-700 placeholder-gray-400 text-white bg-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200" />
          </div>

          <div>
            <label
              for="email"
              class="block text-sm font-medium text-white mb-2">Email</label>
            <input
              id="email"
              name="emailUsuario"
              type="email"

              class="appearance-none rounded-lg relative block w-full px-3 py-3 border border-gray-700 placeholder-gray-400 text-white bg-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200" />
          </div>

          <div>
            <label
              for="password"
              class="block text-sm font-medium text-white mb-2">Senha</label>
            <div class="relative">
              <input
                id="password"
                name="senhaUsuario"
                type="password"

                class="appearance-none rounded-lg relative block w-full px-3 py-3 pr-10 border border-gray-700 placeholder-gray-400 text-white bg-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200" />
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
            <div class="mt-2 text-xs text-gray-400">
              Mínimo 8 caracteres, incluindo letras e números
            </div>
          </div>

          <div>
            <label
              for="confirmPassword"
              class="block text-sm font-medium text-white mb-2">Confirmar Senha</label>
            <div class="relative">
              <input
                id="confirmPassword"
                name="confSenhaUsuario"
                type="password"

                class="appearance-none rounded-lg relative block w-full px-3 py-3 pr-10 border border-gray-700 placeholder-gray-400 text-white bg-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200" />
              <button
                type="button"
                onclick="togglePassword('confirmPassword')"
                class="absolute inset-y-0 right-0 pr-3 flex items-center">
                <svg
                  id="confirmPassword-eye"
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
                  id="confirmPassword-eye-off"
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

        <div class="flex items-center">
          <input
            id="terms"
            name="terms"
            type="checkbox"
            require
            class="custom-checkbox" />
          <label for="terms" class="block text-sm text-white">
            Aceito os
            <a href="#" class="text-blue-400 hover:text-blue-300">termos de uso</a>
            e
            <a href="#" class="text-blue-400 hover:text-blue-300">política de privacidade</a>
          </label>
        </div>

        <div>
          <button
            type="submit"
            class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 transform hover:scale-105">
            Criar Conta
          </button>
        </div>

        <div class="text-center">
          <span class="text-sm text-gray-600 dark:text-gray-400">Já tem uma conta?
          </span>
          <a
            href="login.php"
            class="font-medium text-blue-400 hover:text-blue-300 transition-colors duration-200">
            Faça login
          </a>
        </div>
      </form>
    </div>
  </div>

  <script>
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

  <script>
    // Configurações dos tipos de mensagem
    const messageTypes = {
      success: {
        bgColor: 'bg-green-800',
        borderColor: 'border-green-500',
        iconColor: 'text-green-400',
        icon: `<svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
               </svg>`
      },
      error: {
        bgColor: 'bg-red-800',
        borderColor: 'border-red-500',
        iconColor: 'text-red-400',
        icon: `<svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
               </svg>`
      },
      warning: {
        bgColor: 'bg-orange-800',
        borderColor: 'border-orange-500',
        iconColor: 'text-orange-400',
        icon: `<svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16c-.77.833.192 2.5 1.732 2.5z"></path>
               </svg>`
      },
      info: {
        bgColor: 'bg-blue-800',
        borderColor: 'border-blue-500',
        iconColor: 'text-blue-400',
        icon: `<svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
               </svg>`
      }
    };

    let toastCounter = 0;

    // Função principal para exibir mensagens do backend
    function showMessage(response) {
      // Se a resposta for uma string, tenta fazer parse
      if (typeof response === 'string') {
        try {
          response = JSON.parse(response);
        } catch (e) {
          console.error('Erro ao fazer parse da resposta:', e);
          return;
        }
      }

      // Determina o tipo baseado na resposta
      let type = 'info';
      if (response.success === true || response.status === 'success') {
        type = 'success';
      } else if (response.success === false || response.status === 'error') {
        type = 'error';
      } else if (response.status === 'warning') {
        type = 'warning';
      }

      // Extrai título e mensagem
      const title = response.title || response.message || 'Notificação';
      const message = response.description || response.details || '';
      const duration = response.duration || 5000;

      showToast(type, title, message, duration);
    }

    // Função para exibir toast
    function showToast(type, title, message, duration = 5000) {
      const toastId = `toast-${++toastCounter}`;
      const config = messageTypes[type];

      const toast = document.createElement('div');
      toast.id = toastId;
      toast.className = `${config.bgColor} ${config.borderColor} border-l-4 rounded-lg shadow-lg p-4 animate-slide-in-right max-w-sm`;

      toast.innerHTML = `
        <div class="flex items-start">
          <div class="flex-shrink-0">
            <div class="${config.iconColor}">
              ${config.icon}
            </div>
          </div>
          <div class="ml-3 flex-1">
            <h4 class="text-sm font-semibold text-white">${title}</h4>
            ${message ? `<p class="text-sm text-gray-300 mt-1">${message}</p>` : ''}
          </div>
          <div class="ml-4 flex-shrink-0">
            <button onclick="removeToast('${toastId}')" class="text-gray-400 hover:text-white transition-colors">
              <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
              </svg>
            </button>
          </div>
        </div>
      `;

      document.getElementById('toast-container').appendChild(toast);

      // Auto remove
      setTimeout(() => {
        removeToast(toastId);
      }, duration);
    }

    function removeToast(toastId) {
      const toast = document.getElementById(toastId);
      if (toast) {
        toast.classList.remove('animate-slide-in-right');
        toast.classList.add('animate-slide-out-right');
        setTimeout(() => {
          if (toast.parentNode) {
            toast.parentNode.removeChild(toast);
          }
        }, 300);
      }
    }

    // Função para mostrar/esconder loading
    function showLoading() {
      document.getElementById('loading-overlay').classList.remove('hidden');
      document.getElementById('loading-overlay').classList.add('flex');
    }

    function hideLoading() {
      document.getElementById('loading-overlay').classList.add('hidden');
      document.getElementById('loading-overlay').classList.remove('flex');
    }

    // Função genérica para fazer requisições AJAX
    async function makeRequest(url, data, method = 'POST') {
      showLoading();

      try {
        const formData = new FormData();

        // Adiciona os dados ao FormData
        for (const key in data) {
          formData.append(key, data[key]);
        }

        const response = await fetch(url, {
          method: method,
          body: formData
        });

        const result = await response.json();

        hideLoading();
        showMessage(result);

        return result;

      } catch (error) {
        hideLoading();
        showMessage({
          success: false,
          title: 'Erro de Conexão',
          description: 'Não foi possível conectar com o servidor. Tente novamente.'
        });
        console.error('Erro na requisição:', error);
      }
    }

    // Event listeners para os formulários
    document.getElementById('cadastro-form').addEventListener('submit', async function(e) {
      e.preventDefault();

      const formData = new FormData(this);
      const data = Object.fromEntries(formData);

      const result = await makeRequest('../src/api/Cadastro.php', {
        action: 'cadastro',
        ...data
      });

      // Se o cadastro foi bem-sucedido, redireciona após mostrar o toast
      if (result && result.success) {
        this.reset();

        // Espera 2 segundos para mostrar o toast antes de redirecionar
        setTimeout(() => {
          window.location.href = 'confirm-account.php'; // Altere aqui para o destino real
        }, 2000);
      }
    });


    // Função para testar ações específicas
    async function testarAcao(acao) {
      await makeRequest('../src/api/Cadastro.php', {
        action: acao
      });
    }
  </script>
</body>

</html>