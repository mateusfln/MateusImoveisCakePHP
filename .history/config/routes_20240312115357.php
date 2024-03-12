<?php
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return function (RouteBuilder $routes): void {
    
    $routes->setRouteClass(DashedRoute::class);

    /**
     * Escopo das rotas caracteristicas
     */
    $routes->scope('/admin/caracteristicas', function (RouteBuilder $routes) {
        $routes->get('/', ['controller' => 'Caracteristicas', 'action' => 'index', ]);
        $routes->get('/add', ['controller' => 'Caracteristicas', 'action' => 'create']);
        $routes->get('/read/{id}', ['controller' => 'Caracteristicas', 'action' => 'read']);
        $routes->put('/update/{id}', ['controller' => 'Caracteristicas', 'action' => 'update']);
        $routes->delete('/delete/{id}', ['controller' => 'Caracteristicas', 'action' => 'delete']);
    });
    
    
    $routes->scope('/admin', function (RouteBuilder $builder): void {
        
        $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
       
        $builder->connect('/pages/*', 'Pages::display');

        
        $builder->fallbacks();
    });

};
