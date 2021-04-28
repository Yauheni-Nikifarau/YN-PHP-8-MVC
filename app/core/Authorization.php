<?php
final class Authorization
{
    public static function registration ($data)
    {
        $dataBase = new Users_JsonData(ROOT . '/app/data/users.json');
        var_dump($dataBase);
        $dataBase->add($data['name'], $data['email'], $data['password']);
    }

    public static function login ($email, $password)
    {
        $dataBase = new Users_JsonData(ROOT . '/app/data/users.json');
        $user = self::get($email);
        if ($user === false) {
            return false;
        }
        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['name'] = $user['login'];
            $_SESSION['group'] = $user['group'];
            setcookie('auth', 'true', time()+600, '/');
            return true;
        } else {
            return false;
        }
    }

    public static function logout ()
    {
        setcookie('auth', 'false', time()-60, '/');
        setcookie('order', 0, time()-100, '/');
        session_destroy();
    }

    private static function get ($email)
    {
        $dataBase = new Users_JsonData(ROOT . '/app/data/users.json');
        return $dataBase->search_user($email);
    }
}