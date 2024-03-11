<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ImoveisNegociotiposFixture
 */
class ImoveisNegociotiposFixture extends TestFixture
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
                'imovel_id' => 1,
                'negociotipo_id' => 1,
                'valor' => 1.5,
                'ativo' => 1,
                'criado' => '2024-03-11 13:50:24',
                'modificado' => '2024-03-11 13:50:24',
                'criador_id' => 1,
                'modificador_id' => 1,
            ],
        ];
        parent::init();
    }
}
