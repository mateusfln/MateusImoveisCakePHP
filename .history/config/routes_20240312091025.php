<?php
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return function (RouteBuilder $routes): void {
    
    $routes->setRouteClass(DashedRoute::class);


    /**
     * Escopo das rotas admin
     */
    $routes->scope('/admin', function (RouteBuilder $routes) {
        $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'admin']);
    });
    /**
     * Escopo das rotas caracteristicas
     */
    $routes->scope('/admin', function (RouteBuilder $routes) {
        $routes->get('/caracteristicas', ['controller' => 'Caracteristicas', 'action' => 'index']);
        $routes->get('/caracteristicasadd', ['controller' => 'Caracteristicas', 'action' => 'create']);
        $routes->get('/caracteristicasread/{id}', ['controller' => 'Caracteristicas', 'action' => 'read']);
        $routes->put('/caracteristicasupdate/{id}', ['controller' => 'Caracteristicas', 'action' => 'update']);
        $routes->delete('/caracteristicasdelete/{id}', ['controller' => 'Caracteristicas', 'action' => 'delete']);
    });
    
    
    $routes->scope('/', function (RouteBuilder $builder): void {
        
        $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
       
        $builder->connect('/pages/*', 'Pages::display');

        
        $builder->fallbacks();
    });

};
