<?php

/**
 * Класс User - модель для работы с пользователями
 */
class User
{
    /**
     * Регистрация пользователя
     * @param string $name <p>Имя</p>
     * @param string $email <p>E-mail</p>
     * @param string $password <p>Пароль</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function register($name, $email, $password)
    {
        // Соединение с БД
        $db = Db::getConnection();

        $name = clearData($name);
        $email = clearData($email);
        $password = clearData($password);


        // Текст запроса к БД
        $sql = 'INSERT INTO users (`name`, `email`, `password`) '
            . 'VALUES (:name, :email, :password)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();
    }

    /**
     * Редактирование данных пользователя
     * @param integer $id <p>id пользователя</p>
     * @param string $name <p>Имя</p>
     * @param string $phone <p>Телефон</p>
     * @param string $address <p>Адрес</p>
     * @param string $pwdNew <p>Новый пароль</p>
     * @param string $password <p>Текущий пароль</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function edit($id, $name, $phone, $address, $pwdNew, $password)
    {

        // Соединение с БД
        $db = Db::getConnection();

        $pwdNew = trim($pwdNew);

        $hash = User::getHashPwdById($id);
        $hashPwd = password_verify($password, $hash);
        $newPwd = null;
        if ($pwdNew) {
            $newPwd = $pwdNew;
        }
        //         Текст запроса к БД
        $sql = "UPDATE users SET ";

        if ($newPwd) {
            $sql .= "`password` = '{$newPwd}', ";
        }
        //проверяем пароль


        $sql .= "`name` = :name,
          `phone` =:phone,
          `address` = :address
          WHERE `id` = :id AND '{$hashPwd}' LIMIT 1";


        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);

        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':phone', $phone, PDO::PARAM_STR);
        $result->bindParam(':address', $address, PDO::PARAM_STR);

        return $result->execute();


    }

    /**
     * Проверяем существует ли пользователь с заданными $email и $password
     * @param string $email <p>E-mail</p>
     * @param string $password <p>Пароль</p>
     * @return mixed : integer user id or false
     */
    public static function checkUserData($email, $password)
    {
        // Соединение с БД
        $db = Db::getConnection();

        //проверяем пароль
        $hash = User::getHashPwd($email);

        $hashPwd = password_verify($password, $hash);


        $sql = "SELECT * FROM users WHERE email = :email AND '{$hashPwd}' AND `activation` = '1'";

        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);


        $result->bindParam(':email', $email, PDO::PARAM_INT);

        $result->execute();

        // Обращаемся к записи
        $user = $result->fetch();


        if ($user) {
            // Если запись существует, возвращаем id пользователя
            return $user['id'];
        }

        return false;
    }

    /**
     * Возвращаем хеш пароляc БД для проверки
     * @param $email
     * @param $password
     * @return string
     */
    public static function getHashPwd($email)
    {
        // Соединение с БД
        $db = Db::getConnection();

        $row = "SELECT `password` FROM `users` WHERE  `email` = '{$email}'";
        $res = $db->prepare($row);
        $res->execute();
        $hashPwd = $res->fetch(PDO::FETCH_ASSOC);
        $hash = $hashPwd['password'];


        return $hash;
    }

    public static function getHashPwdById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        $row = "SELECT `password` FROM `users` WHERE  `id` = '{$id}'";
        $res = $db->prepare($row);
        $res->execute();
        $hashPwd = $res->fetch(PDO::FETCH_ASSOC);
        $hash = $hashPwd['password'];


        return $hash;
    }

    /**
     * Запоминаем пользователя
     * @param integer $userId <p>id пользователя</p>
     */
    public static function auth($userId)
    {
        // Записываем идентификатор пользователя в сессию
        $_SESSION['user'] = $userId;
    }

    /**
     * Возвращает идентификатор пользователя, если он авторизирован.<br/>
     * Иначе перенаправляет на страницу входа
     * @return string <p>Идентификатор пользователя</p>
     */
    public static function checkLogged()
    {
        // Если сессия есть, вернем идентификатор пользователя
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }


        header("Location: /user/login");
    }

    /**
     * Проверяет является ли пользователь гостем
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;

    }

    /**
     * Проверяет имя: не меньше, чем 2 символа
     * @param string $name <p>Имя</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkName($name)
    {
        $name = clearData($name);
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет имя: не меньше, чем 6 символов
     * @param string $password <p>Пароль</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkPassword($password)
    {

        $password = clearData($password);
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    /**
     * проверка правильности пароля
     * @param $password - новый пароль
     * @param $pwd2 - повтор пароля
     * @return bool
     */
    public static function comparePwd($password, $pwd2)
    {

        $password = trim($password);
        $pwd2 = trim($pwd2);
        if ($password == $pwd2) {
            return true;
        }

        return false;

    }


    /**
     * Проверяет email
     * @param string $email <p>E-mail</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkEmail($email)
    {

        $email = clearData($email);
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }


    /**
     * Проверяет не занят ли email другим пользователем
     * @param type $email <p>E-mail</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkEmailExists($email)
    {
        // Соединение с БД        
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT COUNT(*) FROM users WHERE email = :email';

        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        return false;
    }

    /**
     * Возвращает пользователя с указанным id
     * @param integer $id <p>id пользователя</p>
     * @return array <p>Массив с информацией о пользователе</p>
     */
    public static function getUserById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM users WHERE id = :id ';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }

    /**
     * Ввозврат ИД по эмейлу
     * @param $email
     * @return string
     */
    public static function Verifificate($email)
    {
        $db = Db::getConnection();
        $sql = "SELECT id FROM `users` WHERE `email` = '$email'";
        $activ = $db->query($sql);
        $id_activ = $activ->fetch();
        $activation = md5($id_activ['id']);

        return $activation;

    }

    /**
     * Активация аккаунта по эмейлу
     * @param $email
     * @return PDOStatement
     */
    public static function updateAct($email)
    {
        $db = Db::getConnection();

        $sql = "UPDATE `users` SET activation='1' WHERE `email` = '$email'";
        $result = $db->query($sql);


        return $result;
    }
}
