<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Orcamento $orcamento
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Orcamento'), ['action' => 'edit', $orcamento->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Orcamento'), ['action' => 'delete', $orcamento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orcamento->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Orcamentos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Orcamento'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="orcamentos view content">
            <h3><?= h($orcamento->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($orcamento->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cliente') ?></th>
                    <td><?= h($orcamento->cliente) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($orcamento->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Mao De Obra') ?></th>
                    <td><?= $orcamento->mao_de_obra === null ? '' : $this->Number->format($orcamento->mao_de_obra) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Active') ?></th>
                    <td><?= $orcamento->is_active === null ? '' : $this->Number->format($orcamento->is_active) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($orcamento->created) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Materiais') ?></h4>
                <?php if (!empty($orcamento->materiais)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Descricao') ?></th>
                            <th><?= __('Qnt') ?></th>
                            <th><?= __('Is Extra') ?></th>
                            <th><?= __('Sistema Id') ?></th>
                            <th><?= __('Orcamento Id') ?></th>
                            <th><?= __('Is Active') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($orcamento->materiais as $materiais) : ?>
                        <tr>
                            <td><?= h($materiais->id) ?></td>
                            <td><?= h($materiais->descricao) ?></td>
                            <td><?= h($materiais->qnt) ?></td>
                            <td><?= h($materiais->is_extra) ?></td>
                            <td><?= h($materiais->sistema_id) ?></td>
                            <td><?= h($materiais->orcamento_id) ?></td>
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
