<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ImoveisNegociotiposTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ImoveisNegociotiposTable Test Case
 */
class ImoveisNegociotiposTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ImoveisNegociotiposTable
     */
    protected $ImoveisNegociotipos;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.ImoveisNegociotipos',
        'app.Imoveis',
        'app.Negociotipos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ImoveisNegociotipos') ? [] : ['className' => ImoveisNegociotiposTable::class];
        $this->ImoveisNegociotipos = $this->getTableLocator()->get('ImoveisNegociotipos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ImoveisNegociotipos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ImoveisNegociotiposTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ImoveisNegociotiposTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
