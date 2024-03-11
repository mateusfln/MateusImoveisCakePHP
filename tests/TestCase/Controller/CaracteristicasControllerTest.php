<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\CaracteristicasController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\CaracteristicasController Test Case
 *
 * @uses \App\Controller\CaracteristicasController
 */
class CaracteristicasControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Caracteristicas',
        'app.Imoveltipos',
    ];
}
