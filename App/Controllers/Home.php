<?php

namespace App\Controllers;

class Home extends \Core\Controller {

    public function indexAction() {
        echo $this->blade->render('index', ['title' => 'I am the title', 'slot' => 5]);
    }

    protected function before() {
        //echo '(before)';
    }

    protected function after() {
        //echo ' (after)';
    }
}