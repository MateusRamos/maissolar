<?php
$this->layout = 'main';
$this->assign('title', 'Dashboard - MaisSolar');
?>

<div class="text-center">
    <h1 class="text-4xl font-bold text-medium dark:text-highlight mb-4">
        Bem-vindo ao MaisSolar
    </h1>
    <p class="text-xl text-gray-600 dark:text-base-white mb-8">
        Sistema de gestão para energia solar
    </p>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
        <!-- Card Projetos -->
        <div class="bg-base-white dark:bg-medium border border-gray-200 dark:border-medium-light rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow">
            <div class="text-center">
                <div class="bg-highlight p-4 rounded-full w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                    <i class="fas fa-solar-panel text-base-white text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-medium dark:text-highlight mb-2">Projetos</h3>
                <p class="text-gray-600 dark:text-base-white mb-4">Gerencie seus projetos solares</p>
                <button class="btn-primary">
                    Ver Projetos
                </button>
            </div>
        </div>
        
        <!-- Card Sistemas -->
        <div class="bg-base-white dark:bg-medium border border-gray-200 dark:border-medium-light rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow">
            <div class="text-center">
                <div class="bg-attention p-4 rounded-full w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                    <i class="fas fa-cogs text-base-black text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-medium dark:text-highlight mb-2">Sistemas</h3>
                <p class="text-gray-600 dark:text-base-white mb-4">Configure sistemas de energia</p>
                <button class="btn-attention">
                    Ver Sistemas
                </button>
            </div>
        </div>
        
        <!-- Card Materiais -->
        <div class="bg-base-white dark:bg-medium border border-gray-200 dark:border-medium-light rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow">
            <div class="text-center">
                <div class="bg-medium p-4 rounded-full w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                    <i class="fas fa-boxes text-base-white text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-medium dark:text-highlight mb-2">Materiais</h3>
                <p class="text-gray-600 dark:text-base-white mb-4">Controle de estoque e materiais</p>
                <button class="btn-secondary">
                    Ver Materiais
                </button>
            </div>
        </div>
    </div>
    
    <!-- Estatísticas rápidas -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-16">
        <div class="bg-highlight text-base-white p-6 rounded-lg text-center">
            <h4 class="text-2xl font-bold">25</h4>
            <p class="text-sm opacity-90">Projetos Ativos</p>
        </div>
        <div class="bg-attention text-base-black p-6 rounded-lg text-center">
            <h4 class="text-2xl font-bold">150kW</h4>
            <p class="text-sm opacity-90">Potência Instalada</p>
        </div>
        <div class="bg-medium text-base-white p-6 rounded-lg text-center">
            <h4 class="text-2xl font-bold">R$ 2.5M</h4>
            <p class="text-sm opacity-90">Valor Total</p>
        </div>
        <div class="bg-gray-600 text-base-white p-6 rounded-lg text-center">
            <h4 class="text-2xl font-bold">98%</h4>
            <p class="text-sm opacity-90">Eficiência</p>
        </div>
    </div>
</div>