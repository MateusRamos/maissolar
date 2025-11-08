<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sistema $sistema
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Sistema'), ['action' => 'edit', $sistema->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Sistema'), ['action' => 'delete', $sistema->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sistema->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Sistemas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Sistema'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sistemas view content">
            <h3><?= h($sistema->nome) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($sistema->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($sistema->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telefone') ?></th>
                    <td><?= h($sistema->telefone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Endereco') ?></th>
                    <td><?= h($sistema->endereco) ?></td>
                </tr>
                <tr>
                    <th><?= __('Marca') ?></th>
                    <td><?= h($sistema->marca) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tipo Estrutura') ?></th>
                    <td><?= h($sistema->tipo_estrutura) ?></td>
                </tr>
                <tr>
                    <th><?= __('Orcamento Path') ?></th>
                    <td><?= h($sistema->orcamento_path) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($sistema->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Potencia Sistema') ?></th>
                    <td><?= $this->Number->format($sistema->potencia_sistema) ?></td>
                </tr>
                <tr>
                    <th><?= __('Consumo Sistema') ?></th>
                    <td><?= $this->Number->format($sistema->consumo_sistema) ?></td>
                </tr>
                <tr>
                    <th><?= __('Area Sistema') ?></th>
                    <td><?= $this->Number->format($sistema->area_sistema) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Micro') ?></th>
                    <td><?= $this->Number->format($sistema->is_micro) ?></td>
                </tr>
                <tr>
                    <th><?= __('Qnt Micro') ?></th>
                    <td><?= $sistema->qnt_micro === null ? '' : $this->Number->format($sistema->qnt_micro) ?></td>
                </tr>
                <tr>
                    <th><?= __('Qnt Modulos') ?></th>
                    <td><?= $this->Number->format($sistema->qnt_modulos) ?></td>
                </tr>
                <tr>
                    <th><?= __('Potencia Modulos') ?></th>
                    <td><?= $sistema->potencia_modulos === null ? '' : $this->Number->format($sistema->potencia_modulos) ?></td>
                </tr>
                <tr>
                    <th><?= __('Valor Orcado') ?></th>
                    <td><?= $this->Number->format($sistema->valor_orcado) ?></td>
                </tr>
                <tr>
                    <th><?= __('Valor Materiais Orcado') ?></th>
                    <td><?= $this->Number->format($sistema->valor_materiais_orcado) ?></td>
                </tr>
                <tr>
                    <th><?= __('Qnt Funcionarios') ?></th>
                    <td><?= $this->Number->format($sistema->qnt_funcionarios) ?></td>
                </tr>
                <tr>
                    <th><?= __('Valor Materais Final') ?></th>
                    <td><?= $this->Number->format($sistema->valor_materais_final) ?></td>
                </tr>
                <tr>
                    <th><?= __('Custo Alimentacao') ?></th>
                    <td><?= $this->Number->format($sistema->custo_alimentacao) ?></td>
                </tr>
                <tr>
                    <th><?= __('Custo Transporte') ?></th>
                    <td><?= $this->Number->format($sistema->custo_transporte) ?></td>
                </tr>
                <tr>
                    <th><?= __('Qnt Carros') ?></th>
                    <td><?= $sistema->qnt_carros === null ? '' : $this->Number->format($sistema->qnt_carros) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Active') ?></th>
                    <td><?= $this->Number->format($sistema->is_active) ?></td>
                </tr>
                <tr>
                    <th><?= __('Data Inicio') ?></th>
                    <td><?= h($sistema->data_inicio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Data Termino') ?></th>
                    <td><?= h($sistema->data_termino) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($sistema->created) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Observacoes Orcamento') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($sistema->observacoes_orcamento)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Materiais') ?></h4>
                <?php if (!empty($sistema->materiais)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Descricao') ?></th>
                            <th><?= __('Qnt') ?></th>
                            <th><?= __('Is Extra') ?></th>
                            <th><?= __('Sistema Id') ?></th>
                            <th><?= __('Is Active') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($sistema->materiais as $materiais) : ?>
                        <tr>
                            <td><?= h($materiais->id) ?></td>
                            <td><?= h($materiais->descricao) ?></td>
                            <td><?= h($materiais->qnt) ?></td>
                            <td><?= h($materiais->is_extra) ?></td>
                            <td><?= h($materiais->sistema_id) ?></td>
                            <td><?= h($materiais->is_active) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Materiais', 'action' => 'view', $materiais->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Materiais', 'action' => 'edit', $materiais->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Materiais', 'action' => 'delete', $materiais->id], ['confirm' => __('Are you sure you want to delete # {0}?', $materiais->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
