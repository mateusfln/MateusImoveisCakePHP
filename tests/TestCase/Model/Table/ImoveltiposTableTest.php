<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ImoveltiposTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ImoveltiposTable Test Case
 */
class ImoveltiposTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ImoveltiposTable
     */
    protected $Imoveltipos;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Imoveltipos',
        'app.Imoveis',
        'app.Caracteristicas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Imoveltipos') ? [] : ['className' => ImoveltiposTable::class];
        $this->Imoveltipos = $this->getTableLocator()->get('Imoveltipos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Imoveltipos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ImoveltiposTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ImoveltiposTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
