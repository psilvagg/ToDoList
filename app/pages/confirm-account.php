<?php
session_start();

if (empty($_SESSION['email-temp'])) {
  header("Location: /");
}

?>

<!DOCTYPE html>
<html lang="pt-BR" class="h-full">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Confirmar Conta - TaskFlow</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          animation: {
            "fade-in": "fadeIn 0.5s ease-in-out",
            "pulse-slow": "pulse 2s infinite",
            "slide-up": "slideUp 0.3s ease-out",
            "bounce-in": "bounceIn 0.4s ease-out",
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

    .modal-backdrop {
      backdrop-filter: blur(4px);
    }

    .input-field {
      transition: all 0.2s ease;
    }

    .input-field:focus {
      transform: translateY(-1px);
      box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
    }
  </style>
</head>

<body class="h-full bg-gradient-to-br from-gray-950 to-gray-900">
  <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 animate-fade-in">
      <div class="text-center">
        <div class="mx-auto h-16 w-16 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full flex items-center justify-center animate-pulse-slow">
          <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
          </svg>
        </div>
        <h2 class="mt-6 text-3xl font-extrabold text-white">
          Confirmar Conta
        </h2>
        <p class="mt-2 text-sm text-gray-400">
          Digite o código de 6 dígitos enviado para seu e-mail
        </p>
      </div>

      <form class="mt-8 space-y-6" onsubmit="handleConfirmAccount(event)">
        <div>
          <label class="block text-sm font-medium text-white mb-4 text-center">Código de Confirmação</label>
          <div class="flex justify-center space-x-2">
            <input type="text" maxlength="1" class="code-input w-12 h-12 text-center text-lg font-bold border border-gray-700 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200" oninput="moveToNext(this, 0)" onkeydown="handleBackspace(this, 0)" />
            <input type="text" maxlength="1" class="code-input w-12 h-12 text-center text-lg font-bold border border-gray-700 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200" oninput="moveToNext(this, 1)" onkeydown="handleBackspace(this, 1)" />
            <input type="text" maxlength="1" class="code-input w-12 h-12 text-center text-lg font-bold border border-gray-700 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200" oninput="moveToNext(this, 2)" onkeydown="handleBackspace(this, 2)" />
            <input type="text" maxlength="1" class="code-input w-12 h-12 text-center text-lg font-bold border border-gray-700 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200" oninput="moveToNext(this, 3)" onkeydown="handleBackspace(this, 3)" />
            <input type="text" maxlength="1" class="code-input w-12 h-12 text-center text-lg font-bold border border-gray-700 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200" oninput="moveToNext(this, 4)" onkeydown="handleBackspace(this, 4)" />
            <input type="text" maxlength="1" class="code-input w-12 h-12 text-center text-lg font-bold border border-gray-700 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200" oninput="moveToNext(this, 5)" onkeydown="handleBackspace(this, 5)" />
          </div>
        </div>

        <div>
          <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 transform hover:scale-105">
            Confirmar Conta
          </button>
        </div>

        <div class="text-center space-y-2">
          <p class="text-sm text-gray-600 dark:text-gray-400">
            Não recebeu o código?
          </p>
          <button type="button" onclick="openResendModal()" class="font-medium text-blue-400 hover:text-blue-300 transition-colors duration-200">
            Reenviar código
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal de Reenvio de Código -->
  <div id="resend-modal" class="fixed inset-0 bg-black bg-opacity-50 modal-backdrop hidden items-center justify-center z-50">
    <div class="bg-gray-800 rounded-xl p-6 max-w-md w-full mx-4 animate-slide-up border border-blue-500">
      <div class="text-center mb-6">
        <div class="mx-auto h-16 w-16 bg-blue-500 rounded-full flex items-center justify-center mb-4 animate-bounce-in">
          <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
          </svg>
        </div>
        <h3 class="text-xl font-semibold text-white mb-2">Reenviar Código de Confirmação</h3>
        <p class="text-gray-300 text-sm">Não recebeu o código de verificação? Podemos enviar um novo código para seu e-mail.</p>
      </div>

      <form id="resend-form" onsubmit="handleResendCode(event)" class="space-y-4">
        <div>
          <label class="block text-sm font-medium text-white mb-2">
            <svg class="inline h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
            E-mail para reenvio
          </label>
          <input
            type="email"
            id="resend-email"
            name="email"
            required
            disabled
            value="<?= $_SESSION['email-temp'] ?>"
            placeholder="seu@email.com"
            class="input-field w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
          <p class="text-xs text-gray-400 mt-1">
            <svg class="inline h-3 w-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            Verifique também sua pasta de spam
          </p>
        </div>

        <div class="bg-blue-900 bg-opacity-30 rounded-lg p-3 border border-blue-500">
          <div class="flex items-start">
            <svg class="h-5 w-5 text-blue-400 mt-0.5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <div>
              <p class="text-blue-300 text-sm font-medium">Aguarde alguns minutos</p>
              <p class="text-blue-200 text-xs mt-1">O novo código pode levar até 5 minutos para chegar</p>
            </div>
          </div>
        </div>

        <div class="flex gap-3 pt-2">
          <button
            type="button"
            onclick="closeResendModal()"
            class="flex-1 bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg transition-colors font-medium">
            Cancelar
          </button>
          <button
            type="submit"
            class="flex-1 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors font-medium flex items-center justify-center">
            <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
            </svg>
            Reenviar Código
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Container para mensagens toast -->
  <div id="toast-container" class="fixed top-4 right-4 z-50 space-y-3 max-w-sm w-full"></div>

  <script>
    // Code input functionality
    function moveToNext(current, index) {
      if (current.value.length === 1 && index < 5) {
        const inputs = document.querySelectorAll(".code-input");
        inputs[index + 1].focus();
      }
    }

    function handleBackspace(current, index) {
      if (event.key === "Backspace" && current.value === "" && index > 0) {
        const inputs = document.querySelectorAll(".code-input");
        inputs[index - 1].focus();
      }
    }

    // Cola e distribui entre os inputs
    function handlePaste(event) {
      event.preventDefault();
      const paste = (event.clipboardData || window.clipboardData).getData("text");
      const inputs = document.querySelectorAll(".code-input");
      const chars = paste.replace(/\s+/g, "").split("").slice(0, inputs.length);
      inputs.forEach((input, i) => {
        input.value = chars[i] || "";
      });
      // Foca no próximo campo livre
      const nextIndex = Math.min(chars.length, inputs.length - 1);
      inputs[nextIndex].focus();
    }

    // Modal functions
    function openResendModal() {
      const modal = document.getElementById('resend-modal');
      modal.classList.remove('hidden');
      modal.classList.add('flex');

      // Foca no campo de email
      setTimeout(() => {
        document.getElementById('resend-email').focus();
      }, 100);
    }

    function closeResendModal() {
      const modal = document.getElementById('resend-modal');
      modal.classList.add('hidden');
      modal.classList.remove('flex');

      // Limpa o formulário
      document.getElementById('resend-form').reset();
    }

    // Handle confirm account
    function handleConfirmAccount(event) {
      event.preventDefault();

      const inputs = document.querySelectorAll('.code-input');
      const code = Array.from(inputs).map(input => input.value).join('');

      if (code.length !== 6) {
        showToast('error', 'Código Incompleto', 'Por favor, digite todos os 6 dígitos do código.');
        return;
      }

      // Simular verificação do código
      if (code === '123456') {
        showToast('success', 'Conta Confirmada!', 'Sua conta foi ativada com sucesso. Redirecionando...');
        setTimeout(() => {
          // Redirecionar para login ou dashboard
          window.location.href = 'login.html';
        }, 2000);
      } else {
        showToast('error', 'Código Inválido', 'O código digitado está incorreto. Verifique e tente novamente.');
        // Limpar campos
        inputs.forEach(input => input.value = '');
        inputs[0].focus();
      }
    }

    // Handle resend code
    function handleResendCode(event) {
      event.preventDefault();

      const email = document.getElementById('resend-email').value;

      if (!email) {
        showToast('error', 'E-mail Obrigatório', 'Por favor, digite seu e-mail.');
        return;
      }

      // Simular envio do código
      showToast('info', 'Código Enviado!', `Um novo código foi enviado para ${email}. Verifique sua caixa de entrada.`);

      closeResendModal();
    }

    // Toast notification system
    let toastCounter = 0;

    function showToast(type, title, message, duration = 5000) {
      const toastId = `toast-${++toastCounter}`;

      const colors = {
        success: {
          bg: 'bg-green-800',
          border: 'border-green-500',
          icon: 'text-green-400'
        },
        error: {
          bg: 'bg-red-800',
          border: 'border-red-500',
          icon: 'text-red-400'
        },
        warning: {
          bg: 'bg-orange-800',
          border: 'border-orange-500',
          icon: 'text-orange-400'
        },
        info: {
          bg: 'bg-blue-800',
          border: 'border-blue-500',
          icon: 'text-blue-400'
        }
      };

      const config = colors[type];
      const icons = {
        success: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>',
        error: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>',
        warning: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16c-.77.833.192 2.5 1.732 2.5z"></path>',
        info: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>'
      };

      const toast = document.createElement('div');
      toast.id = toastId;
      toast.className = `${config.bg} ${config.border} border-l-4 rounded-lg shadow-lg p-4 animate-slide-up max-w-sm`;

      toast.innerHTML = `
        <div class="flex items-start">
          <div class="flex-shrink-0">
            <div class="${config.icon}">
              <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                ${icons[type]}
              </svg>
            </div>
          </div>
          <div class="ml-3 flex-1">
            <h4 class="text-sm font-semibold text-white">${title}</h4>
            <p class="text-sm text-gray-300 mt-1">${message}</p>
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
      if (toast && toast.parentNode) {
        toast.style.transform = 'translateX(100%)';
        toast.style.opacity = '0';
        setTimeout(() => {
          toast.parentNode.removeChild(toast);
        }, 300);
      }
    }

    // Close modal when clicking outside
    document.addEventListener('click', function(event) {
      if (event.target.classList.contains('modal-backdrop')) {
        closeResendModal();
      }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(event) {
      if (event.key === 'Escape') {
        closeResendModal();
      }
    });

    // Adiciona o evento de colar para todos os inputs ao carregar
    window.addEventListener("DOMContentLoaded", () => {
      const inputs = document.querySelectorAll(".code-input");
      inputs.forEach((input) => {
        input.addEventListener("paste", handlePaste);
      });
      inputs[0].focus();
    });
  </script>

</body>

</html>