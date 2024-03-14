<?php
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return function (RouteBuilder $routes): void {
    
    $routes->setRouteClass(DashedRoute::class);

    /**
     * Escopo geral das rotas admin
     */
    $routes->scope('/admin', function (RouteBuilder $routes) {
       
    });
    
    
    $routes->scope('/admin', function (RouteBuilder $builder): void {
        
        $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
       
        $builder->connect('/pages/*', 'Pages::display');

        
        $builder->fallbacks();
    });
    $routes->scope('/', function (RouteBuilder $builder): void {
        
        $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
       
    });

};
