<?php

namespace Core;

class Router {
    /**
     * Associate array of routes (the routing table)
     * @var array
     */
    protected $routes = [];

    /**
     * Array to store matched route
     * @var array
     */
    protected $params = [];

    /**
     * Add a route to the routing table
     *
     * @param $route
     * @param $params
     */
    public function add($route, $params = []) {
        // Escape / character
        $route = preg_replace('/\//', '\\/', $route);

        // Convert variable (eg. {controller])
        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);

        // Convert variable with custom regular expression e.g {id:\d+}
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);

        // Add start, end delimiters, and case insensitive flag
        $route = '/^' . $route . '$/i';

        // Add to routing table
        $this->routes[$route] = $params;
    }

    /**
     * Get all the routes from the routing table
     *
     * @return array
     */
    public function getRoutes() {
        return $this->routes;
    }

    /**
     * Return the matched params
     * @return array
     */
    public function getParams() {
        return $this->params;
    }

    /**
     * Match the url with the routing table
     * @param $url
     * @return bool true if a match found
     */
    public function match($url) {
        foreach ($this->routes as $route => $match) {
            if (preg_match($route, $url, $matches)) {
                foreach ($matches as $key => $value) {
                    if (is_string($key)) {
                        $match[$key] = $value;
                    }
                }

                $this->params = $match;
                return true;
            }
        }

        return false;
    }

    public function dispatch($url) {
        if ($this->match($url)) {
            $controller = $this->params['controller'];
            $controller = Router::convertToStudlyCaps($controller);
            $controller = "App\Controllers\\$controller";

            if (class_exists($controller)) {
                $controllerObject = new $controller();

                $action = $this->params['action'];
                $action = Router::convertToCamelCase($action);

                if (is_callable([$controllerObject, $action])) {
                    $controllerObject->$action();
                } else {
                    echo "Method action $action in controller $controller doesn't exist.";
                }
            } else {
                echo "Controller class $controller doesn't exist";
            }
        } else {
            echo 'Request doesn\'t match any url';
        }
    }

    static function convertToStudlyCaps($string) {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
    }

    static function convertToCamelCase($string) {
        return lcfirst(Router::convertToStudlyCaps($string));
    }

}