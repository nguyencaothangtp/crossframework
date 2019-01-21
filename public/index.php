<?php

/**
 *  Autoloader
 */

spl_autoload_register(function ($className) {
    $root = dirname(__DIR__);
    $file = $root . '/' . str_replace('\\', '/', $className) . '.php';
    if (is_readable($file)) {
        require $root . '/' . str_replace('\\', '/', $className) . '.php';
    }
});

$router = new Core\Router();
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);

$url = $_SERVER['QUERY_STRING'];

$router->dispatch($url);
