<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Imovei Entity
 *
 * @property int $id
 * @property int $imoveltipo_id
 * @property string|null $identificacao
 * @property string|null $matricula
 * @property string|null $inscricao_imobiliaria
 * @property string|null $logradouro
 * @property string|null $numero_logradouro
 * @property string|null $complemento
 * @property string|null $bairro
 * @property string|null $cidade
 * @property string|null $estado
 * @property string|null $cep
 * @property string|null $ibge
 * @property int $ativo
 * @property \Cake\I18n\DateTime $criado
 * @property \Cake\I18n\DateTime $modificado
 * @property int $criador_id
 * @property int $modificador_id
 * @property string|null $rua
 * @property string|null $metros_quadrados
 * @property string|null $quartos
 * @property string|null $banheiros
 * @property string|null $garagem
 *
 * @property \App\Model\Entity\Imoveltipo $imoveltipo
 * @property \App\Model\Entity\CaracteristicasImoveltipo $caracteristicas_imoveltipos
 * @property \App\Model\Entity\Negociotipo $negociotipos
 * @property \App\Model\Entity\Midia $midias
 */
class Imovei extends Entity
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
        'imoveltipo_id' => true,
        'identificacao' => true,
        'matricula' => true,
        'inscricao_imobiliaria' => true,
        'logradouro' => true,
        'numero_logradouro' => true,
        'complemento' => true,
        'bairro' => true,
        'cidade' => true,
        'estado' => true,
        'cep' => true,
        'ibge' => true,
        'ativo' => true,
        'criado' => true,
        'modificado' => true,
        'criador_id' => true,
        'modificador_id' => true,
        'rua' => true,
        'metros_quadrados' => true,
        'quartos' => true,
        'banheiros' => true,
        'garagem' => true,
        'imoveltipo' => true,
        'caracteristicas_imoveltipos' => true,
        'negociotipos' => true,
        'midias' => true,
        'imoveis_negociotipos' => true,
    ];
}
