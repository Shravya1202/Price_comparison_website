<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TpStoresFixture
 */
class TpStoresFixture extends TestFixture
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
                'id' => 1,
                'tp_id' => 1,
                'store_logo' => 'Lorem ipsum dolor sit amet',
                'price' => 1.5,
                'store_url' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
