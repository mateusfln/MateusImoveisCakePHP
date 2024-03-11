<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ImoveisCaracteristicasImoveltiposTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ImoveisCaracteristicasImoveltiposTable Test Case
 */
class ImoveisCaracteristicasImoveltiposTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ImoveisCaracteristicasImoveltiposTable
     */
    protected $ImoveisCaracteristicasImoveltipos;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.ImoveisCaracteristicasImoveltipos',
        'app.Imoveis',
        'app.CaracteristicasImoveltipos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ImoveisCaracteristicasImoveltipos') ? [] : ['className' => ImoveisCaracteristicasImoveltiposTable::class];
        $this->ImoveisCaracteristicasImoveltipos = $this->getTableLocator()->get('ImoveisCaracteristicasImoveltipos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ImoveisCaracteristicasImoveltipos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ImoveisCaracteristicasImoveltiposTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ImoveisCaracteristicasImoveltiposTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
