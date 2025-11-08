<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Materiai $materiai
 * @var string[]|\Cake\Collection\CollectionInterface $sistemas
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $materiai->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $materiai->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Materiais'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="materiais form content">
            <?= $this->Form->create($materiai) ?>
            <fieldset>
                <legend><?= __('Edit Materiai') ?></legend>
                <?php
                    echo $this->Form->control('descricao');
                    echo $this->Form->control('qnt');
                    echo $this->Form->control('is_extra');
                    echo $this->Form->control('sistema_id', ['options' => $sistemas, 'empty' => true]);
                    echo $this->Form->control('is_active');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
