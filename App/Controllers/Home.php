<?php

namespace App\Controllers;

use \Core\View;

class Home extends \Core\Controller {

    public function indexAction() {
//        echo 'I am in index action of Home controller';
        $data['test'] = '<script>alert(1)</script>';
        View::render('Home/index.php', $data);
    }

    protected function before() {
        //echo '(before)';
    }

    protected function after() {
        //echo ' (after)';
    }
}