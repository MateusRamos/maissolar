<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->fetch('title') ?: 'Login - MaisSolar' ?></title>
    <?= $this->Html->meta('icon') ?>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        'base-black': '#18181B',
                        'base-white': '#FFFFFF',
                        'attention': '#EAB308',
                        'attention-dark': '#D97706',
                        'attention-light': '#FDE047',
                        'highlight': '#22C55E',
                        'highlight-dark': '#16A34A',
                        'highlight-light': '#4ADE80',
                        'medium': '#27272A',
                        'medium-light': '#3F3F46',
                        'medium-dark': '#18181B',
                        'bg-light': '#FAFAFA',
                        'bg-dark': '#18181B',
                        'surface-light': '#FFFFFF',
                        'surface-dark': '#27272A',
                        'text-light-primary': '#18181B',
                        'text-light-secondary': '#71717A',
                        'text-dark-primary': '#F4F4F5',
                        'text-dark-secondary': '#A1A1AA',
                        'border-light': '#E4E4E7',
                        'border-dark': '#3F3F46',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-bg-light dark:bg-bg-dark text-text-light-primary dark:text-text-dark-primary transition-colors min-h-screen">
    <?= $this->fetch('content') ?>
    
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
                $this->request->getSession()->delete('Flash');
            }
            ?>
            
            // Theme toggle
            const savedTheme = localStorage.getItem('theme') || 'light';
            document.documentElement.classList.toggle('dark', savedTheme === 'dark');
        });
    </script>
</body>
</html>