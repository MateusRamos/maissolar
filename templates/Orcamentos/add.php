<?php
$this->layout = 'main';
$this->assign('title', 'Criar Orçamento - MaisSolar');
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
                <?= $this->Html->link('Orçamentos', ['action' => 'index'], [
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

<h1 class="text-4xl font-bold text-text-light-primary dark:text-text-dark-primary mb-8">Criar Novo Orçamento</h1>

<?= $this->Form->create($orcamento, ['id' => 'orcamentoForm']) ?>

<!-- Campos básicos -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <div>
        <?= $this->Form->control('nome', [
            'label' => 'Nome do Orçamento',
            'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary',
            'required' => true
        ]) ?>
    </div>
    <div>
        <?= $this->Form->control('cliente', [
            'label' => 'Nome do Cliente',
            'class' => 'w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-highlight focus:border-transparent bg-surface-light dark:bg-surface-dark text-text-light-primary dark:text-text-dark-primary',
            'required' => true
        ]) ?>
    </div>
</div>

<!-- Documento A4 -->
<div class="flex justify-center mb-8">
    <div id="documento-a4" class="bg-white dark:bg-gray-800 shadow-2xl" style="width: 280mm; min-height: 297mm; padding: 20mm;">
        
        <!-- Cabeçalho -->
        <div class="border-b-2 border-highlight pb-6 mb-8">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-highlight mb-2">ORÇAMENTO</h1>
                <div class="flex justify-between items-center mt-4">
                    <div class="text-left">
                        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Loja Mais Solar</h2>
                        <p class="text-gray-600 dark:text-gray-400">Energia Solar Sustentável</p>
                    </div>
                    <div class="text-right">
                        <p class="text-gray-600 dark:text-gray-400">Data: <span id="data-atual"><?= date('d/m/Y') ?></span></p>
                        <p class="text-gray-600 dark:text-gray-400">Cliente: 
                            <input type="text" id="cliente-doc" placeholder="Nome do cliente" 
                                   class="border-0 border-b border-gray-300 dark:border-gray-600 bg-transparent text-gray-800 dark:text-gray-200 outline-0 min-w-48">
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabela de Itens -->
        <div class="mb-8">
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-100 dark:bg-gray-700">
                        <th class="border border-gray-300 dark:border-gray-600 px-3 py-2 text-center w-20 text-gray-800 dark:text-gray-200 text-xs">Qtd</th>
                        <th class="border border-gray-300 dark:border-gray-600 px-3 py-2 text-left text-gray-800 dark:text-gray-200 text-xs">Descrição</th>
                        <th class="border border-gray-300 dark:border-gray-600 px-3 py-2 text-center w-24 text-gray-800 dark:text-gray-200 text-xs">Preço Unit.</th>
                        <th class="border border-gray-300 dark:border-gray-600 px-3 py-2 text-center w-24 text-gray-800 dark:text-gray-200 text-xs">Total</th>
                    </tr>
                </thead>
                <tbody id="tabela-itens">
                    <!-- Primeira linha será inserida via JavaScript -->
                </tbody>
            </table>
        </div>

        <!-- Total -->
        <div class="flex justify-end">
            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                <div class="text-right">
                    <p class="text-lg font-bold text-gray-800 dark:text-gray-200">Total Geral: R$ <span id="total-geral">0,00</span></p>
                </div>
            </div>
        </div>

        <!-- Rodapé -->
        <div class="mt-12 pt-6 border-t border-gray-300 dark:border-gray-600 text-center text-gray-600 dark:text-gray-400">
            <p>Este orçamento tem validade de 30 dias</p>
            <p class="mt-2">Loja Mais Solar - Energia Solar Sustentável</p>
        </div>
    </div>
</div>

<!-- Botões -->
<div class="flex justify-end space-x-4">
    <?= $this->Html->link('Cancelar', ['action' => 'index'], [
        'class' => 'px-6 py-3 border border-border-light dark:border-border-dark text-text-light-secondary dark:text-text-dark-secondary rounded-lg hover:bg-bg-light dark:hover:bg-medium-light transition-colors'
    ]) ?>
    <?= $this->Form->button('Salvar Orçamento', [
        'type' => 'submit',
        'class' => 'px-6 py-3 bg-highlight hover:bg-highlight-dark text-base-white rounded-lg transition-colors font-medium'
    ]) ?>
</div>

<?= $this->Form->end() ?>

<script>
let contadorLinhas = 0;

// Sincronizar campos de cliente
document.querySelector('input[name="cliente"]').addEventListener('input', function() {
    document.getElementById('cliente-doc').value = this.value;
});

document.getElementById('cliente-doc').addEventListener('input', function() {
    document.querySelector('input[name="cliente"]').value = this.value;
});

// Função para adicionar nova linha (inicial)
function adicionarLinha() {
    const tbody = document.getElementById('tabela-itens');
    const novaLinha = criarLinha();
    tbody.appendChild(novaLinha);
    
    // Focar no campo quantidade da nova linha
    setTimeout(() => {
        novaLinha.querySelector('input[name*="[quantidade]"]').focus();
    }, 100);
    
    return novaLinha;
}

function handleEnter(event) {
    if (event.key === 'Enter') {
        event.preventDefault();
        const linhaAtual = event.target.closest('tr');
        const novaLinha = criarLinha();
        linhaAtual.insertAdjacentElement('afterend', novaLinha);
        setTimeout(() => {
            novaLinha.querySelector('input[name*="[quantidade]"]').focus();
        }, 100);
    }
}

let linhaComFoco = null;



function verificarLinhaVazia(linha) {
    const inputs = linha.querySelectorAll('input[type="text"], input[type="number"]');
    return Array.from(inputs).every(input => !input.value.trim());
}

function removerLinhasVazias() {
    const linhas = document.querySelectorAll('#tabela-itens tr');
    
    linhas.forEach((linha, index) => {
        if (index === linhas.length - 1 || linha === linhaComFoco) return;
        
        if (verificarLinhaVazia(linha)) {
            linha.remove();
            calcularTotalGeral();
        }
    });
}



// Função para criar linha (separada para reutilização)
function criarLinha() {
    contadorLinhas++;
    const tr = document.createElement('tr');
    tr.id = `linha-${contadorLinhas}`;
    tr.className = 'relative';
    
    
    tr.innerHTML = `
        <td class="border border-gray-300 dark:border-gray-600 px-2 py-1">
            <input type="number" name="itens[${contadorLinhas}][quantidade]" 
                   class="w-full border-0 outline-0 bg-transparent text-center text-gray-800 dark:text-gray-200 text-sm no-arrows" 
                   placeholder="1" value="1" min="1"
                   onfocus="linhaComFoco = this.closest('tr')"
                   onblur="linhaComFoco = null; setTimeout(removerLinhasVazias, 300); calcularTotal(${contadorLinhas})"
                   onkeydown="handleEnter(event)"
                   oninput="calcularTotal(${contadorLinhas})">
        </td>
        <td class="border border-gray-300 dark:border-gray-600 px-3 py-1">
            <input type="text" name="itens[${contadorLinhas}][descricao]" 
                   class="w-full border-0 outline-0 bg-transparent text-gray-800 dark:text-gray-200 text-sm" 
                   placeholder="Descrição do item..."
                   onfocus="linhaComFoco = this.closest('tr')"
                   onblur="linhaComFoco = null; setTimeout(removerLinhasVazias, 300)"
                   onkeydown="handleEnter(event)">
        </td>
        <td class="border border-gray-300 dark:border-gray-600 px-2 py-1">
            <input type="number" name="itens[${contadorLinhas}][preco_unitario]" 
                   class="w-full border-0 outline-0 bg-transparent text-center text-gray-800 dark:text-gray-200 text-sm no-arrows" 
                   placeholder="0,00" step="0.01"
                   onfocus="linhaComFoco = this.closest('tr')"
                   onblur="formatarPreco(this); linhaComFoco = null; setTimeout(removerLinhasVazias, 300); calcularTotal(${contadorLinhas})"
                   onkeydown="handleEnter(event)"
                   oninput="calcularTotal(${contadorLinhas})">
        </td>
        <td class="border border-gray-300 dark:border-gray-600 px-2 py-1">
            <input type="text" name="itens[${contadorLinhas}][preco_total]" 
                   class="w-full border-0 outline-0 bg-transparent text-center font-bold text-gray-800 dark:text-gray-200 text-sm" 
                   placeholder="0,00" readonly>
        </td>

    `;
    

    
    return tr;
}

// Função para formatar preço com 2 casas decimais
function formatarPreco(input) {
    const valor = parseFloat(input.value) || 0;
    input.value = valor.toFixed(2);
}

// Função para calcular total da linha
function calcularTotal(linhaId) {
    const quantidade = document.querySelector(`input[name="itens[${linhaId}][quantidade]"]`).value || 1;
    const precoUnitario = document.querySelector(`input[name="itens[${linhaId}][preco_unitario]"]`).value || 0;
    const precoTotal = parseFloat(quantidade) * parseFloat(precoUnitario);
    
    document.querySelector(`input[name="itens[${linhaId}][preco_total]"]`).value = precoTotal.toFixed(2);
    
    calcularTotalGeral();
}

// Função para calcular total geral
function calcularTotalGeral() {
    let total = 0;
    document.querySelectorAll('input[name*="[preco_total]"]').forEach(input => {
        total += parseFloat(input.value) || 0;
    });
    
    document.getElementById('total-geral').textContent = total.toLocaleString('pt-BR', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
}



// Inicializar com uma linha
document.addEventListener('DOMContentLoaded', function() {
    adicionarLinha();
});

// Interceptar submit para incluir dados dos itens
document.getElementById('orcamentoForm').addEventListener('submit', function(e) {
    // Adicionar campo hidden com os itens em JSON
    const itens = [];
    document.querySelectorAll('#tabela-itens tr').forEach(linha => {
        const descricao = linha.querySelector('input[type="text"]').value.trim();
        const preco = linha.querySelector('input[name*="[preco_unitario]"]').value.trim();
        
        if (descricao || preco) {
            const quantidade = linha.querySelector('input[name*="[quantidade]"]').value.trim() || 1;
            itens.push({
                quantidade: parseInt(quantidade),
                descricao: descricao,
                preco_unitario: parseFloat(preco) || 0,
                preco_total: parseFloat(quantidade) * parseFloat(preco) || 0
            });
        }
    });
    
    // Criar campo hidden com os itens
    const hiddenInput = document.createElement('input');
    hiddenInput.type = 'hidden';
    hiddenInput.name = 'itens_json';
    hiddenInput.value = JSON.stringify(itens);
    this.appendChild(hiddenInput);
});
</script>

<style>
/* Remover setas dos inputs number */
.no-arrows::-webkit-outer-spin-button,
.no-arrows::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

.no-arrows[type=number] {
    -moz-appearance: textfield;
}

@media print {
    body * {
        visibility: hidden;
    }
    #documento-a4, #documento-a4 * {
        visibility: visible;
    }
    #documento-a4 {
        position: absolute;
        left: 0;
        top: 0;
        width: 280mm !important;
        height: 297mm !important;
    }
}
</style>