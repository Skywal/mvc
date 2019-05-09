<?php

namespace application\core;

class Router{
    protected $routes = [];
    protected $params = [];

    public function __construct(){
        //завантажуємо всі шляхи які будуть на сайті
        $arr = require 'application/config/routes.php'; // тимчасове рішення
        foreach ($arr as $key => $val) {
            $this->add($key, $val);
        }
    }

    /**
     *  Додавання машруту
     */
    public function add($route, $params){
        $route = '#^'.$route.'$#'; // регулярний вираз
        $this->routes[$route] = $params;
    }
    /**
     * Перевірка наявності маршруту
     */
    public function match(){
        $url = trim($_SERVER['REQUEST_URI'], '/'); //отримуємо поточну сторінку на якій знаходимося і обрізаємо /
        foreach ($this->routes as $route => $params) {
            if(preg_match($route, $url, $matches)){
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    public function run(){
        if($this->match()){
            $path = 'application\controllers\\' . $this->params['controller'] . 'Controller'; //для виклику класів потрібно відформатувати строку до прийнятного вигляду
            if(class_exists($path)){

                $action = $this->params['action'].'Action';

                if(method_exists($path, $action)){
                    $controller = new $path($this->params); // створюємо новий клас у випвдку знаходження шляху, класу і відповідного екшину
                    $controller->$action();
                } else {
                    echo 'Не знайдено екшен' . $action;
                }
            } else {
                echo 'Не знайдено контроллер: ' . $path;
            }
        } else {
            echo 'Маршрут не знайдено';
        }
    }
}

?>
