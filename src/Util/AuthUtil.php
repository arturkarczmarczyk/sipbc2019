<?php


namespace App\Util;


use App\Model\User;

class AuthUtil
{
    /**
     * @return User|null
     */
    public static function getCurrentUser()
    {
        if (! isset($_SESSION['userId']) ||  ! $_SESSION['userId'] || $_SESSION['userId'] <= 0) {
            return null;
        }

        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        $user = new User($_SESSION['userId']);
        $_SESSION['user'] = $user;
        return $user;
    }
}