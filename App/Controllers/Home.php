<?php

namespace App\Controllers;

class Home extends \Core\Controller {

    public function indexAction() {
        echo 'I am in index action of Home controller';
    }

    protected function before() {
        echo '(before)';
    }

    protected function after() {
        echo ' (after)';
    }
}