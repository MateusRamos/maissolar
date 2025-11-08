<?php
$this->assign('title', 'Login - MaisSolar');
?>

<div class="h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <!-- Logo e Header -->
        <div class="text-center">
            <div class="mx-auto h-20 w-auto flex justify-center items-center mb-6">
                <img src="<?= $this->Url->image('logos/logo.png') ?>" alt="MaisSolar" class="max-h-16">
            </div>
            <h2 class="text-3xl font-bold text-text-light-primary dark:text-text-dark-primary">
                Faça login em sua conta
            </h2>
            <p class="mt-2 text-sm text-text-light-secondary dark:text-text-dark-secondary">
                Sistema de administração de instalações solares
            </p>
        </div>

        <!-- Formulário -->
        <div class="bg-surface-light dark:bg-surface-dark rounded-lg shadow-lg border border-border-light dark:border-border-dark p-8">
            <?= $this->Form->create(null, [
                'class' => 'space-y-6',
                'url' => ['controller' => 'Users', 'action' => 'login']
            ]) ?>
            
            <div>
                <label for="login" class="block text-sm font-medium text-text-light-primary dark:text-text-dark-primary mb-2">
                    <i class="fas fa-user mr-2 text-highlight"></i>
                    Login
                </label>
                <?= $this->Form->control('login', [
                    'type' => 'text',
                    'label' => false,
                    'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary transition-colors',
                    'placeholder' => 'Digite seu login',
                    'required' => true,
                    'autocomplete' => 'off'
                ]) ?>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-text-light-primary dark:text-text-dark-primary mb-2">
                    <i class="fas fa-lock mr-2 text-highlight"></i>
                    Senha
                </label>
                <?= $this->Form->control('password', [
                    'type' => 'password',
                    'label' => false,
                    'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary transition-colors',
                    'placeholder' => 'Digite sua senha',
                    'required' => true,
                    'autocomplete' => 'off'
                ]) ?>
            </div>



            <div>
                <?= $this->Form->button('Entrar', [
                    'type' => 'submit',
                    'class' => 'group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-base-white bg-highlight hover:bg-highlight-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-highlight transition-colors'
                ]) ?>
            </div>

            <?= $this->Form->end() ?>
        </div>

        <!-- Botão de Tema -->
        <div class="text-center">
            <button id="theme-toggle" class="inline-flex items-center px-4 py-2 border border-border-light dark:border-border-dark rounded-lg text-text-light-secondary dark:text-text-dark-secondary hover:text-text-light-primary dark:hover:text-text-dark-primary hover:border-highlight transition-colors">
                <i id="theme-icon" class="fas fa-moon mr-2"></i>
                <span id="theme-text">Modo Escuro</span>
            </button>
        </div>


    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const themeToggle = document.getElementById('theme-toggle');
    const themeIcon = document.getElementById('theme-icon');
    const themeText = document.getElementById('theme-text');
    const html = document.documentElement;
    
    // Initialize theme
    const savedTheme = localStorage.getItem('theme') || 'light';
    html.classList.toggle('dark', savedTheme === 'dark');
    updateThemeButton(savedTheme);
    
    themeToggle.addEventListener('click', function() {
        const isDark = html.classList.contains('dark');
        const newTheme = isDark ? 'light' : 'dark';
        
        html.classList.toggle('dark', newTheme === 'dark');
        updateThemeButton(newTheme);
        localStorage.setItem('theme', newTheme);
    });
    
    function updateThemeButton(theme) {
        if (theme === 'dark') {
            themeIcon.className = 'fas fa-sun mr-2';
            themeText.textContent = 'Modo Claro';
        } else {
            themeIcon.className = 'fas fa-moon mr-2';
            themeText.textContent = 'Modo Escuro';
        }
    }
});
</script>