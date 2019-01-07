<?php

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
        foreach ($this->routes as $route => $params) {
            if ($url == $route) {
                $this->params = $params;
                return true;
            }

        }

        return false;
    }

}