<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Imoveltipos Model
 *
 * @property \App\Model\Table\ImoveisTable&\Cake\ORM\Association\HasMany $Imoveis
 * @property \App\Model\Table\CaracteristicasTable&\Cake\ORM\Association\BelongsToMany $Caracteristicas
 *
 * @method \App\Model\Entity\Imoveltipo newEmptyEntity()
 * @method \App\Model\Entity\Imoveltipo newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Imoveltipo> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Imoveltipo get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Imoveltipo findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Imoveltipo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Imoveltipo> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Imoveltipo|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Imoveltipo saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Imoveltipo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Imoveltipo>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Imoveltipo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Imoveltipo> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Imoveltipo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Imoveltipo>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Imoveltipo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Imoveltipo> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ImoveltiposTable extends Table
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

        $this->setTable('imoveltipos');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->hasMany('Imoveis', [
            'foreignKey' => 'imoveltipo_id',
        ]);
        $this->belongsToMany('Caracteristicas', [
            'foreignKey' => 'imoveltipo_id',
            'targetForeignKey' => 'caracteristica_id',
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
