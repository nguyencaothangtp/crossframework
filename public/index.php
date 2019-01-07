<?php

require '../Core/Router.php';

$router = new Router();
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
$router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);


echo '<pre>';
print_r($router->getRoutes());
echo '</pre>';


?>
