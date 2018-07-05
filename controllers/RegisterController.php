<?php

/**
 * Регистрация пользователя
 */
class RegisterController
{


    public function actionIndex()
    {

        $smarty = new Smarty();

        $smarty->assign('pageTitle', 'Регистрация');


        $smarty->display(ROOT . '/views/default/header.tpl');
        $smarty->display(ROOT . '/views/default/register.tpl');
        $smarty->display(ROOT . '/views/default/footer.tpl');

    }

    public function actionRegister()
    {
        $result = false;
        $resData = array();

        //Обработка формы
        $name = isset($_POST['name']) ? $_POST['name'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $pwd2 = isset($_POST['pwd2']) ? $_POST['pwd2'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;


        // Валидация полей
        if (!User::checkName($name)) {

            $resData['success'] = 0;
            $resData['message'] = 'Имя не должно быть короче 2-х символов!';
            echo json_encode($resData, JSON_UNESCAPED_UNICODE);

        }

        if (!User::checkEmail($email)) {

            $resData['success'] = 0;
            $resData['message'] = 'Неправильный email!';
        }
        if (!User::checkPassword($password)) {

            $resData['success'] = 0;
            $resData['message'] = 'Пароль не должен быть короче 6-ти символов!';
        }


        if (User::checkEmailExists($email)) {
            $resData['success'] = 0;
            $resData['message'] = 'Такой email уже используется!';

            echo json_encode($resData, JSON_UNESCAPED_UNICODE);

            exit;
        }
        if (!User::comparePwd($password, $pwd2)) {

            $resData['success'] = 0;
            $resData['message'] = 'Пароли не совпадают!';
        }


        $hash = null;
        if (!$resData) {

            $hash = password_hash($password, PASSWORD_DEFAULT);

            $result = User::register($name, $email, $hash);

            $activation = User::Verifificate($email);

            $url = BaseUrl . '/activation.php?login=' . $email . '&act=' . $activation;

            $subject = "Подтверждение регистрации";
            $message = "Здравствуйте! Спасибо за регистрацию на сайте:" . BaseUrl . "\nВаша почта: " . $email . "\n Для того чтобы войти в свой аккуант её нужно активировать.\n
Чтобы активировать ваш аккаунт, перейдите по ссылке:\n" . $url . "\n\n С уважением, Администрация сайта: " . BaseUrl;//содержание сообщение
            mail($email, $subject, $message, "Content-type:text/plain; Charset=windows-1251\r\n");

            $resData['success'] = 1;
            $resData['message'] = "Вы зарегистрировались! <br/> На Ваш E-mail выслано письмо с cсылкой, для активации Вашего аккуанта.</p>";

        } else {
            $resData['success'] = 0;
            $resData['message'] = 'Ошибка регистрации!';
        }
        echo json_encode($resData, JSON_UNESCAPED_UNICODE);
        exit;
    }

}