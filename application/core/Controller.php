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
        $this->model = $this->loadModel($route['controller']);

    }

    public function before(){

    }

    /**
     * автозагрузчик моделей
     * @param $name
     * @return mixed
     */
    public function loadModel($name){
        $path = 'application\models\\' . ucfirst($name); // підключення із оберненими слешами це заміна use
        if(class_exists($path)){
            return new $path;
        }
    }
}
