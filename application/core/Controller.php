<?php
namespace application\core;
/**
 * Class Controller
 * Базовий контроллер для всіх сторінок
 * @package application\core
 */
abstract class Controller {
    /**
     * @var на якій сторінці знаходимося
     */
    public $route;

    public function __construct($route) {

        $this->route = $route;
    }
}
