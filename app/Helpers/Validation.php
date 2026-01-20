<?php

namespace app\Helpers;

class Validation
{

     public static function clean($value)
    {
        return htmlspecialchars(trim($value));
    }

    // Checkk is empty
    public static function isEmpty($value)
    {
        return empty($value);
    }

    // Check if email valid
    public static function isEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    // Check passsword
    public static function isStrongPassword($password)
    {
        return strlen($password) >= 6;
    }


}
