<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Materiai $materiai
 * @var \Cake\Collection\CollectionInterface|string[] $sistemas
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Materiais'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="materiais form content">
            <?= $this->Form->create($materiai) ?>
            <fieldset>
                <legend><?= __('Add Materiai') ?></legend>
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
