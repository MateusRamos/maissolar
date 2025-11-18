<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Materiais Model
 *
 * @property \App\Model\Table\SistemasTable&\Cake\ORM\Association\BelongsTo $Sistemas
 *
 * @method \App\Model\Entity\Materiai newEmptyEntity()
 * @method \App\Model\Entity\Materiai newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Materiai[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Materiai get($primaryKey, $options = [])
 * @method \App\Model\Entity\Materiai findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Materiai patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Materiai[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Materiai|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Materiai saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Materiai[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Materiai[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Materiai[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Materiai[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class MateriaisTable extends Table
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

        $this->setTable('materiais');
        $this->setDisplayField('descricao');
        $this->setPrimaryKey('id');

        $this->belongsTo('Sistemas', [
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
            ->scalar('descricao')
            ->maxLength('descricao', 128)
            ->requirePresence('descricao', 'create')
            ->notEmptyString('descricao');

        $validator
            ->integer('qnt')
            ->notEmptyString('qnt');

        $validator
            ->notEmptyString('is_extra');

        $validator
            ->integer('sistema_id')
            ->allowEmptyString('sistema_id');

        $validator
            ->integer('orcamento_id')
            ->allowEmptyString('orcamento_id');

        $validator
            ->decimal('preco_unitario')
            ->allowEmptyString('preco_unitario');

        $validator
            ->decimal('valor_unit')
            ->allowEmptyString('valor_unit');

        $validator
            ->decimal('valor_total')
            ->allowEmptyString('valor_total');

        $validator
            ->notEmptyString('is_active');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('sistema_id', 'Sistemas'), ['errorField' => 'sistema_id']);

        return $rules;
    }
}
