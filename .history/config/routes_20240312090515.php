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
        $routes->get('/add', ['controller' => 'Pages', 'action' => 'display', 'admin']);
        $routes->get('/read/{id}', ['controller' => 'Pages', 'action' => 'display', 'admin']);
        $routes->put('/update/{id}', ['controller' => 'Pages', 'action' => 'display', 'admin']);
        $routes->delete('/delete/{id}', ['controller' => 'Pages', 'action' => 'display', 'admin']);
    });
    
    
    $routes->scope('/', function (RouteBuilder $builder): void {
        
        $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
       
        $builder->connect('/pages/*', 'Pages::display');

        
        $builder->fallbacks();
    });

};
