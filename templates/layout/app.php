<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->fetch('title') ?: 'MaisSolar' ?></title>
    <?= $this->Html->meta('icon') ?>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <?= $this->Html->css('tailwind-custom') ?>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        // Cores base
                        'base-black': '#000000',
                        'base-white': '#ffffff',
                        
                        // Cor de atenção (amarelo)
                        'attention': '#fbbf24',
                        'attention-dark': '#f59e0b',
                        'attention-light': '#fde047',
                        
                        // Cor de destaque (verde)
                        'highlight': '#22c55e',
                        'highlight-dark': '#16a34a',
                        'highlight-light': '#4ade80',
                        
                        // Cor média (verde bem escuro)
                        'medium': '#064e3b',
                        'medium-light': '#065f46',
                        'medium-dark': '#022c22'
                    }
                }
            }
        }
    </script>
    
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>
<body class="bg-base-white text-base-black">
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
    <?= $this->fetch('script') ?>
</body>
</html>