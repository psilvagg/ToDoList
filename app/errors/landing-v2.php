<!DOCTYPE html>
<html lang="pt-BR" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow - Gerencie suas tarefas de forma eficiente</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.3s ease-out',
                        'bounce-in': 'bounceIn 0.6s ease-out',
                        'float': 'float 6s ease-in-out infinite'
                    }
                }
            }
        }
    </script>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes slideUp {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        @keyframes bounceIn {
            0% { transform: scale(0.3); opacity: 0; }
            50% { transform: scale(1.05); }
            70% { transform: scale(0.9); }
            100% { transform: scale(1); opacity: 1; }
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        .custom-checkbox {
            appearance: none;
            -webkit-appearance: none;
            width: 18px;
            height: 18px;
            border: 2px solid #4B5563;
            border-radius: 4px;
            background-color: #1F2937;
            display: inline-block;
            position: relative;
            margin-right: 8px;
            vertical-align: middle;
            cursor: pointer;
        }

        .custom-checkbox:checked {
            background-color: #2563EB;
            border-color: #2563EB;
        }

        .custom-checkbox:checked::after {
            content: '';
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
<body class="h-full bg-gradient-to-br from-gray-950 to-gray-900">
    <!-- Navigation -->
    <nav class="bg-gray-900/80 backdrop-blur-sm border-b border-gray-800 fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <div class="h-8 w-8 bg-blue-600 rounded-lg flex items-center justify-center">
                            <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <span class="ml-2 text-xl font-bold text-white">TaskFlow</span>
                    </div>
                </div>
                
                <div class="flex items-center space-x-4">
                    <a href="#features" class="text-white hover:text-gray-300 transition-colors duration-200">Recursos</a>
                    <a href="#pricing" class="text-white hover:text-gray-300 transition-colors duration-200">Preços</a>
                    <a href="#contact" class="text-white hover:text-gray-300 transition-colors duration-200">Contato</a>
                    <a href="index.html" class="text-white hover:text-gray-300 transition-colors duration-200">Entrar</a>
                    <a href="register.html" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200">
                        Começar Grátis
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-20 pb-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center">
                <div class="animate-bounce-in">
                    <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6">
                        Organize suas tarefas com
                        <span class="text-blue-500 block">TaskFlow</span>
                    </h1>
                </div>
                <p class="text-xl text-white mb-8 max-w-3xl mx-auto animate-fade-in" style="animation-delay: 0.2s">
                    A plataforma completa para gerenciar suas tarefas, projetos e equipes de forma eficiente. 
                    Aumente sua produtividade com nossa interface intuitiva e recursos avançados.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center animate-slide-up" style="animation-delay: 0.4s">
                    <a href="register.html" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-lg text-lg font-medium transition-all duration-200 transform hover:scale-105">
                        Começar Gratuitamente
                    </a>
                    <a href="#demo" class="border border-gray-700 text-white px-8 py-4 rounded-lg text-lg font-medium hover:bg-gray-800 transition-colors duration-200">
                        Ver Demonstração
                    </a>
                </div>
            </div>
            
            <!-- Hero Image/Dashboard Preview -->
            <div class="mt-16 animate-float">
                <div class="bg-gray-900 rounded-lg shadow-2xl border border-gray-800 p-6 max-w-4xl mx-auto">
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                        <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                    </div>
                    <div class="bg-gray-950 rounded-lg p-4">
                        <div class="grid grid-cols-3 gap-4">
                            <div class="bg-gray-800 rounded-lg p-3">
                                <div class="flex items-center mb-2">
                                    <div class="w-2 h-2 bg-blue-500 rounded-full mr-2"></div>
                                    <span class="text-white text-sm font-medium">A Fazer</span>
                                </div>
                                <div class="space-y-2">
                                    <div class="bg-gray-700 rounded p-2">
                                        <div class="h-2 bg-gray-600 rounded mb-1"></div>
                                        <div class="h-1 bg-gray-600 rounded w-3/4"></div>
                                    </div>
                                    <div class="bg-gray-700 rounded p-2">
                                        <div class="h-2 bg-gray-600 rounded mb-1"></div>
                                        <div class="h-1 bg-gray-600 rounded w-1/2"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-800 rounded-lg p-3">
                                <div class="flex items-center mb-2">
                                    <div class="w-2 h-2 bg-yellow-500 rounded-full mr-2"></div>
                                    <span class="text-white text-sm font-medium">Em Andamento</span>
                                </div>
                                <div class="space-y-2">
                                    <div class="bg-gray-700 rounded p-2">
                                        <div class="h-2 bg-gray-600 rounded mb-1"></div>
                                        <div class="h-1 bg-gray-600 rounded w-2/3"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-800 rounded-lg p-3">
                                <div class="flex items-center mb-2">
                                    <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                                    <span class="text-white text-sm font-medium">Concluído</span>
                                </div>
                                <div class="space-y-2">
                                    <div class="bg-gray-700 rounded p-2">
                                        <div class="h-2 bg-gray-600 rounded mb-1"></div>
                                        <div class="h-1 bg-gray-600 rounded w-4/5"></div>
                                    </div>
                                    <div class="bg-gray-700 rounded p-2">
                                        <div class="h-2 bg-gray-600 rounded mb-1"></div>
                                        <div class="h-1 bg-gray-600 rounded w-3/5"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Recursos que fazem a diferença
                </h2>
                <p class="text-xl text-white max-w-2xl mx-auto">
                    Descubra como o TaskFlow pode transformar sua produtividade com recursos pensados para você
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-gray-900 rounded-lg p-6 border border-gray-800 hover:border-gray-700 transition-colors duration-200">
                    <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center mb-4">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-2">Kanban Intuitivo</h3>
                    <p class="text-gray-400">Organize suas tarefas visualmente com nosso sistema Kanban drag-and-drop fácil de usar.</p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-gray-900 rounded-lg p-6 border border-gray-800 hover:border-gray-700 transition-colors duration-200">
                    <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center mb-4">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-2">Prazos Inteligentes</h3>
                    <p class="text-gray-400">Defina prazos e receba notificações para nunca mais perder uma deadline importante.</p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-gray-900 rounded-lg p-6 border border-gray-800 hover:border-gray-700 transition-colors duration-200">
                    <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center mb-4">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-2">Relatórios Detalhados</h3>
                    <p class="text-gray-400">Acompanhe seu progresso com relatórios e estatísticas detalhadas de produtividade.</p>
                </div>

                <!-- Feature 4 -->
                <div class="bg-gray-900 rounded-lg p-6 border border-gray-800 hover:border-gray-700 transition-colors duration-200">
                    <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center mb-4">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-2">Colaboração em Equipe</h3>
                    <p class="text-gray-400">Trabalhe em equipe com compartilhamento de projetos e comunicação integrada.</p>
                </div>

                <!-- Feature 5 -->
                <div class="bg-gray-900 rounded-lg p-6 border border-gray-800 hover:border-gray-700 transition-colors duration-200">
                    <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center mb-4">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-2">Segurança Avançada</h3>
                    <p class="text-gray-400">Seus dados protegidos com criptografia de ponta e autenticação de dois fatores.</p>
                </div>

                <!-- Feature 6 -->
                <div class="bg-gray-900 rounded-lg p-6 border border-gray-800 hover:border-gray-700 transition-colors duration-200">
                    <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center mb-4">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-2">Acesso Mobile</h3>
                    <p class="text-gray-400">Gerencie suas tarefas em qualquer lugar com nossa interface responsiva e otimizada.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-900/50">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Planos para todos os tamanhos
                </h2>
                <p class="text-xl text-white max-w-2xl mx-auto">
                    Escolha o plano ideal para suas necessidades e comece a aumentar sua produtividade hoje mesmo
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Free Plan -->
                <div class="bg-gray-900 rounded-lg p-8 border border-gray-800">
                    <div class="text-center">
                        <h3 class="text-2xl font-bold text-white mb-2">Gratuito</h3>
                        <div class="text-4xl font-bold text-white mb-4">R$ 0<span class="text-lg text-gray-400">/mês</span></div>
                        <p class="text-gray-400 mb-6">Perfeito para uso pessoal</p>
                    </div>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center text-white">
                            <svg class="h-5 w-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Até 10 tarefas
                        </li>
                        <li class="flex items-center text-white">
                            <svg class="h-5 w-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            1 projeto
                        </li>
                        <li class="flex items-center text-white">
                            <svg class="h-5 w-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Suporte básico
                        </li>
                    </ul>
                    <a href="register.html" class="w-full bg-gray-800 hover:bg-gray-700 text-white py-3 px-4 rounded-lg font-medium transition-colors duration-200 block text-center">
                        Começar Grátis
                    </a>
                </div>

                <!-- Pro Plan -->
                <div class="bg-gray-900 rounded-lg p-8 border border-blue-600 relative">
                    <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                        <span class="bg-yellow-500 text-black px-4 py-1 rounded-full text-sm font-medium">Mais Popular</span>
                    </div>
                    <div class="text-center">
                        <h3 class="text-2xl font-bold text-white mb-2">Pro</h3>
                        <div class="text-4xl font-bold text-white mb-4">R$ 29<span class="text-lg text-gray-200">/mês</span></div>
                        <p class="text-gray-200 mb-6">Ideal para profissionais</p>
                    </div>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center text-white">
                            <svg class="h-5 w-5 text-green-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Tarefas ilimitadas
                        </li>
                        <li class="flex items-center text-white">
                            <svg class="h-5 w-5 text-green-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Projetos ilimitados
                        </li>
                        <li class="flex items-center text-white">
                            <svg class="h-5 w-5 text-green-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Relatórios avançados
                        </li>
                        <li class="flex items-center text-white">
                            <svg class="h-5 w-5 text-green-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Suporte prioritário
                        </li>
                    </ul>
                    <a href="register.html" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 px-4 rounded-lg font-medium transition-colors duration-200 block text-center">
                        Começar Teste Grátis
                    </a>
                </div>

                <!-- Enterprise Plan -->
                <div class="bg-gray-900 rounded-lg p-8 border border-gray-800">
                    <div class="text-center">
                        <h3 class="text-2xl font-bold text-white mb-2">Enterprise</h3>
                        <div class="text-4xl font-bold text-white mb-4">R$ 99<span class="text-lg text-gray-400">/mês</span></div>
                        <p class="text-gray-400 mb-6">Para equipes grandes</p>
                    </div>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center text-white">
                            <svg class="h-5 w-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Tudo do Pro
                        </li>
                        <li class="flex items-center text-white">
                            <svg class="h-5 w-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Usuários ilimitados
                        </li>
                        <li class="flex items-center text-white">
                            <svg class="h-5 w-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            API personalizada
                        </li>
                        <li class="flex items-center text-white">
                            <svg class="h-5 w-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Suporte 24/7
                        </li>
                    </ul>
                    <a href="register.html" class="w-full bg-gray-800 hover:bg-gray-700 text-white py-3 px-4 rounded-lg font-medium transition-colors duration-200 block text-center">
                        Falar com Vendas
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    O que nossos clientes dizem
                </h2>
                <p class="text-xl text-white max-w-2xl mx-auto">
                    Descubra como o TaskFlow está transformando a produtividade de profissionais e empresas
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-gray-900 rounded-lg p-6 border border-gray-800">
                    <div class="flex items-center mb-4">
                        <div class="h-12 w-12 bg-blue-600 rounded-full flex items-center justify-center">
                            <span class="text-white text-lg font-bold">JM</span>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-white">João Martins</h4>
                            <p class="text-gray-400">Designer Freelancer</p>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="flex text-yellow-400">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        </div>
                    </div>
                    <p class="text-white">
                        "O TaskFlow revolucionou minha forma de trabalhar. Consigo gerenciar todos os meus projetos de design em um só lugar e nunca mais perdi um prazo."
                    </p>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-gray-900 rounded-lg p-6 border border-gray-800">
                    <div class="flex items-center mb-4">
                        <div class="h-12 w-12 bg-blue-600 rounded-full flex items-center justify-center">
                            <span class="text-white text-lg font-bold">CS</span>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-white">Carolina Silva</h4>
                            <p class="text-gray-400">Gerente de Projetos</p>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="flex text-yellow-400">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.
