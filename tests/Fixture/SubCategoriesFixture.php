<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SubCategoriesFixture
 */
class SubCategoriesFixture extends TestFixture
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
                'sub_id' => 1,
                'cat_id' => 1,
                'sub_name' => 'Lorem ipsum dolor sit amet',
                'sub_img' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
