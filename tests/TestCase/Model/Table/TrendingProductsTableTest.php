<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TrendingProductsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TrendingProductsTable Test Case
 */
class TrendingProductsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TrendingProductsTable
     */
    protected $TrendingProducts;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.TrendingProducts',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TrendingProducts') ? [] : ['className' => TrendingProductsTable::class];
        $this->TrendingProducts = $this->getTableLocator()->get('TrendingProducts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TrendingProducts);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TrendingProductsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
