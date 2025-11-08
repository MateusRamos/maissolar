<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Materiai $materiai
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Materiai'), ['action' => 'edit', $materiai->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Materiai'), ['action' => 'delete', $materiai->id], ['confirm' => __('Are you sure you want to delete # {0}?', $materiai->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Materiais'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Materiai'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="materiais view content">
            <h3><?= h($materiai->descricao) ?></h3>
            <table>
                <tr>
                    <th><?= __('Descricao') ?></th>
                    <td><?= h($materiai->descricao) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sistema') ?></th>
                    <td><?= $materiai->has('sistema') ? $this->Html->link($materiai->sistema->nome, ['controller' => 'Sistemas', 'action' => 'view', $materiai->sistema->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($materiai->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Qnt') ?></th>
                    <td><?= $this->Number->format($materiai->qnt) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Extra') ?></th>
                    <td><?= $this->Number->format($materiai->is_extra) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Active') ?></th>
                    <td><?= $this->Number->format($materiai->is_active) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
