<?php
$this->layout = 'main';
$this->assign('title', 'Detalhes do Sistema - MaisSolar');

// Definir status atual
$isOrcamento = $sistema->status == 1;
$isInstalacao = $sistema->status == 2;
$isConcluido = $sistema->status == 3;

// Função para formatar valores monetários
function formatMoney($value) {
    if (empty($value)) return 'R$ 0,00';
    return 'R$ ' . number_format($value, 2, ',', '.');
}
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
                <span class="text-sm font-medium text-text-light-primary dark:text-text-dark-primary">Detalhes do Sistema</span>
            </div>
        </li>
    </ol>
</nav>

<!-- Header -->
<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-4xl font-bold text-text-light-primary dark:text-text-dark-primary">⚡ Sistema Solar - <?= h($sistema->nome) ?></h1>
        <div class="flex items-center mt-2">
            <span class="px-3 py-1 rounded-full text-sm font-medium <?= $isOrcamento ? 'bg-attention bg-opacity-20 text-attention' : ($isInstalacao ? 'bg-attention-dark bg-opacity-20 text-attention-dark' : 'bg-highlight bg-opacity-20 text-highlight') ?>">
                <?= $isOrcamento ? 'Orçamento' : ($isInstalacao ? 'Em Instalação' : 'Concluído') ?>
            </span>
        </div>
    </div>
    <div class="flex space-x-3">
        <?= $this->Html->link('Editar', ['action' => 'edit', $sistema->id], [
            'class' => 'px-6 py-3 bg-highlight hover:bg-highlight-dark text-base-white rounded-lg transition-colors font-medium inline-flex items-center'
        ]) ?>
        <?= $this->Html->link('Voltar', ['action' => 'index'], [
            'class' => 'px-6 py-3 bg-medium hover:bg-medium-light text-base-white rounded-lg transition-colors font-medium inline-flex items-center'
        ]) ?>
    </div>
</div>

<?php if ($isOrcamento): ?>
<!-- Card 1: Dados do Cliente -->
<div class="bg-surface-light dark:bg-surface-dark rounded-lg shadow-lg border border-border-light dark:border-border-dark p-6 mb-6">
    <h2 class="text-xl font-bold text-highlight dark:text-highlight mb-4 border-b border-border-light dark:border-border-dark pb-2">👤 Dados do Cliente</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Nome Completo</p>
            <p class="text-lg font-medium text-text-light-primary dark:text-text-dark-primary"><?= h($sistema->nome) ?></p>
        </div>
        <?php if (!empty($sistema->email)): ?>
        <div>
            <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">E-mail</p>
            <p class="text-lg font-medium text-text-light-primary dark:text-text-dark-primary"><?= h($sistema->email) ?></p>
        </div>
        <?php endif; ?>
        <?php if (!empty($sistema->telefone)): ?>
        <div>
            <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Telefone</p>
            <p class="text-lg font-medium text-text-light-primary dark:text-text-dark-primary"><?= h($sistema->telefone) ?></p>
        </div>
        <?php endif; ?>
        <?php if (!empty($sistema->endereco)): ?>
        <div>
            <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Endereço</p>
            <p class="text-lg font-medium text-text-light-primary dark:text-text-dark-primary"><?= h($sistema->endereco) ?></p>
        </div>
        <?php endif; ?>
    </div>
</div>

<!-- Cards 2: Métricas do Sistema (3 cards em fila) -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    <!-- Potência do Sistema -->
    <div class="bg-surface-light dark:bg-surface-dark rounded-lg shadow-lg border border-border-light dark:border-border-dark p-6 text-center">
        <div class="flex flex-col items-center">
            <div class="w-16 h-16 bg-attention bg-opacity-20 rounded-full flex items-center justify-center mb-4">
                <i class="fas fa-bolt text-3xl text-attention"></i>
            </div>
            <h3 class="text-sm font-medium text-text-light-secondary dark:text-text-dark-secondary mb-2">Potência do Sistema</h3>
            <p class="text-2xl font-bold text-text-light-primary dark:text-text-dark-primary"><?= number_format($sistema->potencia_sistema, 2, ',', '.') ?> kWp</p>
        </div>
    </div>

    <!-- Consumo do Sistema -->
    <div class="bg-surface-light dark:bg-surface-dark rounded-lg shadow-lg border border-border-light dark:border-border-dark p-6 text-center">
        <div class="flex flex-col items-center">
            <div class="w-16 h-16 bg-highlight bg-opacity-20 rounded-full flex items-center justify-center mb-4">
                <i class="fas fa-chart-line text-3xl text-highlight"></i>
            </div>
            <h3 class="text-sm font-medium text-text-light-secondary dark:text-text-dark-secondary mb-2">Consumo Mensal</h3>
            <p class="text-2xl font-bold text-text-light-primary dark:text-text-dark-primary"><?= number_format($sistema->consumo_sistema, 2, ',', '.') ?> kWh</p>
        </div>
    </div>

    <!-- Área do Sistema -->
    <div class="bg-surface-light dark:bg-surface-dark rounded-lg shadow-lg border border-border-light dark:border-border-dark p-6 text-center">
        <div class="flex flex-col items-center">
            <div class="w-16 h-16 bg-attention-dark bg-opacity-20 rounded-full flex items-center justify-center mb-4">
                <i class="fas fa-ruler-combined text-3xl text-attention-dark"></i>
            </div>
            <h3 class="text-sm font-medium text-text-light-secondary dark:text-text-dark-secondary mb-2">Área Disponível</h3>
            <p class="text-2xl font-bold text-text-light-primary dark:text-text-dark-primary"><?= number_format($sistema->area_sistema, 2, ',', '.') ?> m²</p>
        </div>
    </div>
