<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CaracteristicasImoveltipos Model
 *
 * @property \App\Model\Table\CaracteristicasTable&\Cake\ORM\Association\BelongsTo $Caracteristicas
 * @property \App\Model\Table\ImoveltiposTable&\Cake\ORM\Association\BelongsTo $Imoveltipos
 * @property \App\Model\Table\ImoveisTable&\Cake\ORM\Association\BelongsToMany $Imoveis
 *
 * @method \App\Model\Entity\CaracteristicasImoveltipo newEmptyEntity()
 * @method \App\Model\Entity\CaracteristicasImoveltipo newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\CaracteristicasImoveltipo> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CaracteristicasImoveltipo get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\CaracteristicasImoveltipo findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\CaracteristicasImoveltipo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\CaracteristicasImoveltipo> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CaracteristicasImoveltipo|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\CaracteristicasImoveltipo saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\CaracteristicasImoveltipo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CaracteristicasImoveltipo>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CaracteristicasImoveltipo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CaracteristicasImoveltipo> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CaracteristicasImoveltipo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CaracteristicasImoveltipo>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CaracteristicasImoveltipo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CaracteristicasImoveltipo> deleteManyOrFail(iterable $entities, array $options = [])
 */
class CaracteristicasImoveltiposTable extends Table
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

        $this->setTable('caracteristicas_imoveltipos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Caracteristicas', [
            'foreignKey' => 'caracteristica_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Imoveltipos', [
            'foreignKey' => 'imoveltipo_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('Imoveis', [
            'foreignKey' => 'caracteristicas_imoveltipo_id',
            'targetForeignKey' => 'imovei_id',
            'joinTable' => 'imoveis_caracteristicas_imoveltipos',
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
            ->nonNegativeInteger('caracteristica_id')
            ->notEmptyString('caracteristica_id');

        $validator
            ->nonNegativeInteger('imoveltipo_id')
            ->notEmptyString('imoveltipo_id');

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
        $rules->add($rules->existsIn(['caracteristica_id'], 'Caracteristicas'), ['errorField' => 'caracteristica_id']);
        $rules->add($rules->existsIn(['imoveltipo_id'], 'Imoveltipos'), ['errorField' => 'imoveltipo_id']);

        return $rules;
    }
}
