<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Imoveis Model
 *
 * @property \App\Model\Table\ImoveltiposTable&\Cake\ORM\Association\BelongsTo $Imoveltipos
 * @property \App\Model\Table\CaracteristicasImoveltiposTable&\Cake\ORM\Association\BelongsToMany $CaracteristicasImoveltipos
 * @property \App\Model\Table\NegociotiposTable&\Cake\ORM\Association\BelongsToMany $Negociotipos
 *
 * @method \App\Model\Entity\Imovei newEmptyEntity()
 * @method \App\Model\Entity\Imovei newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Imovei> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Imovei get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Imovei findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Imovei patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Imovei> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Imovei|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Imovei saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Imovei>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Imovei>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Imovei>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Imovei> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Imovei>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Imovei>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Imovei>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Imovei> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ImoveisTable extends Table
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

        $this->setTable('imoveis');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Imoveltipos', [
            'foreignKey' => 'imoveltipo_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('CaracteristicasImoveltipos', [
            'foreignKey' => 'imovel_id',
            'targetForeignKey' => 'caracteristicas_imoveltipo_id',
            'joinTable' => 'imoveis_caracteristicas_imoveltipos',
        ]);
        $this->belongsToMany('ImoveisNegociotipos', [
            'foreignKey' => 'imovel_id',
            'targetForeignKey' => 'imovel_negociotipos_id',
            'joinTable' => 'imoveis_caracteristicas_imoveltipos',
        ]);
        $this->belongsToMany('Negociotipos', [
            'foreignKey' => 'imovel_id',
            'targetForeignKey' => 'negociotipo_id',
            'joinTable' => 'imoveis_negociotipos',
        ]);
        $this->hasMany('Midias',[
            'foreignKey' => 'imovel_id',
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
            ->nonNegativeInteger('imoveltipo_id')
            ->notEmptyString('imoveltipo_id');

        $validator
            ->scalar('identificacao')
            ->maxLength('identificacao', 100)
            ->allowEmptyString('identificacao');

        $validator
            ->scalar('matricula')
            ->maxLength('matricula', 100)
            ->allowEmptyString('matricula');

        $validator
            ->scalar('inscricao_imobiliaria')
            ->maxLength('inscricao_imobiliaria', 100)
            ->allowEmptyString('inscricao_imobiliaria');

        $validator
            ->scalar('logradouro')
            ->maxLength('logradouro', 150)
            ->allowEmptyString('logradouro');

        $validator
            ->scalar('numero_logradouro')
            ->maxLength('numero_logradouro', 10)
            ->allowEmptyString('numero_logradouro');

        $validator
            ->scalar('complemento')
            ->maxLength('complemento', 45)
            ->allowEmptyString('complemento');

        $validator
            ->scalar('bairro')
            ->maxLength('bairro', 100)
            ->allowEmptyString('bairro');

        $validator
            ->scalar('cidade')
            ->maxLength('cidade', 100)
            ->allowEmptyString('cidade');

        $validator
            ->scalar('estado')
            ->maxLength('estado', 2)
            ->allowEmptyString('estado');

        $validator
            ->scalar('cep')
            ->maxLength('cep', 8)
            ->allowEmptyString('cep');

        $validator
            ->scalar('ibge')
            ->maxLength('ibge', 10)
            ->allowEmptyString('ibge');

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

        $validator
            ->scalar('rua')
            ->maxLength('rua', 255)
            ->allowEmptyString('rua');

        $validator
            ->scalar('metros_quadrados')
            ->maxLength('metros_quadrados', 100)
            ->allowEmptyString('metros_quadrados');

        $validator
            ->scalar('quartos')
            ->maxLength('quartos', 100)
            ->allowEmptyString('quartos');

        $validator
            ->scalar('banheiros')
            ->maxLength('banheiros', 100)
            ->allowEmptyString('banheiros');

        $validator
            ->scalar('garagem')
            ->maxLength('garagem', 100)
            ->allowEmptyString('garagem');

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
        $rules->add($rules->existsIn(['imoveltipo_id'], 'Imoveltipos'), ['errorField' => 'imoveltipo_id']);

        return $rules;
    }
}
