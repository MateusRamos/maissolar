<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        
        $this->setTable('usuarios');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
        
        $this->addBehavior('Timestamp');
    }
    
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');
            
        $validator
            ->scalar('password')
            ->requirePresence('password', 'create')
            ->notEmptyString('password');
            
        $validator
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmptyString('name');
            
        return $validator;
    }
}