<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Database;

class MainController extends Controller {

    public function indexAction(){
//        $vars = [
//            'name' => 'Vasia',
//            'age' => 4,
//        ];
        $db = new Database;

        $params = [
            'id' => 2
        ];

        $data = $db->row('SELECT name FROM users WHERE id = :id', $params);

        debug($data);
        $this->view->render('Main page');
    }
}