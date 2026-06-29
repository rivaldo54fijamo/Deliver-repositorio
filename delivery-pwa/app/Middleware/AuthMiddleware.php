<?php

namespace App\Middleware;

use App\Core\Session;

class AuthMiddleware
{
    public static function check()
    {
        Session::start();

        if (!Session::has("user_id")) {
            header("Location: " . BASE_URL);
            exit;
        }
    }

    public static function role($role)
    {
        Session::start();

        if (Session::get("role") !== $role) {
            echo "Acesso negado";
            exit;
        }
    }
}
