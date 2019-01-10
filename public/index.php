<?php

require '../Core/Router.php';
require '../App/Controllers/Posts.php';

$router = new Router();
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}');

$url = $_SERVER['QUERY_STRING'];

$router->dispatch($url);
