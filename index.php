<?php

// FRONT CONTROLLER

// Общие настройки
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

// Подключение файлов системы
define('ROOT', dirname(__FILE__));

require_once(ROOT . '/components/Autoload.php');
require_once(ROOT . '/config/config.php');//Инициализация настроек
require_once(ROOT . '/library/mainFunctions.php');//Основные функции

//При получении ссылки  подтверждения регистрации подключаем файл  активации
if (isset($_GET['act']) and isset($_GET['login'])) {
    require_once(ROOT . '/library/activation.php');
}

// Вызов Router
$router = new Router();
$router->run();
