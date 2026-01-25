<?php

namespace app\Helpers;

class Middleware
{
  
    public static function handle(string $key): bool
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $role = $_SESSION['user_role'] ?? null;

        switch ($key) {
            
            case 'guest':
                if ($role) {
                    self::redirectToDashboard($role);
                    return false;
                }
                break;

            
            case 'auth':
                if (!$role) {
                    header('Location: /login');
                    return false;
                }
                break;

            
            case 'admin':
                if ($role !== 'ADMIN') {
                    self::redirectToDashboard($role);
                    return false;
                }
                break;

    
            case 'trainer':
                if ($role !== 'TRAINER') {
                    self::redirectToDashboard($role);
                    return false;
                }
                break;

            
            case 'learner':
                if ($role !== 'LEARNER') {
                    self::redirectToDashboard($role);
                    return false;
                }
                break;
        }

        return true;
    }

   
    private static function redirectToDashboard(?string $role)
    {
        $path = match ($role) {
            'ADMIN'   => '/admin/dashboard',
            'TRAINER' => '/trainer/dashboard',
            'LEARNER' => '/learner/dashboard',
            default   => '/login',
        };
        header("Location: $path");
        exit();
    }

   
}