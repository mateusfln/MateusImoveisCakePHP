<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CaracteristicasImoveltipo Entity
 *
 * @property int $id
 * @property int $caracteristica_id
 * @property int $imoveltipo_id
 * @property int $ativo
 * @property \Cake\I18n\DateTime $criado
 * @property \Cake\I18n\DateTime $modificado
 * @property int $criador_id
 * @property int $modificador_id
 *
 * @property \App\Model\Entity\Caracteristica $caracteristica
 * @property \App\Model\Entity\Imoveltipo $imoveltipo
 * @property \App\Model\Entity\Imovel[] $Imovel
 */
class CaracteristicasImoveltipo extends Entity
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
        'caracteristica_id' => true,
        'imoveltipo_id' => true,
        'ativo' => true,
        'criado' => true,
        'modificado' => true,
        'criador_id' => true,
        'modificador_id' => true,
        'caracteristica' => true,
        'imoveltipo' => true,
        'imoveis' => true,
    ];
}
