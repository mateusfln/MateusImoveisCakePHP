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
    $routes->scope('/admin/caracteristicas', function (RouteBuilder $routes) {
        $routes->connect('/add', ['controller' => 'Pages', 'action' => 'display', 'admin']);
        $routes->connect('/read/{id}', ['controller' => 'Pages', 'action' => 'display', 'admin']);
        $routes->connect('/update/{id}', ['controller' => 'Pages', 'action' => 'display', 'admin']);
        $routes->connect('/delete/{id}', ['controller' => 'Pages', 'action' => 'display', 'admin']);
    });
    
    
    $routes->scope('/', function (RouteBuilder $builder): void {
        
        $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
       
        $builder->connect('/pages/*', 'Pages::display');

        
        $builder->fallbacks();
    });

};
