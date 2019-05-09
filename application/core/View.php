<?php


namespace application\core;


class View {
    /**
     * шлях до конкретного екземпляру View
     * @var
     */
    public $path;
    /**
     * шаблон сторінки (шапка і всі метатеги і закриваючі теги)
     * @var
     */
    public $layout = 'default';
    /**
     * поточна сторінка на якій знаходимося
     * @var
     */
    public $route;

    public function __construct($route) {
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];
//        debug($this->path);
    }

    /**
     * Вивід шаблону на показ
     * Заголовок сторінки
     * @param $title
     * Дані які потрібно відобразити на сторінці
     * @param array $vars
     */
    public function render($title, $vars = []){
        if(file_exists('application/views/' . $this->path . '.php')){
            ob_start();

            extract($vars);

            require 'application/views/' . $this->path . '.php';
            $content = ob_get_clean();

            require 'application/views/layouts/' . $this->layout . '.php';
        } else {
            echo 'Вид не знайдено ' . $this->path;
        }
    }

    public static function errorCode($code){
        http_response_code($code);
        require 'application/views/errors/' . $code . '.php';
        exit;
    }

    public function redirect($url){
        header('location: ' . $url);
        exit;
    }
}