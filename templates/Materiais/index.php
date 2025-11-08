<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Materiai> $materiais
 */
?>
<div class="materiais index content">
    <?= $this->Html->link(__('New Materiai'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Materiais') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('descricao') ?></th>
                    <th><?= $this->Paginator->sort('qnt') ?></th>
                    <th><?= $this->Paginator->sort('is_extra') ?></th>
                    <th><?= $this->Paginator->sort('sistema_id') ?></th>
                    <th><?= $this->Paginator->sort('is_active') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($materiais as $materiai): ?>
                <tr>
                    <td><?= $this->Number->format($materiai->id) ?></td>
                    <td><?= h($materiai->descricao) ?></td>
                    <td><?= $this->Number->format($materiai->qnt) ?></td>
                    <td><?= $this->Number->format($materiai->is_extra) ?></td>
                    <td><?= $materiai->has('sistema') ? $this->Html->link($materiai->sistema->nome, ['controller' => 'Sistemas', 'action' => 'view', $materiai->sistema->id]) : '' ?></td>
                    <td><?= $this->Number->format($materiai->is_active) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $materiai->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $materiai->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $materiai->id], ['confirm' => __('Are you sure you want to delete # {0}?', $materiai->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
