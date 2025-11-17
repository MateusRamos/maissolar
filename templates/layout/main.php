<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->fetch('title') ?: 'MaisSolar' ?></title>
    <?= $this->Html->meta('icon') ?>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <?= $this->Html->css('tailwind-custom') ?>
    
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        // Cores Base (Neutras)
                        'base-black': '#18181B', // O "quase preto" da Paleta 2 (Fundo Dark / Texto Light)
                        'base-white': '#FFFFFF', // O branco puro (Superfície Light)

                        // Amarelo (Atenção)
                        'attention': '#EAB308', // O amarelo principal da Paleta 2
                        'attention-dark': '#D97706', // Um tom mais escuro para hover/bordas
                        'attention-light': '#FDE047', // Um tom mais claro para fundos de alerta

                        // Verde (Destaque / Primária)
                        'highlight': '#22C55E', // Exatamente o verde da Paleta 2
                        'highlight-dark': '#16A34A', // Exatamente o hover da Paleta 2
                        'highlight-light': '#4ADE80', // O seu tom claro anterior (ótimo para fundos)

                        // Cores do Tema Escuro (Grafite)
                        'medium': '#27272A', // Fundo de "superfície" (cards) do tema escuro
                        'medium-light': '#3F3F46', // Cor de "borda" do tema escuro
                        'medium-dark': '#18181B', // Fundo principal do tema escuro (igual ao base-black)

                        // --- Cores Adicionais da Paleta 2 (Recomendado) ---
                        // Você pode adicionar estas para ter a paleta completa
                        
                        // Cores de Fundo
                        'bg-light': '#FAFAFA', // Fundo principal do tema claro
                        'bg-dark': '#18181B', // Fundo principal do tema escuro
                        'surface-light': '#FFFFFF', // Fundo de card/sidebar do tema claro
                        'surface-dark': '#27272A', // Fundo de card/sidebar do tema escuro

                        // Cores de Texto
                        'text-light-primary': '#18181B', // Texto principal no tema claro
                        'text-light-secondary': '#71717A', // Texto secundário no tema claro
                        'text-dark-primary': '#F4F4F5', // Texto principal no tema escuro
                        'text-dark-secondary': '#A1A1AA', // Texto secundário no tema escuro

                        // Cores de Borda
                        'border-light': '#E4E4E7', // Borda no tema claro
                        'border-dark': '#3F3F46', // Borda no tema escuro
                    }
                }
            }
        }
    </script>
    
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>
<body class="bg-base-white dark:bg-base-black text-base-black dark:text-base-white transition-colors">
    <!-- Navigation -->
    <nav class="bg-medium shadow-lg h-20">
        <div class="px-48 h-full">
            <div class="flex justify-between items-center h-full">
                <!-- Logo -->
                <div class="flex items-center">
                    <img src="<?= $this->Url->image('logos/logo.png') ?>" alt="MaisSolar" class="max-h-16">
                </div>
                
                <!-- Menu -->
                <ul class="flex items-center h-full">
                    <!-- Dashboard -->
                    <li>
                        <a href="/" class="flex items-center h-20 px-6 text-base-white hover:bg-medium-light hover:text-attention transition-colors">
                            Dashboard
                        </a>
                    </li>
                    
                    <!-- Orçamentos -->
                    <li class="relative dropdown">
                        <button class="flex items-center h-20 px-6 text-base-white hover:bg-medium-light hover:text-attention transition-colors dropdown-toggle">
                            Orçamentos
                            <i class="fas fa-chevron-down ml-2 text-sm"></i>
                        </button>
                        <div class="dropdown-menu absolute top-20 left-0 bg-base-white dark:bg-medium shadow-lg rounded-md py-2 w-48 hidden">
                            <a href="<?= $this->Url->build(['controller' => 'Orcamentos', 'action' => 'index']) ?>" class="block px-4 py-2 text-base-black dark:text-base-white hover:bg-gray-100 dark:hover:bg-medium-light">Listar Orçamentos</a>
                            <a href="<?= $this->Url->build(['controller' => 'Orcamentos', 'action' => 'add']) ?>" class="block px-4 py-2 text-base-black dark:text-base-white hover:bg-gray-100 dark:hover:bg-medium-light">Criar Orçamento</a>
                        </div>
                    </li>
                    
                    <!-- Sistemas -->
                    <li class="relative dropdown">
                        <button class="flex items-center h-20 px-6 text-base-white hover:bg-medium-light hover:text-attention transition-colors dropdown-toggle">
                            Sistemas
                            <i class="fas fa-chevron-down ml-2 text-sm"></i>
                        </button>
                        <div class="dropdown-menu absolute top-20 left-0 bg-base-white dark:bg-medium shadow-lg rounded-md py-2 w-48 hidden">
                            <a href="<?= $this->Url->build(['controller' => 'Sistemas', 'action' => 'index']) ?>" class="block px-4 py-2 text-base-black dark:text-base-white hover:bg-gray-100 dark:hover:bg-medium-light">Listar Sistemas</a>
                            <a href="<?= $this->Url->build(['controller' => 'Sistemas', 'action' => 'add']) ?>" class="block px-4 py-2 text-base-black dark:text-base-white hover:bg-gray-100 dark:hover:bg-medium-light">Criar Sistema</a>
                        </div>
                    </li>
                    
                    <!-- Dropdown Usuário -->
                    <li class="relative dropdown">
                        <button class="flex items-center h-20 px-3 text-base-white hover:bg-medium-light hover:text-attention transition-colors dropdown-toggle">
                            <i class="fas fa-user-circle text-2xl"></i>
                        </button>
                        <div class="dropdown-menu absolute top-20 right-0 bg-base-white dark:bg-medium shadow-lg rounded-md py-2 w-32 hidden">
                            <a href="#" onclick="logout()" class="block px-4 py-2 text-base-black dark:text-base-white hover:bg-gray-100 dark:hover:bg-medium-light">
                                <i class="fas fa-sign-out-alt mr-2"></i>Sair
                            </a>
                        </div>
                    </li>
                    
                    <!-- Botão tema -->
                    <li>
                        <button id="theme-toggle" class="flex items-center h-20 min-w-4 px-3 text-base-white hover:bg-medium-light hover:text-attention transition-all duration-300">
                            <i id="theme-icon" class="fas fa-moon transition-transform duration-300"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="px-48 py-8">
        <?= $this->fetch('content') ?>
    </main>
    
    <!-- Toastr Messages -->
    <script>
        $(document).ready(function() {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            
            <?php 
            $flashMessages = $this->request->getSession()->read('Flash');
            if ($flashMessages) {
                foreach ($flashMessages as $key => $messages) {
                    foreach ($messages as $message) {
                        $type = $message['key'] ?? 'default';
                        $text = $message['message'] ?? '';
                        
                        switch($type) {
                            case 'success':
                                echo "toastr.success('" . addslashes($text) . "');";
                                break;
                            case 'error':
                                echo "toastr.error('" . addslashes($text) . "');";
                                break;
                            case 'warning':
                                echo "toastr.warning('" . addslashes($text) . "');";
                                break;
                            default:
                                echo "toastr.info('" . addslashes($text) . "');";
                                break;
                        }
                    }
                }
                // Limpar mensagens após exibir
                $this->request->getSession()->delete('Flash');
            }
            ?>
        });
    </script>

    <script>
        // Dropdown functionality
        document.addEventListener('DOMContentLoaded', function() {
            const dropdowns = document.querySelectorAll('.dropdown');
            
            dropdowns.forEach(dropdown => {
                const toggle = dropdown.querySelector('.dropdown-toggle');
                const menu = dropdown.querySelector('.dropdown-menu');
                
                toggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Close other dropdowns
                    dropdowns.forEach(other => {
                        if (other !== dropdown) {
                            other.querySelector('.dropdown-menu').classList.add('hidden');
                        }
                    });
                    
                    // Toggle current dropdown
                    menu.classList.toggle('hidden');
                });
            });
            
            // Close dropdowns when clicking outside
            document.addEventListener('click', function(e) {
                if (!e.target.closest('.dropdown')) {
                    dropdowns.forEach(dropdown => {
                        dropdown.querySelector('.dropdown-menu').classList.add('hidden');
                    });
                }
            });
            
            // Theme toggle functionality
            const themeToggle = document.getElementById('theme-toggle');
            const themeIcon = document.getElementById('theme-icon');
            const html = document.documentElement;
            
            // Initialize theme
            const savedTheme = localStorage.getItem('theme') || 'light';
            html.classList.toggle('dark', savedTheme === 'dark');
            updateThemeIcon(savedTheme);
            
            themeToggle.addEventListener('click', function() {
                const isDark = html.classList.contains('dark');
                const newTheme = isDark ? 'light' : 'dark';
                
                // Add rotation animation
                themeIcon.style.transform = 'rotate(180deg)';
                
                setTimeout(() => {
                    html.classList.toggle('dark', newTheme === 'dark');
                    updateThemeIcon(newTheme);
                    localStorage.setItem('theme', newTheme);
                    themeIcon.style.transform = 'rotate(0deg)';
                }, 150);
            });
            
            function updateThemeIcon(theme) {
                if (theme === 'dark') {
                    themeIcon.className = 'fas fa-sun transition-transform duration-300';
                } else {
                    themeIcon.className = 'fas fa-moon transition-transform duration-300';
                }
            }
        });
        
        // Função de logout
        function logout() {
            window.location.href = '/logout';
        }
    </script>
    
    <?= $this->fetch('script') ?>
</body>
</html>