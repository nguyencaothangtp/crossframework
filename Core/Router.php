<?php

class Router {
    /**
     * Associate array of routes (the routing table)
     * @var array
     */
    protected $routes = [];

    /**
     * Add a route to the routing table
     *
     * @param $route
     * @param $params
     */
    public function add($route, $params) {
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

}