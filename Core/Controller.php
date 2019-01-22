<?php

namespace Core;

use duncan3dc\Laravel\BladeInstance;

abstract class Controller {
    public $routeParams;
    public $blade;

    public function __construct($routeParams) {
        $this->routeParams = $routeParams;
        $shortClassName = substr(strrchr(get_class($this), '\\'), 1);
        $this->blade = new BladeInstance(dirname(__DIR__) . "/App/Views/" . $shortClassName,
            dirname(__DIR__) . "/App/Views/cache");
    }

    public function __call($name, $args) {
        $method = $name . 'Action';
        if (method_exists($this, $method)) {
            if ($this->before() !== false) {
                call_user_func_array([$this, $method], $args);
                $this->after();
            }
        } else {
            echo "Method $method not found in controller" . get_class($this);
        }
    }

    protected function before() {

    }

    protected function after() {

    }

}