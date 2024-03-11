<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ImoveisCaracteristicasImoveltipo Entity
 *
 * @property int $id
 * @property int $imovel_id
 * @property int $caracteristica_imoveltipo_id
 * @property string $valor
 * @property int $ativo
 * @property \Cake\I18n\DateTime $criado
 * @property \Cake\I18n\DateTime $modificado
 * @property int $criador_id
 * @property int $modificador_id
 *
 * @property \App\Model\Entity\Imovel $imovel
 * @property \App\Model\Entity\CaracteristicasImoveltipo $caracteristicas_imoveltipo
 */
class ImoveisCaracteristicasImoveltipo extends Entity
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
    protected array $_accessible = [
        'imovel_id' => true,
        'caracteristica_imoveltipo_id' => true,
        'valor' => true,
        'ativo' => true,
        'criado' => true,
        'modificado' => true,
        'criador_id' => true,
        'modificador_id' => true,
        'imovel' => true,
        'caracteristicas_imoveltipo' => true,
    ];
}
