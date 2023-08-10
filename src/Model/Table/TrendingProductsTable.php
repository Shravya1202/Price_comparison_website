<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TrendingProducts Model
 *
 * @method \App\Model\Entity\TrendingProduct newEmptyEntity()
 * @method \App\Model\Entity\TrendingProduct newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TrendingProduct[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TrendingProduct get($primaryKey, $options = [])
 * @method \App\Model\Entity\TrendingProduct findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TrendingProduct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TrendingProduct[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TrendingProduct|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TrendingProduct saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TrendingProduct[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TrendingProduct[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TrendingProduct[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TrendingProduct[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TrendingProductsTable extends Table
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

        $this->setTable('trending_products');
        $this->setDisplayField('tp_id');
        $this->setPrimaryKey('tp_id');

        $this->hasMany('TpStores', [
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
            ->scalar('description')
            ->maxLength('description', 255)
            ->allowEmptyString('description');

        $validator
            ->scalar('tp_img')
            ->maxLength('tp_img', 255)
            ->allowEmptyString('tp_img');

        $validator
            ->decimal('price')
            ->allowEmptyString('price');

        return $validator;
    }
}