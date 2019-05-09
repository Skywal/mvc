<?php
  /**
   * шляхи до сторінок на сайті
   */
  return [
    //головна сторінка
    '' => [
      'controller' => 'main',
      'action' => 'index',
    ],
    
    //сторінка логін
    'account/login' => [
      'controller' => 'account',
      'action' => 'login',
    ],

    'account/register' => [
      'controller' => 'account',
      'action' => 'register',
    ],

  ];
