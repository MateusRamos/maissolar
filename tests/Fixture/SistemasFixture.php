<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SistemasFixture
 */
class SistemasFixture extends TestFixture
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
                'email' => 'Lorem ipsum dolor sit amet',
                'telefone' => 'Lorem ipsum dolor sit amet',
                'endereco' => 'Lorem ipsum dolor sit amet',
                'potencia_sistema' => 1,
                'consumo_sistema' => 1,
                'area_sistema' => 1,
                'is_micro' => 1,
                'qnt_micro' => 1,
                'qnt_modulos' => 1,
                'potencia_modulos' => 1,
                'marca' => 'Lorem ipsum dolor sit amet',
                'tipo_estrutura' => 'Lorem ipsum dolor sit amet',
                'valor_orcado' => 1,
                'valor_materiais_orcado' => 1,
                'observacoes_orcamento' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'orcamento_path' => 'Lorem ipsum dolor sit amet',
                'qnt_funcionarios' => 1,
                'valor_materais_final' => 1,
                'custo_alimentacao' => 1,
                'custo_transporte' => 1,
                'data_inicio' => '2025-11-01',
                'data_termino' => '2025-11-01',
                'qnt_carros' => 1,
                'is_active' => 1,
                'created' => '2025-11-01 14:03:11',
            ],
        ];
        parent::init();
    }
}
