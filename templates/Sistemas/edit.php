<?php
$this->layout = 'main';
$this->assign('title', 'Editar Sistema - MaisSolar');

// Arrays de opções
$marcas = [
    'Canadian Solar' => 'Canadian Solar',
    'Jinko Solar' => 'Jinko Solar',
    'Trina Solar' => 'Trina Solar',
    'JA Solar' => 'JA Solar',
    'LONGi Solar' => 'LONGi Solar',
    'Risen Energy' => 'Risen Energy',
    'Growatt' => 'Growatt',
    'Fronius' => 'Fronius',
    'SMA' => 'SMA',
    'ABB' => 'ABB'
];

$tiposEstrutura = [
    'Telha Cerâmica' => 'Telha Cerâmica',
    'Telha Metálica' => 'Telha Metálica',
    'Laje' => 'Laje',
    'Solo' => 'Solo',
    'Fibrocimento' => 'Fibrocimento',
    'Shingle' => 'Shingle'
];

// Definir quais campos devem estar desabilitados baseado no status
$isOrcamento = $sistema->status == 1;
$isInstalacao = $sistema->status == 2;
$isConcluido = $sistema->status == 3;
?>

<!-- Breadcrumb -->
<nav class="flex mb-6" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3">
        <li class="inline-flex items-center">
            <?= $this->Html->link('Dashboard', '/', [
                'class' => 'inline-flex items-center text-sm font-medium text-text-light-secondary dark:text-text-dark-secondary hover:text-highlight'
            ]) ?>
        </li>
        <li>
            <div class="flex items-center">
                <i class="fas fa-chevron-right text-text-light-secondary dark:text-text-dark-secondary mx-2"></i>
                <?= $this->Html->link('Sistemas', ['action' => 'index'], [
                    'class' => 'text-sm font-medium text-text-light-secondary dark:text-text-dark-secondary hover:text-highlight'
                ]) ?>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
                <i class="fas fa-chevron-right text-text-light-secondary dark:text-text-dark-secondary mx-2"></i>
                <span class="text-sm font-medium text-text-light-primary dark:text-text-dark-primary">Editar Sistema</span>
            </div>
        </li>
    </ol>
</nav>

<!-- Header -->
<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-4xl font-bold text-text-light-primary dark:text-text-dark-primary">⚡ Editar Sistema Solar</h1>
    </div>
    <?= $this->Html->link('Voltar', ['action' => 'index'], [
        'class' => 'px-6 py-3 bg-medium hover:bg-medium-light text-base-white rounded-lg transition-colors font-medium inline-flex items-center'
    ]) ?>
</div>

<!-- Timeline de Status -->
<div class="bg-surface-light dark:bg-surface-dark rounded-lg shadow-lg border border-border-light dark:border-border-dark p-6 mb-8">
    <div class="flex items-center justify-center relative">
        <!-- Linha de conexão -->
        <div class="absolute top-1/2 left-0 right-0 h-1 bg-border-light dark:bg-border-dark transform -translate-y-1/2 z-0"></div>
        
        <!-- Status 1: Orçamento -->
        <div class="flex flex-col items-center relative z-10">
            <button type="button" onclick="changeStatus(1)" class="w-16 h-16 rounded-full flex items-center justify-center text-2xl transition-all duration-300 <?= $sistema->status >= 1 ? 'bg-attention text-base-white shadow-lg' : 'bg-border-light dark:bg-border-dark text-text-light-secondary cursor-not-allowed' ?> <?= $sistema->status == 1 ? 'ring-4 ring-attention ring-opacity-50' : '' ?>" <?= $sistema->status < 1 ? 'disabled' : '' ?>>
                <i class="fas fa-file-invoice"></i>
            </button>
            <span class="text-sm font-medium text-text-light-primary dark:text-text-dark-primary mt-2">Orçamento</span>
        </div>
        
        <!-- Espaçador -->
        <div class="flex-1"></div>
        
        <!-- Status 2: Em Instalação -->
        <div class="flex flex-col items-center relative z-10">
            <button type="button" onclick="changeStatus(2)" class="w-16 h-16 rounded-full flex items-center justify-center text-2xl transition-all duration-300 <?= $sistema->status >= 2 ? 'bg-attention-dark text-base-white shadow-lg' : 'bg-border-light dark:bg-border-dark text-text-light-secondary cursor-not-allowed' ?> <?= $sistema->status == 2 ? 'ring-4 ring-attention-dark ring-opacity-50' : '' ?>" <?= $sistema->status < 2 ? 'disabled' : '' ?>>
                <i class="fas fa-hammer"></i>
            </button>
            <span class="text-sm font-medium text-text-light-primary dark:text-text-dark-primary mt-2">Em Instalação</span>
        </div>
        
        <!-- Espaçador -->
        <div class="flex-1"></div>
        
        <!-- Status 3: Concluído -->
        <div class="flex flex-col items-center relative z-10">
            <button type="button" onclick="changeStatus(3)" class="w-16 h-16 rounded-full flex items-center justify-center text-2xl transition-all duration-300 <?= $sistema->status >= 3 ? 'bg-highlight-dark text-base-white shadow-lg' : 'bg-border-light dark:bg-border-dark text-text-light-secondary cursor-not-allowed' ?> <?= $sistema->status == 3 ? 'ring-4 ring-highlight-dark ring-opacity-50' : '' ?>" <?= $sistema->status < 3 ? 'disabled' : '' ?>>
                <i class="fas fa-trophy"></i>
            </button>
            <span class="text-sm font-medium text-text-light-primary dark:text-text-dark-primary mt-2">Concluído</span>
        </div>
    </div>
