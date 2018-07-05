<?php

/**
 * Авторизация пользователя
 */
class LoginController
{


    public function actionIndex()
    {

        $smarty = new Smarty();

        $smarty->assign('pageTitle', 'Авторизация');


        $smarty->display(ROOT . '/views/default/header.tpl');
        $smarty->display(ROOT . '/views/default/login.tpl');
        $smarty->display(ROOT . '/views/default/footer.tpl');

    }

    /**
     * Action для страницы "Вход на сайт"
     */
    public function actionLogin()
    {
        // Флаг ошибок
        $resData = array();

        //Обработка формы
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;

        // Валидация полей
        if (!User::checkEmail($email)) {

            $resData['success'] = 0;
            $resData['message'] = 'Неправильный email!';
            echo json_encode($resData, JSON_UNESCAPED_UNICODE);
            exit;
        }


        if (!User::checkPassword($password)) {
            $resData['success'] = 0;
            $resData['message'] = 'Пароль не должен быть короче 6-ти символов!';
        }


        // Проверяем существует ли пользователь
        $userId = User::checkUserData($email, $password);

        if ($userId) {
            
            // Если данные правильные, запоминаем пользователя (сессия)
            User::auth($userId);
            $resData['success'] = 1;
            // Перенаправляем пользователя в закрытую часть - кабинет
            // header("Location: /cabinet");


        } else {
            $resData['success'] = 0;
            $resData['message'] = 'Активируйте свою учетную запись и введите правильно свои данные!';
        }
        echo json_encode($resData, JSON_UNESCAPED_UNICODE);
        exit;
    }

    /**
     * Удаляем данные о пользователе из сессии
     */
    public function actionLogout()
    {

        // Удаляем информацию о пользователе из сессии
        unset($_SESSION["user"]);

        // Перенаправляем пользователя на главную страницу
        header("Location: /");
    }

}