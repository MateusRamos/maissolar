<?php
$this->layout = 'main';
$this->assign('title', 'Concluir Instalação - MaisSolar');
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
                <span class="text-sm font-medium text-text-light-primary dark:text-text-dark-primary">Concluir Instalação</span>
            </div>
        </li>
    </ol>
</nav>

<!-- Header -->
<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-4xl font-bold text-text-light-primary dark:text-text-dark-primary">🏁 Concluir Instalação</h1>
        <p class="text-text-light-secondary dark:text-text-dark-secondary mt-2">Cliente: <strong><?= h($sistema->nome) ?></strong></p>
    </div>
    <?= $this->Html->link('Voltar', ['action' => 'index'], [
        'class' => 'px-6 py-3 bg-medium hover:bg-medium-light text-base-white rounded-lg transition-colors font-medium inline-flex items-center'
    ]) ?>
</div>

<?= $this->Form->create($sistema, ['class' => 'space-y-8']) ?>
<?= $this->Form->hidden('status', ['value' => 3]) ?>

<!-- Seção 1: Dados da Execução -->
<div class="bg-surface-light dark:bg-surface-dark rounded-lg shadow-lg border border-border-light dark:border-border-dark overflow-hidden">
    <div class="grid grid-cols-1 lg:grid-cols-3">
        <div class="lg:col-span-1">
            <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=400&h=300&fit=crop" 
                 alt="Execução" class="w-full h-64 lg:h-full object-cover">
        </div>
        <div class="lg:col-span-2 p-8">
            <h2 class="text-2xl font-bold text-text-light-primary dark:text-text-dark-primary mb-6 flex items-center">
                <i class="fas fa-hard-hat text-highlight mr-3"></i>
                Dados da Execução
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <?= $this->Form->control('qnt_funcionarios', [
                        'label' => 'Quantidade de Funcionários *',
                        'type' => 'number',
                        'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary',
                        'required' => true,
                        'autocomplete' => 'off'
                    ]) ?>
                </div>
                <div>
                    <?= $this->Form->control('qnt_carros', [
                        'label' => 'Quantidade de Carros',
                        'type' => 'number',
                        'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary',
                        'autocomplete' => 'off'
                    ]) ?>
                </div>
                <div>
                    <?= $this->Form->control('data_inicio', [
                        'label' => 'Data de Início da Instalação',
                        'type' => 'date',
                        'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary',
                        'autocomplete' => 'off'
                    ]) ?>
                </div>
                <div>
                    <?= $this->Form->control('data_termino', [
                        'label' => 'Data de Término da Instalação *',
                        'type' => 'date',
                        'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary',
                        'required' => true,
                        'autocomplete' => 'off'
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Seção 2: Custos Finais -->
<div class="bg-surface-light dark:bg-surface-dark rounded-lg shadow-lg border border-border-light dark:border-border-dark overflow-hidden">
    <div class="grid grid-cols-1 lg:grid-cols-3">
        <div class="lg:col-span-1">
            <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=400&h=300&fit=crop" 
                 alt="Custos" class="w-full h-64 lg:h-full object-cover">
        </div>
        <div class="lg:col-span-2 p-8">
            <h2 class="text-2xl font-bold text-text-light-primary dark:text-text-dark-primary mb-6 flex items-center">
                <i class="fas fa-calculator text-attention mr-3"></i>
                Custos Finais da Instalação
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <?= $this->Form->control('custo_extra_material', [
                        'label' => 'Custo Extra com Material (R$)',
                        'type' => 'number',
                        'step' => '0.01',
                        'value' => '',
                        'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary custo-input',
                        'id' => 'custoExtraMaterial'
                    ]) ?>
                </div>
                <div>
                    <?= $this->Form->control('custo_alimentacao', [
                        'label' => 'Custo de Alimentação (R$)',
                        'type' => 'number',
                        'step' => '0.01',
                        'value' => '',
                        'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary custo-input',
                        'id' => 'custoAlimentacao'
                    ]) ?>
                </div>
                <div>
                    <?= $this->Form->control('custo_transporte', [
                        'label' => 'Custo de Transporte (R$)',
                        'type' => 'number',
                        'step' => '0.01',
                        'value' => '',
                        'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary custo-input',
                        'id' => 'custoTransporte'
                    ]) ?>
                </div>
                <div class="flex items-end">
                    <div class="w-full p-4 bg-highlight bg-opacity-10 rounded-lg border border-highlight">
                        <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary mb-1">Custo Total do Sistema</p>
                        <p class="text-xl font-bold text-highlight" id="custoTotal">R$ <?= $this->Number->format($sistema->valor_materiais_orcado, ['precision' => 2]) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Seção 3: Observações Finais -->
<div class="bg-surface-light dark:bg-surface-dark rounded-lg shadow-lg border border-border-light dark:border-border-dark overflow-hidden">
    <div class="grid grid-cols-1 lg:grid-cols-3">
        <div class="lg:col-span-1">
            <img src="https://images.unsplash.com/photo-1586281380349-632531db7ed4?w=400&h=300&fit=crop" 
                 alt="Observações" class="w-full h-64 lg:h-full object-cover">
        </div>
        <div class="lg:col-span-2 p-8">
            <h2 class="text-2xl font-bold text-text-light-primary dark:text-text-dark-primary mb-6 flex items-center">
                <i class="fas fa-clipboard-list text-highlight mr-3"></i>
                Observações da Instalação
            </h2>
            
            <?= $this->Form->control('observacoes_orcamento', [
                'label' => 'Observações e Detalhes da Instalação',
                'type' => 'textarea',
                'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary',
                'rows' => 5,
                'placeholder' => 'Descreva detalhes importantes da instalação, problemas encontrados, soluções aplicadas, etc.',
                'autocomplete' => 'off'
            ]) ?>
        </div>
    </div>
</div>

<!-- Botões de Ação -->
<div class="flex justify-end space-x-4">
    <?= $this->Html->link('Cancelar', ['action' => 'index'], [
        'class' => 'px-6 py-3 border border-border-light dark:border-border-dark text-text-light-secondary dark:text-text-dark-secondary rounded-lg hover:bg-bg-light dark:hover:bg-medium-light transition-colors font-medium'
    ]) ?>
    <?= $this->Form->button('🏁 Concluir Instalação', [
        'type' => 'submit',
        'class' => 'px-6 py-3 bg-highlight hover:bg-highlight-dark text-base-white rounded-lg transition-colors font-medium inline-flex items-center'
    ]) ?>
</div>

<?= $this->Form->end() ?>

<script>
// Valor base dos materiais orçados
const valorMateriaisOrcado = <?= $sistema->valor_materiais_orcado ?>;

// Função para atualizar o custo total
function atualizarCustoTotal() {
    const custoExtra = parseFloat(document.getElementById('custoExtraMaterial').value) || 0;
    const custoAlimentacao = parseFloat(document.getElementById('custoAlimentacao').value) || 0;
    const custoTransporte = parseFloat(document.getElementById('custoTransporte').value) || 0;
    
    const custoTotal = valorMateriaisOrcado + custoExtra + custoAlimentacao + custoTransporte;
    
    document.getElementById('custoTotal').textContent = 'R$ ' + custoTotal.toLocaleString('pt-BR', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
}

// Adicionar listeners aos inputs de custo
document.querySelectorAll('.custo-input').forEach(input => {
    input.addEventListener('input', atualizarCustoTotal);
});

// Interceptar submit para garantir que todos os dados sejam enviados
document.querySelector('form').addEventListener('submit', function(e) {
    // Garantir que campos vazios tenham valor 0
    const inputs = ['custoExtraMaterial', 'custoAlimentacao', 'custoTransporte'];
    inputs.forEach(id => {
        const input = document.getElementById(id);
        if (!input.value || input.value === '') {
            input.value = '0';
        }
    });
});

// Desabilitar scroll em inputs number
document.addEventListener('wheel', function(e) {
    if (e.target.type === 'number') {
        e.preventDefault();
    }
}, { passive: false });

// Desabilitar scroll quando input está focado
document.querySelectorAll('input[type="number"]').forEach(input => {
    input.addEventListener('focus', function() {
        this.addEventListener('wheel', function(e) {
            e.preventDefault();
        }, { passive: false });
    });
});
</script>