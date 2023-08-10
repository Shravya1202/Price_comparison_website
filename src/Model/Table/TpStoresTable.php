<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TpStores Model
 *
 * @property \App\Model\Table\TrendingProductsTable&\Cake\ORM\Association\BelongsTo $TrendingProducts
 *
 * @method \App\Model\Entity\TpStore newEmptyEntity()
 * @method \App\Model\Entity\TpStore newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TpStore[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TpStore get($primaryKey, $options = [])
 * @method \App\Model\Entity\TpStore findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TpStore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TpStore[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TpStore|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TpStore saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TpStore[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TpStore[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TpStore[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TpStore[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TpStoresTable extends Table
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

        $this->setTable('tp_stores');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('TrendingProducts', [
            'foreignKey' => 'tp_id',
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
            ->integer('tp_id')
            ->allowEmptyString('tp_id');

        $validator
            ->scalar('store_logo')
            ->maxLength('store_logo', 255)
            ->allowEmptyString('store_logo');

        $validator
            ->decimal('price')
            ->allowEmptyString('price');

        $validator
            ->scalar('store_url')
            ->maxLength('store_url', 255)
            ->allowEmptyString('store_url');

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
        $rules->add($rules->existsIn('tp_id', 'TrendingProducts'), ['errorField' => 'tp_id']);

        return $rules;
    }
}
