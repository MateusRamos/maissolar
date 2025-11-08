<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MateriaisTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MateriaisTable Test Case
 */
class MateriaisTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MateriaisTable
     */
    protected $Materiais;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Materiais',
        'app.Sistemas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Materiais') ? [] : ['className' => MateriaisTable::class];
        $this->Materiais = $this->getTableLocator()->get('Materiais', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Materiais);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MateriaisTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\MateriaisTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
