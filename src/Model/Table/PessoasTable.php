<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pessoas Model
 *
 * @method \App\Model\Entity\Pessoa newEmptyEntity()
 * @method \App\Model\Entity\Pessoa newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Pessoa> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pessoa get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Pessoa findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Pessoa patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Pessoa> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pessoa|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Pessoa saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Pessoa>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pessoa>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Pessoa>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pessoa> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Pessoa>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pessoa>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Pessoa>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pessoa> deleteManyOrFail(iterable $entities, array $options = [])
 */
class PessoasTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('pessoas');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');
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
            ->maxLength('nome', 45)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        $validator
            ->scalar('cpf')
            ->maxLength('cpf', 15)
            ->requirePresence('cpf', 'create')
            ->notEmptyString('cpf')
            ->add('cpf', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('login')
            ->maxLength('login', 45)
            ->requirePresence('login', 'create')
            ->notEmptyString('login')
            ->add('login', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('senha')
            ->maxLength('senha', 45)
            ->requirePresence('senha', 'create')
            ->notEmptyString('senha');

        $validator
            ->requirePresence('ativo', 'create')
            ->notEmptyString('ativo');

        $validator
            ->dateTime('criado')
            ->requirePresence('criado', 'create')
            ->notEmptyDateTime('criado');

        $validator
            ->dateTime('modificado')
            ->requirePresence('modificado', 'create')
            ->notEmptyDateTime('modificado');

        $validator
            ->nonNegativeInteger('criador_id')
            ->requirePresence('criador_id', 'create')
            ->notEmptyString('criador_id');

        $validator
            ->nonNegativeInteger('modificador_id')
            ->requirePresence('modificador_id', 'create')
            ->notEmptyString('modificador_id');

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
        $rules->add($rules->isUnique(['cpf']), ['errorField' => 'cpf']);
        $rules->add($rules->isUnique(['login']), ['errorField' => 'login']);

        return $rules;
    }
}
