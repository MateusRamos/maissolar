<!-- Cabeçalho -->
<div class="border-b-2 border-highlight pb-6 mb-8">
    <div class="text-center">
        <h1 class="text-4xl font-bold highlight mb-2">ORÇAMENTO</h1>
        <div class="flex justify-between items-center mt-4">
            <div>
                <h2 class="text-2xl font-bold">Loja Mais Solar</h2>
                <p>Energia Solar Sustentável</p>
            </div>
            <div class="text-right">
                <p>Data: <?= $orcamento->data_orcamento ? $orcamento->data_orcamento->format('d/m/Y') : date('d/m/Y') ?></p>
                <p>Cliente: <?= h($orcamento->cliente) ?></p>
            </div>
        </div>
    </div>
</div>

<!-- Tabela de Itens -->
<div class="mb-8">
    <table>
        <thead>
            <tr class="bg-gray-100">
                <th class="text-center w-20 text-xs">Qtd</th>
                <th class="text-xs">Descrição</th>
                <th class="text-center w-24 text-xs">Preço Unit.</th>
                <th class="text-center w-24 text-xs">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $totalGeral = 0;
            foreach ($orcamento->materiais as $material): 
                $totalGeral += $material->valor_total;
            ?>
                <tr>
                    <td class="text-center text-sm"><?= $material->qnt ?></td>
                    <td class="text-sm"><?= h($material->descricao) ?></td>
                    <td class="text-center text-sm">R$ <?= number_format($material->valor_unit, 2, ',', '.') ?></td>
                    <td class="text-center font-bold text-sm">R$ <?= number_format($material->valor_total, 2, ',', '.') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Total -->
<div class="flex justify-end">
    <div class="bg-gray-100 p-4 rounded-lg">
        <div class="text-right">
            <p class="text-lg font-bold">Total Geral: R$ <?= number_format($totalGeral, 2, ',', '.') ?></p>
        </div>
    </div>
</div>

<!-- Rodapé -->
<div class="mt-12 pt-6 border-t text-center">
    <p>Este orçamento tem validade de 30 dias</p>
    <p class="mt-4">Loja Mais Solar - Energia Solar Sustentável</p>
</div>

<script>
window.onload = function() {
    // Configurar impressão sem header/footer mas com margens seguras
    const style = document.createElement('style');
    style.textContent = `
        @media print {
            @page { 
                margin: 6mm 10mm;
            }
            body { 
                margin: 0;
                padding: 0 15mm;
            }
            table {
                page-break-inside: auto;
            }
            tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }
            thead {
                display: table-header-group;
            }
            table td:nth-child(2) {
                word-wrap: break-word;
                word-break: break-word;
                max-width: 23ch;
                white-space: normal;
            }
        }
    `;
    document.head.appendChild(style);
    
    // Aguardar um pouco antes de imprimir
    setTimeout(() => {
        window.print();
    }, 500);
}
</script>