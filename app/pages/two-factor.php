<!DOCTYPE html>
<html lang="pt-BR" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autenticação 2FA - TaskFlow</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'pulse-slow': 'pulse 2s infinite'
                    }
                }
            }
        }
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
    <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 animate-fade-in">
            <div class="text-center">
                <div class="mx-auto h-16 w-16 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full flex items-center justify-center animate-pulse-slow">
                    <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <h2 class="mt-6 text-3xl font-extrabold text-white">Autenticação 2FA</h2>
                <p class="mt-2 text-sm text-gray-400">Digite o código de 6 dígitos do seu aplicativo autenticador</p>
            </div>

            <form class="mt-8 space-y-6" onsubmit="handleTwoFactor(event)">
                <div>
                    <label class="block text-sm font-medium text-white mb-4 text-center">Código 2FA</label>
                    <div class="flex justify-center space-x-2">
                        <input type="text" maxlength="1" class="code-input w-12 h-12 text-center text-lg font-bold border border-gray-700 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200" oninput="moveToNext(this, 0)" onkeydown="handleBackspace(this, 0)">
                        <input type="text" maxlength="1" class="code-input w-12 h-12 text-center text-lg font-bold border border-gray-700 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200" oninput="moveToNext(this, 1)" onkeydown="handleBackspace(this, 1)">
                        <input type="text" maxlength="1" class="code-input w-12 h-12 text-center text-lg font-bold border border-gray-700 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200" oninput="moveToNext(this, 2)" onkeydown="handleBackspace(this, 2)">
                        <input type="text" maxlength="1" class="code-input w-12 h-12 text-center text-lg font-bold border border-gray-700 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200" oninput="moveToNext(this, 3)" onkeydown="handleBackspace(this, 3)">
                        <input type="text" maxlength="1" class="code-input w-12 h-12 text-center text-lg font-bold border border-gray-700 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200" oninput="moveToNext(this, 4)" onkeydown="handleBackspace(this, 4)">
                        <input type="text" maxlength="1" class="code-input w-12 h-12 text-center text-lg font-bold border border-gray-700 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200" oninput="moveToNext(this, 5)" onkeydown="handleBackspace(this, 5)">
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 transform hover:scale-105">
                        Verificar Código
                    </button>
                </div>

                <div class="text-center space-y-2">
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Problemas com o código?
                    </p>
                    <button type="button" onclick="useBackupCode()" class="font-medium text-blue-400 hover:text-blue-300 transition-colors duration-200">
                        Usar código de backup
                    </button>
                </div>

                <!-- <div class="text-center">
                    <a href="index.html" class="font-medium text-blue-400 hover:text-blue-300 transition-colors duration-200">
                        ← Voltar ao login
                    </a>
                </div> -->
            </form>

        </div>
    </div>

    <script>
        function moveToNext(current, index) {
            if (current.value.length === 1 && index < 5) {
                const inputs = document.querySelectorAll('.code-input');
                inputs[index + 1].focus();
            }
        }

        function handleBackspace(current, index) {
            if (event.key === 'Backspace' && current.value === '' && index > 0) {
                const inputs = document.querySelectorAll('.code-input');
                inputs[index - 1].focus();
            }
        }

        // Distribui os caracteres colados entre os inputs
        function handlePaste(event) {
            event.preventDefault();
            const paste = (event.clipboardData || window.clipboardData).getData('text');
            const inputs = document.querySelectorAll('.code-input');
            const chars = paste.replace(/\s+/g, '').split('').slice(0, inputs.length);
            inputs.forEach((input, i) => {
                input.value = chars[i] || '';
            });
            // Foca no último input preenchido
            const nextIndex = chars.length < inputs.length ? chars.length : inputs.length - 1;
            inputs[nextIndex].focus();
        }

        // Adiciona o listener de paste a todos os inputs
        window.onload = function() {
            const inputs = document.querySelectorAll('.code-input');
            inputs.forEach(input => {
                input.addEventListener('paste', handlePaste);
            });
            inputs[0].focus();
        };
    </script>

</body>

</html>