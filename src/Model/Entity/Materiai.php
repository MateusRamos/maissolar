<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Materiai Entity
 *
 * @property int $id
 * @property string $descricao
 * @property int $qnt
 * @property int $is_extra
 * @property int|null $sistema_id
 * @property int|null $orcamento_id
 * @property float|null $preco_unitario
 * @property float|null $valor_unit
 * @property float|null $valor_total
 * @property int $is_active
 *
 * @property \App\Model\Entity\Sistema $sistema
 */
class Materiai extends Entity
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
        'descricao' => true,
        'qnt' => true,
        'is_extra' => true,
        'sistema_id' => true,
        'orcamento_id' => true,
        'preco_unitario' => true,
        'valor_unit' => true,
        'valor_total' => true,
        'is_active' => true,
        'sistema' => true,
    ];
}
