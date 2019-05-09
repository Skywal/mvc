<?php

namespace application\core;

/**
 * Class Controller
 * Базовий контроллер для всіх сторінок
 * @package application\core
 */
abstract class Controller {
    /**
     * @var шлях на якій сторінці знаходимося
     */
    public $route;
    public $view;

    public function __construct($route) {

        $this->route = $route;
        $this->view = new View($route);
        $this->before();
    }
    
    public function before(){

    }
}
