<?php
$this->layout = 'main';
$this->assign('title', 'Criar Orçamento - MaisSolar');

// Array de marcas de equipamentos
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

// Array de tipos de estrutura
$tiposEstrutura = [
    'Telha Cerâmica' => 'Telha Cerâmica',
    'Telha Metálica' => 'Telha Metálica',
    'Laje' => 'Laje',
    'Solo' => 'Solo',
    'Fibrocimento' => 'Fibrocimento',
    'Shingle' => 'Shingle'
];
?>


<h1 class="text-4xl font-bold text-text-light-primary dark:text-text-dark-primary mb-8">Criar Novo Orçamento</h1>

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
                <?= $this->Html->link('Sistemas', ['controller' => 'Sistemas', 'action' => 'index'], [
                    'class' => 'text-sm font-medium text-text-light-secondary dark:text-text-dark-secondary hover:text-highlight'
                ]) ?>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
                <i class="fas fa-chevron-right text-text-light-secondary dark:text-text-dark-secondary mx-2"></i>
                <span class="text-sm font-medium text-text-light-primary dark:text-text-dark-primary">Criar Orçamento</span>
            </div>
        </li>
    </ol>
</nav>


<?= $this->Form->create($sistema, ['class' => 'space-y-8']) ?>

<!-- Card: Dados do Cliente -->
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
                        'placeholder' => 'Ex: João Silva Santos',
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
                            'placeholder' => 'Ex: joao@email.com',
                            'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary',
                            'autocomplete' => 'off'
                        ]) ?>
                    </div>
                    <div>
                        <?= $this->Form->control('telefone', [
                            'label' => 'Telefone',
                            'placeholder' => 'Ex: (11) 99999-9999',
                            'autocomplete' => 'off',
                            'id' => 'telefone',
                            'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary'
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Card: Endereço -->
<div class="bg-surface-light dark:bg-surface-dark rounded-lg shadow-lg border border-border-light dark:border-border-dark overflow-hidden">
    <div class="flex flex-col lg:flex-row">
        <div class="lg:w-1/3">
            <img src="https://images.unsplash.com/photo-1570129477492-45c003edd2be?w=400&h=300&fit=crop" alt="Endereço" class="w-full h-full object-cover min-h-[300px]">
        </div>
        <div class="lg:w-2/3 p-6">
            <h2 class="text-2xl font-bold text-highlight dark:text-highlight mb-6 border-b-2 border-highlight pb-2">📍 Endereço da Instalação</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <?= $this->Form->control('cep', [
                        'label' => 'CEP',
                        'placeholder' => 'Ex: 01234-567',
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
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-4">
                <div>
                    <?= $this->Form->control('numero', [
                        'label' => 'Número',
                        'placeholder' => 'Ex: 123',
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

<!-- Card: Dados Técnicos -->
<div class="bg-surface-light dark:bg-surface-dark rounded-lg shadow-lg border border-border-light dark:border-border-dark overflow-hidden">
    <div class="flex flex-col lg:flex-row">
        <div class="lg:w-1/3">
            <img src="https://images.unsplash.com/photo-1509391366360-2e959784a276?w=400&h=300&fit=crop" alt="Sistema Solar" class="w-full h-full object-cover min-h-[300px]">
        </div>
        <div class="lg:w-2/3 p-6">
            <h2 class="text-2xl font-bold text-highlight dark:text-highlight mb-6 border-b-2 border-highlight pb-2">⚡ Especificações Técnicas</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-medium text-text-light-primary dark:text-text-dark-primary mb-2">Potência do Sistema (kWp)</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-bolt text-attention"></i>
                        </div>
                        <?= $this->Form->control('potencia_sistema', [
                            'type' => 'number',
                            'step' => '0.01',
                            'label' => false,
                            'placeholder' => 'Ex: 5.5',
                            'autocomplete' => 'off',
                            'class' => 'w-full pl-10 pr-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary clear-on-focus'
                        ]) ?>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-light-primary dark:text-text-dark-primary mb-2">Consumo Mensal (kWh)</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-chart-line text-attention"></i>
                        </div>
                        <?= $this->Form->control('consumo_sistema', [
                            'type' => 'number',
                            'step' => '0.01',
                            'label' => false,
                            'placeholder' => 'Ex: 450',
                            'autocomplete' => 'off',
                            'class' => 'w-full pl-10 pr-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary clear-on-focus'
                        ]) ?>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-light-primary dark:text-text-dark-primary mb-2">Área Disponível (m²)</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-ruler-combined text-attention"></i>
                        </div>
                        <?= $this->Form->control('area_sistema', [
                            'type' => 'number',
                            'step' => '0.01',
                            'label' => false,
                            'placeholder' => 'Ex: 35',
                            'autocomplete' => 'off',
                            'class' => 'w-full pl-10 pr-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary clear-on-focus'
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

<!-- Card: Módulos e Inversores -->
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
                        'label' => 'Quantidade de Módulos',
                        'placeholder' => 'Ex: 12',
                        'autocomplete' => 'off',
                        'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary clear-on-focus'
                    ]) ?>
                </div>
                <div>
                    <?= $this->Form->control('potencia_modulos', [
                        'type' => 'number',
                        'label' => 'Potência dos Módulos (W)',
                        'placeholder' => 'Ex: 450',
                        'autocomplete' => 'off',
                        'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary clear-on-focus'
                    ]) ?>
                </div>
                <div>
                    <?= $this->Form->control('is_micro', [
                        'type' => 'select',
                        'options' => [0 => 'Não', 1 => 'Sim'],
                        'label' => 'Usa Micro Inversor?',
                        'id' => 'is_micro',
                        'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary'
                    ]) ?>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4" id="micro-container" style="display: none;">
                <div>
                    <?= $this->Form->control('qnt_micro', [
                        'type' => 'number',
                        'label' => 'Quantidade de Micro Inversores',
                        'placeholder' => 'Ex: 12',
                        'autocomplete' => 'off',
                        'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary clear-on-focus'
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Card: Valores e Observações -->
<div class="bg-surface-light dark:bg-surface-dark rounded-lg shadow-lg border border-border-light dark:border-border-dark overflow-hidden">
    <div class="flex flex-col lg:flex-row">
        <div class="lg:w-1/3">
            <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=400&h=300&fit=crop" alt="Orçamento" class="w-full h-full object-cover min-h-[300px]">
        </div>
        <div class="lg:w-2/3 p-6">
            <h2 class="text-2xl font-bold text-highlight dark:text-highlight mb-6 border-b-2 border-highlight pb-2">💰 Valores e Observações</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <?= $this->Form->control('valor_orcado', [
                        'type' => 'number',
                        'step' => '0.01',
                        'label' => 'Valor Total Orçado (R$)',
                        'placeholder' => 'Ex: 25000.00',
                        'autocomplete' => 'off',
                        'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary clear-on-focus'
                    ]) ?>
                </div>
                <div>
                    <?= $this->Form->control('valor_materiais_orcado', [
                        'type' => 'number',
                        'step' => '0.01',
                        'label' => 'Valor dos Materiais (R$)',
                        'placeholder' => 'Ex: 18000.00',
                        'autocomplete' => 'off',
                        'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary clear-on-focus'
                    ]) ?>
                </div>
            </div>
            <div>
                <?= $this->Form->control('observacoes_orcamento', [
                    'type' => 'textarea',
                    'label' => 'Observações do Orçamento',
                    'placeholder' => 'Ex: Sistema com garantia de 25 anos. Instalação prevista para 30 dias após aprovação.',
                    'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary',
                    'rows' => 4,
                    'autocomplete' => 'off'
                ]) ?>
            </div>
        </div>
    </div>
</div>

<!-- Botões -->
<div class="flex justify-end space-x-4 pt-6">
    <?= $this->Html->link('Cancelar', ['action' => 'index'], [
        'class' => 'px-6 py-3 border border-border-light dark:border-border-dark text-text-light-secondary dark:text-text-dark-secondary rounded-lg hover:bg-bg-light dark:hover:bg-medium-light transition-colors'
    ]) ?>
    <?= $this->Form->button('Criar Orçamento', [
        'type' => 'submit',
        'class' => 'px-6 py-3 bg-highlight hover:bg-highlight-dark text-base-white rounded-lg transition-colors font-medium'
    ]) ?>
</div>

<?= $this->Form->end() ?>

<!-- jQuery, Mask e Toastr JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
$(document).ready(function() {
    // Configuração do Toastr
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "timeOut": "3000"
    };
    
    // Máscara de telefone
    $('#telefone').mask('(00) 00000-0000');
    
    // Limpar valor 0 ao focar nos campos numéricos
    $('.clear-on-focus').on('focus', function() {
        if ($(this).val() == '0' || $(this).val() == '0.00') {
            $(this).val('');
        }
    });
    
    // Controle do campo de micro inversores
    $('#is_micro').on('change', function() {
        if ($(this).val() == '1') {
            $('#micro-container').show();
        } else {
            $('#micro-container').hide();
        }
    });
    
    // Busca CEP usando ViaCEP (API gratuita)
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
                    } else {
                        toastr.error('CEP não encontrado!');
                    }
                },
                error: function() {
                    toastr.error('Erro ao buscar CEP!');
                }
            });
        }
    });
    
    // Notificações
    <?php if (isset($success) && $success): ?>
        toastr.success('Orçamento criado com sucesso!');
    <?php endif; ?>
    
    <?php if (isset($error) && $error): ?>
        toastr.error('Erro ao criar orçamento. Verifique os dados e tente novamente.');
    <?php endif; ?>
});
</script>