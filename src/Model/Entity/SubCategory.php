<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SubCategory Entity
 *
 * @property int $sub_id
 * @property int $cat_id
 * @property string $sub_name
 * @property string|null $sub_img
 *
 * @property \App\Model\Entity\Category $category
 */
class SubCategory extends Entity
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
        'cat_id' => true,
        'sub_name' => true,
        'sub_img' => true,
        'category' => true,
    ];
}
