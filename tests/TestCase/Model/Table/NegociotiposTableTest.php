<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NegociotiposTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NegociotiposTable Test Case
 */
class NegociotiposTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\NegociotiposTable
     */
    protected $Negociotipos;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Negociotipos',
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
        $config = $this->getTableLocator()->exists('Negociotipos') ? [] : ['className' => NegociotiposTable::class];
        $this->Negociotipos = $this->getTableLocator()->get('Negociotipos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Negociotipos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\NegociotiposTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\NegociotiposTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
