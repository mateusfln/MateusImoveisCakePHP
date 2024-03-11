<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CaracteristicasImoveltiposTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CaracteristicasImoveltiposTable Test Case
 */
class CaracteristicasImoveltiposTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CaracteristicasImoveltiposTable
     */
    protected $CaracteristicasImoveltipos;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.CaracteristicasImoveltipos',
        'app.Caracteristicas',
        'app.Imoveltipos',
        'app.Imoveis',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CaracteristicasImoveltipos') ? [] : ['className' => CaracteristicasImoveltiposTable::class];
        $this->CaracteristicasImoveltipos = $this->getTableLocator()->get('CaracteristicasImoveltipos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CaracteristicasImoveltipos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CaracteristicasImoveltiposTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\CaracteristicasImoveltiposTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
