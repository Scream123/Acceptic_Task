<?php

return array(

    // Пользователь:
    'register/form' => 'register/register',
    'register' => 'register/index',
    'login/form' => 'login/login',
    'login' => 'login/index',
    'logout' => 'login/logout',
    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',

    // Главная страница
   'index.php' => 'index/index', // actionIndex в IndexController
   '^$' => 'index/index', // actionIndex в IndexController
);
