<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SubCategories Model
 *
 * @property \App\Model\Table\CategoriesTable&\Cake\ORM\Association\BelongsTo $Categories
 *
 * @method \App\Model\Entity\SubCategory newEmptyEntity()
 * @method \App\Model\Entity\SubCategory newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\SubCategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SubCategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\SubCategory findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\SubCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SubCategory[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\SubCategory|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SubCategory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SubCategory[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SubCategory[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\SubCategory[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SubCategory[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SubCategoriesTable extends Table
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

        $this->setTable('sub_categories');
        $this->setDisplayField('sub_id');
        $this->setPrimaryKey('sub_id');

        $this->belongsTo('Categories', [
            'foreignKey' => 'cat_id',
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
            ->integer('cat_id')
            ->notEmptyString('cat_id');

        $validator
            ->scalar('sub_name')
            ->maxLength('sub_name', 255)
            ->requirePresence('sub_name', 'create')
            ->notEmptyString('sub_name');

        $validator
            ->scalar('sub_img')
            ->maxLength('sub_img', 255)
            ->allowEmptyString('sub_img');

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
        $rules->add($rules->existsIn('cat_id', 'Categories'), ['errorField' => 'cat_id']);

        return $rules;
    }
}
