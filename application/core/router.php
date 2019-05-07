<?php

namespace application\core;

class Router{
  protected $routes = [];
  protected $params = [];

  public function __construct(){
    $arr = require 'application/config/routes.php'; // тимчасове рішення
    foreach ($arr as $key => $val) {
      $this->add($key, $val);
    }
  }

  /**
    Додавання машруту
  */
  public function add($route, $params){
    $route = '#^'.$route.'$#'; // регулярний вираз
    $this->routes[$route] = $params;
  }
  /**
    Перевірка наявності маршруту
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
      // echo '<p>controller: <b>'.$this->params['controller'].'</b></p>';
      // echo '<p>action: <b>'.$this->params['action'].'</b></p>';
      $controller = 'application\controllers\\' . $this->params['controller'] . 'Controller.php'; //для виклику класів потрібно відформатувати строку до прийнятного вигляду
      if(class_exists($controller)){
        //
      } else {
        echo 'Не знайдено: ' . $controller;
      }
    } else {
      echo 'Маршрут не знайдено';
    }
  }
}

?>
