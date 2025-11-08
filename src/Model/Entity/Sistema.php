<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sistema Entity
 *
 * @property int $id
 * @property string $nome
 * @property string|null $email
 * @property string|null $telefone
 * @property string $endereco
 * @property float $potencia_sistema
 * @property float $consumo_sistema
 * @property float $area_sistema
 * @property int $is_micro
 * @property int|null $qnt_micro
 * @property int $qnt_modulos
 * @property int|null $potencia_modulos
 * @property string|null $marca
 * @property string|null $tipo_estrutura
 * @property float $valor_orcado
 * @property float $valor_materiais_orcado
 * @property string|null $observacoes_orcamento
 * @property string|null $orcamento_path
 * @property int $qnt_funcionarios
 * @property float $valor_materais_final
 * @property float $custo_alimentacao
 * @property float $custo_transporte
 * @property \Cake\I18n\FrozenDate|null $data_inicio
 * @property \Cake\I18n\FrozenDate|null $data_termino
 * @property int|null $qnt_carros
 * @property int $is_active
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\Materiai[] $materiais
 */
class Sistema extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'nome' => true,
        'email' => true,
        'telefone' => true,
        'endereco' => true,
        'potencia_sistema' => true,
        'consumo_sistema' => true,
        'area_sistema' => true,
        'is_micro' => true,
        'qnt_micro' => true,
        'qnt_modulos' => true,
        'potencia_modulos' => true,
        'marca' => true,
        'tipo_estrutura' => true,
        'valor_orcado' => true,
        'valor_materiais_orcado' => true,
        'observacoes_orcamento' => true,
        'orcamento_path' => true,
        'qnt_funcionarios' => true,
        'valor_materais_final' => true,
        'custo_alimentacao' => true,
        'custo_transporte' => true,
        'data_inicio' => true,
        'data_termino' => true,
        'qnt_carros' => true,
        'is_active' => true,
        'created' => true,
        'materiais' => true,
    ];
}
