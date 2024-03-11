<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ImoveisNegociotipos Model
 *
 * @property \App\Model\Table\ImoveisTable&\Cake\ORM\Association\BelongsTo $Imoveis
 * @property \App\Model\Table\NegociotiposTable&\Cake\ORM\Association\BelongsTo $Negociotipos
 *
 * @method \App\Model\Entity\ImoveisNegociotipo newEmptyEntity()
 * @method \App\Model\Entity\ImoveisNegociotipo newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\ImoveisNegociotipo> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ImoveisNegociotipo get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\ImoveisNegociotipo findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\ImoveisNegociotipo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\ImoveisNegociotipo> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ImoveisNegociotipo|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\ImoveisNegociotipo saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\ImoveisNegociotipo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ImoveisNegociotipo>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ImoveisNegociotipo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ImoveisNegociotipo> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ImoveisNegociotipo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ImoveisNegociotipo>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ImoveisNegociotipo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ImoveisNegociotipo> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ImoveisNegociotiposTable extends Table
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

        $this->setTable('imoveis_negociotipos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Imoveis', [
            'foreignKey' => 'imovel_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Negociotipos', [
            'foreignKey' => 'negociotipo_id',
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
            ->nonNegativeInteger('negociotipo_id')
            ->notEmptyString('negociotipo_id');

        $validator
            ->decimal('valor')
            ->greaterThanOrEqual('valor', 0)
            ->requirePresence('valor', 'create')
            ->notEmptyString('valor');

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
        $rules->add($rules->existsIn(['negociotipo_id'], 'Negociotipos'), ['errorField' => 'negociotipo_id']);

        return $rules;
    }
}
