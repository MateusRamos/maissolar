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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $orcamento->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $orcamento->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Orcamentos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="orcamentos form content">
            <?= $this->Form->create($orcamento) ?>
            <fieldset>
                <legend><?= __('Edit Orcamento') ?></legend>
                <?php
                    echo $this->Form->control('nome');
                    echo $this->Form->control('cliente');
                    echo $this->Form->control('mao_de_obra');
                    echo $this->Form->control('is_active');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
