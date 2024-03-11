<?php
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return function (RouteBuilder $routes): void {
    
    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $routes) {
        /**
         * Rotas de Admin
         */
        $routes->connect('/admin', ['controller' => 'Pages', 'action' => 'display', 'admin']);
        /**
         * Rotas de Caracteristicas
         */
        $routes->connect('/admin/caracteristicas', ['controller' => 'Caracteristicas', 'action' => 'index', 'caracteristicas']);
        $routes->connect('/admin/caracteristicas', ['controller' => 'Caracteristicas', 'action' => 'index', 'caracteristicas']);
    });
    $routes->scope('/', function (RouteBuilder $builder): void {
        
        $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
       
        $builder->connect('/pages/*', 'Pages::display');

        
        $builder->fallbacks();
    });

};
