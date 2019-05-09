<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller {

    public function indexAction(){
//        $vars = [
//            'name' => 'Vasia',
//            'age' => 4,
//        ];
        $this->view->render('Main page');
    }
}