<?php
/**
 * Подтверждение регистрации
 */


// Подключение файлов системы
require_once(ROOT . '/components/Autoload.php');

if(isset($_GET['act']) and isset($_GET['login'])) {
    $act = $_GET['act'];
    $act = stripslashes($act);
    $act = htmlspecialchars($act);

    $email = $_GET['login'];
    $email = stripslashes($email);
    $email = htmlspecialchars($email);
}
else{
    exit("Вы зашил на страницу без кода подтверждения!");
}

 $activation = User::Verifificate($email); //извлекаем идентификатор пользователя с данным логином

if ($activation == $act) {//сравниваем полученный из url и сгенерированный код
    User::updateAct($email);
    echo "Ваш аккуант <strong>".$email."</strong> успешно активирован! Теперь вы можете зайти на сайт под своим эмейлом и паролем!<br><a href='/login'>Авторизация</a>";
}
else {
    echo "Ошибка! Ваш аккуант не активирован. Обратитесь к администратору.<br><a href='/index.php'>Главная страница</a>";
}