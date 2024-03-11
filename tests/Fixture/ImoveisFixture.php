<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ImoveisFixture
 */
class ImoveisFixture extends TestFixture
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
                'imoveltipo_id' => 1,
                'identificacao' => 'Lorem ipsum dolor sit amet',
                'matricula' => 'Lorem ipsum dolor sit amet',
                'inscricao_imobiliaria' => 'Lorem ipsum dolor sit amet',
                'logradouro' => 'Lorem ipsum dolor sit amet',
                'numero_logradouro' => 'Lorem ip',
                'complemento' => 'Lorem ipsum dolor sit amet',
                'bairro' => 'Lorem ipsum dolor sit amet',
                'cidade' => 'Lorem ipsum dolor sit amet',
                'estado' => '',
                'cep' => '',
                'ibge' => 'Lorem ip',
                'ativo' => 1,
                'criado' => '2024-03-11 13:50:24',
                'modificado' => '2024-03-11 13:50:24',
                'criador_id' => 1,
                'modificador_id' => 1,
                'rua' => 'Lorem ipsum dolor sit amet',
                'metros_quadrados' => 'Lorem ipsum dolor sit amet',
                'quartos' => 'Lorem ipsum dolor sit amet',
                'banheiros' => 'Lorem ipsum dolor sit amet',
                'garagem' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
