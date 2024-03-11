<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Midias Model
 *
 * @property \App\Model\Table\ImoveisTable&\Cake\ORM\Association\BelongsTo $Imoveis
 *
 * @method \App\Model\Entity\Midia newEmptyEntity()
 * @method \App\Model\Entity\Midia newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Midia> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Midia get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Midia findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Midia patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Midia> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Midia|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Midia saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Midia>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Midia>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Midia>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Midia> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Midia>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Midia>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Midia>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Midia> deleteManyOrFail(iterable $entities, array $options = [])
 */
class MidiasTable extends Table
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

        $this->setTable('midias');
        $this->setDisplayField('identificacao');
        $this->setPrimaryKey('id');

        $this->belongsTo('Imoveis', [
            'foreignKey' => 'imovel_id',
            'joinType' => 'INNER',
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
            ->nonNegativeInteger('imovel_id')
            ->notEmptyString('imovel_id');

        $validator
            ->scalar('identificacao')
            ->maxLength('identificacao', 100)
            ->requirePresence('identificacao', 'create')
            ->notEmptyString('identificacao');

        $validator
            ->scalar('nome_disco')
            ->maxLength('nome_disco', 100)
            ->requirePresence('nome_disco', 'create')
            ->notEmptyString('nome_disco');

        $validator
            ->requirePresence('capa', 'create')
            ->notEmptyString('capa');

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
        $rules->add($rules->existsIn(['imovel_id'], 'Imoveis'), ['errorField' => 'imovel_id']);

        return $rules;
    }
}
