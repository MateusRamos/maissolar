<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Orcamentos Model
 *
 * @property \App\Model\Table\MateriaisTable&\Cake\ORM\Association\HasMany $Materiais
 *
 * @method \App\Model\Entity\Orcamento newEmptyEntity()
 * @method \App\Model\Entity\Orcamento newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Orcamento[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Orcamento get($primaryKey, $options = [])
 * @method \App\Model\Entity\Orcamento findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Orcamento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Orcamento[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Orcamento|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Orcamento saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Orcamento[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Orcamento[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Orcamento[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Orcamento[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OrcamentosTable extends Table
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

        $this->setTable('orcamentos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Materiais', [
            'foreignKey' => 'orcamento_id',
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
            ->maxLength('nome', 148)
            ->allowEmptyString('nome');

        $validator
            ->scalar('cliente')
            ->maxLength('cliente', 148)
            ->allowEmptyString('cliente');

        $validator
            ->date('data_orcamento')
            ->allowEmptyDate('data_orcamento');

        $validator
            ->numeric('mao_de_obra')
            ->allowEmptyString('mao_de_obra');

        $validator
            ->allowEmptyString('is_active');

        return $validator;
    }
}
