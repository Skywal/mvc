<?php
  require_once 'application/lib/dev.php';

  /**
   * Цей файл - головна точка входу сайту
   */

  use application\core\Router;

  /**
   * Автозагрузка класів
   */
  spl_autoload_register(function($class){
    $path = str_replace('\\', '/', $class . '.php');
    if (file_exists($path)) {
      require $path;
    }
  });
/**
 * старт сесії
 */
  session_start();

  $router = new Router;
  $router->run();
