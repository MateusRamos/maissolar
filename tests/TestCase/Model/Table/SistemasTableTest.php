<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SistemasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SistemasTable Test Case
 */
class SistemasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SistemasTable
     */
    protected $Sistemas;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Sistemas',
        'app.Materiais',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Sistemas') ? [] : ['className' => SistemasTable::class];
        $this->Sistemas = $this->getTableLocator()->get('Sistemas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Sistemas);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SistemasTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
