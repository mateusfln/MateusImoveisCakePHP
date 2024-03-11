<?php
use Cake\Routing\RouteBuilder;

return function (RouteBuilder $routes): void {
    
    $routes->scope('/', function (RouteBuilder $routes) {
        $routes->connect('/admin', ['controller' => 'Pages', 'action' => 'display', 'admin']);
    });
    
};
