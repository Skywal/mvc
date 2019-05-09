<?php


namespace application\core;


class View {
    /**
     * @var шлях до конкретного екземпляру View
     */
    public $path;
    /**
     * @var шаблон сторінки (шапка і всі метатеги і закриваючі теги)
     */
    public $layout = 'default';
    /**
     * @var поточна сторінка на якій знаходимося
     */
    public $route;

    public function __construct($route) {
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];
//        debug($this->path);
    }

    /**
     * Вивід шаблону на показ
     * @param $title Заголовок сторінки
     * @param array $vars Дані які потрібно відобразити на сторінці
     */
    public function render($title, $vars = []){
        if(file_exists('application/views/' . $this->path . '.php')){
            ob_start();
            require 'application/views/' . $this->path . '.php';
            $content = ob_get_clean();
            require 'application/views/layouts/' . $this->layout . '.php';
        } else {
            echo 'Вид не знайдено ' . $this->path;
        }
    }
}