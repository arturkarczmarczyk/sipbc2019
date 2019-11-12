<?php
namespace App\Controller;

use App\Model\User;

class AuthController
{
    public static function loginAction()
    {
        if (isset($_REQUEST['auth']) && ! empty($_REQUEST['auth'])) {
            $auth = $_REQUEST['auth'];

            $user = User::findOneByEmailAndPassword($auth['email'], $auth['password']);

            if (! $user) {
                // jak nie ma to wyswietlic blad
                $auth['errors'] = "Nie znaleziono uzytkownika o takiej nazwie lub hasle.";
            } else {
                // jak jest to ustawic w sesji jadzie
                $_SESSION['userId'] = $user->getId();
                $_SESSION['user'] = $user;

                header('Location: /index.php');
                return;
            }
        }

        require_once __DIR__ . '/../View/Auth/login.php';
    }
}