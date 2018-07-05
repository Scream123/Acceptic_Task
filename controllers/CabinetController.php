<?php

/**
 * Контроллер CabinetController
 * Кабинет пользователя
 */
class CabinetController
{
    /**
     * Action для страницы "Кабинет пользователя"
     */
    public function actionIndex()
    {
        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();

        //Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);

        $smarty = new Smarty();

        $smarty->assign('pageTitle', 'Кабинет');

        // Заполняем переменные для таблицы пользователя
        $name = $user['name'];
        $email = $user['email'];
        $password = $user['password'];
        $phone = $user['phone'];
        $address = $user['address'];

        $smarty->assign('name', $name);
        $smarty->assign('password', $password);
        $smarty->assign('email', $email);
        $smarty->assign('phone', $phone);
        $smarty->assign('address', $address);

        $smarty->display(ROOT . '/views/default/header.tpl');
        $smarty->display(ROOT . '/views/default/cabinet.tpl');
        $smarty->display(ROOT . '/views/default/footer.tpl');


    }

    /**
     * Action для страницы "Редактирование данных пользователя"
     */
    public function actionEdit()
    {
        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();
        $smarty = new Smarty();


        // Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);

        // Флаг результата
        $result = false;
        $resData = array();

        //Обработка формы
        $name = isset($_POST['name']) ? $_POST['name'] : null;
        $phone = isset($_POST['phone']) ? $_POST['phone'] : null;
        $address = isset($_POST['address']) ? $_POST['address'] : null;
        $pwdNew = isset($_POST['newPwd']) ? $_POST['newPwd'] : null;
        $pwd2 = isset($_POST['pwd2']) ? $_POST['pwd2'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;


        // Валидируем значения
        if (!User::checkName($name)) {
            $resData['success'] = 0;
            $resData['message'] = 'Имя не должно быть короче 2-х символов!';
        }

        if (!User::checkPassword($password)) {

            $resData['success'] = 0;
            $resData['message'] = 'Пароль не должен быть короче 6-ти символов!';
        }


        if (!User::comparePwd($pwdNew, $pwd2)) {
            $resData['success'] = 0;
            $resData['message'] = 'Пароли не совпадают';
        }

        //>сверяем введенный пароль с паролем с БД
        $hash = User::getHashPwdById($userId);
        $hashPwd = password_verify($password, $hash);
        //<

        if (!$hashPwd) {
            $resData['success'] = 0;
            $resData['message'] = 'Текущий  пароль не верный!';
            echo json_encode($resData, JSON_UNESCAPED_UNICODE);

            exit;
        }


        $newPwd = null;
        if ($pwdNew && ($pwdNew == $pwd2)) {
            $newPwd = password_hash($pwdNew, PASSWORD_DEFAULT);
        }

        $result = User::edit($userId, $name, $phone, $address, $newPwd, $password);

        // Если ошибок нет, сохраняет изменения профиля
        if ($result) {
            $resData['success'] = 1;
            $resData['message'] = 'Данные сохранены!';

        } else {
            $resData['success'] = 0;
            $resData['message'] = 'Ошибка сохранения данных!';
        }


        echo json_encode($resData, JSON_UNESCAPED_UNICODE);
        // echo json_encode(13433);
        exit;
    }

}

