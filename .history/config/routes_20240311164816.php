<?php
use Cake\Routing\RouteBuilder;

return function (RouteBuilder $routes): void {
    
    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $routes) {
        $routes->connect('/admin', ['controller' => 'Pages', 'action' => 'display', 'admin']);
    });
    
};
