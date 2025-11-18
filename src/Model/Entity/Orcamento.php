<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Orcamento Entity
 *
 * @property int $id
 * @property string|null $nome
 * @property string|null $cliente
 * @property \Cake\I18n\FrozenDate|null $data_orcamento
 * @property float|null $mao_de_obra
 * @property \Cake\I18n\FrozenTime $created
 * @property int|null $is_active
 *
 * @property \App\Model\Entity\Materiai[] $materiais
 */
class Orcamento extends Entity
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
        'cliente' => true,
        'data_orcamento' => true,
        'mao_de_obra' => true,
        'created' => true,
        'is_active' => true,
        'materiais' => true,
    ];
}
