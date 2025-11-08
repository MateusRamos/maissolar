<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sistemas Model
 *
 * @property \App\Model\Table\MateriaisTable&\Cake\ORM\Association\HasMany $Materiais
 *
 * @method \App\Model\Entity\Sistema newEmptyEntity()
 * @method \App\Model\Entity\Sistema newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Sistema[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sistema get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sistema findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Sistema patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sistema[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sistema|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sistema saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sistema[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Sistema[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Sistema[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Sistema[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SistemasTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('sistemas');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Materiais', [
            'foreignKey' => 'sistema_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('nome')
            ->maxLength('nome', 128)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->scalar('telefone')
            ->maxLength('telefone', 45)
            ->allowEmptyString('telefone');

        $validator
            ->scalar('endereco')
            ->maxLength('endereco', 256)
            ->requirePresence('endereco', 'create')
            ->notEmptyString('endereco');

        $validator
            ->numeric('potencia_sistema')
            ->notEmptyString('potencia_sistema');

        $validator
            ->numeric('consumo_sistema')
            ->notEmptyString('consumo_sistema');

        $validator
            ->numeric('area_sistema')
            ->notEmptyString('area_sistema');

        $validator
            ->notEmptyString('is_micro');

        $validator
            ->integer('qnt_micro')
            ->allowEmptyString('qnt_micro');

        $validator
            ->integer('qnt_modulos')
            ->notEmptyString('qnt_modulos');

        $validator
            ->integer('potencia_modulos')
            ->allowEmptyString('potencia_modulos');

        $validator
            ->scalar('marca')
            ->maxLength('marca', 128)
            ->allowEmptyString('marca');

        $validator
            ->scalar('tipo_estrutura')
            ->maxLength('tipo_estrutura', 128)
            ->allowEmptyString('tipo_estrutura');

        $validator
            ->numeric('valor_orcado')
            ->notEmptyString('valor_orcado');

        $validator
            ->numeric('valor_materiais_orcado')
            ->notEmptyString('valor_materiais_orcado');

        $validator
            ->scalar('observacoes_orcamento')
            ->allowEmptyString('observacoes_orcamento');

        $validator
            ->scalar('orcamento_path')
            ->maxLength('orcamento_path', 256)
            ->allowEmptyString('orcamento_path');

        $validator
            ->integer('qnt_funcionarios')
            ->notEmptyString('qnt_funcionarios');

        $validator
            ->numeric('valor_materais_final')
            ->notEmptyString('valor_materais_final');

        $validator
            ->numeric('custo_alimentacao')
            ->notEmptyString('custo_alimentacao');

        $validator
            ->numeric('custo_transporte')
            ->notEmptyString('custo_transporte');

        $validator
            ->date('data_inicio')
            ->allowEmptyDate('data_inicio');

        $validator
            ->date('data_termino')
            ->allowEmptyDate('data_termino');

        $validator
            ->integer('qnt_carros')
            ->allowEmptyString('qnt_carros');

        $validator
            ->notEmptyString('is_active');

        $validator
            ->integer('status')
            ->allowEmptyString('status');

        return $validator;
    }
}
