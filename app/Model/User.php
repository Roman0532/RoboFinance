<?php

namespace app\Model;

use PDO;

class User
{
    private $connection;

    /**
     * User constructor.
     * @param $connection
     */
    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    /**
     * Метод аутентификации пользователя
     * @param $login
     * @param $password
     * @return bool | array
     */
    public function authenticate($login, $password)
    {
        $result = $this->connection->prepare("SELECT * FROM `users` WHERE `login` = :login");

        $result->execute(['login' => $login]);

        $user = $result->fetch(PDO::FETCH_ASSOC);

        if (!password_verify($password, $user['password'])) {
            return false;
        }
        return $user;
    }
}