</div>

<?= $this->Form->create($sistema, ['class' => 'space-y-8']) ?>

<!-- Bloco 1: Dados do Cliente -->
<div class="bg-surface-light dark:bg-surface-dark rounded-lg shadow-lg border border-border-light dark:border-border-dark overflow-hidden">
    <div class="flex flex-col lg:flex-row">
        <div class="lg:w-1/3">
            <img src="https://images.unsplash.com/photo-1560472354-b33ff0c44a43?w=400&h=300&fit=crop" alt="Cliente" class="w-full h-full object-cover min-h-[300px]">
        </div>
        <div class="lg:w-2/3 p-6">
            <h2 class="text-2xl font-bold text-highlight dark:text-highlight mb-6 border-b-2 border-highlight pb-2">👤 Dados do Cliente</h2>
            <div class="space-y-6">
                <div>
                    <?= $this->Form->control('nome', [
                        'label' => 'Nome Completo *',
                        'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary',
                        'required' => true,
                        'autocomplete' => 'off'
                    ]) ?>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <?= $this->Form->control('email', [
                            'type' => 'email',
                            'label' => 'E-mail',
                            'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary',
                            'autocomplete' => 'off'
                        ]) ?>
                    </div>
                    <div>
                        <?= $this->Form->control('telefone', [
                            'label' => 'Telefone',
                            'id' => 'telefone',
                            'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary',
                            'autocomplete' => 'off'
                        ]) ?>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <?= $this->Form->control('cep', [
                            'label' => 'CEP',
                            'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary',
                            'id' => 'cep',
                            'maxlength' => 9,
                            'autocomplete' => 'off'
                        ]) ?>
                    </div>
                    <div class="md:col-span-2">
                        <?= $this->Form->control('rua', [
                            'label' => 'Rua/Avenida',
                            'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary',
                            'id' => 'rua',
                            'autocomplete' => 'off'
                        ]) ?>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div>
                        <?= $this->Form->control('numero', [
                            'label' => 'Número',
                            'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary',
                            'autocomplete' => 'off'
                        ]) ?>
                    </div>
                    <div>
                        <?= $this->Form->control('bairro', [
                            'label' => 'Bairro',
                            'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary',
                            'id' => 'bairro',
                            'autocomplete' => 'off'
                        ]) ?>
                    </div>
                    <div>
                        <?= $this->Form->control('cidade', [
                            'label' => 'Cidade',
                            'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary',
                            'id' => 'cidade',
                            'autocomplete' => 'off'
                        ]) ?>
                    </div>
                    <div>
                        <?= $this->Form->control('estado', [
                            'label' => 'Estado',
                            'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary',
                            'id' => 'estado',
                            'autocomplete' => 'off'
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bloco 2: Especificações Técnicas -->
<div class="bg-surface-light dark:bg-surface-dark rounded-lg shadow-lg border border-border-light dark:border-border-dark overflow-hidden">
    <div class="flex flex-col lg:flex-row">
        <div class="lg:w-1/3">
            <img src="https://images.unsplash.com/photo-1509391366360-2e959784a276?w=400&h=300&fit=crop" alt="Sistema Solar" class="w-full h-full object-cover min-h-[300px]">
        </div>
        <div class="lg:w-2/3 p-6">
            <h2 class="text-2xl font-bold text-highlight dark:text-highlight mb-6 border-b-2 border-highlight pb-2">⚡ Especificações Técnicas</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-medium text-text-light-primary dark:text-text-dark-primary mb-2">Potência do Sistema (kWp) *</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-bolt text-attention"></i>
                        </div>
                        <?= $this->Form->control('potencia_sistema', [
                            'type' => 'number',
                            'step' => '0.01',
                            'label' => false,
                            'class' => 'w-full pl-10 pr-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary',
                            'required' => true,
                            'autocomplete' => 'off'
                        ]) ?>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-light-primary dark:text-text-dark-primary mb-2">Consumo Mensal (kWh) *</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-chart-line text-attention"></i>
                        </div>
                        <?= $this->Form->control('consumo_sistema', [
                            'type' => 'number',
                            'step' => '0.01',
                            'label' => false,
                            'class' => 'w-full pl-10 pr-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary',
                            'required' => true,
                            'autocomplete' => 'off'
                        ]) ?>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-light-primary dark:text-text-dark-primary mb-2">Área Disponível (m²) *</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-ruler-combined text-attention"></i>
                        </div>
                        <?= $this->Form->control('area_sistema', [
                            'type' => 'number',
                            'step' => '0.01',
                            'label' => false,
                            'class' => 'w-full pl-10 pr-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary',
                            'required' => true,
                            'autocomplete' => 'off'
                        ]) ?>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                <div>
                    <?= $this->Form->control('marca', [
                        'type' => 'select',
                        'options' => $marcas,
                        'empty' => 'Selecione uma marca',
                        'label' => 'Marca dos Equipamentos',
                        'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary'
                    ]) ?>
                </div>
                <div>
                    <?= $this->Form->control('tipo_estrutura', [
                        'type' => 'select',
                        'options' => $tiposEstrutura,
                        'empty' => 'Selecione o tipo de estrutura',
                        'label' => 'Tipo de Estrutura',
                        'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary'
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bloco 3: Módulos e Inversores -->
<div class="bg-surface-light dark:bg-surface-dark rounded-lg shadow-lg border border-border-light dark:border-border-dark overflow-hidden">
    <div class="flex flex-col lg:flex-row">
        <div class="lg:w-1/3">
            <img src="https://images.unsplash.com/photo-1624397640148-949b1732bb0a?w=400&h=300&fit=crop" alt="Módulos Solares" class="w-full h-full object-cover min-h-[300px]">
        </div>
        <div class="lg:w-2/3 p-6">
            <h2 class="text-2xl font-bold text-highlight dark:text-highlight mb-6 border-b-2 border-highlight pb-2">🔧 Módulos e Inversores</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <?= $this->Form->control('qnt_modulos', [
                        'type' => 'number',
                        'label' => 'Quantidade de Módulos *',
                        'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary',
                        'required' => true,
                        'autocomplete' => 'off'
                    ]) ?>
                </div>
                <div>
                    <?= $this->Form->control('potencia_modulos', [
                        'type' => 'number',
                        'label' => 'Potência dos Módulos (W)',
                        'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary',
                        'autocomplete' => 'off'
                    ]) ?>
                </div>
                <div>
                    <?= $this->Form->control('is_micro', [
                        'type' => 'select',
                        'options' => [0 => 'Não', 1 => 'Sim'],
                        'label' => 'Usa Microinversor? *',
                        'id' => 'is_micro',
                        'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary',
                        'required' => true
                    ]) ?>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4" id="micro-container" style="display: none;">
                <div>
                    <?= $this->Form->control('qnt_micro', [
                        'type' => 'number',
                        'label' => 'Quantidade de Microinversores',
                        'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary',
                        'autocomplete' => 'off'
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bloco 4: Valores e Orçamento -->
<div class="bg-surface-light dark:bg-surface-dark rounded-lg shadow-lg border border-border-light dark:border-border-dark overflow-hidden">
    <div class="flex flex-col lg:flex-row">
        <div class="lg:w-1/3">
            <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=400&h=300&fit=crop" alt="Orçamento" class="w-full h-full object-cover min-h-[300px]">
        </div>
        <div class="lg:w-2/3 p-6">
            <h2 class="text-2xl font-bold text-highlight dark:text-highlight mb-6 border-b-2 border-highlight pb-2">💰 Valores e Orçamento</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <?= $this->Form->control('valor_orcado', [
                        'label' => 'Valor Total Orçado (R$) *',
                        'type' => 'number',
                        'step' => '0.01',
                        'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary',
                        'required' => true,
                        'autocomplete' => 'off'
                    ]) ?>
                </div>
                <div>
                    <?= $this->Form->control('valor_materiais_orcado', [
                        'label' => 'Valor Materiais Orçado (R$) *',
                        'type' => 'number',
                        'step' => '0.01',
                        'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary',
                        'required' => true,
                        'autocomplete' => 'off'
                    ]) ?>
                </div>
                <div>
                    <?= $this->Form->control('valor_materais_final', [
                        'label' => 'Valor Materiais Final (R$)',
                        'type' => 'number',
                        'step' => '0.01',
                        'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary',
                        'disabled' => $isOrcamento,
                        'autocomplete' => 'off'
                    ]) ?>
                </div>
                <div>
                    <?= $this->Form->control('orcamento_path', [
                        'label' => 'Caminho do Orçamento',
                        'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary',
                        'readonly' => true,
                        'autocomplete' => 'off'
                    ]) ?>
                </div>
            </div>
            <div class="mt-4">
                <?= $this->Form->control('observacoes_orcamento', [
                    'label' => 'Observações do Orçamento',
                    'type' => 'textarea',
                    'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary',
                    'rows' => 3,
                    'autocomplete' => 'off'
                ]) ?>
            </div>
        </div>
    </div>
</div>

<!-- Bloco 5: Execução e Custos (Desabilitado para Orçamento) -->
<div class="bg-surface-light dark:bg-surface-dark rounded-lg shadow-lg border border-border-light dark:border-border-dark overflow-hidden <?= $isOrcamento ? 'opacity-60' : '' ?>">
    <div class="flex flex-col lg:flex-row">
        <div class="lg:w-1/3">
            <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=400&h=300&fit=crop" alt="Execução" class="w-full h-full object-cover min-h-[300px]">
        </div>
        <div class="lg:w-2/3 p-6">
            <h2 class="text-2xl font-bold text-highlight dark:text-highlight mb-6 border-b-2 border-highlight pb-2">🏗️ Execução e Custos</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <?= $this->Form->control('qnt_funcionarios', [
                        'label' => 'Qtd. Funcionários',
                        'type' => 'number',
                        'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary',
                        'disabled' => $isOrcamento,
                        'autocomplete' => 'off'
                    ]) ?>
                </div>
                <div>
                    <?= $this->Form->control('qnt_carros', [
                        'label' => 'Qtd. Carros',
                        'type' => 'number',
                        'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary',
                        'disabled' => $isOrcamento,
                        'autocomplete' => 'off'
                    ]) ?>
                </div>

                <div>
                    <?= $this->Form->control('custo_alimentacao', [
                        'label' => 'Custo Alimentação (R$)',
                        'type' => 'number',
                        'step' => '0.01',
                        'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary',
                        'disabled' => $isOrcamento,
                        'autocomplete' => 'off'
                    ]) ?>
                </div>
                <div>
                    <?= $this->Form->control('custo_transporte', [
                        'label' => 'Custo Transporte (R$)',
                        'type' => 'number',
                        'step' => '0.01',
                        'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary',
                        'disabled' => $isOrcamento,
                        'autocomplete' => 'off'
                    ]) ?>
                </div>
                <div>
                    <?= $this->Form->control('custo_extra_material', [
                        'label' => 'Custo Extra Material (R$)',
                        'type' => 'number',
                        'step' => '0.01',
                        'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary',
                        'disabled' => $isOrcamento,
                        'autocomplete' => 'off'
                    ]) ?>
                </div>
                <div>
                    <?= $this->Form->control('data_inicio', [
                        'label' => 'Data de Início',
                        'type' => 'date',
                        'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary',
                        'disabled' => $isOrcamento,
                        'autocomplete' => 'off'
                    ]) ?>
                </div>
                <div>
                    <?= $this->Form->control('data_termino', [
                        'label' => 'Data de Término',
                        'type' => 'date',
                        'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary',
                        'disabled' => $isOrcamento || $isInstalacao,
                        'autocomplete' => 'off'
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Botões de Ação -->
<div class="flex justify-end space-x-4">
    <?= $this->Html->link('Cancelar', ['action' => 'index'], [
        'class' => 'px-6 py-3 border border-border-light dark:border-border-dark text-text-light-secondary dark:text-text-dark-secondary rounded-lg hover:bg-bg-light dark:hover:bg-medium-light transition-colors font-medium'
    ]) ?>
    <?= $this->Form->button('Salvar Alterações', [
        'type' => 'submit',
        'class' => 'px-6 py-3 bg-highlight hover:bg-highlight-dark text-base-white rounded-lg transition-colors font-medium inline-flex items-center'
    ]) ?>
</div>

<?= $this->Form->end() ?>

<?= $this->Form->hidden('status', ['id' => 'status-field']) ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
$(document).ready(function() {
    $('#telefone').mask('(00) 00000-0000');
    
    // Controle do campo de micro inversores
    function toggleMicroContainer() {
        if ($('#is_micro').val() == '1') {
            $('#micro-container').show();
        } else {
            $('#micro-container').hide();
        }
    }
    
    // Verificar ao carregar a página
    toggleMicroContainer();
    
    // Verificar ao mudar o select
    $('#is_micro').on('change', toggleMicroContainer);
    
    // Busca CEP usando ViaCEP
    $('#cep').on('blur', function() {
        const cep = $(this).val().replace(/\D/g, '');
        
        if (cep.length === 8) {
            $.ajax({
                url: `https://viacep.com.br/ws/${cep}/json/`,
                type: 'GET',
                success: function(data) {
                    if (!data.erro) {
                        $('#rua').val(data.logradouro);
                        $('#bairro').val(data.bairro);
                        $('#cidade').val(data.localidade);
                        $('#estado').val(data.uf);
                    }
                }
            });
        }
    });
});

// Função para mudar status
function changeStatus(newStatus) {
    const currentStatus = <?= $sistema->status ?>;
    
    // Só permite retroceder ou manter o status atual
    if (newStatus <= currentStatus) {
        $('#status-field').val(newStatus);
        
        // Atualizar visual dos botões
        updateStatusButtons(newStatus);
        
        // Recarregar página para aplicar mudanças de campos desabilitados
        if (newStatus !== currentStatus) {
            $('form').append('<input type="hidden" name="status" value="' + newStatus + '">');
            $('form').submit();
        }
    }
}

function updateStatusButtons(activeStatus) {
    // Reset all buttons
    $('[onclick^="changeStatus"]').each(function() {
        $(this).removeClass('ring-4 ring-attention ring-opacity-50 ring-attention-dark ring-highlight-dark');
    });
    
    // Highlight active status
    $('[onclick="changeStatus(' + activeStatus + ')"]').addClass('ring-4 ring-opacity-50');
    
    if (activeStatus === 1) {
        $('[onclick="changeStatus(1)"]').addClass('ring-attention');
    } else if (activeStatus === 2) {
        $('[onclick="changeStatus(2)"]').addClass('ring-attention-dark');
    } else if (activeStatus === 3) {
        $('[onclick="changeStatus(3)"]').addClass('ring-highlight-dark');
    }
}
</script>