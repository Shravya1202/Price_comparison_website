<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TrendingProductsFixture
 */
class TrendingProductsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'tp_id' => 1,
                'description' => 'Lorem ipsum dolor sit amet',
                'tp_img' => 'Lorem ipsum dolor sit amet',
                'price' => 1.5,
            ],
        ];
        parent::init();
    }
}
