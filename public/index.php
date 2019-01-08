<?php

require '../Core/Router.php';

$router = new Router();
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}');

$url = $_SERVER['QUERY_STRING'];

echo '<pre>';
echo htmlspecialchars(print_r($router->getRoutes()));
echo '</pre>';

if ($router->match($url)) {
    echo '<pre>';
        print_r($router->getParams());
    echo '</pre>';
}
