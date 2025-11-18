<?php
$this->layout = 'main';
$this->assign('title', 'Detalhes do Orçamento - MaisSolar');
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
                <span class="text-sm font-medium text-text-light-primary dark:text-text-dark-primary">Detalhes</span>
            </div>
        </li>
    </ol>
</nav>

<!-- Header -->
<div class="flex justify-between items-start mb-8">
    <div>
        <h1 class="text-4xl font-bold text-text-light-primary dark:text-text-dark-primary"><?= h($orcamento->nome) ?></h1>
        <p class="text-sm text-text-light-secondary dark:text-text-dark-secondary mt-2">
            <?= $orcamento->data_orcamento ? $orcamento->data_orcamento->format('d/m/Y') : 'Data não informada' ?>
        </p>
    </div>
    <button onclick="gerarPDF()" class="px-6 py-3 bg-highlight hover:bg-highlight-dark text-base-white rounded-lg transition-colors font-medium inline-flex items-center">
        <i class="fas fa-print mr-2"></i>
        Imprimir
    </button>
</div>

<!-- Documento A4 -->
<div class="flex justify-center mb-8">
    <div id="documento-a4" class="bg-white shadow-2xl" style="width: 794px; min-height: 1123px; padding: 75px; box-sizing: border-box;">
        
        <!-- Cabeçalho -->
        <div class="border-b-2 border-highlight pb-6 mb-8">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-highlight mb-2">ORÇAMENTO</h1>
                <div class="flex justify-between items-center mt-4">
                    <div class="text-left">
                        <h2 class="text-2xl font-bold text-gray-800">Loja Mais Solar</h2>
                        <p class="text-gray-600">Energia Solar Sustentável</p>
                    </div>
                    <div class="text-right">
                        <p class="text-gray-600">Data: <?= $orcamento->data_orcamento ? $orcamento->data_orcamento->format('d/m/Y') : date('d/m/Y') ?></p>
                        <p class="text-gray-600">Cliente: <?= h($orcamento->cliente) ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabela de Itens -->
        <div class="mb-8">
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-3 py-2 text-center w-20 text-gray-800 text-xs">Qtd</th>
                        <th class="border border-gray-300 px-3 py-2 text-left text-gray-800 text-xs">Descrição</th>
                        <th class="border border-gray-300 px-3 py-2 text-center w-24 text-gray-800 text-xs">Preço Unit.</th>
                        <th class="border border-gray-300 px-3 py-2 text-center w-24 text-gray-800 text-xs">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $totalGeral = 0;
                    foreach ($orcamento->materiais as $material): 
                        $totalGeral += $material->valor_total;
                    ?>
                        <tr>
                            <td class="border border-gray-300 px-2 py-1 text-center text-gray-800 text-sm"><?= $material->qnt ?></td>
                            <td class="border border-gray-300 px-3 py-1 text-gray-800 text-sm"><?= h($material->descricao) ?></td>
                            <td class="border border-gray-300 px-2 py-1 text-center text-gray-800 text-sm">R$ <?= number_format($material->valor_unit, 2, ',', '.') ?></td>
                            <td class="border border-gray-300 px-2 py-1 text-center font-bold text-gray-800 text-sm">R$ <?= number_format($material->valor_total, 2, ',', '.') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Total -->
        <div class="flex justify-end">
            <div class="bg-gray-100 p-4 rounded-lg">
                <div class="text-right">
                    <p class="text-lg font-bold text-gray-800">Total Geral: R$ <?= number_format($totalGeral, 2, ',', '.') ?></p>
                </div>
            </div>
        </div>

        <!-- Rodapé -->
        <div class="mt-12 pt-6 border-t border-gray-300 text-center text-gray-600">
            <p>Este orçamento tem validade de 30 dias</p>
            <p class="mt-2">Loja Mais Solar - Energia Solar Sustentável</p>
        </div>
    </div>
</div>

<script>
function gerarPDF() {
    window.open('/orcamentos/pdf/<?= $orcamento->id ?>', '_blank');
}
</script>