<?php
$this->layout = 'main';
$this->assign('title', 'Orçamentos - MaisSolar');
?>

<!-- Breadcrumb -->
<nav class="flex mb-6" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3">
        <li class="inline-flex items-center">
            <?= $this->Html->link('Dashboard', '/', [
                'class' => 'inline-flex items-center text-sm font-medium text-text-light-secondary dark:text-text-dark-secondary hover:text-highlight'
            ]) ?>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
                <i class="fas fa-chevron-right text-text-light-secondary dark:text-text-dark-secondary mx-2"></i>
                <span class="text-sm font-medium text-text-light-primary dark:text-text-dark-primary">Orçamentos</span>
            </div>
        </li>
    </ol>
</nav>

<!-- Header -->
<div class="flex justify-between items-center mb-8">
    <h1 class="text-4xl font-bold text-text-light-primary dark:text-text-dark-primary">📄 Orçamentos</h1>
    <?= $this->Html->link('Criar Orçamento', ['action' => 'add'], [
        'class' => 'px-6 py-3 bg-highlight hover:bg-highlight-dark text-base-white rounded-lg transition-colors font-medium inline-flex items-center'
    ]) ?>
</div>

<!-- Filtros -->
<div class="bg-surface-light dark:bg-surface-dark rounded-lg shadow-lg border border-border-light dark:border-border-dark p-6 mb-6">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
            <input type="text" placeholder="Buscar por nome..." class="w-full px-4 py-2 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary" autocomplete="off">
        </div>
        <div>
            <input type="text" placeholder="Buscar por cliente..." class="w-full px-4 py-2 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary" autocomplete="off">
        </div>
        <div>
            <button class="w-full px-4 py-2 bg-highlight hover:bg-highlight-dark text-base-white rounded-lg transition-colors">
                <i class="fas fa-search mr-2"></i>Filtrar
            </button>
        </div>
    </div>
</div>

<!-- Tabela -->
<div class="bg-surface-light dark:bg-surface-dark rounded-lg shadow-lg border border-border-light dark:border-border-dark overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-medium dark:bg-medium-dark">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-base-white uppercase tracking-wider">
                        <?= $this->Paginator->sort('nome', 'Nome') ?>
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-base-white uppercase tracking-wider">
                        <?= $this->Paginator->sort('cliente', 'Cliente') ?>
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-base-white uppercase tracking-wider">
                        <?= $this->Paginator->sort('created', 'Data de Criação') ?>
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-base-white uppercase tracking-wider">
                        Ações
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-border-light dark:divide-border-dark">
                <?php foreach ($orcamentos as $orcamento): ?>
                    <tr class="hover:bg-bg-light dark:hover:bg-medium-light transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-text-light-primary dark:text-text-dark-primary">
                                <?= h($orcamento->nome) ?>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-text-light-primary dark:text-text-dark-primary">
                                <?= h($orcamento->cliente) ?>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-text-light-secondary dark:text-text-dark-secondary">
                            <?= $orcamento->created->format('d/m/Y') ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-md">
                            <div class="flex space-x-3">
                                <?= $this->Html->link('', ['action' => 'view', $orcamento->id], [
                                    'class' => 'fas fa-eye text-highlight hover:text-highlight-dark transition-colors',
                                    'title' => 'Detalhes'
                                ]) ?>
                                <?= $this->Html->link('', ['action' => 'edit', $orcamento->id], [
                                    'class' => 'fas fa-edit text-attention hover:text-attention-dark transition-colors',
                                    'title' => 'Editar'
                                ]) ?>
                                <?= $this->Form->postLink('', ['action' => 'delete', $orcamento->id], [
                                    'class' => 'fas fa-trash text-red-500 hover:text-red-700 transition-colors',
                                    'title' => 'Excluir',
                                    'confirm' => 'Tem certeza que deseja excluir este orçamento?'
                                ]) ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Paginação -->
<div class="flex items-center justify-between mt-6">
    <div class="text-sm text-text-light-secondary dark:text-text-dark-secondary">
        <?= $this->Paginator->counter('Mostrando {{current}} de {{count}} orçamentos') ?>
    </div>
    <div class="flex space-x-2">
        <?php if ($this->Paginator->hasPrev()): ?>
            <?= $this->Paginator->prev('« Anterior', [
                'class' => 'px-3 py-2 text-sm border border-border-light dark:border-border-dark text-text-light-secondary dark:text-text-dark-secondary rounded-lg hover:bg-bg-light dark:hover:bg-medium-light transition-colors'
            ]) ?>
        <?php else: ?>
            <span class="px-3 py-2 text-sm border border-border-light dark:border-border-dark text-text-light-secondary dark:text-text-dark-secondary rounded-lg opacity-50 cursor-not-allowed">« Anterior</span>
        <?php endif; ?>
        
        <?= $this->Paginator->numbers([
            'class' => 'px-3 py-2 text-sm border border-border-light dark:border-border-dark text-text-light-primary dark:text-text-dark-primary rounded-lg hover:bg-highlight hover:text-base-white transition-colors',
            'currentClass' => 'px-3 py-2 text-sm bg-highlight text-base-white rounded-lg'
        ]) ?>
        
        <?php if ($this->Paginator->hasNext()): ?>
            <?= $this->Paginator->next('Próximo »', [
                'class' => 'px-3 py-2 text-sm border border-border-light dark:border-border-dark text-text-light-secondary dark:text-text-dark-secondary rounded-lg hover:bg-bg-light dark:hover:bg-medium-light transition-colors'
            ]) ?>
        <?php else: ?>
            <span class="px-3 py-2 text-sm border border-border-light dark:border-border-dark text-text-light-secondary dark:text-text-dark-secondary rounded-lg opacity-50 cursor-not-allowed">Próximo »</span>
        <?php endif; ?>
    </div>
</div>