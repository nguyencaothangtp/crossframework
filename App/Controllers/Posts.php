<?php

namespace App\Controllers;

class Posts extends \Core\Controller {

    public function indexAction() {
        echo 'I am in index action of Post controller';
    }

    public function newPostAction() {
        echo 'I am in new post action of Post controller';
    }

    protected function before() {
        echo '(before)';
    }

    protected function after() {
        echo ' (after)';
    }
}