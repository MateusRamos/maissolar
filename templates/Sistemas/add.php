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
            <?= $this->Html->link(__('List Sistemas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sistemas form content">
            <?= $this->Form->create($sistema) ?>
            <fieldset>
                <legend><?= __('Add Sistema') ?></legend>
                <?php
                    echo $this->Form->control('nome', ['autocomplete' => 'off']);
                    echo $this->Form->control('email', ['autocomplete' => 'off']);
                    echo $this->Form->control('telefone', ['autocomplete' => 'off']);
                    echo $this->Form->control('endereco', ['autocomplete' => 'off']);
                    echo $this->Form->control('potencia_sistema', ['autocomplete' => 'off']);
                    echo $this->Form->control('consumo_sistema', ['autocomplete' => 'off']);
                    echo $this->Form->control('area_sistema', ['autocomplete' => 'off']);
                    echo $this->Form->control('is_micro');
                    echo $this->Form->control('qnt_micro', ['autocomplete' => 'off']);
                    echo $this->Form->control('qnt_modulos', ['autocomplete' => 'off']);
                    echo $this->Form->control('potencia_modulos', ['autocomplete' => 'off']);
                    echo $this->Form->control('marca', ['autocomplete' => 'off']);
                    echo $this->Form->control('tipo_estrutura', ['autocomplete' => 'off']);
                    echo $this->Form->control('valor_orcado', ['autocomplete' => 'off']);
                    echo $this->Form->control('valor_materiais_orcado', ['autocomplete' => 'off']);
                    echo $this->Form->control('observacoes_orcamento', ['autocomplete' => 'off']);
                    echo $this->Form->control('orcamento_path', ['autocomplete' => 'off']);
                    echo $this->Form->control('qnt_funcionarios', ['autocomplete' => 'off']);
                    echo $this->Form->control('valor_materais_final', ['autocomplete' => 'off']);
                    echo $this->Form->control('custo_alimentacao', ['autocomplete' => 'off']);
                    echo $this->Form->control('custo_transporte', ['autocomplete' => 'off']);
                    echo $this->Form->control('data_inicio', ['empty' => true, 'autocomplete' => 'off']);
                    echo $this->Form->control('data_termino', ['empty' => true, 'autocomplete' => 'off']);
                    echo $this->Form->control('qnt_carros', ['autocomplete' => 'off']);
                    echo $this->Form->control('is_active');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
