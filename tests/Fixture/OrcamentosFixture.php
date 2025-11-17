<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrcamentosFixture
 */
class OrcamentosFixture extends TestFixture
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
                'id' => 1,
                'nome' => 'Lorem ipsum dolor sit amet',
                'cliente' => 'Lorem ipsum dolor sit amet',
                'mao_de_obra' => 1,
                'created' => '2025-11-17 17:10:11',
                'is_active' => 1,
            ],
        ];
        parent::init();
    }
}
