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
        $routes->connect('/admin/caracteristicas', ['controller' => 'Caracteristicas', 'action' => 'read']);
        // $routes->connect('/admin/caracteristicas/add', ['controller' => 'Caracteristicas', 'action' => 'add', 'caracteristicas']);
        // $routes->connect('/admin/caracteristicas/update', ['controller' => 'Caracteristicas', 'action' => 'update', 'caracteristicas']);
        // $routes->connect('/admin/caracteristicas/delete', ['controller' => 'Caracteristicas', 'action' => 'delete', 'caracteristicas']);
    });
    $routes->scope('/', function (RouteBuilder $builder): void {
        
        $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
       
        $builder->connect('/pages/*', 'Pages::display');

        
        $builder->fallbacks();
    });

};
