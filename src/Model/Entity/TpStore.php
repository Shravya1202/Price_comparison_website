<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TpStore Entity
 *
 * @property int $id
 * @property int|null $tp_id
 * @property string|null $store_logo
 * @property string|null $price
 * @property string|null $store_url
 *
 * @property \App\Model\Entity\TrendingProduct $trending_product
 */
class TpStore extends Entity
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
        'tp_id' => true,
        'store_logo' => true,
        'price' => true,
        'store_url' => true,
        'trending_product' => true,
    ];
}
