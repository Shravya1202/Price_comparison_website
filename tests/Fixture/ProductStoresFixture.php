<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductStoresFixture
 */
class ProductStoresFixture extends TestFixture
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
                's_id' => 1,
                'product_id' => 1,
                'store_logo' => 'Lorem ipsum dolor sit amet',
                'price' => 1.5,
                'store_url' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
