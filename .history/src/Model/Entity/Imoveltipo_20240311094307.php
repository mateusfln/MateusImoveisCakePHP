<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Imoveltipo Entity
 *
 * @property int $id
 * @property string $nome
 * @property int $ativo
 * @property \Cake\I18n\DateTime $criado
 * @property \Cake\I18n\DateTime $modificado
 * @property int $criador_id
 * @property int $modificador_id
 *
 * @property \App\Model\Entity\Imovei[] $imoveis
 * @property \App\Model\Entity\Caracteristica[] $caracteristicas
 */
class Imoveltipo extends Entity
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
        'nome' => true,
        'ativo' => true,
        'criado' => true,
        'modificado' => true,
        'criador_id' => true,
        'modificador_id' => true,
        'imoveis' => true,
        'caracteristicas' => true,
    ];
}
