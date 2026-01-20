<?php

namespace app\Helpers;

use app\Models\User;

class Session
{



     public static function setSession(User $user): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['user_id'] = $user->getId();
        $_SESSION['user_name'] = $user->getFullName();
        $_SESSION['user_role'] = $user->getRole()->value;
    }
} 

