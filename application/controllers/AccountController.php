<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller {
    /**
     * зміна шаблону для всього контролеру
     */
    public function before(){
        $this->view->layout = 'custom';
    }

    public function loginAction(){

		if(!empty($_POST)){
			$this->view->message('success', 'Success message');
		}
        $this->view->render('Log in');
    }
    public function registerAction(){

        $this->view->render('Register');
    }

}