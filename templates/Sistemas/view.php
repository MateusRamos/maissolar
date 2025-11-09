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
        <div class="lg:w-1/3 flex items-center justify-center">
            <div class="relative">
                <svg width="250" height="300" viewBox="0 0 250 300" class="rounded-lg" style="border: 3px solid #C0C0C0; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
                    <!-- Fundo da placa (azul escuro solar) -->
                    <rect x="8" y="8" width="234" height="300" fill="#1e3a8a" rx="6"/>
                    
                    <!-- Grid da placa solar -->
                    <g stroke="#3b82f6" stroke-width="0.8" opacity="0.7">
                        <!-- Linhas verticais -->
                        <line x1="50" y1="8" x2="50" y2="172"/>
                        <line x1="83" y1="8" x2="83" y2="172"/>
                        <line x1="116" y1="8" x2="116" y2="172"/>
                        <line x1="149" y1="8" x2="149" y2="172"/>
                        <line x1="182" y1="8" x2="182" y2="172"/>
                        <line x1="215" y1="8" x2="215" y2="172"/>
                        
                        <!-- Linhas horizontais -->
                        <line x1="8" y1="35" x2="242" y2="35"/>
                        <line x1="8" y1="62" x2="242" y2="62"/>
                        <line x1="8" y1="89" x2="242" y2="89"/>
                        <line x1="8" y1="116" x2="242" y2="116"/>
                        <line x1="8" y1="143" x2="242" y2="143"/>
                    </g>
                    
                    <!-- Quantidade de módulos (canto superior esquerdo) -->
                    <rect x="15" y="15" width="35" height="18" fill="rgba(255,255,255,0.9)" rx="3" stroke="#C0C0C0" stroke-width="1"/>
                    <text x="32" y="27" fill="#1e3a8a" class="font-bold text-xs" text-anchor="middle">
                        x<?= h($sistema->qnt_modulos) ?>
                    </text>
                    
                    <!-- Marca (canto superior direito) -->
                    <?php if (!empty($sistema->marca)): ?>
                    <rect x="190" y="15" width="45" height="18" fill="rgba(255,255,255,0.9)" rx="3" stroke="#C0C0C0" stroke-width="1"/>
                    <text x="212" y="27" fill="#1e3a8a" class="font-bold text-xs" text-anchor="middle">
                        <?= h(substr($sistema->marca, 0, 8)) ?>
                    </text>
                    <?php endif; ?>
                    
                    <!-- Potência dos módulos (centro) -->
                    <?php if (!empty($sistema->potencia_modulos)): ?>
                    <rect x="100" y="75" width="50" height="30" fill="rgba(255,255,255,0.95)" rx="4" stroke="#C0C0C0" stroke-width="1.5"/>
                    <text x="125" y="95" fill="#1e3a8a" class="font-bold text-xl" text-anchor="middle">
                        <?= h($sistema->potencia_modulos) ?>W
                    </text>
                    <?php endif; ?>
                    
                    <!-- Tipo de estrutura (canto inferior centro) -->
                    <?php if (!empty($sistema->tipo_estrutura)): ?>
                    <rect x="85" y="150" width="80" height="18" fill="rgba(255,255,255,0.9)" rx="3" stroke="#C0C0C0" stroke-width="1"/>
                    <text x="125" y="162" fill="#1e3a8a" class="font-bold text-xs" text-anchor="middle">
                        <?= h($sistema->tipo_estrutura) ?>
                    </text>
                    <?php endif; ?>
                </svg>
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
        <div class="lg:w-1/3 flex items-center justify-center">
            <div class="relative">
                <svg width="250" height="180" viewBox="0 0 250 180" class="rounded-lg" style="border: 3px solid #C0C0C0; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
                    <!-- Fundo da placa (azul escuro solar) -->
                    <rect x="8" y="8" width="234" height="164" fill="#1e3a8a" rx="6"/>
                    
                    <!-- Grid da placa solar -->
                    <g stroke="#3b82f6" stroke-width="0.8" opacity="0.7">
                        <!-- Linhas verticais -->
                        <line x1="50" y1="8" x2="50" y2="172"/>
                        <line x1="83" y1="8" x2="83" y2="172"/>
                        <line x1="116" y1="8" x2="116" y2="172"/>
                        <line x1="149" y1="8" x2="149" y2="172"/>
                        <line x1="182" y1="8" x2="182" y2="172"/>
                        <line x1="215" y1="8" x2="215" y2="172"/>
                        
                        <!-- Linhas horizontais -->
                        <line x1="8" y1="35" x2="242" y2="35"/>
                        <line x1="8" y1="62" x2="242" y2="62"/>
                        <line x1="8" y1="89" x2="242" y2="89"/>
                        <line x1="8" y1="116" x2="242" y2="116"/>
                        <line x1="8" y1="143" x2="242" y2="143"/>
                    </g>
                    
                    <!-- Quantidade de módulos (canto superior esquerdo) -->
                    <rect x="15" y="15" width="35" height="18" fill="rgba(255,255,255,0.9)" rx="3" stroke="#C0C0C0" stroke-width="1"/>
                    <text x="32" y="27" fill="#1e3a8a" class="font-bold text-xs" text-anchor="middle">
                        x<?= h($sistema->qnt_modulos) ?>
                    </text>
                    
                    <!-- Marca (canto superior direito) -->
                    <?php if (!empty($sistema->marca)): ?>
                    <rect x="190" y="15" width="45" height="18" fill="rgba(255,255,255,0.9)" rx="3" stroke="#C0C0C0" stroke-width="1"/>
                    <text x="212" y="27" fill="#1e3a8a" class="font-bold text-xs" text-anchor="middle">
                        <?= h(substr($sistema->marca, 0, 8)) ?>
                    </text>
                    <?php endif; ?>
                    
                    <!-- Potência dos módulos (centro) -->
                    <?php if (!empty($sistema->potencia_modulos)): ?>
                    <rect x="100" y="75" width="50" height="30" fill="rgba(255,255,255,0.95)" rx="4" stroke="#C0C0C0" stroke-width="1.5"/>
                    <text x="125" y="95" fill="#1e3a8a" class="font-bold text-xl" text-anchor="middle">
                        <?= h($sistema->potencia_modulos) ?>W
                    </text>
                    <?php endif; ?>
                    
                    <!-- Tipo de estrutura (canto inferior centro) -->
                    <?php if (!empty($sistema->tipo_estrutura)): ?>
                    <rect x="85" y="150" width="80" height="18" fill="rgba(255,255,255,0.9)" rx="3" stroke="#C0C0C0" stroke-width="1"/>
                    <text x="125" y="162" fill="#1e3a8a" class="font-bold text-xs" text-anchor="middle">
                        <?= h($sistema->tipo_estrutura) ?>
                    </text>
                    <?php endif; ?>
                </svg>
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
        toastr.warning('Nenhum orçamento encontrado.');
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
});
</script>

<?php endif; ?>