<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MidiasFixture
 */
class MidiasFixture extends TestFixture
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
                'identificacao' => 'Lorem ipsum dolor sit amet',
                'nome_disco' => 'Lorem ipsum dolor sit amet',
                'capa' => 1,
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
