<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductStores Model
 *
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 *
 * @method \App\Model\Entity\ProductStore newEmptyEntity()
 * @method \App\Model\Entity\ProductStore newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ProductStore[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductStore get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductStore findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ProductStore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductStore[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductStore|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductStore saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductStore[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ProductStore[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ProductStore[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ProductStore[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ProductStoresTable extends Table
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

        $this->setTable('product_stores');
        $this->setDisplayField('s_id');
        $this->setPrimaryKey('s_id');

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
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
            ->integer('product_id')
            ->notEmptyString('product_id');

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
        $rules->add($rules->existsIn('product_id', 'Products'), ['errorField' => 'product_id']);

        return $rules;
    }
}