</div>

<!-- Card 3: Dados de Instalação com Desenho da Placa -->
<div class="bg-surface-light dark:bg-surface-dark rounded-lg shadow-lg border border-border-light dark:border-border-dark p-6 mb-6">
    <h2 class="text-xl font-bold text-highlight dark:text-highlight mb-6 border-b border-border-light dark:border-border-dark pb-2">🔧 Dados de Instalação</h2>
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Dados Técnicos -->
        <div class="lg:w-2/3 space-y-4">
            <?php if (!empty($sistema->marca)): ?>
            <div>
                <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Marca dos Equipamentos</p>
                <p class="text-lg font-medium text-text-light-primary dark:text-text-dark-primary"><?= h($sistema->marca) ?></p>
            </div>
            <?php endif; ?>
            
            <?php if (!empty($sistema->tipo_estrutura)): ?>
            <div>
                <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Tipo de Estrutura</p>
                <p class="text-lg font-medium text-text-light-primary dark:text-text-dark-primary"><?= h($sistema->tipo_estrutura) ?></p>
            </div>
            <?php endif; ?>
            
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Quantidade de Módulos</p>
                    <p class="text-lg font-medium text-text-light-primary dark:text-text-dark-primary"><?= h($sistema->qnt_modulos) ?> unidades</p>
                </div>
                
                <?php if (!empty($sistema->potencia_modulos)): ?>
                <div>
                    <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Potência dos Módulos</p>
                    <p class="text-lg font-medium text-text-light-primary dark:text-text-dark-primary"><?= h($sistema->potencia_modulos) ?>W</p>
                </div>
                <?php endif; ?>
            </div>
            
            <div>
                <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Usa Microinversor?</p>
                <p class="text-lg font-medium text-text-light-primary dark:text-text-dark-primary"><?= $sistema->is_micro ? 'Sim' : 'Não' ?></p>
            </div>
            
            <?php if ($sistema->is_micro && !empty($sistema->qnt_micro)): ?>
            <div>
                <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Quantidade de Microinversores</p>
                <p class="text-lg font-medium text-text-light-primary dark:text-text-dark-primary"><?= h($sistema->qnt_micro) ?> unidades</p>
            </div>
            <?php endif; ?>
        </div>
        
        <!-- Desenho da Placa Solar -->
        <div class="lg:w-1/3 flex items-center justify-center h-80">
            <style>
                .solar-grid {
                    background-color: #0f172a;
                    background-image: 
                        linear-gradient(#1e293b 1px, transparent 1px),
                        linear-gradient(90deg, #1e293b 1px, transparent 1px);
                    background-size: 20px 15px;
                    background-position: center center;
                }
            </style>
            
            <div class="relative w-60 h-80 border-4 border-gray-400 rounded-3xl solar-grid box-border">
                <!-- Label Esquerda Superior: Quantidade de Módulos -->
                <div class="absolute top-0 left-0 -translate-y-1/2 -translate-x-4 z-20">
                    <div class="bg-gray-200 text-black font-bold px-2 py-1 rounded border-2 border-gray-400 shadow-lg text-xs whitespace-nowrap">
                        <?= h($sistema->qnt_modulos) ?> módulos
                    </div>
                </div>

                <!-- Label Direita Superior: Tipo de Inversor -->
                <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-4 z-20">
                    <div class="bg-gray-200 text-black font-bold px-2 py-1 rounded border-2 border-gray-400 shadow-lg text-xs">
                        <?= $sistema->is_micro ? 'Micro-inversor' : 'Inversor' ?>
                    </div>
                </div>

                <!-- Linha horizontal central divisória -->
                <div class="absolute top-1/2 left-0 w-full h-1 bg-gray-400 -translate-y-1/2 z-10"></div>

                <!-- Label Central: Potência dos Módulos -->
                <?php if (!empty($sistema->potencia_modulos)): ?>
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-20">
                    <div class="bg-gray-200 text-black font-bold px-6 py-1 rounded-lg border-[3px] border-gray-400 shadow-lg text-lg tracking-wider">
                        <?= h($sistema->potencia_modulos) ?>W
                    </div>
                </div>
                <?php endif; ?>

                <!-- Label Inferior: Marca -->
                <?php if (!empty($sistema->marca)): ?>
                <div class="absolute bottom-0 left-1/2 -translate-x-1/2 translate-y-1/2 z-20">
                    <div class="bg-gray-200 text-black font-bold px-3 py-1 rounded border-2 border-gray-400 shadow-lg text-sm tracking-wide">
                        <?= h($sistema->marca) ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Card 4: Valores e Orçamento -->
<div class="bg-surface-light dark:bg-surface-dark rounded-lg shadow-lg border border-border-light dark:border-border-dark p-6">
    <h2 class="text-xl font-bold text-highlight dark:text-highlight mb-6 border-b border-border-light dark:border-border-dark pb-2">💰 Valores e Orçamento</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Valor Total Orçado</p>
            <p class="text-2xl font-bold text-highlight dark:text-highlight"><?= formatMoney($sistema->valor_orcado) ?></p>
        </div>
        
        <div>
            <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Valor dos Materiais</p>
            <p class="text-2xl font-bold text-attention dark:text-attention"><?= formatMoney($sistema->valor_materiais_orcado) ?></p>
        </div>
    </div>
    
    <?php if (!empty($sistema->observacoes_orcamento)): ?>
    <div class="mt-6">
        <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary mb-2">Observações do Orçamento</p>
        <div class="bg-bg-light dark:bg-medium rounded-lg p-4">
            <p class="text-text-light-primary dark:text-text-dark-primary"><?= nl2br(h($sistema->observacoes_orcamento)) ?></p>
        </div>
    </div>
    <?php endif; ?>
</div>

<?php endif; ?>

<?php if ($isInstalacao): ?>
<!-- Layout com Cards 1 e 2 (3/4) + Miniatura Orçamento (1/4) -->
<div class="flex flex-col lg:flex-row gap-6 mb-6">
    <!-- Cards 1 e 2 (3/4 da largura) -->
    <div class="lg:w-3/4 space-y-6">
        <!-- Card 1: Dados do Cliente -->
        <div class="bg-surface-light dark:bg-surface-dark rounded-lg shadow-lg border border-border-light dark:border-border-dark p-6">
            <h2 class="text-xl font-bold text-highlight dark:text-highlight mb-4 border-b border-border-light dark:border-border-dark pb-2">👤 Dados do Cliente</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Nome Completo</p>
                    <p class="text-lg font-medium text-text-light-primary dark:text-text-dark-primary"><?= h($sistema->nome) ?></p>
                </div>
                <?php if (!empty($sistema->email)): ?>
                <div>
                    <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">E-mail</p>
                    <p class="text-lg font-medium text-text-light-primary dark:text-text-dark-primary"><?= h($sistema->email) ?></p>
                </div>
                <?php endif; ?>
                <?php if (!empty($sistema->telefone)): ?>
                <div>
                    <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Telefone</p>
                    <p class="text-lg font-medium text-text-light-primary dark:text-text-dark-primary"><?= h($sistema->telefone) ?></p>
                </div>
                <?php endif; ?>
                <?php if (!empty($sistema->endereco)): ?>
                <div>
                    <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Endereço</p>
                    <p class="text-lg font-medium text-text-light-primary dark:text-text-dark-primary"><?= h($sistema->endereco) ?></p>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Cards 2: Métricas do Sistema (3 cards em fila) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Potência do Sistema -->
            <div class="bg-surface-light dark:bg-surface-dark rounded-lg shadow-lg border border-border-light dark:border-border-dark p-6 text-center">
                <div class="flex flex-col items-center">
                    <div class="w-16 h-16 bg-attention bg-opacity-20 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-bolt text-3xl text-attention"></i>
                    </div>
                    <h3 class="text-sm font-medium text-text-light-secondary dark:text-text-dark-secondary mb-2">Potência do Sistema</h3>
                    <p class="text-2xl font-bold text-text-light-primary dark:text-text-dark-primary"><?= number_format($sistema->potencia_sistema, 2, ',', '.') ?> kWp</p>
                </div>
            </div>

            <!-- Consumo do Sistema -->
            <div class="bg-surface-light dark:bg-surface-dark rounded-lg shadow-lg border border-border-light dark:border-border-dark p-6 text-center">
                <div class="flex flex-col items-center">
                    <div class="w-16 h-16 bg-highlight bg-opacity-20 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-chart-line text-3xl text-highlight"></i>
                    </div>
                    <h3 class="text-sm font-medium text-text-light-secondary dark:text-text-dark-secondary mb-2">Consumo Mensal</h3>
                    <p class="text-2xl font-bold text-text-light-primary dark:text-text-dark-primary"><?= number_format($sistema->consumo_sistema, 2, ',', '.') ?> kWh</p>
                </div>
            </div>

            <!-- Área do Sistema -->
            <div class="bg-surface-light dark:bg-surface-dark rounded-lg shadow-lg border border-border-light dark:border-border-dark p-6 text-center">
                <div class="flex flex-col items-center">
                    <div class="w-16 h-16 bg-attention-dark bg-opacity-20 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-ruler-combined text-3xl text-attention-dark"></i>
                    </div>
                    <h3 class="text-sm font-medium text-text-light-secondary dark:text-text-dark-secondary mb-2">Área Disponível</h3>
                    <p class="text-2xl font-bold text-text-light-primary dark:text-text-dark-primary"><?= number_format($sistema->area_sistema, 2, ',', '.') ?> m²</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Miniatura do Orçamento (1/4 da largura) -->
    <div class="lg:w-1/4 bg-surface-light dark:bg-surface-dark rounded-lg shadow-lg border border-border-light dark:border-border-dark overflow-hidden">
        <?php if (!empty($sistema->orcamento_path)): ?>
            <div class="h-full flex flex-col">
                <div class="p-3 border-b border-border-light dark:border-border-dark">
                    <h3 class="text-sm font-bold text-text-light-primary dark:text-text-dark-primary text-center">📄 Orçamento</h3>
                </div>
                <div class="flex-1 relative bg-bg-light dark:bg-medium cursor-pointer" onclick="visualizarOrcamento()">
                    <canvas id="pdf-thumbnail" class="w-full h-full min-h-[300px] object-contain rounded"></canvas>
                    <div id="pdf-loading" class="absolute inset-0 flex items-center justify-center bg-base-white dark:bg-medium-dark border border-border-light dark:border-border-dark rounded">
                        <div class="text-center p-4">
                            <i class="fas fa-spinner fa-spin text-4xl text-attention mb-4"></i>
                            <p class="text-sm font-medium text-text-light-primary dark:text-text-dark-primary">Carregando...</p>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="h-full flex items-center justify-center p-6">
                <div class="text-center">
                    <i class="fas fa-file-pdf text-4xl text-text-light-secondary dark:text-text-dark-secondary mb-3"></i>
                    <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Nenhum orçamento disponível</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Card 3: Dados de Instalação com Desenho da Placa -->
<div class="bg-surface-light dark:bg-surface-dark rounded-lg shadow-lg border border-border-light dark:border-border-dark p-6 mb-6">
    <h2 class="text-xl font-bold text-highlight dark:text-highlight mb-6 border-b border-border-light dark:border-border-dark pb-2">🔧 Dados de Instalação</h2>
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Dados Técnicos -->
        <div class="lg:w-2/3 space-y-4">
            <?php if (!empty($sistema->marca)): ?>
            <div>
                <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Marca dos Equipamentos</p>
                <p class="text-lg font-medium text-text-light-primary dark:text-text-dark-primary"><?= h($sistema->marca) ?></p>
            </div>
            <?php endif; ?>
            
            <?php if (!empty($sistema->tipo_estrutura)): ?>
            <div>
                <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Tipo de Estrutura</p>
                <p class="text-lg font-medium text-text-light-primary dark:text-text-dark-primary"><?= h($sistema->tipo_estrutura) ?></p>
            </div>
            <?php endif; ?>
            
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Quantidade de Módulos</p>
                    <p class="text-lg font-medium text-text-light-primary dark:text-text-dark-primary"><?= h($sistema->qnt_modulos) ?> unidades</p>
                </div>
                
                <?php if (!empty($sistema->potencia_modulos)): ?>
                <div>
                    <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Potência dos Módulos</p>
                    <p class="text-lg font-medium text-text-light-primary dark:text-text-dark-primary"><?= h($sistema->potencia_modulos) ?>W</p>
                </div>
                <?php endif; ?>
            </div>
            
            <div>
                <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Usa Microinversor?</p>
                <p class="text-lg font-medium text-text-light-primary dark:text-text-dark-primary"><?= $sistema->is_micro ? 'Sim' : 'Não' ?></p>
            </div>
            
            <?php if ($sistema->is_micro && !empty($sistema->qnt_micro)): ?>
            <div>
                <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Quantidade de Microinversores</p>
                <p class="text-lg font-medium text-text-light-primary dark:text-text-dark-primary"><?= h($sistema->qnt_micro) ?> unidades</p>
            </div>
            <?php endif; ?>
        </div>
        
        <!-- Desenho da Placa Solar -->
        <div class="lg:w-1/3 flex items-center justify-center h-80">
            <style>
                .solar-grid {
                    background-color: #0f172a;
                    background-image: 
                        linear-gradient(#1e293b 1px, transparent 1px),
                        linear-gradient(90deg, #1e293b 1px, transparent 1px);
                    background-size: 20px 15px;
                    background-position: center center;
                }
            </style>
            
            <div class="relative w-60 h-80 border-4 border-gray-400 rounded-3xl solar-grid box-border">
                <!-- Label Esquerda Superior: Quantidade de Módulos -->
                <div class="absolute top-0 left-0 -translate-y-1/2 -translate-x-4 z-20">
                    <div class="bg-gray-200 text-black font-bold px-2 py-1 rounded border-2 border-gray-400 shadow-lg text-xs whitespace-nowrap">
                        <?= h($sistema->qnt_modulos) ?> módulos
                    </div>
                </div>

                <!-- Label Direita Superior: Tipo de Inversor -->
                <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-4 z-20">
                    <div class="bg-gray-200 text-black font-bold px-2 py-1 rounded border-2 border-gray-400 shadow-lg text-xs">
                        <?= $sistema->is_micro ? 'Micro-inversor' : 'Inversor' ?>
                    </div>
                </div>

                <!-- Linha horizontal central divisória -->
                <div class="absolute top-1/2 left-0 w-full h-1 bg-gray-400 -translate-y-1/2 z-10"></div>

                <!-- Label Central: Potência dos Módulos -->
                <?php if (!empty($sistema->potencia_modulos)): ?>
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-20">
                    <div class="bg-gray-200 text-black font-bold px-6 py-1 rounded-lg border-[3px] border-gray-400 shadow-lg text-lg tracking-wider">
                        <?= h($sistema->potencia_modulos) ?>W
                    </div>
                </div>
                <?php endif; ?>

                <!-- Label Inferior: Marca -->
                <?php if (!empty($sistema->marca)): ?>
                <div class="absolute bottom-0 left-1/2 -translate-x-1/2 translate-y-1/2 z-20">
                    <div class="bg-gray-200 text-black font-bold px-3 py-1 rounded border-2 border-gray-400 shadow-lg text-sm tracking-wide">
                        <?= h($sistema->marca) ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Card 4: Valores e Orçamento -->
<div class="bg-surface-light dark:bg-surface-dark rounded-lg shadow-lg border border-border-light dark:border-border-dark p-6">
    <h2 class="text-xl font-bold text-highlight dark:text-highlight mb-6 border-b border-border-light dark:border-border-dark pb-2">💰 Valores e Orçamento</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Valor Total Orçado</p>
            <p class="text-2xl font-bold text-highlight dark:text-highlight"><?= formatMoney($sistema->valor_orcado) ?></p>
        </div>
        
        <div>
            <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Valor dos Materiais</p>
            <p class="text-2xl font-bold text-attention dark:text-attention"><?= formatMoney($sistema->valor_materiais_orcado) ?></p>
        </div>
    </div>
    
    <?php if (!empty($sistema->observacoes_orcamento)): ?>
    <div class="mt-6">
        <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary mb-2">Observações do Orçamento</p>
        <div class="bg-bg-light dark:bg-medium rounded-lg p-4">
            <p class="text-text-light-primary dark:text-text-dark-primary"><?= nl2br(h($sistema->observacoes_orcamento)) ?></p>
        </div>
    </div>
    <?php endif; ?>
</div>

<!-- Modal Visualizar Orçamento -->
<div id="modal-visualizar" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4" onclick="fecharModalVisualizar()">
    <iframe id="pdf-viewer" src="" class="w-full h-full max-w-6xl max-h-[90vh] rounded-lg shadow-xl" frameborder="0" onclick="event.stopPropagation()"></iframe>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
<script>
// Configurar PDF.js
pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

// Renderizar thumbnail do PDF
function renderPdfThumbnail() {
    const orcamentoPath = '<?= !empty($sistema->orcamento_path) ? $this->Url->build('/' . $sistema->orcamento_path) : '' ?>';
    if (!orcamentoPath) return;
    
    const canvas = document.getElementById('pdf-thumbnail');
    const loadingDiv = document.getElementById('pdf-loading');
    if (!canvas || !loadingDiv) return;
    const ctx = canvas.getContext('2d');
    
    pdfjsLib.getDocument(orcamentoPath).promise.then(function(pdf) {
        // Pegar apenas a primeira página
        pdf.getPage(1).then(function(page) {
            const viewport = page.getViewport({scale: 0.5});
            canvas.height = viewport.height;
            canvas.width = viewport.width;
            
            const renderContext = {
                canvasContext: ctx,
                viewport: viewport
            };
            
            page.render(renderContext).promise.then(function() {
                loadingDiv.style.display = 'none';
            });
        });
    }).catch(function(error) {
        console.error('Erro ao carregar PDF:', error);
        loadingDiv.innerHTML = `
            <div class="text-center p-4">
                <i class="fas fa-file-pdf text-4xl text-text-light-secondary dark:text-text-dark-secondary mb-3"></i>
                <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Erro ao carregar PDF</p>
            </div>
        `;
    });
}

function visualizarOrcamento() {
    const orcamentoPath = '<?= !empty($sistema->orcamento_path) ? $this->Url->build('/' . $sistema->orcamento_path) : '' ?>';
    if (orcamentoPath) {
        document.getElementById('pdf-viewer').src = orcamentoPath;
        document.getElementById('modal-visualizar').classList.remove('hidden');
    } else {
        alert('Nenhum orçamento encontrado.');
    }
}

function fecharModalVisualizar() {
    document.getElementById('modal-visualizar').classList.add('hidden');
    document.getElementById('pdf-viewer').src = '';
}

// Carregar thumbnail quando a página carregar
document.addEventListener('DOMContentLoaded', function() {
    <?php if ($isInstalacao && !empty($sistema->orcamento_path)): ?>
    renderPdfThumbnail();
    <?php endif; ?>
    <?php if ($isConcluido && !empty($sistema->orcamento_path)): ?>
    renderPdfThumbnailConcluido();
    <?php endif; ?>
});
</script>

<?php endif; ?>

<?php if ($isConcluido): ?>
<!-- Layout com Cards 1 e 2 (3/4) + Miniatura Orçamento (1/4) -->
<div class="flex flex-col lg:flex-row gap-6 mb-6">
    <!-- Cards 1 e 2 (3/4 da largura) -->
    <div class="lg:w-3/4 space-y-6">
        <!-- Card 1: Dados do Cliente -->
        <div class="bg-surface-light dark:bg-surface-dark rounded-lg shadow-lg border border-border-light dark:border-border-dark p-6">
            <h2 class="text-xl font-bold text-highlight dark:text-highlight mb-4 border-b border-border-light dark:border-border-dark pb-2">👤 Dados do Cliente</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Nome Completo</p>
                    <p class="text-lg font-medium text-text-light-primary dark:text-text-dark-primary"><?= h($sistema->nome) ?></p>
                </div>
                <?php if (!empty($sistema->email)): ?>
                <div>
                    <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">E-mail</p>
                    <p class="text-lg font-medium text-text-light-primary dark:text-text-dark-primary"><?= h($sistema->email) ?></p>
                </div>
                <?php endif; ?>
                <?php if (!empty($sistema->telefone)): ?>
                <div>
                    <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Telefone</p>
                    <p class="text-lg font-medium text-text-light-primary dark:text-text-dark-primary"><?= h($sistema->telefone) ?></p>
                </div>
                <?php endif; ?>
                <?php if (!empty($sistema->endereco)): ?>
                <div>
                    <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Endereço</p>
                    <p class="text-lg font-medium text-text-light-primary dark:text-text-dark-primary"><?= h($sistema->endereco) ?></p>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Cards 2: Métricas do Sistema (3 cards em fila) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Potência do Sistema -->
            <div class="bg-surface-light dark:bg-surface-dark rounded-lg shadow-lg border border-border-light dark:border-border-dark p-6 text-center">
                <div class="flex flex-col items-center">
                    <div class="w-16 h-16 bg-attention bg-opacity-20 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-bolt text-3xl text-attention"></i>
                    </div>
                    <h3 class="text-sm font-medium text-text-light-secondary dark:text-text-dark-secondary mb-2">Potência do Sistema</h3>
                    <p class="text-2xl font-bold text-text-light-primary dark:text-text-dark-primary"><?= number_format($sistema->potencia_sistema, 2, ',', '.') ?> kWp</p>
                </div>
            </div>

            <!-- Consumo do Sistema -->
            <div class="bg-surface-light dark:bg-surface-dark rounded-lg shadow-lg border border-border-light dark:border-border-dark p-6 text-center">
                <div class="flex flex-col items-center">
                    <div class="w-16 h-16 bg-highlight bg-opacity-20 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-chart-line text-3xl text-highlight"></i>
                    </div>
                    <h3 class="text-sm font-medium text-text-light-secondary dark:text-text-dark-secondary mb-2">Consumo Mensal</h3>
                    <p class="text-2xl font-bold text-text-light-primary dark:text-text-dark-primary"><?= number_format($sistema->consumo_sistema, 2, ',', '.') ?> kWh</p>
                </div>
            </div>

            <!-- Área do Sistema -->
            <div class="bg-surface-light dark:bg-surface-dark rounded-lg shadow-lg border border-border-light dark:border-border-dark p-6 text-center">
                <div class="flex flex-col items-center">
                    <div class="w-16 h-16 bg-attention-dark bg-opacity-20 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-ruler-combined text-3xl text-attention-dark"></i>
                    </div>
                    <h3 class="text-sm font-medium text-text-light-secondary dark:text-text-dark-secondary mb-2">Área Disponível</h3>
                    <p class="text-2xl font-bold text-text-light-primary dark:text-text-dark-primary"><?= number_format($sistema->area_sistema, 2, ',', '.') ?> m²</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Miniatura do Orçamento (1/4 da largura) -->
    <div class="lg:w-1/4 bg-surface-light dark:bg-surface-dark rounded-lg shadow-lg border border-border-light dark:border-border-dark overflow-hidden">
        <?php if (!empty($sistema->orcamento_path)): ?>
            <div class="h-full flex flex-col">
                <div class="p-3 border-b border-border-light dark:border-border-dark">
                    <h3 class="text-sm font-bold text-text-light-primary dark:text-text-dark-primary text-center">📄 Orçamento</h3>
                </div>
                <div class="flex-1 relative bg-bg-light dark:bg-medium cursor-pointer" onclick="visualizarOrcamento()">
                    <canvas id="pdf-thumbnail-concluido" class="w-full h-full min-h-[300px] object-contain rounded"></canvas>
                    <div id="pdf-loading-concluido" class="absolute inset-0 flex items-center justify-center bg-base-white dark:bg-medium-dark border border-border-light dark:border-border-dark rounded">
                        <div class="text-center p-4">
                            <i class="fas fa-spinner fa-spin text-4xl text-attention mb-4"></i>
                            <p class="text-sm font-medium text-text-light-primary dark:text-text-dark-primary">Carregando...</p>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="h-full flex items-center justify-center p-6">
                <div class="text-center">
                    <i class="fas fa-file-pdf text-4xl text-text-light-secondary dark:text-text-dark-secondary mb-3"></i>
                    <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Nenhum orçamento disponível</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Card 3: Dados de Instalação com Desenho da Placa -->
<div class="bg-surface-light dark:bg-surface-dark rounded-lg shadow-lg border border-border-light dark:border-border-dark p-6 mb-6">
    <h2 class="text-xl font-bold text-highlight dark:text-highlight mb-6 border-b border-border-light dark:border-border-dark pb-2">🔧 Dados de Instalação</h2>
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Dados Técnicos -->
        <div class="lg:w-2/3 space-y-4">
            <?php if (!empty($sistema->marca)): ?>
            <div>
                <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Marca dos Equipamentos</p>
                <p class="text-lg font-medium text-text-light-primary dark:text-text-dark-primary"><?= h($sistema->marca) ?></p>
            </div>
            <?php endif; ?>
            
            <?php if (!empty($sistema->tipo_estrutura)): ?>
            <div>
                <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Tipo de Estrutura</p>
                <p class="text-lg font-medium text-text-light-primary dark:text-text-dark-primary"><?= h($sistema->tipo_estrutura) ?></p>
            </div>
            <?php endif; ?>
            
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Quantidade de Módulos</p>
                    <p class="text-lg font-medium text-text-light-primary dark:text-text-dark-primary"><?= h($sistema->qnt_modulos) ?> unidades</p>
                </div>
                
                <?php if (!empty($sistema->potencia_modulos)): ?>
                <div>
                    <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Potência dos Módulos</p>
                    <p class="text-lg font-medium text-text-light-primary dark:text-text-dark-primary"><?= h($sistema->potencia_modulos) ?>W</p>
                </div>
                <?php endif; ?>
            </div>
            
            <div>
                <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Usa Microinversor?</p>
                <p class="text-lg font-medium text-text-light-primary dark:text-text-dark-primary"><?= $sistema->is_micro ? 'Sim' : 'Não' ?></p>
            </div>
            
            <?php if ($sistema->is_micro && !empty($sistema->qnt_micro)): ?>
            <div>
                <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Quantidade de Microinversores</p>
                <p class="text-lg font-medium text-text-light-primary dark:text-text-dark-primary"><?= h($sistema->qnt_micro) ?> unidades</p>
            </div>
            <?php endif; ?>
        </div>
        
        <!-- Desenho da Placa Solar -->
        <div class="lg:w-1/3 flex items-center justify-center h-80">
            <style>
                .solar-grid {
                    background-color: #0f172a;
                    background-image: 
                        linear-gradient(#1e293b 1px, transparent 1px),
                        linear-gradient(90deg, #1e293b 1px, transparent 1px);
                    background-size: 20px 15px;
                    background-position: center center;
                }
            </style>
            
            <div class="relative w-60 h-80 border-4 border-gray-400 rounded-3xl solar-grid box-border">
                <!-- Label Esquerda Superior: Quantidade de Módulos -->
                <div class="absolute top-0 left-0 -translate-y-1/2 -translate-x-4 z-20">
                    <div class="bg-gray-200 text-black font-bold px-2 py-1 rounded border-2 border-gray-400 shadow-lg text-xs whitespace-nowrap">
                        <?= h($sistema->qnt_modulos) ?> módulos
                    </div>
                </div>

                <!-- Label Direita Superior: Tipo de Inversor -->
                <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-4 z-20">
                    <div class="bg-gray-200 text-black font-bold px-2 py-1 rounded border-2 border-gray-400 shadow-lg text-xs">
                        <?= $sistema->is_micro ? 'Micro-inversor' : 'Inversor' ?>
                    </div>
                </div>

                <!-- Linha horizontal central divisória -->
                <div class="absolute top-1/2 left-0 w-full h-1 bg-gray-400 -translate-y-1/2 z-10"></div>

                <!-- Label Central: Potência dos Módulos -->
                <?php if (!empty($sistema->potencia_modulos)): ?>
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-20">
                    <div class="bg-gray-200 text-black font-bold px-6 py-1 rounded-lg border-[3px] border-gray-400 shadow-lg text-lg tracking-wider">
                        <?= h($sistema->potencia_modulos) ?>W
                    </div>
                </div>
                <?php endif; ?>

                <!-- Label Inferior: Marca -->
                <?php if (!empty($sistema->marca)): ?>
                <div class="absolute bottom-0 left-1/2 -translate-x-1/2 translate-y-1/2 z-20">
                    <div class="bg-gray-200 text-black font-bold px-3 py-1 rounded border-2 border-gray-400 shadow-lg text-sm tracking-wide">
                        <?= h($sistema->marca) ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Card 4: Dados de Instalação Completos -->
<div class="bg-surface-light dark:bg-surface-dark rounded-lg shadow-lg border border-border-light dark:border-border-dark p-6 mb-6">
    <h2 class="text-xl font-bold text-highlight dark:text-highlight mb-6 border-b border-border-light dark:border-border-dark pb-2">📋 Dados da Instalação</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Data de Início</p>
            <p class="text-lg font-medium text-text-light-primary dark:text-text-dark-primary"><?= h($sistema->data_inicio) ?></p>
        </div>
        
        <div>
            <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Data de Término</p>
            <p class="text-lg font-medium text-text-light-primary dark:text-text-dark-primary"><?= h($sistema->data_termino) ?></p>
        </div>
        
        <div>
            <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Quantidade de Funcionários</p>
            <p class="text-lg font-medium text-text-light-primary dark:text-text-dark-primary"><?= h($sistema->qnt_funcionarios) ?></p>
        </div>
        
        <div>
            <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Quantidade de Carros</p>
            <p class="text-lg font-medium text-text-light-primary dark:text-text-dark-primary"><?= h($sistema->qnt_carros) ?></p>
        </div>
    </div>
    
        
        <div>
            <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Custo Alimentação</p>
            <p class="text-lg font-medium text-text-light-primary dark:text-text-dark-primary"><?= formatMoney($sistema->custo_alimentacao) ?></p>
        </div>
        
        <div>
            <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Custo Transporte</p>
            <p class="text-lg font-medium text-text-light-primary dark:text-text-dark-primary"><?= formatMoney($sistema->custo_transporte) ?></p>
        </div>
        
        <div>
            <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Valor Materiais Final</p>
            <p class="text-lg font-medium text-text-light-primary dark:text-text-dark-primary"><?= formatMoney($sistema->valor_materais_final) ?></p>
        </div>
</div>

<!-- Card 5: Dados de Homologação -->
<div class="bg-surface-light dark:bg-surface-dark rounded-lg shadow-lg border border-border-light dark:border-border-dark p-6 mb-6">
    <h2 class="text-xl font-bold text-highlight dark:text-highlight mb-6 border-b border-border-light dark:border-border-dark pb-2">✅ Dados de Homologação</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Status Ativo</p>
            <p class="text-lg font-medium text-text-light-primary dark:text-text-dark-primary"><?= $sistema->is_active ? 'Sim' : 'Não' ?></p>
        </div>
        
        <div>
            <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Data de Criação</p>
            <p class="text-lg font-medium text-text-light-primary dark:text-text-dark-primary"><?= h($sistema->created) ?></p>
        </div>
    </div>
</div>

<!-- Card 6: Valores Finais -->
<div class="bg-surface-light dark:bg-surface-dark rounded-lg shadow-lg border border-border-light dark:border-border-dark p-6">
    <h2 class="text-xl font-bold text-highlight dark:text-highlight mb-6 border-b border-border-light dark:border-border-dark pb-2">💰 Valores Finais</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div>
            <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Valor Total Orçado</p>
            <p class="text-2xl font-bold text-attention dark:text-attention"><?= formatMoney($sistema->valor_orcado) ?></p>
        </div>
        
        <div>
            <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Valor Materiais Final</p>
            <p class="text-2xl font-bold text-highlight dark:text-highlight"><?= formatMoney($sistema->valor_materais_final) ?></p>
        </div>
        
        <div>
            <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Total de Custos</p>
            <p class="text-2xl font-bold text-text-light-primary dark:text-text-dark-primary"><?= formatMoney($sistema->valor_materais_final + $sistema->custo_alimentacao + $sistema->custo_transporte) ?></p>
        </div>
    </div>
    

</div>

<script>
// Renderizar thumbnail do PDF para status concluído
function renderPdfThumbnailConcluido() {
    const orcamentoPath = '<?= !empty($sistema->orcamento_path) ? $this->Url->build('/' . $sistema->orcamento_path) : '' ?>';
    if (!orcamentoPath) return;
    
    const canvas = document.getElementById('pdf-thumbnail-concluido');
    const loadingDiv = document.getElementById('pdf-loading-concluido');
    if (!canvas || !loadingDiv) return;
    const ctx = canvas.getContext('2d');
    
    pdfjsLib.getDocument(orcamentoPath).promise.then(function(pdf) {
        pdf.getPage(1).then(function(page) {
            const viewport = page.getViewport({scale: 0.5});
            canvas.height = viewport.height;
            canvas.width = viewport.width;
            
            const renderContext = {
                canvasContext: ctx,
                viewport: viewport
            };
            
            page.render(renderContext).promise.then(function() {
                loadingDiv.style.display = 'none';
            });
        });
    }).catch(function(error) {
        console.error('Erro ao carregar PDF:', error);
        loadingDiv.innerHTML = `
            <div class="text-center p-4">
                <i class="fas fa-file-pdf text-4xl text-text-light-secondary dark:text-text-dark-secondary mb-3"></i>
                <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary">Erro ao carregar PDF</p>
            </div>
        `;
    });
}

// Carregar thumbnail quando a página carregar
document.addEventListener('DOMContentLoaded', function() {
    <?php if ($isConcluido && !empty($sistema->orcamento_path)): ?>
    renderPdfThumbnailConcluido();
    <?php endif; ?>
});
</script>

<?php endif; ?>