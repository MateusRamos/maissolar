<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MateriaisFixture
 */
class MateriaisFixture extends TestFixture
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
                'descricao' => 'Lorem ipsum dolor sit amet',
                'qnt' => 1,
                'is_extra' => 1,
                'sistema_id' => 1,
                'is_active' => 1,
            ],
        ];
        parent::init();
    }
}
