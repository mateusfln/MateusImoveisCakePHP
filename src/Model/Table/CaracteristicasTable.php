<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Caracteristicas Model
 *
 * @property \App\Model\Table\ImoveltiposTable&\Cake\ORM\Association\BelongsToMany $Imoveltipos
 *
 * @method \App\Model\Entity\Caracteristica newEmptyEntity()
 * @method \App\Model\Entity\Caracteristica newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Caracteristica> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Caracteristica get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Caracteristica findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Caracteristica patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Caracteristica> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Caracteristica|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Caracteristica saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Caracteristica>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Caracteristica>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Caracteristica>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Caracteristica> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Caracteristica>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Caracteristica>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Caracteristica>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Caracteristica> deleteManyOrFail(iterable $entities, array $options = [])
 */
class CaracteristicasTable extends Table
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

        $this->setTable('caracteristicas');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Imoveltipos', [
            'foreignKey' => 'caracteristica_id',
            'targetForeignKey' => 'imoveltipo_id',
            'joinTable' => 'caracteristicas_imoveltipos',
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
            ->maxLength('nome', 45)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome')
            ->add('nome', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['nome']), ['errorField' => 'nome']);

        return $rules;
    }
}
