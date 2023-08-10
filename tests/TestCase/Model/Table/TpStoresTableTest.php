<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TpStoresTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TpStoresTable Test Case
 */
class TpStoresTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TpStoresTable
     */
    protected $TpStores;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.TpStores',
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
        $config = $this->getTableLocator()->exists('TpStores') ? [] : ['className' => TpStoresTable::class];
        $this->TpStores = $this->getTableLocator()->get('TpStores', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TpStores);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TpStoresTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\TpStoresTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
