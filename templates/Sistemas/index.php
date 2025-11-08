<?php
$this->layout = 'main';
$this->assign('title', 'Sistemas - MaisSolar');

// Função para definir status baseado no status
function getStatusInfo($status) {
    switch($status) {
        case 1:
            return ['label' => 'Orçamento', 'class' => 'bg-attention text-base-black'];
        case 2:
            return ['label' => 'Em Instalação', 'class' => 'bg-attention-dark text-base-white'];
        case 3:
            return ['label' => 'Concluído', 'class' => 'bg-highlight-dark text-base-white'];
        default:
            return ['label' => 'Cancelado', 'class' => 'bg-medium-light text-text-light-secondary'];
    }
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
        <li aria-current="page">
            <div class="flex items-center">
                <i class="fas fa-chevron-right text-text-light-secondary dark:text-text-dark-secondary mx-2"></i>
                <span class="text-sm font-medium text-text-light-primary dark:text-text-dark-primary">Sistemas</span>
            </div>
        </li>
    </ol>
</nav>

<!-- Header -->
<div class="flex justify-between items-center mb-8">
    <h1 class="text-4xl font-bold text-text-light-primary dark:text-text-dark-primary">⚡ Sistemas Solares</h1>
    <?= $this->Html->link('Criar Orçamento', ['action' => 'criarOrcamento'], [
        'class' => 'px-6 py-3 bg-highlight hover:bg-highlight-dark text-base-white rounded-lg transition-colors font-medium inline-flex items-center'
    ]) ?>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-surface-light dark:bg-surface-dark rounded-lg shadow-lg border border-border-light dark:border-border-dark p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-attention bg-opacity-20">
                <i class="fas fa-file-invoice text-attention text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-text-light-secondary dark:text-text-dark-secondary">Orçamentos</p>
                <p class="text-2xl font-bold text-text-light-primary dark:text-text-dark-primary">
                    <?= count(array_filter($sistemas->toArray(), fn($s) => $s->status == 1)) ?>
                </p>
            </div>
        </div>
    </div>
    
    <div class="bg-surface-light dark:bg-surface-dark rounded-lg shadow-lg border border-border-light dark:border-border-dark p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-attention bg-opacity-20">
                <i class="fas fa-hammer text-attention text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-text-light-secondary dark:text-text-dark-secondary">Em Instalação</p>
                <p class="text-2xl font-bold text-text-light-primary dark:text-text-dark-primary">
                    <?= count(array_filter($sistemas->toArray(), fn($s) => $s->status == 2)) ?>
                </p>
            </div>
        </div>
    </div>
    
    <div class="bg-surface-light dark:bg-surface-dark rounded-lg shadow-lg border border-border-light dark:border-border-dark p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-highlight-dark bg-opacity-20">
                <i class="fas fa-trophy text-highlight-dark text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-text-light-secondary dark:text-text-dark-secondary">Concluídos</p>
                <p class="text-2xl font-bold text-text-light-primary dark:text-text-dark-primary">
                    <?= count(array_filter($sistemas->toArray(), fn($s) => $s->status == 3)) ?>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Filtros -->
<div class="bg-surface-light dark:bg-surface-dark rounded-lg shadow-lg border border-border-light dark:border-border-dark p-6 mb-6">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div>
            <input type="text" placeholder="Buscar por cliente..." class="w-full px-4 py-2 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary" autocomplete="off">
        </div>
        <div>
            <select class="w-full px-4 py-2 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary">
                <option value="">Todos os Status</option>
                <option value="1">Orçamento</option>
                <option value="2">Em Instalação</option>
                <option value="3">Concluído</option>
            </select>
        </div>
        <div>
            <input type="text" placeholder="Cidade..." class="w-full px-4 py-2 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary" autocomplete="off">
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
                    <th class="px-3 py-3 text-left text-xs font-medium text-base-white uppercase tracking-wider w-32">
                        Avançar
                    </th>
                    <th class="px-3 py-3 text-left text-xs font-medium text-base-white uppercase tracking-wider w-48">
                        <?= $this->Paginator->sort('nome', 'Cliente') ?>
                    </th>
                    <th class="px-3 py-3 text-left text-xs font-medium text-base-white uppercase tracking-wider w-32">
                        Status
                    </th>
                    <th class="px-3 py-3 text-left text-xs font-medium text-base-white uppercase tracking-wider w-24">
                        <?= $this->Paginator->sort('potencia_sistema', 'Potência') ?>
                    </th>
                    <th class="px-3 py-3 text-left text-xs font-medium text-base-white uppercase tracking-wider w-40">
                        Endereço
                    </th>
                    <th class="px-3 py-3 text-left text-xs font-medium text-base-white uppercase tracking-wider w-24">
                        <?= $this->Paginator->sort('valor_orcado', 'Valor') ?>
                    </th>
                    <th class="px-3 py-3 text-left text-xs font-medium text-base-white uppercase tracking-wider w-24">
                        <?= $this->Paginator->sort('created', 'Data') ?>
                    </th>
                    <th class="px-3 py-3 text-left text-xs font-medium text-base-white uppercase tracking-wider w-20">
                        Ações
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-border-light dark:divide-border-dark">
                <?php foreach ($sistemas as $sistema): ?>
                    <?php $statusInfo = getStatusInfo($sistema->status); ?>
                    <tr class="hover:bg-bg-light dark:hover:bg-medium-light transition-colors">
                        <td class="px-3 py-3 whitespace-nowrap">
                            <?php 
                            switch($sistema->status) {
                                case 1: // Orçamento
                                    echo '<button onclick="openStatusModal(' . $sistema->id . ', ' . $sistema->status . ')" class="px-3 py-2 bg-highlight hover:bg-highlight-dark text-base-white rounded-lg transition-colors text-sm">';
                                    echo '<i class="fas fa-check mr-1"></i>Aprovar';
                                    echo '</button>';
                                    break;
                                case 2: // Em Instalação
                                    echo '<a href="/sistemas/concluir-instalacao/' . $sistema->id . '" class="px-3 py-2 bg-highlight hover:bg-highlight-dark text-base-white rounded-lg transition-colors text-sm inline-flex items-center">';
                                    echo '<i class="fas fa-flag-checkered mr-1"></i>Concluir';
                                    echo '</a>';
                                    break;
                                case 3: // Concluído
                                    echo '<span class="px-3 py-2 bg-medium text-base-white rounded-lg text-sm opacity-50 cursor-not-allowed">';
                                    echo '<i class="fas fa-check-circle mr-1"></i>Concluído';
                                    echo '</span>';
                                    break;
                                default: // Cancelado ou outros
                                    echo '<span class="px-3 py-2 bg-medium-light text-text-light-secondary rounded-lg text-sm opacity-50 cursor-not-allowed">';
                                    echo '<i class="fas fa-times-circle mr-1"></i>Cancelado';
                                    echo '</span>';
                                    break;
                            }
                            ?>
                        </td>
                        <td class="px-3 py-3">
                            <div class="text-sm font-medium text-text-light-primary dark:text-text-dark-primary">
                                <?= h($sistema->nome) ?>
                            </div>
                            <div class="text-xs text-text-light-secondary dark:text-text-dark-secondary truncate">
                                <?= h($sistema->email) ?>
                            </div>
                        </td>
                        <td class="px-3 py-3 whitespace-nowrap">
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full <?= $statusInfo['class'] ?>">
                                <?= $statusInfo['label'] ?>
                            </span>
                        </td>
                        <td class="px-3 py-3 whitespace-nowrap text-xs text-text-light-primary dark:text-text-dark-primary">
                            <div class="flex items-center">
                                <i class="fas fa-bolt text-attention mr-1 text-xs"></i>
                                <?= $this->Number->format($sistema->potencia_sistema, ['precision' => 1]) ?>k
                            </div>
                        </td>
                        <td class="px-3 py-3 text-xs text-text-light-secondary dark:text-text-dark-secondary">
                            <div class="truncate max-w-32">
                                <?= h($sistema->endereco) ?>
                            </div>
                        </td>
                        <td class="px-3 py-3 whitespace-nowrap text-xs font-medium text-highlight">
                            R$ <?= $this->Number->format($sistema->valor_orcado/1000, ['precision' => 0]) ?>k
                        </td>
                        <td class="px-3 py-3 whitespace-nowrap text-xs text-text-light-secondary dark:text-text-dark-secondary">
                            <?= $sistema->created->format('d/m/y') ?>
                        </td>
                        <td class="px-3 py-3 whitespace-nowrap text-md">
                            <div class="flex space-x-1 gap-2">
                                <?= $this->Html->link('', ['action' => 'view', $sistema->id], [
                                    'class' => 'fas fa-eye text-highlight hover:text-highlight-dark transition-colors',
                                    'title' => 'Visualizar'
                                ]) ?>
                                <?= $this->Html->link('', ['action' => 'edit', $sistema->id], [
                                    'class' => 'fas fa-edit text-attention hover:text-attention-dark transition-colors',
                                    'title' => 'Editar'
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
        <?= $this->Paginator->counter('Mostrando {{current}} de {{count}} sistemas') ?>
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

<!-- Modal Avançar Status -->
<div id="statusModal" class="fixed inset-0 bg-base-black bg-opacity-50 hidden z-50">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-surface-light dark:bg-surface-dark rounded-lg shadow-xl max-w-md w-full">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 id="modalTitle" class="text-lg font-semibold text-text-light-primary dark:text-text-dark-primary"></h3>
                    <button onclick="closeStatusModal()" class="text-text-light-secondary dark:text-text-dark-secondary hover:text-text-light-primary dark:hover:text-text-dark-primary">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                
                <form id="statusForm" enctype="multipart/form-data">
                    <input type="hidden" id="sistemaId" name="sistema_id">
                    <input type="hidden" id="novoStatus" name="novo_status">
                    <?= $this->Form->hidden('_csrfToken', ['value' => $this->request->getAttribute('csrfToken')]) ?>
                    
                    <div id="formFields" class="space-y-4">
                        <!-- Campos serão inseridos dinamicamente -->
                    </div>
                    
                    <div class="flex justify-end space-x-3 mt-6">
                        <button type="button" onclick="closeStatusModal()" class="px-4 py-2 border border-border-light dark:border-border-dark text-text-light-secondary dark:text-text-dark-secondary rounded-lg hover:bg-bg-light dark:hover:bg-medium-light transition-colors">
                            Cancelar
                        </button>
                        <button type="submit" class="px-4 py-2 bg-highlight hover:bg-highlight-dark text-base-white rounded-lg transition-colors" id="submitBtn">
                            Confirmar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function openStatusModal(sistemaId, statusAtual) {
    // Se for status 2 (Em Instalação), redireciona para página de conclusão
    if (statusAtual == 2) {
        window.location.href = '/sistemas/concluir-instalacao/' + sistemaId;
        return;
    }
    
    document.getElementById('sistemaId').value = sistemaId;
    
    let novoStatus = statusAtual + 1;
    document.getElementById('novoStatus').value = novoStatus;
    
    let modalTitle = '';
    let formFields = '';
    
    if (statusAtual == 1) {
        // Orçamento -> Em Instalação
        novoStatus = 2;
        modalTitle = 'Concluir Aprovação';
        formFields = `
            <div>
                <label class="block text-sm font-medium text-text-light-primary dark:text-text-dark-primary mb-3">Arquivo do Orçamento *</label>
                <div class="relative">
                    <input type="file" name="orcamento_file" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" required id="fileInput">
                    <div class="border-2 border-dashed border-border-light dark:border-border-dark rounded-lg p-8 text-center hover:border-highlight transition-colors bg-surface-light dark:bg-surface-dark">
                        <div class="flex flex-col items-center">
                            <i class="fas fa-cloud-upload-alt text-4xl text-text-light-secondary dark:text-text-dark-secondary mb-3"></i>
                            <p class="text-sm font-medium text-text-light-primary dark:text-text-dark-primary mb-1">Clique para selecionar o arquivo</p>
                            <p class="text-xs text-text-light-secondary dark:text-text-dark-secondary">PDF, DOC, DOCX, JPG, PNG (máx. 10MB)</p>
                            <p id="fileName" class="text-xs text-highlight mt-2 hidden"></p>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }
    
    document.getElementById('modalTitle').textContent = modalTitle;
    document.getElementById('formFields').innerHTML = formFields;
    document.getElementById('novoStatus').value = novoStatus;
    document.getElementById('statusModal').classList.remove('hidden');
}

function closeStatusModal() {
    document.getElementById('statusModal').classList.add('hidden');
}

// Mostrar nome do arquivo selecionado
document.addEventListener('change', function(e) {
    if (e.target.id === 'fileInput') {
        const fileName = e.target.files[0]?.name;
        const fileNameElement = document.getElementById('fileName');
        if (fileName) {
            fileNameElement.textContent = fileName;
            fileNameElement.classList.remove('hidden');
        } else {
            fileNameElement.classList.add('hidden');
        }
    }
});

// Submissão do formulário
document.getElementById('statusForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    
    // Requisição AJAX para o servidor
    fetch('/sistemas/avancar-status', {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-Token': document.querySelector('input[name="_csrfToken"]').value
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            toastr.success(data.message);
            closeStatusModal();
            location.reload();
        } else {
            toastr.error(data.message);
        }
    })
    .catch(error => {
        console.error('Erro:', error);
        toastr.error('Erro ao processar solicitação.');
    });
});
</script>