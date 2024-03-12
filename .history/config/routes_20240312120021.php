<?php
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return function (RouteBuilder $routes): void {
    
    $routes->setRouteClass(DashedRoute::class);

    /**
     * Escopo geral das rotas admin
     */
    $routes->scope('/admin', function (RouteBuilder $routes) {
       
        /**
         * SubEscopo da rota caracteristica
         */
        $routes->scope('/caracteristicas', function (RouteBuilder $routes) {
            $routes->get('/', ['controller' => 'Caracteristicas', 'action' => 'index', 'teste']);
            $routes->get('/add', ['controller' => 'Caracteristicas', 'action' => 'create']);
            $routes->get('/read/{id}', ['controller' => 'Caracteristicas', 'action' => 'read']);
            $routes->put('/update/{id}', ['controller' => 'Caracteristicas', 'action' => 'update']);
            $routes->delete('/delete/{id}', ['controller' => 'Caracteristicas', 'action' => 'delete']);
        });
    });
    
    
    $routes->scope('/admin', function (RouteBuilder $builder): void {
        
        $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
       
        $builder->connect('/pages/*', 'Pages::display');

        
        $builder->fallbacks();
    });

};
