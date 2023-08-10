<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $product_id
 * @property int $sub_id
 * @property string|null $product_description
 * @property string|null $product_img
 * @property string|null $overall_price
 *
 * @property \App\Model\Entity\SubCategory $sub_category
 */
class Product extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'sub_id' => true,
        'product_description' => true,
        'product_img' => true,
        'overall_price' => true,
        'sub_category' => true,
    ];
}
